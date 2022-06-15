<?php

namespace App\Http\Controllers;

use App\Models\AuthorDetail;
use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
use App\Models\Banner;
use App\Models\Location;
use App\Models\Review;
use App\Models\Setting;
use App\Models\Marketing;
use App\Models\Wishlist;
use App\Models\MarketOrders;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        
    }
    public function index(){
        $query = Book::select('books.*','books.id as book_id','users.*','users.id as author_id','sub_genres.title as genre_title')
        ->orderBy('books.book_purchased','desc')->where('books.status',1)->where('books.book_purchased','!=',0)
        ->where('books.hard_allow_preorders','!=',1)
        ->where('books.paper_allow_preorders','!=',1)
        ->join('users','users.id','=','books.user_id')
        ->join('sub_genres','sub_genres.id','=','books.genre');
        $data['best_selling'] = $query->limit(10)->get();
        $query = Book::select('books.*','books.id as book_id','users.*','users.id as author_id','sub_genres.title as genre_title')
        ->orderBy('books.id','desc')->where('books.status',1)
        ->join('users','users.id','=','books.user_id')
        ->join('sub_genres','sub_genres.id','=','books.genre');
        $data['featured'] = $query->where('books.is_featured',1)->limit(10)->get();
        $query = Book::select('books.*','books.id as book_id','users.*','users.id as author_id','sub_genres.title as genre_title')
        ->orderBy('books.id','desc')->where('books.status',1)
        ->join('users','users.id','=','books.user_id')
        ->join('sub_genres','sub_genres.id','=','books.genre');
        $data['sales'] = $query->where('books.is_sale',1)->limit(10)->get();
        $query = Book::select('books.*','books.id as book_id','users.*','users.id as author_id','sub_genres.title as genre_title')
        ->orderBy('books.id','desc')->where('books.status',1)
        ->join('users','users.id','=','books.user_id')
        ->join('sub_genres','sub_genres.id','=','books.genre');
        $data['viewed'] = $query->where('books.is_most_viewed',1)->limit(10)->get();
        $query = Book::select('books.*','books.id as book_id','users.*','users.id as author_id','sub_genres.title as genre_title')
        ->orderBy('books.id','desc')->where('books.status',1)
        ->join('users','users.id','=','books.user_id')
        ->join('sub_genres','sub_genres.id','=','books.genre');
        $data['new_release'] = $query->where('books.is_new',1)->limit(3)->get();
        $query = Book::select('books.*','books.id as book_id','users.*','users.id as author_id','sub_genres.title as genre_title')
        ->orderBy('books.id','desc')->where('books.status',1)
        ->join('users','users.id','=','books.user_id')
        ->join('sub_genres','sub_genres.id','=','books.genre');
        $data['biographies'] = $query->where('books.is_biographies',1)->limit(10)->get();
        
        $query = Book::select('books.*','books.id as book_id','users.*','users.id as author_id','sub_genres.title as genre_title')
        ->orderBy('books.id','desc')->where('books.status',1)
        ->join('users','users.id','=','books.user_id')
        ->join('reviews','reviews.book_id','=','books.id')
        ->join('sub_genres','sub_genres.id','=','books.genre');

        $data['marketer_picks'] = $query->where('books.is_biographies',1)
        ->where('reviews.type','marketer')
        ->where('rate','>=',3)
        ->limit(10)->get();
        
        $query = Book::select('books.*','books.id as book_id','users.*','users.id as author_id','sub_genres.title as genre_title')
        ->orderBy('books.id','desc')->where('books.status',1)
        ->join('users','users.id','=','books.user_id')
        ->join('sub_genres','sub_genres.id','=','books.genre');
        
        $data['preorder'] = $query->where('books.hard_allow_preorders',1)
        ->orWhere('books.paper_allow_preorders',1)
        ->limit(10)->get();
        
        $data['authors'] = User::where('users.role','author')
        ->select('users.*','author-detail.profile as profile')
        ->join('author-detail','author-detail.user_id','=','users.id')
        ->with('books_published')
        ->get();

        // $data = DB::table('books')
        //     ->where('status',1)
        //     ->orWhere(function ($query) {
        //         $query->where('is_featured', 1);
        //     })
        //     ->get();
        // dd($data);
        $data['setting'] = Setting::first();
        $start_date = $data['setting']->start_date;
        $end_date = $data['setting']->end_date;
        $start_time = $data['setting']->start_time;
        $end_time = $data['setting']->end_time;
        if($start_date.''.$start_time > $end_date.' '.$end_time){
            $data['is_campaign'] = false;
        } else {
            $data['is_campaign'] = true;
        }
        $query = Book::select('books.*','books.id as book_id','users.*','users.id as author_id','sub_genres.title as genre_title')
        ->orderBy('books.id','asc')->where('status',1)
        ->join('users','users.id','=','books.user_id')
        ->join('sub_genres','sub_genres.id','=','books.genre');
        $data['campaign'] = $query->where('books.is_campaign',1)->get();
        $data['genres'] = Genre::get();
        $data['banners'] = Banner::get();
        return view('front.index',compact('data'));
    }
    public function add_marketing_orders(Request $request){
        if(!Auth::check()){
            return redirect('/login')->with('message', ['text'=>'Pleas login first to proceed','type'=>'warning']);
        }
        $market = new MarketOrders();
        $market->user_id = Auth::user()->id;
        $market->first_name = $request->first_name;
        $market->last_name = $request->last_name;
        $market->email = $request->email;
        $market->phone = $request->phone;
        $market->notes = $request->notes;
        $market->marketing_id = $request->marketing_id;
        $market->save();
        return back()->with('message', ['text'=>'Your data has been saved. Someone will surely contact you soon on it!','type'=>'success']);
    }
    public function shop(){
        $genres = Genre::with('subgenres')->get();
        $users = User::where('role','author')->get();
        return view('front.shop', compact('genres', 'users'));
    }
    public function product($slug){
        $book = Book::where('slug',$slug)->first();
        $author = User::where('id',$book->user_id)->first();
        $reviews = Review::where('book_id',$book->id)
        ->select('*')
        ->addSelect(DB::raw('(CASE WHEN rate = 5 THEN 1 ELSE 0 END) AS five_star'))
        ->addSelect(DB::raw('(CASE WHEN rate = 4 THEN 1 ELSE 0 END) AS four_star'))
        ->addSelect(DB::raw('(CASE WHEN rate = 3 THEN 1 ELSE 0 END) AS three_star'))
        ->addSelect(DB::raw('(CASE WHEN rate = 2 THEN 1 ELSE 0 END) AS two_star'))
        ->addSelect(DB::raw('(CASE WHEN rate = 1 THEN 1 ELSE 0 END) AS one_star'))
        ->get();
        $rate = 0;
        $five_star = 0;
        $four_star = 0;
        $three_star = 0;
        $two_star = 0;
        $one_star = 0;
        for($i = 0; $i < count($reviews); $i++){
            $rate += $reviews[$i]->rate;
            $five_star += $reviews[$i]->five_star;
            $four_star += $reviews[$i]->four_star;
            $three_star += $reviews[$i]->three_star;
            $two_star += $reviews[$i]->two_star;
            $one_star += $reviews[$i]->one_star;
        }
        $data['five_star'] = $five_star;
        $data['four_star'] = $four_star;
        $data['three_star'] = $three_star;
        $data['two_star'] = $two_star;
        $data['one_star'] = $one_star;
        if(count($reviews) == 0){
            $total_reviews = 1;
        } else {
            $total_reviews = count($reviews);
        }
        $data['rate'] = round($rate / $total_reviews);
        $cart = session()->get('cart');
        if(Auth::id()){
            $wishlist = Wishlist::where('user_id',Auth::id())->where('book_id', $book->id)->get();
            $wishlist = count($wishlist);
        } else {
            $wishlist = 0;
        }
        $locations = Location::orderBy('id','desc')->get();
        return view('front.product',compact('book', 'author', 'reviews', 'data', 'cart', 'wishlist','locations'));
    }
    public function cart(){
        $data['locations'] = Location::orderBy('id','desc')->get();
        $cart_page = view('front.cart_item', $data)->render(); 
        return view('front.cart', compact('cart_page'));
    }
    public function wishlist(){
        $wishlist = Wishlist::where('wishlist.user_id',Auth::id())
        ->select('wishlist.*','books.*','wishlist.id as wish_id')
        ->join('books','books.id','=','wishlist.book_id')
        ->get();
        $wishlist_item = view('front.wishlist_item', compact('wishlist'))->render();
        return view('front.wishlist', compact('wishlist_item'));
    }
    public function checkout(){
        $token = $_GET['token'];
        $payment = Payment::where('token', $token)->first();
        $user = AuthorDetail::where('user_id',Auth::id())->first();
        $billing = unserialize($user->billing_detail);
        $shipping = unserialize($user->shipping_detail);
        $location = Location::where('location',$payment->location)->first();
        return view('front.checkout', compact('payment','billing','shipping','location'));
    }
    public function my_account(){
        $user = AuthorDetail::where('user_id',Auth::id())->first();
        $billing = unserialize($user->billing_detail);
        $shipping = unserialize($user->shipping_detail);
        if(!$billing){
            $billing = [];
        }
        if(!$shipping){
            $shipping = [];
        }
        return view('front.my-account', compact('user','billing','shipping'));
    }
    public function about_us(){
        return view('front.about-us');
    }
    public function authors_list(){
        if(isset($_GET['param'])){
            $param = $_GET['param'];
        } else {
            $param = '';
        }
        $authors = User::where('users.role','author')
        ->select('users.*','author-detail.profile as profile')
        ->join('author-detail','author-detail.user_id','=','users.id')
        ->with('books_published')
        ->where('users.name', 'like', $param.'%')
        ->get();
        return view('front.authors-list', compact('authors'));
    }
    public function author_detail($id){
        return view('front.author-detail');
    }
    public function contact_us(){
        return view('front.contact-us');
    }
    public function comming_soon(){
        return view('front.comming-soon');
    }
    public function terms_conditions(){
        return view('front.terms-conditions');
    }
    public function pricing_table(){
        $marketing = Marketing::get();
        return view('front.pricing-table',compact('marketing'));
    }
    public function faq(){
        return view('front.faq');
    }
    public function error(){
        return view('front.404');
    }
    public function blog(){
        return view('front.blog');
    }
    public function blog_detail(){
        return view('front.blog-detail');
    }
    public function order_received(){
        return view('front.order-received');
    }
    public function order_tracking(){
        return view('front.order-tracking');
    }
    public function buy_marketing_package($marketing_id){
        return view('front.buy-marketing-package', compact('marketing_id'));
    }
    public function add_review(Request $request){
        if(!Auth::id()){
            return redirect('login');
        }
        $is_already = Review::where('book_id',$request->book_id)->where('type',$request->type)->where('user_id',Auth::id())->first();
        if($is_already){
            return back()->with('review_not_added','');
        }
        $book = Book::findOrFail($request->book_id);
        $book->total_reviews = $book->total_reviews + 1;
        $book->total_ratings = $book->total_ratings + $request->rate;
        $book->update();

        $review = new Review();
        $review->user_id = Auth::id();
        $review->book_id = $request->book_id;
        $review->rate = $request->rate;
        $review->type = $request->type;
        $review->comment = $request->comment;
        $review->title = $request->title;
        $review->save();
        if($review){
            return back()->with('review_added', 'Review added successfully.');
        } else {
            return back()->with('review_error', 'Review not added. There is something went wrong.');
        }
    }
    public function get_filtered_data(Request $request){
        $page = request('sortBy');
        $minimum_price = request('minimum_price');
        $maximum_price = request('maximum_price');
        
        $products = Book::select('books.*','books.id as book_id','users.*','users.id as author_id','sub_genres.title as genre_title')
        ->where('books.status',1)
        ->join('users','users.id','=','books.user_id')
        ->join('sub_genres','sub_genres.id','=','books.genre');
        $data['total_count'] = $products->count();
        if (isset($minimum_price) && isset($maximum_price)) {
            $products->where('books.price', '>=', $minimum_price)->Where('books.price', '<=', $maximum_price);
        }
        if (isset($genre) && !empty($genre)) {
            $products->whereIn('books.genre', $genre);
        }
        if (isset($request->reviews) && !empty($request->reviews)) {
            $products->whereIn('books.total_ratings', $request->reviews);
        }
        if (isset($request->formatField) && !empty($request->formatField)) {
            $products->where('books.'.$request->formatField, $request->formatValue);
        }
        if (isset($request->genreField) && !empty($request->genreField)) {
            $products->where('books.'.$request->genreField, $request->genreValue);
        }
        if (isset($request->authorField) && !empty($request->authorField)) {
            $products->where('books.user_id', $request->authorValue);
        }
        $books = $products->paginate($page);
        // $data['count'] = $books->count();
        $data['links'] = $books->links('vendor.pagination.default')->render();
        $data['filter_grid_data'] = view('front.filter_grid_data', compact('books'))->render();
        $data['filter_list_data'] = view('front.filter_list_data', compact('books'))->render();
        return response()->json($data);
    }
    public function success_page(Request $request){
        $token = $_GET['token'];
        $payment = Payment::where('token',$token)->first();
        return view('front.success-page',compact('payment'));
    }
    public function billing_detail(request $request){
        $detail = AuthorDetail::where('user_id',Auth::id())->first();
        if($detail){
            AuthorDetail::where('user_id',Auth::id())->update(['billing_detail' => serialize($request->all())]);
        } else {
            $data['billing_detail'] = serialize($request->all());
            $data['user_id'] = Auth::id();
            AuthorDetail::insert($data);
        }
        return back()->with('message', ['text'=>'Data has been updated','type'=>'success']);
    }
    public function shipping_detail(request $request){
        $detail = AuthorDetail::where('user_id',Auth::id())->first();
        if($detail){
            AuthorDetail::where('user_id',Auth::id())->update(['shipping_detail' => serialize($request->all())]);
        } else {
            $data['shipping_detail'] = serialize($request->all());
            $data['user_id'] = Auth::id();
            AuthorDetail::insert($data);
        }
        return back()->with('message', ['text'=>'Data has been updated','type'=>'success']);
    }
    // public function front_autocomplete(Request $request){
    //     $data = Book::select("title")
    //             ->where("title","LIKE","%{$request->input('query')}%")
    //             ->get();
    //     return response()->json($data);
    // }
}
