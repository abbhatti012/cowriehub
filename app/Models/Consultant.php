<?php

namespace App\Models;

use App\Models\MarketOrders;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consultant extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'consultant';
    protected $fillable = [
        'id',
        'user_id',
        'skill',
        'custom_skill',
        'skill_certificate',
        'phone_number',
        'institution',
        'year_of_completion',
        'id_type',
        'identity_card',
        'intro_viedo',
        'description',
        'portfolio',
        'terms',
    ];
    public function marketing(){
        return $this->hasOne(MarketOrders::class, 'id', 'job_id');
    }
}
