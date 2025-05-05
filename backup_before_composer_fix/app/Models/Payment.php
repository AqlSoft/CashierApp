<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
  public $timestamps = true;

  protected $table = "payments";

  protected $fillable = [
    'order_id',
    'payment_method',
    'invoice_id',
    'amount_from',
    'amount_to',
    'payment_date',
    'status',
    'from_account',
    'to_account',
    'note',
    'created_at',
    'updated_at',
    'created_by',
    'updated_by'
  ];

  // علاقة واحدة إلى واحدة مع PaymentMethod
  public function pymtMethod()
  {
    return $this->belongsTo(PaymentMethod::class, 'payment_method');
  }

  // علاقة واحدة إلى واحدة مع Orde
  public function Order()
  {
    return $this->belongsTo(Order::class, 'order_id');
  }

  public function invoice()
  {
    return $this->belongsTo(SalesInvoice::class, 'invoice_id');
  }

  public function createdBy()
  {
    return $this->belongsTo(User::class, 'created_by');
  }

  public function updatedBy()
  {
    return $this->belongsTo(User::class, 'updated_by');
  }
}
