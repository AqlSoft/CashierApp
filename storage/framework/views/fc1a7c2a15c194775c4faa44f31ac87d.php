<?php $__env->startSection('contents'); ?>
<h2 class="mt-4 pb-2" style="border-bottom: 1px solid #dedede">
  <i class="fa fa-edit px-1"></i> <?php echo e(__('monyBoxes.update_box')); ?>

</h2>
<fieldset class="mt-2 mb-4 mx-0 mb-0 shadow-sm">

  <div class="row">
    <div class="card-body">
      <form action="<?php echo e(route('update-monyBox-info')); ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo e($m_box->id); ?>">
        <?php echo csrf_field(); ?>
        <div class="input-group sm mb-2">
          <label class="input-group-text" for="name"><?php echo e(__('monyBoxes.name')); ?></label>
          <input type="text" class="form-control sm" name="name" id="name" value="<?php echo e(old('name', $m_box->name)); ?>">
          <label class="input-group-text" for="date"><?php echo e(__('monyBoxes.date')); ?></label>
          <input type="text" value="<?php echo e(old('date', $m_box->date)); ?>" class="fc-datepicker form-control sm" name="date" id="date">
        </div>
        <div class="input-group sm mt-2">
          <label class="input-group-text" for="last_isal_exhcange"><?php echo e(__('monyBoxes.last_exchange')); ?></label>
          <input type="text" class="form-control sm" name="last_isal_exhcange" id="last_isal_exhcange" value="<?php echo e(old('last_isal_exhcange', $m_box->last_isal_exhcange)); ?>">
          <label class="input-group-text" for="last_isal_collect"><?php echo e(__('monyBoxes.last_collection')); ?></label>
          <input type="text" class="form-control sm" name="last_isal_collect" id="last_isal_collect" value="<?php echo e(old('last_isal_collect', $m_box->last_isal_collect)); ?>">
          <button type="reset" class="input-group-text btn py-0 btn-outline-secondary"
            data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('monyBoxes.reset_form')); ?>">
            <i class="fas fa-undo me-1"></i> <?php echo e(__('monyBoxes.reset')); ?>

          </button>
          <button type="submit" class="input-group-text btn py-0 btn-primary" data-bs-toggle="tooltip"
            data-bs-placement="top" title="<?php echo e(__('monyBoxes.save_box_changes')); ?>">
            <i class="fas fa-save me-1"></i> <?php echo e(__('monyBoxes.update')); ?>

          </button>
        </div>
      </form>
    </div>
  </div>
</fieldset>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/monyboxes/edit.blade.php ENDPATH**/ ?>