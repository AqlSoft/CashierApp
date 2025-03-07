<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $table = 'accounts';
    protected $fillable = [
        'name',
        'parent_id',
        'type',
        'status',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];
}
