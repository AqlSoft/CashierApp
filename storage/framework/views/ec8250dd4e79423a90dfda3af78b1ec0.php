<?php $__env->startSection('title'); ?>
<?php echo e(__('kitchen.kitchen_display')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<div class="container-fluid py-4">
  <div class="row text-center g-4">
    <div class="col-md-4">
      <div class="box-border bg-opacity-25 rounded p-3 h-100">
        <h3 class="mb-3 text-black head-border pb-1"><?php echo e(__('kitchen.pending')); ?></h3>
        <?php $__empty_1 = true; $__currentLoopData = $orders->where('status', \App\Models\Order::ORDER_PENDING); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="card bg--warning mb-1 shadow-sm border-warning rounded border w-100">
          <div class="card-body">
            <h4 class="card-title">#<?php echo e($order->wait_no); ?></h4>
            <div class="small text-muted"><?php echo e(__('kitchen.created')); ?>: <?php echo e($order->created_at->format('H:i')); ?></div>
            <form method="POST" action="<?php echo e(route('admin.kitchen.order.pick', $order->id)); ?>" id="pickOrderForm<?php echo e($order->id); ?>">
              <?php echo csrf_field(); ?>
              <button type="button" class="btn btn-warning btn-sm mt-2"
                onclick="
                if(confirm('<?php echo e(__('kitchen.confirm_take_order')); ?>')) {
                    document.getElementById('pickOrderForm<?php echo e($order->id); ?>').submit();
                    $('#orderDetailsModal<?php echo e($order->id); ?>').modal('show');  }  ">
                <?php echo e(__('kitchen.take_order')); ?>

              </button>
            </form>
            <div class="mt-2 text-secondary small">
              <?php echo e(__('kitchen.est_to_processing')); ?>: <?php echo e(\Carbon\Carbon::parse($order->processing_time)->format('H:i')); ?> <?php echo e(__('kitchen.minutes')); ?>

            </div>
          </div>
        </div>
        <div class="modal fade" id="orderDetailsModal<?php echo e($order->id); ?>" tabindex="-1" aria-labelledby="orderDetailsModalLabel<?php echo e($order->id); ?>" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
              <div class="modal-header" style="padding: 0.5rem 1rem; border-bottom: 1px solid #dedede;">
                <h1 class="modal-title fs-5" id="orderDetailsModalLabel<?php echo e($order->id); ?>"><?php echo e(__('kitchen.order_details')); ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php echo e(__('kitchen.close')); ?>"></button>
              </div>
              <div class="modal-body">
                <?php echo $__env->make('admin.kitchen.partials.order-details', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('kitchen.close')); ?></button>
                <button type="button" class="btn btn-primary"><?php echo e(__('kitchen.print')); ?></button>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="text-muted alert alert-warning"><?php echo e(__('kitchen.no_pending_orders')); ?></div>
        <?php endif; ?>
      </div>
    </div>
    <div class="col-md-4">
      <div class="box-border bg-opacity-25 rounded p-3 h-100">
        <h3 class="mb-3 text-black head-border pb-1"><?php echo e(__('kitchen.processing')); ?></h3>
        <?php $__empty_1 = true; $__currentLoopData = $orders->where('status', \App\Models\Order::ORDER_IN_PROGRESS); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="card mb-1 bg--info shadow-sm border-info rounded border w-100">
          <div class="card-body">
            <h4 class="card-title">#<?php echo e($order->wait_no); ?></h4>
            <div class="small text-muted"><?php echo e(__('kitchen.created')); ?>: <?php echo e($order->created_at->format('H:i')); ?></div>
            <form method="POST" action="<?php echo e(route('admin.kitchen.order.complete', $order->id)); ?>">
              <?php echo csrf_field(); ?>
              <button type="submit" class="btn btn-info btn-sm mt-2"
                onclick="return confirm('<?php echo e(__('kitchen.confirm_deliver_order')); ?>')">
                <?php echo e(__('kitchen.deliver_order')); ?>

              </button>
            </form>
            <div class="mt-2 text-secondary small">
              <?php echo e(__('kitchen.est_to_processing')); ?>: <?php echo e(\Carbon\Carbon::parse($order->processing_time)->format('H:i')); ?> <?php echo e(__('kitchen.minutes')); ?>

            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="text-muted alert alert-info"><?php echo e(__('kitchen.no_processing_orders')); ?></div>
        <?php endif; ?>
      </div>
    </div>
    <div class="col-md-4">
      <div class="box-border bg-opacity-25 rounded p-3 h-100">
        <h3 class="mb-3 text-black head-border pb-1"><?php echo e(__('kitchen.on_delivery')); ?></h3>
        <?php $__empty_1 = true; $__currentLoopData = $orders->where('status', \App\Models\Order::ORDER_ON_DELIVERY); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="card bg--primary rounded border mb-1 border-primary shadow-sm w-100">
          <div class="card-body">
            <h4 class="card-title">#<?php echo e($order->wait_no); ?></h4>
            <div class="mb-2"><?php echo e($order->customer->name ?? '-'); ?></div>
            <div class="small text-muted"><?php echo e(__('kitchen.started')); ?>: <?php echo e($order->updated_at->format('H:i')); ?></div>
            <div class="mt-2">
              <span class="badge bg-primary">
                <?php echo e(\App\Models\Order::getStatuses()[$order->status] ?? ''); ?>

              </span>
            </div>
            <div class="mt-2 text-secondary small">
              <?php echo e(__('kitchen.est_to_complete')); ?>:
              <span>
                <?php
                $eta = $order->updated_at->addMinutes(7)->diffForHumans(null, true);
                ?>
                <?php echo e($eta); ?>

              </span>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="text-muted alert alert-primary"><?php echo e(__('kitchen.no_on_delivery_orders')); ?></div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.monitors', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/kitchen/kitchen.blade.php ENDPATH**/ ?>