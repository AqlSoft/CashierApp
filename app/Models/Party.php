<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = "parties";
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'type',
        'created_by',
        'updated_by',
    ];

    // علاقة مع المستخدم الذي أنشأ السجل
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // علاقة مع المستخدم الذي قام بالتحديث
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // علاقة مع الطلبات (للعملاء)
    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
}