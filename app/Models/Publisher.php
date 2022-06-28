<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    protected $table = 'publishers';
    protected $fillable = [
        'company_name',
        'user_id',
        'company_email',
        'company_phone',
        'number_of_authors',
        'number_of_publishers',
        'number_of_ceo',
        'business_certificate',
    ];
}
