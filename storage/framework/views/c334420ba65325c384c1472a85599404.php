

<?php $__env->startSection('contents'); ?>
<div class="container">
    <h2 class="my-4">Restaurant Hall </h2>
    
    <div class="table-responsive">
    <table class="table table-bordered table-hover">
    <thead class="bg-light">
        <tr>
            <th>Order No</th>
            <th>Issued</th>
            <th>Wait Time</th>
            <th>Processing time</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $cumulativeWaitTime = 0; // متغير لتخزين مجموع أوقات الانتظار التراكمية
        ?>
        
        <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php
            // تحويل وقت المعالجة من تنسيق time إلى دقائق
            $processingTimeMinutes = 0;
            if ($order->processing_time) {
                list($hours, $minutes, $seconds) = explode(':', $order->processing_time);
                $processingTimeMinutes = ($hours * 60) + $minutes + ($seconds / 60);
            }
            
            // حساب وقت الانتظار للطلب الحالي
            $currentWaitTime = $cumulativeWaitTime + $processingTimeMinutes;
            
            // تحديث التراكمي لاستخدامه في الطلبات التالية
            $cumulativeWaitTime = $currentWaitTime;
            
            // تنسيق العرض للوقت
            $displayWaitTime = floor($currentWaitTime / 60) . 'h ' . ($currentWaitTime % 60) . 'm';
            $displayProcessingTime = floor($processingTimeMinutes / 60) . 'h ' . ($processingTimeMinutes % 60) . 'm';
        ?>
        
        <tr>
            <td><?php echo e($order->table->number ?? '--'); ?>#<?php echo e($order->wait_no); ?></td>
            <td><?php echo e($order->created_at->diffForHumans()); ?></td>
            <td><?php echo e($displayWaitTime); ?></td>
            <td><?php echo e($displayProcessingTime); ?></td>
            <td>
                <span class="badge 
                    <?php if($order->status == \App\Models\Order::ORDER_PENDING): ?> bg-warning
                    <?php elseif($order->status == \App\Models\Order::ORDER_IN_PROGRESS): ?> bg-info
                    <?php elseif($order->status == \App\Models\Order::ORDER_ON_DELIVERY): ?> bg-success
                    <?php endif; ?>">
                    <?php echo e(\App\Models\Order::getStatuses()[$order->status] ?? ''); ?>

                </span>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="6" class="text-center">No current orders</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/monitors/restaurant-hall.blade.php ENDPATH**/ ?>