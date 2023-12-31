<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanType extends Model
{
    use HasFactory;

    protected $timestamp = false;

    protected $fillable = [
        'plan_type'
    ];
}
