<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
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
        return view('front.index',compact('data'));
    }
    public function shop(){
        return view('front.shop');
    }
    public function product($id){
        $book = Book::where('id',$id)->first();
        $author = User::where('id',$book->user_id)->first();
        return view('front.product',compact('book', 'author'));
    }
    public function cart(){
        return view('front.cart');
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
        return view('front.pricing-table');
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
}
