<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    public function redirectTo() {
        $role = Auth::user()->role;
        switch ($role) {
          case 'admin':
            return '/admin';
            break;
        case 'author':
            return '/dashboard';
            break; 
        case 'publisher':
            return '/publisher';
            break; 
        case 'affiliate':
            return '/affiliate';
            break; 
        case 'pos':
            return '/pos';
            break; 
        case 'consultant':
            return '/consultant/consultant-register';
            break; 
          default:
            return route('home');
          break;
        }
      }
      
    protected function authenticated(Request $request, $user){
        $user = User::find($user->id);
        $user->checkin = $user->checkin + 1;
        if($user->role != 'admin'){
            $user->role = 'user';
        }
        $user->save();
        
        if($user->role === 'admin') {
            return redirect(route('admin'));
        }
        if($user->role === 'author') {
            return redirect('/dashboard');
        }
        if($user->role === 'publisher') {
            return redirect('/publisher');
        }
        if($user->role === 'affiliate') {
            return redirect('/affiliate');
        }
        if($user->role === 'pos') {
            return redirect('/pos');
        }
        if($user->role === 'consultant') {
            return redirect('/consultant/consultant-register');
        }
        return redirect(route('home'));
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
