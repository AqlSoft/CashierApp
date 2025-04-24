

<?php $__env->startSection('contents'); ?>
<div class="container">
    <h2 class="my-4">Restaurant Hall</h2>
    
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="bg-light">
                <tr>
                    <th>Order No</th>
                    <th>Issued</th>
                    <th>Wait No</th>
                    <th>Processing time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="orders-table-body">
                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr data-order-id="<?php echo e($order->id); ?>" data-status="<?php echo e($order->status); ?>">
                    <td><?php echo e($order->table->number ?? '--'); ?>#<?php echo e($order->order_sn); ?></td>
                    <td><?php echo e($order->created_at->diffForHumans()); ?></td>
                    <td><?php echo e($order->wait_no); ?></td>
                    <td class="processing-time">
                        <?php if($order->status == \App\Models\Order::ORDER_PENDING): ?>
                            1:00
                        <?php elseif($order->status == \App\Models\Order::ORDER_IN_PROGRESS): ?>
                            <span class="processing-timer">1:00</span>
                        <?php else: ?>
                            Ready
                        <?php endif; ?>
                    </td>
                    <td class="order-status">
                        <span class="badge 
                            <?php if($order->status == \App\Models\Order::ORDER_PENDING): ?> bg-warning
                            <?php elseif($order->status == \App\Models\Order::ORDER_IN_PROGRESS): ?> bg-info
                            <?php elseif($order->status == \App\Models\Order::ORDER_READY): ?> bg-success
                            <?php endif; ?>">
                            <?php echo e(\App\Models\Order::getStatuses()[$order->status] ?? ''); ?>

                        </span>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center">لا توجد طلبات حالية</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // تعريف الثوابت لتوافق الـ PHP
    const ORDER_PENDING = 'pending';
    const ORDER_IN_PROGRESS = 'in_progress';
    const ORDER_READY = 'ready';
    
    // دالة لتحويل الثواني إلى تنسيق دقائق:ثواني
    function formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = seconds % 60;
        return `${mins}:${secs.toString().padStart(2, '0')}`;
    }
    
    // دالة لبدء معالجة الطلب
    function startOrderProcessing(orderId) {
        const row = document.querySelector(`tr[data-order-id="${orderId}"]`);
        if (!row) return;
        
        // تحديث الحالة إلى "جاري التحضير"
        row.setAttribute('data-status', ORDER_IN_PROGRESS);
        row.querySelector('.order-status').innerHTML = `
            <span class="badge bg-info">Processing</span>
        `;
        
        // بدء المؤقت
        let timeLeft = 60; // 60 ثانية = 1 دقيقة
        row.querySelector('.processing-time').innerHTML = `
            <span class="processing-timer">${formatTime(timeLeft)}</span>
        `;
        
        const timerInterval = setInterval(() => {
            timeLeft--;
            const timerElement = row.querySelector('.processing-timer');
            if (timerElement) {
                timerElement.textContent = formatTime(timeLeft);
            }
            
            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                completeOrderProcessing(orderId);
            }
        }, 1000);
    }
    
    // دالة لإكمال معالجة الطلب
    function completeOrderProcessing(orderId) {
        const row = document.querySelector(`tr[data-order-id="${orderId}"]`);
        if (!row) return;
        
        row.setAttribute('data-status', ORDER_READY);
        row.querySelector('.processing-time').innerHTML = 'Ready';
        row.querySelector('.order-status').innerHTML = `
            <span class="badge bg-success">Ready</span>
        `;
        
        // هنا يمكنك إضافة كود AJAX لتحديث الحالة في الخادم إذا لزم الأمر
    }
    
    // بدء معالجة جميع الطلبات الجديدة
    function processAllPendingOrders() {
        const pendingOrders = document.querySelectorAll(`tr[data-status="${ORDER_PENDING}"]`);
        
        pendingOrders.forEach(orderRow => {
            const orderId = orderRow.getAttribute('data-order-id');
            
            // نستخدم تأخيرًا عشوائيًا قصيرًا بين الطلبات لتجنب الحمل المفاجئ
            const randomDelay = Math.floor(Math.random() * 2000); // تأخير حتى 2 ثانية
            
            setTimeout(() => {
                startOrderProcessing(orderId);
            }, randomDelay);
        });
    }
    
    // بدء المعالجة عند تحميل الصفحة
    processAllPendingOrders();
    
    // محاكاة إضافة طلب جديد (للتجربة فقط)
    // يمكنك حذف هذا الجزء في التطبيق الفعلي
    function simulateNewOrder() {
        const tableBody = document.getElementById('orders-table-body');
        const newOrderId = Date.now(); // استخدام الطابع الزمني كمعرف مؤقت
        
        const newRow = document.createElement('tr');
        newRow.setAttribute('data-order-id', newOrderId);
        newRow.setAttribute('data-status', ORDER_PENDING);
        newRow.innerHTML = `
            <td>T${Math.floor(Math.random()*10)}#${Math.floor(1000 + Math.random() * 9000)}</td>
            <td>Just now</td>
            <td>W${Math.floor(10 + Math.random() * 90)}</td>
            <td class="processing-time">1:00</td>
            <td class="order-status">
                <span class="badge bg-warning">Pending</span>
            </td>
        `;
        
        tableBody.prepend(newRow);
        
        // بدء معالجة الطلب الجديد بعد 3 ثواني
        setTimeout(() => {
            startOrderProcessing(newOrderId);
        }, 3000);
    }
    
    // إضافة طلب جديد كل 10 ثواني (للتجربة فقط)
    // setInterval(simulateNewOrder, 10000);
});
</script>

<style>
.processing-timer {
    font-weight: bold;
    color: #fff;
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/monitors/restaurant-hall.blade.php ENDPATH**/ ?>