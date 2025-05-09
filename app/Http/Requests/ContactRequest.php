<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'category_name' => 'required|string|max:255',
            'person_id' => 'required|exists:admins,id',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'حقل الاسم مطلوب',
            'contact.required' => 'حقل الاتصال مطلوب',
            'category_name.required' => 'حقل الفئة مطلوب',
            'person_id.required' => 'حقل الشخص مطلوب',
            'person_id.exists' => 'الشخص المحدد غير موجود',
        ];
    }
}
