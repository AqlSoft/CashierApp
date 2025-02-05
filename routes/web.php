<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;

// Route::get('/', function () {
//     return view('auth.login');
// });

// Auth::routes();
// // Auth::routes(['register' => false]);



// Admin Routes
Route::middleware('guest:admin')->prefix('admin')->group(function () {
  Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
  Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
  Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('admin.register');
  Route::post('/register', [RegisterController::class, 'register'])->name('admin.register.submit');

});


Route::middleware('auth:admin')->prefix('admin')->group(function () {
  Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
  
  Route::get('/home', [HomeController::class, 'index'])->name('home');
});