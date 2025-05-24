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
        'country',
        'city',
        'address',
        'id_number',
        'phone',
        'image',
        'status',
        'admin_id',
        'branch_id'

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
  
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
