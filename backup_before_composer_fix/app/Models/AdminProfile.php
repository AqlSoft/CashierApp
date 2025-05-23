<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    //
    protected $table = 'admin_profiles';
    public $timestamps = true;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'country',
        'city',
        'id_number',
        'phone',
        'address',
        'image',
        'status',
        'admin_id',

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function full_name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
