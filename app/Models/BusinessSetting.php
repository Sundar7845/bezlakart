<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'otp_length',
        'otp_expiry_duration',
        'email_expiry_duration',
        'referral_code_length',
        'is_maintenace_mode',
        'company_name',
        'company_address',
        'company_phone',
        'company_email',
        'country_id',
        'is_free_delivery',
        'free_delivery_amount',
        'currency_symbol',
        'play_store_url',
        'app_store_url',
        'store_cancel_order',
        'deliveryman_cancel_order',
        'show_earning_for_order',
        'admin_order_notification',
        'otp_login',
        'google_signup',
        'facebook_signup',
        'gold_module',
        'ecommerce',
        'store_self_registration',
        'admin_commission',
        'company_website',
        'company_logo',
        'app_logo',
        'favicon',
        'created_by',
        'updated_by'
    ];
}
