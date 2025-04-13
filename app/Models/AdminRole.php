<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AdminRole extends Model
{
    //
    public $timestamps = true;

    protected $table = 'admin_roles';

    protected $fillable = ['admin_id', 'role_id', 'created_by', 'updated_by'];

    protected $dates = ['created_at', 'updated_at'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = Auth::user()->id;
            $model->updated_by = Auth::user()->id;
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::user()->id;
        });
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
