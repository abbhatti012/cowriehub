<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function check_coupon(Request $request){
        $code = $request->code;
        $date = date('Y-m-d');
        $check = Coupon::where('code',$code)->first();
        if($check){
            if($check->end_date < $date){
                return response()->json(['message'=>'Coupon expired!','status'=>false]);
            } else {
                return response()->json(['data'=> $check, 'status'=>true]);
            }
        } else {
            return response()->json(['message'=>'Invalid Coupon!','status'=>false]);
        }
    }
}
