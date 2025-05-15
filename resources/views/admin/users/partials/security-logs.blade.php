<div class="row">
  <div class="col-lg-12 col-sm-12">
    <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">{{ __('profile.security_logs') }}</h1>

    <div class="d-flex justify-content-start align-items-start setting-nav p-0">
      {{-- Sidebar Navigation --}}
      <div class="nav flex-column justify-content-start text-end" style="width:180px;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link active" id="v-pills-login-logs-tab" data-bs-toggle="pill" data-bs-target="#v-pills-login-logs" type="button" role="tab" aria-controls="v-pills-login-logs" aria-selected="true">
          {{ __('profile.login_logs') }}
        </button>
        <button class="nav-link" id="v-pills-connected-devices-tab" data-bs-toggle="pill" data-bs-target="#v-pills-connected-devices" type="button" role="tab" aria-controls="v-pills-connected-devices" aria-selected="false">
          {{ __('profile.connected_devices') }}
        </button>
        <button class="nav-link" id="v-pills-access-permissions-tab" data-bs-toggle="pill" data-bs-target="#v-pills-access-permissions" type="button" role="tab" aria-controls="v-pills-access-permissions" aria-selected="false">
          {{ __('profile.access_permissions') }}
        </button>
        <button class="nav-link" id="v-pills-system-permissions-tab" data-bs-toggle="pill" data-bs-target="#v-pills-system-permissions" type="button" role="tab" aria-controls="v-pills-system-permissions" aria-selected="false">
          {{ __('profile.system_permissions') }}
        </button>
      </div>

      {{-- Tab Content --}}
      <div class="tab-content p-3 m-0" id="v-pills-tabContent">
        {{-- Login Logs --}}
        <div class="tab-pane fade show active" id="v-pills-login-logs" role="tabpanel" aria-labelledby="v-pills-login-logs-tab" tabindex="0">
          <h4>{{ __('profile.login_logs') }}</h4>
          <p>{{ __('profile.last_login') }}: <strong>{{ $admin->last_login_at ? $admin->last_login_at->format('Y-m-d H:i:s') : 'N/A' }}</strong></p>
          <p>{{ __('profile.last_logout') }}: <strong>{{ $admin->last_logout_at ?? 'N/A' }}</strong></p>
          <p>{{ __('profile.suspicious_login_attempts') }}: <strong>{{ $suspiciousAttempts ?? 0 }}</strong></p>
        </div>

        {{-- Connected Devices --}}
        <div class="tab-pane fade" id="v-pills-connected-devices" role="tabpanel" aria-labelledby="v-pills-connected-devices-tab" tabindex="0">
          <h4>{{ __('profile.connected_devices') }}</h4>
        
        </div>

        {{-- Access Permissions --}}
        <div class="tab-pane fade" id="v-pills-access-permissions" role="tabpanel" aria-labelledby="v-pills-access-permissions-tab" tabindex="0">
          <h4>{{ __('profile.access_permissions') }}</h4>
          <p>{{ __('profile.can_access_safe') }}: <strong>{{ $admin->hasPermission('access_safe') ? __('profile.yes') : __('profile.no') }}</strong></p>
          <p>{{ __('profile.can_edit_cancelled_invoices') }}: <strong>{{ $admin->hasPermission('edit_cancelled_invoices') ? __('profile.yes') : __('profile.no') }}</strong></p>
        </div>

        {{-- System Permissions --}}
        <div class="tab-pane fade" id="v-pills-system-permissions" role="tabpanel" aria-labelledby="v-pills-system-permissions-tab" tabindex="0">
          <h4>{{ __('profile.system_permissions') }}</h4>
          <ul>
            @foreach ($admin->permissions as $permission)
              <li>{{ $permission->name }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>