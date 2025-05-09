<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $table = 'contacts';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'contact',
        'category_name',
        'person_id',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public $casts = [
        'status' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function person()
    {
        return $this->belongsTo(Admin::class);
    }

    public function parseIcon()
    {
        $icon = '';
        switch ($this->category_name) {
            case 'mobile':
                $icon = 'fas fa-mobile-alt'; // أيقونة هاتف محمول حديثة
                break;
            case 'whatsapp':
                $icon = 'fab fa-whatsapp'; // أيقونة واتساب الرسمية
                break;
            case 'email':
                $icon = 'fas fa-envelope'; // أيقونة بريد إلكتروني حديثة
                break;
            case 'fax':
                $icon = 'fas fa-print'; // أيقونة طابعة/فاكس حديثة
                break;
            case 'phone':
                $icon = 'fas fa-phone-alt'; // أيقونة هاتف ثابت حديثة
                break;
            default:
                $icon = 'fas fa-address-book'; // أيقونة افتراضية لجهة اتصال
                break;
        }
        return $icon;
    }
}
