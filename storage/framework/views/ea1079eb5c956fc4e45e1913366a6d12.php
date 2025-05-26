

<div class="main-sidebar flex-shrink-0">

    <div class=" d-flex flex-column">
        <div class="logo mt-3 mb-2">
            <a href="/" class=" d-flex justify-content-start gap-1">
                <span class="restaurant-icon">🏪</span>
                <span class="fs-5 fw-semibold text-dark">Cashier App</span>
            </a>
        </div>
        <a href="<?php echo e(route('view-profile', [App\Models\Admin::currentId()])); ?>" class="profile mb-2">
            <img src="<?php echo e($admin->profile->image ? asset('assets/admin/uploads/images/avatar/' . $admin->profile->image) : asset('assets/admin/images/avatar/user-1.png')); ?>" alt="Profile Picture" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;">
            <div class="profile-info ">
                <h6 class="info-title"><?php echo e(App\Models\Admin::currentUser()->userName); ?></h6>
                <span class="sub-title"><?php echo e(ucfirst(App\Models\Admin::currentUser()->role_name)); ?></span>
            </div>
        </a>
    </div>
    <ul class="list-unstyled ps-0" id="sidebarAccordion">

        <!-- لوحة التحكم -->
        <?php
            $isDashboardActive = request()->is('admin/dashboard') || request()->is('admin/admins*') || request()->is('admin/roles*') || request()->is('admin/stats*') || request()->is('admin/sales/active/sessions');
        ?>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center <?php echo e($isDashboardActive ? 'active' : ''); ?>" data-bs-toggle="collapse"
                data-bs-target="#dashboard-collapse1" aria-expanded="<?php echo e($isDashboardActive ? 'true' : 'false'); ?>">
                <i class="fa-solid fa-sliders"></i> &nbsp; <?php echo e(__('sidebar.dashboard')); ?>

            </button>

            <div class="collapse <?php echo e($isDashboardActive ? 'show' : ''); ?>"
                id="dashboard-collapse1" data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    
                    <li>
                        <a href="<?php echo e(route('admin-dashboard')); ?>"
                            class="rounded <?php echo e(request()->is('admin/dashboard') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-home"></i> &nbsp; <?php echo e(__('sidebar.home')); ?>

                        </a>
                    </li>

                    
                    <li>
                        <a href="<?php echo e(route('admin-list')); ?>"
                            class="rounded <?php echo e(request()->is('admin/admins*') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-chart-pie"></i> &nbsp; <?php echo e(__('sidebar.overview')); ?>

                        </a>
                    </li>

                    
                    <li>
                        <a href="<?php echo e(route('admin-list')); ?>"
                            class="rounded <?php echo e(request()->is('admin/admins*') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-calendar-day"></i> &nbsp; <?php echo e(__('sidebar.day-summary')); ?>

                        </a>
                    </li>

                    
                    <li>
                        <a href="<?php echo e(route('admin-list')); ?>"
                            class="rounded <?php echo e(request()->is('admin/admins*') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-chart-line"></i> &nbsp; <?php echo e(__('sidebar.performance')); ?>

                        </a>
                    </li>

                    
                    <li>
                        <a href="<?php echo e(route('admin-list')); ?>"
                            class="rounded <?php echo e(request()->is('admin/admins*') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-bolt"></i> &nbsp; <?php echo e(__('sidebar.quick-actions')); ?>

                        </a>
                    </li>
                    
                </ul>
            </div>
        </li>

        <!-- المشتريات -->
        <?php
            $isPurchasesActive = request()->is('admin/purchase-orders*') || request()->is('admin/suppliers*');
        ?>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center <?php echo e($isPurchasesActive ? 'active' : ''); ?>" data-bs-toggle="collapse"
                data-bs-target="#purchases-collapse" aria-expanded="<?php echo e($isPurchasesActive ? 'true' : 'false'); ?>">
                <i class="fas fa-shopping-cart"></i> &nbsp; <?php echo e(__('sidebar.purchases')); ?>

            </button>
            <div class="collapse <?php echo e($isPurchasesActive ? 'show' : ''); ?>"
                id="purchases-collapse" data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="<?php echo e(route('admin.purchase-orders.index')); ?>"
                            class="rounded <?php echo e(request()->is('admin/purchase-orders*') ? 'active' : ''); ?>">
                            <i class="fas fa-file-invoice"></i> &nbsp; <?php echo e(__('sidebar.purchase_orders')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin.suppliers.index')); ?>"
                            class="rounded <?php echo e(request()->is('admin/suppliers*') ? 'active' : ''); ?>">
                            <i class="fas fa-truck"></i> &nbsp; <?php echo e(__('sidebar.suppliers')); ?>

                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Point Of Sale Menu -->
        <?php
            $isPosActive = request()->is('admin/pos*');
        ?>
        <?php if(Auth::user()->hasPermission('display-orders-list')): ?>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center <?php echo e($isPosActive ? 'active' : ''); ?>" data-bs-toggle="collapse"
                data-bs-target="#pos-collapse1" aria-expanded="<?php echo e($isPosActive ? 'true' : 'false'); ?>">
                <i class="fa-solid fa-cash-register"></i> &nbsp; <?php echo e(__('sidebar.pos')); ?>

            </button>
            <div class="collapse <?php echo e($isPosActive ? 'show' : ''); ?>" id="pos-collapse1"
                data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <?php if(Auth::user()->hasPermission('display-order-info')): ?>
                    <li>
                        <a href="<?php echo e(route('display-pos-list')); ?>"
                            class="rounded <?php echo e(request()->is('admin/pos/index') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-list"></i> &nbsp; <?php echo e(__('sidebar.pos-list')); ?>

                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->hasPermission('edit-order-info')): ?>
                    <li>
                        <a href=""
                            class="rounded <?php echo e(request()->is('admin/pos/index') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-list"></i> &nbsp; <?php echo e(__('Yousra')); ?>

                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </li>
        <?php endif; ?>
        <!-- Monitors -->
        <?php
            $isMonitorsActive = request()->is('admin/monitors*') || request()->is('admin/kitchen/display') || request()->is('admin/monitors/kitchen');
        ?>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center <?php echo e($isMonitorsActive ? 'active' : ''); ?>" data-bs-toggle="collapse"
                data-bs-target="#monitors-collapse1" aria-expanded="<?php echo e($isMonitorsActive ? 'true' : 'false'); ?>">
                <i class="fa-solid fa-desktop"></i> &nbsp; <?php echo e(__('sidebar.monitors')); ?>

            </button>
            <div class="collapse <?php echo e($isMonitorsActive ? 'show' : ''); ?>" id="monitors-collapse1"
                data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="<?php echo e(route('monitors-waiting-hall')); ?>"
                            class="rounded <?php echo e(request()->is('admin/monitors/waiting-hall') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('sidebar.waiting_hall')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('monitors-restaurant-hall')); ?>"
                            class="rounded <?php echo e(request()->is('admin/monitors/restaurant-hall') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('sidebar.R.H_monitor')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin.kitchen.kitchen')); ?>"
                            class="rounded <?php echo e(request()->is('admin/kitchen/display') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('sidebar.kitchen_monitor')); ?>

                        </a>
                    </li>
                  
                    <li>
                        <a href="<?php echo e(route('monitors-advertisment-displays')); ?>"
                            class="rounded <?php echo e(request()->is('admin/monitors/advertisment-displays') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('sidebar.ads_displays')); ?>

                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Settings -->
        <?php
            $isSettingsActive = request()->is('admin/settings*') || request()->is('admin/setting/payment-methods/index') || request()->is('admin/monyBoxes/index') || request()->is('admin/sales-shifts/index');
        ?>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center <?php echo e($isSettingsActive ? 'active' : ''); ?>" data-bs-toggle="collapse"
                data-bs-target="#settings-collapse1" aria-expanded="<?php echo e($isSettingsActive ? 'true' : 'false'); ?>">
                <i class="fa-solid fa-cog"></i> &nbsp; <?php echo e(__('sidebar.settings')); ?>

            </button>
            <div class="collapse <?php echo e($isSettingsActive ? 'show' : ''); ?>" id="settings-collapse1"
                data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="<?php echo e(route('display-payment-methods-list')); ?>"
                            class="rounded <?php echo e(request()->is('admin/setting/payment-methods/index') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-credit-card"></i> &nbsp; <?php echo e(__('sidebar.payment-methods')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('all-Mony-box')); ?>"
                            class="rounded <?php echo e(request()->is('admin/monyBoxes/index') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-box"></i> &nbsp; <?php echo e(__('sidebar.mony-boxes')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('all-sales-session')); ?>"
                            class="rounded <?php echo e(request()->is('admin/sales-session/index') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-clock"></i> &nbsp; <?php echo e(__('sidebar.sessions')); ?>

                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Products Section -->
        <?php
            $isProductsActive = request()->is('products*') || request()->is('units*') || request()->is('taxes*');
        ?>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center <?php echo e($isProductsActive ? 'active' : ''); ?>" data-bs-toggle="collapse"
                data-bs-target="#products-collapse" aria-expanded="<?php echo e($isProductsActive ? 'true' : 'false'); ?>">
                <i class="fa-solid fa-boxes-stacked"></i> &nbsp; <?php echo e(__('sidebar.products')); ?>

            </button>
            <div class="collapse <?php echo e($isProductsActive ? 'show' : ''); ?>" id="products-collapse"
                data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <!-- Products -->
                    <li>
                        <a href="<?php echo e(route('display-product-all')); ?>"
                            class="rounded <?php echo e(request()->is('products/index') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-box"></i> &nbsp; <?php echo e(__('sidebar.products')); ?>

                        </a>
                    </li>
                    <!-- Units -->
                    <li>
                        <a href="<?php echo e(route('display-units-all')); ?>"
                            class="rounded <?php echo e(request()->is('units/index') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-ruler"></i> &nbsp; <?php echo e(__('sidebar.units')); ?>

                        </a>
                    </li>
                    <!-- Taxes -->
                    <li>
                        <a href="<?php echo e(route('taxes.index')); ?>"
                            class="rounded <?php echo e(request()->is('taxes*') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-money-bill-wave"></i> &nbsp; <?php echo e(__('sidebar.taxes')); ?>

                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Orders -->
        <?php
            $isOrdersActive = request()->is('admin/orders*');
        ?>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center <?php echo e($isOrdersActive ? 'active' : ''); ?>" data-bs-toggle="collapse"
                data-bs-target="#orders-collapse" aria-expanded="<?php echo e($isOrdersActive ? 'true' : 'false'); ?>">
                <i class="fa-solid fa-list"></i> &nbsp; <?php echo e(__('sidebar.orders')); ?>

            </button>
            <div class="collapse <?php echo e($isOrdersActive ? 'show' : ''); ?>" id="orders-collapse" data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="<?php echo e(route('display-orders-stats')); ?>"
                            class="rounded <?php echo e(request()->is('admin/orders/stats') ? 'active' : ''); ?>">
                            <i class="fas fa-chart-pie"></i> &nbsp; <?php echo e(__('sidebar.orders_stats')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('display-orders-list')); ?>"
                            class="rounded <?php echo e(request()->is('admin/orders/index') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('sidebar.orders_list')); ?>

                        </a>
                    </li>
                      <li>
                        <a href="">
                            <i class="fa-solid fa-cog"></i> &nbsp; <?php echo e(__('sidebar.settings')); ?>

                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Payments -->
        <?php
            $isPaymentsActive = request()->is('admin/payments*');
        ?>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center <?php echo e($isPaymentsActive ? 'active' : ''); ?>" data-bs-toggle="collapse"
                data-bs-target="#payments-collapse1" aria-expanded="<?php echo e($isPaymentsActive ? 'true' : 'false'); ?>">
                <i class="fa-solid fa-money-bill-transfer"></i> &nbsp; <?php echo e(__('sidebar.payments')); ?>

            </button>
            <div class="collapse <?php echo e($isPaymentsActive ? 'show' : ''); ?>" id="payments-collapse1"
                data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="<?php echo e(route('display-payments-list')); ?>"
                            class="rounded <?php echo e(request()->is('admin/payments/index') ? 'active' : ''); ?>">
                            <i class="fas fa-money-bill-wave"></i> &nbsp; <?php echo e(__('sidebar.payments_list')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('display-accounts-list')); ?>"
                            class="rounded <?php echo e(request()->is('admin/accounts/index') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-hand-holding-dollar"></i> &nbsp; <?php echo e(__('sidebar.accounts')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('display-invoices-list')); ?>"
                            class="rounded <?php echo e(request()->is('admin/invoices/index') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-file-invoice"></i> &nbsp; <?php echo e(__('sidebar.invoices')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('display-payment-methods-list')); ?>"
                            class="rounded <?php echo e(Request::is('admin/settings/index') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-sliders"></i> &nbsp; <?php echo e(__('sidebar.settings')); ?>

                        </a>
                    </li>
                    
                </ul>
            </div>
        </li>

        <!-- Clients -->
        <?php
            $isClientsActive = request()->is('admin/clients*');
        ?>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center <?php echo e($isClientsActive ? 'active' : ''); ?>" data-bs-toggle="collapse"
                data-bs-target="#clients-collapse1" aria-expanded="<?php echo e($isClientsActive ? 'true' : 'false'); ?>">
                <i class="fa-solid fa-users"></i> &nbsp; <?php echo e(__('sidebar.clients')); ?>

            </button>
            <div class="collapse <?php echo e($isClientsActive ? 'show' : ''); ?>" id="clients-collapse1" data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                      <li>
                        <a href="">
                            <i class="fas fa-chart-pie"></i> &nbsp; <?php echo e(__('sidebar.home')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('display-client-all')); ?>"
                            class="rounded <?php echo e(request()->is('admin/clients/index') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-users"></i> &nbsp; <?php echo e(__('sidebar.clients_list')); ?>

                        </a>
                    </li>
                      <li>
                        <a href="">
                            <i class="fa-solid fa-file-invoice"></i> &nbsp; <?php echo e(__('sidebar.reports')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa-solid fa-sliders"></i> &nbsp; <?php echo e(__('sidebar.settings')); ?>

                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>

    <!-- Language Switch Button -->
    <div class="language-switcher mt-4 mb-3">
        <hr class="sidebar-divider">
        <div class="d-flex justify-content-center align-items-center mt-2">
            <form action="<?php echo e(route('locale-switch', session('locale') === 'ar' ? 'en' : 'ar')); ?>" method="GET">
                <button type="submit" class="btn btn-outline-primary btn-sm w-100">
                    <i class="fas fa-language me-2"></i>
                    <?php echo e(session('locale') === 'ar' ? 'English' : 'العربية'); ?>

                </button>
            </form>
        </div>
    </div>
</div><?php /**PATH C:\wamp64\www\CashierApp\resources\views/inc/sidebar.blade.php ENDPATH**/ ?>