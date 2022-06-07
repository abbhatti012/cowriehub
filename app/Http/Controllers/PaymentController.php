<?php

namespace App\Http\Controllers;
use App\Models\Book;

use App\Models\Order;
use App\Models\Coupon;
use App\Models\Payment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function before_payment(Request $request){
        $userId = Auth::id();
        if(!$userId){
            return redirect('login');
        }
        $payment = new Payment();
        $payment->user_id = $userId;
        $payment->location = $request->shippingCharges;
        $payment->precise_location = $request->preciseLocation;
        $payment->post_code = $request->postCode;
        $payment->token = Str::random(32);
        $payment->subtotal = $request->subTotal;
        $payment->total_amount = $request->totalPrice;
        $payment->shipping_price = $request->shippingPrice;
        $payment->save();
        return response()->json($payment->token);
    }
    public function preorder_before_payment(Request $request){
        $userId = Auth::id();
        if(!$userId){
            return redirect('login');
        }
        $payment = new Payment();
        $payment->user_id = $userId;
        $payment->precise_location = $request->preciseLocation;
        $payment->post_code = $request->postCode;
        $payment->token = Str::random(32);
        $payment->subtotal = $request->totalPrice + $request->subTotal;
        $payment->total_amount = round((($request->totalPrice + $request->subTotal) / 100) * 10, 2);
        $payment->shipping_price = 0;
        $payment->is_preorder = 1;
        $payment->extraType = $request->extraType;
        $payment->extraPrice = $request->extraPrice;
        $payment->book_id = $request->bookId;
        $payment->save();
        return response()->json($payment->token);
    }

    public function initialize(Request $request, $id){
        $payment = Payment::find($id);
        $payment->first_name = $request->first_name;
        $payment->last_name = $request->last_name;
        $payment->country = $request->country;
        $payment->billing_address = $request->address;
        $payment->phone = $request->phone;
        $payment->email = $request->email;
        $payment->notes = $request->notes;
        $payment->payment_method = $request->payment_method;
        $payment->is_coupon = $request->is_coupon;
        $payment->coupon_code = $request->coupon_code;
        
        if($payment->is_coupon == 1){
            $code = Coupon::where('code',$payment->coupon_code)->first();
            $total_amount = round(($payment->total_amount / 100) * $code->off, 2);
        } else {
            $total_amount = $payment->total_amount;
        }
        
        $payment->amount_paid = $total_amount;
        $payment->save();
        $carts = session()->get('cart');
        if($payment->is_preorder == 0){
            foreach($carts as $cart){
                $order = new Order();
                $order->payment_id = $payment->id;
                $order->user_id = Auth::id();
                $order->book_id = $cart['id'];
                $order->is_preorder = $cart['is_preorder'];
                $order->extra_type = $cart['extraType'];
                $order->book_price = $cart['bookPrice'];
                $order->extra_price = $cart['extraPrice'];
                $order->total_price = $cart['bookPrice'] + $cart['extraPrice'] + $payment->shipping_price;
                $order->quantity = $cart['quantity'];
                if($cart['is_preorder'] == 1){
                    $order->amount_paid = round((((($cart['extraPrice'] + $cart['bookPrice']) * $cart['quantity'])/100 )* 10), 2);
                    $order->remaining_price = $order->total_price - $order->amount_paid;
                } else {
                    $order->amount_paid = ($cart['extraPrice'] + $cart['bookPrice']) * $cart['quantity'];
                    $order->remaining_price = 0;
                }
                $order->save();
            }
        } else {
            $book = Book::find($payment->book_id);
            $order = new Order();
            $order->payment_id = $payment->id;
            $order->user_id = Auth::id();
            $order->book_id = $payment->book_id;
            $order->is_preorder = 1;
            $order->extra_type = $payment->extraType;
            $order->book_price = $book->price;
            $order->extra_price = $payment->extraPrice;
            $order->total_price = $book->price + $payment->extraPrice + $payment->shipping_price;
            $order->quantity = 1;
            $order->amount_paid = $payment->total_amount;
            $order->remaining_price = $order->total_price - $order->amount_paid;
            $order->save();
        }
        if($request->payment_method == 'cod'){
            $payment = Payment::find($payment->id);
            $payment->status = 'pending';
            $payment->transaction_id = '';
            $payment->save();
            if($payment->is_preorder == 1){
                $book = Book::find($payment->book_id);
                $book->book_purchased = $book->book_purchased + 1;
                $book->save();
            } else {
                foreach($carts as $cart){
                    $book = Book::find($cart['id']);
                    $book->book_purchased = $book->book_purchased + 1;
                    $book->save();
                }
            }
            session()->put('cart', []);
            return redirect('success-page?token='.$payment->token);
        }
        
        $request = [
            'tx_ref' => time(),
            'amount' => $total_amount,
            'currency' => 'GHS',
            'payment_options' => 'card',
            'redirect_url' => route('flutterwave-callback', $payment->id),
            'customer' => [
                'email' => $payment->email,
                'name' => 'Zubdev'
            ],
            'meta' => [
                'price' => $total_amount
            ],
            'customizations' => [
                'title' => 'Paying for a sample product',
                'description' => 'sample'
            ]
        ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.flutterwave.com/v3/payments',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($request),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer FLWSECK-e11860845478e5583ba7b5b507a0d4b1-X',
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $res = json_decode($response);
    if($res->status == 'success') {
        $link = $res->data->link;
        return redirect($link);
    } else {
            echo 'We can not process your payment';
        }
    }
    public function callback(Request $request, $id){
        if(isset($request->status)) {
            $payment = Payment::find($id);
            $payment->status = $request->status;
            $payment->transaction_id = $request->transaction_id;
            if($request->status == 'cancelled')
            {
                Session::flash('payment_cancelled','Your payment has been cancelled');
            }
            elseif($request->status == 'successful')
            {
                $carts = session()->get('cart');
                foreach($carts as $cart){
                    $book = Book::find($cart['id']);
                    $book->book_purchased = $book->book_purchased + $cart['quantity'];
                    $book->save();
                }
                session()->put('cart', []);
                $txid = $request->transaction_id;
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$txid}/verify",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "Authorization: Bearer FLWSECK_TEST-eee25be1b44ef9a132a872075b3a0910-X"
                    ),
                ));
                
                $response = curl_exec($curl);
                curl_close($curl);
                $res = json_decode($response);
                
                if($res->status)
                {
                    $amountPaid = $res->data->charged_amount;
                    $amountToPay = $res->data->meta->price;
                    if($amountPaid >= $amountToPay)
                    {
                        Session::flash('payment_successfull','Payment Successfull!');
                    }
                    else
                    {
                        $payment->is_fraud = 1;
                        Session::flash('fraud_payment','Fraud transaction detected!');
                    }
                }
                else
                {
                    Session::flash('payment_cannot_process','Payment cannot process!');
                }
            }
        }
        $payment->save();
        return redirect('/');
    }
}
