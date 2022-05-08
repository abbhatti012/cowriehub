<?php

namespace App\Http\Controllers\Admin;

use App\Models\c;
use App\Models\User;
use App\Models\Genre;
use App\Models\SubGenre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
            'author-detail.cover as cover')
        ->get();
        return view('admin.author', compact('authors'));
    }
    public function consultant(){
        return view('admin.consultant');
    }
    public function general_user(){
        return view('admin.general-user');
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
        return view('admin.books');
    }
    public function book_orders(){
        return view('admin.book-orders');
    }
    public function marketing_orders(){
        return view('admin.marketing-orders');
    }
    public function offers(){
        return view('admin.offers');
    }
    public function subscribed_users(){
        return view('admin.subscribed-users');
    }
    public function book_sellers(){
        return view('admin.book-sellers');
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
        return view('admin.packages');
    }
    public function system_users(){
        return view('admin.system-users');
    }
    public function profile(){
        return view('admin.profile');
    }
    public function edit_author(){
        return view('admin.edit_author');
    }
    public function slider(){
        return view('admin.slider');
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
        return view('admin.marketers-Network-Agreement');
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
        dd($id);
    }
}
