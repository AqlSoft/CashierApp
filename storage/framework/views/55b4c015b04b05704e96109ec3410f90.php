<?php $__env->startSection('contents'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div id="units-container">
                <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">
                    <a href="<?php echo e(route('product-setting-home')); ?>" class="btn py-1 fw-bold btn-primary">Home</a>
                    <a href="<?php echo e(route('display-units-all')); ?>" class="btn py-1 fw-bold btn-primary active">Units</a>
                    <a href="<?php echo e(route('display-categories-all')); ?>" class="btn py-1 fw-bold btn-primary">Categories</a>
                </h1>
                <table class="table table-striped mt-2">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Brief</th>
                            <th>Short Name</th>
                            <th>Status</th>
                            <th>Control</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($unit->name); ?></td>
                            <td><?php echo e($unit->breif); ?></td>
                            <td><?php echo e($unit->short_name); ?></td>
                            <td>
                                <?php if($unit->status): ?>
                                    <span class="badge bg-success">Active</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('edit-unit-info', $unit->id)); ?>" class="btn btn-sm btn-primary">Edit</a>
                                <form action="<?php echo e(route('destroy-unit-info', $unit->id)); ?>" method="POST" style="display:inline-block;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this unit?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if($units->isEmpty()): ?>
                        <tr>
                            <td colspan="6" class="text-center">No units found.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/setting/units/index.blade.php ENDPATH**/ ?>