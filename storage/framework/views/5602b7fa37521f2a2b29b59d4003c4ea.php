<?php $__env->startSection('contents'); ?>
<h2 class="mt-4 pb-2" style="border-bottom: 1px solid #dedede"><i class="fa fa-edit px-1"></i> Update Order Status </h2>
<fieldset class="mt-2 mb-4 mx-0 mb-0 shadow-sm">

  <div class="row">
    <div
      class=" card-body ">
      <form action="<?php echo e(route('update-shift-info')); ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo e($shift->id); ?>">
        <?php echo csrf_field(); ?>
        <div class="input-group sm mb-2">
        <label class="input-group-text" for="start_time">Start Time</label>
        <input type="text" class="form-control sm" name="start_time" id="start_time" value="<?php echo e(old('start_time', $shift)); ?>">
        <!-- <label class="input-group-text" for="start_time">End Time</label>
                      <input type="date" class="form-control sm" name="end_time" id="end_time"> -->
        <label class="input-group-text" for="admin_id"> Admins</label>
        <select class="form-select form-control sm py-0" name="admin_id" id="admin_id">
          <?php $__empty_1 = true; $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <option value="<?php echo e($admin->id); ?>">
            <?php echo e($admin->userName); ?>

            <?php if($admin->activeShift): ?>
            (لديه شفت نشط حالياً)
            <?php endif; ?>
          </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <option value="" disabled>لا يوجد مستخدمين متاحين</option>
          <?php endif; ?>
        </select>
</div>
        <div class="input-group sm mt-2">
          <label class="input-group-text" for="monybox_id"> MonyBoxes</label>
          <select class="form-select form-control sm py-0" name="monybox_id" id="monybox_id" required>
            <?php $__currentLoopData = $monyBoxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monyBox): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($monyBox->id); ?>">
              <?php echo e($monyBox->name); ?>

              <?php if($monyBox->activeShift): ?>
              (يوجد شفت نشط حالياً)
              <?php endif; ?>
            </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
          <label class="input-group-text" for="notes">Notes</label>
          <input type="text" class="form-control sm" name="notes" id="notes" value="<?php echo e(old('notes', $shift)); ?>">

      
        <label class="input-group-text" for="opening_balance">Opening Balance</label>
        <input type="number" class=" form-control sm " name="opening_balance" id="opening_balance" value="<?php echo e(old('opening_balance', $shift)); ?>">

        <button type="reset" class="input-group-text btn py-0 btn-outline-secondary"
          data-bs-toggle="tooltip" data-bs-placement="top" title="Reset form to original values">
          <i class="fas fa-undo me-1"></i> Reset
        </button>
        <button type="submit" class="input-group-text btn py-0 btn-primary" data-bs-toggle="tooltip"
          data-bs-placement="top" title="Save order Info changes">
          <i class="fas fa-save me-1"></i> Update
        </button>
    </div>


  </div>




  </form>
  </div>

  </div>
</fieldset>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\kashear_project\resources\views/admin/shifts/edit.blade.php ENDPATH**/ ?>