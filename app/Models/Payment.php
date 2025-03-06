<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps=true;
    
    protected $table="payments";

    protected $fillable = [
      'order_id',
      'payment_method_id',
      'amount',
      'payment_date',
      'status',
      'from_account',
      'to_account',
      'reference',
      'created_by',
      'updated_by'
    ];

        // علاقة واحدة إلى واحدة مع PaymentMethod
        public function paymentMethod()
        {
            return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
        }

    // علاقة واحدة إلى واحدة مع Orde
    public function Order(){
      return $this->belongsTo(Order::class,'order_id');
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
