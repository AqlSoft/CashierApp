<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = "order_items";

    protected $fillable = [
        'order_id',
        'category_id',
        'product_id',
        'quantity',
        'unit_id',
        'price',
        'notes',
        'created_at',
        'created_by', 
        'updated_by',
        'updated_at'
    ];

  
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
    
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
