<?php $__env->startSection('contents'); ?>
<h2 class="mt-4 pb-2" style="border-bottom: 1px solid #dedede">
  <i class="fa fa-edit px-1"></i> <?php echo e(__('sessions.update_sales_session')); ?>

</h2>
<fieldset class="mt-2 mb-4 mx-0 mb-0 shadow-sm">

  <div class="row">
    <div class="card-body">
      <form action="<?php echo e(route('update-sales-session-info')); ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo e($sales_session->id); ?>">
        <?php echo csrf_field(); ?>
        <div class="input-group sm mb-2">
          <label class="input-group-text" for="start_time"><?php echo e(__('sessions.start_time')); ?></label>
          <input type="text" class="form-control sm" name="start_time" id="start_time" value="<?php echo e(old('start_time', $sales_session->start_time)); ?>">
          <!-- <label class="input-group-text" for="end_time"><?php echo e(__('sessions.end_time')); ?></label>
          <input type="date" class="form-control sm" name="end_time" id="end_time"> -->
          <label class="input-group-text" for="admin_id"><?php echo e(__('sessions.admins')); ?></label>
          <select class="form-select form-control sm py-0" name="admin_id" id="admin_id">
            <?php $__empty_1 = true; $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <option value="<?php echo e($admin->id); ?>" <?php echo e($sales_session->admin_id == $admin->id ? 'selected' : ''); ?>>
              <?php echo e($admin->userName); ?>

              <?php if($admin->activeSalesSession): ?>
                <?php echo e(__('sessions.has_active_shift')); ?>

              <?php endif; ?>
            </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <option value="" disabled><?php echo e(__('sessions.no_admins')); ?></option>
            <?php endif; ?>
          </select>
        </div>
        <div class="input-group sm mt-2">
          <label class="input-group-text" for="monybox_id"><?php echo e(__('sessions.monyboxes')); ?></label>
          <select class="form-select form-control sm py-0" name="monybox_id" id="monybox_id" required>
            <?php $__currentLoopData = $monyBoxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monyBox): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($monyBox->id); ?>" <?php echo e($sales_session->monybox_id == $monyBox->id ? 'selected' : ''); ?>>
              <?php echo e($monyBox->name); ?>

              <?php if($monyBox->activeSalesSession): ?>
                <?php echo e(__('sessions.box_has_active_sales_session')); ?>

              <?php endif; ?>
            </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
          <label class="input-group-text" for="notes"><?php echo e(__('sessions.notes')); ?></label>
          <input type="text" class="form-control sm" name="notes" id="notes" value="<?php echo e(old('notes', $sales_session->notes)); ?>">

          <label class="input-group-text" for="opening_balance"><?php echo e(__('sessions.opening_balance')); ?></label>
          <input type="number" class="form-control sm" name="opening_balance" id="opening_balance" value="<?php echo e(old('opening_balance', $sales_session->opening_balance)); ?>">

          <button type="reset" class="input-group-text btn py-0 btn-outline-secondary"
            data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('sessions.reset_form')); ?>">
            <i class="fas fa-undo me-1"></i> <?php echo e(__('sessions.reset')); ?>

          </button>
          <button type="submit" class="input-group-text btn py-0 btn-primary" data-bs-toggle="tooltip"
            data-bs-placement="top" title="<?php echo e(__('sessions.save_shift_changes')); ?>">
            <i class="fas fa-save me-1"></i> <?php echo e(__('sessions.update')); ?>

          </button>
        </div>
      </form>
    </div>
  </div>
</fieldset>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/sales-session/edit.blade.php ENDPATH**/ ?>