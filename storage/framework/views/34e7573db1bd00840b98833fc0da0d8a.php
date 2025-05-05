<?php if($admin->shifts->isNotEmpty()): ?>
                            <div class="row mt-2">
                                <div class="col col-12">
                                    <div class="selected-products-container" style="font-size: 14px;">
                                        <!-- Header Row  table-header-->
                                        <div class="row g-0 border-bottom py-2 fw-bold align-items-center">
                                            <div class="col-1 text-center fw-bold">#</div>
                                            <div class="col-3 fw-bold">Session Name</div>
                                            <div class="col-3 text-center fw-bold">Start Time</div>
                                            <div class="col-3 text-center fw-bold">End Time</div>
                                            <div class="col-2 text-center fw-bold">Status</div>
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
                                                        <span class="btn btn-sm btn-warning">In Progress</span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-2 text-center fs-6">
                                                    <?php if($shift->status == 'Active'): ?>
                                                        <span class="btn btn-sm btn-success">Active</span>
                                                        <?php $hasActiveShift = true; ?>
                                                    <?php else: ?>
                                                        <span class="btn btn-sm btn-secondary">Closed</span>
                                                    <?php endif; ?>
                                                    
                                                    <?php if(isset($shift) && $shift->status == 'Active'): ?>
                                                        <a href="<?php echo e(route('fast-create-order', [ $shift->id])); ?>" class="btn btn-sm btn-info">
                                                            <i title="Add New Order" class="fa fa-plus"></i>
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
                                No shifts found for this user
                            </div>
                        <?php endif; ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/users/partials/session-section.blade.php ENDPATH**/ ?>