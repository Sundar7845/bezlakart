<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateShippingCharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'state_id',
        'shipping_charge',
        'cod_charge',
        'created_by',
        'updated_by'
    ];
}
