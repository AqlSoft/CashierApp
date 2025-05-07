<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Country;
use App\Models\City;

class Branch extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name_ar',
        'name_en',
        'company_id',
        'branch_type',
        'tax_number',
        'commercial_register',
        'phone',
        'mobile',
        'email',
        'website',
        'country_id',
        'region_id',
        'city_id',
        'address',
        'postal_code',
        'latitude',
        'longitude',
        'currency_id',
        'timezone',
        'fiscal_start_date',
        'fiscal_end_date',
        'is_active',
        'is_online',
        'opening_date'
    ];

    protected $casts = [
        'is_active'         => 'boolean',
        'is_online'         => 'boolean',
        'opening_date'      => 'date',
        'fiscal_start_date' => 'date',
        'fiscal_end_date'   => 'date',
        'currency_id'       => 'string',
        'city_id'           => 'integer',
        'region_id'         => 'integer',
        'country_id'        => 'integer',
    ];



    // العلاقة مع الدولة
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // العلاقة مع المدينة
    public function city()
    {
        return $this->belongsTo(city::class);
    }



    // الحصول على الاسم حسب اللغة
    public function getNameAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->name_ar : $this->name_en;
    }

    // نطاق للفروع النشطة فقط
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // نطاق للفروع من نوع معين
    public function scopeType($query, $type)
    {
        return $query->where('branch_type', $type);
    }
}
