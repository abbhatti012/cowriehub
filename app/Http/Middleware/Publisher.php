<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Publisher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (Auth::user()->role == 'author') {
            return redirect()->route('dashboard');
        }
        if (Auth::user()->role == 'affiliate') {
            return redirect()->route('affiliate');
        }
        if (Auth::user()->role == 'pos') {
            return redirect()->route('pos');
        }
        if (Auth::user()->role == 'consultant') {
            return redirect()->route('consultant/consultant-register');
        }
        if (Auth::user()->role == 'user') {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
