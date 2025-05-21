<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
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
            'id' => ['required', 'exists:roles,id'],
            'name' => ['required', 'string', 'max:255', Rule::unique('roles')->ignore($this->id)],
            'brief' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'boolean'],
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
            'id.required' => __('roles.id_required'),
            'id.exists' => __('roles.id_exists'),
            'name.required' => __('roles.name_required'),
            'name.string' => __('roles.name_string'),
            'name.max' => __('roles.name_max'),
            'name.unique' => __('roles.name_unique'),
            'brief.string' => __('roles.brief_string'),
            'brief.max' => __('roles.brief_max'),
            'status.required' => __('roles.status_required'),
            'status.boolean' => __('roles.status_boolean'),
        ];
    }
}