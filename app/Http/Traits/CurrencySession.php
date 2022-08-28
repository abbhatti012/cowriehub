<?php

namespace App\Http\Traits;
use App\Models\Currency;
use Illuminate\Support\Facades\Session;

trait CurrencySession {

    public function getCurrencyRate() {
        if(!empty(Session::get('currenct_currency'))){
            $rate_id = Session::get('currenct_currency');
        } else {
            $rate_id = 1;
        }
        return Currency::where('id',$rate_id)->first();
    }
}