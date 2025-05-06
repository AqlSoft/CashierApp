<div class="main-sidebar flex-shrink-0">

    <div class=" d-flex flex-column">
        <div class="logo mt-3 mb-2">
            <a href="/" class=" d-flex justify-content-start gap-1">
                <span class="restaurant-icon">🏪</span>
                <span class="fs-5 fw-semibold text-dark">Cashier App</span>
            </a>
        </div>
        <a href="<?php echo e(route('view-profile', [App\Models\Admin::currentId()])); ?>" class="profile mb-2">
            <img src="<?php echo e(asset('assets/admin/uploads/images/avatar/avatar-04.jpg')); ?>" alt="Profile Picture"
                class="profile-picture">
            <div class="profile-info ">
                <h6 class="info-title"><?php echo e(App\Models\Admin::currentUser()->userName); ?></h6>
                <span class="sub-title"><?php echo e(ucfirst(App\Models\Admin::currentUser()->role_name)); ?></span>
            </div>

        </a>
    </div>
    <ul class="list-unstyled ps-0" id="sidebarAccordion">
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center " data-bs-toggle="collapse"
                data-bs-target="#dashboard-collapse1" aria-expanded="">
                <i class="fa-solid fa-sliders"></i> &nbsp; <?php echo e(__('sidebar.dashboard')); ?>

            </button>

            <div class="collapse <?php echo e(request()->is(['admin/dashboard', 'admin/admins/*', 'admin/roles*', 'admin/stats/*', 'admin/sales/active/sessions']) ? 'show' : ''); ?>"
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

<!-- Point Of Sale Menu -->
<li class="mb-1">
    <button class="btn btn-toggle d-inline-flex align-items-center " data-bs-toggle="collapse"
        data-bs-target="#pos-collapse1" aria-expanded="">
        <i class="fa-solid fa-cash-register"></i> &nbsp; <?php echo e(__('sidebar.pos')); ?>

    </button>
    <div class="collapse <?php echo e(request()->is(['admin/pos*']) ? 'show' : ''); ?>" id="pos-collapse1"
        data-bs-parent="#sidebarAccordion">
        <ul class="btn-toggle-nav list-unstyled fw-normal small">
            <!-- Point Of Sale List -->
            <li>
                <a href="<?php echo e(route('display-pos-list')); ?>"
                    class="rounded <?php echo e(request()->is('admin/pos') ? 'active' : ''); ?>">
                    <i class="fa-solid fa-list"></i> &nbsp; <?php echo e(__('sidebar.pos-list')); ?>

                </a>
            </li>


            <li>
                <a href="<?php echo e(route('display-pos-list')); ?>"
                    class="rounded <?php echo e(request()->is('admin/pos') ? 'active' : ''); ?>">
                    <i class="fa-solid fa-shopping-cart"></i> &nbsp; <?php echo e(__('sidebar.orders')); ?>

                </a>
            </li>
        </ul>
    </div>
</li>

