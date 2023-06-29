<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'store_name',
        'country_id',
        'state_id',
        'city_id',
        // 'tax',
        'aprx_min_del_time',
        'aprx_max_del_time',
        'delivery_time_type_id',
        'system_module_id',
        'first_name',
        'last_name',
        'mobile',
        'email',
        'password',
        'logo',
        'cover_photo',
        'is_active',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
