<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
  use SoftDeletes; // تفعيل Soft Delete
  // تعريف الثوابت في النموذج
    const  STATUS_NEW = 1;
    const STATUS_IN_PROGRESS = 2;
    const STATUS_PENDING = 3;
    const STATUS_ON_DELIVERY = 4;
    const STATUS_COMPLETED = 5;
    const STATUS_CANCELED = 0;
  public static function getStatuses()
  {
    return [
      self::STATUS_NEW => 'New',
      self::STATUS_IN_PROGRESS => 'In_Progress',
      self::STATUS_PENDING => 'Pending',
      self::STATUS_ON_DELIVERY => 'On Delivery',
      self::STATUS_COMPLETED => 'Completed',
      self::STATUS_CANCELED => 'Canceled'
  ];
  
  }

    public $timestamps = true;

    protected $table = "orders";


  protected $fillable = [
    'order_sn',
    'order_date',
    'customer_id',
    'notes',
    'status',
    'wait_no',
    'shift_id',
    'created_by',
    'updated_by',
    'processing_by',
    'processing_time'
];
protected $dates=['deleted_at'];

     /* Generate a unique invoice number.
     *
     * Belongs to relationship with Admin (prepared by).
     */
    public function preparedBy()
    {
        return $this->belongsTo(Admin::class, 'prepared_by');
    }

  public function scopeAvailable($query)
  {
      return $query->whereIn('status', [self::STATUS_NEW, self::STATUS_IN_PROGRESS])
                  ->orderBy('created_at', 'asc');
  }
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
    1 => 'Delivery',
    2 => 'Local ',
    3 => 'Takeout',
  
];
public static function getStatusList()
{
    return self::$status;
}
  
    /**
     * علاقة الطلب مع الموظف (Admin) الذي قام بإنشاء الطلب.
     *
     * Belongs to relationship with Admin (created by).
     */
    public function creator()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }

    /**
     * علاقة الطلب مع الموظف (Admin) الذي قام بتعديل الطلب.
     *
     * Belongs to relationship with Admin (updated by).
     */
    public function editor()
    {
        return $this->belongsTo(Admin::class, 'updated_by', 'id');
    }

    /**
     * علاقة الطلب مع العميل (Party).
     *
     * Belongs to relationship with Party.
     */
    public function customer()
    {
        return $this->belongsTo(Party::class, 'customer_id');
    }

    /**
     * علاقة واحد إلى متعدد بين الطلب وعناصر الطلب (OrderItem)
     * تسترجع جميع العناصر المرتبطة بهذا الطلب.
     *
     * One-to-many relationship with OrderItem.
     * Returns all items related to this order.
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    /**
     * علاقة الطلب مع الشفت (Shift) الذي تم خلاله الطلب.
     * تسترجع الشفت المرتبط بالطلب.
     *
     * Belongs to relationship with Shift.
     * Returns the shift related to this order.
     */
    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id');
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
    
    /**
     * علاقة واحد إلى واحد بين الطلب والفاتورة (SalesInvoice) الخاصة به.
     * تسترجع الفاتورة المرتبطة بهذا الطلب.
     *
     * One-to-one relationship with SalesInvoice.
     * Returns the invoice related to this order.
     */
    public function invoice()
    {
        return $this->hasOne(SalesInvoice::class, 'order_id');
    }
}
