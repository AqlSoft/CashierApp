<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Permission;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $modules = Permission::$modules;
        $permissions = Permission::select('id', 'module', 'name', 'brief', 'status')->get()->groupBy('module');

        return view('admin.permissions.list', compact('permissions', 'modules'));
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
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:50',
            'brief' => 'nullable|string',
            'module' => 'required|string',
        ]);

        $validated['created_by'] = Admin::currentUser();
        $validated['updated_by'] = Admin::currentUser();
        $validated['brief'] = $request->brief ? $request->brief : 'New Permission with no description';
        $validated['status'] = 1;

        try {
            Permission::create($validated);
            //return $validated;
            return redirect()->back()->withSuccess('Permission Created Successfully!');
        } catch (Exception $e) {
            return redirect()->back()->withInput()->withError('An error occurred during registration because: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
