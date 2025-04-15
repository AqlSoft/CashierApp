<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $table = 'permissions';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'brief',
        'module',
        'status',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function parseName()
    {
        // return every word capitalized
        return ucwords(str_replace('-', ' ', $this->name));
    }

    public static $modules = [
        'accoounts',
        'admins',
        'admin-profiles',
        'admin-roles',
        'item-categories',
        'money-boxes',
        'orders',
        'order-items',
        'partys',
        'payments',
        'payment-methods',
        'permissions',
        'products',
        'product-categories',
        'roles',
        'sales-invoices',
        'settings',
        'units',
        'users',
    ];
}
