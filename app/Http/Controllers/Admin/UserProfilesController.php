<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Admin;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Symfony\Component\HttpFoundation\RedirectResponse as HttpFoundationRedirectResponse;

class UserProfilesController
{
    /**
     * Display a listing of the resource.
     */

    public function view($id): View
    {
        // جلب بيانات المسؤول مع العلاقات اللازمة
        $admin = Admin::with(['profile', 'permissions', 'roles', 'shifts' => function ($query) {
            $query->latest('start_time');
        }])->findOrFail($id);
    
      
        // جلب الجلسات النشطة
        $activeSessions = $admin->shifts->where('status', 'Active');
        // جلب الجلسات القديمة
        $oldSessions = $admin->shifts->where('status', 'Closed');
    
        $vars = [
            'admin' => $admin,
            'contacts' => Contact::where('person_id', $id)->get(),
            'activeSessions' => $activeSessions,
            'oldSessions' => $oldSessions,
        ];
    
        return view('admin.users.profile', $vars);
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

public function update(Request $request, $id)
{
    // التحقق من صحة البيانات
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:15',
        'branch_id' => 'nullable|string|max:255',
        'country' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // جلب المستخدم
    $admin = Admin::findOrFail($id);

    // تحديث البيانات الشخصية
    $admin->profile->update([
        'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'],
        'phone' => $validatedData['phone'],
        'branch_id' => $validatedData['branch_id'],
        'country' => $validatedData['country'],
        'city' => $validatedData['city'],
        'address' => $validatedData['address'],
    ]);

// تحديث الصورة إذا تم رفعها
if ($request->hasFile('image')) {
   
    if ($admin->profile->image && file_exists(public_path('assets/admin/uploads/images/avatar/' . $admin->profile->image))) {
        unlink(public_path('assets/admin/uploads/images/avatar/' . $admin->profile->image));
    }
   
    $image = $request->file('image');
    $imageName = time() . '_' . $image->getClientOriginalName(); // إنشاء اسم فريد للصورة
    $image->move(public_path('assets/admin/uploads/images/avatar'), $imageName);

  
    $admin->profile->update(['image' => $imageName]);
}
  
    return redirect()->back()->with('success', __('profile.update_success'));
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
