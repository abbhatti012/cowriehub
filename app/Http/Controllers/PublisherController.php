<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
use App\Models\Payment;
use App\Models\Revenue;
use App\Models\SubGenre;
use App\Models\Publisher;
use App\Models\ExtraField;
use App\Models\MarketOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PublisherController extends Controller
{
    public function signup(Request $request){
        $id = $request->id;
        $request->validate([
            'company_name' => 'required',
            'company_email' => 'required',
            'company_phone' => 'required',
            'number_of_authors' => 'required',
            'number_of_publishers' => 'required',
            'name_of_ceo' => 'required',
            'business_certificate' => 'mimes:jpeg,png,jpg,svg,doc,docx,odt,pdf,tex,txt,wpd,tiff,tif,csv,psd,key,odp,pps,ppt,pptx,ods,xls,xlsm,xlsx',
        ]);
        $user = Publisher::firstOrNew(array('id' => $id));
        if($request->business_certificate != null){
            $UploadImage = time().'.'.$request->business_certificate->extension();
            $request->business_certificate->move(public_path('images/publisher'), $UploadImage);
            $user->business_certificate = 'images/publisher/'.$UploadImage;
        } else {
            unset($user->business_certificate);
        }
        $user->user_id = Auth::id();
        $user->company_name = $request->company_name;
        $user->company_email = $request->company_email;
        $user->company_phone = $request->company_phone;
        $user->number_of_authors = $request->number_of_authors;
        $user->number_of_publishers = $request->number_of_publishers;
        $user->name_of_ceo = $request->name_of_ceo;
        $user->status = 0;
        if($user->save()){
            $data['title'] = 'New Applicant';
            $data['to'] = 'cowriehubllc@gmail.com';
            $data['username'] = 'Admin';
            $data['body'] = 'New application as a cowriehub publisher is just added to cowriehub. Please check below link to view!';
            $data['link'] = "admin.publisher";
            $data['linkText'] = "View for details";
            Mail::send('email', $data,function ($m) use ($data) {
                $m->to($data['to'])->subject('New Applicant!');
            });

            return back()->with('message', ['text'=>'Thank you for your application! Cowriehub will review your application in the next 24-48 hours.
            You will be notified in your email on the status of your application after this review.','type'=>'success']);
        } else {
            return back()->with('message', ['text'=>'Oops! There is something wring. Your book cannot be added','type'=>'danger']);
        }
    }
    public function update_publisher_status($id, $value){
        $user = Publisher::find($id);
        $user->status = $value;
        $user->save();
        $user_detail = User::find($user->user_id);
        if($value == 1){
            $data['title'] = 'Congratulations!';
            $data['body'] = 'You have been approved as a publisher successfully! We will be keep in touch with you. ';
            $data['body'] .= 'Please click on below link to view your status!';
            $data['link'] = "user.publisher-account";
            $data['param'] = "id=$user->user_id";
            $data['linkText'] = "View for details";
            $user_detail->role = 'publisher';
        } else {
            $data['title'] = 'Consultant Declined';
            $data['body'] = 'Sorry! we are not going to accept your consultant proposal right now because of incomplete profile.';
            $data['body'] .= 'If you have any question then you can reach to support. By clicking on below link to view status. Thanks!';
            $data['link'] = "user.publisher-account";
            $data['param'] = "id=$user->user_id";
            $data['linkText'] = "View for details";
            $user_detail->role = 'user';
        }
        $user_detail->save();
        $data['to'] = $user_detail->email;
        $data['username'] = $user_detail->name;
        Mail::send('email', $data,function ($m) use ($data) {
            $m->to($data['to'])->subject('Publisher Action!');
        });

        return back()->with('message', ['text'=>'Publisher status updated succesfully!','type'=>'success']);
    }
    public function delete_publisher($id){
        $user = Publisher::find($id);
        $user_detail = User::where('id',$user->user_id)->first();
        
        $data['title'] = 'Publisher Removed';
        $data['body'] = 'Sorry! you are not compatible with our requirements. We are going to remove you from cowriehub.';
        $data['body'] .= ' For further query you can support cowriehub!';
        $data['link'] = "";
        $data['linkText'] = "";
        $data['to'] = $user_detail->email;
        $data['username'] = $user_detail->name;
        Mail::send('email', $data,function ($m) use ($data) {
            $m->to($data['to'])->subject('Publisher Removed!');
        });
        $user->delete();
        return back()->with('message', ['text'=>'Publisher has been removed successfully!','type'=>'success']);
    }
    public function create_author(){
        $users = User::where('created_by',Auth::id())->get();
        return view('publisher.create_author',compact('users'));
    }
    public function register_author(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->created_by = Auth::id();
        $user->role = 'author';
        $user->save();

        $data['title'] = 'New Author';
        $data['to'] = 'cowriehubllc@gmail.com';
        $data['username'] = 'Admin';
        $data['body'] = 'Author is just added by publisher. Please check below link to view its details!';
        $data['link'] = "admin.author";
        $data['linkText'] = "View for details";
        Mail::send('email', $data,function ($m) use ($data) {
            $m->to($data['to'])->subject('New Applicant!');
        });

        $data['title'] = 'Important Note!';
        $data['body'] = 'You are created as an author in cowriehub! Please use below credentials to login for further details!';
        $data['body'] .= 'Email: '.$user->email;
        $data['body'] .= 'Password: '.$user->password;
        $data['link'] = "login";
        $data['linkText'] = "Login Now";
        $data['to'] = $user->email;
        $data['username'] = $user->name;
        Mail::send('email', $data,function ($m) use ($data) {
            $m->to($data['to'])->subject('Important Note!');
        });
        return back()->with('message', ['text'=>'Author created successfully! You will be notify once cowriehub approve it','type'=>'success']);
    }
    public function add_book_for_author(){
        $genres = Genre::with('subgenres')->get(); 
        $authors = User::where('created_by',Auth::id())->get();
        $type = $_GET['type'];
        if($type == 'author'){
            $route = 'insert-book-for-author';
        } else {
            $route = 'insert-book';
        }
        
        return view('publisher.add_book_for_author',compact('authors','genres','type','route'));
    }
    public function insert_book(Request $request, $id){
        $user = Book::firstOrNew(array('id' => $id));
        if($request->post_type == 'add'){
            $user->user_id = $request->author;
            $user->role = 'author';
        } else {
            $user->role = Auth::user()->role;
        }
        if($request->hero_image != null){
            $UploadImage = 'a'.time().'.'.$request->hero_image->extension();
            $request->hero_image->move(public_path('images/books'), $UploadImage);
            $user->hero_image = 'images/books/'.$UploadImage;
        } else {
            unset($user->hero_image);
        }
        if($request->trailer != null){
            $UploadImage = 'b'.time().'.'.$request->trailer->extension();
            $request->trailer->move(public_path('images/books'), $UploadImage);
            $user->trailer = 'images/books/'.$UploadImage;
        } else {
            unset($user->trailer);
        }
        if($request->sample != null){
            $UploadImage = 'c'.time().'.'.$request->sample->extension();
            $request->sample->move(public_path('images/books'), $UploadImage);
            $user->sample = 'images/books/'.$UploadImage;
        } else {
            unset($user->sample);
        }
        $user->title = $request->title;
        $user->slug = SlugService::createSlug(Genre::class, 'slug', $request->title);
        $user->price = $request->price;
        $user->subtitle = $request->subtitle;
        $user->synopsis = $request->synopsis;
        $user->genre = $request->genre;
        $user->publisher_id = Auth::id();
        $user->publisher = $request->publisher;
        $user->country = $request->country;
        $user->cover_type = $request->cover_type;
        $user->publication_date = $request->publication_date;
        if(Auth::user()->role == 'admin'){
            $user->status = 1;
        }

        if(isset($request->hardcover) && !empty($request->hardcover)){
            $user->hard_price = $request->hard_price;
            $user->hard_page = $request->hard_page;
            $user->hard_isbn = $request->hard_isbn;
            $user->hard_weight = $request->hard_weight;
            $user->hard_ship = $request->hard_ship;
            if($request->hard_ship == 0){
                $user->hard_allow_preorders = $request->herd_allow_preorder;
                if($request->herd_allow_preorder == 1){
                    $user->hard_expected_shipment = $request->hard_shipment_date;
                }
            } else {
                $user->hard_allow_preorders = 0;
                $user->hard_expected_shipment = NULL;
            }
            $user->hard_stock = $request->hard_stock;
            $user->is_hardcover = 1;
        }
        if(isset($request->paperback) && !empty($request->paperback)){
            $user->paper_price = $request->paper_price;
            $user->paper_page = $request->paper_page;
            $user->paper_isbn = $request->paper_isbn;
            $user->paper_weight = $request->paper_weight;
            $user->paper_ship = $request->paper_ship;
            if($request->paper_ship == 0){
                $user->paper_allow_preorders = $request->paper_allow_preorder;
                if($request->paper_allow_preorder == 1){
                    $user->paper_expected_shipment = $request->paper_shipment_date;
                } else {
                    $user->paper_allow_preorders = 0;
                    $user->paper_expected_shipment = NULL;
                }
            }
            $user->paper_stock = $request->paper_stock;
            $user->is_paperback = 1;
        }
        if(isset($request->digital) && !empty($request->digital)){
            $user->digital_price = $request->digital_price;
            $user->digital_page = $request->digital_page;
            $user->digital_isbn = $request->digital_isbn;
            $user->is_digital = 1;
            if($request->epub != null){
                $UploadImage = 'd'.time().'.'.$request->epub->extension();
                $request->epub->move(public_path('images/books'), $UploadImage);
                $user->epub = 'images/books/'.$UploadImage;
            } else {
                unset($user->epub);
            }
        }
        if($user->save()){
            $author = User::where('id',$request->author)->first();
            $data['title'] = 'New Book Added';
            $data['body'] = 'Hi new book is just added into your account from your publisher! We will notify you once it will be published or rejected from CORRIEHUB';
            $data['link'] = "";
            $data['linkText'] = "";
            $data['to'] = $author->email;
            $data['username'] = $author->name;
            Mail::send('email', $data,function ($m) use ($data) {
                $m->to($data['to'])->subject('IMPORTANT NOTE!');
            });
            return back()->with('message', ['text'=>'Congratulations! Book has been added. It will be published once approved by COWRIEHUB','type'=>'success']);
        } else {
            return back()->with('message', ['text'=>'Oops! There is something wring. Your book cannot be added','type'=>'danger']);
        }
    }
    public function all_books(){
        $genres = Genre::with('subgenres')->get(); 
        $authors = User::where('role','author')->get();
        $books = Book::where('user_id',Auth::id())->orWhere('publisher_id',Auth::id())
        ->select('books.*', 'sub_genres.title as genre_title')
        ->join('sub_genres','sub_genres.id','=','books.genre')->get();
        return view('publisher.all_books', compact('books'));
    }
    public function marketing(){
        $orders = MarketOrders::orderBy('marketing_orders.id','desc')
        ->select('marketing.*','marketing_orders.*','marketing_orders.id as market_id')
        ->join('marketing','marketing.id','=','marketing_orders.marketing_id')
        ->where('marketing_orders.user_id', Auth::id())
        ->get();
        return view('publisher.marketing', compact('orders'));
    }
    public function my_sales(Request $request){
        if(isset($request->year)){
            $users = Payment::select('*')->where('user_id',Auth::id())
            ->whereYear('created_at', $request->year)
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('m');
            });
            $filter['year'] = $request->year;
        } else {
            $users = Payment::select('*')->where('user_id',Auth::id())
            ->whereYear('created_at', date('Y'))
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('m');
            });
            $filter['year'] = date('Y');
        }

        $usermcount = [];
        $userArr = [];

        foreach ($users as $key => $value) {
            $usermcount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($usermcount[$i])){
                $userArr[$i] = $usermcount[$i];    
            }else{
                $userArr[$i] = 0;    
            }
        }
        return view('publisher.sales',compact('userArr','filter'));
    }
    public function payment_details(){
        $user = Publisher::where('user_id',Auth::id())->first();
        return view('publisher.payment_details',compact('user'));
    }
    public function update_payment_detail(Request $request){
        $user = Publisher::where('user_id',Auth::id())->first();
        if($user){
            if($request->payment == 'mobile_money'){
                $user->account_name = $request->account_name;
                $user->account_number = $request->account_number;
                $user->networks = $request->networks;
            } elseif($request->payment == 'bank_settelments'){
                $user->bank_account_name = $request->bank_account_name;
                $user->bank_account_number = $request->bank_account_number;
                $user->branch = $request->branch;
                $user->bank_name = $request->bank_name;
            }
            $user->payment = $request->payment;
            $user->primary_account = $request->primary;
            $user->save();
        } else {
            return back()->with('message', ['text'=>'Your application is currently under review!','type'=>'danger']);
        }
        return back()->with('message', ['text'=>'Payment Details set successfully!','type'=>'success']);
    }
    public function view_book_detail(Request $request){
        $book = Book::where('id',$request->id)->first();
        $genre = SubGenre::where('id', $book->genre)->first();
        $extras = ExtraField::where('book_id',$request->id)->get();
        $data = view('publisher.book_detail', compact('book', 'genre', 'extras'))->render();
        return response()->json($data);
    }
    public function revenue(){
        $revenues = Revenue::where('user_id',Auth::id())->where('payment_status',1)->with('user')->get();
        return view('publisher.revenue', compact('revenues'));
    }
    public function dashboard(Request $request){
        $id = Auth::id();
        if(isset($request->date) && !empty($request->date)){
            $date = explode(' - ',$request->date);
            $start_date = date('Y-m-d',strtotime($date[0]));
            $end_date = date('Y-m-d',strtotime($date[1]));
            $date = [0=>$start_date,1=>$end_date];
            $books = Book::where('user_id',$id)->where('role',Auth::user()->role)->whereBetween('created_at',$date)->count();
            $approved_books = Book::where('user_id',$id)->where('role',Auth::user()->role)->whereBetween('created_at',$date)->where('status',1)->count();
            $orders = Revenue::where('user_id',$id)->where('role',Auth::user()->role)->whereBetween('created_at',$date)->count();
            $check = User::where('id',$id)->whereBetween('created_at',$date)->first();
            $graphOrders = Revenue::select('*')
            ->whereBetween('created_at',$date)->where('user_id',$id)->where('role',Auth::user()->role);
            $get_date_series = $this->get_date_series($start_date, $end_date);
            $days = count($get_date_series);
            $graph = $this->get_labels($days, $graphOrders->get(), $get_date_series);

            $earning = $graphOrders->select(DB::raw("SUM(CASE WHEN payment_status = 1 AND admin_payment_status = 1 THEN user_amount ELSE 0 END) AS earning, ".
                        "SUM(CASE WHEN payment_status = 1 AND admin_payment_status = 0 THEN user_amount ELSE 0 END) AS pending_earning"))
            ->groupBy('id')->get()->toArray();
            $approved = 0;
            $pending = 0;
            foreach($earning as $earn){
                $approved = $approved + $earn['earning'];
                $pending = $pending + $earn['pending_earning'];
            }
        } else {
            $books = Book::where('user_id',$id)->where('role',Auth::user()->role)->count();
            $approved_books = Book::where('user_id',$id)->where('role',Auth::user()->role)->where('status',1)->count();
            $orders = Revenue::where('user_id',$id)->where('role',Auth::user()->role)->count();
            $check = User::where('id',$id)->select('checkin','checkout')->first();

            $query_date = date('Y-m-d',strtotime(now()));
            $start_date = date('Y-m-01', strtotime($query_date));
            $end_date = date('Y-m-t', strtotime($query_date));

            $graphOrders = Revenue::select('*')
            ->where('created_at', '>=' ,$start_date)
            ->where('created_at', '<' ,$end_date)->where('role',Auth::user()->role)->where('user_id',$id);
            $get_date_series = $this->get_date_series($start_date, $end_date);
            $days = count($get_date_series);
            $graph = $this->get_labels($days, $graphOrders->get(), $get_date_series);
            $earning = $graphOrders->select(DB::raw("SUM(CASE WHEN payment_status = 1 AND admin_payment_status = 1 THEN user_amount ELSE 0 END) AS earning, ".
                        "SUM(CASE WHEN payment_status = 1 AND admin_payment_status = 0 THEN user_amount ELSE 0 END) AS pending_earning"))
            ->groupBy('id')->get()->toArray();
            $approved = 0;
            $pending = 0;
            foreach($earning as $earn){
                $approved = $approved + $earn['earning'];
                $pending = $pending + $earn['pending_earning'];
            }
        }
        $ordermcount = [];
        $orderArr = [];
        $ordermnet = [];
        foreach ($graph['orders'] as $key => $order) {
            $sum = 0;
            foreach($order as $value){
                $sum = $sum + $value->user_amount;
            }
            $ordermcount[(int)$key] = count($order);
            $ordermnet[(int)$key] = $sum;
        }
        for($i = 0; $i < $graph['count']; $i++){
            if(!empty($ordermcount[$i])){
                $orderCountArr[$i] = $ordermcount[$i]; 
            }else{
                $orderCountArr[$i] = 0;
            }
            if(!empty($ordermnet[$i])){
                $orderNetArr[$i] = $ordermnet[$i]; 
            }else{
                $orderNetArr[$i] = 0;
            }
        }
        $graph_data['orderCountArr'] = $orderCountArr;
        $graph_data['orderNetArr'] = $orderNetArr;
        $graph_data['label'] = $graph['label'];
        return view('publisher.dashboard',compact('books','orders','approved','pending','approved_books','check','graph_data'));
    }
    public function get_date_series($start_date, $end_date){
        $dates = array();
        $current = strtotime($start_date);
        $date2 = strtotime($end_date);
        $stepVal = '+1 day';
        while( $current <= $date2 ) {
            $dates[] = date('d-M', $current);
            $current = strtotime($stepVal, $current);
        }
        return $dates;
    }
    public function get_labels($days, $graphOrders, $get_date_series){
        if($days >= 0 && $days <= 1){
            $data['orders'] = $graphOrders->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('h');
            });
           
            $data['label'] = ['1PM', '2PM', '3PM', '4PM', '5PM', '6PM', '7PM','8PM' ,'9PM', '10PM', '11PM', '12AM', '13AM', '14AM', '15AM', '16AM', '17AM', '18AM', '19AM', '20AM', '21AM', '22AM', '23AM', '00PM'];
            $data['count'] = 24;
        } else if($days > 1 && $days <= 14){
            $data['orders'] = $graphOrders->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('d');
            });
           
            $data['label'] = $get_date_series;
            $data['count'] = $days;
        } else if($days > 14 && $days < 30){
            $data['orders'] = $graphOrders->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('d');
            });
            
            $data['label'] = $get_date_series;
            $data['count'] = $days;
        } else if($days >= 29 && $days <= 31){
            $data['orders'] = $graphOrders->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('d');
            });
            
            $data['label'] = $get_date_series;
            $data['count'] = $days;
        } else if($days > 31 && $days < 365){
            $data['orders'] = $graphOrders->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('m');
            });
            
            $data['label'] = ['JAN', 'FEB', 'MARCH', 'APRIL', 'MAY', 'JUN', 'JUL', 'AUG', 'SEPT', 'OCT', 'NOV', 'DEC'];
            $data['count'] = 12;
        }
        return $data;
    }
}
