<?php $__env->startSection('contents'); ?>
<div class="container-fluid py-4">
    <div class="row text-center g-4">
        <!-- Pending Column -->
        <div class="col-md-4">
            <div class="box-border bg-opacity-25 rounded p-3 h-100">
                <h3 class="mb-3 text-black  head-border   pb-1">Pending</h3>
                <?php $__empty_1 = true; $__currentLoopData = $orders->where('status', \App\Models\Order::ORDER_PENDING); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="card bg--warning mb-1 shadow-sm border-warning   rounded border w-100">
                    <div class="card-body">
                        <h4 class="card-title">#<?php echo e($order->wait_no); ?></h4>
                        <div class="small text-muted">Created: <?php echo e($order->created_at->format('H:i')); ?></div>
                        <div class="mt-2 text-secondary small">
                            Est. to Processing: <?php echo e($order->processing_time); ?> minutes
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-muted alret alert-warning">No Pending Orders</div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Processing Column -->
        <div class="col-md-4">
            <div class="box-border  bg-opacity-25 rounded p-3 h-100">
                <h3 class="mb-3 text-black  head-border   pb-1">Processing</h3>
                <?php $__empty_1 = true; $__currentLoopData = $orders->where('status',  \App\Models\Order::ORDER_IN_PROGRESS); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="card mb-1 bg--info shadow-sm border-info   rounded border w-100">
                    <div class="card-body">
                        <h4 class="card-title">#<?php echo e($order->wait_no); ?></h4>
                        <div class="small text-muted">Created: <?php echo e($order->created_at->format('H:i')); ?></div>
                        <div class="mt-2 text-secondary small">
                            Est. to Processing: <?php echo e($order->processing_time); ?> minutes
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-muted alert alert-info">No Processing Orders</div>
                <?php endif; ?>
            </div>
        </div>

        <!-- On-Delivery Column -->
        <div class="col-md-4">
            <div class=" box-border bg-opacity-25 rounded p-3 h-100">
                <h3 class="mb-3 text-black  head-border   pb-1">On-Delivery</h3>
                <?php $__empty_1 = true; $__currentLoopData = $orders->where('status', \App\Models\Order::ORDER_ON_DELIVERY); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="card bg--primary rounded border mb-1 border-primary shadow-sm  w-100">
                    <div class="card-body">
                        <h4 class="card-title">#<?php echo e($order->wait_no); ?></h4>
                        <div class="mb-2"><?php echo e($order->customer->name ?? '-'); ?></div>
                        <div class="small text-muted">Started: <?php echo e($order->updated_at->format('H:i')); ?></div>
                        <div class="mt-2">
                            <span class="badge bg-primary">
                                <?php echo e(\App\Models\Order::getStatuses()[$order->status] ?? ''); ?>

                            </span>
                        </div>
                        <div class="mt-2 text-secondary small">
                            Est. to Complete:
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
                <div class="text-muted alert alert-primary">No Orders On-Delivery</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<style>
  .box-border {
    border: 1pt solid #dee2e6;
  }

  .head-border {
    border-bottom: 1px solid #dedede;

  }

  .card-title {
    font-size: 1.5rem;
    font-weight: bold;
  }

  .card {
    font-size: 1.3rem;
  }

  .bg--info {
    background-color: rgba(13, 202, 240, 0.21) !important;
  }

  .bg--primary {
    background-color: rgba(13, 110, 253, 0.21) !important;
  }

  .bg--warning {
    background-color: rgba(255, 193, 7, 0.21) !important;
  }

  @media (max-width: 768px) {
    .card-title {
      font-size: 1.3rem;
    }

    .card {
      font-size: 1rem;
    }
  }
</style>
<?php echo $__env->make('layouts.monitors', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/monitors/waiting.blade.php ENDPATH**/ ?>