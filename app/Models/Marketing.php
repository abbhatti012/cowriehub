<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Marketing extends Model
{
    use HasFactory;
    protected $table = 'marketing';
    protected $fillable = [
        'id',
        'package',
        'price',
        'duration',
        'point',
    ];
}
