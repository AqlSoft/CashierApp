<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\AdminsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LocaleController;

// Language Switch Route
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\OrdersItemsController;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\MonitorsController;
use App\Http\Controllers\Admin\SalesInvoiceController;
use App\Http\Controllers\Admin\PaymentsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\MonyBoxesController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ShiftsController;
use App\Http\Controllers\Admin\UserProfilesController;
use App\Http\Controllers\Admin\KitchenController;
use App\Http\Controllers\Admin\PaymentMethodsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RolePermissionController;


Route::get('locale/{locale}', [LocaleController::class, 'switch'])->name('locale-switch');
// Auth::routes();
// // Auth::routes(['register' => false]);

Route::get('/',                 [LoginController::class, 'showLoginForm'])->name('login');
// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/register',         [RegisterController::class, 'showRegistrationForm'])->name('admin.register');


// Admin Routes
Route::middleware('guest:admin')->prefix('admin')->group(function () {
  Route::get('/login',        [LoginController::class, 'showLoginForm'])->name('login');
  Route::get('/',             [LoginController::class, 'showLoginForm'])->name('login');
  Route::get('/login',        [LoginController::class, 'showLoginForm'])->name('admin.login');
  Route::post('/login',       [LoginController::class, 'login'])->name('admin.login.submit');
  Route::get('/register',     [RegisterController::class, 'showRegistrationForm'])->name('admin.register');
  Route::post('/register',    [RegisterController::class, 'register'])->name('admin.register.submit');
});


