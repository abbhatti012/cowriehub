<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
use App\Models\Coupon;
use App\Models\Payment;
use App\Models\Revenue;
use App\Models\SubGenre;
use App\Models\Wishlist;
use App\Models\AuthorDetail;
use App\Models\MarketOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(){
        return view('user.index');
    }
    public function author_account(){
        return view('front.author.author_account');
    }
    public function publisher_account(){
        $user = DB::table('publishers')->where('user_id',Auth::id())->first();
        return view('publisher.publisher_account',compact('user'));
    }
    public function affiliate_account(){
        return view('front.author.affiliate_account');
    }
    public function consultant_account(){
        return view('front.author.consultant_account');
    }
    public function pos(){
        return view('front.author.pos');
    }
    public function author_profile_edit(){
        $user = DB::table('author-detail')->where('user_id',Auth::id())->first();
        return view('user.author.my-profile',compact('user'));
    }
    public function wishlist(){
        $wishlist = Wishlist::where('wishlist.user_id',Auth::id())
        ->select('wishlist.*','books.*','wishlist.id as wish_id')
        ->join('books','books.id','=','wishlist.book_id')
        ->get();
        $role = auth()->user()->role;
        if($role == 'author'){
            $role  = 'user';
        }
        return view('user.wishlist',compact('wishlist','role'));
    }
    public function save_address(){
        $user = AuthorDetail::where('user_id',Auth::id())->first();
        if(isset($user->billing_detail)){
            $billing = unserialize($user->billing_detail);
        } else {
            $billing = [];
        }
        if(isset($user->shipping_detail)){
            $shipping = unserialize($user->shipping_detail);
        } else {
            $shipping = [];
        }
      
        $role = auth()->user()->role;
        if($role == 'author'){
            $role  = 'user';
        }
        return view('user.address', compact('user','billing','shipping', 'role'));
    }
    public function author_books(){
        $books = Book::where('user_id',Auth::id())
        ->select('books.*', 'sub_genres.title as genre_title')
        ->join('sub_genres','sub_genres.id','=','books.genre')->get();
        return view('user.books', compact('books'));
    }
    public function author_marketing(){
        $orders = MarketOrders::orderBy('marketing_orders.id','desc')
        ->select('marketing.*','marketing_orders.*','marketing_orders.id as market_id')
        ->join('marketing','marketing.id','=','marketing_orders.marketing_id')
        ->where('marketing_orders.user_id', Auth::id())
        ->get();
        return view('user.marketing', compact('orders'));
    }
    public function author_sales(Request $request){
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
        
        return view('user.author.sales',compact('userArr','filter'));
    }
    public function author_profile_update(Request $request){
        unset($request->_token);
        // $request->validate([
        //     'biography' => 'required',
        //     'name' => 'required',
        // ]);
        $userCheck = User::where('id',Auth::id())->first();
      
        if($userCheck->role != 'user' && $userCheck->role != 'author'){
            Session::flash('message', ['text'=>'You cannot be an author','type'=>'danger']);
            return back();
        }
        $user = AuthorDetail::firstOrNew(array('user_id' => Auth::id()));
       
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
        $user->user_id = Auth::id();
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

        User::where('id',Auth::id())->update(array('role'=>'author'));
        Session::flash('message', ['text'=>'Congratulations! You are an author now','type'=>'success']);
        return back()->with('success','You have successfully upload image.');
    }
    public function autocomplete(Request $request){
        $data = User::select("id", "name")
                ->where("name","LIKE","%{$request->input('query')}%")
                ->where('role','author')
                ->where('id','!=',Auth::id())
                ->get();
        return response()->json($data);
    }
    public function search_author(){
        return view('user.consultant.search-author');
    }
    public function dashboard(Request $request){
        $id = Auth::id();
        if(isset($request->date) && !empty($request->date)){
            $date = explode(' - ',$request->date);
            $start_date = date('Y-m-d',strtotime($date[0]));
            $end_date = date('Y-m-d',strtotime($date[1]));
            $date = [0=>$start_date,1=>$end_date];
            $books = Book::where('user_id',$id)->whereBetween('created_at',$date)->count();
            $approved_books = Book::where('user_id',$id)->whereBetween('created_at',$date)->where('status',1)->count();
            $orders = Revenue::where('user_id',$id)->whereBetween('created_at',$date)->count();
            $check = User::where('id',$id)->whereBetween('created_at',$date)->first();
            $graphOrders = Revenue::select('*')
            ->whereBetween('created_at',$date)->where('user_id',$id);
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
            $books = Book::where('user_id',$id)->count();
            $approved_books = Book::where('user_id',$id)->where('status',1)->count();
            $orders = Payment::where('user_id',$id)->count();
            $check = User::where('id',$id)->select('checkin','checkout')->first();

            $query_date = date('Y-m-d',strtotime(now()));
            $start_date = date('Y-m-01', strtotime($query_date));
            $end_date = date('Y-m-t', strtotime($query_date));

            $graphOrders = Revenue::select('*')
            ->where('created_at', '>=' ,$start_date)
            ->where('created_at', '<' ,$end_date)->where('user_id',$id);
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
        return view('user.dashboard',compact('books','orders','approved','pending','approved_books','check','graph_data'));
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
    public function coupons(){
        $coupons = Coupon::orderBy('coupons.id','desc')->where('coupons.user_id',Auth::id())
        ->select('coupons.*','users.*', 'coupons.id as coupon_id')->join('users','users.id','=','coupons.user_id')->get();
        $books = Book::where('status',1)->where('user_id',Auth::id())->get();
        return view('user.author.coupons',compact('coupons','books'));
    }
    public function logout(Request $request) {
        $data = User::find(Auth::id());
        $data->checkout = $data->checkout + 1;
        $data->save();
        Auth::logout();
        return redirect('/login');
    }
    public function revenue(){
        $revenues = Revenue::where('user_id',Auth::id())->where('payment_status',1)->with('user')->get();
        return view('user.author.revenue', compact('revenues'));
    }
}