<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class POS extends Model
{
    //

    protected $table = 'points_of_sale';
    protected $fillable = [
        'name',
        'code',
        'location',
        'printer_name',
        'printer_ip',
        'is_active',
        'branch_id'
    ];
}
