<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;
    protected $table = 'revenue';
    protected $fillable = [
        'id',
        'user_id',
        'payment_id',
        'admin_amount',
        'user_amount',
        'payment_status',
        'admin_payment_status',
    ];
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
