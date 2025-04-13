<?php

namespace App\Http\Controllers\Admin;

use App\Models\RolePermission;
use Exception;
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
        try {
            $rolePermission->save();
            return response()->json([
                'respnseType' => 'success',
                'message' => 'Permission attached to role successfully',
                'action' => 'attach'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'respnseType' => 'error',
                'message' => 'An error occurred during attachment because: ' . $e->getMessage()
            ], 500);
        }

    }


    /**
     * Remove the specified resource from storage.
     */
    public function detach(Request $request, String $id)
    {
        $rolePermission = RolePermission::where(['role_id' => $request->role_id, 'permission_id' => $request->permission_id])->first();

        if (!$rolePermission) {
            return response()->json([
                'responseType' => 'error',
                'message' => 'Permission not found',
            ], 404);
        }
        
        try {
            $rolePermission->delete();
            return response()->json([
                'responseType' => 'success',
                'message' => 'Permission detached from role successfully',
                'action' => 'detach'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred during detachment because: ' . $e->getMessage()
            ], 500);
        }
    }
}
