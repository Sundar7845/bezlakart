<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryTimeType extends Model
{
    use HasFactory;

    protected $timestamp = false;

    protected $fillable = [
        'delivery_time_type'
    ];
}