<li class="mb-1">
    <button class="btn btn-toggle d-inline-flex align-items-center " data-bs-toggle="collapse"
        data-bs-target="#monitors-collapse1" aria-expanded="">
        <i class="fa-solid fa-desktop"></i> &nbsp; <?php echo e(__('sidebar.monitors')); ?>

    </button>
    <div class="collapse <?php echo e(request()->is(['admin/monitors*']) ? 'show' : ''); ?>" id="monitors-collapse1"
        data-bs-parent="#sidebarAccordion">
        <ul class="btn-toggle-nav list-unstyled fw-normal small">
            <li>
                <a href="<?php echo e(route('monitors-waiting-hall')); ?>"
                    class="rounded <?php echo e(Request::is('/admin/monitors/waiting/hall') ? 'active' : ''); ?>">
                    <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('sidebar.waiting_hall')); ?>

                </a>
            </li>
            <li>
                <a href="<?php echo e(route('monitors-restaurant-hall')); ?>"
                    class="rounded <?php echo e(Request::is('/admin/monitors/restaurant/hall') ? 'active' : ''); ?>">
                    <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('sidebar.restaurant_hall')); ?>

                </a>
            </li>
            <li>
                <a href="/admin/kitchen/display"
                    class="rounded <?php echo e(Request::is('/admin/kitchen/display') ? 'active' : ''); ?>">
                    <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('sidebar.kitchen')); ?>

                </a>
            </li>
            <li>
                <a href="<?php echo e(route('monitors-kitchen-processing-area')); ?>"
                    class="rounded <?php echo e(Request::is('/admin/monitors/kitchen') ? 'active' : ''); ?>">
                    <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('sidebar.kitchen_processing_area')); ?>

                </a>
            </li>
            <li>
                <a href="<?php echo e(route('monitors-meals-state')); ?>"
                    class="rounded <?php echo e(Request::is('/stats/home') ? 'active' : ''); ?>">
                    <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('sidebar.meals_state')); ?>

                </a>
            </li>
            <li>
                <a href="<?php echo e(route('monitors-advertisment-displays')); ?>"
                    class="rounded <?php echo e(Request::is('/admin/sales/active/sessions') ? 'active' : ''); ?>">
                    <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('sidebar.ads_displays')); ?>

                </a>
            </li>
        </ul>
    </div>
</li>

<li class="mb-1">
    <button class="btn btn-toggle d-inline-flex align-items-center " data-bs-toggle="collapse"
        data-bs-target="#settings-collapse1" aria-expanded="">
        <i class="fa-solid fa-cog"></i> &nbsp; <?php echo e(__('sidebar.settings')); ?>

    </button>
    <div class="collapse <?php echo e(request()->is(['admin/settings*']) ? 'show' : ''); ?>" id="settings-collapse1"
        data-bs-parent="#sidebarAccordion">
        <ul class="btn-toggle-nav list-unstyled fw-normal small">
            <li>
                <a href="/admin/setting/payment-methods/index"
                    class="rounded <?php echo e(Request::is('/admin/setting/payment-methods/index') ? 'active' : ''); ?>">
                    <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('sidebar.payment-methods')); ?>

                </a>
            </li>
            <li>
                <a href="/admin/monyBoxes/index"
                    class="rounded <?php echo e(Request::is('/admin/monyBoxes/index') ? 'active' : ''); ?>">
                    <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('sidebar.mony-boxes')); ?>

                </a>
            </li>
            <li>
                <a href="/admin/sales-shifts/index"
                    class="rounded <?php echo e(request()->is('/admin/sales-shifts/index') ? 'active' : ''); ?>">
                    <i class="fa-solid fa-cubes"></i> &nbsp; Sessions
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa-solid fa-credit-card"></i> &nbsp; <?php echo e(__('sidebar.payments')); ?>

                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa-solid fa-user-shield"></i> &nbsp; <?php echo e(__('sidebar.roles')); ?>

                </a>
            </li>

        </ul>
    </div>
</li>


