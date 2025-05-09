<div class="row">
  <div class="col-lg-12 col-sm-12">
    <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede"><?php echo e(__('profile.security_logs')); ?></h1>

    <div class="d-flex justify-content-start align-items-start setting-nav p-0">
      
      <div class="nav flex-column justify-content-start text-end" style="width:180px;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link active" id="v-pills-login-logs-tab" data-bs-toggle="pill" data-bs-target="#v-pills-login-logs" type="button" role="tab" aria-controls="v-pills-login-logs" aria-selected="true">
          <?php echo e(__('profile.login_logs')); ?>

        </button>
        <button class="nav-link" id="v-pills-connected-devices-tab" data-bs-toggle="pill" data-bs-target="#v-pills-connected-devices" type="button" role="tab" aria-controls="v-pills-connected-devices" aria-selected="false">
          <?php echo e(__('profile.connected_devices')); ?>

        </button>
        <button class="nav-link" id="v-pills-access-permissions-tab" data-bs-toggle="pill" data-bs-target="#v-pills-access-permissions" type="button" role="tab" aria-controls="v-pills-access-permissions" aria-selected="false">
          <?php echo e(__('profile.access_permissions')); ?>

        </button>
        <button class="nav-link" id="v-pills-system-permissions-tab" data-bs-toggle="pill" data-bs-target="#v-pills-system-permissions" type="button" role="tab" aria-controls="v-pills-system-permissions" aria-selected="false">
          <?php echo e(__('profile.system_permissions')); ?>

        </button>
      </div>

      
      <div class="tab-content p-3 m-0" id="v-pills-tabContent">
        
        <div class="tab-pane fade show active" id="v-pills-login-logs" role="tabpanel" aria-labelledby="v-pills-login-logs-tab" tabindex="0">
          <h4><?php echo e(__('profile.login_logs')); ?></h4>
          <p><?php echo e(__('profile.last_login')); ?>: <strong><?php echo e($admin->last_login_at ? $admin->last_login_at->format('Y-m-d H:i:s') : 'N/A'); ?></strong></p>
          <p><?php echo e(__('profile.last_logout')); ?>: <strong><?php echo e($admin->last_logout_at ?? 'N/A'); ?></strong></p>
          <p><?php echo e(__('profile.suspicious_login_attempts')); ?>: <strong><?php echo e($suspiciousAttempts ?? 0); ?></strong></p>
        </div>

        
        <div class="tab-pane fade" id="v-pills-connected-devices" role="tabpanel" aria-labelledby="v-pills-connected-devices-tab" tabindex="0">
          <h4><?php echo e(__('profile.connected_devices')); ?></h4>
          <ul>
            <?php $__currentLoopData = $connectedDevices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($device->device_name); ?> - <?php echo e($device->last_active_at->format('Y-m-d H:i:s')); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
          <form method="POST" action="<?php echo e(route('admins.logoutAllDevices', $admin->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('POST'); ?>
            <button type="submit" class="btn btn-danger"><?php echo e(__('profile.logout_from_all_devices')); ?></button>
          </form>
        </div>

        
        <div class="tab-pane fade" id="v-pills-access-permissions" role="tabpanel" aria-labelledby="v-pills-access-permissions-tab" tabindex="0">
          <h4><?php echo e(__('profile.access_permissions')); ?></h4>
          <p><?php echo e(__('profile.can_access_safe')); ?>: <strong><?php echo e($admin->hasPermission('access_safe') ? __('profile.yes') : __('profile.no')); ?></strong></p>
          <p><?php echo e(__('profile.can_edit_cancelled_invoices')); ?>: <strong><?php echo e($admin->hasPermission('edit_cancelled_invoices') ? __('profile.yes') : __('profile.no')); ?></strong></p>
        </div>

        
        <div class="tab-pane fade" id="v-pills-system-permissions" role="tabpanel" aria-labelledby="v-pills-system-permissions-tab" tabindex="0">
          <h4><?php echo e(__('profile.system_permissions')); ?></h4>
          <ul>
            <?php $__currentLoopData = $admin->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($permission->name); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/users/partials/security-logs.blade.php ENDPATH**/ ?>