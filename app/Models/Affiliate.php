<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    use HasFactory;
    protected $table = 'affiliates';
    protected $fillable = [
        'company_name',
        'user_id',
        'company_email',
        'company_phone',
        'referrel_code',
        'landmark_area',
        'is_agree_policy',
        // 'payment',
        // 'account_name',
        // 'account_number',
        // 'networks',
        // 'bank_account_name',
        // 'bank_account_number',
        // 'branch',
        // 'bank_name',
        // 'primary',
        'status',
    ];
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
