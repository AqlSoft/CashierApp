

<?php $__env->startSection('contents'); ?>
<div class="container">
    <h2 class="my-4">Restaurant Hall </h2>
    
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="bg-light">
                <tr>
                    <th>Order No </th>
                    <th>issued</th>
                    <th>Wait No</th>
                    <th>Processing time</th>
                    <th>status</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($order->table->number ?? '--'); ?>#<?php echo e($order->order_sn); ?></td>
                    <td><?php echo e($order->created_at->diffForHumans()); ?></td>
                    <td><?php echo e($order->wait_no); ?></td>
                    <td></td>

                  
                    <td>
                        <span class="badge 
                            <?php if($order->status == \App\Models\Order::ORDER_PENDING): ?> bg-warning
                            <?php elseif($order->status == \App\Models\Order::ORDER_IN_PROGRESS): ?> bg-info
                            <?php elseif($order->status == \App\Models\Order::ORDER_RATED): ?> bg-success
                            <?php endif; ?>">
                            <?php echo e(\App\Models\Order::getStatuses()[$order->status] ?? ''); ?>

                        </span>
                    </td>
                    
                    
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center">لا توجد طلبات حالية</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/monitors/restaurant-hall.blade.php ENDPATH**/ ?>