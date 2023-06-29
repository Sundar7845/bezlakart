<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RolePermissions extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'menu_id',
        'role_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
