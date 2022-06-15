<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
use App\Models\Payment;
use App\Models\SubGenre;
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
        return view('front.author.publisher_account');
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
    public function dashboard(){
        $books = Book::where('user_id',Auth::id())->where('status',1)->count();
        $orders = Payment::where('user_id',Auth::id())->count();
        $earning = Payment::where('user_id',Auth::id())->where('status','successfull')->sum('total_amount');
        $pending_earning = Payment::where('user_id',Auth::id())->where('status','!=','successfull')->sum('total_amount');
        return view('user.dashboard',compact('books','orders','earning','pending_earning'));
    }
}