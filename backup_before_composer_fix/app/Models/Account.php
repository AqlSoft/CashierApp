<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $table = 'accounts';
    protected $fillable = [
        'name',
        'parent_id',
        'type',
        'status',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];

    public function parent()
    {
        return $this->belongsTo(Account::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Account::class, 'parent_id');
    }

    public function creator()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function editor()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }
}
