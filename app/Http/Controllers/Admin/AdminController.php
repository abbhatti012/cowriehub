<?php

namespace App\Http\Controllers\Admin;

use App\Models\c;
use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
use App\Models\Banner;
use App\Models\Setting;
use App\Models\SubGenre;
use App\Models\Marketing;
use App\Models\AuthorDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        return view('admin.consultant');
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
        $books = Book::get();
        return view('admin.books',compact('books'));
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
        $user->twitter = $request->twitter;
        $user->save();

        Session::flash('message', ['text'=>'Author data has been updated','type'=>'success']);
        return back()->with('success','You have successfully upload image.');
    }
    public function edit_book($id){
        $genres = Genre::with('subgenres')->get(); 
        $authors = User::where('id','!=',Auth::id())->where('role','author')->get();
        $book = Book::where('id',$id)->first(); 
        return view('admin.edit-book', compact('genres', 'authors', 'book'));
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
} 