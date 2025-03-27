<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
  use SoftDeletes; // تفعيل Soft Delete

  public $timestamps = true;

  protected $table = "orders";

  protected $fillable = [
    'order_sn',
    'order_date',
    'customer_id',
    'notes',
    'status',
    'wait_no',
    'created_by',
    'updated_by',
];
protected $dates=['deleted_at'];
  /**
     * Generate a unique invoice number.
     *
     * @return string
     */
  
     public static function generateSerialNumber()
     {
         // الحصول على آخر سريال نمبر تم إنشاؤه
         $lastSerial = self::orderBy('id', 'desc')->first();
     
         if ($lastSerial) {
             // إذا كان هناك سريال نمبر سابق، نأخذه ونضيف 1
             $lastNumber = (int) $lastSerial->order_sn;
             $nextNumber = $lastNumber + 1;
         } else {
             // إذا لم يكن هناك سريال نمبر سابق، نبدأ من رقم معين (مثل 1)
             $nextNumber = 1;
         }
     
         // التأكد من أن الرقم الجديد غير مستخدم مسبقًا (للتأكد من عدم التكرار)
         while (self::where('order_sn', $nextNumber)->exists()) {
             $nextNumber++;
         }
     
         // إرجاع الرقم الجديد مع تنسيق مكون من 8 أرقام (مثال: 00000001)
         return str_pad($nextNumber, 8, '0', STR_PAD_LEFT);
     }

    // قائمة الحالات
    protected static $status = [
      1 => 'New',
      2 => 'In Progress',
      3 => 'Pending',
      4 => 'On Delivery',
      5 => 'Completed',
      0 => 'Canceled',
  ];
  protected static $delivery_method = [
    1 => 'Takeout',
    2 => 'Local ',
    3 => 'Delivery',
  
];

  // دالة للحصول على قائمة الحالات
  public static function getStatusList()
  {
      return self::$status;
  }
    
    public function creator()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }
    public function editor()
    {
        return $this->belongsTo(Admin::class, 'updated_by', 'id');
    }
  /* علاقة مع العميل (Party)*/
    public function customer()
    {
        return $this->belongsTo(Party::class, 'customer_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    } 

    
/**
     * Generate a unique wait_no for the order item.
     *
     * @param int $orderId
     * @return string
     */
    public static function generateWaitNo($orderId)
    {
        // الحصول على رقم الطلب (order_sn)
        $order = self::find($orderId);
    
        if (!$order) {
            throw new \Exception('الطلب غير موجود.');
        }
    
        
        $orderSn = $order->order_sn;
        $lastFourDigits = substr($orderSn, -4); 
    
        
        $waitNo = 'OUT' . $lastFourDigits;
    
        return $waitNo;
    }
}