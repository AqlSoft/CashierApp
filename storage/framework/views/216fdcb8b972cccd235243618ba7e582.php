<h1 class="mb-3"><?php echo e(__('branches.branches-list')); ?></h1>
<div class="row" style="margin-bottom:2rem">
    <?php if(isset($branches) && count($branches) > 0): ?>
    <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
    $type = $branch->branch_type;
    $typeLabel = $type === 'main' ? 'رئيسي' : ($type === 'sub' ? 'فرعي' : 'افتراضي');
    $typeClass = $type === 'main' ? 'branch-type-main' : ($type === 'sub' ? 'branch-type-sub' : 'branch-type-virtual');
    $isActive = $branch->is_active == 'active' || $branch->is_active == 1;
    $isOnline = $branch->is_online == 'online' || $branch->is_online == 1;
    ?>
    <div class="col col-12 col-md-6">
        <div class="branch-card position-relative">
            <a href="<?php echo e(route('edit-branch-info', $branch->id)); ?>">
                <div class="row branch-icons mb-3 ps-5">
                    <span class="w-auto branch-type-label text-center py-1 px-3 <?php echo e($typeClass); ?>"><?php echo e($typeLabel); ?></span>
                    <span class="py-1 px-3 bg-<?php echo e($isActive ? 'success' : 'danger'); ?>" style="width: 50px;">
                        <?php if($isActive): ?>
                        <i class="fa-solid fa-link text-white"></i>
                        <?php else: ?>
                        <i class="fa-solid fa-unlink text-white"></i>
                        <?php endif; ?>
                    </span>
                    <span class="py-1 px-3 bg-<?php echo e($isOnline ? 'success' : 'danger'); ?>" style="width: 50px;">
                        <?php if($isOnline): ?>
                        <i class="fa-solid fa-check-square text-white"></i>
                        <?php else: ?>
                        <i class="fa-solid fa-times text-white"></i>
                        <?php endif; ?>
                    </span>
                </div>
                <div class="branch-name text-center"><?php echo e($branch->name_ar ?? $branch->name_en); ?></div>
                <div class="branch-code text-center"><?php echo e($branch->code); ?></div>
            </a>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
    <div class="alert alert-info text-center mb-0">
        لا يوجد فروع حالياً
    </div>
    <?php endif; ?>
</div>

<form action="<?php echo e(route('store-branch-info')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('POST'); ?>
    <div class="row">
        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="code" class="input-group-text"><?php echo e(__('branches.code')); ?></label>
                <input type="text" name="code" class="form-control" placeholder="<?php echo e(__('branches.code-ph')); ?>" value="<?php echo e(old('code')); ?>">
            </div>
        </div>
        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="branch_type" class="input-group-text"><?php echo e(__('branches.branch_type')); ?></label>
                <select name="branch_type" class="form-select">
                    <option value="" hidden><?php echo e(__('branches.branch_type-ph')); ?></option>
                    <option value="main"><?php echo e(__('branches.main')); ?></option>
                    <option value="sub"><?php echo e(__('branches.sub')); ?></option>
                    <option value="virtual"><?php echo e(__('branches.virtual')); ?></option>
                </select>
            </div>
        </div>
        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="name_ar" class="input-group-text"><?php echo e(__('branches.name_ar')); ?></label>
                <input type="text" name="name_ar" class="form-control" placeholder="<?php echo e(__('branches.name_ar-ph')); ?>" value="<?php echo e(old('name_ar')); ?>">
            </div>
        </div>
        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="name_en" class="input-group-text"><?php echo e(__('branches.name_en')); ?></label>
                <input type="text" name="name_en" class="form-control" placeholder="<?php echo e(__('branches.name_en-ph')); ?>" value="<?php echo e(old('name_en')); ?>">
            </div>
        </div>

        <div class="col col-12 col-md-6">

            <div class="input-group sm mb-2">
                <label for="is_active" class="input-group-text"><?php echo e(__('branches.is_active')); ?></label>
                <select name="is_active" class="form-select">
                    <option value="" hidden><?php echo e(__('branches.is_active-ph')); ?></option>
                    <option value="active" <?php echo e(old('is_active') == 'active' ? 'selected' : ''); ?>><?php echo e(__('branches.yes')); ?></option>
                    <option value="inactive" <?php echo e(old('is_active') == 'inactive' ? 'selected' : ''); ?>><?php echo e(__('branches.no')); ?></option>
                </select>
            </div>
        </div>

        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="is_online" class="input-group-text"><?php echo e(__('branches.is_online')); ?></label>
                <select name="is_online" class="form-select">
                    <option value="" hidden><?php echo e(__('branches.is_online-ph')); ?></option>
                    <option value="online" <?php echo e(old('is_online') == 'online' ? 'selected' : ''); ?>><?php echo e(__('branches.yes')); ?></option>
                    <option value="offline" <?php echo e(old('is_online') == 'offline' ? 'selected' : ''); ?>><?php echo e(__('branches.no')); ?></option>
                </select>
            </div>
        </div>

    </div>

    <button type="submit" class="btn btn-primary"><?php echo e(__('branches.save')); ?></button>
</form><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/setting/partials/branches.blade.php ENDPATH**/ ?>