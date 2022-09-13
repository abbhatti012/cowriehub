<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\pos\PosController;
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
            'phone' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $isRegister = event(new Registered($user = $this->create($request->all())));
        // $this->guard()->login($user);
        //this commented to avoid register user being auto logged in
        if(empty($user)){
            return back()->with('message', ['text'=>'Failed! Referral code does not exists','type'=>'danger']);
        } else {
            return $this->registered($request, $user)
            ?: redirect(route('login'))->with('registrationSuccessfull', 'Please check your email to continue to login!');
        }
    }
    protected function create(array $data)
    {
        if(isset($data['referrel_code'])){
            $userExists = User::where('code', $data['referrel_code'])->first();
            if(!$userExists){
                return $user = [];
            } else {
                $referrer_id = $userExists->id;

                $data['title'] = 'New Referral Signup';
                $data['body'] = 'Congratulations! A new user has just signed up with your referral link.<br>';
                $data['body'] .= ' Please check below link to see its details!<br>';
                $data['link'] = "affiliate.user-referred";
                $data['linkText'] = "View for details";
                $data['to'] = $userExists->email;
                $data['username'] = $userExists->name;
                Mail::send('email', $data,function ($m) use ($data) {
                    $m->to($data['to'])->subject('New User Register');
                });

                $data['title'] = 'New User SignUp';
                $data['body'] = 'Congratulations! A new user has just signed up to Cowriehub.<br>';
                $data['body'] .= ' Please check below link to see details!<br>';
                $data['body'] .= ' Referral Code is: '.$userExists->code;
                $data['link'] = "admin.pos";
                $data['linkText'] = "View for details";
                $data['to'] = 'info@cowriehub.com';
                $data['username'] = 'Cowriehub';
                Mail::send('email', $data,function ($m) use ($data) {
                    $m->to($data['to'])->subject('New User SignUp');
                });
            }
        } else if(isset($data['code'])){
            $code = $data['code'];
            $userData = User::where('code', $code)->first();
            $referrer_id = $userData->id;

            $data['title'] = 'New Referral Signup';
                $data['body'] = 'Congratulations! A new user has just signed up with your referral link.<br>';
                $data['body'] .= ' Please check below link to see its details!<br>';
                $data['link'] = "affiliate.user-referred";
                $data['linkText'] = "View for details";
                $data['to'] = $userData->email;
                $data['username'] = $userData->name;
                Mail::send('email', $data,function ($m) use ($data) {
                    $m->to($data['to'])->subject('New User Register');
                });

                $data['title'] = 'New User SignUp';
                $data['body'] = 'Congratulations! A new user has just signed up to Cowriehub.<br>';
                $data['body'] .= ' Please check below link to see details!';
                $data['body'] .= ' Referral Code is: '.$userData->code;
                $data['link'] = "admin.general-user";
                $data['linkText'] = "View for details";
                $data['to'] = 'info@cowriehub.com';
                $data['username'] = 'Cowriehub';
                Mail::send('email', $data,function ($m) use ($data) {
                    $m->to($data['to'])->subject('New User SignUp');
                });

        } else {
            $data['title'] = 'New User SignUp';
            $data['body'] = 'Congratulations! A new user has just signed up to Cowriehub.<br>';
            $data['body'] .= ' Please check below link to see details!';
            $data['link'] = "admin.general-user";
            $data['linkText'] = "View for details";
            $data['to'] = 'info@cowriehub.com';
            $data['username'] = 'Cowriehub';
            Mail::send('email', $data,function ($m) use ($data) {
                $m->to($data['to'])->subject('New User SignUp');
            });

            $referrer_id = 0;
        }
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
            'phone' => $data['phone'],
            'is_subscribe' => $subsrcibe,
            'code' => md5(time() . rand()),
            'password' => Hash::make($data['password']),
            'referrer_id' => $referrer_id
        ]);
        if(isset($data['referrel_code'])){
            PosController::pos_register($data,$user->id);
        }
        if($subsrcibe == 1){
            event(new UserRegistered($user));
        }
        return $user;
    }
}
