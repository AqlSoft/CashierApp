<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

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

    public function getNameAttribute()
    {
        return App::getLocale() == 'ar' ? $this->name_ar : $this->name_en;
    }
}
