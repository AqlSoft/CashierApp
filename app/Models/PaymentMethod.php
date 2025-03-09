<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    public $timestamps=true;
    protected $table="payment_methods";

    protected $fillable=[
      'name',
      'is_active',
      'created_by',
      'updated_by'
    ];

    public function payments()
{
    return $this->hasMany(Payment::class, 'payment_method');
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
