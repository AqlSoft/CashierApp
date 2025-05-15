<?php $__env->startSection('title', __('roles.users_roles')); ?>
<?php $__env->startSection('header-links'); ?>
<li class="breadcrumb-item"><a href="#"><?php echo e(__('roles.admins')); ?></a></li>
<li class="breadcrumb-item"><a href="#"><?php echo e(__('roles.roles')); ?></a></li>
<li class="breadcrumb-item active" aria-current="page"><?php echo e(__('roles.role_details')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<div class="container-fluid">

    <!-- تبويبات التنقل -->
    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="roles-list-tab" data-bs-toggle="tab"
                data-bs-target="#roles-list" type="button" role="tab" aria-controls="roles-list"
                aria-selected="false">
                <a href="<?php echo e(route('roles-list')); ?>"><?php echo e(__('roles.roles_list')); ?></a>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="basic-info-tab" data-bs-toggle="tab"
                data-bs-target="#basic-info" type="button" role="tab" aria-controls="basic-info"
                aria-selected="true"><?php echo e(__('roles.basic_info')); ?></button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="role-admins-tab" data-bs-toggle="tab" data-bs-target="#role-admins"
                type="button" role="tab" aria-controls="role-admins" aria-selected="false"><?php echo e(__('roles.attached_to')); ?></button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="role-permissions-tab" data-bs-toggle="tab" data-bs-target="#role-permissions"
                type="button" role="tab" aria-controls="role-permissions" aria-selected="false"><?php echo e(__('roles.role_permissions')); ?></button>
        </li>
    </ul>

    <div class="tab-content" id="roleInfo">
        <div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="basic-info-tab">
            <div class="row">
                <div class="col col-12 mb-3 p-1">
                    <h4 class="btn btn-outline-secondary mb-3"><?php echo e(__('roles.edit_role_basic_info')); ?></h4>
                    <form action="<?php echo e(route('update-role-info')); ?>" method="POST">
                        <div class="card-body">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('put'); ?>
                            <input type="hidden" name="id" value="<?php echo e($role->id); ?>">
                            <div class="input-group sm mb-2">
                                <label class="input-group-text" for="name"><?php echo e(__('roles.role_name')); ?></label>
                                <input type="text" class="form-control sm" name="name" id="name"
                                    value="<?php echo e(old('name', $role)); ?>">
                            </div>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div class="input-group sm mb-2">
                                <label class="input-group-text" for="brief"><?php echo e(__('roles.brief')); ?></label>
                                <input type="text" class="form-control sm" name="brief" id="brief"
                                    value="<?php echo e(old('brief', $role)); ?>">
                            </div>
                            <?php $__errorArgs = ['brief'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            <div class="input-group sm mb-2">
                                <label class="input-group-text" for="status"><?php echo e(__('roles.status')); ?></label>
                                <select class="form-select sm" name="status" id="status">
                                    <option <?php echo e($role->status ? 'selected' : ''); ?> value="1"><?php echo e(__('roles.active')); ?></option>
                                    <option <?php echo e(!$role->status ? 'selected' : ''); ?> value="0"><?php echo e(__('roles.inactive')); ?></option>
                                </select>
                            </div>
                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn py-0 btn-outline-primary">
                                <i class="fa fa-save me-2"></i><?php echo e(__('roles.update')); ?>

                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="role-admins" role="tabpanel" aria-labelledby="role-admins-tab">
            <div class="row">
                <div class="col col-12 mb-3 p-1">
                    <h4 class="btn btn-outline-secondary mb-3"><?php echo e(__('roles.attached_to')); ?></h4>
                    <ul>
                        <?php $__currentLoopData = $role->admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($admin->profile->full_name()); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="role-permissions" role="tabpanel" aria-labelledby="role-permissions-tab">
            <div class="row">
                <div class="col col-12 mb-3 p-1">
                    <h4 class="btn btn-outline-secondary mb-3"><?php echo e(__('roles.role_permissions')); ?></h4>
                    <div class="accordion accordion-flush" id="permissionsAccordion">
                        <input type="hidden" id="role_id" value="<?php echo e($role->id); ?>">
                        <?php $__empty_1 = true; $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="accordion-item shadow-sm rounded">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed py-2 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo e($module); ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo e($module); ?>">
                                    <?php echo e(ucwords(str_replace('-', ' ', $module))); ?>

                                </button>
                            </h2>
                            <div id="flush-collapse<?php echo e($module); ?>" class="accordion-collapse collapse" data-bs-parent="#permissionsAccordion">
                                <div class="accordion-body">
                                    <div class="row gap-0">
                                        <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col col-md-4 mb-2 px-1">
                                            <div class="permission btn w-100 btn-<?php echo e($role->permissions->contains($permission->id) ? 'success' : 'outline-secondary'); ?>"
                                                data-permission_id="<?php echo e($permission->id); ?>"
                                                data-is-role-permission="<?php echo e($role->permissions->contains($permission->id) ? 1 : 0); ?>">
                                                <?php echo e($permission->parseName()); ?>

                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div><?php echo e(__('roles.no_permissions_found')); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/roles/display.blade.php ENDPATH**/ ?>