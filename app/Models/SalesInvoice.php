<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesInvoice extends Model
{
  public $timestamps = true;
  protected $table = "sales_invoices";

  protected $fillable = [
    'serial_number_order',
    'invoice_number',
    'client_id',
    'vat_number',
    'vat_amount',
    'due_date',
    'payment_method',
    'payment_date',
    'order_id',
    'total_amount',
    'amount',
    'invoice_date',
    'type',
    'status',
    'created_by',
    'updated_by'
  ];

  /**
   * Generate a unique invoice number.
   *
   * @return string
   */
  public static function generateNumber()
{
    $prefix = 'INV';
    $date = now()->format('Ym');
    $nextNumber = 1;

    // الحصول على آخر فاتورة في الشهر الحالي
    $lastInvoice = self::where('invoice_number', 'like', "{$prefix}-{$date}-%")
                      ->orderBy('id', 'desc')
                      ->first();

    // إذا كانت هناك فاتورة سابقة في الشهر الحالي
    if ($lastInvoice) {
        // استخراج الرقم التسلسلي من آخر فاتورة
        $lastNumber = (int) substr($lastInvoice->invoice_number, -4);
        $nextNumber = $lastNumber + 1;
    }

    // تنسيق الرقم التسلسلي
    $formattedNumber = str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

    // التحقق من أن الرقم غير موجود بالفعل
    $invoiceNumber = "{$prefix}-{$date}-{$formattedNumber}";
    while (self::where('invoice_number', $invoiceNumber)->exists()) {
        $nextNumber++;
        $formattedNumber = str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        $invoiceNumber = "{$prefix}-{$date}-{$formattedNumber}";
    }

    return $invoiceNumber;
}

  // علاقة واحدة إلى العديد مع InvoiceItem
  public function items()
  {
    return $this->hasMany(InvoiceItem::class, 'invoice_id');
  }

  // علاقة واحدة إلى واحدة مع Order
  public function order()
  {
    return $this->belongsTo(Order::class, 'order_id');
  }
  // علاقة واحدة إلى واحدة مع Client
public function customer()
{
    return $this->belongsTo(Party::class, 'customer_id');
}
}
