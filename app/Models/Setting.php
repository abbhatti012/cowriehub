<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = [
        'id',
        'start_date',
        'end_date',
        'affiliate_commission',
        'consultant_commission',
        'user_commission',
    ];
}
