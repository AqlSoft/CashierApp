<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaxGroup extends Model
{
    /**
     * الحقول المحمية من التعيين المباشر
     *
     * @var array
     */
    protected $fillable = [
        'group_code',
        'group_name_ar',
        'group_name_en',
        'description',
        'is_active',
        'created_by',
        'updated_by',
    ];

    /**
     * التحويل التلقائي لأنواع البيانات
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * القيم الافتراضية للنموذج
     *
     * @var array
     */
    protected $attributes = [
        'is_active' => true,
    ];

    /**
     * الحقول التي يجب إخفاؤها عند التحويل إلى مصفوفة أو JSON
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
    ];

    /**
     * الحقول التي يجب إضافتها إلى المصفوفة
     *
     * @var array
     */
    protected $appends = [
        'group_name',
        'taxes_count',
    ];

    /**
     * الحصول على اسم المجموعة بناءً على لغة التطبيق
     *
     * @return string
     */
    public function getGroupNameAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->group_name_ar : $this->group_name_en;
    }

    /**
     * العلاقة مع الضرائب في هذه المجموعة
     *
     * @return BelongsToMany
     */
    /**
     * الحصول على عدد الضرائب في المجموعة
     *
     * @return int
     */
    public function getTaxesCountAttribute()
    {
        return $this->taxes()->count();
    }

    /**
     * العلاقة مع الضرائب في هذه المجموعة
     *
     * @return BelongsToMany
     */
    public function taxes(): BelongsToMany
    {
        return $this->belongsToMany(Tax::class, 'tax_group_mappings')
            ->withPivot('display_order')
            ->orderBy('display_order')
            ->withTimestamps();
    }

    /**
     * المستخدم الذي أنشأ السجل
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * المستخدم الذي قام آخر تحديث للسجل
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (Auth::check()) {
                $model->created_by = Auth::id();
                $model->updated_by = Auth::id();
            }
        });

        static::updating(function ($model) {
            if (Auth::check()) {
                $model->updated_by = Auth::id();
            }
        });
    }

    /**
     * نطاق الاستعلام للمجموعات النشطة فقط
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * حساب إجمالي الضريبة لمبلغ معين
     *
     * @param float $amount
     * @return float
     */
    public function calculateTotalTax(float $amount): float
    {
        return $this->taxes->sum(function ($tax) use ($amount) {
            return $tax->calculateTax($amount);
        });
    }

    /**
     * الحصول على معدل الضريبة الإجمالي كنسبة مئوية
     *
     * @return float
     */
    public function getTotalTaxRate(): float
    {
        return $this->taxes->sum(function ($tax) {
            return $tax->tax_type === 'PERCENTAGE' ? $tax->tax_rate : 0;
        });
    }

    /**
     * الحصول على إجمالي الضريبة الثابتة
     *
     * @return float
     */
    public function getTotalFixedTax(): float
    {
        return $this->taxes->sum(function ($tax) {
            return $tax->tax_type === 'FIXED_AMOUNT' ? $tax->tax_rate : 0;
        });
    }
}
