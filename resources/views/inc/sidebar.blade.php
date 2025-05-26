
{{-- filepath: c:\wamp64\www\CashierApp\resources\views\inc\sidebar.blade.php --}}
<div class="main-sidebar flex-shrink-0">

    <div class=" d-flex flex-column">
        <div class="logo mt-3 mb-2">
            <a href="/" class=" d-flex justify-content-start gap-1">
                <span class="restaurant-icon">🏪</span>
                <span class="fs-5 fw-semibold text-dark">Cashier App</span>
            </a>
        </div>
        <a href="{{ route('view-profile', [App\Models\Admin::currentId()]) }}" class="profile mb-2">
            <img src="{{ $admin->profile->image ? asset('assets/admin/uploads/images/avatar/' . $admin->profile->image) : asset('assets/admin/images/avatar/user-1.png') }}" alt="Profile Picture" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;">
            <div class="profile-info ">
                <h6 class="info-title">{{ App\Models\Admin::currentUser()->userName }}</h6>
                <span class="sub-title">{{ ucfirst(App\Models\Admin::currentUser()->role_name) }}</span>
            </div>
        </a>
    </div>
    <ul class="list-unstyled ps-0" id="sidebarAccordion">

        <!-- لوحة التحكم -->
        @php
            $isDashboardActive = request()->is('admin/dashboard') || request()->is('admin/admins*') || request()->is('admin/roles*') || request()->is('admin/stats*') || request()->is('admin/sales/active/sessions');
        @endphp
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center {{ $isDashboardActive ? 'active' : '' }}" data-bs-toggle="collapse"
                data-bs-target="#dashboard-collapse1" aria-expanded="{{ $isDashboardActive ? 'true' : 'false' }}">
                <i class="fa-solid fa-sliders"></i> &nbsp; {{ __('sidebar.dashboard') }}
            </button>

            <div class="collapse {{ $isDashboardActive ? 'show' : '' }}"
                id="dashboard-collapse1" data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    {{-- Dashboard home --}}
                    <li>
                        <a href="{{ route('admin-dashboard') }}"
                            class="rounded {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                            <i class="fa-solid fa-home"></i> &nbsp; {{ __('sidebar.home') }}
                        </a>
                    </li>

                    {{-- Overview --}}
                    <li>
                        <a href="{{ route('admin-list') }}"
                            class="rounded {{ request()->is('admin/admins*') ? 'active' : '' }}">
                            <i class="fa-solid fa-chart-pie"></i> &nbsp; {{ __('sidebar.overview') }}
                        </a>
                    </li>

                    {{-- Day Summary --}}
                    <li>
                        <a href="{{ route('admin-list') }}"
                            class="rounded {{ request()->is('admin/admins*') ? 'active' : '' }}">
                            <i class="fa-solid fa-calendar-day"></i> &nbsp; {{ __('sidebar.day-summary') }}
                        </a>
                    </li>

                    {{-- Performance --}}
                    <li>
                        <a href="{{ route('admin-list') }}"
                            class="rounded {{ request()->is('admin/admins*') ? 'active' : '' }}">
                            <i class="fa-solid fa-chart-line"></i> &nbsp; {{ __('sidebar.performance') }}
                        </a>
                    </li>

                    {{-- Quick Actions --}}
                    <li>
                        <a href="{{ route('admin-list') }}"
                            class="rounded {{ request()->is('admin/admins*') ? 'active' : '' }}">
                            <i class="fa-solid fa-bolt"></i> &nbsp; {{ __('sidebar.quick-actions') }}
                        </a>
                    </li>
                    {{-- 
                    <li>
                        <a href="{{ route('admin-list') }}"
                            class="rounded {{ request()->is('admin/admins*') ? 'active' : '' }}">
                            <i class="fa-solid fa-cubes"></i> &nbsp; {{ __('sidebar.admins') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('roles-list') }}"
                            class="rounded {{ request()->is('admin/roles*') ? 'active' : '' }}">
                            <i class="fa-solid fa-cubes"></i> &nbsp; {{ __('sidebar.roles') }}
                        </a>
                    </li>
                    <li>
                        <a href="/admin/stats/home" class="rounded {{ request()->is('stats/home') ? 'active' : '' }}">
                            <i class="fa-solid fa-cubes"></i> &nbsp; {{ __('sidebar.stats') }}
                        </a>
                    </li>
                    <li>
                        <a href="/admin/sales/active/sessions"
                            class="rounded {{ request()->is('admin/sales/active/sessions') ? 'active' : '' }}">
                            <i class="fa-solid fa-cubes"></i> &nbsp; {{ __('sidebar.sales') }}
                        </a>
                    </li>
                    --}}
                </ul>
            </div>
        </li>

        <!-- المشتريات -->
        @php
            $isPurchasesActive = request()->is('admin/purchase-orders*') || request()->is('admin/suppliers*');
        @endphp
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center {{ $isPurchasesActive ? 'active' : '' }}" data-bs-toggle="collapse"
                data-bs-target="#purchases-collapse" aria-expanded="{{ $isPurchasesActive ? 'true' : 'false' }}">
                <i class="fas fa-shopping-cart"></i> &nbsp; {{ __('sidebar.purchases') }}
            </button>
            <div class="collapse {{ $isPurchasesActive ? 'show' : '' }}"
                id="purchases-collapse" data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="{{ route('admin.purchase-orders.index') }}"
                            class="rounded {{ request()->is('admin/purchase-orders*') ? 'active' : '' }}">
                            <i class="fas fa-file-invoice"></i> &nbsp; {{ __('sidebar.purchase_orders') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.suppliers.index') }}"
                            class="rounded {{ request()->is('admin/suppliers*') ? 'active' : '' }}">
                            <i class="fas fa-truck"></i> &nbsp; {{ __('sidebar.suppliers') }}
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Point Of Sale Menu -->
        @php
            $isPosActive = request()->is('admin/pos*');
        @endphp
        @if (Auth::user()->hasPermission('display-orders-list'))
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center {{ $isPosActive ? 'active' : '' }}" data-bs-toggle="collapse"
                data-bs-target="#pos-collapse1" aria-expanded="{{ $isPosActive ? 'true' : 'false' }}">
                <i class="fa-solid fa-cash-register"></i> &nbsp; {{ __('sidebar.pos') }}
            </button>
            <div class="collapse {{ $isPosActive ? 'show' : '' }}" id="pos-collapse1"
                data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    @if (Auth::user()->hasPermission('display-order-info'))
                    <li>
                        <a href="{{ route('display-pos-list') }}"
                            class="rounded {{ request()->is('admin/pos/index') ? 'active' : '' }}">
                            <i class="fa-solid fa-list"></i> &nbsp; {{ __('sidebar.pos-list') }}
                        </a>
                    </li>
                    @endif
                    @if (Auth::user()->hasPermission('edit-order-info'))
                    <li>
                        <a href=""
                            class="rounded {{ request()->is('admin/pos/index') ? 'active' : '' }}">
                            <i class="fa-solid fa-list"></i> &nbsp; {{ __('Yousra') }}
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif
        <!-- Monitors -->
        @php
            $isMonitorsActive = request()->is('admin/monitors*') || request()->is('admin/kitchen/display') || request()->is('admin/monitors/kitchen');
        @endphp
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center {{ $isMonitorsActive ? 'active' : '' }}" data-bs-toggle="collapse"
                data-bs-target="#monitors-collapse1" aria-expanded="{{ $isMonitorsActive ? 'true' : 'false' }}">
                <i class="fa-solid fa-desktop"></i> &nbsp; {{ __('sidebar.monitors') }}
            </button>
            <div class="collapse {{ $isMonitorsActive ? 'show' : '' }}" id="monitors-collapse1"
                data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="{{ route('monitors-waiting-hall') }}"
                            class="rounded {{ request()->is('admin/monitors/waiting-hall') ? 'active' : '' }}">
                            <i class="fa-solid fa-cubes"></i> &nbsp; {{ __('sidebar.waiting_hall') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('monitors-restaurant-hall') }}"
                            class="rounded {{ request()->is('admin/monitors/restaurant-hall') ? 'active' : '' }}">
                            <i class="fa-solid fa-cubes"></i> &nbsp; {{ __('sidebar.R.H_monitor') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.kitchen.kitchen') }}"
                            class="rounded {{ request()->is('admin/kitchen/display') ? 'active' : '' }}">
                            <i class="fa-solid fa-cubes"></i> &nbsp; {{ __('sidebar.kitchen_monitor') }}
                        </a>
                    </li>
                  {{--  <li>
                        <a href="{{ route('monitors-kitchen-processing-area') }}"
                            class="rounded {{ request()->is('admin/monitors/kitchen-processing-area') ? 'active' : '' }}">
                            <i class="fa-solid fa-cubes"></i> &nbsp; {{ __('sidebar.kitchen_processing_area') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('monitors-meals-state') }}"
                            class="rounded {{ request()->is('admin/monitors/meals-state') ? 'active' : '' }}">
                            <i class="fa-solid fa-cubes"></i> &nbsp; {{ __('sidebar.meals_state') }}
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ route('monitors-advertisment-displays') }}"
                            class="rounded {{ request()->is('admin/monitors/advertisment-displays') ? 'active' : '' }}">
                            <i class="fa-solid fa-cubes"></i> &nbsp; {{ __('sidebar.ads_displays') }}
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Settings -->
        @php
            $isSettingsActive = request()->is('admin/settings*') || request()->is('admin/setting/payment-methods/index') || request()->is('admin/monyBoxes/index') || request()->is('admin/sales-shifts/index');
        @endphp
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center {{ $isSettingsActive ? 'active' : '' }}" data-bs-toggle="collapse"
                data-bs-target="#settings-collapse1" aria-expanded="{{ $isSettingsActive ? 'true' : 'false' }}">
                <i class="fa-solid fa-cog"></i> &nbsp; {{ __('sidebar.settings') }}
            </button>
            <div class="collapse {{ $isSettingsActive ? 'show' : '' }}" id="settings-collapse1"
                data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="{{ route('display-payment-methods-list') }}"
                            class="rounded {{ request()->is('admin/setting/payment-methods/index') ? 'active' : '' }}">
                            <i class="fa-solid fa-credit-card"></i> &nbsp; {{ __('sidebar.payment-methods') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('all-Mony-box') }}"
                            class="rounded {{ request()->is('admin/monyBoxes/index') ? 'active' : '' }}">
                            <i class="fa-solid fa-box"></i> &nbsp; {{ __('sidebar.mony-boxes') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('all-sales-session') }}"
                            class="rounded {{ request()->is('admin/sales-session/index') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock"></i> &nbsp; {{ __('sidebar.sessions') }}
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Products Section -->
        @php
            $isProductsActive = request()->is('products*') || request()->is('units*') || request()->is('taxes*');
        @endphp
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center {{ $isProductsActive ? 'active' : '' }}" data-bs-toggle="collapse"
                data-bs-target="#products-collapse" aria-expanded="{{ $isProductsActive ? 'true' : 'false' }}">
                <i class="fa-solid fa-boxes-stacked"></i> &nbsp; {{ __('sidebar.products') }}
            </button>
            <div class="collapse {{ $isProductsActive ? 'show' : '' }}" id="products-collapse"
                data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <!-- Products -->
                    <li>
                        <a href="{{ route('display-product-all') }}"
                            class="rounded {{ request()->is('products/index') ? 'active' : '' }}">
                            <i class="fa-solid fa-box"></i> &nbsp; {{ __('sidebar.products') }}
                        </a>
                    </li>
                    <!-- Units -->
                    <li>
                        <a href="{{ route('display-units-all') }}"
                            class="rounded {{ request()->is('units/index') ? 'active' : '' }}">
                            <i class="fa-solid fa-ruler"></i> &nbsp; {{ __('sidebar.units') }}
                        </a>
                    </li>
                    <!-- Taxes -->
                    <li>
                        <a href="{{ route('taxes.index') }}"
                            class="rounded {{ request()->is('taxes*') ? 'active' : '' }}">
                            <i class="fa-solid fa-money-bill-wave"></i> &nbsp; {{ __('sidebar.taxes') }}
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Orders -->
        @php
            $isOrdersActive = request()->is('admin/orders*');
        @endphp
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center {{ $isOrdersActive ? 'active' : '' }}" data-bs-toggle="collapse"
                data-bs-target="#orders-collapse" aria-expanded="{{ $isOrdersActive ? 'true' : 'false' }}">
                <i class="fa-solid fa-list"></i> &nbsp; {{ __('sidebar.orders') }}
            </button>
            <div class="collapse {{ $isOrdersActive ? 'show' : '' }}" id="orders-collapse" data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="{{ route('display-orders-stats') }}"
                            class="rounded {{ request()->is('admin/orders/stats') ? 'active' : '' }}">
                            <i class="fas fa-chart-pie"></i> &nbsp; {{ __('sidebar.orders_stats') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('display-orders-list') }}"
                            class="rounded {{ request()->is('admin/orders/index') ? 'active' : '' }}">
                            <i class="fa-solid fa-cubes"></i> &nbsp; {{ __('sidebar.orders_list') }}
                        </a>
                    </li>
                      <li>
                        <a href="">
                            <i class="fa-solid fa-cog"></i> &nbsp; {{ __('sidebar.settings') }}
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Payments -->
        @php
            $isPaymentsActive = request()->is('admin/payments*');
        @endphp
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center {{ $isPaymentsActive ? 'active' : '' }}" data-bs-toggle="collapse"
                data-bs-target="#payments-collapse1" aria-expanded="{{ $isPaymentsActive ? 'true' : 'false' }}">
                <i class="fa-solid fa-money-bill-transfer"></i> &nbsp; {{ __('sidebar.payments') }}
            </button>
            <div class="collapse {{ $isPaymentsActive ? 'show' : '' }}" id="payments-collapse1"
                data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="{{ route('display-payments-list') }}"
                            class="rounded {{ request()->is('admin/payments/index') ? 'active' : '' }}">
                            <i class="fas fa-money-bill-wave"></i> &nbsp; {{ __('sidebar.payments_list') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('display-accounts-list') }}"
                            class="rounded {{ request()->is('admin/accounts/index') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-holding-dollar"></i> &nbsp; {{ __('sidebar.accounts') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('display-invoices-list') }}"
                            class="rounded {{ request()->is('admin/invoices/index') ? 'active' : '' }}">
                            <i class="fa-solid fa-file-invoice"></i> &nbsp; {{ __('sidebar.invoices') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('display-payment-methods-list') }}"
                            class="rounded {{ Request::is('admin/settings/index') ? 'active' : '' }}">
                            <i class="fa-solid fa-sliders"></i> &nbsp; {{ __('sidebar.settings') }}
                        </a>
                    </li>
                    
                </ul>
            </div>
        </li>

        <!-- Clients -->
        @php
            $isClientsActive = request()->is('admin/clients*');
        @endphp
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center {{ $isClientsActive ? 'active' : '' }}" data-bs-toggle="collapse"
                data-bs-target="#clients-collapse1" aria-expanded="{{ $isClientsActive ? 'true' : 'false' }}">
                <i class="fa-solid fa-users"></i> &nbsp; {{ __('sidebar.clients') }}
            </button>
            <div class="collapse {{ $isClientsActive ? 'show' : '' }}" id="clients-collapse1" data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                      <li>
                        <a href="">
                            <i class="fas fa-chart-pie"></i> &nbsp; {{ __('sidebar.home') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('display-client-all') }}"
                            class="rounded {{ request()->is('admin/clients/index') ? 'active' : '' }}">
                            <i class="fa-solid fa-users"></i> &nbsp; {{ __('sidebar.clients_list') }}
                        </a>
                    </li>
                      <li>
                        <a href="">
                            <i class="fa-solid fa-file-invoice"></i> &nbsp; {{ __('sidebar.reports') }}
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa-solid fa-sliders"></i> &nbsp; {{ __('sidebar.settings') }}
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
            <form action="{{ route('locale-switch', session('locale') === 'ar' ? 'en' : 'ar') }}" method="GET">
                <button type="submit" class="btn btn-outline-primary btn-sm w-100">
                    <i class="fas fa-language me-2"></i>
                    {{ session('locale') === 'ar' ? 'English' : 'العربية' }}
                </button>
            </form>
        </div>
    </div>
</div>