<?php $__env->startSection('contents'); ?>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div id="products-container">

                <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">
                    <a href="<?php echo e(route('display-payments-list')); ?>" class="btn py-1 fw-bold btn-primary">Payments</a>
                    <a href="<?php echo e(route('display-payment-methods-list')); ?>" class="btn py-1 fw-bold btn-primary active">Payment Methods</a>
                </h1>

                <table class="table table-striped  mt-2">
                    <thead>
                        <tr>
                            <th> #</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Control</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><i class="fa <?php echo e($pm->icon); ?>"></i> <?php echo e($pm->name); ?></td>
                            <td><?php echo e($pm->code); ?></td>
                            <td><span class="badge <?php echo e($pm->is_active ? 'bg-success' : 'bg-danger'); ?>"><?php echo e($pm->is_active ? 'Active' : 'Inactive'); ?></span></td>
                            <td>
                                <a href="<?php echo e(route('view-payment-method-info', $pm->id)); ?>" class="btn py-0 btn-primary">View</a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7">No Payments found</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/setting/payment-methods/index.blade.php ENDPATH**/ ?>