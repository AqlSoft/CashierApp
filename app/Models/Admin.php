<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admins';


    protected $fillable = [
        'userName',
        'email',
        'password',
        'job_title',
        'status',
        'last_login_at',
        'last_login_ip',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static $roles = [
        'super_admin',
        'supervisor',
        'admin',
        'cashier',
        'driver',
        'worker',
    ];

    public function role()
    {
        $ra = explode('_', $this->role_name);
        $r = '';
        foreach ($ra as $key => $value) {
            $r .= ucfirst($value) . ' ';
        }
        return trim($r);
    }

    public function edit(array $arr)
    {
        foreach ($arr as $key => $value) {
            $this->$key = $value;
        }
        return $this;
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function profile()
    {
        return $this->hasOne(AdminProfile::class, 'admin_id');
    }

    public static function currentUser()
    {
        return Auth::user()->id;
    }
    public function shifts()
    {
        return $this->hasMany(Shift::class, 'admin_id');
    }

    public function activeShift()
    {
        return $this->hasOne(Shift::class, 'admin_id')
            ->where('status', true);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'admin_roles', 'admin_id', 'role_id');
    }
}
