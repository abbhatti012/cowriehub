<?php

namespace App\Http\Controllers\Pos;

use App\Models\Pos;
use App\Models\User;
use App\Models\Payment;
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
        $code = $request->referrel_code;
        $isExists = User::where('code',$code)->first();
        if($isExists){
            $user = User::find(Auth::id());
            if($user->code == $code){
                return back()->with('message', ['text'=>'Failed! You cannot use your own referrer code!','type'=>'danger']);
            }
            $user->referrer_id = $isExists->id;
            $user->save();
        } else {
            return back()->with('message', ['text'=>'Failed! Referrer code does not exists!','type'=>'danger']);
        }
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
    public static function pos_register($data, $id){
        $pos = Pos::firstOrNew(array('user_id' => $id));
        $pos->company_name = $data['company_name'];
        $pos->company_email = $data['company_email'];
        $pos->company_phone = $data['company_phone'];
        $pos->landmark_area = $data['landmark_area'];
        $pos->referrel_code = $data['referrel_code'];
        $pos->is_agree_policy = $data['is_agree_policy'];
        $pos->user_id = $id;
        $pos->save();
        return true;
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
    public function pending_invoices(){
        $payments = Payment::orderBy('id','desc')->where('status','!=','successfull')->get();
        return view('pos.pending-invoices',compact('payments'));
    }
    public function paid_invoices(){
        $payments = Payment::orderBy('id','desc')->where('status','successfull')->get();
        return view('pos.paid-invoices',compact('payments'));
    }
}
