<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethodSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'cash_on_delivery',
        'digital_payment',
        'razor_pay',
        'razorpay_key',
        'razorpay_secret',
        'created_by',
        'updated_by'
    ];
}
