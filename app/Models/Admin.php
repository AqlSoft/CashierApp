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
        'roles_name',
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

    public static function currentUser()
    {
        return Auth::user()->id;
    }
}
