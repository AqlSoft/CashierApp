<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::all();
        return view('admin.roles.list', compact('roles'));
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

        $validated = $request->validate([
            'name' => 'required|string|min:3|max:50',
            'brief' => 'nullable|string',
        ]);

        $validated['created_by'] = Admin::currentUser();
        $validated['updated_by'] = Admin::currentUser();
        $validated['brief'] = $request->brief ? $request->brief : 'New Role with no description';
        $validated['status'] = 1;

        try {
            Role::create($validated);
            return redirect()->back()->withSuccess('Role Created Successfully!');
        } catch (Exception $e) {
            return redirect()->back()->withInput()->withError('An error occurred during registration because: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        //
        $role = Role::find($id);
        return view('admin.roles.display', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $role = Role::find($request->id);
        $vdt = $request->validate([
            'name'      => 'required|string|min:3|max:50',
            'brief'     => 'required|string',
            'status'    => 'required|in:0,1'
        ]);

        $vdt['updated_by'] = Admin::currentUser();
        $vdt['status'] = $request->status  == "0" ? 0 : 1;

        try {
            $role->update($vdt);
            return redirect()->back()->withSuccess('Role Updated Successfully!');
        } catch (Exception $err) {
            return redirect()->back()->withInput()->withError('Role update process failed due to: ' . $err->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
