<?php if($admin->shifts->isNotEmpty()): ?>
    <div class="row mt-2">
        <div class="col col-12">
            <div class="selected-products-container" style="font-size: 14px;">
                <!-- Header Row  table-header-->
                <div class="row g-0 border-bottom py-2 fw-bold align-items-center">
                    <div class="col-1 text-center fw-bold">#</div>
                    <div class="col-3 fw-bold"><?php echo e(__('profile.session_name')); ?></div>
                    <div class="col-3 text-center fw-bold"><?php echo e(__('profile.start_time')); ?></div>
                    <div class="col-3 text-center fw-bold"><?php echo e(__('profile.end_time')); ?></div>
                    <div class="col-2 text-center fw-bold"><?php echo e(__('profile.status')); ?></div>
                </div>

                <!-- Items Rows -->
                <?php $__currentLoopData = $admin->shifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row g-0 border-bottom py-2 align-items-center">
                        <div class="col-1 text-center fs-6"><?php echo e($loop->iteration); ?></div>
                        <div class="col-3 ps-2 fs-6"><?php echo e($shift->monybox->name); ?></div>
                        <div class="col-3 text-center fs-6"><?php echo e($shift->start_time->format('d/m/Y H:i')); ?></div>
                        <div class="col-3 text-center fs-6">
                            <?php if($shift->end_time): ?>
                                <?php echo e($shift->end_time->format('d/m/Y H:i')); ?>

                            <?php else: ?>
                                <span class="btn btn-sm btn-warning"><?php echo e(__('profile.in_progress')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="col-2 text-center fs-6">
                            <?php if($shift->status == 'Active'): ?>
                                <span class="btn btn-sm btn-success"><?php echo e(__('profile.active')); ?></span>
                                <?php $hasActiveShift = true; ?>
                            <?php else: ?>
                                <span class="btn btn-sm btn-secondary"><?php echo e(__('profile.closed')); ?></span>
                            <?php endif; ?>
                            
                            <?php if(isset($shift) && $shift->status == 'Active'): ?>
                                <a href="<?php echo e(route('fast-create-order', [ $shift->id])); ?>" class="btn btn-sm btn-info">
                                    <i title="<?php echo e(__('profile.add_new_order')); ?>" class="fa fa-plus"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-info mb-0">
        <?php echo e(__('profile.no_shifts_found')); ?>

    </div>
<?php endif; ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/users/partials/session-section.blade.php ENDPATH**/ ?>