<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    //
    protected $table = 'regions';
    protected $fillable = [
        'name_ar',
        'name_en',
        'code',
        'created_by',
        'updated_by',
        'is_active',
    ];

    public $timestamps = true;

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
