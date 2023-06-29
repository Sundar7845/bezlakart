<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'main_category_id',
        'category_id',
        'sub_category_name',
        'sub_category_image',
        'is_active',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
