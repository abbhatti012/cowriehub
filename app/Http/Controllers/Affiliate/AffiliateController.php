<?php

namespace App\Http\Controllers\Affiliate;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Revenue;
use App\Models\Affiliate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AffiliateController extends Controller
{
    public function index(Request $request){
        if(isset($request->role)){
            User::updateROle($request->role);
        }
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $user = Affiliate::where('user_id',$_GET['id'])->first();
        } else {
            $user = Affiliate::where('user_id',Auth::id())->first();
        }
        $userData = User::where('id',Auth::id())->first();
        return view('affiliate.index',compact('user','userData'));
    }
    public function affiliate_signup(Request $request, $id){
        $affiliate = Affiliate::firstOrNew(array('user_id' => $id));
        $affiliate->fill($request->all());
        $affiliate->user_id = Auth::id();
        $affiliate->save();
        $user = User::find(Auth::id());
        $user->role = 'affiliate';
        $user->save();
        return back()->with('message', ['text'=>'Thank you for your application! Cowriehub will review your application in the next 24-48 hours.
        You will be notified in your email on the status of your application after this review','type'=>'success']);
    }
    public function payment_detail(){
        $user = Affiliate::where('user_id',Auth::id())->first();
        return view('affiliate.payment-detail',compact('user'));
    }
    public function user_referred(){
        $users = User::where('referrer_id',Auth::id())->get();
        return view('affiliate.user-referred',compact('users'));
    }
    public function pos_referred(){
        $users = User::where('users.referrer_id',Auth::id())
        ->join('pos','pos.user_id','=','users.referrer_id')->get();
        return view('affiliate.user-referred',compact('users'));
    }
    public function update_payment_detail(Request $request){
        $user = Affiliate::where('user_id',Auth::id())->first();
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
    public function affiliate_commissions(Request $request){
        $id = Auth::id();
        if(isset($request->date) && !empty($request->date)){
            $date = explode(' - ',$request->date);
            $start_date = date('Y-m-d',strtotime($date[0]));
            $end_date = date('Y-m-d',strtotime($date[1]));
            $date = [0=>$start_date,1=>$end_date];
            $orders = Revenue::where('user_id',$id)->where('role',Auth::user()->role)->whereBetween('created_at',$date)->count();
            $graphOrders = Revenue::select('*')
            ->whereBetween('created_at',$date)->where('user_id',$id)->where('role',Auth::user()->role);
            $get_date_series = $this->get_date_series($start_date, $end_date);
            $days = count($get_date_series);
            $graph = $this->get_labels($days, $graphOrders->get(), $get_date_series);

            $earning = $graphOrders->select(DB::raw("SUM(CASE WHEN payment_status = 1 AND admin_payment_status = 1 THEN affiliate_amount ELSE 0 END) AS earning, ".
                        "SUM(CASE WHEN payment_status = 1 AND admin_payment_status = 0 THEN affiliate_amount ELSE 0 END) AS pending_earning"))
            ->groupBy('id')->get()->toArray();
            $approved = 0;
            $pending = 0;
            foreach($earning as $earn){
                $approved = $approved + $earn['earning'];
                $pending = $pending + $earn['pending_earning'];
            }
        } else {
            $orders = Revenue::where('user_id',$id)->where('role',Auth::user()->role)->count();

            $query_date = date('Y-m-d',strtotime(now()));
            $start_date = date('Y-m-01', strtotime($query_date));
            $end_date = date('Y-m-t', strtotime($query_date));

            $graphOrders = Revenue::select('*')
            ->where('created_at', '>=' ,$start_date)
            ->where('created_at', '<' ,$end_date)->where('role',Auth::user()->role)->where('user_id',$id);
            $get_date_series = $this->get_date_series($start_date, $end_date);
            $days = count($get_date_series);
            $graph = $this->get_labels($days, $graphOrders->get(), $get_date_series);
            $earning = $graphOrders->select(DB::raw("SUM(CASE WHEN payment_status = 1 AND admin_payment_status = 1 THEN affiliate_amount ELSE 0 END) AS earning, ".
                        "SUM(CASE WHEN payment_status = 1 AND admin_payment_status = 0 THEN affiliate_amount ELSE 0 END) AS pending_earning"))
            ->groupBy('id')->get()->toArray();
            $approved = 0;
            $pending = 0;
            foreach($earning as $earn){
                $approved = $approved + $earn['earning'];
                $pending = $pending + $earn['pending_earning'];
            }
        }
        $ordermcount = [];
        $orderArr = [];
        $ordermnet = [];
        foreach ($graph['orders'] as $key => $order) {
            $sum = 0;
            foreach($order as $value){
                $sum = $sum + $value->affiliate_amount;
            }
            $ordermcount[(int)$key] = count($order);
            $ordermnet[(int)$key] = $sum;
        }
        for($i = 0; $i < $graph['count']; $i++){
            if(!empty($ordermcount[$i])){
                $orderCountArr[$i] = $ordermcount[$i]; 
            }else{
                $orderCountArr[$i] = 0;
            }
            if(!empty($ordermnet[$i])){
                $orderNetArr[$i] = $ordermnet[$i]; 
            }else{
                $orderNetArr[$i] = 0;
            }
        }
        $graph_data['orderCountArr'] = $orderCountArr;
        $graph_data['orderNetArr'] = $orderNetArr;
        $graph_data['label'] = $graph['label'];
        return view('affiliate.commissions',compact('graph_data'));
    }
    public function get_date_series($start_date, $end_date){
        $dates = array();
        $current = strtotime($start_date);
        $date2 = strtotime($end_date);
        $stepVal = '+1 day';
        while( $current <= $date2 ) {
            $dates[] = date('d-M', $current);
            $current = strtotime($stepVal, $current);
        }
        return $dates;
    }
    public function get_labels($days, $graphOrders, $get_date_series){
        if($days >= 0 && $days <= 1){
            $data['orders'] = $graphOrders->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('h');
            });
           
            $data['label'] = ['1PM', '2PM', '3PM', '4PM', '5PM', '6PM', '7PM','8PM' ,'9PM', '10PM', '11PM', '12AM', '13AM', '14AM', '15AM', '16AM', '17AM', '18AM', '19AM', '20AM', '21AM', '22AM', '23AM', '00PM'];
            $data['count'] = 24;
        } else if($days > 1 && $days <= 14){
            $data['orders'] = $graphOrders->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('d');
            });
           
            $data['label'] = $get_date_series;
            $data['count'] = $days;
        } else if($days > 14 && $days < 30){
            $data['orders'] = $graphOrders->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('d');
            });
            
            $data['label'] = $get_date_series;
            $data['count'] = $days;
        } else if($days >= 29 && $days <= 31){
            $data['orders'] = $graphOrders->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('d');
            });
            
            $data['label'] = $get_date_series;
            $data['count'] = $days;
        } else if($days > 31 && $days < 365){
            $data['orders'] = $graphOrders->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('m');
            });
            
            $data['label'] = ['JAN', 'FEB', 'MARCH', 'APRIL', 'MAY', 'JUN', 'JUL', 'AUG', 'SEPT', 'OCT', 'NOV', 'DEC'];
            $data['count'] = 12;
        }
        return $data;
    }
    public function send_link(Request $request){
        $user_detail = User::where('email',$request->email)->first();
        if($user_detail){
            $data['title'] = 'Invitation Link';
            $data['body'] = 'Hi!.'.$user_detail->name.' <br>';
            $data['body'] = 'You are invited to become a part of COWRIEHUB. ';
            $data['body'] = 'Join now COWRIEHUB to get your desired book at cheapest rates.';
            $data['body'] .= ' Click on below link to register with COWRIEHUB!';
            $data['link'] = "register";
            $data['param'] = "ref=".$user_detail->code;
            $data['linkText'] = "Click to signup";
            $data['to'] = $user_detail->email;
            $data['username'] = $user_detail->name;
            Mail::send('email', $data,function ($m) use ($data) {
                $m->to($data['to'])->subject('Invitation Link!');
            });
                return back()->with('message', ['text'=>'Invitation link has been sent','type'=>'success']);
            } else {
            return back()->with('message', ['text'=>'Email does not exists!','type'=>'danger']);
        }
    }
}
