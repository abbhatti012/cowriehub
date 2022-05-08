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
        return view('front.index');
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
    public function author_detail(){
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
