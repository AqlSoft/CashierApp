
<?php $__env->startSection('contents'); ?>
<h2 class="mt-4 pb-2" style="border-bottom: 1px solid #dedede"><i class="fa fa-edit px-1"></i> Update Order Status  </h2>
<fieldset class="mt-2 mb-4 mx-0 mb-0 shadow-sm">

  <div class="row">
    <div
      class=" card-body ">
      <form action="<?php echo e(route('update-order-info')); ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo e($order->id); ?>">
        <?php echo csrf_field(); ?>
        <div class="input-group  mb-2">
        <label class="input-group-text" for="serial_number">Serial Number</label>
          <input type="number" class="form-control sm" name="serial_number" id="serial_number" value="<?php echo e($order->serial_number); ?>" disabled>
          <label class="input-group-text" for="admin_id">Status</label>
            <select class="form-select form-control sm py-0" name="status" id="status">
            <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\kashear_project\resources\views/admin/orders/edit.blade.php ENDPATH**/ ?>