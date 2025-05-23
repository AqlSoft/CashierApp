<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\Models\ItemCategroy;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Product extends Model
{
      // تعريف الثوابت في النموذج
      const PRODUCT_JUST_CREATED    = 1;
      const PRODUCT_EDITING         = 2;
      const PRODUCT__PARKED         = 3;
      const PRODUCT__CANCELED       = 0;
  public $timestamps = true;
  protected $table = "products";

  protected $fillable = ['name', 'cost_price','sale_price','image', 'category_id', 'description','processing_time' ,'status','category_id','unit_id', 'created_at', 'created_by', 'updated_by', 'updated_at'];

  protected $casts = [
    'status' => 'boolean',
    'processing_time' => 'int',
  
  ];

  public function getFormattedProcessingTimeAttribute()
  {
      return optional($this->processing_time)->format('H:i:s');
  }

  public static function getStatusPro()
  {
      return [
          self::PRODUCT_JUST_CREATED     => 'New product',
          self::PRODUCT_EDITING          => 'Editing',
          self::PRODUCT__PARKED          => 'parking',
          self::PRODUCT__CANCELED        => 'Canceled'

      ];
  }
  public function creator()
  {
      return $this->belongsTo(Admin::class, 'created_by', 'id');
  }
  public function editor()
  {
      return $this->belongsTo(Admin::class, 'updated_by', 'id');
  }
  // العلاقة مع الفئة
  public function category()
  {
      return $this->belongsTo(ItemCategroy::class, 'category_id');
  }

  // العلاقة مع الوحدة
  public function unit()
  {
      return $this->belongsTo(Unit::class, 'unit_id');
  }

}
