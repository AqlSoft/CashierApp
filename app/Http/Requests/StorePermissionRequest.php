<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePermissionRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'unique:permissions'],
            'module' => ['required', 'string', 'max:255'],
            'brief' => ['nullable', 'string', 'max:255'],
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
            'name.required' => __('permissions.name_required'),
            'name.string' => __('permissions.name_string'),
            'name.max' => __('permissions.name_max'),
            'name.unique' => __('permissions.name_unique'),
            'module.required' => __('permissions.module_required'),
            'module.string' => __('permissions.module_string'),
            'module.max' => __('permissions.module_max'),
            'brief.string' => __('permissions.brief_string'),
            'brief.max' => __('permissions.brief_max'),
        ];
    }
}