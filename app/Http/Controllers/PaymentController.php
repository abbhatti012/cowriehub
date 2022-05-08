<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class PaymentController extends Controller
{
    public function initialize(Request $request){
        $email = $request->email;
        $amount = $request->amount;

        //* Prepare our rave request
        $request = [
            'tx_ref' => time(),
            'amount' => $amount,
            'currency' => 'GHS',
            'payment_options' => 'card',
            'redirect_url' => route('flutterwave-callback'),
            'customer' => [
                'email' => $email,
                'name' => 'Zubdev'
            ],
            'meta' => [
                'price' => $amount
            ],
            'customizations' => [
                'title' => 'Paying for a sample product',
                'description' => 'sample'
            ]
        ];

        //* Ca;; f;iterwave emdpoint
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
    if($res->status == 'success')
    {
        $link = $res->data->link;
        return redirect($link);
    }
        else
        {
            echo 'We can not process your payment';
        }
    }
    public function callback(Request $request){
        if(isset($request->status))
        {
            //* check payment status
            if($request->status == 'cancelled')
            {
                // echo 'YOu cancel the payment';
                return redirect('/')->with('payment_cancelled','Your payment has been cancelled');
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
                        echo 'Payment successful';

                        //* Continue to give item to the user
                    }
                    else
                    {
                        echo 'Fraud transactio detected';
                    }
                }
                else
                {
                    echo 'Can not process payment';
                }
            }
        }
    }
}
