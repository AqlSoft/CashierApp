<?php $__env->startSection('title', __('permissions.permissions_list')); ?>
<?php $__env->startSection('header-links'); ?>
<li class="breadcrumb-item"><a href="#"><?php echo e(__('permissions.admins')); ?></a></li>
<li class="breadcrumb-item"><a href="#"><?php echo e(__('permissions.permissions')); ?></a></li>
<li class="breadcrumb-item active" aria-current="page"><?php echo e(__('permissions.permissions_list')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<style>
/* style accordion */
.accordion[dir="ltr"] .accordion-button::after {
    margin-left: auto;
    margin-right: 0;
    transform: rotate(0deg); 
}

.accordion[dir="rtl"] .accordion-button::after {
    margin-right: auto;
    margin-left: 0;
    transform: rotate(0deg); 
}
</style>
<div class="container-fluid">
    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">

        <li class="nav-item">
            <button class="nav-link" id="role-admins-tab" data-bs-toggle="tab" data-bs-target="#role-admins"
                type="button" role="tab" aria-controls="role-admins" aria-selected="false">
                <a href="<?php echo e(route('admin-list')); ?>"><?php echo e(__('permissions.admins_list')); ?></a>
            </button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="roles-list-tab" data-bs-toggle="tab"
                data-bs-target="#roles-list" type="button" role="tab" aria-controls="roles-list"
                aria-selected="false">
                <a href="<?php echo e(route('roles-list')); ?>"><?php echo e(__('permissions.roles_list')); ?></a>
            </button>
        </li>

        <li class="nav-item">
            <button class="nav-link active" id="role-permissions-tab" data-bs-toggle="tab" data-bs-target="#role-permissions"
                type="button" role="tab" aria-controls="role-permissions" aria-selected="false">
                <a href="<?php echo e(route('permissions-list')); ?>"><?php echo e(__('permissions.permissions_list')); ?></a> &nbsp;
                <a data-bs-toggle="collapse" data-bs-target="#createNewPermission" aria-expanded="false" aria-controls="createNewPermission"
                    class="fa fa-plus"></a>
            </button>
        </li>

        <li class="nav-item p-0 w-50">
            <div class="input-group sm">
                <label class="input-group-text" for="name"><i class="fa fa-address-card"></i></label>
                <input type="text" class="form-control sm" name="name" id="name"
                    data-url="<?php echo e(route('search-permissions-by-name')); ?>"
                    onkeyup="getData(this, '#listOfPermissions')">
            </div>
        </li>

    </ul>
    <div class="py-2">
        <div class="collapse show" id="createNewPermission">
            <form class="p-3 border bg-light" action="<?php echo e(route('store-permission-info')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="input-group sm mb-2">
                    <label class="input-group-text"><?php echo e(__('permissions.name')); ?></label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo e(old('name')); ?>">
                    <label class="input-group-text"><?php echo e(__('permissions.permission_group')); ?></label>
                    <select class="form-select" name="module" id="module" required>
                        <option value="" hidden><?php echo e(__('permissions.select')); ?></option>
                        <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(old('module') == $module ? 'selected' : ''); ?> value="<?php echo e($module); ?>"><?php echo e(ucfirst($module)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['module'];
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
                </div>
                <div class="input-group sm mb-2">
                    <label class="input-group-text"><?php echo e(__('permissions.description')); ?></label>
                    <input type="text" class="form-control" name="brief" id="brief" value="<?php echo e(old('brief')); ?>" placeholder="<?php echo e(__('permissions.new_permission_description')); ?>">
                    <button type="submit" class="btn btn-sm btn-outline-primary">
                        <i class="fa fa-save"></i> &nbsp; <?php echo e(__('permissions.save')); ?>

                    </button>
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
                </div>
            </form>
        </div>
    </div>

    <div id="listOfPermissions">
    
<div class="accordion accordion-flush" id="permissionsAccordion" dir="<?php echo e(app()->getLocale() == 'ar' ? 'rtl' : 'ltr'); ?>">
    <?php $__empty_1 = true; $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="accordion-item shadow-sm rounded">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed py-2 fw-bold <?php echo e($loop->first ? 'rounded-top' : ''); ?> <?php echo e($loop->last ? 'rounded-bottom' : ''); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo e($module); ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo e($module); ?>">
                <?php echo e(ucwords(str_replace('-', ' ', $module))); ?>

            </button>
        </h2>
        <div id="flush-collapse<?php echo e($module); ?>" class="accordion-collapse collapse" data-bs-parent="#permissionsAccordion">
            <div class="accordion-body">
                <div class="row gap-0">
                    <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col col-md-4 mb-2 px-1">
                        <a class="btn w-100 btn-outline-secondary" href="<?php echo e(route('display-permission-info', $permission->id)); ?>"><?php echo e($permission->parseName()); ?></a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div><?php echo e(__('permissions.no_permissions_found')); ?></div>
    <?php endif; ?>
</div>
    </div>
</div>

<script>
    const getData = async (el, id) => {
        const search_query = el.value.length !== 0 && el.value !== '' ? el.value : null;
        if (search_query) {
            $.ajax({
                url: el.dataset.url,
                type: 'GET',
                data: {
                    search_query: el.value
                },
                success: (users) => {
                    console.log(users)
                    $(id).html(users);
                },
                error: (xhr, status, error) => {
                    console.log(error);
                }
            })
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/permissions/list.blade.php ENDPATH**/ ?>