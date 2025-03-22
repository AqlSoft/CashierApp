<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\OrdersItemsController;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\SalesInvoiceController;
use App\Http\Controllers\Admin\PaymentsController;

// Auth::routes();
// // Auth::routes(['register' => false]);

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('admin.register');


// Admin Routes
Route::middleware('guest:admin')->prefix('admin')->group(function () {
  Route::get('/login',   [LoginController::class, 'showLoginForm'])->name('login');
  Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
  Route::get('/login',    [LoginController::class, 'showLoginForm'])->name('admin.login');
  Route::post('/login',   [LoginController::class, 'login'])->name('admin.login.submit');
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

  // orders Routes
  Route::prefix('orders')->group(function () {
    Route::get('/index',              [OrdersController::class, 'index'])->name('display-order-all');
    Route::get('/fast/create',        [OrdersController::class, 'fastCreate'])->name('fast-creqate-order');
    Route::post('/store',             [OrdersController::class, 'store'])->name('store-new-order');
    Route::get('/display/{id}',       [OrdersController::class, 'show'])->name('view-order-info');
    Route::post('/update',            [OrdersController::class, 'update'])->name('update-order-info');
    Route::get('/edit/{id}',          [OrdersController::class, 'edit'])->name('edit-order-info');
    Route::get('/destroy/{id}',       [OrdersController::class, 'destroy'])->name('destroy-order-info');
    Route::get('/cancel/{id}',        [OrdersController::class, 'cancel'])->name('cancel-order-info');
    Route::get('/allow/edit/{id}',    [OrdersController::class, 'allowEdit'])->name('allow-order-editting');
  });

  Route::prefix('orderItems')->group(function () {
    Route::get('/create/{id}',       [OrdersItemsController::class, 'create'])->name('add-orderitem-input-entry');
    Route::post('/store/{id}',       [OrdersItemsController::class, 'store'])->name('save-orderitem-info');
    Route::get('/edit/{id}',         [OrdersItemsController::class, 'edit'])->name('edit-orderitem-info');
    Route::post('/update',           [OrdersItemsController::class, 'update'])->name('update-orderitem-input');
    Route::get('/destroy/{id}',      [OrdersItemsController::class, 'destroy'])->name('destroy-oItem-info');
    Route::get('/get-products-by-category/{categoryId}', [OrdersItemsController::class, 'getProductsByCategory'])->name('get-products-by-category');
  });

  // clients Routes
  Route::prefix('clients')->group(function () {
    Route::get('/index',        [ClientsController::class, 'index'])->name('display-client-all');
    Route::post('/store',       [ClientsController::class, 'store'])->name('store-new-client');
    Route::get('/display/{id}', [ClientsController::class, 'show'])->name('view-client-info');
    Route::post('/update',      [ClientsController::class, 'update'])->name('update-client-info');
    Route::get('/edit/{id}',    [ClientsController::class, 'edit'])->name('edit-client-info');
    Route::get('/destroy/{id}', [ClientsController::class, 'destroy'])->name('destroy-client-info');
  });

  // invoices routes
  Route::prefix('invoices')->group(function () {
    Route::get('/create/{id}',        [SalesInvoiceController::class, 'create'])->name('add-invoices-orderItem');
    Route::get('/print-invoice/{id}', [SalesInvoiceController::class, 'printInvoice'])->name('print-invoice');
  });

  // invoices routes
  Route::prefix('payments')->group(function () {
    Route::post('/cash/store',       [PaymentsController::class, 'cashStore'])->name('payments.cash.store');
    Route::post('/store',            [PaymentsController::class, 'store'])->name('save-invoices-orderitem-info');
    Route::get('/edit/{id}',         [PaymentsController::class, 'edit'])->name('edit-invoices-orderitem-info');
    Route::post('/update',           [PaymentsController::class, 'update'])->name('update-invoices-orderitem-input');
    Route::get('/destroy/{id}',      [PaymentsController::class, 'destroy'])->name('destroy-invoices-orderitem');
  });
});
