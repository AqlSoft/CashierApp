<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\RateLimiter;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\Admin;
use Carbon\Carbon;
use Exception;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * manage and validate request.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        // التحقق من محاولات تسجيل الدخول المتكررة
        $key = 'login.' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return redirect()->back()
                ->withInput($request->only('userName'))
                ->with('error', "لقد تجاوزت الحد المسموح من المحاولات. يرجى المحاولة بعد {$seconds} ثانية.");
        }
        // محاولة تسجيل الدخول
        if (auth()->guard('admin')->attempt([
            'userName'  => $request->input('userName'),
            'password'  => $request->input('password'),
            'status'    => 1 // التحقق من أن المستخدم نشط
        ])) {
            RateLimiter::clear($key);

            $user = auth()->guard('admin')->user();

            // // تسجيل وقت آخر تسجيل دخول
            // $user->edit([
            //     'last_login_at' => Carbon::now(),
            //     'last_login_ip' => $request->ip()
            // ])->save();

            // تسجيل عملية تسجيل الدخول
            // activity()
            //     ->performedOn($user)
            //     ->log('تم تسجيل الدخول بنجاح');

            return redirect()->route('home')
                ->with('success', 'تم تسجيل الدخول بنجاح');
        }

        // تسجيل محاولة فاشلة
        RateLimiter::hit($key);
        return redirect()->back()
            ->withInput($request->only('userName'))
            ->with('error', 'بيانات الاعتماد غير صحيحة');
    }
    
    /**
     * Log the current user out.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $user = Admin::find(auth()->guard('admin')->user()->id);

        // // تسجيل عملية تسجيل الخروج
        // activity()
        //     ->performedOn( $user)
        //     ->log('تم تسجيل الخروج');

        auth()->guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
            ->with('success', 'تم تسجيل الخروج بنجاح');
    }
}
