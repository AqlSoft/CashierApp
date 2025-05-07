<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Models\AppSetting;
use Illuminate\Http\Request;

class AppSettingController extends Controller
{
    //
    public function index()
    {
        $settings = AppSetting::all();
        return view('admin.settings.index', compact('settings'));
    }

    public function store(Request $request)
    {
        $setting = AppSetting::where('key_name', $request->key_name)->first();
        $setting->key_value = $request->key_name;
        $setting->create();
        return redirect()->back()->with('success', 'Settings updated successfully');
    }

    public function update(Request $request)
    {
        $settings = AppSetting::all();
        foreach ($settings as $setting) {
            $setting->key_value = $request->input($setting->key_name);
            $setting->save();
        }
        return redirect()->back()->with('success', 'Settings updated successfully');
    }
}
