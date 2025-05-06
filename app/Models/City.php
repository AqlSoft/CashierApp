<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $table = 'cities';
    protected $fillable = ['region_id', 'name_ar', 'name_en', 'latitude', 'longitude', 'created_by', 'updated_by', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
