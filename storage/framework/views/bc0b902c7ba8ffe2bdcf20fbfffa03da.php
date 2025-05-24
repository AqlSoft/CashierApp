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
                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/setting/index.blade.php ENDPATH**/ ?>