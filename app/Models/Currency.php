<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'symbol',
        'icon',
        'symbol_position',
        'decimal_places',
        'decimal_separator',
        'thousands_separator',
        'is_default',
        'is_active',
        'exchange_rate',
        'created_by',
        'updated_by'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_default'        => 'boolean',
        'is_active'         => 'boolean',
        'decimal_places'    => 'integer',
        'exchange_rate'     => 'decimal:6'
    ];

    /**
     * Get the default currency
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDefault($query)
    {
        return $query->where('is_default', true);
    }

    /**
     * Get only active currencies
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Format money according to currency settings
     *
     * @param float $amount
     * @return string
     */
    public function format($amount)
    {
        $amount = number_format(
            $amount,
            $this->decimal_places,
            $this->decimal_separator,
            $this->thousands_separator
        );

        return $this->symbol_position === 'before'
            ? $this->symbol . $amount
            : $amount . $this->symbol;
    }

    /**
     * Set the default currency (only one can be default)
     *
     * @return void
     */
    public function setAsDefault()
    {
        // Remove default status from all currencies
        self::query()->update(['is_default' => false]);

        // Set this currency as default
        $this->is_default = true;
        $this->save();
    }
}
