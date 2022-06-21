<?php

namespace App\Http\Controllers\Admin;

use App\Models\c;
use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
use App\Models\Order;
use App\Models\Skill;
use App\Models\Banner;
use App\Models\Coupon;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\Location;
use App\Models\SubGenre;
use App\Models\Marketing;
use App\Models\Consultant;
use App\Models\AuthorDetail;
use App\Models\MarketOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function author(){
        $authors = User::where('role','author')
        ->join('author-detail','author-detail.user_id','=','users.id')
        ->select(
            'users.*',
            'author-detail.email as work_email',
            'author-detail.id as author_id',
            'author-detail.user_id as user_id',
            'author-detail.cover as cover')
        ->get();
        return view('admin.author', compact('authors'));
    }
    public function consultant(){
        $consultants = Consultant::orderBy('id','desc')->with('marketing')->get();
        $jobs = MarketOrders::orderBy('marketing_orders.id','desc')
        ->select('marketing.*','marketing_orders.*','marketing_orders.id as market_id')
        ->where('marketing_orders.job_type','!=',1)
        ->join('marketing','marketing.id','=','marketing_orders.marketing_id')->get();
        $setting = Setting::first();
        return view('admin.consultant',compact('consultants','jobs','setting'));
    }
    public function general_user(){
        $users = User::where('role','user')->get();
        return view('admin.general-user',compact('users'));
    }
    public function publisher(){
        return view('admin.publisher');
    }
    public function pos(){
        return view('admin.pos');
    }
    public function affiliates(){
        return view('admin.affiliates');
    }
    public function books(){
        $books = Book::orderBy('id','desc')->get();
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
        return view('admin.blog');
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
        return view('admin.view_book_detail', compact('book', 'genre'));
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
        return back()->with('message', ['text'=>'Author data has been updated','type'=>'success']);
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
        $genres = Genre::with('subgenres')->get(); 
        $authors = User::where('id','!=',Auth::id())->where('role','author')->get();
        $book = Book::where('id',$id)->first();
        $sub_authors_list = explode(',',$book->sub_author);
        $sub_authors = User::whereIn('id',$sub_authors_list)->get();
        return view('admin.edit-book', compact('genres', 'authors', 'book', 'sub_authors'));
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
        return back()->with('message', ['text'=>'User data has been updated','type'=>'danger']);
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
        return back()->with('message', ['text'=>'User data has been updated','type'=>'success']);
    }
    public function add_marketing(Request $request){
        $data = $request->all();
        unset($data['_token']);
        $point = serialize($data['point']);
        unset($data['point']);
        $market = new Marketing;
        $market->package = $data['package'];
        $market->price = $data['price'];
        $market->duration = $data['duration'];
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
        return back()->with('message', ['text'=>'Coupon added successfully!','type'=>'success']);
    }
    public function delete_coupon($id){
        Coupon::where('id',$id)->delete();
        return back()->with('message', ['text'=>'Coupon has been deleted','type'=>'success']);
    }
    public function update_coupon_status($id){
        Coupon::where('id',$id)->update(['is_active'=>1]);
        return back()->with('message', ['text'=>'Coupon has been activated','type'=>'success']);
    }
    public function skills(){
        $skills = Skill::orderBy('id','desc')->with('users')->get();
        return view('admin.skills',compact('skills'));
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
} 