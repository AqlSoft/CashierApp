<?php $__env->startSection('contents'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div id="products-container">

                <ul class="nav nav-tabs my-2" id="myTab" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link" id="role-admins-tab" data-bs-toggle="tab" data-bs-target="#role-admins"
                            type="button" role="tab" aria-controls="role-admins" aria-selected="false"><a href="<?php echo e(route('admin-list')); ?>">Admins List</a></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="edit-admin-info-tab" data-bs-toggle="tab"
                            data-bs-target="#edit-admin-info" type="button" role="tab" aria-controls="edit-admin-info"
                            aria-selected="true">Edit Admin info</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="admin-permissions-tab" data-bs-toggle="tab" data-bs-target="#admin-permissions"
                            type="button" role="tab" aria-controls="admin-permissions" aria-selected="false">Permissions</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="edit-admin-info" role="tabpanel" aria-labelledby="edit-admin-info" tabindex="0">
                        <div class="row">
                            <div class="col col-8 mb-3 p-1">
                                <div class="card w-100">
                                    <div class="card-header">
                                        <h5 class="card-title py-2">
                                            <?php echo e(__('Account Basic Info')); ?>

                                        </h5>
                                    </div>
                                    <form action="<?php echo e(route('update-admin-info')); ?>" method="POST">
                                        <div class="card-body">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('put'); ?>

                                            <div class="input-group sm mb-2">
                                                <label class="input-group-text" for="userName">User Name</label>
                                                <input type="text" class=" form-control sm " name="userName" id="userName"
                                                    value="<?php echo e(old('last_name', $admin->profile)); ?>">
                                            </div>
                                            <?php $__errorArgs = ['userName'];
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
                                                <label class="input-group-text" for="email">Email</label>
                                                <input type="email" class="form-control sm" name="email" id="email"
                                                    value="<?php echo e(old('last_name', $admin->profile)); ?>">
                                            </div>
                                            <?php $__errorArgs = ['email'];
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
                                                <label class="input-group-text" for="role_name"><?php echo e(__('Role')); ?></label>
                                                <select class="form-select sm" name="role_name" id="role_name"
                                                    value="<?php echo e(old('last_name', $admin->profile)); ?>">
                                                    <option hidden><?php echo e(__('Select Role')); ?></option>
                                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($role); ?>"><?php echo e(__('admins.' . $role)); ?>

                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <?php $__errorArgs = ['role_name'];
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
                                            <button type=submit class="btn py-0 btn-outline-primary"><i
                                                    class="fa fa-save me-2"></i>
                                                <?php echo e(__('Update')); ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            
                            <div class="col col-4 mb-3 p-1">
                                <div class="card w-100">
                                    <div class="card-header">
                                        <h5 class="card-title py-2"><?php echo e(__('Change Password')); ?></h5>
                                    </div>
                                    <form action="<?php echo e(''); ?>">
                                        <div class="card-body">
                                            <div class="input-group sm mb-2">
                                                <label class="input-group-text"
                                                    for="current_password"><?php echo e(__('Current Password')); ?></label>
                                                <input type="password" class="form-control sm" name="current_password"
                                                    id="current_password">
                                            </div>
                                            <div class="input-group sm mb-2">
                                                <label class="input-group-text"
                                                    for="new_password"><?php echo e(__('New Password')); ?></label>
                                                <input type="password" class="form-control sm" name="password"
                                                    id="new_password">
                                            </div>
                                            <div class="input-group sm mb-2">
                                                <label class="input-group-text"
                                                    for="password_confirmation"><?php echo e(__('Confirm Password')); ?></label>
                                                <input type="password" class="form-control sm" name="password_confirmation"
                                                    id="password_confirmation">
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-end">
                                                <button class="btn btn-outline-primary py-0"
                                                    type="submit"><?php echo e(__('Update Password')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            
                            <div class="col col-6 mb-3 p-1">
                                <div class="card w-100">
                                    <div class="card-header">
                                        <h5 class="card-title py-2">
                                            <?php echo e(__('Profile Identity')); ?>

                                        </h5>
                                    </div>
                                    <form action="<?php echo e(route('update-admin-info')); ?>" method="POST">
                                        <div class="card-body">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('put'); ?>

                                            <div class="input-group sm mb-2">
                                                <label class="input-group-text" for="first_name">First Name</label>
                                                <input type="text" class="form-control sm" name="first_name"
                                                    id="first_name" value="<?php echo e(old('first_name', $admin->profile)); ?>">
                                            </div>
                                            <?php $__errorArgs = ['first_name'];
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
                                                <label class="input-group-text" for="last_name">Last Name</label>
                                                <input type="text" class="form-control sm" name="last_name"
                                                    id="last_name" value="<?php echo e(old('last_name', $admin->profile)); ?>">
                                            </div>
                                            <?php $__errorArgs = ['last_name'];
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
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-end">
                                                <button type=submit class="btn py-0 btn-outline-primary"><i
                                                        class="fa fa-save me-2"></i>
                                                    <?php echo e(__('Update')); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            
                            <div class="col col-12 mb-3 p-1">
                                <div class="card w-100">
                                    <div class="card-header">
                                        <h5 class="card-title py-2">
                                            <?php echo e(__('Admin Roles Assignment')); ?>

                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <input type="hidden" name="admin_id" id="admin_id" value="<?php echo e($admin->id); ?>">
                                            <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div class="col col-md-6">
                                                <div class="form-check form-switch">
                                                    <input class="admin-role form-check-input" <?php echo e($admin->roles->contains($role->id) ? 'checked' : ''); ?> type="checkbox" role="switch" id="switch_<?php echo e($role->id); ?>" name="roles[]" value="<?php echo e($role->id); ?>">
                                                    <label class="form-check-label" for="switch_<?php echo e($role->id); ?>"><?php echo e($role->name); ?></label>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <p>No roles found</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <div class="tab-pane fade" id="admin-permissions" role="tabpanel" aria-labelledby="admin-permissions" tabindex="0">
                        Admin Permissions
                        <div class="row">
                            <?php $__empty_1 = true; $__currentLoopData = $admin->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="mb-2">
                                <div class=" border rounded px-3 py-2">
                                <div class="fw-bold" <?php echo e($admin->hasPermission($ap->id) ? 'checked' : ''); ?>>
                                    <?php echo e($ap->permission->parseName()); ?> [ <span class="text-success"><?php echo e(ucfirst($ap->permission->module)); ?> </span>]
                                </div>
                                <div class="permissionBrief">
                                    <?php echo e($ap->permission->brief); ?>

                                </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p>No permissions found</p>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div id="message" class="alert" style="display: none;"></div>
</div>
<script>
    $(document).ready(function() {
        const adminId = $('#admin_id').val();
        $('.admin-role.form-check-input').change(function() {
            let url = '';
            if ($(this).is(':checked')) {
                url = "<?php echo e(route('attach-role-to-admin', ['000'])); ?>".replace('000', adminId);
            } else {
                url = "<?php echo e(route('detach-role-from-admin', ['000'])); ?>".replace('000', adminId);
            }
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    role_id: $(this).val(),
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    $('#message').removeClass('alert-danger').addClass('alert-success').text(response.message).show();
                    setTimeout(() => {
                        $('#message').slideUp(300);
                    }, 2000);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/admins/edit.blade.php ENDPATH**/ ?>