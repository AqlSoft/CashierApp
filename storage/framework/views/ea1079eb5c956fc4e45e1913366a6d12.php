<div class="main-sidebar flex-shrink-0">
    <div class=" d-flex align-items-center justify-content-center flex-column">
        <div class="logo mt-3 mb-2">
            <a href="/" class=" d-flex align-items-center gap-1">
                <span class="restaurant-icon">🏪</span>
                <span class="fs-5 fw-semibold text-dark">Cashier App</span>
            </a>
        </div>
        <a href="<?php echo e(route('view-profile', [App\Models\Admin::current()->id])); ?>" class="profile mb-2">
            <img src="<?php echo e(asset('assets/admin/uploads/images/avatar/avatar-04.jpg')); ?>" alt="Profile Picture"
                class="profile-picture">
            <div class="profile-info ">
                <h6 class="info-title"><?php echo e(App\Models\Admin::current()->userName); ?></h6>
                <span class="sub-title"><?php echo e(ucfirst(App\Models\Admin::current()->role_name)); ?></span>
            </div>

        </a>
    </div>
    <ul class="list-unstyled ps-0" id="sidebarAccordion">
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center " data-bs-toggle="collapse"
                data-bs-target="#dashboard-collapse1" aria-expanded="">
                <i class="fa-solid fa-cog"></i> &nbsp; <?php echo e(__('Dashboard')); ?>

            </button>
            <div class="collapse <?php echo e(request()->is(['admin/admins*', 'admin/roles*', 'admin/stats/*', 'admin/sales/active/sessions']) ? 'show' : ''); ?>"
                id="dashboard-collapse1" data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="<?php echo e(route('admin-list')); ?>"
                            class="rounded <?php echo e(Request::is('/admin/settings/index') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('Admins List')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('roles-list')); ?>"
                            class="rounded <?php echo e(Request::is('/admin/roles*') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('Roles List')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="/admin/stats/home" class="rounded <?php echo e(Request::is('/stats/home') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('Statistics')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="/admin/sales/active/sessions"
                            class="rounded <?php echo e(Request::is('/admin/sales/active/sessions') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('P.O.S')); ?>

                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center " data-bs-toggle="collapse"
                data-bs-target="#monitors" aria-expanded="">
                <i class="fa-solid fa-cog"></i> &nbsp; <?php echo e(__('Active Monitors')); ?>

            </button>
            <div class="collapse <?php echo e(request()->is(['admin/admins*', 'admin/roles*', 'admin/stats/*', 'admin/sales/active/sessions']) ? 'show' : ''); ?>"
                id="monitors" data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="<?php echo e(route('monitors-waiting-hall')); ?>"
                            class="rounded <?php echo e(Request::is('/admin/monitors/waiting/hall') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('Waiting Hall')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('monitors-restaurant-hall')); ?>"
                            class="rounded <?php echo e(Request::is('/admin/monitors/restaurant/hall') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('Restaurant Hall')); ?>

                        </a>
                    </li>
                    <li>
                    <a href="/admin/kitchen/display"
                            class="rounded <?php echo e(Request::is('/admin/kitchen/display') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-cubes"></i> &nbsp;<?php echo e(__('Kitchen')); ?> 
                        </a>
                    </li>
                    <!-- <li>
                        <a href="<?php echo e(route('monitors-kitchen-processing-area')); ?>"
                            class="rounded <?php echo e(Request::is('/admin/monitors/kitchen') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('Kitchen')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('monitors-meals-state')); ?>" class="rounded <?php echo e(Request::is('/stats/home') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('Meals State')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('monitors-advertisment-displays')); ?>"
                            class="rounded <?php echo e(Request::is('/admin/sales/active/sessions') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-cubes"></i> &nbsp; <?php echo e(__('ADS Monitors')); ?>

                        </a>
                    </li> -->
                </ul>
            </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center " data-bs-toggle="collapse"
                data-bs-target="#Settings-collapse1" aria-expanded="">
                <i class="fa-solid fa-cog"></i> &nbsp; General Settings
            </button>
            <div class="collapse" id="Settings-collapse1" data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="/admin/settings/index"
                            class="rounded <?php echo e(Request::is('/admin/settings/index') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-cubes"></i> &nbsp; setting
                        </a>
                    </li>
                    <li>
                        <a href="/admin/monyBoxes/index"
                            class="rounded <?php echo e(Request::is('/admin/monyBoxes/index') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-cubes"></i> &nbsp; MonyBox
                        </a>
                    </li>
                    <li>
                        <a href="/admin/sales-shifts/index"
                            class="rounded <?php echo e(Request::is('/admin/sales-shifts/index') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-cubes"></i> &nbsp; Sessions
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa-solid fa-credit-card"></i> &nbsp; Payment Methods
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa-solid fa-user-shield"></i> &nbsp; Roles
                        </a>
                    </li>

                </ul>
            </div>
        </li>


        <!-- Orders -->
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center " data-bs-toggle="collapse"
                data-bs-target="#orders-collapse" aria-expanded="">
                <i class="fa-solid fa-list"></i> &nbsp; Orders
            </button>
            <div class="collapse" id="orders-collapse" data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="">
                            <i class="fas fa-chart-pie"></i> &nbsp; Home
                        </a>
                    </li>
                    <li>
                        <a href="/admin/orders/index"
                            class="rounded <?php echo e(Request::is('/admin/orders/index') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-cubes"></i> &nbsp; Orders
                        </a>
                    </li>
                
                    <li>
                        <a href="">
                            <i class="fa-solid fa-cog"></i> &nbsp; Settings
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center " data-bs-toggle="collapse"
                data-bs-target="#Products-collapse1" aria-expanded="">
                <i class="fa-solid fa-boxes-stacked"></i> &nbsp; Products
            </button>
            <div class="collapse" id="Products-collapse1" data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="">
                            <i class="fas fa-chart-pie"></i> &nbsp; Home
                        </a>
                    </li>
                    <li>
                        <a href="/admin/products/index"
                            class="rounded <?php echo e(Request::is('/admin/products/index') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-cubes"></i> &nbsp; Items
                        </a>

                    </li>
                    <li>
                        <a href="">
                            <i class="fa-solid fa-file-invoice"></i> &nbsp; Purchases Invoice
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa-solid fa-sliders"></i> &nbsp; Settings
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center " data-bs-toggle="collapse"
                data-bs-target="#Payments-collapse1" aria-expanded="">
                <i class="fa-solid fa-money-bill-transfer"></i> &nbsp; Payments
            </button>
            <div class="collapse" id="Payments-collapse1" data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="">
                            <i class="fas fa-chart-pie"></i> &nbsp; Home
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa-solid fa-hand-holding-dollar"></i> &nbsp; acounts
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa-solid fa-file-invoice"></i> &nbsp;Invoices
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa-solid fa-sliders"></i> &nbsp; Settings
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center " data-bs-toggle="collapse"
                data-bs-target="#users-collapse1" aria-expanded="">
                <i class="fa-solid fa-users"></i> &nbsp; Clients
            </button>
            <div class="collapse" id="users-collapse1" data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="">
                            <i class="fas fa-chart-pie"></i> &nbsp; Home
                        </a>
                    </li>
                    <li>
                        <a href="/admin/clients/index"
                            class="rounded <?php echo e(Request::is('/admin/clients/index') ? 'active' : ''); ?>">
                            <i class="fa-solid fa-cubes"></i> &nbsp; Clients
                        </a>

                    </li>
                    <li>
                        <a href="">
                            <i class="fa-solid fa-file-invoice"></i> &nbsp; reports
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa-solid fa-sliders"></i> &nbsp; Settings
                        </a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</div><?php /**PATH C:\wamp64\www\CashierApp\resources\views/inc/sidebar.blade.php ENDPATH**/ ?>