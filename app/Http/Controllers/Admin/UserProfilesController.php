<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Symfony\Component\HttpFoundation\RedirectResponse as HttpFoundationRedirectResponse;

class UserProfilesController
{
    /**
     * Display a listing of the resource.
     */
    public function view($id):View
    {
        // جلب بيانات المسؤول مع العلاقات اللازمة
      $admin = Admin::with(['profile', 'permissions', 'roles','shifts' => function($query) {
        $query->latest('start_time');
    }])->findOrFail($id);

        // بيانات إضافية مثل الأجهزة المتصلة ومحاولات الدخول المشبوهة
        $connectedDevices = $this->getConnectedDevices($admin->id);
        $suspiciousAttempts = $this->getSuspiciousLoginAttempts($admin->id);
        
      $vars=[
       'admin'   =>$admin,
       'connectedDevices'=> $connectedDevices,
        'suspiciousAttempts'=>$suspiciousAttempts,
      ];
       return view('admin.users.profile' ,$vars);
    }


    public function logoutAllDevices($id)
    {
        // تحقق من المستخدم
        $admin = Auth::guard('admin')->user();
    
        if ($admin->id != $id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
    
        // استخدام كلمة المرور المشفرة من قاعدة البيانات
        Auth::logoutOtherDevices($admin->getAuthPassword());
    
        return redirect()->route('admin.users.profile', $id)->with('success', 'Logged out from all devices successfully.');
    }
      /**
     * تسجيل الخروج من النظام
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }

    /**
     * جلب الأجهزة المتصلة
     *
     * @param int $adminId
     * @return array
     */
    private function getConnectedDevices($adminId)
    {
        // مثال: جلب الأجهزة المتصلة من قاعدة البيانات
        return [
            (object) ['device_name' => 'Chrome on Windows', 'last_active_at' => now()->subMinutes(10)],
            (object) ['device_name' => 'Safari on iPhone', 'last_active_at' => now()->subHours(2)],
        ];
    }

    /**
     * جلب محاولات الدخول المشبوهة
     *
     * @param int $adminId
     * @return int
     */
    private function getSuspiciousLoginAttempts($adminId)
    {
        // مثال: جلب عدد محاولات الدخول المشبوهة من قاعدة البيانات
        return 3;
    }

    public function updatePassword(Request $request, $id)
    {
        // تحقق من المستخدم
        $admin = Auth::guard('admin')->user();

        if ($admin->id != $id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        // تحقق من كلمة المرور الحالية
        if (!Hash::check($request->current_password, $admin->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        // تحقق من تطابق كلمة المرور الجديدة مع التأكيد
        if ($request->new_password !== $request->confirm_password) {
            return redirect()->back()->with('error', 'New password and confirmation do not match.');
        }

        // تحديث كلمة المرور
        $admin->password = Hash::make($request->new_password);
        $admin->save();

        return redirect()->route('view-profile', $id)->with('success', 'Password updated successfully.');
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
    public function update(Request $request, string $id):RedirectResponse
    {
      $admin = Admin::findOrFail($id);
    
      // تحديد الحقل الذي تم تعديله
      $field = array_key_first($request->except('_token', '_method'));
      
      // تحديث الحقل المحدد فقط
      $admin->update([$field => $request->input($field)]);
      
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
