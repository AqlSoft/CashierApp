

<?php $__env->startSection('contents'); ?>
<style>
    .order-details-card {
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .status-badge {
        font-size: 0.9rem;
        padding: 0.5em 0.8em;
    }
    .product-image-thumb {
        width: 50px;
        height: 50px;
        border-radius: 5px;
        object-fit: cover;
        margin-right: 10px;
    }
    .action-btn {
        min-width: 120px;
    }
    .delivery-method-badge {
        font-size: 0.85rem;
    }
</style>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card order-details-card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
                    <div>
                        <h3 class="mb-0">تفاصيل الطلب #<?php echo e($order->order_sn); ?></h3>
                        <small class="d-block mt-1">
                            <i class="far fa-clock"></i> <?php echo e($order->created_at->format('Y-m-d h:i A')); ?>

                        </small>
                    </div>
                    <a href="<?php echo e(route('kitchen.index')); ?>" class="btn btn-light btn-sm">
                        <i class="fas fa-arrow-left me-1"></i> رجوع للقائمة
                    </a>
                </div>
                
                <div class="card-body">
                    <!-- معلومات الطلب الأساسية -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <h5 class="d-inline-block">معلومات الطلب</h5>
                                <span class="badge bg-info delivery-method-badge float-end">
                                    <?php if($order->delivery_method == 1): ?>
                                    <i class="fas fa-shopping-bag me-1"></i> تيك أواي
                                    <?php elseif($order->delivery_method == 2): ?>
                                    <i class="fas fa-store me-1"></i> محلي
                                    <?php else: ?>
                                    <i class="fas fa-truck me-1"></i> توصيل
                                    <?php endif; ?>
                                </span>
                            </div>
                            <p><strong><i class="fas fa-hashtag me-2"></i>رقم الطلب:</strong> <?php echo e($order->order_sn); ?></p>
                            <p><strong><i class="fas fa-user me-2"></i>العميل:</strong> <?php echo e($order->customer->name ?? 'زائر'); ?></p>
                            <?php if($order->invoice): ?>
                            <p><strong><i class="fas fa-file-invoice me-2"></i>رقم الفاتورة:</strong> <?php echo e($order->invoice->invoice_number); ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h5 class="card-title">حالة الطلب</h5>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge status-badge 
                                            <?php echo e($order->status == \App\Models\Order::STATUS_NEW ? 'bg-secondary' : ''); ?>

                                            <?php echo e($order->status == \App\Models\Order::STATUS_IN_PROGRESS ? 'bg-warning text-dark' : ''); ?>

                                            <?php echo e($order->status == \App\Models\Order::STATUS_PENDING ? 'bg-info' : ''); ?>

                                            <?php echo e($order->status == \App\Models\Order::STATUS_COMPLETED ? 'bg-success' : ''); ?>

                                            <?php echo e($order->status == \App\Models\Order::STATUS_CANCELED ? 'bg-danger' : ''); ?>">
                                            <?php echo e(\App\Models\Order::getStatusList()[$order->status]); ?>

                                        </span>
                                        
                                        <?php if($order->status == \App\Models\Order::STATUS_IN_PROGRESS): ?>
                                        <small class="text-muted">
                                            <i class="far fa-clock me-1"></i>
                                            بدأ التحضير: <?php echo e($order->updated_at->diffForHumans()); ?>

                                        </small>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- جدول العناصر -->
                    <div class="table-responsive mb-4">
                        <table class="table table-hover table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="45%">الصنف</th>
                                    <th width="15%">الكمية</th>
                                    <th width="20%">السعر</th>
                                    <th width="15%">المجموع</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?php echo e($item->product->image ? asset('storage/'.$item->product->image) : asset('images/default-product.png')); ?>" 
                                                 class="product-image-thumb">
                                            <div>
                                                <?php echo e($item->product->name); ?>

                                                <?php if($item->notes): ?>
                                                <div class="text-muted small mt-1">
                                                    <i class="fas fa-sticky-note me-1"></i> <?php echo e($item->notes); ?>

                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo e($item->quantity); ?></td>
                                    <td><?php echo e(number_format($item->price, 2)); ?> ر.س</td>
                                    <td><?php echo e(number_format($item->quantity * $item->price, 2)); ?> ر.س</td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot class="table-active">
                                <tr>
                                    <td colspan="4" class="text-end fw-bold">الإجمالي:</td>
                                    <td class="fw-bold">
                                        <?php echo e(number_format($order->orderItems->sum(function($item) { 
                                            return $item->quantity * $item->price; 
                                        }), 2)); ?> ر.س
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!-- ملاحظات إضافية -->
                    <?php if($order->notes): ?>
                    <div class="alert alert-info mb-4">
                        <h5><i class="fas fa-info-circle me-2"></i>ملاحظات إضافية</h5>
                        <p class="mb-0"><?php echo e($order->notes); ?></p>
                    </div>
                    <?php endif; ?>

                    <!-- أزرار تغيير الحالة -->
                    <div class="border-top pt-4">
                        <h5 class="mb-3"><i class="fas fa-exchange-alt me-2"></i>تغيير حالة الطلب:</h5>
                        <div class="d-flex flex-wrap gap-2">
                            <?php if($order->status == \App\Models\Order::STATUS_NEW): ?>
                            <button class="btn btn-warning action-btn" 
                                    onclick="updateOrderStatus(<?php echo e($order->id); ?>, <?php echo e(\App\Models\Order::STATUS_IN_PROGRESS); ?>)">
                                <i class="fas fa-utensils me-1"></i> بدء التحضير
                            </button>
                            <?php elseif($order->status == \App\Models\Order::STATUS_IN_PROGRESS): ?>
                            <button class="btn btn-success action-btn" 
                                    onclick="updateOrderStatus(<?php echo e($order->id); ?>, <?php echo e(\App\Models\Order::STATUS_PENDING); ?>)">
                                <i class="fas fa-check-circle me-1"></i> تم التحضير
                            </button>
                            <?php endif; ?>
                            
                            <button class="btn btn-danger action-btn" 
                                    onclick="updateOrderStatus(<?php echo e($order->id); ?>, <?php echo e(\App\Models\Order::STATUS_CANCELED); ?>)">
                                <i class="fas fa-times-circle me-1"></i> إلغاء الطلب
                            </button>
                            
                            <?php if($order->status == \App\Models\Order::STATUS_PENDING): ?>
                            <button class="btn btn-primary action-btn" 
                                    onclick="updateOrderStatus(<?php echo e($order->id); ?>, <?php echo e(\App\Models\Order::STATUS_COMPLETED); ?>)">
                                <i class="fas fa-truck me-1"></i> تم التوصيل
                            </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function updateOrderStatus(orderId, status) {
    const statusText = {
        <?php echo e(\App\Models\Order::STATUS_NEW); ?>: 'جديد',
        <?php echo e(\App\Models\Order::STATUS_IN_PROGRESS); ?>: 'قيد التحضير',
        <?php echo e(\App\Models\Order::STATUS_PENDING); ?>: 'معلق',
        <?php echo e(\App\Models\Order::STATUS_COMPLETED); ?>: 'مكتمل',
        <?php echo e(\App\Models\Order::STATUS_CANCELED); ?>: 'ملغى'
    };
    
    Swal.fire({
        title: 'تأكيد تغيير الحالة',
        text: `هل أنت متأكد من تغيير حالة الطلب إلى "${statusText[status]}"؟`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'نعم، تغيير',
        cancelButtonText: 'إلغاء',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/admin/kitchen/${orderId}/update-status`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ status: status })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: 'تم التحديث!',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'حسناً'
                    }).then(() => {
                        window.location.reload();
                    });
                } else {
                    Swal.fire({
                        title: 'خطأ!',
                        text: data.message || 'حدث خطأ أثناء تحديث الحالة',
                        icon: 'error',
                        confirmButtonText: 'حسناً'
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    title: 'خطأ!',
                    text: 'حدث خطأ في الاتصال بالخادم',
                    icon: 'error',
                    confirmButtonText: 'حسناً'
                });
            });
        }
    });
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/kitchen/order-details.blade.php ENDPATH**/ ?>