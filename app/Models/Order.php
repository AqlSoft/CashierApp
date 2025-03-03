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
