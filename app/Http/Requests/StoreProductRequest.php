<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'category_id' => ['required', 'exists:items_categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'cost_price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['required', 'numeric', 'min:0'],
            'processing_time' => ['required', 'date_format:H:i:s'],
            'brief' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'], // Adjust mimes and max size as needed
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
            'category_id.required' => __('products.category_required'),
            'category_id.exists' => __('products.category_exists'),
            'name.required' => __('products.name_required'),
            'name.string' => __('products.name_string'),
            'name.max' => __('products.name_max'),
            'cost_price.required' => __('products.cost_price_required'),
            'cost_price.numeric' => __('products.cost_price_numeric'),
            'cost_price.min' => __('products.cost_price_min'),
            'sale_price.required' => __('products.sale_price_required'),
            'sale_price.numeric' => __('products.sale_price_numeric'),
            'sale_price.min' => __('products.sale_price_min'),
            'processing_time.required' => __('products.processing_time_required'),
            'processing_time.date_format' => __('products.processing_time_date_format'),
            'brief.string' => __('products.brief_string'),
            'brief.max' => __('products.brief_max'),
            'image.image' => __('products.image_image'),
            'image.mimes' => __('products.image_mimes'),
            'image.max' => __('products.image_max'),
            'status.boolean' => __('products.status_boolean'),
        ];
    }
}