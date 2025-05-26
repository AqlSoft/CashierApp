<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaxGroupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $taxGroupId = $this->route('taxGroup') ? $this->route('taxGroup')->id : null;

        return [
            'group_code' => [
                'required',
                'string',
                'max:20',
                Rule::unique('tax_groups', 'group_code')->ignore($taxGroupId),
            ],
            'group_name_ar' => 'required|string|max:100',
            'group_name_en' => 'required|string|max:100',
            'is_active' => 'boolean',
            'description' => 'nullable|string|max:500',
            'taxes' => 'required|array|min:1',
            'taxes.*' => 'exists:taxes,id',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'group_code' => 'كود المجموعة',
            'group_name_ar' => 'اسم المجموعة (عربي)',
            'group_name_en' => 'اسم المجموعة (إنجليزي)',
            'is_active' => 'الحالة',
            'description' => 'الوصف',
            'taxes' => 'الضرائب',
            'taxes.*' => 'الضريبة',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'group_code.required' => 'حقل كود المجموعة مطلوب',
            'group_code.unique' => 'كود المجموعة مستخدم مسبقاً',
            'group_name_ar.required' => 'حقل اسم المجموعة (عربي) مطلوب',
            'group_name_en.required' => 'حقل اسم المجموعة (إنجليزي) مطلوب',
            'taxes.required' => 'يجب اختيار ضريبة واحدة على الأقل',
            'taxes.min' => 'يجب اختيار ضريبة واحدة على الأقل',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'is_active' => $this->has('is_active') ? true : false,
        ]);
    }
}
