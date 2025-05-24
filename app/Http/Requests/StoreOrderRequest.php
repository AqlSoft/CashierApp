<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'order_sn' => ['required', 'numeric'],
            // 'customer_id' => ['required', 'exists:customers,id'],
            'order_date' => ['required', 'date'],
            'notes' => ['nullable', 'string', 'max:255'],
            'status' => ['nullable', 'boolean'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'order_sn.required' => __('orders.order_sn_required'),
            'order_sn.numeric' => __('orders.order_sn_numeric'),
            // 'customer_id.required' => __('orders.customer_id_required'),
            // 'customer_id.exists' => __('orders.customer_id_exists'),
            'order_date.required' => __('orders.order_date_required'),
            'order_date.date' => __('orders.order_date_date'),
            'notes.string' => __('orders.notes_string'),
            'notes.max' => __('orders.notes_max'),
            'status.boolean' => __('orders.status_boolean'),
        ];
    }
}