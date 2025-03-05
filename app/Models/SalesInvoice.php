<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesInvoice extends Model
{
  public $timestamps = true;
  protected $table = "sales_invoices";

    protected $fillable = [
      'invoice_number',
      'serial_number_order',
        'client_id',
        'vat_number',
        'invoice_total',
        'vat_amount',
        'due_date',
        'payment_date',
        'order_id',
        'total_amount',
        'amount',
        'invoice_date',
        'status',
      
    ];

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
