<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  public $timestamps = true;

  protected $table = "orders";

  protected $fillable = [
    'serial_number',
    'order_date',
    'customer_id',
    'notes',
    'status',
    'created_by',
    'updated_by',
];

  /**
     * Generate a unique invoice number.
     *
     * @return string
     */
  
    public static function generateNumber()
    {
        //الحصول على آخر طلب تم إدخالها
        $lastInvoice = self::latest('id')->first();

        // إذا كانت هناك طلبات موجودة، نأخذ آخر رقم طلب ونضيف 1
        if ($lastInvoice) {
            $lastNumber = $lastInvoice->invoice_number;
            $nextNumber = (int) $lastNumber + 1;
        } else {
            // إذا لم تكن هناك طلبات نبدأ برقم معين (مثل 0001)
            $nextNumber = 0001;
        }

        // إرجاع الرقم الجديد
        return str_pad($nextNumber, 8, '0', STR_PAD_LEFT); // لجعل الرقم مكونًا من 8 أرقام (مثال: 00001000)
    }

    // قائمة الحالات
    protected static $status = [
      1 => 'New',
      2 => 'In Progress',
      3 => 'Completed',
      4 => 'Paid',
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

    
}
