<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

   
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        // $this->guard()->login($user);
        //this commented to avoid register user being auto logged in
        return $this->registered($request, $user)
            ?: redirect(route('login'))->with('registrationSuccessfull', 'Your account has been created. Please login to continue');
    }
    protected function create(array $data)
    {
        if(isset($data['subscribe'])){
            $subsrcibe = 1;
        } else {
            $subsrcibe = 0;
        }
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            // 'role' => $data['role'],
            'role' => 'user',
            'is_subscribe' => $subsrcibe,
            'password' => Hash::make($data['password']),
        ]);
        if($subsrcibe == 1){
            event(new UserRegistered($user));
    }
        return $user;
    }
}
