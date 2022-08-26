<?php

namespace App\Http\Controllers;

use Exception;
use Mailchimp;
use App\Models\User;
use Illuminate\Http\Request;
use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    private $mailchimp;
    public function __construct(\Mailchimp $mailchimp){
        $this->mailchimp = $mailchimp;
    }
    public function redirectToFB(){
        return Socialite::driver('facebook')->redirect();
    }
    public function handleCallback(){
        try {
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('social_id', $user->id)->where('email', $user->email)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect('/');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id'=> $user->id,
                    'social_type'=> 'facebook',
                    'role' => 'user',
                    'password' => Hash::make('facebook')
                ]);
                Auth::login($newUser);
                return redirect('/my-account');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(){
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('social_id', $user->id)->where('email', $user->email)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect('/');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id'=> $user->id,
                    'role' => 'user',
                    'password' => Hash::make('google')
                ]);
                Auth::login($newUser);
                return redirect('/my-account');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function mailchimp(Request $request){
        $listId = env('MAILCHIMP_LIST_ID');
        $mailchimp = new \Mailchimp(env('MAILCHIMP_KEY'));
        $campaign = $mailchimp->campaigns->create('regular', [
            'list_id' => $listId,
            'subject' => 'Example Mail',
            'from_email' => 'ceo@cowriehub.com',
            'from_name' => 'Cowriehub',
            'to_name' => 'Abdul Basit'
        ], [
            'html' => '<h1>Testing Content html</h1>',
            'text' => 'Testing content text'
        ]);
        //Send campaign
        $mailchimp->campaigns->send($campaign['id']);
        dd('Campaign send successfully.');
    }
    public function handle(UserRegistered $event){
        $this->mailchimp->lists->subscribe(
            env('MAILCHIMP_LIST_ID'),
            ['email' => $event->user->email],
            // ['email' => 'ab.pk012@gmail.com'],
            null,
            null,
            false
        );
    }
}
