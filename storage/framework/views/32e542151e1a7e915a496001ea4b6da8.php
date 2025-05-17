<?php $__env->startSection('contents'); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4><?php echo e(__('kitchen-processing-area.processing_area')); ?></h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><?php echo e(__('kitchen-processing-area.meal_name')); ?></th>
                                <th><?php echo e(__('kitchen-processing-area.meal_state')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo e(__('kitchen-processing-area.meal_1')); ?></td>
                                <td><?php echo e(__('kitchen-processing-area.ready')); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/monitors/kitchen-processing-area.blade.php ENDPATH**/ ?>