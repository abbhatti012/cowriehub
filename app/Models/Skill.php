<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;
    protected $table = 'skills';
    protected $fillable = [
        'id',
        'user_id',
        'skill',
    ];
    public function users(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
