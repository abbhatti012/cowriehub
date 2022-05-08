<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index(){
        return view('publisher.index');
    }
}
