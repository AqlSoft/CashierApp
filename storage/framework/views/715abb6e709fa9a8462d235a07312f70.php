<?php $__env->startSection('title', __('roles.roles_list')); ?>

<?php $__env->startSection('header-links'); ?>
<li class="breadcrumb-item"><a href="#"><?php echo e(__('roles.admins')); ?></a></li>
<li class="breadcrumb-item active" aria-current="page"><?php echo e(__('roles.roles_list')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<div class="container-fluid">
    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <li class="nav-item">
            <button class="nav-link" id="role-admins-tab" data-bs-toggle="tab" data-bs-target="#role-admins"
                type="button" role="tab" aria-controls="role-admins" aria-selected="false">
                <a href="<?php echo e(route('admin-list')); ?>"><?php echo e(__('roles.admins_list')); ?></a>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="roles-list-tab" data-bs-toggle="tab"
                data-bs-target="#roles-list" type="button" role="tab" aria-controls="roles-list"
                aria-selected="false">
                <a href="<?php echo e(route('roles-list')); ?>"><?php echo e(__('roles.roles_list')); ?></a>
            </button>
        </li>

        <li class="nav-item">
            <button class="nav-link" id="role-permissions-tab" data-bs-toggle="tab" data-bs-target="#role-permissions"
                type="button" role="tab" aria-controls="role-permissions" aria-selected="false">
                <a href="<?php echo e(route('permissions-list')); ?>"><?php echo e(__('roles.permissions_list')); ?></a>
            </button>
        </li>
    </ul>

    <h4 class="btn btn-outline-secondary mt-2"><?php echo e(__('roles.roles_list')); ?></h4>

    <!-- Search Section -->
    <div class="row">
        <div class="col col-12 pt-3">
            <div class="card card-body">
                <div class="input-group sm mb-2">
                    <label class="input-group-text" for="name"><?php echo e(__('roles.role_name')); ?></label>
                    <input type="text" class="form-control sm" name="name" id="name"
                        data-url="<?php echo e(route('search-roles-by-name')); ?>"
                        onkeyup="getData(this, '#listOfAdmins')">
                </div>
            </div>
        </div>
    </div>

    <!-- Roles List -->
    <div id="listOfrole">
        <table class="table table-striped mt-2">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(__('roles.role_name')); ?></th>
                    <th><?php echo e(__('roles.description')); ?></th>
                    <th><?php echo e(__('roles.control')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($role->name); ?></td>
                    <td><?php echo e($role->brief); ?></td>
                    <td>
                        <form action="<?php echo e(route('destroy-role-info', $role->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <a href="<?php echo e(route('display-role-info', $role->id)); ?>">
                                <i class="fa fa-display"></i>
                            </a>
                            <button class="btn btn-sm py-0"
                                onclick="if(!confirm('<?php echo e(__('roles.delete_confirmation')); ?>')){return false}"
                                title="<?php echo e(__('roles.delete')); ?>">
                                <i class="fa fa-trash text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7"><?php echo e(__('roles.no_roles_found')); ?></td>
                </tr>
                <?php endif; ?>
                <form action="<?php echo e(route('store-role-info')); ?>" method="POST">
                    <tr>
                        <?php echo csrf_field(); ?>
                        <td><?php echo e($roles->count() + 1); ?></td>
                        <td class="sm">
                            <input style="height:32px" type="text" class="form-control" name="name" id="name" required placeholder="<?php echo e(__('roles.role_name')); ?>">
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
                        </td>
                        <td class="sm">
                            <input style="height:32px" type="text" class="form-control" name="brief" id="brief" placeholder="<?php echo e(__('roles.new_role_description')); ?>">
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
                        </td>
                        <td>
                            <button type="submit" class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-save"></i><?php echo e(__('roles.save_role')); ?>

                            </button>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/roles/list.blade.php ENDPATH**/ ?>