<div class="row">
  <div class="col-lg-12 col-sm-12">
    <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede"><?php echo e(__('profile.account_information')); ?></h1>

    <div class="d-flex justify-content-start align-items-start setting-nav p-0">
      
      <div class="nav flex-column justify-content-start text-end" style="width:180px;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link active" id="v-pills-password-tab" data-bs-toggle="pill" data-bs-target="#v-pills-password" type="button" role="tab" aria-controls="v-pills-password" aria-selected="true">
          <?php echo e(__('profile.change_password')); ?>

        </button>
        <button class="nav-link" id="v-pills-change_email-tab" data-bs-toggle="pill" data-bs-target="#v-pills-change_email" type="button" role="tab" aria-controls="v-pills-change_email" aria-selected="false">
          <?php echo e(__('profile.change_email')); ?>

        </button>
        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-change_role_name" type="button" role="tab" aria-controls="v-pills-change_role_name" aria-selected="false">
          <?php echo e(__('profile.change_role_name')); ?>

        </button>

      </div>

      
      <div class="tab-content p-3 m-0" id="v-pills-tabContent">
        
        <div class="tab-pane fade show active" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab" tabindex="0">
          <form method="POST" action="<?php echo e(route('admins.updatePassword', $admin->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="border p-3">
              <h4 class="mb-3"><?php echo e(__('profile.change_password')); ?></h4>
              <div class="row">
                
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="current_password" class="input-group-text"><?php echo e(__('profile.current_password')); ?></label>
                    <input type="password" id="current_password" class="form-control" name="current_password" placeholder="<?php echo e(__('profile.enter_current_password')); ?>">
                    <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="new_password" class="input-group-text"><?php echo e(__('profile.new_password')); ?></label>
                    <input type="text" id="new_password" class="form-control" name="new_password" value="<?php echo e(old('new_password', $admin->profile->new_password ?? '')); ?>">
                    <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                
                <div class="col col-12 col-md-12">
                  <div class="input-group sm mb-2">
                    <label for="confirm_password" class="input-group-text"><?php echo e(__('profile.confirm_password')); ?></label>
                    <input type="text" id="confirm_password" class="form-control" name="confirm_password" value="<?php echo e(old('confirm_password', $admin->profile->confirm_password ?? '')); ?>">
                    <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
              </div>

              <div class="input-group sm mt-2" style="border-top: 1px solid #aaa">
                <button type="submit" class="py-0 btn btn-outline-primary p-3 mt-2" style="margin-inline-start: auto;"><?php echo e(__('profile.update_password')); ?></button>
              </div>
            </div>

          </form>
        </div>

        
        <div class="tab-pane fade" id="v-pills-change_email" role="tabpanel" aria-labelledby="v-pills-change_email-tab" tabindex="0">
          <form method="POST" action="">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="border p-3">
              <h4 class="mb-3"><?php echo e(__('profile.change_email')); ?></h4>
              <div class="row">
                
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="current_email" class="input-group-text"><?php echo e(__('profile.current_email')); ?></label>
                    <input type="email" id="current_email" class="form-control" name="current_email" value="<?php echo e(old('current_email', $admin->email ?? '')); ?>" readonly>
                  </div>
                </div>
                
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="new_email" class="input-group-text"><?php echo e(__('profile.new_email')); ?></label>
                    <input type="email" id="new_email" class="form-control" name="new_email" value="<?php echo e(old('new_email')); ?>">
                    <?php $__errorArgs = ['new_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
              </div>

              <div class="input-group sm mt-2" style="border-top: 1px solid #aaa">
                <button type="submit" class="py-0 btn btn-outline-primary p-3 mt-2" style="margin-inline-start: auto;"><?php echo e(__('profile.update_email')); ?></button>
              </div>
            </div>
          </form>
        </div>

        
        <div class="tab-pane fade" id="v-pills-change_role_name" role="tabpanel" aria-labelledby="v-pills-change_role_name-tab" tabindex="0">
          <form method="POST" action="">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="border p-3">
              <h4 class="mb-3"><?php echo e(__('profile.change_role_name')); ?></h4>
              <div class="row">
                
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="role_name" class="input-group-text"><?php echo e(__('profile.change_role_name')); ?></label>
                    <input type="text" id="role_name" class="form-control" name="role_name" value="<?php echo e(old('role_name', $admin->role_name ?? '')); ?>" readonly>
                  </div>
                </div>
                
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="new_job_title" class="input-group-text"><?php echo e(__('profile.new_job_title')); ?></label>
                    <input type="text" id="new_job_title" class="form-control" name="new_job_title" value="<?php echo e(old('new_job_title')); ?>">
                    <?php $__errorArgs = ['new_job_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
              </div>

              <div class="input-group sm mt-2" style="border-top: 1px solid #aaa">
                <button type="submit" class="py-0 btn btn-outline-primary p-3 mt-2" style="margin-inline-start: auto;"><?php echo e(__('profile.update_role_name')); ?></button>
              </div>
            </div>
          </form>
        </div>



      </div>


    </div>
  </div>
</div><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/users/partials/accountInfo.blade.php ENDPATH**/ ?>