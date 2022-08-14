<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class extraField extends Model
{
    use HasFactory;
    protected $table = 'extra_fields';
    protected $fillable = [
        'id',
        'book_id',
        'user_id',
        'label',
        'value',
    ];
}