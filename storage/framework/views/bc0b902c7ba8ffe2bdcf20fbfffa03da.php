<?php $__env->startSection('contents'); ?>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div id="products-container">

                <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">
                    <a href="<?php echo e(route('display-payments-list')); ?>" class="btn py-1 fw-bold btn-primary">
                        <?php echo e(__('payment-meth.payments')); ?>

                    </a>
                    <a href="<?php echo e(route('display-payment-methods-list')); ?>" class="btn py-1 fw-bold btn-primary active">
                        <?php echo e(__('payment-meth.payment_methods')); ?>

                    </a>
                </h1>

                <table class="table table-striped mt-2">
                    <thead>
                        <tr>
                            <th># / <?php echo e(__('payment-meth.number')); ?></th>
                            <th><?php echo e(__('payment-meth.name')); ?></th>
                            <th><?php echo e(__('payment-meth.code')); ?></th>
                            <th><?php echo e(__('payment-meth.status')); ?></th>
                            <th><?php echo e(__('payment-meth.control')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><i class="fa <?php echo e($pm->icon); ?>"></i> <?php echo e($pm->name); ?></td>
                            <td><?php echo e($pm->code); ?></td>
                            <td>
                                <span class="badge <?php echo e($pm->is_active ? 'bg-success' : 'bg-danger'); ?>">
                                    <?php echo e($pm->is_active ? __('payment-meth.active') : __('payment-meth.inactive')); ?>

                                </span>
                            </td>
                            <td>
                                <a href="<?php echo e(route('view-payment-method-info', $pm->id)); ?>" class="btn py-0 btn-primary">
                                    <?php echo e(__('payment-meth.view')); ?>

                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7"><?php echo e(__('payment-meth.no_payments_found')); ?></td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/setting/index.blade.php ENDPATH**/ ?>