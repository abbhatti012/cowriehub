<?php

namespace App\Http\Controllers\Pos;

use App\Models\Pos;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PosController extends Controller
{
    public function index(Request $request){
        if(isset($request->role)){
            User::updateROle($request->role);
        }
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $user = Pos::where('user_id',$_GET['id'])->first();
        } else {
            $user = Pos::where('user_id',Auth::id())->first();
        }
        return view('pos.index',compact('user'));
    }
    public function pos_signup(Request $request, $id){
        $pos = Pos::firstOrNew(array('user_id' => $id));
        $pos->fill($request->all());
        $pos->user_id = $id;
        $pos->save();
        if(auth()->user()->role == 'admin'){
            return back()->with('message', ['text'=>'POS profile data has been updated','type'=>'success']);
        } else{
            return back()->with('message', ['text'=>'Thank you for your application! Cowriehub will review your application in the next 24-48 hours.
            You will be notified in your email on the status of your application after this review','type'=>'success']);
        }
    }
    public function payment_detail(){
        $user = Pos::where('user_id',Auth::id())->first();
        return view('pos.payment-detail',compact('user'));
    }
    public function update_payment_detail(Request $request){
        $user = Pos::where('user_id',Auth::id())->first();
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
        $user->save();
        return back()->with('message', ['text'=>'Payment detail set successfully!','type'=>'success']);
    }
}
