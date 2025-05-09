<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Currency;

class POSRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $posId = $this->route('id'); // الحصول على معرف العملة من الراوت

        return [
            'name'              => 'required|string|max:255',
            'code'              => 'required|string|max:255|unique:points_of_sale',
            'location'          => 'required|string|max:255',
            'branch_id'         => 'required|exists:branches,id',
            'printer_name'      => 'required|string|max:255',
            'printer_ip'        => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'code.required'         => 'POS code is required',
            'code.min'              => 'POS code must be at least 2 characters',
            'code.max'              => 'POS code must be at most 3 characters',
            'name.required'         => 'POS name is required',
            'name.min'              => 'POS name must be at least 4 characters',
            'name.max'              => 'POS name must be at most 50 characters',
            'branch_id.required'    => 'Branch is required',
            'branch_id.exists'      => 'Branch does not exist',
            'printer_name.required' => 'Printer name is required',
            'printer_name.max'      => 'Printer name must be at most 255 characters',
            'printer_ip.required'   => 'Printer IP is required',
            'printer_ip.max'        => 'Printer IP must be at most 255 characters',
        ];
    }
}
