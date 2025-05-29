<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch;
use App\Models\City;
use App\Models\Country;
use App\Models\Region;
use App\Models\Setting;
use App\Models\Unit;
use App\Models\ItemCategroy;
use App\Models\Tax;
use App\Models\Timezone;

use Illuminate\Http\Request;

class SettingsController  extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::all();
        // جلب المناطق الزمنية مجمعة حسب tz_group
        $timezones = Timezone::all()->groupBy('tz_group');
        $vars = [
            'countries' => Country::all(),
            'cities' => City::all(),
            'regions' => Region::all(),
            'settings' => $settings,
            'timezones' => $timezones,
            'branches' => Branch::all(),
            'tab' => 'general',
        ];
        return view('admin.setting.index', $vars);
    }


  public function setting(){

        $vars = [
            'categroies' => ItemCategroy::all(),
            'units' => Unit::all(),
            'taxes' => Tax::all(),
            'tab' => 'general',
        ];
    return view('admin.setting.products.index',$vars);
  }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {

        $setting = Setting::findOrFail($id);

        // تحديد الحقل الذي تم تعديله
        $field = array_key_first($request->except('_token', '_method'));

        // تحديث الحقل المحدد فقط
        $setting->update([$field => $request->input($field)]);

        return back()->with('success', 'تم تحديث البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