<!-- <?php echo e(__('sidebar.orders')); ?> -->
<li class="mb-1">
    <button class="btn btn-toggle d-inline-flex align-items-center " data-bs-toggle="collapse"
        data-bs-target="#<?php echo e(__('sidebar.orders')); ?>-collapse" aria-expanded="">
        <i class="fa-solid fa-list"></i> &nbsp; <?php echo e(__('sidebar.orders')); ?>

    </button>
    <div class="collapse" id="<?php echo e(__('sidebar.orders')); ?>-collapse" data-bs-parent="#sidebarAccordion">
        <ul class="btn-toggle-nav list-unstyled fw-normal small">
            <li>
                <a href="">
                    <i class="fas fa-chart-pie"></i> &nbsp; <?php echo e(__('sidebar.orders')); ?>

                </a>
            </li>
            <li>
                <a href="/admin/<?php echo e(__('sidebar.orders')); ?>/index"
                    class="rounded <?php echo e(Request::is('/admin/' . __('sidebar.orders') . '/index') ? 'active' : ''); ?>">
                    <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('sidebar.orders')); ?>

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
<li class="mb-1">
    <button class="btn btn-toggle d-inline-flex align-items-center " data-bs-toggle="collapse"
        data-bs-target="#<?php echo e(__('sidebar.products')); ?>-collapse1" aria-expanded="">
        <i class="fa-solid fa-boxes-stacked"></i> &nbsp; <?php echo e(__('sidebar.products')); ?>

    </button>
    <div class="collapse <?php echo e(request()->is(['admin/' . __('sidebar.products') . '*']) ? 'show' : ''); ?>"
        id="<?php echo e(__('sidebar.products')); ?>-collapse1" data-bs-parent="#sidebarAccordion">
        <ul class="btn-toggle-nav list-unstyled fw-normal small">
            <li>
                <a href="">
                    <i class="fas fa-chart-pie"></i> &nbsp; <?php echo e(__('sidebar.products')); ?>

                </a>
            </li>
            <li>
                <a href="/admin/<?php echo e(__('sidebar.products')); ?>/index"
                    class="rounded <?php echo e(Request::is('/admin/' . __('sidebar.products') . '/index') ? 'active' : ''); ?>">
                    <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('sidebar.items')); ?>

                </a>

            </li>
            <li>
                <a href="">
                    <i class="fa-solid fa-file-invoice"></i> &nbsp; <?php echo e(__('sidebar.purchases-invoice')); ?>

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
<li class="mb-1">
    <button class="btn btn-toggle d-inline-flex align-items-center " data-bs-toggle="collapse"
        data-bs-target="#payments-collapse1" aria-expanded="">
        <i class="fa-solid fa-money-bill-transfer"></i> &nbsp; <?php echo e(__('sidebar.payments')); ?>

    </button>
    <div class="collapse <?php echo e(request()->is(['admin/payments*']) ? 'show' : ''); ?>" id="payments-collapse1"
        data-bs-parent="#sidebarAccordion">
        <ul class="btn-toggle-nav list-unstyled fw-normal small">
            <li>
                <a href=""
                    class="rounded <?php echo e(Request::is('admin/' . __('sidebar.payments') . '/index') ? 'active' : ''); ?>">
                    <i class="fas fa-chart-pie"></i> &nbsp; <?php echo e(__('sidebar.payments')); ?>

                </a>
            </li>
            <li>
                <a href="<?php echo e(route('display-accounts-list')); ?>"
                    class="rounded <?php echo e(Request::is('admin/accounts/index') ? 'active' : ''); ?>">
                    <i class="fa-solid fa-hand-holding-dollar"></i> &nbsp; <?php echo e(__('sidebar.accounts')); ?>

                </a>
            </li>
            <li>
                <a href="<?php echo e(route('display-payments-list')); ?>"
                    class="rounded <?php echo e(Request::is('admin/invoices/index') ? 'active' : ''); ?>">
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
<li class="mb-1">
    <button class="btn btn-toggle d-inline-flex align-items-center " data-bs-toggle="collapse"
        data-bs-target="#clients-collapse1" aria-expanded="">
        <i class="fa-solid fa-users"></i> &nbsp; <?php echo e(__('sidebar.clients')); ?>

    </button>
    <div class="collapse" id="clients-collapse1" data-bs-parent="#sidebarAccordion">
        <ul class="btn-toggle-nav list-unstyled fw-normal small">
            <li>
                <a href="">
                    <i class="fas fa-chart-pie"></i> &nbsp; <?php echo e(__('sidebar.home')); ?>

                </a>
            </li>
            <li>
                <a href="/admin/clients/index"
                    class="rounded <?php echo e(Request::is('/admin/clients/index') ? 'active' : ''); ?>">
                    <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('sidebar.clients')); ?>

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