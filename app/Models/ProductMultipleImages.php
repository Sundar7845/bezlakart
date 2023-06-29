<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMultipleImages extends Model
{
    use HasFactory;

    protected $timestamp = false;

    protected $fillable = [
        'product_id',
        'product_images'
    ];
}
