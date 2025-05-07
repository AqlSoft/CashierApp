<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Models\Branch;
use App\Models\City;
use App\Models\Country;
use App\Models\Region;
use App\Models\Timezone;
use Illuminate\Http\Request;

class BranchController extends Controller
{

    public function index()
    {
        $branches = Branch::all();

        $tab = 'branches';
        return view('admin.setting.index', compact('branches', 'tab'));
    }
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

    public function edit($id)
    {
        $branch         = Branch::find($id);
        $countries      = Country::all();
        $regions        = Region::all();
        $cities         = City::all();
        $timezones      = Timezone::all()->groupBy('tz_group');
        return view('admin.branches.edit', compact('branch', 'countries', 'regions', 'cities', 'timezones'));
    }

    public function update(Request $request)
    {

        $branch = Branch::find($request->id);
        $branch->update($request->except('_token', '_method', 'id'));
        return back()->with('success', 'Branch updated successfully');
    }
}
