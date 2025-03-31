<div class="main-sidebar flex-shrink-0">
  <a href="/" class="sidebar-brand d-flex align-items-center gap-1">
    <div class="restaurant-icon">🏪</div>
    <span class="fs-5 fw-semibold">CashSys Home</span>
  </a>
  <ul class="list-unstyled ps-0" id="sidebarAccordion">
    <!-- Orders -->
    <li class="mb-1">
      <button
        class="btn btn-toggle d-inline-flex align-items-center "
        data-bs-toggle="collapse" data-bs-target="#orders-collapse"
        aria-expanded="">
        <i class="fa-solid fa-list"></i> &nbsp; Orders
      </button>
      <div class="collapse" id="orders-collapse"
        data-bs-parent="#sidebarAccordion">
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
              <i class="fa-solid fa-file-invoice-dollar"></i> &nbsp; Sales Invoice
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
      <button
        class="btn btn-toggle d-inline-flex align-items-center "
        data-bs-toggle="collapse" data-bs-target="#Products-collapse1"
        aria-expanded="">
        <i class="fa-solid fa-boxes-stacked"></i> &nbsp; Products
      </button>
      <div class="collapse" id="Products-collapse1"
        data-bs-parent="#sidebarAccordion">
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
      <button
        class="btn btn-toggle d-inline-flex align-items-center "
        data-bs-toggle="collapse" data-bs-target="#Payments-collapse1"
        aria-expanded="">
        <i class="fa-solid fa-money-bill-transfer"></i> &nbsp; Payments
      </button>
      <div class="collapse" id="Payments-collapse1"
        data-bs-parent="#sidebarAccordion">
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
      <button
        class="btn btn-toggle d-inline-flex align-items-center "
        data-bs-toggle="collapse" data-bs-target="#users-collapse1"
        aria-expanded="">
        <i class="fa-solid fa-users"></i> &nbsp; Clients
      </button>
      <div class="collapse" id="users-collapse1"
        data-bs-parent="#sidebarAccordion">
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
    <li class="mb-1">
      <button
        class="btn btn-toggle d-inline-flex align-items-center "
        data-bs-toggle="collapse" data-bs-target="#Settings-collapse1"
        aria-expanded="">
        <i class="fa-solid fa-cog"></i> &nbsp; Settings
      </button>
      <div class="collapse" id="Settings-collapse1"
        data-bs-parent="#sidebarAccordion">
        <ul class="btn-toggle-nav list-unstyled fw-normal small">
          <li>
          <a href="/admin/settings/index"
              class="rounded <?php echo e(Request::is('/admin/settings/index') ? 'active' : ''); ?>">
              <i class="fa-solid fa-cubes"></i> &nbsp; setting
            </a>
          </li>
          <li>
            <a href="">
              <i class="fa-solid fa-weight-hanging"></i> &nbsp; Units
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
          <li>
            <a href="">
              <i class="fa-solid fa-tags"></i> &nbsp; Categories
            </a>
          </li>
        </ul>
      </div>
    </li>
  </ul>
</div><?php /**PATH C:\wamp64\www\kashear_project\resources\views/inc/sidebar.blade.php ENDPATH**/ ?>