<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    public $timestamps = true;
    protected $table = "payment_methods";

    protected $fillable = [
        'name_ar',
        'name_en',
        'code',
        'icon',
        'is_active',
        'sort_order'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class, 'payment_method');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // الحصول على الاسم حسب اللغة
    public function getNameAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->name_ar : $this->name_en;
    }

    // نطاق للطرق المفعلة فقط
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // نطاق للترتيب
    public function scopeSorted($query)
    {
        return $query->orderBy('sort_order');
    }
}
