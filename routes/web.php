<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\BranchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LocaleController;

// Language Switch Route
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PosController;
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
use App\Http\Controllers\Admin\SalesSessionController;
use App\Http\Controllers\Admin\UserProfilesController;
use App\Http\Controllers\Admin\KitchenController;
use App\Http\Controllers\Admin\PaymentMethodsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\PurchaseOrderController;
use App\Http\Controllers\Admin\UnitsController;
use App\Http\Controllers\Admin\CategroiesController;
use App\Http\Controllers\Admin\TaxController;
use App\Http\Controllers\Admin\TaxGroupController;

use Illuminate\Support\Facades\Auth;


Route::get('locale/{locale}', [LocaleController::class, 'switch'])->name('locale-switch');
// Auth::routes();
Route::get('/',                 [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/register',         [RegisterController::class, 'showRegistrationForm'])->name('admin.register');

// Admin Routes
Route::middleware('guest:admin')->prefix('admin')->group(function () {
  Route::get('/login',           [LoginController::class, 'showLoginForm'])->name('login');
  Route::get('/',                [LoginController::class, 'showLoginForm'])->name('login');
  Route::get('/login',           [LoginController::class, 'showLoginForm'])->name('admin.login');
  Route::post('/login',          [LoginController::class, 'login'])->name('admin.login.submit');
  Route::get('/register',        [RegisterController::class, 'showRegistrationForm'])->name('admin.register');
  Route::post('/register',       [RegisterController::class, 'register'])->name('admin.register.submit');
});

Route::middleware('auth:admin')->prefix('admin')->group(function () {
  Route::post('/logout',         [LoginController::class, 'logout'])->name('admin.logout');
  Route::get('/dashboard',       [HomeController::class, 'index'])->name('admin-dashboard');

  // Admins Routes
  Route::prefix('admins')->group(function () {
    Route::get('/list',                          [AdminsController::class, 'index'])->name('admin-list');
    Route::get('/create',                        [AdminsController::class, 'create'])->name('admin-new-create');
    Route::post('/store',                        [AdminsController::class, 'store'])->name('store-admin-info');
    Route::get('/edit/{id}',                     [AdminsController::class, 'edit'])->name('edit-admin-info');
    Route::put('/update',                        [AdminsController::class, 'update'])->name('update-admin-info');
    Route::get('/display/{id}',                  [AdminsController::class, 'show'])->name('display-admin-info');
    Route::delete('/destroy/{id}',               [AdminsController::class, 'destroy'])->name('destroy-admin-info');
    Route::get('/search/admins/by/username',     [AdminsController::class, 'searchByUsername'])->name('search-admins-by-username');
    Route::get('/search/admins/by/email',        [AdminsController::class, 'searchByEmail'])->name('search-admins-by-email');
    Route::get('/search/admins/by/phone',        [AdminsController::class, 'searchByPhone'])->name('search-admins-by-phone');
    Route::get('/search/admins/by/id/number',    [AdminsController::class, 'searchByIdNumber'])->name('search-admins-by-id-number');
  });

  // Roles Routes
  Route::prefix('roles')->group(function () {
    Route::get('/list',                          [RoleController::class, 'index'])->name('roles-list');
    Route::get('/create',                        [RoleController::class, 'create'])->name('create-new-role');
    Route::post('/store',                        [RoleController::class, 'store'])->name('store-role-info');
    Route::get('/edit/{id}',                     [RoleController::class, 'edit'])->name('edit-role-info');
    Route::put('/update',                        [RoleController::class, 'update'])->name('update-role-info');
    Route::get('/display/{id}',                  [RoleController::class, 'show'])->name('display-role-info');
    Route::delete('/destroy/{id}',               [RoleController::class, 'destroy'])->name('destroy-role-info');
    Route::get('/search/roles/by/name',          [RoleController::class, 'searchByname'])->name('search-roles-by-name');
  });

  // Admin Roles Routes
  Route::prefix('admin-roles')->group(function () {
    Route::post('/attach/{id}',                  [AdminRoleController::class, 'attach'])->name('attach-role-to-admin');
    Route::post('/detach/{id}',                  [AdminRoleController::class, 'detach'])->name('detach-role-from-admin');
  });

  // Permissions Routes
  Route::prefix('permissions')->group(function () {
    Route::get('/list',                          [PermissionController::class, 'index'])->name('permissions-list');
    Route::get('/create',                        [PermissionController::class, 'create'])->name('create-new-permission');
    Route::post('/store',                        [PermissionController::class, 'store'])->name('store-permission-info');
    Route::get('/edit/{id}',                     [PermissionController::class, 'edit'])->name('edit-permission-info');
    Route::put('/update',                        [PermissionController::class, 'update'])->name('update-permission-info');
    Route::get('/display/{id}',                  [PermissionController::class, 'show'])->name('display-permission-info');
    Route::delete('/destroy/{id}',               [PermissionController::class, 'destroy'])->name('destroy-permission-info');
    Route::get('/search/permissions/by/name',    [PermissionController::class, 'searchByname'])->name('search-permissions-by-name');
  });

  // Role Permissions Routes
  Route::prefix('role-permissions')->group(function () {
    Route::post('/attach/{id}',                  [RolePermissionController::class, 'attach'])->name('attach-permission-to-role');
    Route::post('/detach/{id}',                  [RolePermissionController::class, 'detach'])->name('detach-permission-from-role');
  });

  // Products Routes
  Route::prefix('products')->group(function () {
    Route::get('/index',                          [ProductsController::class, 'index'])->name('display-product-all');
    Route::post('/store',                         [ProductsController::class, 'store'])->name('store-new-product');
    Route::get('/display/{id}',                   [ProductsController::class, 'show'])->name('view-product-info');
    Route::post('/update',                        [ProductsController::class, 'update'])->name('update-product-info');
    Route::get('/edit/{id}',                      [ProductsController::class, 'edit'])->name('edit-product-info');
    Route::get('/destroy/{id}',                   [ProductsController::class, 'destroy'])->name('destroy-product-info');
    Route::get('/park/{id}',                      [ProductsController::class, 'park'])->name('park-product');
    Route::get('/cancel/{id}',                    [ProductsController::class, 'cancel'])->name('cancel-product-info');
  
  });
    // units Routes
  Route::prefix('units')->group(function () {
    Route::get('/index',                          [UnitsController::class, 'index'])->name('display-units-all');
    Route::post('/store',                         [UnitsController::class, 'store'])->name('store-new-unit');
    Route::get('/display/{id}',                   [UnitsController::class, 'show'])->name('view-unit-info');
    Route::put('/update/{id}',                        [UnitsController::class, 'update'])->name('update-unit-info');
    Route::get('/edit/{id}',                      [UnitsController::class, 'edit'])->name('edit-unit-info');
    Route::get('/destroy/{id}',                   [UnitsController::class, 'destroy'])->name('destroy-unit-info');
                  
  });
    // categories Routes
  Route::prefix('categories')->group(function () {
    Route::get('/index',                          [CategroiesController::class, 'index'])->name('display-categories-all');
    Route::post('/store',                         [CategroiesController::class, 'store'])->name('store-new-category');
    Route::get('/display/{id}',                   [CategroiesController::class, 'show'])->name('view-category-info');
    Route::put('/update/{id}',        [CategroiesController::class, 'update'])->name('update-category-info');
    Route::get('/edit/{id}',                      [CategroiesController::class, 'edit'])->name('edit-category-info');
    Route::get('/destroy/{id}',                   [CategroiesController::class, 'destroy'])->name('destroy-category-info');
                                              

  });

  // Monitors  Routes
  Route::prefix('monitors')->group(function () {
    Route::get('/waiting-hall',                   [MonitorsController::class, 'waitingHall'])->name('monitors-waiting-hall');
    Route::get('/restaurant-hall',                [MonitorsController::class, 'restaurantHall'])->name('monitors-restaurant-hall');
    Route::get('/kitchen-processing-area',        [MonitorsController::class, 'kitchenProcessingArea'])->name('monitors-kitchen-processing-area');
    Route::get('/meals-state',                    [MonitorsController::class, 'mealsState'])->name('monitors-meals-state');
    Route::get('/advertisment-displays',          [MonitorsController::class, 'advertismentDisplays'])->name('monitors-advertisment-displays');
  });

  // orders Routes 
  Route::prefix('orders')->group(function () {
    Route::get('/stats',                          [OrdersController::class, 'stats'])->name('display-orders-stats');
    Route::get('/index',                          [OrdersController::class, 'index'])->name('display-orders-list');
    Route::get('/fast/create/{shift_id}',         [OrdersController::class, 'fastCreateOrder'])->name('fast-create-order');
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
    Route::get('/display/{id}',                   [ClientsController::class, 'show'])->name('view-client-info');
    Route::post('/update',                        [ClientsController::class, 'update'])->name('update-client-info');
    Route::get('/edit/{id}',                      [ClientsController::class, 'edit'])->name('edit-client-info');
    Route::get('/destroy/{id}',                   [ClientsController::class, 'destroy'])->name('destroy-client-info');
  });

  // invoices routes
  Route::prefix('invoices')->group(function () {
    Route::get('/index',                          [SalesInvoiceController::class, 'index'])->name('display-invoices-list');
    Route::get('/view/{id}',                      [SalesInvoiceController::class, 'view'])->name('view-invoice-info');
    Route::get('/print-invoice/{id}',             [SalesInvoiceController::class, 'printInvoice'])->name('print-invoice');
    Route::get('/destroy/{id}',                   [SalesInvoiceController::class, 'destroy'])->name('destroy-invoice-info');
  });

  // payments routes
  Route::prefix('payments')->group(function () {
    Route::post('/cash/store',                    [PaymentsController::class, 'cashStore'])->name('payments.cash.store');
  });

  // الضرائب
  Route::prefix('taxes')->group(function () {
    Route::get('/',                               [TaxController::class, 'index'])->name('taxes.index');
    Route::get('/create',                         [TaxController::class, 'create'])->name('taxes.create');
    Route::post('/',                              [TaxController::class, 'store'])->name('taxes.store');
    Route::get('/{tax}',                          [TaxController::class, 'show'])->name('taxes.show');
    Route::get('/{tax}/edit',                     [TaxController::class, 'edit'])->name('taxes.edit');
    Route::put('/{tax}',                          [TaxController::class, 'update'])->name('taxes.update');
    Route::delete('/{tax}',                       [TaxController::class, 'destroy'])->name('taxes.destroy');
    Route::get('/{tax}/data',                     [TaxController::class, 'getTaxData'])->name('taxes.get-data');
  });

  // مجموعات الضرائب
  Route::prefix('tax-groups')->group(function () {
    Route::get('/',                               [TaxGroupController::class, 'index'])->name('admin.tax-groups.index');
    Route::get('/create',                         [TaxGroupController::class, 'create'])->name('admin.tax-groups.create');
    Route::post('/',                              [TaxGroupController::class, 'store'])->name('admin.tax-groups.store');
    Route::get('/{taxGroup}',                     [TaxGroupController::class, 'show'])->name('admin.tax-groups.show');
    Route::get('/{taxGroup}/edit',                [TaxGroupController::class, 'edit'])->name('admin.tax-groups.edit');
    Route::put('/{taxGroup}',                     [TaxGroupController::class, 'update'])->name('admin.tax-groups.update');
    Route::delete('/{taxGroup}',                  [TaxGroupController::class, 'destroy'])->name('admin.tax-groups.destroy');
    Route::post('/check-code',                    [TaxGroupController::class, 'checkCode'])->name('admin.tax-groups.check-code');
  });

  // general settings routes
  Route::prefix('settings')->group(function () {
    Route::get('/index',                          [SettingsController::class, 'index'])->name('home-setting');
    Route::put('/update/{id}',                    [SettingsController::class, 'update'])->name('admin.settings.update');
    Route::get('/product',                        [SettingsController::class, 'setting'])->name('product-setting-home');
  });

  // MonyBox routes
  Route::prefix('monyBoxes')->group(function () {
    Route::get('/index',                          [MonyBoxesController::class, 'index'])->name('all-Mony-box');
    Route::post('/store',                         [MonyBoxesController::class, 'store'])->name('store-Mony-box');
    Route::post('/update',                        [MonyBoxesController::class, 'update'])->name('update-monyBox-info');
    Route::get('/edit/{id}',                      [MonyBoxesController::class, 'edit'])->name('edit-monyBox-info');
    Route::get('/destroy/{id}',                   [MonyBoxesController::class, 'destroy'])->name('destroy-monyBox-info');
  });

  // Branches routes
  Route::prefix('branches')->group(function () {
    Route::get('/index',                          [BranchController::class, 'index'])->name('display-branches-list');
    Route::post('/store',                         [BranchController::class, 'store'])->name('store-branch-info');
    Route::put('/update',                         [BranchController::class, 'update'])->name('update-branch-info');
    Route::get('/edit/{id}',                      [BranchController::class, 'edit'])->name('edit-branch-info');
    Route::get('/destroy/{id}',                   [BranchController::class, 'destroy'])->name('destroy-branch-info');
  });


  // users routes
  Route::prefix('users')->group(function () {
    Route::get('/profile/{id}',                   [UserProfilesController::class, 'view'])->name('view-profile');
    Route::put('/update/{id}',                    [UserProfilesController::class, 'update'])->name('admins.update');
    Route::put('/update-password/{id}',           [UserProfilesController::class, 'updatePassword'])->name('admins.updatePassword');
  });

  // sales-session routes
  Route::prefix('sales-session')->group(function () {
    Route::get('/index',                          [SalesSessionController::class, 'index'])->name('all-sales-session');
    Route::post('/store',                         [SalesSessionController::class, 'store'])->name('store-sales-session');
    Route::get('/close/{shift}',                  [SalesSessionController::class, 'close'])->name('sales-session.close');
    Route::post('/update',                        [SalesSessionController::class, 'update'])->name('update-sales-session-info');
    Route::get('/edit/{id}',                      [SalesSessionController::class, 'edit'])->name('edit-sales-session-info');
    Route::get('/destroy/{id}',                   [SalesSessionController::class, 'destroy'])->name('destroy-sales-session-info');
  });

  // route kitchen
  Route::prefix('kitchen')->group(function () {
    Route::get('/display',                        [KitchenController::class, 'index'])->name('admin.kitchen.kitchen');
    Route::post('/order/{order}/pick',            [KitchenController::class, 'pickOrder'])->name('admin.kitchen.order.pick');
    Route::post('/order/{order}/complete',        [KitchenController::class, 'completeOrder'])->name('admin.kitchen.order.complete');
    Route::get('/sse/kitchen-orders',             [KitchenController::class, 'streamKitchenOrders']);
    Route::get('/admin/kitchen/orders/list',      [KitchenController::class, 'getOrderList'])->name('admin.kitchen.orders.list');
  });

  Route::prefix('payments')->group(function () {
    Route::get('/index',                          [PaymentsController::class, 'index'])->name('display-payments-list');
    Route::post('/store',                         [PaymentsController::class, 'store'])->name('store-payment-info');
    Route::get('/view/{id}',                      [PaymentsController::class, 'view'])->name('view-payment-info');
    Route::get('/edit/{id}',                      [PaymentsController::class, 'edit'])->name('edit-payment-info');
    Route::post('/update',                        [PaymentsController::class, 'update'])->name('update-payment-info');
    Route::get('/destroy/{id}', [PaymentsController::class, 'destroy'])->name('destroy-payment-info');
  });

  // route currencies
  Route::prefix('currencies')->group(function () {
    Route::get('/store',                          [CurrencyController::class, 'index'])->name('display-currencies-list');
    Route::post('/update',                        [CurrencyController::class, 'store'])->name('store-currency-info');
    Route::put('/update/{id}',                    [CurrencyController::class, 'update'])->name('update-currency-info');
    Route::get('/view/{id}',                      [CurrencyController::class, 'view'])->name('view-currency-info');
    Route::get('/destroy/{id}',                   [CurrencyController::class, 'destroy'])->name('destroy-currency-info');
  });

  // route purchase orders
  Route::prefix('purchase-orders')->group(function () {
    Route::get('/',                               [PurchaseOrderController::class, 'index'])->name('admin.purchase-orders.index');
    Route::get('/create',                         [PurchaseOrderController::class, 'create'])->name('admin.purchase-orders.create');
    Route::post('/',                              [PurchaseOrderController::class, 'store'])->name('admin.purchase-orders.store');
    Route::get('/{purchaseOrder}',                [PurchaseOrderController::class, 'show'])->name('admin.purchase-orders.show');
    Route::get('/{purchaseOrder}/edit',           [PurchaseOrderController::class, 'edit'])->name('admin.purchase-orders.edit');
    Route::put('/{purchaseOrder}',                [PurchaseOrderController::class, 'update'])->name('admin.purchase-orders.update');
    Route::delete('/{purchaseOrder}',             [PurchaseOrderController::class, 'destroy'])->name('admin.purchase-orders.destroy');
    Route::post('/{purchaseOrder}/approve',       [PurchaseOrderController::class, 'approve'])->name('admin.purchase-orders.approve');
    Route::post('/{purchaseOrder}/receive',       [PurchaseOrderController::class, 'receive'])->name('admin.purchase-orders.receive');
    Route::post('/{purchaseOrder}/cancel',        [PurchaseOrderController::class, 'cancel'])->name('admin.purchase-orders.cancel');
  });

  // route suppliers
  Route::prefix('suppliers')->group(function () {
    Route::get('/',                             [SupplierController::class, 'index'])->name('admin.suppliers.index');
    Route::get('/create',                       [SupplierController::class, 'create'])->name('admin.suppliers.create');
    Route::post('/',                            [SupplierController::class, 'store'])->name('admin.suppliers.store');
    Route::get('/{supplier}',                   [SupplierController::class, 'show'])->name('admin.suppliers.show');
    Route::get('/{supplier}/edit',              [SupplierController::class, 'edit'])->name('admin.suppliers.edit');
    Route::put('/{supplier}',                   [SupplierController::class, 'update'])->name('admin.suppliers.update');
    Route::delete('/{supplier}',                [SupplierController::class, 'destroy'])->name('admin.suppliers.destroy');
  });

  // route contacts
  Route::prefix('contacts')->group(function () {
    Route::get('/list',                         [ContactController::class, 'index'])->name('display-contacts-list');
    Route::post('/store',                       [ContactController::class, 'store'])->name('store-contact-info');
    Route::put('/update/{id}',                  [ContactController::class, 'update'])->name('update-contact-info');
    Route::get('/view/{id}',                    [ContactController::class, 'view'])->name('view-contact-info');
    Route::delete('/destroy/{id}',              [ContactController::class, 'destroy'])->name('destroy-contact-info');
  });

  Route::prefix('setting')->group(function () {
    Route::get('/payment-methods/index',        [PaymentMethodsController::class, 'index'])->name('display-payment-methods-list');
    Route::post('/payment-methods/store',       [PaymentMethodsController::class, 'store'])->name('store-payment-method-info');
    Route::get('/payment-methods/view/{id}',    [PaymentMethodsController::class, 'view'])->name('view-payment-method-info');
    Route::get('/payment-methods/edit/{id}',    [PaymentMethodsController::class, 'edit'])->name('edit-payment-method-info');
    Route::post('/payment-methods/update',      [PaymentMethodsController::class, 'update'])->name('update-payment-method-info');
    Route::get('/destroy/{id}',                 [PaymentMethodsController::class, 'destroy'])->name('destroy-payment-method-info');


  });

  //Accounts Routes List
  Route::prefix('accounts')->group(function () {
    Route::get('/index',                        [AccountController::class, 'index'])->name('display-accounts-list');
    Route::post('/store',                       [AccountController::class, 'store'])->name('store-account-info');
    Route::get('/view/{id}',                    [AccountController::class, 'view'])->name('view-account-info');
    Route::get('/edit/{id}',                    [AccountController::class, 'edit'])->name('edit-account-info');
    Route::post('/update',                      [AccountController::class, 'update'])->name('update-account-info');
    Route::get('/destroy/{id}',                 [AccountController::class, 'destroy'])->name('destroy-account-info');
  });

  // Point Of Sales Routes
  Route::prefix('pos')->group(function () {
    Route::get('/index',                        [POSController::class, 'index'])->name('display-pos-list');
    Route::post('/store',                       [POSController::class, 'store'])->name('store-pos-info');
    Route::get('/view/{id}',                    [POSController::class, 'view'])->name('view-pos-info');
    Route::get('/edit/{id}',                    [POSController::class, 'edit'])->name('edit-pos-info');
    Route::post('/update',                      [POSController::class, 'update'])->name('update-pos-info');
    Route::get('/destroy/{id}',                 [POSController::class, 'destroy'])->name('destroy-pos-info');
  });
});
