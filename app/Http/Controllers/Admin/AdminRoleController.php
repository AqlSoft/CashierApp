<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminRole;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function attach(Request $request, $id)
    {
        $ex_admin_role = AdminRole::where('admin_id', $id)->where('role_id', $request->role_id)->first();
        if ($ex_admin_role) {
            return response()->json([
                'status' => 'error',
                'message' => 'Role already attached'
            ]);
        }
        try {
            AdminRole::create([
                'admin_id' => $id,
                'role_id' => $request->role_id
            ]);
            $adminRoles = AdminRole::where('admin_id', $id)->get();
            return response()->json([
                'status' => 'success',
                'message' => 'Role attached successfully',
                'adminRoles' => $adminRoles
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function detach(Request $request, $id)
    {
        $ex_admin_role = AdminRole::where('admin_id', $id)->where('role_id', $request->role_id)->first();
        if ($ex_admin_role) {
            try {
                $ex_admin_role->delete();
                $adminRoles = AdminRole::where('admin_id', $id)->get();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Role detached successfully',
                    'adminRoles' => $adminRoles
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 'error',
                    'message' => $e->getMessage()
                ]);
            }
        }
    }
}
