

<?php $__env->startSection('contents'); ?>
<style>
    .order-item {
        transition: all 0.3s;
        cursor: pointer;
        border-radius: 5px;
        margin-bottom: 8px;
    }
    .order-item:hover {
        transform: translateX(5px);
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .priority-high {
        border-left: 4px solid #ffc107;
    }
    .priority-vip {
        border-left: 4px solid #dc3545;
    }
    #orders-queue {
        max-height: 80vh;
        overflow-y: auto;
        padding: 10px;
    }
    .status-badge {
        font-size: 0.8rem;
        padding: 0.35em 0.65em;
    }
    .order-time {
        font-size: 0.85rem;
        color: #6c757d;
    }
    .order-customer {
        font-weight: 500;
    }
    .order-items-count {
        font-size: 0.8rem;
    }
    .empty-state {
        text-align: center;
        padding: 30px;
        color: #6c757d;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">طلبات المطبخ المدفوعة</h3>
                    <div>
                        <span class="badge bg-light text-dark me-2">
                            جديدة: <?php echo e($orders->where('status', \App\Models\Order::STATUS_NEW)->count()); ?>

                        </span>
                        <span class="badge bg-light text-dark">
                            قيد التحضير: <?php echo e($orders->where('status', \App\Models\Order::STATUS_IN_PROGRESS)->count()); ?>

                        </span>
                    </div>
                </div>
                <div class="card-body p-0">
                    <?php if($orders->isEmpty()): ?>
                    <div class="empty-state">
                        <i class="fas fa-utensils fa-3x mb-3"></i>
                        <h4>لا توجد طلبات مدفوعة جاهزة للتحضير</h4>
                        <p class="text-muted">سيتم عرض الطلبات هنا بمجرد توفرها</p>
                    </div>
                    <?php else: ?>
                    <div class="list-group" id="orders-queue">
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('kitchen.orders.show', $order)); ?>" 
                           class="list-group-item list-group-item-action order-item
                                  <?php echo e($order->priority == 'high' ? 'priority-high' : ''); ?>

                                  <?php echo e($order->priority == 'vip' ? 'priority-vip' : ''); ?>">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <h5 class="mb-0">الطلب #<?php echo e($order->order_sn); ?></h5>
                                        <span class="badge status-badge 
                                            <?php echo e($order->status == \App\Models\Order::STATUS_NEW ? 'bg-secondary' : 'bg-warning'); ?>">
                                            <?php echo e($statuses[$order->status]); ?>

                                        </span>
                                    </div>
                                    
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="order-time me-2">
                                            <i class="far fa-clock me-1"></i>
                                            <?php echo e($order->created_at->diffForHumans()); ?>

                                        </span>
                                        <?php if($order->customer): ?>
                                        <span class="order-customer">
                                            <i class="far fa-user me-1"></i>
                                            <?php echo e($order->customer->name); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div class="order-items-count">
                                        <i class="fas fa-list-ul me-1"></i>
                                        <?php echo e($order->orderItems->count()); ?> عنصر | فاتورة #<?php echo e($order->invoice->invoice_number); ?>

                                    </div>
                                </div>
                            </div>
                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h3 class="mb-0">إحصائيات الطلبات</h3>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h5>توزيع الطلبات</h5>
                        <canvas id="statusChart" height="200"></canvas>
                    </div>
                    <div>
                        <h5>أحدث الطلبات المكتملة</h5>
                        <ul class="list-group">
                            <?php $__currentLoopData = \App\Models\Order::where('status', \App\Models\Order::STATUS_COMPLETED)
                                ->whereHas('invoice')
                                ->with('invoice')
                                ->latest()
                                ->take(5)
                                ->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <span>#<?php echo e($order->order_sn); ?></span>
                                    <small class="d-block text-muted">فاتورة #<?php echo e($order->invoice->invoice_number); ?></small>
                                </div>
                                <small class="text-muted"><?php echo e($order->updated_at->diffForHumans()); ?></small>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(document).ready(function() {
    // رسم مخطط توزيع الطلبات
    const ctx = document.getElementById('statusChart').getContext('2d');
    const statusChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['جديدة', 'قيد التحضير', 'مكتملة'],
            datasets: [{
                data: [
                    <?php echo e($orders->where('status', \App\Models\Order::STATUS_PENDING)->count()); ?>,
                    <?php echo e($orders->where('status', \App\Models\Order::STATUS_IN_PROGRESS)->count()); ?>,
                    <?php echo e(\App\Models\Order::where('status', \App\Models\Order::STATUS_COMPLETED)->whereHas('invoice')->count()); ?>

                ],
                backgroundColor: [
                    '#6c757d',
                    '#ffc107',
                    '#28a745'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    rtl: true
                }
            }
        }
    });

    // التحديث التلقائي كل دقيقة
    let refreshInterval = setInterval(fetchNewOrders, 60000);
    
    // إلغاء التحديث التلقائي عند مغادرة الصفحة
    $(window).on('beforeunload', function() {
        clearInterval(refreshInterval);
    });

    function fetchNewOrders() {
        $.get(window.location.href, function(data) {
            $('#orders-queue').html($(data).find('#orders-queue').html());
            
            // تحديث العدادات
            $('.badge.bg-light.text-dark:first').text('جديدة: ' + $(data).find('#orders-queue .bg-secondary').length);
            $('.badge.bg-light.text-dark:last').text('قيد التحضير: ' + $(data).find('#orders-queue .bg-warning').length);
            
            // تحديث الرسم البياني
            statusChart.data.datasets[0].data = [
                $(data).find('#orders-queue .bg-secondary').length,
                $(data).find('#orders-queue .bg-warning').length,
                <?php echo e(\App\Models\Order::where('status', \App\Models\Order::STATUS_COMPLETED)->whereHas('invoice')->count()); ?>

            ];
            statusChart.update();
        });
    }
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/kitchen/index.blade.php ENDPATH**/ ?>