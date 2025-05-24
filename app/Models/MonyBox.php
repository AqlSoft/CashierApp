<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Auth;

class MonyBox extends Model
{

    protected $table="mony_boxes";

   public  $timesstamps=true;

    protected $fillable=[
     'name', 'last_isal_exhcange', 'last_isal_collect',
        'status', 'date', 'created_by', 'updated_by','created_at','updated_at'
    ];

    protected $casts = [
      'is_master' => 'boolean',
      'status' => 'boolean',
      'date' => 'date'
	];

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

	protected function isMaster(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => $value ? 'Main' : 'Sub',
		);
	}
	protected function status(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => $value ? 'Active' : 'Inactive',
		);
	}
	protected function date(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => $value ? \Carbon\Carbon::parse($value)->format('Y-m-d H:i') : null,
		);
	}
	public function creator(): BelongsTo
	{
		return $this->belongsTo(Admin::class, 'created_by');
	}
	public function editor(): BelongsTo
	{
		return $this->belongsTo(Admin::class, 'updated_by');
	}


	// العلاقة مع الشفتات
	public function SalesSession()
	{
		return $this->hasMany(SalesSession::class, 'monybox_id');
	}

	public function activeSalesSession()
	{
		return $this->hasOne(SalesSession::class, 'monybox_id')
			->where('status', true);
	}
}
