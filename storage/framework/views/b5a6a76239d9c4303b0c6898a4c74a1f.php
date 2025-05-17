<?php $__env->startSection('contents'); ?>
<h2 class="mt-4 pb-2" style="border-bottom: 1px solid #dedede">
  <i class="fa fa-edit px-1"></i> <?php echo e(__('clients.edit_client_info')); ?>

</h2>
<fieldset class="mt-2 mb-4 mx-0 mb-0 shadow-sm">
  <div class="row">
    <div class="card-body">
      <form action="<?php echo e(route('update-client-info')); ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo e($client->id); ?>">
        <?php echo csrf_field(); ?>
        <div class="input-group mb-2">
          <label class="input-group-text text-muted" for="vat_number">
            <i class="fa fa-tag px-2"></i><?php echo e(__('clients.vat_number')); ?>

          </label>
          <input type="text" class="form-control" name="vat_number"
            value="<?php echo e(old('vat_number', $client->vat_number)); ?>" id="vat_number">
          <label class="input-group-text text-muted" for="name">
            <i class="fa fa-sticky-note px-2"></i><?php echo e(__('clients.client_name')); ?>

          </label>
          <input type="text" class="form-control" name="name" id="name"
            value="<?php echo e(old('name', $client->name)); ?>">
        </div>
        <div class="input-group mt-2">
          <label class="input-group-text text-muted" for="phone">
            <i class="fa fa-sticky-note px-2"></i><?php echo e(__('clients.phone_number')); ?>

          </label>
          <input type="text" class="form-control" name="phone" id="phone"
            value="<?php echo e(old('phone', $client->phone)); ?>">
          <label class="input-group-text text-muted" for="email">
            <i class="fa fa-sticky-note px-2"></i>Email
          </label>
          <input type="text" class="form-control" name="email" id="email"
            value="<?php echo e(old('email', $client->email)); ?>">
          <label class="input-group-text" for="address"><?php echo e(__('clients.address')); ?></label>
          <input type="text" class="form-control" name="address" id="address"
            value="<?php echo e(old('address', $client->address)); ?>">
          <button type="reset" class="input-group-text btn py-0 btn-outline-secondary"
            data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('clients.reset')); ?>">
            <i class="fas fa-undo me-1"></i> <?php echo e(__('clients.reset')); ?>

          </button>
          <button type="submit" class="input-group-text btn py-0 btn-primary" data-bs-toggle="tooltip"
            data-bs-placement="top" title="<?php echo e(__('clients.update')); ?>">
            <i class="fas fa-save me-1"></i> <?php echo e(__('clients.update')); ?>

          </button>
        </div>
      </form>
    </div>
  </div>
</fieldset>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/clients/edit.blade.php ENDPATH**/ ?>