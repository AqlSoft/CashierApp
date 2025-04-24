<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Table extends Model
{
    use HasFactory;

    protected $table = 'tables';

    protected $fillable = [
        'number',
        'capacity',
        'location',
        'is_occupied',
        'qr_code'
    ];

    protected $casts = [
        'is_occupied' => 'boolean',
        'capacity' => 'integer'
    ];

    // العلاقة مع الطلبات الحالية
    // public function currentOrder()
    // {
    //     return $this->hasOne(Order::class)
    //                 ->whereNotIn('status', ['completed', 'cancelled'])
    //                 ->latest();
    // }

    // العلاقة مع جميع الطلبات
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // تغيير حالة الطاولة
    // public function setOccupied(bool $occupied): void
    // {
    //     $this->update(['is_occupied' => $occupied]);
    // }

    // إنشاء QR Code للطاولة (اختياري)
    // public function generateQrCode(): string
    // {
    //     $url = route('table.menu', ['table' => $this->id]);
    //     return \SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->generate($url);
    // }

    // نطاقات الاستعلام (Query Scopes)
    // public function scopeAvailable($query)
    // {
    //     return $query->where('is_occupied', false);
    // }

    // public function scopeOccupied($query)
    // {
    //     return $query->where('is_occupied', true);
    // }

    // public function scopeByCapacity($query, int $minCapacity)
    // {
    //     return $query->where('capacity', '>=', $minCapacity);
    // }

    // الحصول على آخر طلب للطاولة
    // public function getLastOrderAttribute()
    // {
    //     return $this->orders()->latest()->first();
    // }

    // التحقق من إمكانية تحرير الطاولة
    // public function canBeFreed(): bool
    // {
    //     return $this->is_occupied && 
    //            (!$this->currentOrder || 
    //             in_array($this->currentOrder->status, ['completed', 'cancelled']));
    // }
}