Route::middleware('auth:admin')->prefix('admin')->group(function () {
  Route::post('/logout',      [LoginController::class, 'logout'])->name('admin.logout');
  Route::get('/dashboard',    [HomeController::class, 'index'])->name('admin-dashboard');

  // Admins Routes
  Route::prefix('admins')->group(function () {
    Route::get('/list',                         [AdminsController::class, 'index'])->name('admin-list');
    Route::get('/create',                       [AdminsController::class, 'create'])->name('admin-new-create');
    Route::post('/store',                       [AdminsController::class, 'store'])->name('store-admin-info');
    Route::get('/edit/{id}',                    [AdminsController::class, 'edit'])->name('edit-admin-info');
    Route::put('/update',                       [AdminsController::class, 'update'])->name('update-admin-info');
    Route::get('/display/{id}',                 [AdminsController::class, 'show'])->name('display-admin-info');
    Route::delete('/destroy/{id}',              [AdminsController::class, 'destroy'])->name('destroy-admin-info');
    Route::get('/search/admins/by/username',    [AdminsController::class, 'searchByUsername'])->name('search-admins-by-username');
    Route::get('/search/admins/by/email',       [AdminsController::class, 'searchByEmail'])->name('search-admins-by-email');
    Route::get('/search/admins/by/phone',       [AdminsController::class, 'searchByPhone'])->name('search-admins-by-phone');
    Route::get('/search/admins/by/id/number',   [AdminsController::class, 'searchByIdNumber'])->name('search-admins-by-id-number');
  });

  // Roles Routes
  Route::prefix('roles')->group(function () {
    Route::get('/list',                         [RoleController::class, 'index'])->name('roles-list');
    Route::get('/create',                       [RoleController::class, 'create'])->name('create-new-role');
    Route::post('/store',                       [RoleController::class, 'store'])->name('store-role-info');
    Route::get('/edit/{id}',                    [RoleController::class, 'edit'])->name('edit-role-info');
    Route::put('/update',                       [RoleController::class, 'update'])->name('update-role-info');
    Route::get('/display/{id}',                 [RoleController::class, 'show'])->name('display-role-info');
    Route::delete('/destroy/{id}',              [RoleController::class, 'destroy'])->name('destroy-role-info');
    Route::get('/search/roles/by/name',         [RoleController::class, 'searchByname'])->name('search-roles-by-name');
  });

  // Admin Roles Routes
  Route::prefix('admin-roles')->group(function () {
    Route::post('/attach/{id}',                 [AdminRoleController::class, 'attach'])->name('attach-role-to-admin');
    Route::post('/detach/{id}',                 [AdminRoleController::class, 'detach'])->name('detach-role-from-admin');
  });

  // Permissions Routes
  Route::prefix('permissions')->group(function () {
    Route::get('/list',                         [PermissionController::class, 'index'])->name('permissions-list');
    Route::get('/create',                       [PermissionController::class, 'create'])->name('create-new-permission');
    Route::post('/store',                       [PermissionController::class, 'store'])->name('store-permission-info');
    Route::get('/edit/{id}',                    [PermissionController::class, 'edit'])->name('edit-permission-info');
    Route::put('/update',                       [PermissionController::class, 'update'])->name('update-permission-info');
    Route::get('/display/{id}',                 [PermissionController::class, 'show'])->name('display-permission-info');
    Route::delete('/destroy/{id}',              [PermissionController::class, 'destroy'])->name('destroy-permission-info');
    Route::get('/search/permissions/by/name',   [PermissionController::class, 'searchByname'])->name('search-permissions-by-name');
  });

  // Role Permissions Routes
  Route::prefix('role-permissions')->group(function () {
    Route::post('/attach/{id}',                 [RolePermissionController::class, 'attach'])->name('attach-permission-to-role');
    Route::post('/detach/{id}',                 [RolePermissionController::class, 'detach'])->name('detach-permission-from-role');
  });

  // Products Routes
  Route::prefix('products')->group(function () {
    Route::get('/index',                        [ProductsController::class, 'index'])->name('display-product-all');
    Route::post('/store',                       [ProductsController::class, 'store'])->name('store-new-product');
    Route::get('/display/{id}',                 [ProductsController::class, 'show'])->name('view-product-info');
    Route::post('/update',                      [ProductsController::class, 'update'])->name('update-product-info');
    Route::get('/edit/{id}',                    [ProductsController::class, 'edit'])->name('edit-product-info');
    Route::get('/destroy/{id}',                 [ProductsController::class, 'destroy'])->name('destroy-product-info');
  });

  // Monitors  Routes
  Route::prefix('monitors')->group(function () {
    Route::get('/waiting-hall',                 [MonitorsController::class, 'waitingHall'])->name('monitors-waiting-hall');
    Route::get('/restaurant-hall',              [MonitorsController::class, 'restaurantHall'])->name('monitors-restaurant-hall');
    Route::get('/kitchen-processing-area',      [MonitorsController::class, 'kitchenProcessingArea'])->name('monitors-kitchen-processing-area');
    Route::get('/meals-state',                  [MonitorsController::class, 'mealsState'])->name('monitors-meals-state');
    Route::get('/advertisment-displays',        [MonitorsController::class, 'advertismentDisplays'])->name('monitors-advertisment-displays');
  });

  // orders Routes 
  Route::prefix('orders')->group(function () {
    Route::get('/index',                          [OrdersController::class, 'index'])->name('display-order-all');
    Route::get('/fast/creater/{shift_id}',        [OrdersController::class, 'fastCreateOrder'])->name('fast-create-order');
    Route::post('/store',                         [OrdersController::class, 'store'])->name('store-new-order');
    Route::get('/display/{id}',                   [OrdersController::class, 'show'])->name('view-order-info');
    Route::post('/update',                        [OrdersController::class, 'update'])->name('update-order-info');
    Route::get('/edit/{id}',                      [OrdersController::class, 'edit'])->name('edit-order-info');
    Route::get('/destroy/{id}',                   [OrdersController::class, 'destroy'])->name('destroy-order-info');
    Route::get('/cancel/{id}',                    [OrdersController::class, 'cancel'])->name('cancel-order-info');
    Route::get('/allow/edit/{id}',                [OrdersController::class, 'allowEdit'])->name('allow-order-editting');
    Route::get('/change/method/{id}/{m}',         [OrdersController::class, 'changeDelMethod'])->name('change-order-delivery-method');
  });

  // Orders & Meals
  Route::prefix('orderItems')->group(function () {
    Route::get('/create/{id}',                    [OrdersItemsController::class, 'create'])->name('add-orderitem');
    Route::post('/store/{id}',                    [OrdersItemsController::class, 'store'])->name('save-orderitem-info');
    Route::post('/update',                        [OrdersItemsController::class, 'update'])->name('update-orderitem');
    Route::get('/destroy/{id}',                   [OrdersItemsController::class, 'destroy'])->name('destroy-oItem-info');
  });

  // clients Routes
  Route::prefix('clients')->group(function () {
    Route::get('/index',                          [ClientsController::class, 'index'])->name('display-client-all');
    Route::post('/store',                         [ClientsController::class, 'store'])->name('store-new-client');
    Route::get('/display/{id}',                    [ClientsController::class, 'show'])->name('view-client-info');
    Route::post('/update',                        [ClientsController::class, 'update'])->name('update-client-info');
    Route::get('/edit/{id}',                       [ClientsController::class, 'edit'])->name('edit-client-info');
    Route::get('/destroy/{id}',                    [ClientsController::class, 'destroy'])->name('destroy-client-info');
  });

  // invoices routes
  Route::prefix('invoices')->group(function () {
    Route::get('/index',                          [SalesInvoiceController::class, 'index'])->name('display-invoices-list');
    Route::get('/view/{id}',                      [SalesInvoiceController::class, 'view'])->name('view-invoice');
    Route::get('/print-invoice/{id}',             [SalesInvoiceController::class, 'printInvoice'])->name('print-invoice');
  });

  // payments routes
  Route::prefix('payments')->group(function () {
    Route::post('/cash/store',                   [PaymentsController::class, 'cashStore'])->name('payments.cash.store');
  });

  // general settings routes
  Route::prefix('settings')->group(function () {
    Route::get('/index',                          [SettingsController::class, 'index'])->name('home-setting');
    Route::put('/update/{id}',                     [SettingsController::class, 'update'])->name('admin.settings.update');
  });
  // MonyBox routes
  Route::prefix('monyBoxes')->group(function () {
    Route::get('/index',                          [MonyBoxesController::class, 'index'])->name('all-Mony-box');
    Route::post('/store',                         [MonyBoxesController::class, 'store'])->name('store-Mony-box');
    Route::post('/update',                        [MonyBoxesController::class, 'update'])->name('update-monyBox-info');
    Route::get('/edit/{id}',                        [MonyBoxesController::class, 'edit'])->name('edit-monyBox-info');
    Route::get('/destroy/{id}',                     [MonyBoxesController::class, 'destroy'])->name('destroy-monyBox-info');
  });

  // users routes
  Route::prefix('users')->group(function () {
    Route::get('/profile/{id}',                    [UserProfilesController::class, 'view'])->name('view-profile');
    Route::put('/update/{id}',                     [UserProfilesController::class, 'update'])->name('admins.update');
  });

  // sales-shifts routes
  Route::prefix('sales-shifts')->group(function () {
    Route::get('/index',                            [ShiftsController::class, 'index'])->name('all-sales-shifts');
    Route::post('/store',                           [ShiftsController::class, 'store'])->name('store-sales-shifts');
    Route::get('/close/{shift}',                    [ShiftsController::class, 'close'])->name('shifts.close');
    Route::post('/update',                          [ShiftsController::class, 'update'])->name('update-shift-info');
    Route::get('/edit/{id}',                        [ShiftsController::class, 'edit'])->name('edit-shift-info');
    Route::get('/destroy/{id}',                     [ShiftsController::class, 'destroy'])->name('destroy-shift-info');
  });

  // route kitchen

  Route::prefix('kitchen')->group(function () {
    Route::get('/display',              [KitchenController::class, 'index'])->name('admin.kitchen.kitchen');
    // Route::post('/order/{order}/pick', [KitchenController::class, 'pickOrder'])->name('kitchen.order.pick');
    Route::post('/order/{order}/pick',     [KitchenController::class, 'pickOrder'])->name('admin.kitchen.order.pick');
    Route::post('/order/{order}/complete', [KitchenController::class, 'completeOrder'])->name('admin.kitchen.order.complete');
    Route::get('/sse/kitchen-orders', [KitchenController::class, 'streamKitchenOrders']);
    Route::get('/admin/kitchen/orders/list', [KitchenController::class, 'getOrderList'])->name('admin.kitchen.orders.list');
  });

  Route::prefix('payments')->group(function () {
    Route::get('/index', [PaymentsController::class, 'index'])->name('display-payments-list');
    Route::post('/store', [PaymentsController::class, 'store'])->name('store-payment-info');
    Route::get('/view/{id}', [PaymentsController::class, 'view'])->name('view-payment-info');
    Route::get('/edit/{id}', [PaymentsController::class, 'edit'])->name('edit-payment-info');
    Route::post('/update', [PaymentsController::class, 'update'])->name('update-payment-info');
    Route::get('/destroy/{id}', [PaymentsController::class, 'destroy'])->name('destroy-payment-info');
  });

  Route::prefix('setting')->group(function () {
    Route::get('/payment-methods/index',        [PaymentMethodsController::class, 'index'])->name('display-payment-methods-list');
    Route::post('/payment-methods/store',       [PaymentMethodsController::class, 'store'])->name('store-payment-method-info');
    Route::get('/payment-methods/view/{id}', [PaymentMethodsController::class, 'view'])->name('view-payment-method-info');
    Route::get('/payment-methods/edit/{id}',    [PaymentMethodsController::class, 'edit'])->name('edit-payment-method-info');
    Route::post('/payment-methods/update',      [PaymentMethodsController::class, 'update'])->name('update-payment-method-info');
    Route::get('/destroy/{id}', [PaymentMethodsController::class, 'destroy'])->name('destroy-payment-method-info');
  });

  //Accounts Routes List
  Route::prefix('accounts')->group(function () {
    Route::get('/index',        [AccountController::class, 'index'])->name('display-accounts-list');
    Route::post('/store',       [AccountController::class, 'store'])->name('store-account-info');
    Route::get('/view/{id}',    [AccountController::class, 'view'])->name('view-account-info');
    Route::get('/edit/{id}',    [AccountController::class, 'edit'])->name('edit-account-info');
    Route::post('/update',      [AccountController::class, 'update'])->name('update-account-info');
    Route::get('/destroy/{id}', [AccountController::class, 'destroy'])->name('destroy-account-info');
  });
});
