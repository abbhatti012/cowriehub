<?php

namespace App\Http\Controllers;
use App\Models\Book;

use App\Models\User;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Payment;
use App\Models\Revenue;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Traits\CurrencySession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    use CurrencySession;
    public function before_payment(Request $request){
        $userId = Auth::id();
        if(!$userId){
            $userId = 0;
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
        $payment->status = 'pending';
        if(Auth::check() && Auth::user()->role == 'pos'){
            $payment->is_pos = 1;
        }
        $payment->save();
        return response()->json($payment->token);
    }
    public function preorder_before_payment(Request $request){
        $userId = Auth::id();
        if(!$userId){
            $userId = 0;
        }
        $payment = new Payment();
        $payment->user_id = $userId;
        $payment->precise_location = $request->preciseLocation;
        $payment->post_code = $request->postCode;
        $payment->token = Str::random(32);
        $payment->subtotal = round((($request->totalPrice + $request->subTotal) / 100) * 10, 2);
        $payment->total_amount = $request->totalPrice + $request->subTotal;
        $payment->shipping_price = $request->shippingPrice;
        $payment->is_preorder = 1;
        $payment->extraType = $request->extraType;
        $payment->extraPrice = $request->extraPrice;
        $payment->book_id = $request->bookId;
        $payment->location = $request->shippingCharges;
        $payment->status = 'pending';
        if(Auth::check() && Auth::user()->role == 'pos'){
            $payment->is_pos = 1;
        }
        $payment->save();
        return response()->json($payment->token);
    }

    public function initialize(Request $request, $id){
        // $user = User::where('id',Auth::id())->first();
        $currency = $this->getCurrencyRate();
        $payment = Payment::find($id);
        $billing['first_name'] = $request->billing_first_name;
        $billing['last_name'] = $request->billing_last_name;
        $billing['country'] = $request->billing_country;
        $billing['billing_address'] = $request->billing_address;
        $billing['phone'] = $request->billing_phone;
        $billing['email'] = $request->billing_email;
        $billing['notes'] = $request->billing_notes;
        $shipping['first_name'] = $request->shipping_first_name;
        $shipping['last_name'] = $request->shipping_last_name;
        $shipping['country'] = $request->shipping_country;
        $shipping['shipping_address'] = $request->shipping_address;
        $shipping['phone'] = $request->shipping_phone;
        $shipping['email'] = $request->shipping_email;
        $shipping['notes'] = $request->shipping_notes;
        $payment->billing_detail = serialize($billing);
        $payment->shipping_detail = serialize($shipping);
        $payment->payment_method = $request->payment_method;
        $payment->is_coupon = $request->is_coupon;
        $payment->coupon_code = $request->coupon_code;
        $setting = Setting::first();
        // $user_commission = 100 - $setting->admin_commission;
        if($payment->is_coupon == 1){
            $check = Coupon::where('code',$payment->coupon_code)->first();
            if($payment->is_preorder == 0){
                $carts = session()->get('cart');
                $totalPrice = 0;
                foreach($carts as $cart){
                    if(in_array($cart['id'], unserialize($check->book_id))) {
                        $price = round(((($cart['extraPrice'] + $cart['bookPrice']) * $cart['quantity']) / 100)*$check->off,2);
                        $totalPrice = $totalPrice + $price;
                    } else {
                        $totalPrice = 0;
                    }
                }
            } else {
                $book = Book::where('id',$payment->book_id)->first();
                if(in_array($payment->book_id, unserialize($check->book_id))) {
                    $book_price = $book->price * $currency->exchange_rate;
                    $totalPrice = round(((($book_price)) / 100)*$check->off,2);
                } else {
                    $totalPrice = 0;
                }
            }
            if($payment->is_preorder == 1){
                $total_amount = $payment->subtotal - $totalPrice;
            } else {
                $total_amount = $payment->total_amount - $totalPrice;
            }
        } else {
            $total_amount = $payment->subtotal;
        }
        
        $payment->amount_paid = $total_amount;
        $payment->save();
        $carts = session()->get('cart');
        if(!Auth::id()){
            $userId = 0;
        } else {
            $userId = Auth::id();
        }
        if($payment->is_preorder == 0){
            $check = Coupon::where('code',$payment->coupon_code)->first();
            $totalPrice = 0;
            foreach($carts as $cart){
                $book = Book::find($cart['id']);
                $order = new Order();
                $order->payment_id = $payment->id;
                $order->user_id = $userId;
                $order->book_id = $cart['id'];
                $order->book_owner_id = $book->user_id;
                $order->role = $book->role;
                $order->is_preorder = $cart['is_preorder'];
                $order->extra_type = $cart['extraType'];
                $order->book_price = $cart['bookPrice'];
                $order->extra_price = $cart['extraPrice'];
                $order->total_price = $cart['bookPrice'] + $cart['extraPrice'] + $payment->shipping_price;
                $order->quantity = $cart['quantity'];
                $order->currency = $cart['currency'];
                $order->exchange_rate = $cart['exchange_rate'];
                if($cart['is_preorder'] == 1){
                    $order->amount_paid = round((((($cart['extraPrice'] + $cart['bookPrice']) * $cart['quantity'])/100 )* 10), 2);
                    $order->remaining_price = $order->total_price - $order->amount_paid;
                } else {
                    if($payment->is_coupon == 1){
                        if(in_array($cart['id'], unserialize($check->book_id))) {
                            $totalPrice = round(((($cart['extraPrice'] + $cart['bookPrice']) * $cart['quantity']) / 100)*$check->off,2);
                        } else {
                            $totalPrice = 0;
                        }
                        $order->amount_paid = (($cart['bookPrice'] + $cart['extraPrice']) * $cart['quantity']) - $totalPrice;
                    } else {
                        $totalPrice = ($cart['extraPrice'] + $cart['bookPrice']) * $cart['quantity'];
                        $order->amount_paid = $totalPrice;
                    }
                    $order->remaining_price = 0;
                }
                $order->save();
                $revenue = new Revenue();
                $revenue->user_id = $cart['author_id'];
                $revenue->role = $book->role;
                $revenue->order_id = $order->id;
                $revenue->total_amount = $order->amount_paid;
                $revenue->user_amount = round(($order->amount_paid/100)*$setting->user_commission);
                $revenue->payment_status = 0;
                $revenue->admin_payment_status = 0;
                $revenue->currency = $cart['currency'];
                $revenue->exchange_rate = $cart['exchange_rate'];
                $revenue->save();

                if(Auth::check() && Auth::user()->referrer_id != 0){
                    $revenue = new Revenue();
                    $revenue->user_id = Auth::user()->referrer_id;
                    $revenue->role = 'affiliate';
                    $revenue->order_id = $order->id;
                    $revenue->user_amount = 0;
                    $revenue->affiliate_amount = round(($order->amount_paid/100)*$setting->affiliate_commission);
                    $revenue->payment_status = 0;
                    $revenue->admin_payment_status = 0;
                    $revenue->is_referrer = 1;
                    $revenue->currency = $cart['currency'];
                    $revenue->exchange_rate = $cart['exchange_rate'];
                    $revenue->save();
                } else if(!empty($cart['ref'])){
                    $user = User::where('code',$cart['ref'])->first();
                    $revenue = new Revenue();
                    $revenue->user_id = $user->id;
                    $revenue->role = 'affiliate';
                    $revenue->order_id = $order->id;
                    $revenue->user_amount = 0;
                    $revenue->affiliate_amount = round(($order->amount_paid/100)*$setting->affiliate_commission);
                    $revenue->payment_status = 0;
                    $revenue->admin_payment_status = 0;
                    $revenue->is_referrer = 1;
                    $revenue->currency = $cart['currency'];
                    $revenue->exchange_rate = $cart['exchange_rate'];
                    $revenue->save();
                }
            }
        } else {
            $book = Book::find($payment->book_id);
            $order = new Order();
            $order->payment_id = $payment->id;
            $order->user_id = $userId;
            $order->book_id = $payment->book_id;
            $order->book_owner_id = $book->user_id;
            $order->role = $book->role;
            $order->is_preorder = 1;
            $order->extra_type = $payment->extraType;
            $order->book_price = $book->price * $currency->exchange_rate;
            $order->extra_price = $payment->extraPrice;
            $order->total_price = ($book->price * $currency->exchange_rate) + $payment->extraPrice + $payment->shipping_price;
            $order->quantity = 1;
            $order->currency = $currency->currency_code;
            $order->exchange_rate = $currency->exchange_rate;
            if($payment->is_coupon == 1){
                $book = Book::where('id',$payment->book_id)->first();
                if(in_array($payment->book_id, unserialize($check->book_id))) {
                    $book_price = $book->price * $currency->exchange_rate;
                    $totalPrice = round(((($book_price)) / 100)*$check->off,2);
                } else {
                    $totalPrice = 0;
                }
                $order->amount_paid = round(((($payment->extraPrice + ($book->price * $currency->exchange_rate))/100 )* 10), 2) - $totalPrice;
            } else {
                $order->amount_paid = round(((($payment->extraPrice + ($book->price * $currency->exchange_rate))/100 )* 10), 2);
                $totalPrice = $book->price;
            }
            $order->remaining_price = $order->total_price - $order->amount_paid;
            $order->save();

            $revenue = new Revenue();
            $revenue->user_id = $book->user_id;
            $revenue->role = $book->role;
            $revenue->order_id = $order->id;
            $revenue->total_amount = $order->amount_paid;
            $revenue->user_amount = round(($order->amount_paid/100)*$setting->user_commission);
            $revenue->payment_status = 0;
            $revenue->admin_payment_status = 0;
            $revenue->currency = $currency->currency_code;
            $revenue->exchange_rate = $currency->exchange_rate;
            $revenue->save();
            if(Auth::check() && Auth::user()->referrer_id != 0){
                $revenue = new Revenue();
                $revenue->user_id = Auth::user()->referrer_id;
                $revenue->role = 'affiliate';
                $revenue->order_id = $order->id;
                $revenue->user_amount = 0;
                $revenue->affiliate_amount = round(($order->amount_paid/100)*$setting->affiliate_commission);
                $revenue->payment_status = 0;
                $revenue->admin_payment_status = 0;
                $revenue->is_referrer = 1;
                $revenue->currency = $currency->currency_code;
                $revenue->exchange_rate = $currency->exchange_rate;
                $revenue->save();
            } else if(isset($request->ref) && !empty($request->ref)){
                $user = User::where('code',$request->ref)->first();
                $revenue = new Revenue();
                $revenue->user_id = $user->id;
                $revenue->role = 'affiliate';
                $revenue->order_id = $order->id;
                $revenue->user_amount = 0;
                $revenue->affiliate_amount = round(($order->amount_paid/100)*$setting->affiliate_commission);
                $revenue->payment_status = 0;
                $revenue->admin_payment_status = 0;
                $revenue->is_referrer = 1;
                $revenue->currency = $currency->currency_code;
                $revenue->exchange_rate = $currency->exchange_rate;
                $revenue->save();
            }
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

            $data['title'] = 'New Order Placed';
            $data['body'] = 'Congratulations!. New order has been placed just now!';
            $data['body'] .= 'Please check below link to see its details!';
            $data['link'] = "admin.book-orders";
            $data['linkText'] = "View";
            $data['to'] = 'info@cowriehub.com';
            $data['username'] = 'COWRIEHUB';
            Mail::send('email', $data,function ($m) use ($data) {
                $m->to($data['to'])->subject('New Order Placed');
            });

            return redirect('success-page?token='.$payment->token);
        }
        if(Auth::check() && Auth::user()->role == 'pos'){
            session()->put('cart', []);
            return redirect('success-page?token='.$payment->token);
        }
        $request = [
            'tx_ref' => time(),
            'amount' => $total_amount,
            'currency' => $currency->currency_code,
            'payment_options' => 'card',
            'redirect_url' => route('flutterwave-callback', $payment->id),
            'customer' => [
                'email' => $request->billing_email,
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
    public function pos_payment($id){
        $currency = $this->getCurrencyRate();
        $payment = Payment::find($id);
        $request = [
            'tx_ref' => time(),
            'amount' => $payment->total_amount,
            'currency' => $currency->currency_code,
            'payment_options' => 'card',
            'redirect_url' => route('pos-callback', $id),
            'customer' => [
                'email' => Auth::user()->email,
                'name' => Auth::user()->name
            ],
            'meta' => [
                'price' => $payment->total_amount
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
    public function pos_callback(Request $request, $id){
        if(isset($request->status)) {
            $data['title'] = 'New Order Placed';
            $data['body'] = 'Congratulations!. New order has been placed just now!';
            $data['body'] .= 'Please check below link to see its details!';
            $data['link'] = "admin.book-orders";
            $data['linkText'] = "View";
            $data['to'] = 'info@cowriehub.com';
            $data['username'] = 'COWRIEHUB';
            Mail::send('email', $data,function ($m) use ($data) {
                $m->to($data['to'])->subject('New Order Placed');
            });
            
            $payment = Payment::find($id);
            $payment->status = $request->status;
            $payment->transaction_id = $request->transaction_id;
            if($request->status == 'cancelled')
            {
                $payment->is_pos_payment = 2;
                $message = Session::flash('payment_cancelled','Your payment has been cancelled');
            }
            elseif($request->status == 'successful')
            {
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
                        if($payment->is_preorder == 0){
                            $carts = session()->get('cart');
                            foreach($carts as $cart){
                                $book = Book::find($cart['id']);
                                $book->book_purchased = $book->book_purchased + $cart['quantity'];
                                $book->save();
                            }
                        } else {
                            $book = Book::find($payment->book_id);
                            $book->book_purchased = $book->book_purchased + 1;
                            $book->save();
                        }
                        Revenue::where('payment_id',$payment->id)->update(['payment_status' => 1]);
                        session()->put('cart', []);
                        $payment->is_pos_payment = 1;
                        $message = Session::flash('payment_successfull','Payment Successfull!');
                    }
                    else
                    {
                        $payment->is_fraud = 1;
                        $message = Session::flash('fraud_payment','Fraud transaction detected!');
                    }
                }
                else
                {
                    $message = Session::flash('payment_cannot_process','Payment cannot process!');
                }
            }
        }
        $payment->save();
        return redirect(route('pos.close-window'))->with('message', ['text'=>$message,'type'=>'success']);
    }
    public function close_window(){
        return view('pos.close_window');
    }
    public function callback(Request $request, $id){
        if(isset($request->status)) {
            $data['title'] = 'New Order Placed';
            $data['body'] = 'Congratulations!. New order has been placed just now!';
            $data['body'] .= 'Please check below link to see its details!';
            $data['link'] = "admin.book-orders";
            $data['linkText'] = "View";
            $data['to'] = 'info@cowriehub.com';
            $data['username'] = 'COWRIEHUB';
            Mail::send('email', $data,function ($m) use ($data) {
                $m->to($data['to'])->subject('New Order Placed');
            });
            
            $payment = Payment::find($id);
            $payment->status = $request->status;
            $payment->transaction_id = $request->transaction_id;
            if($request->status == 'cancelled')
            {
                Session::flash('payment_cancelled','Your payment has been cancelled');
            }
            elseif($request->status == 'successful')
            {
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
                        if($payment->is_preorder == 0){
                            $carts = session()->get('cart');
                            foreach($carts as $cart){
                                $book = Book::find($cart['id']);
                                $book->book_purchased = $book->book_purchased + $cart['quantity'];
                                $book->save();
                            }
                        } else {
                            $book = Book::find($payment->book_id);
                            $book->book_purchased = $book->book_purchased + 1;
                            $book->save();
                        }
                        Revenue::where('payment_id',$payment->id)->update(['payment_status' => 1]);
                        session()->put('cart', []);
                        
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
