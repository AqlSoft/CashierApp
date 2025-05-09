<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Currency;

class CurrencyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $currencyId = $this->route('id'); // الحصول على معرف العملة من الراوت

        return [
            'code' => [
                'required',
                'string',
                'min:2',
                'max:3',
                'unique:currencies,code' . ($currencyId ? ',' . $currencyId : ''),
            ],
            'name' => [
                'required',
                'string',
                'min:4',
                'max:50',
                'unique:currencies,name' . ($currencyId ? ',' . $currencyId : ''),
            ],
            'symbol' => 'required|string|min:1|max:4',
            'symbol_position' => 'required|in:before,after',
            'decimal_places' => 'required|numeric|min:0|max:6',
            'decimal_separator' => 'required|string|min:1|max:1',
            'thousands_separator' => 'required|string|min:1|max:1',
            'exchange_rate' => 'nullable|numeric',
            'is_active' => 'nullable|in:0,1',
            'is_default' => 'nullable|in:0,1',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Currency code is required',
            'code.min' => 'Currency code must be at least 2 characters',
            'code.max' => 'Currency code must be at most 3 characters',
            'name.required' => 'Currency name is required',
            'name.min' => 'Currency name must be at least 4 characters',
            'name.max' => 'Currency name must be at most 50 characters',
            'symbol.required' => 'Currency symbol is required',
            'symbol.min' => 'Currency symbol must be at least 1 character',
            'symbol.max' => 'Currency symbol must be at most 4 characters',
            'symbol_position.required' => 'Currency symbol position is required',
            'symbol_position.in' => 'Currency symbol position must be either "before" or "after"',
            'decimal_places.required' => 'Currency decimal places is required',
            'decimal_places.numeric' => 'Currency decimal places must be a number',
            'decimal_places.min' => 'Currency decimal places must be at least 0',
            'decimal_places.max' => 'Currency decimal places must be at most 6',
            'decimal_separator.required' => 'Currency decimal separator is required',
            'decimal_separator.string' => 'Currency decimal separator must be a string',
            'decimal_separator.min' => 'Currency decimal separator must be at least 1 character',
            'decimal_separator.max' => 'Currency decimal separator must be at most 1 character',
            'thousands_separator.required' => 'Currency thousands separator is required',
            'thousands_separator.string' => 'Currency thousands separator must be a string',
            'thousands_separator.min' => 'Currency thousands separator must be at least 1 character',
            'thousands_separator.max' => 'Currency thousands separator must be at most 1 character',
            'exchange_rate.required' => 'Currency exchange rate is required',
            'exchange_rate.numeric' => 'Currency exchange rate must be a number',
            'is_active.required' => 'Currency active status is required',
            'is_active.in' => 'Currency active status must be either 0 or 1',
            'is_default.required' => 'Currency default status is required',
            'is_default.in' => 'Currency default status must be either 0 or 1',
        ];
    }
}
