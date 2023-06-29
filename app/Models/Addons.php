<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Addons extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'addon_name',
        'store_id',
        'is_active',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
