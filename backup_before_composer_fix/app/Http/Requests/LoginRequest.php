<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'userName' => 'required|string|min:3|max:50',
            'password' => 'required|string|min:8'
        ];
    }

    public function messages()
    {
        return [
            'userName.required' => 'اسم المستخدم مطلوب',
            'userName.min' => 'اسم المستخدم يجب أن يكون 3 أحرف على الأقل',
            'userName.max' => 'اسم المستخدم يجب أن لا يتجاوز 50 حرف',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'كلمة المرور يجب أن تكون 8 أحرف على الأقل'
        ];
    }
}
