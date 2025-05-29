<?php $__env->startSection('contents'); ?>
<div class="container-fluid">
  <div class="row">

    <div class="col-md-12">
      <div id="products-container">

        <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede"><?php echo e(__('orders.orders-list')); ?>

          <a class="ms-3 add-icon" data-bs-toggle="collapse" data-bs-target="#addOrderForm" aria-expanded="false"
            aria-controls="addOrderForm">
            <i data-bs-toggle="tooltip" title="<?php echo e(__('orders.add_new_order')); ?>" class="fa fa-plus"></i>
          </a>
        </h1>

        <!-- هنا سيتم اضافة الطلبات -->
        <div class="row">
          <div class="col col-12 collapse<?php echo e($errors->any() ? 'show' : ''); ?>  pt-3" id="addOrderForm">
            <div class="row">
              <div class="col ">
                <div class="card card-body">
                  <form action="/admin/orders/store" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="input-group sm mb-2">
                      <label class="input-group-text" for="order_sn"><?php echo e(__('orders.order_sn')); ?></label>
                      <input type="number" class="form-control sm <?php $__errorArgs = ['order_sn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="order_sn" id="order_sn"
                        value="<?php echo e(old('order_sn', $order_SN)); ?>">
                    

                      <label class="input-group-text" for="customer_id"> <?php echo e(__('orders.client')); ?></label>
                      <select class="form-select  form-control sm py-0 <?php $__errorArgs = ['customer_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="customer_id"
                        id="customer_id">
                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($customer->id); ?>"
                          <?php echo e(old('customer_id', $defaultCustomer && $customer->id == $defaultCustomer->id ? $customer->id : '') == $customer->id ? 'selected' : ''); ?>>
                          <?php echo e($customer->name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    
                      <label class="input-group-text" for="customer_id">
                        <a class="btn btn-sm py-0" href="#"
                          data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                          <i class="fa-solid fa-user-plus" title="<?php echo e(__('orders.view_details')); ?>"></i></a>
                      </label>
                      <label class="input-group-text" for="order_date"><?php echo e(__('orders.order_date')); ?></label>
                      <input type="text" value="<?php echo e(old('order_date', date('Y-m-d'))); ?>" placeholder="YYYY-MM-DD"
                        class="fc-datepicker form-control sm <?php $__errorArgs = ['order_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="order_date"
                        id="order_date">
                    
                    </div>
                    <div class="input-group sm mt-2">
                      <label class="input-group-text" for="notes"><?php echo e(__('orders.notes')); ?></label>
                      <input type="text" class="form-control sm <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="notes"
                        id="notes" value="<?php echo e(old('notes')); ?>">
                
                      <div class="input-group-text">
                        <input class="form-check-input mt-0" name="status" type="checkbox"
                          value="1" aria-label="Checkbox for following text input" <?php echo e(old('status') ? 'checked' : ''); ?>>
                      </div>
                      <button type="button" class="input-group-text text-start"><?php echo e(__('orders.active')); ?></button>
                    </div>
                  
                    <div class="input-group d-flex sm mt-2 justify-content-end"
                      style="border-top: 1px solid #aaa">
                      <button type="submit" class="py-0 btn btn-primary p-3 mt-2"><?php echo e(__('orders.save_order')); ?></button>
                      <button type="reset" class="py-0 btn btn-secondary p-3 mt-2"
                        id="add-item"><?php echo e(__('orders.reset')); ?></button>
                    </div>
                      <?php $__errorArgs = ['order_sn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <span class="invalid-feedback d-block"><?php echo e($message); ?></span>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php $__errorArgs = ['customer_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <span class="invalid-feedback d-block"><?php echo e($message); ?></span>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php $__errorArgs = ['order_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <span class="invalid-feedback d-block"><?php echo e($message); ?></span>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <span class="invalid-feedback d-block"><?php echo e($message); ?></span>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </form>
                </div>
              </div>

            </div>
            <div class="py-2" style="border-bottom: 1px solid #dedede"></div>
          </div>
        </div>
        <!-- هنا سيتم عرض المنتجات -->
        <table class="table table-striped  mt-3">
          <thead>
            <tr>
              <th> #</th>
              <th><?php echo e(__('orders.order_sn')); ?></th>
              <th><?php echo e(__('orders.client_name')); ?></th>
              <th><?php echo e(__('orders.order_date')); ?></th>
              <th><?php echo e(__('orders.status')); ?></th>
              <th><?php echo e(__('orders.control')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $counter = 0;
            ?>
            <?php if(count($orders)): ?>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e(++$counter); ?></td>
              <td><?php echo e($order->order_sn); ?></td>
              <td><?php echo e(@$order->customer->name); ?></td>
              <td><?php echo e($order->order_date); ?></td>
              <td>
                <?php if($order->status == 1): ?>
                <span class="badge bg-primary"><?php echo e($status[$order->status]); ?></span>
                <?php elseif($order->status == 2): ?>
                <span class="badge bg-warning"><?php echo e($status[$order->status]); ?></span>
                <?php elseif($order->status == 3): ?>
                <span class="badge bg-secondary"><?php echo e($status[$order->status]); ?></span>
                <?php elseif($order->status == 4): ?>
                <span class="badge bg-info"><?php echo e($status[$order->status]); ?></span>
                <?php elseif($order->status == 5): ?>
                <span class="badge bg-success"><?php echo e($status[$order->status]); ?></span>
                <?php else: ?>
                <span class="badge bg-danger"><?php echo e($status[$order->status]); ?></span>
                <?php endif; ?>
              </td>

              <td>
                <?php if($order->status == 1 || $order->status == 2): ?>
                <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip"
                  title="<?php echo e(__('orders.add_order_item')); ?>"
                  href="<?php echo e(route('add-orderitem', [$order->id])); ?>"><i
                    class="fa fa-square-plus text-success"></i></a>
                <a class="btn btn-sm py-0"
                  href="<?php echo e(route('edit-order-info', $order->id)); ?>"><i
                    class="fa fa-edit text-primary"></i></a>
                <a class="btn btn-sm py-0"
                  onclick="if(!confirm('<?php echo e(__('orders.confirm_archive')); ?>')){return false}"
                  title="<?php echo e(__('orders.archive_order')); ?>"
                  href="<?php echo e(route('destroy-order-info', $order->id)); ?>">
                  <i class="fa fa-trash text-danger"></i></a>
                <?php endif; ?>
                <a class="btn btn-sm py-0"
                  href="<?php echo e(route('view-order-info', $order->id)); ?>"><i
                    class="fas fa-eye text-success" title="<?php echo e(__('orders.view_details')); ?>"></i></a>
                <?php if($order->status == 5): ?>
                <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip"
                  title="<?php echo e(__('orders.print_order')); ?>" href="#"><i
                    class="fa fa-print text-secondary"></i></a>
                <?php endif; ?>
                <?php if($order->status == 0): ?>
                <a class="btn btn-sm py-0"
                  onclick="if(!confirm('<?php echo e(__('orders.confirm_archive')); ?>')){return false}"
                  title="<?php echo e(__('orders.archive_order')); ?>"
                  href="<?php echo e(route('destroy-order-info', $order->id)); ?>"><i
                    class="fa fa-trash text-danger"></i></a>
                <?php endif; ?>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
              <td colspan="7"><?php echo e(__('orders.no_orders_yet')); ?></td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<script>
  var date = $('.fc-datepicker').datepicker({
    dateFormat: 'yy-mm-dd'
  }).val();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>