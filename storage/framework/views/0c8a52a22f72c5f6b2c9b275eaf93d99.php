<?php $__env->startSection('contents'); ?>
<div class="container-fluid">
  <div class="row">

    <div class="col-md-12">
      <div id="products-container">

        <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede"><?php echo e(__('clients.client_list')); ?></h1>
        <!-- هنا سيتم اضافة العملاء -->
        <div class="row">
          <div class="col col col-12 pt-3">
            <div class="card card-body">
              <form action="/admin/clients/store" method="POST">
                <?php echo csrf_field(); ?>
                <div class="input-group sm mb-2 flex-wrap">
                  <div class="d-flex flex-column me-2" style="min-width:180px;">
                    <label class="input-group-text" for="vat_number"><?php echo e(__('clients.vat_number')); ?></label>
                    <input type="number" class="form-control sm <?php $__errorArgs = ['vat_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="vat_number" id="vat_number" value="<?php echo e(old('vat_number')); ?>">
                    <?php $__errorArgs = ['vat_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback d-block" style="font-size: 90%;"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="d-flex flex-column me-2" style="min-width:180px;">
                    <label class="input-group-text" for="name"><?php echo e(__('clients.client_name')); ?></label>
                    <input type="text" class="form-control sm <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" id="name" value="<?php echo e(old('name')); ?>">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback d-block" style="font-size: 90%;"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="d-flex flex-column me-2" style="min-width:180px;">
                    <label class="input-group-text" for="phone"><?php echo e(__('clients.phone_number')); ?></label>
                    <input type="number" class="form-control sm <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone" id="phone" value="<?php echo e(old('phone')); ?>">
                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback d-block" style="font-size: 90%;"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="d-flex flex-column me-2" style="min-width:180px;">
                    <label class="input-group-text" for="address"><?php echo e(__('clients.address')); ?></label>
                    <input type="text" class="form-control sm <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="address" id="address" value="<?php echo e(old('address')); ?>">
                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback d-block" style="font-size: 90%;"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="align-self-end ms-2">
                    <button type="submit" class="py-0 btn btn-primary"><?php echo e(__('clients.save_client')); ?></button>
                    <button type="reset" class="py-0 btn btn-secondary" id="add-item"><?php echo e(__('clients.reset')); ?></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="py-2" style="border-bottom: 1px solid #dedede"></div>
        </div>
        <!-- هنا سيتم عرض العملاء -->
        <table class="table table-striped  mt-2">
          <thead>
            <tr>
              <th>#</th>
              <th><?php echo e(__('clients.vat_number')); ?></th>
              <th><?php echo e(__('clients.client_name')); ?></th>
              <th><?php echo e(__('clients.phone_number')); ?></th>
              <th><?php echo e(__('clients.address')); ?></th>
              <th><?php echo e(__('clients.control')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php $counter = 0; ?>
            <?php if(count($clients)): ?>
            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e(++$counter); ?></td>
              <td><?php echo e($client->vat_number); ?></td>
              <td><?php echo e($client->name); ?></td>
              <td><?php echo e($client->phone); ?></td>
              <td><?php echo e($client->address); ?></td>
              <td>
                <a class="btn btn-sm py-0" href="<?php echo e(route('view-client-info', $client->id)); ?>"><i
                    class="fas fa-eye text-success" title="<?php echo e(__('clients.view_details')); ?>"></i></a>
                <a class="btn btn-sm py-0" href="<?php echo e(route('edit-client-info', $client->id)); ?>"><i
                    class="fa fa-edit text-primary" title="<?php echo e(__('clients.edit')); ?>"></i></a>
                <a class="btn btn-sm py-0" onclick="if(!confirm('You are about to delete a order, are you sure!?.')){return false}"
                  title="<?php echo e(__('clients.delete')); ?>" href="<?php echo e(route('destroy-client-info', $client->id)); ?>"><i
                    class="fa fa-trash text-danger"></i></a>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
              <td colspan="7"><?php echo e(__('clients.no_clients')); ?></td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/clients/index.blade.php ENDPATH**/ ?>