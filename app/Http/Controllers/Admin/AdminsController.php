<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\AdminProfile;
use App\Models\Country;
use App\Models\Role;
use App\Models\RolePermission;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; // Add this line
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
        // return $validated;

        $validated['created_by'] = Admin::currentUser();
        $validated['updated_by'] = Admin::currentUser();
        $validated['status'] = 1;

        DB::beginTransaction(); // Transaction start moved earlier
        try {
            // return $validated;
            $admin = Admin::create($validated);

            AdminProfile::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'admin_id' => $admin->id,
                'country' => 150,
                'id_number' => $request->id_number,
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

            'admin' => Admin::where('id', $id)->with('profile')->with('roles')->first(),
            'roles' => Role::all(),
            'adminPermissions' => Admin::where('id', $id)->with('permissions')->first()->permissions
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

    public function searchByUsername(Request $request)
    {
        $query = null == $request->search_query ?
            Admin::with('profile')->get() :
            Admin::where('userName', 'LIKE', '%' . trim($request->search_query) . '%')->with('profile');
        // trying to get All Admins who has name like $name
        $admins = $query->get();

        return view('admin.admins.search.list', compact('admins'));
    }

    public function searchByEmail(Request $request)
    {
        $query = null == $request->search_query ?
            Admin::with('profile')->get() :
            Admin::where('email', 'LIKE', '%' . trim($request->search_query) . '%')->with('profile');
        // trying to get All Admins who has name like $name
        $admins = $query->get();

        return view('admin.admins.search.list', compact('admins'));
    }

    public function searchByIdNumber(Request $request)
    {


        $query = null == $request->search_query ?
            AdminProfile::all() :
            AdminProfile::where('id_number', 'LIKE', '%' . trim($request->search_query) . '%');
        // trying to get All Admins who has name like $name
        $profiles = $query->pluck('admin_id')->get();
        //$admins
        //$admins = Admin::whereIn('id', $profiles)->with('admin')->get();

        return $profiles; //view('admin.admins.search.list', compact('admins'));
    }
}
