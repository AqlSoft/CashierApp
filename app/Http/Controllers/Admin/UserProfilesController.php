<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Admin;
use Symfony\Component\HttpFoundation\RedirectResponse as HttpFoundationRedirectResponse;

class UserProfilesController
{
    /**
     * Display a listing of the resource.
     */
    public function view($id):View
    {
      $admin = Admin::with(['shifts' => function($query) {
        $query->latest('start_time');
    }])->findOrFail($id);

      // $admin= Admin::find($id);
      $vars=[
       'admin'   =>$admin,
      ];
       return view('admin.users.profile' ,$vars);
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
