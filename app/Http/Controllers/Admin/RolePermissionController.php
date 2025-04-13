<?php

namespace App\Http\Controllers\Admin;

use App\Models\RolePermission;
use Illuminate\Http\Request;

class RolePermissionController
{
    /**
     * Store a newly created resource in storage.
     */
    public function attach(Request $request)
    {
        $ex_rp = RolePermission::where('role_id', $request->role_id)
            ->where('permission_id', $request->permission_id)
            ->first();
        if ($ex_rp) {
            return response()->json([
                'message' => 'Permission already attached to role'
            ], 200);
        }
        $request->validate([
            'role_id' => 'required',
            'permission_id' => 'required'
        ]);

        $rolePermission = new RolePermission();
        $rolePermission->role_id = $request->role_id;
        $rolePermission->permission_id = $request->permission_id;
        $rolePermission->save();

        return response()->json([
            'message' => 'Permission attached to role successfully',
            'action' => 'attach'
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function detach(Request $request, String $id)
    {
        $rolePermission = RolePermission::where(['role_id' => $request->role_id, 'permission_id' => $request->permission_id])->first();

        if (!$rolePermission) {
            return response()->json([
                'message' => 'Permission not found',
                'action' => 'detach'
            ], 404);
        }
        $rolePermission->delete();
        return response()->json([
            'message' => 'Permission detached from role successfully'
        ]);
    }
}
