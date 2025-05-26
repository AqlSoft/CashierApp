<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaxGroupMapping extends Model
{
    /**
     * اسم الجدول المرتبط بالنموذج
     *
     * @var string
     */
    protected $table = 'tax_group_mappings';

    /**
     * الحقول المحمية من التعيين المباشر
     *
     * @var array
     */
    protected $fillable = [
        'tax_group_id',
        'tax_id',
        'display_order',
    ];

    /**
     * الحقول التي يجب تحويلها لأنواع محددة
     *
     * @var array
     */
    protected $casts = [
        'display_order' => 'integer',
    ];

    /**
     * القيم الافتراضية للنموذج
     *
     * @var array
     */
    protected $attributes = [
        'display_order' => 0,
    ];

    /**
     * الحصول على مجموعة الضرائب المرتبطة
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function taxGroup()
    {
        return $this->belongsTo(TaxGroup::class, 'tax_group_id');
    }

    /**
     * الحصول على الضريبة المرتبطة
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tax()
    {
        return $this->belongsTo(Tax::class, 'tax_id');
    }
}
