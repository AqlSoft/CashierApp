<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

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

    public function getNameAttribute()
    {
        return App::getLocale() == 'ar' ? $this->name_ar : $this->name_en;
    }

    public $timestamps = true;

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
