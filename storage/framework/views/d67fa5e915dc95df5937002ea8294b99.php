<?php $__env->startSection('contents'); ?>
    <div class="container-fluid content-report">
        <table class="table table-bordered table-sm mt-1  ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Meal</th>
                    <th scope="col">Qty</th>
                    <th scope="col">U.Price</th>
                    <th scope="col">T.Price</th>

                    <!-- <th class="header-color">#</th> -->

                </tr>
            </thead>
            <tbody>
                <?php
                    $counter = 0;
                    $price = 0;
                ?>
                <?php $__currentLoopData = $invoice->order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($oItem->product->name); ?></td>
                        <td><?php echo e($oItem->quantity); ?></td>
                        <td><?php echo e($oItem->price); ?></td>
                        <?php $price += $oItem->quantity * $oItem->price ?>
                        <td><?php echo e($oItem->quantity * $oItem->price); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

            <tfoot>
                <tr>
                    <td colspan="4" class="fw-bold text-end">Totals</td>
                    <td class="price"><?php echo e($price); ?></td>
                </tr>
                <tr>
                    <td colspan="4" class="fw-bold text-end">Vat Amount</td>
                    <td class="price"><?php echo e($price * 0.15); ?></td>
                </tr>
                <tr>
                    <td colspan="4" class="fw-bold text-end">Total Amount</td>
                    <td class="price"><?php echo e($price * 1.15); ?></td>
                </tr>
            </tfoot>
        </table>
        <div class="row footer-section mt-1 row">
            <div class=" col col-12"><img class="" src="<?php echo e(asset('assets/admin/uploads/images/R.png')); ?>"
                    alt="logo_report" /></div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.reports.template1', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/invoices/view.blade.php ENDPATH**/ ?>