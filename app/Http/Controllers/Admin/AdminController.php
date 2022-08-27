<?php

namespace App\Http\Controllers\Admin;

use View;
use Carbon\Carbon;
use App\Models\Job;
use App\Models\Pos;
use App\Models\Blog;
use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
use App\Models\Order;
use App\Models\Skill;
use App\Models\Banner;
use App\Models\Coupon;
use App\Models\Contact;
use App\Models\Payment;
use App\Models\Revenue;
use App\Models\Setting;
use App\Models\Location;
use App\Models\SubGenre;
use App\Models\Affiliate;
use App\Models\Marketing;
use App\Models\Publisher;
use App\Models\Consultant;
use App\Models\ExtraField;
use App\Models\Subscriber;
use App\Models\AuthorDetail;
use App\Models\MarketOrders;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public function index(Request $request)
    {
        $id = Auth::id();
        if(isset($request->date) && !empty($request->date)){
            $date = explode(' - ',$request->date);
            $start_date = date('Y-m-d',strtotime($date[0]));
            $end_date = date('Y-m-d',strtotime($date[1]));
            $date = [0=>$start_date,1=>$end_date];
            $books = Book::whereBetween('created_at',$date)->count();
            $approved_books = Book::whereBetween('created_at',$date)->where('status',1)->count();
            $orders = Payment::whereBetween('created_at',$date)->count();
            $check = User::whereBetween('created_at',$date)->first();
            $graphOrders = Payment::select('*')
            ->whereBetween('created_at',$date);
            $get_date_series = $this->get_date_series($start_date, $end_date);
            $days = count($get_date_series);
            $graph = $this->get_labels($days, $graphOrders->get(), $get_date_series);

            $earning = $graphOrders->select(DB::raw("SUM(CASE WHEN status = 'successfull' OR status = 'pending' THEN amount_paid ELSE 0 END) AS earning, ".
                        "SUM(CASE WHEN status = 'cancelled' THEN amount_paid ELSE 0 END) AS cancelled_earning"))
            ->groupBy('id')->get()->toArray();
            $approved = 0;
            $cancelled = 0;
            foreach($earning as $earn){
                $approved = $approved + $earn['earning'];
                $cancelled = $cancelled + $earn['cancelled_earning'];
            }
        } else {
            $books = Book::select('id')->count();
            $approved_books = Book::select('id','status')->where('status',1)->count();
            $orders = Payment::select('id')->count();
            $check = User::where('id',$id)->select('checkin','checkout')->first();

            $query_date = date('Y-m-d',strtotime(now()));
            $start_date = date('Y-m-01', strtotime($query_date));
            $end_date = date('Y-m-t', strtotime($query_date));

            $graphOrders = Payment::select('*')
            ->where('created_at', '>=' ,$start_date)
            ->where('created_at', '<' ,$end_date);
            $get_date_series = $this->get_date_series($start_date, $end_date);
            $days = count($get_date_series);
            $graph = $this->get_labels($days, $graphOrders->get(), $get_date_series);
            $earning = $graphOrders->select(DB::raw("SUM(CASE WHEN status = 'successfull' OR status = 'pending' THEN amount_paid ELSE 0 END) AS earning, ".
                        "SUM(CASE WHEN status = 'cancelled' THEN amount_paid ELSE 0 END) AS cancelled_earning"))
            ->groupBy('id')->get()->toArray();
            $approved = 0;
            $cancelled = 0;
            foreach($earning as $earn){
                $approved = $approved + $earn['earning'];
                $cancelled = $cancelled + $earn['cancelled_earning'];
            }
        }
        
        $ordermcount = [];
        $orderArr = [];
        $ordermnet = [];
        foreach ($graph['orders'] as $key => $order) {
            $sum = 0;
            foreach($order as $value){
                $sum = $sum + $value->amount_paid;
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
        return view('admin.index',compact('books','orders','approved','cancelled','approved_books','check','graph_data'));
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
    public function author(){
        $authors = User::where('role','author')->orderBy('id','desc')->with('author_detail')->get();
        return view('admin.author', compact('authors'));
    }
    public function consultant(){
        $consultants = Consultant::orderBy('id','desc')->with('marketing')->get();
        $jobs = MarketOrders::orderBy('marketing_orders.id','desc')
        ->select('marketing.*','marketing_orders.*','marketing_orders.id as market_id')
        // ->where('marketing_orders.job_type','!=',1)
        ->join('marketing','marketing.id','=','marketing_orders.marketing_id')->get();
        $setting = Setting::first();
        return view('admin.consultant',compact('consultants','jobs','setting'));
    }
    public function general_user(){
        $users = User::where('role','user')->get();
        return view('admin.general-user',compact('users'));
    }
    public function publisher(){
        $publishers = Publisher::orderBy('id','desc')->get();
        return view('admin.publisher',compact('publishers'));
    }
    public function pos(){
        $users = User::where('role','pos')->orderBy('id','desc')->with('pos')->get();
        return view('admin.pos',compact('users'));
    }
    public function affiliates(){
        $affiliates = User::where('role','affiliate')->orderBy('id','desc')->with('affiliates')->get();
        return view('admin.affiliates',compact('affiliates'));
    }
    public function books(){
        $books = Book::orderBy('id','desc')->with('sub_genre')->get();
        return view('admin.books',compact('books'));
    }
    public function book_orders(){
        $payments = Payment::orderBy('id','desc')->get();
        return view('admin.book-orders', compact('payments'));
    }
    public function marketing_orders(){
        $orders = MarketOrders::orderBy('marketing_orders.id','desc')
        ->select('marketing.*','marketing_orders.*','marketing_orders.id as market_id')
        ->join('marketing','marketing.id','=','marketing_orders.marketing_id')
        ->get();
        return view('admin.marketing-orders', compact('orders'));
    }
    public function offers(){
        return view('admin.offers');
    }
    public function subscribed_users(){
        return view('admin.subscribed-users');
    }
    public function order_reports(Request $request){
        $query = Payment::orderBy('payments.id','desc')->select('payments.*','users.*','payments.id as payment_id','users.email as user_email');
        if(isset($request->range)){
            $dateRange = array_map('trim', explode('-', $request->range));
            $filter['start_date'] = date("Y-m-d", strtotime($dateRange[0]));
            $filter['end_date'] = date("Y-m-d", strtotime($dateRange[1]));  
            $query->where('payments.created_at','>=',$filter['start_date'])->where('payments.created_at','<=', $filter['end_date']);
        } else {
            $filter['start_date'] = now();
            $filter['end_date'] = now();
        }
        if(isset($request->location)){
            $filter['location'] = $request->location;
            $query->where('payments.location',$filter['location']);
        } else {
            $filter['location'] = '';
        }
        if(isset($request->payment)){
            $filter['payment'] = $request->payment;
            $query->where('payments.payment_method',$filter['payment']);
        } else {
            $filter['payment'] = '';
        }
        if(isset($request->pre_order)){
            $filter['pre_order'] = $request->pre_order;
            $query->where('payments.is_preorder',$filter['pre_order']);
        } else {
            $filter['pre_order'] = '';
        }
        if(isset($request->fraud)){
            $filter['fraud'] = $request->fraud;
            $query->where('payments.is_fraud',$filter['fraud']);
        } else {
            $filter['fraud'] = '';
        }
        if(isset($request->user)){
            $filter['user'] = $request->user;
            $query->where('payments.user_id',$filter['user']);
        } else {
            $filter['user'] = '';
        }
        if(isset($request->status)){
            $filter['status'] = $request->status;
            $query->where('payments.status',$filter['status']);
        } else {
            $filter['status'] = '';
        }
        $payments = $query->join('users','users.id','=','payments.user_id')->get();
        $locations = Location::orderBy('id','desc')->get();
        $users = User::orderBy('id','desc')->get();
        $setting = Setting::select('admin_commission')->pluck('admin_commission');
        $admin_commission = 100 - $setting[0];
        return view('admin.order-reports', compact('payments','filter','locations','users','admin_commission'));
    }
    public function book_reports(Request $request){
        $query = Book::orderBy('books.id','desc')->where('books.status',1)
        ->select('books.*','users.*','books.id as book_id')->join('users','users.id','=','books.user_id');
        if(isset($request->range)){
            $dateRange = array_map('trim', explode('-', $request->range));
            $filter['start_date'] = date("Y-m-d", strtotime($dateRange[0]));
            $filter['end_date'] = date("Y-m-d", strtotime($dateRange[1]));  
            $query->where('books.created_at','>=',$filter['start_date'])->where('books.created_at','<=', $filter['end_date']);
        } else {
            $filter['start_date'] = now();
            $filter['end_date'] = now();
        }
        if(isset($request->user)){
            $filter['user'] = $request->user;
            $query->where('books.user_id',$filter['user']);
        } else {
            $filter['user'] = '';
        }
        if(isset($request->status)){
            $filter['status'] = $request->status;
            $query->where('books.status',$filter['status']);
        } else {
            $filter['status'] = '';
        }
        $books = $query->get();
        $users = User::orderBy('id','desc')->get();
        return view('admin.book-reports', compact('users','books','filter'));
    }
    public function author_settelments(){
        return view('admin.author-settelments');
    }
    public function blog(){
        $blogs = Blog::get();
        return view('admin.blog',compact('blogs'));
    }
    public function faq(){
        return view('admin.faq');
    }
    public function packages(){
        $marketing = Marketing::get();
        return view('admin.packages', compact('marketing'));
    }
    public function system_users(){
        return view('admin.system-users');
    }
    public function settings(){
        $setting = Setting::first();
        return view('admin.settings',compact('setting'));
    }
    public function profile(){
        return view('admin.profile');
    }
    public function edit_author($id){
        $user = AuthorDetail::where('id',$id)->first();
        return view('admin.edit_author',compact('user'));
    }
    public function slider(){
        $banners = Banner::get();
        return view('admin.slider',compact('banners'));
    }
    public function ads(){
        return view('admin.ads');
    }
    public function about(){
        return view('admin.about');
    }
    public function default_policy(){
        return view('admin.default-policy');
    }
    public function privacy(){
        return view('admin.privacy');
    }
    public function content_policy(){
        return view('admin.content-policy');
    }
    public function terms(){
        return view('admin.terms');
    }
    public function affiliateNetworkAgreement(){
        return view('admin.affiliate-Network-Agreement');
    }
    public function authorsContract(){
        return view('admin.authors-Contract');
    }
    public function marketersNetworkAgreement(){
        $marketing = Marketing::get();
        return view('admin.marketers-Network-Agreement',compact('marketing'));
    }
    public function referredCustomersAgreement(){
        return view('admin.referred-Customers-Agreement');
    }
    public function sellersContractForAuthors(){
        return view('admin.sellers-Contract-For-Authors');
    }
    public function sellersContractForPublishers(){
        return view('admin.sellers-Contract-For-Publishers');
    }
    public function banks(){
        return view('admin.banks');
    }
    public function locations(){
        $locations = Location::orderBy('id','desc')->get();
        return view('admin.locations', compact('locations'));
    }
    public function coupons(){
        $coupons = Coupon::orderBy('coupons.id','desc')
        ->select('coupons.*','users.*', 'coupons.id as coupon_id')->join('users','users.id','=','coupons.user_id')->get();
        $books = Book::where('status',1)->get();
        return view('admin.coupons', compact('coupons','books'));
    }
    public function view_book_detail($id){
        $book = Book::where('id',$id)->first();
        $genre = SubGenre::where('id', $book->genre)->first();
        $extras = ExtraField::where('book_id',$id)->get();
        return view('admin.view_book_detail', compact('book', 'genre', 'extras'));
    }
    public function book_field_detail($id){
        $extras = ExtraField::where('book_id',$id)->get();
        return view('admin.book_field_detail', compact('extras'));
    }
    public function export_detail(Request $request){
        $fields = implode("','",explode(',',$request->fields));
        dd($fields);
        $extras = DB::table($request->table)->select($fields)->get();
        // return view('admin.book_field_detail', compact('extras'));
    }
    public function view_order_detail($id){
        $payment = Payment::where('id',$id)->first();
        $orders = Order::where('payment_id', $payment->id)->get();
        $user = User::where('id', $payment->user_id)->first();
        return view('admin.view_order_detail', compact('payment', 'orders', 'user'));
    }
    public function genre(){
        $genres = Genre::get();
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = $_GET['id'];
            if($id){
                $genre = Genre::find($id);
            }
        } else {
            $genre = '';
        }
        return view('admin.genre',compact('genres','genre'));
    }
    public function sub_genre(){
        $genres = Genre::get();
        $sub_genres = DB::table('sub_genres')
        ->select('sub_genres.*','genres.title as genre_title')
        ->join('genres','genres.id', '=', 'sub_genres.genre_id')
        ->get();
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = $_GET['id'];
            if($id){
                $sub_genre = SubGenre::find($id);
            }
        } else {
            $sub_genre = '';
        }
        return view('admin.sub-genre',compact('sub_genres','genres','sub_genre'));
    }
    public function delete_author($id){
        AuthorDetail::where('user_id',$id)->delete();
        User::where('id',$id)->delete();
        return back()->with('message', ['text'=>'User has been deleted permanently','type'=>'success']);
    }
    public function delete_affiliate($id){
        Affiliate::where('user_id',$id)->delete();
        User::where('id',$id)->delete();
        return back()->with('message', ['text'=>'User has been deleted permanently','type'=>'success']);
    }
    public function delete_pos($id){
        Pos::where('user_id',$id)->delete();
        User::where('id',$id)->delete();
        return back()->with('message', ['text'=>'User has been deleted permanently','type'=>'success']);
    }
    
    public function author_profile_update(Request $request, $id){
        unset($request->_token);
        $user = AuthorDetail::firstOrNew(array('id' => $id));
        if($request->cover != null){
            $coverImage = time().'.'.$request->cover->extension();
            $request->cover->move(public_path('images/authors'), $coverImage);
            $user->cover = 'images/authors/'.$coverImage;
        } else {
            unset($user->cover);
        }
        sleep(1);
        if($request->profile != null){
            $profileImage = time().'.'.$request->profile->extension();
            $request->profile->move(public_path('images/authors'), $profileImage);
            $user->profile = 'images/authors/'.$profileImage;
        } else {
            unset($user->profile);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->biography = $request->biography;
        $user->achievement = $request->achievement;
        $user->website = $request->website;
        $user->facebook = $request->facebook;
        $user->instagram = $request->instagram;
        $user->payment = $request->payment;
        if($request->payment == 'mobile_money'){
            $user->account_name = $request->account_name;
            $user->account_number = $request->account_number;
            $user->networks = $request->networks;

            $user->bank_account_name = '';
            $user->bank_account_number = '';
            $user->branch = '';
            $user->bank_name = '';
        } elseif($request->payment == 'bank_settelments'){
            $user->bank_account_name = $request->bank_account_name;
            $user->bank_account_number = $request->bank_account_number;
            $user->branch = $request->branch;
            $user->bank_name = $request->bank_name;

            $user->account_name = '';
            $user->account_number = '';
            $user->networks = '';
        }
        $user->cover_type = $request->cover_type;
        $user->twitter = $request->twitter;
        $user->save();

        Session::flash('message', ['text'=>'Author data has been updated','type'=>'success']);
        return back()->with('success','You have successfully upload image.');
    }
    public function edit_book($id){
        // $data = json_encode(['Text One', 'Text Two', 'Text Three']);
        // $jsongFile = time() . '_file.json';
        // Storage::disk('public')->put($jsongFile, json_encode($data));
        // return Storage::disk('public')->download($jsongFile);

        $genres = Genre::with('subgenres')->get(); 
        $authors = User::where('id','!=',Auth::id())->where('role','author')->get();
        $book = Book::where('id',$id)->first();
        $sub_authors_list = explode(',',$book->sub_author);
        $sub_authors = User::whereIn('id',$sub_authors_list)->get();
        $extras = ExtraField::where('book_id',$id)->get();
        return view('admin.edit-book', compact('genres', 'authors', 'book', 'sub_authors', 'extras'));
    }
    public function add_book(Request $request){
        $genres = Genre::with('subgenres')->get(); 
        $authors = User::where('role','author')->get();
        return view('admin.add-book', compact('genres', 'authors'));
    }
    public function update_book_status(Request $request){
        $id = $request->id;
        $value = $request->value;
        $column = $request->column;
       
        $is_updated = Book::where('id',$id)->update([$column => $value]);
        if($is_updated){
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function update_campaign_status(Request $request){
        $id = $request->id;
        $value = $request->value;
        $column = $request->column;
        $old_price = $request->old_price;
       
        $is_updated = Book::where('id',$id)->update([$column => $value, 'old_price' => $old_price]);
        if($is_updated){
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function delete_user(Request $request, $id){
        User::where('id',$id)->delete();
        return back()->with('message', ['text'=>'User has been deleted','type'=>'danger']);
    }
    public function delete_marketing(Request $request, $id){
        Marketing::where('id',$id)->delete();
        return back()->with('message', ['text'=>'Marketing data has been deleted','type'=>'danger']);
    }
    public function delete_banner(Request $request, $id){
        Banner::where('id',$id)->delete();
        return back()->with('message', ['text'=>'Banner has been deleted','type'=>'danger']);
    }
    public function update_setting(Request $request){
        $data = $request->all();
        unset($data['_token']);
        $trainee = Setting::findOrFail(1);
        $trainee->fill($data)->save();
        return back()->with('message', ['text'=>'Setting been updated','type'=>'success']);
    }
    public function edit_marketing($id){
        $marketing = Marketing::find($id);
        return view('admin.update.edit-marketing', compact('marketing'));
    }
    public function update_marketing(Request $request, $id){
        $data = $request->all();
        unset($data['_token']);
        $point = serialize($data['point']);
        unset($data['point']);
        $market = Marketing::find($id);
        $market->package = $data['package'];
        $market->price = $data['price'];
        $market->duration = $data['duration'];
        $market->point = $point;
        $market->save();
        return back()->with('message', ['text'=>'Marketing data has been saved','type'=>'success']);
    }
    public function add_marketing(Request $request){
        $data = $request->all();
        unset($data['_token']);
        $point = serialize($data['point']);
        unset($data['point']);
        $market = new Marketing;
        $market->package = $data['package'];
        $market->price = $data['price'];
        // $market->duration = $data['duration'];
        $market->point = $point;
        $market->save();
        return back()->with('message', ['text'=>'Marketing data has been saved','type'=>'success']);
    }
    public function add_banner(Request $request){
        $banner = New Banner();
        if($request->banner != null){
            $bannerImage = time().'.'.$request->banner->extension();
            $request->banner->move(public_path('images/banners'), $bannerImage );
            $banner->banner = 'images/banners/'.$bannerImage ;
        } else {
            unset($banner->banner);
        }
        $banner->type = $request->type;
        $banner->title = $request->title;
        $banner->month = $request->month;
        $banner->category = 'Hero Banner';
        $banner->save();
        return back()->with('message', ['text'=>'Banner data has been saved','type'=>'success']);
    }
    public function add_location(Request $request){
        $validation = [
            'location' => 'required|unique:locations'
        ];
        $validator = Validator::make($request->all(), $validation);
        if($validator->fails()) {
            return back()->with('message', ['text'=>$validator->errors(),'type'=>'danger']);
        }
        $location = new Location();
        $location->weight = $request->min_weight.'-'.$request->max_weight;
        $location->location = $request->location;
        $location->price = $request->price;
        $location->type = $request->type;
        $location->is_cod = $request->is_cod;
        $location->save();
        return back()->with('message', ['text'=>'Location added successfully!','type'=>'success']);
    }
    public function delete_location($id){
        Location::where('id',$id)->delete();
        return back()->with('message', ['text'=>'Location has been deleted','type'=>'success']);
    }
    public function add_coupon(Request  $request){
        $validation = [
            'code' => 'required|unique:coupons',
            'start_date' => 'required|date',
            'end_date' => 'date|after:start_date',
            'off' => 'required',
        ];
        $validator = Validator::make($request->all(), $validation);
        if($validator->fails()) {
            return back()->with('message', ['text'=>$validator->errors(),'type'=>'danger']);
        }
        $coupon = new Coupon();
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->code = $request->code;
        $coupon->off = $request->off;
        $coupon->book_id = serialize($request->bookId);
        $coupon->user_id = Auth::id();
        if(Auth::user()->role == 'admin'){
            $coupon->is_active = 1;
        } else {
            $coupon->is_active = 0;
        }
        $coupon->save();
        return back()->with('message', ['text'=>'Coupon added successful!','type'=>'success']);
    }
    public function delete_coupon($id){
        Coupon::where('id',$id)->delete();
        return back()->with('message', ['text'=>'Coupon has been deleted','type'=>'success']);
    }
    public function update_coupon_status($id){
        Coupon::where('id',$id)->update(['is_active'=>1]);
        return back()->with('message', ['text'=>'Update Successsful','type'=>'success']);
    }
    public function skills(){
        $skills = Skill::orderBy('id','desc')->with('users')->get();
        return view('admin.skills',compact('skills'));
    }
    public function edit_skill($id){
        $skill = Skill::orderBy('id','desc')->where('id',$id)->first();
        return view('admin.update.edit-skill',compact('skill'));
    }
    public function update_skill(Request $request, $id){
        $validation = [
            'skill' => 'required|unique:skills'
        ];
        $validator = Validator::make($request->all(), $validation);
        if($validator->fails()) {
            return back()->with('message', ['text'=>$validator->errors(),'type'=>'danger']);
        }
        $skill = Skill::find($id);
        $skill->skill = $request->skill;
        $skill->user_id = Auth::id();
        $skill->save();
        return back()->with('message', ['text'=>'Skill updated successfully!','type'=>'success']);
    }
    public function edit_coupon($id){
        $coupon = Coupon::orderBy('id','desc')->where('id',$id)->first();
        $books = Book::where('status',1)->get();
        $role = Auth::user()->role;
        if($role == 'author'){
            $role = 'user';
        }
        return view('admin.update.edit-coupon',compact('books','coupon','role'));
    }
    public function update_coupon(Request $request, $id){
        $validation = [
            'code' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'date|after:start_date',
            'off' => 'required',
        ];
        $validator = Validator::make($request->all(), $validation);
        if($validator->fails()) {
            return back()->with('message', ['text'=>$validator->errors(),'type'=>'danger']);
        }
        $coupon = Coupon::find($id);
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->code = $request->code;
        $coupon->off = $request->off;
        $coupon->book_id = serialize($request->bookId);
        if(Auth::user()->role == 'admin'){
            $coupon->is_active = 1;
        } else {
            $coupon->is_active = 0;
        }
        $coupon->save();
        return back()->with('message', ['text'=>'Coupon updated successfully!','type'=>'success']);
    }
    public function add_skills(Request $request){
        $validation = [
            'skill' => 'required|unique:skills'
        ];
        $validator = Validator::make($request->all(), $validation);
        if($validator->fails()) {
            return back()->with('message', ['text'=>$validator->errors(),'type'=>'danger']);
        }
        $skill = new Skill();
        $skill->skill = $request->skill;
        $skill->user_id = Auth::id();
        $skill->save();
        return back()->with('message', ['text'=>'Skill added successfully!','type'=>'success']);
    }
    public function delete_skill($id){
        Skill::where('id',$id)->delete();
        return back()->with('message', ['text'=>'Skill has been deleted','type'=>'success']);
    }
    public function assign_job(){
        $users = User::where('role','consultant')->get();
        $marketings = MarketOrders::orderBy('id','desc')->with('marketing_detail')->get();
        $jobs = Job::where('job_status',0)->orderBy('id','desc')
        ->with('marketing')->with('user')->with('consultant')->get();
        return view('admin.assign-job', compact('users', 'marketings', 'jobs'));
    }
    public function active_jobs(){
        $users = User::where('role','consultant')->get();
        $marketings = MarketOrders::orderBy('id','desc')->with('marketing_detail')->get();
        $jobs = Job::where('job_status',1)->where('is_completed',0)->orderBy('id','desc')
        ->with('marketing')->with('user')->with('consultant')->get();
        return view('admin.active-job', compact('users', 'marketings', 'jobs'));
    }
    public function completed_jobs(){
        $users = User::where('role','consultant')->get();
        $marketings = MarketOrders::orderBy('id','desc')->with('marketing_detail')->get();
        $jobs = Job::where('job_status',1)->where('is_completed',1)->orderBy('id','desc')
        ->with('marketing')->with('user')->with('consultant')->get();
        $setting = Setting::first();
        return view('admin.completed-job', compact('users', 'marketings', 'jobs','setting'));
    }
    public function add_assign_job(Request $request){
        $request->validate([
            'user_id' => 'required',
            'marketing_id' => 'required',
            'admin_note' => 'required',
        ]);
        $job = new Job();
        $job->user_id = $request->user_id;
        $job->assign_to = $request->assign_to;
        $job->marketing_id = $request->marketing_id;
        $job->admin_note = $request->admin_note;
        $user = User:: where('id',$request->id)->first();
        if($job->save()){
            $user_detail = User::where('id',$request->assign_to)->first();

            $data['title'] = 'Job Assigned';
            $data['body'] = 'Congratulations!. New job has been assigned to you';
            $data['body'] .= ' Click on below link to view the job!';
            $data['link'] = "consultant.jobs";
            $data['linkText'] = "View";
            $data['to'] = $user_detail->email;
            $data['username'] = $user_detail->name;
            Mail::send('email', $data,function ($m) use ($data) {
                $m->to($data['to'])->subject('New Job Assigned!');
            });
            return back()->with('message', ['text'=>'Job has been added','type'=>'success']);
        } else {
            return back()->with('message', ['text'=>'Oops! something web wrong','type'=>'danger']);
        }
    }
    public function remove_job($id){
        Job::where('id',$id)->delete();
        return back()->with('message', ['text'=>'Job has been remived successfully!','type'=>'success']);
    }
    public function update_payment_status($id){
        Payment::where('id',$id)->update(['status' => 'successfull']);
        $order_id = Order::where('payment_id',$id)->select('id')->pluck('id')->toArray();
        Revenue::whereIn('order_id',$order_id)->update(['payment_status'=>1]);
        return back()->with('message', ['text'=>'Payment has been approved!','type'=>'success']);
    }
    public function get_revenue_per_order(Request $request){
        $id = $request->id;
        $order_id = Order::where('payment_id',$id)->select('id')->pluck('id')->toArray();
        $data['revenues'] = Revenue::whereIn('order_id',$order_id)->with('user')->get();
        return response()->json(view('admin.revenue_per_order', $data)->render());
    }
    public function update_consultant(Request $request, $id){
        $user = Consultant::where('id',$id)->first();
        $skills = Skill::orderBy('id','desc')->get();
        return view('admin.edit_consultant',compact('skills','user'));
    }
    public function update_general_user(Request $request, $id){
        $user = User::where('id',$id)->first();
        return view('admin.update.update-general-user',compact('user'));
    }
    public function update_general_users(Request $request, $id){
        $validation = [
            'email' => 'required|unique:users'
        ];
        $validator = Validator::make($request->all(), $validation);
        if($validator->fails()) {
            return back()->with('message', ['text'=>$validator->errors(),'type'=>'danger']);
        }
        $user = User::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return back()->with('message', ['text'=>'User data has been updated!','type'=>'success']);
    }
    public function edit_publisher(Request $request, $id){
        $user = DB::table('publishers')->where('id',$id)->first();
        return view('admin.update.update-publisher',compact('user'));
    }
    public function edit_location(Request $request, $id){
        $location = Location::where('id',$id)->first();
        return view('admin.update.update-location',compact('location'));
    }
    public function add_blog(Request $request){
        $blog = New Blog;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->long_description = $request->long_description;
        if($request->image != null){
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/blogs'), $image);
            $blog->image = 'images/blogs/'.$image;
        } else {
            unset($blog->image);
        }
        $blog->save();
        return back()->with('message', ['text'=>'Blog added successfully!','type'=>'success']);
    }
    public function edit_blog(Request $request, $id){
        $blog = Blog::find($id);
        return view('admin.update.edit-blog',compact('blog'));
    }
    public function delete_blog($id){
        Blog::where('id',$id)->delete();
        return back()->with('message', ['text'=>'Blog has been deleted','type'=>'success']);
    }
    public function update_blog(Request $request, $id){
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->long_description = $request->long_description;
        if(isset($request->image) && $request->image != null){
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/blogs'), $image);
            $blog->image = 'images/blogs/'.$image;
        } else {
            unset($blog->image);
        }
        $blog->save();
        return back()->with('message', ['text'=>'Blog added successfully!','type'=>'success']);
    }
    public function update_location(Request $request, $id){
        $location = Location::find($id);
        $location->weight = $request->min_weight.'-'.$request->max_weight;
        $location->location = $request->location;
        $location->price = $request->price;
        $location->type = $request->type;
        $location->is_cod = $request->is_cod;
        $location->save();
        return back()->with('message', ['text'=>'Location added successfully!','type'=>'success']);
    }
    public function approve_author($id){
        $user_detail = AuthorDetail::find($id);
        $user_detail->status = 1;
        $user_detail->save();
        $data['title'] = 'Job Assigned';
        $data['body'] = 'Congratulations!. Cowriehub has approved you as an author';
        $data['body'] .= ' Click on below link to explore more as an author!';
        $data['link'] = "author.profile.edit";
        $data['linkText'] = "View";
        $data['to'] = auth()->user()->email;
        $data['username'] = auth()->user()->name;
        Mail::send('email', $data,function ($m) use ($data) {
            $m->to($data['to'])->subject('New role assigned!');
        });
        return back()->with('message', ['text'=>'Author role has been updated','type'=>'success']);
    }
    public function approve_affiliate($id){
        $user_detail = Affiliate::find($id);
        $user_detail->status = 1;
        $user_detail->save();
        $data['title'] = 'Job Assigned';
        $data['body'] = 'Congratulations!. Cowriehub has approved you as an affiliate';
        $data['body'] .= ' Click on below link to explore more as an affiliate!';
        $data['link'] = "affiliate";
        $data['linkText'] = "View";
        $data['to'] = auth()->user()->email;
        $data['username'] = auth()->user()->name;
        Mail::send('email', $data,function ($m) use ($data) {
            $m->to($data['to'])->subject('New role assigned!');
        });
        return back()->with('message', ['text'=>'Affiliate role has been updated','type'=>'success']);
    }
    public function approve_pos($id){
        $user_detail = Pos::find($id);
        $user_detail->status = 1;
        $user_detail->save();
        $data['title'] = 'Job Assigned';
        $data['body'] = 'Congratulations!. Cowriehub has approved you as an POS';
        $data['body'] .= ' Click on below link to explore more as an POS!';
        $data['link'] = "pos";
        $data['linkText'] = "View";
        $data['to'] = auth()->user()->email;
        $data['username'] = auth()->user()->name;
        Mail::send('email', $data,function ($m) use ($data) {
            $m->to($data['to'])->subject('New role assigned!');
        });
        return back()->with('message', ['text'=>'POS role has been updated','type'=>'success']);
    }
    public function edit_pos($id){
        $user = Pos::where('id',$id)->first();
        return view('admin.update.edit_pos',compact('user'));
    }
    public function update_about_banner(Request $request){
        if($request->about_banner != null){
            $profileImage = time().'.'.$request->about_banner->extension();
            $request->about_banner->move(public_path('images/authors'), $profileImage);
            $about_banner = 'images/authors/'.$profileImage;
            Setting::where('id',1)->update(['about_banner' => $about_banner]);
        }
        return back()->with('message', ['text'=>'POS role has been updated','type'=>'success']);
    }
    public function all_subscribers(){
        $users = Subscriber::orderby('id','desc')->get();
        return view('admin.subscribers',compact('users'));
    }
    public function all_contacts(){
        $users = Contact::orderby('id','desc')->get();
        return view('admin.contacts',compact('users'));
    }
    public function support(){
        $setting = Setting::first();
        return view('admin.support',compact('setting'));
    }
}