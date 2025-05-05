<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Table extends Model
{
    use HasFactory;

    protected $table = 'tables';

    protected $fillable = [
        'number',
        'capacity',
        'location',
        'is_occupied',
        'qr_code'
    ];

    protected $casts = [
        'is_occupied' => 'boolean',
        'capacity' => 'integer'
    ];

  

    // العلاقة مع جميع الطلبات
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

  
  

  
}