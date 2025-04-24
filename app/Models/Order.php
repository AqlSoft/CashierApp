<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use SoftDeletes; // تفعيل Soft Delete
    
    // تعريف الثوابت في النموذج
    const ORDER_JUST_CREATED    = 1;
    const ORDER_EDITING         = 2;
    const ORDER_PENDING         = 3;
    const ORDER_IN_PROGRESS     = 4;
    const ORDER_ON_DELIVERY     = 5;
    const ORDER_COMPLETED       = 6;
    const ORDER_RATED           = 7;
    const ORDER_CANCELED        = 0;

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
        'table_id',
        'delivery_method',
        'created_by',
        'updated_by',
        'processing_by',
        'processing_time'
    ];
    
    public static function getStatuses()
    {
        return [
            self::ORDER_JUST_CREATED    => 'New Order',
            self::ORDER_EDITING         => 'Editing',
            self::ORDER_PENDING         => 'Pending',
            self::ORDER_IN_PROGRESS     => 'In Progress',
            self::ORDER_ON_DELIVERY     => 'On Delivery',
            self::ORDER_COMPLETED       => 'Completed',
            self::ORDER_RATED           => 'Rated',
            self::ORDER_CANCELED        => 'Canceled'
        ];
    }

    protected $dates=[
        'deleted_at',
        'created_at',
        'updated_at',
        'delivered_at',
        'processing_time',
        'started_processing_at',
    ];


  
    /**
     * علاقة الطلب مع الموظف (Admin) الذي قام بتحضير الطلب.
     *
     * Belongs to relationship with Admin (prepared by).
     */
    public function preparedBy()
    {
        return $this->belongsTo(Admin::class, 'prepared_by');
    }

    /**
     * Scope for available orders.
     *
     * @param $query
     * @return mixed
     */
    public function scopeAvailable($query)
    {
        return $query->whereIn('status', [self::ORDER_JUST_CREATED, self::ORDER_IN_PROGRESS])
                    ->orderBy('created_at', 'asc');
    }

    /**
     * Generate a unique serial number for the order.
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
        0 => 'Canceled',
        1 => 'New',
        2 => 'Editing',
        3 => 'Pending',
        4 => 'Processing',
        5 => 'On Delivery',
        6 => 'Completed',
        7 => 'Rated',
    ];
    protected static $delivery_method = [
        1 => 'Delivery',
        2 => 'Local ',
        3 => 'Takeaway',
    ];

    public static function GetDeliveryMethod(){
        return self::$delivery_method;
    }
    /**
     * Returns a list of order statuses.
     *
     * @return array
     */
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
     * ؟
     * @param int $orderId
     * @return string
     */
    protected function generateValidWaitNo($orderId, $deliveryMethod)
    {
        $order = Order::find($orderId);
        $validMethods = [1, 2, 3];
        
        $method = in_array((int)$deliveryMethod, $validMethods) 
            ? (int)$deliveryMethod 
            : 1; // Default to 1 if invalid
    
        $prefix = [
            1 => 'DVR',
            2 => 'LOC',
            3 => 'TWY'
        ][$method];
    
        return $prefix . substr(str_pad($order->order_sn, 4, '0', STR_PAD_LEFT), -4);
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

    public function table()
{
    return $this->belongsTo(Table::class,'table_id');
}
}
