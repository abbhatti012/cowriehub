<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Affiliate
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (Auth::user()->role == 'author') {
            return redirect()->route('author');
        }
        if (Auth::user()->role == 'publisher') {
            return redirect()->route('publisher');
        }
        if (Auth::user()->role == 'pos') {
            return redirect()->route('pos');
        }
        if (Auth::user()->role == 'consultant') {
            return redirect()->route('consultant');
        }
        if (Auth::user()->role == 'user') {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
