<?php $__env->startSection('title', __('admins.admins_list')); ?>
<?php $__env->startSection('header-links'); ?>
<li class="breadcrumb-item"><a href="#"><?php echo e(__('admins.admins')); ?></a></li>
<li class="breadcrumb-item active" aria-current="page"><?php echo e(__('admins.admins_list')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<div class="container-fluid">
    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <li class="nav-item d-flex">
            <button class="nav-link active my-0 py-0" id="role-admins-tab" data-bs-toggle="tab" data-bs-target="#role-admins"
                type="button" role="tab" aria-controls="role-admins" aria-selected="false">
                <a href="<?php echo e(route('admin-list')); ?>"><?php echo e(__('admins.admins_list')); ?></a>
                <a class="btn text-secondary my-0 py-0" data-bs-toggle="modal" data-bs-target="#createNewAdmin">
                    <span data-bs-toggle="tooltip" data-bs-title="<?php echo e(__('admins.create_new_admin')); ?>"></span>
                    <i class="fa fa-plus"></i>
                </a>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="roles-list-tab" data-bs-toggle="tab" data-bs-target="#roles-list"
                type="button" role="tab" aria-controls="roles-list" aria-selected="false">
                <a href="<?php echo e(route('roles-list')); ?>"><?php echo e(__('admins.roles_list')); ?></a>
            </button>
        </li>

        <li class="nav-item">
            <button class="nav-link" id="role-permissions-tab" data-bs-toggle="tab" data-bs-target="#role-permissions"
                type="button" role="tab" aria-controls="role-permissions" aria-selected="false">
                <a href="<?php echo e(route('permissions-list')); ?>"><?php echo e(__('admins.permissions_list')); ?></a>
            </button>
        </li>
    </ul>

    <!-- Search Section -->
    <div class="row">
        <div class="col col-12 pt-2">
            <div class="card card-body">
                <div class="input-group sm mb-2">
                    <label class="input-group-text" for="username"><?php echo e(__('admins.username')); ?></label>
                    <input type="text" class="form-control sm" name="username" id="username"
                        data-url="<?php echo e(route('search-admins-by-username')); ?>"
                        onkeyup="getData(this, '#listOfAdmins')">
                    <label class="input-group-text" for="email"><?php echo e(__('admins.email')); ?></label>
                    <input type="text" class="form-control sm" name="email" id="email"
                        data-url="<?php echo e(route('search-admins-by-email')); ?>"
                        onkeyup="getData(this, '#listOfAdmins')">
                </div>
                <div class="input-group sm mb-2">
                    <label class="input-group-text" for="phone"><?php echo e(__('admins.phone_number')); ?></label>
                    <input type="number" class="form-control sm" name="phone" id="phone"
                        data-url="<?php echo e(route('search-admins-by-phone')); ?>"
                        onkeyup="getData(this, '#listOfAdmins')">
                    <label class="input-group-text" for="id_number"><?php echo e(__('admins.id_number')); ?></label>
                    <input type="number" class="form-control sm" name="id_number" id="id_number"
                        data-url="<?php echo e(route('search-admins-by-id-number')); ?>"
                        onkeyup="getData(this, '#listOfAdmins')">
                    <button type="reset" class="py-0 btn btn-secondary" id="add-item"><?php echo e(__('admins.reset')); ?></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Admins List -->
    <div id="listOfAdmins">
        <table class="table table-striped mt-2">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(__('admins.username')); ?></th>
                    <th><?php echo e(__('admins.name')); ?></th>
                    <th><?php echo e(__('admins.email')); ?></th>
                    <th><?php echo e(__('admins.position')); ?></th>
                    <th><?php echo e(__('admins.control')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($admin->userName); ?></td>
                    <td><?php echo e($admin->profile->full_name()); ?></td>
                    <td><?php echo e($admin->email); ?></td>
                    <td><?php echo e($admin->role()); ?></td>
                    <td>
                        <form action="<?php echo e(route('destroy-admin-info', $admin->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <a class="btn btn-sm py-0" href="<?php echo e(route('display-admin-info', $admin->id)); ?>">
                                <i class="fas fa-eye text-success" title="<?php echo e(__('admins.view_details')); ?>"></i>
                            </a>
                            <a class="btn btn-sm py-0" href="<?php echo e(route('edit-admin-info', $admin->id)); ?>">
                                <i class="fa fa-edit text-primary"></i>
                            </a>
                            <button class="btn btn-sm py-0"
                                onclick="if(!confirm('<?php echo e(__('admins.delete_confirmation')); ?>')){return false}"
                                title="<?php echo e(__('admins.delete')); ?>">
                                <i class="fa fa-trash text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7"><?php echo e(__('admins.no_admins_added')); ?></td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Create New Admin Modal -->
<div class="modal fade mt-5 pt-5" id="createNewAdmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="createNewAdminLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createNewAdminLabel"><?php echo e(__('admins.create_new_admin')); ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('store-admin-info')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="input-group sm mb-2">
                        <label class="input-group-text" for="first_name"><?php echo e(__('admins.first_name')); ?></label>
                        <input type="text" class="form-control sm" name="first_name" id="first_name">
                    </div>
                    <div class="input-group sm mb-2">
                        <label class="input-group-text" for="last_name"><?php echo e(__('admins.last_name')); ?></label>
                        <input type="text" class="form-control sm" name="last_name" id="last_name">
                    </div>
                    <div class="input-group sm mb-2">
                        <label class="input-group-text" for="userName"><?php echo e(__('admins.username')); ?></label>
                        <input type="text" class="form-control sm" name="userName" id="userName">
                    </div>
                    <div class="input-group sm mb-2">
                        <label class="input-group-text" for="email"><?php echo e(__('admins.email')); ?></label>
                        <input type="email" class="form-control sm" name="email" id="email">
                    </div>
                    <div class="input-group sm mb-2">
                        <label class="input-group-text" for="password"><?php echo e(__('admins.password')); ?></label>
                        <input type="password" class="form-control sm" name="password" id="password">
                    </div>
                    <div class="input-group sm mb-2">
                        <label class="input-group-text" for="password_confirmation"><?php echo e(__('admins.confirm_password')); ?></label>
                        <input type="password" class="form-control sm" name="password_confirmation"
                            id="password_confirmation">
                    </div>
                    <div class="d-flex justify-content-end sm mb-2 gap-1">
                        <button type="submit" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-save"></i> <?php echo e(__('admins.save')); ?>

                        </button>
                        <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-secondary">
                            <i class="fa fa-times"></i> <?php echo e(__('admins.cancel')); ?>

                        </button>
                    </div>
                </form>
            </div>
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
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/admins/index.blade.php ENDPATH**/ ?>