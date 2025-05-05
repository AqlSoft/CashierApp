<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'userName' => 'required|string|min:3|max:50|unique:admins',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        DB::beginTransaction(); // Transaction start moved earlier
        try {
            $admin = Admin::create([ // No need to set created_at
                'userName' => $request->userName,
                'email' => $request->email,
                'password' => Hash::make($validated['password']),
                'status' => 1, // Active by default
            ]);

            DB::commit();

            return redirect()->route('admin.login') // Verify route name
                ->with('success', 'Registration successful! Please login.');
        } catch (\Exception $e) {
            // DB::rollback();
            // Log::error($e); // Log the error
            return back()->withInput()
                ->withErrors(['error' => 'An error occurred during registration. Please try again later.']);
        }
    }
}
