<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\AdminProfile;
use App\Models\Country;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsController
{
    //

    public function index()
    {
        //

        $vars = [
            'admins' => Admin::with('profile')->get(),
            'countries' => Country::all(),
        ];

        return view('admin.admins.index', $vars);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //return $request->all();
        $validated = $request->validate([
            'first_name'    => 'required|string|min:3|max:50',
            'last_name'     => 'nullable|string',
            'userName'      => 'required|string|min:3|max:50|unique:admins',
            'email'         => 'required|string|email|max:255|unique:admins',
            'password'      => 'required|string|min:8|confirmed',
        ]);

        //return $validated;

        $validated['created_by'] = Admin::currentUser();
        $validated['updated_by'] = Admin::currentUser();
        $validated['status'] = 1;


        DB::beginTransaction(); // Transaction start moved earlier
        try {
            $admin = Admin::create($validated);

            AdminProfile::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'admin_id' => $admin->id
            ]);

            DB::commit();

            return redirect()->back() // Verify route name
                ->with('success', 'Registration successful! Please login.');
        } catch (Exception $e) {
            DB::rollback();
            // Log::error($e); // Log the error
            return back()->withInput()
                ->withErrors(['error' => 'An error occurred during registration because: ' . $e->getMessage()]);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
        $vars = [
            'admin' => Admin::find($id),
            'roles' => Admin::$roles,
        ];
        return view('admin.admins.edit', $vars);
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
        if ($id === Admin::currentUser()) {
            return redirect()->back()->withError('فيه حد زعلك مننا؟');
        }

        try {
            Admin::find($id)->delete();
            return redirect()->route('admin-list')->withSuccess('تم حذف المستخدم بنجاح');
        } catch (Exception $err) {
            return redirect()->back()->withError('مش عارفين بس مالك وماله بتحذفه ليه؟');
        }
    }
}
