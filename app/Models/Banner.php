<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'banner_name',
        'banner_url',
        'banner_location_id',
        'banner_image',
        'system_module_id',
        'store_id',
        'banner_type_id',
        'product_id',
        'is_active',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
