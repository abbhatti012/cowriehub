<?php

namespace App\Models;

use App\Models\Marketing;
use App\Models\Consultant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    protected $fillable = [
        'id',
        'user_id',
        'assign_to',
        'marketing_id',
        'job_status',
        'is_completed',
        'reject_note',
        'document',
        'document_note',
        'payment_note',
        'payment_proof',
        'confirmation',
    ];
    public function consultant(){
        return $this->hasOne(Consultant::class, 'user_id', 'assign_to');
    }
    public function user(){
        return $this->hasOne(User::class, 'id', 'assign_to');
    }
    public function marketing(){
        return $this->hasOne(Marketing::class, 'id', 'marketing_id');
    }
}
