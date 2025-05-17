<?php $__env->startSection('contents'); ?>
<h2 class="mt-4 pb-2" style="border-bottom: 1px solid #dedede">
  <i class="fa fa-edit px-1"></i> <?php echo e(__('orders.update_order_status')); ?>

</h2>
<fieldset class="mt-2 mb-4 mx-0 mb-0 shadow-sm">

  <div class="row">
    <div class="card-body">
      <form action="<?php echo e(route('update-order-info')); ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo e($order->id); ?>">
        <?php echo csrf_field(); ?>
        <div class="input-group mb-2">
          <label class="input-group-text" for="order_sn"><?php echo e(__('orders.order_sn')); ?></label>
          <input type="number" class="form-control sm" name="order_sn" id="order_sn" value="<?php echo e($order->order_sn); ?>" disabled>
          <label class="input-group-text" for="status"><?php echo e(__('orders.status')); ?></label>
          <select class="form-select form-control sm py-0" name="status" id="status">
            <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($key); ?>" <?php echo e($order->status == $key ? 'selected' : ''); ?>><?php echo e($value); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
          <button type="reset" class="input-group-text btn py-0 btn-outline-secondary"
            data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('orders.reset_form')); ?>">
            <i class="fas fa-undo me-1"></i> <?php echo e(__('orders.reset')); ?>

          </button>
          <button type="submit" class="input-group-text btn py-0 btn-primary" data-bs-toggle="tooltip"
            data-bs-placement="top" title="<?php echo e(__('orders.save_order_info_changes')); ?>">
            <i class="fas fa-save me-1"></i> <?php echo e(__('orders.update')); ?>

          </button>
        </div>
      </form>
    </div>
  </div>
</fieldset>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/orders/edit.blade.php ENDPATH**/ ?>