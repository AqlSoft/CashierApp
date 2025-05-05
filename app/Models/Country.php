<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
        'arabic_name',
        'iso2',
        'iso3',
        'call_code'
    ];

    // Scopes (if needed)
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
