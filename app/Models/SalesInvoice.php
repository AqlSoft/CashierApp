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
        $lastInvoice = self::latest('id')->first();
        $nextNumber = $lastInvoice ? (int) substr($lastInvoice->invoice_number, -4) + 1 : 1;
        $prefix = 'INV';
        $date = now()->format('Ym');
        $formattedNumber = str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        return "{$prefix}-{$date}-{$formattedNumber}";
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
}
