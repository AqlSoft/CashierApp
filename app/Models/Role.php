<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'roles';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'brief',
        'status',
        'created_by',
        'updated_by',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'status' => 'boolean',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function adminRoles()
    {
        return $this->hasMany(AdminRole::class);
    }

    public function admins()
    {
        return $this->belongsToMany(Admin::class);
    }
}
