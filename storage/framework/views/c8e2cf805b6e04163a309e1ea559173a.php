<?php if(!$orders->isEmpty()): ?>
        <div class="row mt-2 sm">
            <div class="col col-8">
                <div class="selected-products-container" style="font-size: 14px;">
                    <div class="row g-0 border-bottom py-2 fw-bold align-items-center">
                        <div class="col-1 text-center fw-bold">#</div>
                        <div class="col-3 fw-bold">Nait No</div>
                        <div class="col-3 text-center fw-bold">Create Date</div>
                        <div class="col-2 text-center fw-bold">Action</div>
                    </div>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row g-0 border-bottom py-2 align-items-center" id="order-row-<?php echo e($order->id); ?>">
                            <div class="col-1 text-center fs-6"><?php echo e($loop->iteration); ?></div>
                            <div class="col-3 ps-2 fs-6"><?php echo e($order->wait_no); ?></div>
                            <div class="col-3 text-center fs-6"> <?php echo e($order->invoice ? $order->invoice->created_at->format('Y-m-d H:i') : 'لا يوجد تاريخ فاتورة'); ?></div>
                            <div class="col-3 text-center fs-6">
                                <?php if($order->status != \App\Models\Order::STATUS_IN_PROGRESS && $order->status != \App\Models\Order::STATUS_COMPLETED): ?>
                                    <form method="POST" action="<?php echo e(route('admin.kitchen.order.pick', $order->id)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-success btn-sm "
                                                onclick="return confirm('هل أنت متأكد أنك تريد اختيار هذا الطلب؟')">
                                            Print
                                        </button>
                                    </form>
                                <?php elseif($order->status == \App\Models\Order::STATUS_IN_PROGRESS): ?>
                                    <form method="POST" action="<?php echo e(route('admin.kitchen.order.complete', $order->id)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-warning btn-sm" 
                                                onclick="return confirm('هل أنت متأكد أنك تريد إكمال هذا الطلب؟')">
                                            In Progress 
                                        </button>
                                    </form>
                                    <!-- <button class="btn btn-info btn-sm" data-bs-target="#orderDetailsModal<?php echo e($order->id); ?>" data-bs-toggle="modal">عرض</button> -->
                                <?php elseif($order->status == \App\Models\Order::STATUS_COMPLETED): ?>
                                    <button class="btn btn-secondary btn-sm" disabled>Completed</button>
                                <?php endif; ?>

                                <div class="modal fade" id="orderDetailsModal<?php echo e($order->id); ?>" tabindex="-1" aria-labelledby="orderDetailsModalLabel<?php echo e($order->id); ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered ">
                                        <div class="modal-content">
                                            <div class="modal-header" style="padding: 0.5rem 1rem; border-bottom: 1px solid #dedede;">
                                                <h1 class="modal-title fs-5" id="orderDetailsModalLabel<?php echo e($order->id); ?>">Order Details</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                 <?php echo $__env->make('admin.kitchen.partials.order-details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                                <button type="button" class="btn btn-primary">طباعة</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-info mb-0">
            No Orders found
        </div>
    <?php endif; ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/kitchen/partials/order_list.blade.php ENDPATH**/ ?>