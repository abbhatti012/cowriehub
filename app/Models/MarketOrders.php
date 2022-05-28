<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MarketOrders extends Model
{
    use HasFactory;
    protected $table = 'marketing_orders';
    protected $fillable = [
        'id',
        'marketing_id',
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'notes',
    ];
}
