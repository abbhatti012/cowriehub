<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
use App\Models\Banner;
use App\Models\Review;
use App\Models\Setting;
use App\Models\Marketing;
use App\Models\Wishlist;
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
        ->orderBy('books.id','asc')->where('status',1)
        ->join('users','users.id','=','books.user_id')
        ->join('sub_genres','sub_genres.id','=','books.genre');
        $data['best_selling'] = $query->where('books.is_best',1)->get();
        $query = Book::select('books.*','books.id as book_id','users.*','users.id as author_id','sub_genres.title as genre_title')
        ->orderBy('books.id','asc')->where('status',1)
        ->join('users','users.id','=','books.user_id')
        ->join('sub_genres','sub_genres.id','=','books.genre');
        $data['featured'] = $query->where('books.is_featured',1)->get();
        $query = Book::select('books.*','books.id as book_id','users.*','users.id as author_id','sub_genres.title as genre_title')
        ->orderBy('books.id','asc')->where('status',1)
        ->join('users','users.id','=','books.user_id')
        ->join('sub_genres','sub_genres.id','=','books.genre');
        $data['sales'] = $query->where('books.is_sale',1)->get();
        $query = Book::select('books.*','books.id as book_id','users.*','users.id as author_id','sub_genres.title as genre_title')
        ->orderBy('books.id','asc')->where('status',1)
        ->join('users','users.id','=','books.user_id')
        ->join('sub_genres','sub_genres.id','=','books.genre');
        $data['viewed'] = $query->where('books.is_most_viewed',1)->get();
        $query = Book::select('books.*','books.id as book_id','users.*','users.id as author_id','sub_genres.title as genre_title')
        ->orderBy('books.id','asc')->where('status',1)
        ->join('users','users.id','=','books.user_id')
        ->join('sub_genres','sub_genres.id','=','books.genre');
        $data['new_release'] = $query->where('books.is_new',1)->limit(3)->get();
        $query = Book::select('books.*','books.id as book_id','users.*','users.id as author_id','sub_genres.title as genre_title')
        ->orderBy('books.id','asc')->where('status',1)
        ->join('users','users.id','=','books.user_id')
        ->join('sub_genres','sub_genres.id','=','books.genre');
        $data['biographies'] = $query->where('books.is_biographies',1)->get();

        $data['authors'] = User::where('users.role','author')
        ->select('users.*','author-detail.profile as profile')
        ->join('author-detail','author-detail.user_id','=','users.id')->get();
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
        echo 'In progress';exit;
        if(!Auth::check()){
            return redirect('/login')->with('message', ['text'=>'Pleas login first to proceed','type'=>'warning']);
        }
        $data['user_id'] = Auth::user()->id;
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['marketing_id'] = $request->marketing_id;
    }
    public function shop(){
        return view('front.shop');
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
        return view('front.product',compact('book', 'author', 'reviews', 'data', 'cart', 'wishlist'));
    }
    public function cart(){
        $cart_page = view('front.cart_item')->render(); 
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
        return view('front.checkout');
    }
    public function my_account(){
        return view('front.my-account');
    }
    public function about_us(){
        return view('front.about-us');
    }
    public function authors_list(){
        return view('front.authors-list');
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
    public function buy_marketing_package(){
        return view('front.buy-marketing-package');
    }
    public function add_review(Request $request){
        if(!Auth::id()){
            return redirect('login');
        }
        $is_already = Review::where('book_id',$request->book_id)->where('type',$request->type)->where('user_id',Auth::id())->first();
        if($is_already){
            return back()->with('review_not_added','');
        }
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
}
