<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class SalesSession extends Model
{
  protected $table = "sales-session";

  public $timestamps = true;

  protected $fillable = [
    'monybox_id',
    'admin_id',
    'name',
    'device_name',
    'opening_balance',
    'closing_balance',
    'start_time',
    'end_time',
    'status',
    'notes',
    'created_by',
    'updated_by'
  ];

  protected $casts = [
    'status' => 'boolean',
    'start_time' => 'datetime',
    'end_time' => 'datetime',
    'opening_balance' => 'decimal:2',
    'closing_balance' => 'decimal:2'
  ];

  // العلاقات

  public function monybox()
  {
    return $this->belongsTo(MonyBox::class, 'monybox_id');
  }

  public function admin()
  {
    return $this->belongsTo(Admin::class);
  }

  public function creator()
  {
    return $this->belongsTo(Admin::class, 'created_by');
  }

  public function editor()
  {
    return $this->belongsTo(Admin::class, 'updated_by');
  }


  // Custom Casts
  protected function status(): Attribute
  {
    return Attribute::make(
      get: fn($value) => $value ? 'Active' : 'Closed',
      // set: fn($value) => $value === 'Active'
    );
  }

  //إضافة scope للشفتات النشطة
  public function scopeActive($query)
  {
    return $query->where('status', true);
  }

  // إضافة scope للتحقق من الشفتات النشطة للخزنة
  public function scopeActiveForMonybox($query, $monyboxId)
  {
    return $query->where('monybox_id', $monyboxId)
      ->where('status', true);
  }

  // إضافة scope للتحقق من الشفتات النشطة للمستخدم
  public function scopeActiveForAdmin($query, $adminId)
  {
    return $query->where('admin_id', $adminId)
      ->where('status', true);
  }

public function orders()
{
    return $this->hasMany(Order::class);
}

public function invoices()
{
    return $this->hasMany(SalesInvoice::class, 'sales_session_id', 'id');
}


}
