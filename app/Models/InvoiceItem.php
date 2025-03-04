<?php

// في ملف InvoiceItem.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
  public $timestamps = true;
  protected $table = "sales_invoice_items";
    protected $fillable = [
        'category_id',
        'product_id',
        'invoice_id',
        'quantity',
        'unit_id',
        'price',
        'type',

    ];

    // علاقة واحدة إلى واحدة مع Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function category()
    {
        return $this->belongsTo(ItemCategroy::class, 'category_id');
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    // علاقة واحدة إلى واحدة مع SalesInvoice
    public function invoice()
    {
        return $this->belongsTo(SalesInvoice::class, 'invoice_id');
    }

    public function creator()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }
    public function editor()
    {
        return $this->belongsTo(Admin::class, 'updated_by', 'id');
    }
}