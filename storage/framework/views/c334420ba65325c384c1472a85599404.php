

<?php $__env->startSection('contents'); ?>
<div class="container">
  <h2 class="my-4"><?php echo e(__('restaurant-hall.restaurant_hall')); ?></h2>

  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead class="bg-light">
        <tr>
          <th><?php echo e(__('restaurant-hall.order_no')); ?></th>
          <th><?php echo e(__('restaurant-hall.issued')); ?></th>
          <th><?php echo e(__('restaurant-hall.wait_time')); ?></th>
          <th><?php echo e(__('restaurant-hall.processing_time')); ?></th>
          <th><?php echo e(__('restaurant-hall.status')); ?></th>
        </tr>
      </thead>
      <tbody>
      <?php
        $cumulativeWaitTime = 0;
      ?>

      <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php
            // تحويل وقت المعالجة من تنسيق time إلى دقائق
            $processingTimeMinutes = 30; // قيمة افتراضية 30 دقيقة

            // التصحيح: استخدام $order['max_processing_time'] بدلاً من maxProcessingTime
            if (!empty($order['max_processing_time'])) {
                $timeParts = explode(':', $order['max_processing_time']);

                // التحقق من وجود 3 أجزاء (ساعات، دقائق، ثواني)
                if (count($timeParts) >= 3) {
                    $hours = (int)($timeParts[0] ?? 0);
                    $minutes = (int)($timeParts[1] ?? 0);
                    $seconds = (int)($timeParts[2] ?? 0);
                    $processingTimeMinutes = ($hours * 60) + $minutes + round($seconds / 60);
                }
                // إذا كان التنسيق مختلفاً (مثل دقائق فقط)
                elseif (is_numeric($order['max_processing_time'])) {
                    $processingTimeMinutes = (int)$order['max_processing_time'];
                }
            }

            // حساب وقت الانتظار التراكمي
            $currentWaitTime = $cumulativeWaitTime + $processingTimeMinutes;
            $cumulativeWaitTime = $currentWaitTime;

            // تنسيق الوقت للعرض
            $displayWaitTime = floor($currentWaitTime / 60) . 'h ' . ($currentWaitTime % 60) . 'm';
            $displayProcessingTime = floor($processingTimeMinutes / 60) . 'h ' . ($processingTimeMinutes % 60) . 'm';
        ?>

        <tr>
          <td><?php echo e($order['table']['number'] ??'--'); ?>#<?php echo e($order['wait_no']??'N/A'); ?></td>
          <td><?php echo e($order['created_at']); ?></td>
          <td><?php echo e($displayWaitTime); ?> </td>
          <td><?php echo e($displayProcessingTime); ?> </td>
          <td>
            <span class="badge 
                    <?php if($order['status'] == \App\Models\Order::ORDER_PENDING): ?> bg-warning
                    <?php elseif($order['status'] == \App\Models\Order::ORDER_IN_PROGRESS): ?> bg-info
                    <?php elseif($order['status'] == \App\Models\Order::ORDER_ON_DELIVERY): ?> bg-success
                    <?php endif; ?>">
              <?php echo e(\App\Models\Order::getStatuses()[$order['status']] ?? ''); ?>

            </span>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
          <td colspan="6" class="text-center"><?php echo e(__('restaurant-hall.no_current_orders')); ?></td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/monitors/restaurant-hall.blade.php ENDPATH**/ ?>