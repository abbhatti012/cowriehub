<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AuthorDetail extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'author-detail';

    protected $fillable = [
        'cover',
        'profile',
        'name',
        'email',
        'biography',
        'achievement',
        'website',
        'facebook',
        'twitter',
        'instagram',
    ];
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
