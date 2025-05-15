
<div class="row">
  <div class="col-lg-12 col-sm-12">
    <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede"><?php echo e(__('profile.session_management')); ?></h1>

    <div class="d-flex justify-content-start align-items-start setting-nav p-0">
      
      <div class="nav flex-column justify-content-start text-end" style="width:180px;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link active" id="v-pills-active-sessions-tab" data-bs-toggle="pill" data-bs-target="#v-pills-active-sessions" type="button" role="tab" aria-controls="v-pills-active-sessions" aria-selected="true">
          <?php echo e(__('profile.active_sessions')); ?>

        </button>
        <button class="nav-link" id="v-pills-old-sessions-tab" data-bs-toggle="pill" data-bs-target="#v-pills-old-sessions" type="button" role="tab" aria-controls="v-pills-old-sessions" aria-selected="false">
          <?php echo e(__('profile.old_sessions')); ?>

        </button>
      </div>

      
      <div class="tab-content p-3 m-0" id="v-pills-tabContent">
        
        <div class="tab-pane fade show active" id="v-pills-active-sessions" role="tabpanel" aria-labelledby="v-pills-active-sessions-tab" tabindex="0">
          <h4 class="mb-3"><?php echo e(__('profile.active_sessions')); ?></h4>
          <?php if($activeSessions->isNotEmpty()): ?>
            <div class="list-group">
              <?php $__currentLoopData = $activeSessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="list-group-item">
                  <h5 class="mb-1  pb-1 pt-1"><?php echo e(__('profile.session_name')); ?>: <strong><?php echo e($session->name); ?></strong></h5>
                  <p class="mb-1  pb-1 pt-1"><?php echo e(__('profile.device_name')); ?>: <strong><?php echo e($session->device_name); ?></strong></p>
                  <p class="mb-1  pb-1 pt-1"><?php echo e(__('profile.cashbox_name')); ?>: <strong><?php echo e($session->monybox->name); ?></strong></p>
                  <p class="mb-1  pb-1 pt-1"><?php echo e(__('profile.total_orders')); ?>: <strong><?php echo e($session->orders->count()); ?></strong></p>
                  <p class="mb-1  pb-1 pt-1"><?php echo e(__('profile.total_revenue')); ?>:: <strong> <?php echo e(number_format($session->total_revenue, 2)); ?> <?php echo e(__('profile.currency')); ?></strong></p>
                  <p class="mb-1  pb-1 pt-1"><?php echo e(__('profile.cashbox_total')); ?>:: <strong> <?php echo e(number_format($session->cashbox_total, 2)); ?> <?php echo e(__('profile.currency')); ?></strong></p>

                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          <?php else: ?>
            <div class="alert alert-info"><?php echo e(__('profile.no_active_sessions')); ?></div>
          <?php endif; ?>
        </div>

        
        <div class="tab-pane fade" id="v-pills-old-sessions" role="tabpanel" aria-labelledby="v-pills-old-sessions-tab" tabindex="0">
          <h4 class="mb-3"><?php echo e(__('profile.old_sessions')); ?></h4>
          <?php if($oldSessions->isNotEmpty()): ?>
            <div class="list-group">
              <?php $__currentLoopData = $oldSessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="list-group-item p-3">
                  <h5 class="mb-1 pb-1 pt-1"><?php echo e(__('profile.session_name')); ?>: <strong><?php echo e($session->name); ?></strong></h5>
                  <p class="mb-1 pb-1 pt-1"><?php echo e(__('profile.start_time')); ?>: <strong><?php echo e($session->start_time->format('d/m/Y H:i')); ?></strong></p>
                  <p class="mb-1 pb-1 pt-1"><?php echo e(__('profile.end_time')); ?>: <strong><?php echo e($session->end_time ? $session->end_time->format('d/m/Y H:i') : __('profile.in_progress')); ?></strong></p>
                  <p class="mb-1 pb-1 pt-1"><?php echo e(__('profile.total_orders')); ?>: <strong><?php echo e($session->orders->count()); ?></strong></p>
                  <p class="mb-1 pb-1 pt-1"><?php echo e(__('profile.total_revenue')); ?>: <strong><?php echo e(number_format($session->total_revenue, 2)); ?> <?php echo e(__('profile.currency')); ?></strong></p>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          <?php else: ?>
            <div class="alert alert-info"><?php echo e(__('profile.no_old_sessions')); ?></div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/users/partials/session-section.blade.php ENDPATH**/ ?>