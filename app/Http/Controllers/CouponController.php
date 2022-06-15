<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Coupon;
use App\Models\Payment;
use App\Models\Setting;
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
            }
            $array = [];
            $count = 0;
            $carts = session()->get('cart');
            $totalPrice = 0;
            if($request->type == 0){
                foreach($carts as $cart){
                    if(in_array($cart['id'], unserialize($check->book_id))) {
                        $count++;
                        $originalPrice = ($cart['extraPrice'] + $cart['bookPrice']) * $cart['quantity'];
                        $price = round(((($cart['extraPrice'] + $cart['bookPrice']) * $cart['quantity']) / 100)*$check->off,2);
                        $finalPrice = $originalPrice - $price;
                        $totalPrice = $totalPrice + $price;
                        array_push($array,['id' => $cart['id'],'price' => $finalPrice]);
                    }
                }
            } else {
                $payment = Payment::where('token',$request->token)->first();
                $book = Book::where('id',$payment->book_id)->first();
                $setting = Setting::first();
                if(in_array($payment->book_id, unserialize($check->book_id))) {
                    $count = 1;
                    $book_price = (($book->price) / 100)*$setting->admin_commission;
                    
                    $originalPrice = $book_price;
                    $price = round(((($book_price)) / 100)*$check->off,2);
                    $finalPrice = $originalPrice - $price;
                    $totalPrice = $totalPrice + $price;
                    array_push($array,['id' => $payment->book_id,'price' => $finalPrice]);
                }
            }
            if($count > 0){
                return response()->json(['data'=> $array, 'totalPrice' => $totalPrice, 'status'=>true]);
            } else {
                return response()->json(['message'=> 'Oops! coupon cannot be applied for these books!', 'status'=>false]);
            }
        } else {
            return response()->json(['message'=>'Invalid Coupon!','status'=>false]);
        }
    }
}
