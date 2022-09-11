<?php

namespace App\Models;

use App\Models\Book;
use App\Models\AuthorDetail;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\VerifyEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'social_id',
        'social_type',
        'fcm_token',
        'code',
        'referrer_id',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function books_published(){
        return $this->hasMany(Book::class, 'user_id', 'id');
    }
    public function author_detail(){
        return $this->hasOne(AuthorDetail::class, 'user_id', 'id');
    }
    public function affiliates(){
        return $this->hasOne(Affiliate::class, 'user_id', 'id');
    }
    public function affiliate_user(){
        return $this->hasOne(User::class, 'referrer_id', 'id');
    }
    public function pos(){
        return $this->hasOne(Pos::class, 'user_id', 'id');
    }
    public static function updateROle($role){
        return User::where('id',Auth::id())->update(['role'=>$role]);
    }
    public static function IsUserExists($table){
        return DB::table($table)->where(['user_id' => Auth::id(), 'status' => 1])->count();
    }
    public static function IsPending($table){
        return DB::table($table)->where(['user_id' => Auth::id(), 'status' => 0])->count();
    }
    public function sendEmailVerificationNotification(){
        $this->notify(new VerifyEmail);
    }
}