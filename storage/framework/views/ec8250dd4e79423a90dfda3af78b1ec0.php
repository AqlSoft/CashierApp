<?php $__env->startSection('title'); ?>
Kitchen Display
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<div class="container-fluid py-4">
<?php if(session('modal_order_id')): ?>
        <script>
            $(document).ready(function() {
                $('#orderDetailsModal<?php echo e(session('modal_order_id')); ?>').modal('show');
            });
        </script>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>
    <div class="row text-center g-4">
        <div class="col-md-4">
            <div class="bg-warning bg-opacity-25 rounded p-3 h-100">
                <h3 class="mb-3 text-warning">Pending</h3>
                <?php $__empty_1 = true; $__currentLoopData = $orders->where('status', \App\Models\Order::ORDER_PENDING); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="card mb-1 shadow-sm border-warning   rounded border w-100">
                        <div class="card-body">
                            <h4 class="card-title">#<?php echo e($order->wait_no); ?></h4>
                            <div class="small text-muted">Created: <?php echo e($order->created_at->format('H:i')); ?></div>
                            <div class="mt-2 text-secondary small">
                                Est. to Processing: <?php echo e($order->processing_time); ?> minutes
                            </div>
                            <form method="POST" action="<?php echo e(route('admin.kitchen.order.pick', $order->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-warning btn-sm mt-2"
                                        onclick="return confirm('Are you sure you want to select this order and print it?')">
                                    Print & Process
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="modal fade" id="orderDetailsModal<?php echo e($order->id); ?>" tabindex="-1" aria-labelledby="orderDetailsModalLabel<?php echo e($order->id); ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered ">
                            <div class="modal-content">
                                <div class="modal-header" style="padding: 0.5rem 1rem; border-bottom: 1px solid #dedede;">
                                    <h1 class="modal-title fs-5" id="orderDetailsModalLabel<?php echo e($order->id); ?>">Order Details</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php echo $__env->make('admin.kitchen.partials.order-details', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                    <button type="button" class="btn btn-primary">طباعة</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="text-muted">No Pending Orders</div>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-4">
            <div class="bg-info bg-opacity-25 rounded p-3 h-100">
                <h3 class="mb-3 text-info">Processing</h3>
                <?php $__empty_1 = true; $__currentLoopData = $orders->where('status', \App\Models\Order::ORDER_IN_PROGRESS); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="card mb-1 shadow-sm border-info   rounded border w-100">
                        <div class="card-body">
                            <h4 class="card-title">#<?php echo e($order->wait_no); ?></h4>
                            <div class="small text-muted">Created: <?php echo e($order->created_at->format('H:i')); ?></div>
                            <div class="mt-2 text-secondary small">
                                Est. to Processing: <?php echo e($order->processing_time); ?> minutes
                            </div>
                            <form method="POST" action="<?php echo e(route('admin.kitchen.order.complete', $order->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-info btn-sm mt-2"
                                   onclick="return confirm('Are you sure you want to complete this order?')">
                                        In Progress 
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="modal fade" id="orderDetailsModal<?php echo e($order->id); ?>" tabindex="-1" aria-labelledby="orderDetailsModalLabel<?php echo e($order->id); ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered ">
                            <div class="modal-content">
                                <div class="modal-header" style="padding: 0.5rem 1rem; border-bottom: 1px solid #dedede;">
                                    <h1 class="modal-title fs-5" id="orderDetailsModalLabel<?php echo e($order->id); ?>">Order Details</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php echo $__env->make('admin.kitchen.partials.order-details', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                    <button type="button" class="btn btn-primary">طباعة</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="text-muted">No Processing Orders</div>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-4">
            <div class="bg-primary bg-opacity-25 rounded p-3 h-100">
                <h3 class="mb-3 text-primary">On-Delivery</h3>
                <?php $__empty_1 = true; $__currentLoopData = $orders->where('status', \App\Models\Order::ORDER_COMPLETED); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="card mb-3 shadow-sm border-primary border-2 w-100">
                        <div class="card-body">
                            <h4 class="card-title">#<?php echo e($order->wait_no); ?></h4>
                            <div class="mb-2"><?php echo e($order->customer->name ?? '-'); ?></div>
                            <div class="small text-muted">Started: <?php echo e($order->updated_at->format('H:i')); ?></div>
                            <div class="mt-2">
                                <span class="badge bg-primary">
                                    <?php echo e(\App\Models\Order::getStatusList()[$order->status] ?? ''); ?>

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
                    <div class="text-muted">No Orders On-Delivery</div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<style>
    .card-title {
        font-size: 2.2rem;
        font-weight: bold;
    }

    .card {
        font-size: 1.3rem;
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
<script>
    $(document).ready(function() {
        if (typeof EventSource !== 'undefined') {
            var eventSource = new EventSource('/sse/kitchen-orders');

            eventSource.onmessage = function(event) {
                var data = JSON.parse(event.data);
                if (data.event === 'order.updated') {
                    // تحديث قائمة الطلبات بناءً على البيانات الواردة
                    $.ajax({
                        url: '/admin/kitchen/orders/list', // مسار لإرجاع قائمة الطلبات المحدثة كـ HTML جزئي
                        type: 'GET',
                        success: function(response) {
                            $('#order-list-container').html(response);
                        },
                        error: function(error) {
                            console.error('Error fetching updated order list:', error);
                        }
                    });
                }
            };

            eventSource.onerror = function(error) {
                console.error('SSE connection error:', error);
                eventSource.close();
            };
        } else {
            console.log('SSE غير مدعوم في هذا المتصفح.');
        }
    });
</script>
<?php echo $__env->make('layouts.monitors', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/kitchen/kitchen.blade.php ENDPATH**/ ?>