<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductsController;


// Route::get('/', function () {
//     return view('auth.login');
// });

// Auth::routes();
// // Auth::routes(['register' => false]);


Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin Routes
Route::middleware('guest:admin')->prefix('admin')->group(function () {
  Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
  Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
  Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
  Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('admin.register');
  Route::post('/register', [RegisterController::class, 'register'])->name('admin.register.submit');
});


Route::middleware('auth:admin')->prefix('admin')->group(function () {
  Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
  Route::get('/dashboard', [HomeController::class, 'index'])->name('admin-dashboard');

    // Products Routes
      Route::prefix('products')->group(function () {
      Route::get('/index',        [ProductsController::class, 'index'])->name('display-product-all');
      Route::post('/store',       [ProductsController::class, 'store'])->name('store-new-product');
      Route::get('/display/{id}', [ProductsController::class, 'show'])->name('view-product-info');
      Route::post('/update',      [ProductsController::class, 'update'])->name('update-product-info');
      Route::get('/edit/{id}',    [ProductsController::class, 'edit'])->name('edit-product-info');
      Route::get('/destroy/{id}', [ProductsController::class, 'destroy'])->name('destroy-product-info');
    });
  });
