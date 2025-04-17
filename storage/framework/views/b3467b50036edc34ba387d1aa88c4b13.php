<?php $__env->startSection('contents'); ?>

<div class="container">
<h1 class="mt-3 pb-2 header-border" >Order List</h1>
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

    <div id="order-list-container">
        <?php echo $__env->make('admin.kitchen.partials.order_list', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> 
    </div>
</div>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/kitchen/dashboard.blade.php ENDPATH**/ ?>