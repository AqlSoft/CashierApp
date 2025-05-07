<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    //
    public function store(Request $request)
    {
        $vdt = $request->validate(
            [
                'code'              => 'required',
                'name_ar'           => 'required',
                'name_en'           => 'required',
                'branch_type'       => 'required',
                'tax_number'        => 'required',
                'commercial_record' => 'required',
                'phone'             => 'required',
                'mobile'            => 'nullable',
                'email'             => 'nullable',
                'website'           => 'nullable',
                'country_id'        => 'nullable',
                'region_id'         => 'nullable',
                'city_id'           => 'nullable',
                'address'           => 'nullable',
                'postal_code'       => 'nullable',
                'latitude'          => 'nullable',
                'longitude'         => 'nullable',
                'currency'          => 'nullable',
                'timezone'          => 'nullable',
                'fiscal_start_date' => 'nullable',
                'fiscal_end_date'   => 'nullable',
                'is_active'         => 'nullable',
                'is_online'         => 'nullable',
                'opening_date'      => 'nullable',
            ]
        );
        $vdt['country_id'] = 150;
        $vdt['region_id'] = 4;
        $vdt['city_id'] = 15;
        Branch::create($vdt);
       
        return back()->with('success', 'Branch created successfully');
    }

    
}
