<?php

namespace App\Models;

use App\Models\Marketing;
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
    public function marketing_detail(){
        return $this->hasOne(Marketing::class, 'id', 'marketing_id');
    }
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
