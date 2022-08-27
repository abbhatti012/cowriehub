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
        'privacy_policy',
        'content_policy',
        'terms',
        'affiliate_network_agreement',
        'authors_contract',
        'marketers_networks_agreement',
        'referred_customers_agreement',
        'seller_contracts_for_authors',
        'seller_contracts_for_publishers',
        'about_us',
        'instagram_followers',
        'facebook_followers',
        'youtube_followers',
        'tumbler_followers',
        'free_delivery',
        'secure_payment',
        'money_back',
        'support',
        'about_banner',
    ];
}
