<?php $__env->startSection('title', __('pos.index-main-title')); ?>
<?php $__env->startSection('header-links'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('home-setting')); ?>"><?php echo e(__('setting.home')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('display-pos-list')); ?>"><?php echo e(__('pos.pos')); ?></a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div id="products-container">
                <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede"><?php echo e(__('pos.index-main-title')); ?>

                    <a class="ms-3 add-icon" data-bs-toggle="modal" data-bs-target="#createPosModal" aria-expanded="false"
                        aria-controls="addProductForm">
                        <i data-bs-toggle="tooltip" title="Add New pos" class="fa fa-plus"></i>
                    </a>
                </h1>
                <!-- هنا سيتم اضافة المنتجات -->
                <div class="row items-list mt-3">
                    <?php $__empty_1 = true; $__currentLoopData = $posList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-4 mb-2">
                            <div class="card mb-3 w-100">
                                <div class="row g-0">
                                    <div class="text-center" style="width: 100px">
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            <img width="100" height="100" src="<?php echo e($pos->icon ? asset('assets/admin/uploads/' . $pos->icon) : asset('assets/admin/images/pos-default.png')); ?>" class="img-fluid rounded px-3" alt="...">
                                        </div>
                                    </div>
                                    <div class="" style="width: calc(100% - 100px)">
                                        <div class="card-body pb-0">
                                            <h5 class="card-title"><?php echo e($pos->name); ?></h5>
                                            <p class="card-text mt-0 mb-3"><?php echo e($pos->code); ?> <br>
                                            <?php if($pos->is_default): ?>
                                                <span class="badge bg-success" style="padding: 2px 8px;">Default</span>
                                            <?php endif; ?>
                                            <?php if($pos->is_active): ?>
                                                <span class="badge bg-success" style="padding: 2px 8px;">Active</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger" style="padding: 2px 8px;">Inactive</span>
                                            <?php endif; ?>
                                            </p>
                                            <p class="card-text py-0 my-0"><small class="text-body-secondary"><?php echo e($pos->updated_at->diffForHumans()); ?></small></p>
                                            <div class="actions position-absolute top-0">
                                                <a href="<?php echo e(route('view-pos-info', $pos->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-display"></i></a>
                                                <a href="<?php echo e(route('destroy-pos-info', $pos->id)); ?>" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-12 mb-2">
                            <p>No pos found.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modals -->
<div class="modal fade" id="createPosModal" aria-hidden="true" aria-labelledby="createPosModalLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="padding: 0.5rem 1rem; border-bottom: 1px solid #dedede;">
                <h1 class="modal-title fs-5" id="createPosModalLabel"><?php echo e(__('pos.new-pos-modal-title')); ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="p-3" method="POST" action="<?php echo e(route('store-pos-info')); ?>">
                <?php echo csrf_field(); ?>

                <div class="mb-2 input-group">
                    <label class="input-group-text"><?php echo e(__('pos.name')); ?></label>
                    <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>" required>
                </div>

                <div class="mb-2 input-group">
                    <label class="input-group-text"><?php echo e(__('pos.code')); ?></label>
                    <input type="text" name="code" class="form-control" value="<?php echo e(old('code')); ?>" required>
                </div>
                <small><?php echo e(__('pos.code-must-be-unique')); ?> (مثال: POS-001)</small>

                <div class="mb-2 input-group">
                    <label class="input-group-text"><?php echo e(__('pos.location')); ?></label>
                    <select name="location" class="form-control" required>
                        <option <?php echo e(old('location', 'main_hall') ? 'selected' : ''); ?> value="main_hall"><?php echo e(__('pos.main-hall')); ?></option>
                        <option <?php echo e(old('location', 'terrace') ? 'selected' : ''); ?> value="terrace"><?php echo e(__('pos.terrace')); ?></option>
                        <option <?php echo e(old('location', 'first_floor') ? 'selected' : ''); ?> value="first_floor"><?php echo e(__('pos.first-floor')); ?></option>
                    </select>
                </div>

                <div class="mb-2 input-group">
                    <label class="input-group-text"><?php echo e(__('pos.branch')); ?></label>
                    <select name="branch_id" class="form-control" required>
                        <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(old('branch_id') == $branch->id ? 'selected' : ''); ?> value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="mb-2 input-group">
                    <label class="input-group-text"><?php echo e(__('pos.printer-settings')); ?></label>
                    <input type="text" name="printer_name" placeholder="<?php echo e(__('pos.printer-name')); ?>" class="form-control" value="<?php echo e(old('printer_name')); ?>">
                    <input type="text" name="printer_ip" placeholder="<?php echo e(__('pos.printer-ip')); ?>" class="form-control" value="<?php echo e(old('printer_ip')); ?>">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-primary py-1"><?php echo e(__('pos.save-pos')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/pos/index.blade.php ENDPATH**/ ?>