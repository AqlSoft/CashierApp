<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Adjust authorization logic as needed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'vat_number' => ['nullable', 'numeric'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],
            'address' => ['nullable', 'string', 'max:255'],
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
            'vat_number.numeric' => __('clients.vat_number_numeric'),
            'name.required' => __('clients.client_name_required'),
            'name.string' => __('clients.client_name_string'),
            'name.max' => __('clients.client_name_max'),
            'phone.required' => __('clients.phone_number_required'),
            'phone.numeric' => __('clients.phone_number_numeric'),
            'address.string' => __('clients.address_string'),
            'address.max' => __('clients.address_max'),
        ];
    }
}