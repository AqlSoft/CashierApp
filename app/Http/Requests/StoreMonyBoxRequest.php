<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreMonyBoxRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'last_isal_exhcange' => ['nullable', 'numeric'],
            'last_isal_collect' => ['nullable', 'numeric'],
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
            'name.required' => __('monyBoxes.name_required'),
            'name.string' => __('monyBoxes.name_string'),
            'name.max' => __('monyBoxes.name_max'),
            'date.required' => __('monyBoxes.date_required'),
            'date.date' => __('monyBoxes.date_date'),
            'last_isal_exhcange.numeric' => __('monyBoxes.last_exchange_numeric'),
            'last_isal_collect.numeric' => __('monyBoxes.last_collection_numeric'),
            'status.boolean' => __('monyBoxes.status_boolean'),
        ];
    }
}