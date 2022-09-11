<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pos extends Model
{
    use HasFactory;
    protected $table = 'pos';
    protected $fillable = [
        'company_name',
        'user_id',
        'company_email',
        'company_phone',
        'referrel_code',
        'landmark_area',
        'is_agree_policy',
        'status',
    ];
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
