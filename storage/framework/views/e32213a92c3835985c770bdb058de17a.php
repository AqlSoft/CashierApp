<?php $__env->startSection('extra-links'); ?>
<link href="<?php echo e(asset('assets/admin/css/login.style.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="main-container  d-flex flex-column align-items-center justify-content-center">
      <!-- top Side -->
      <div class=" top-side ">
      <h2 class=" fw-bold mb-2 text-center pt-3"><?php echo e(__('Cashier Login')); ?></h2>
      </div>
      <div class="restaurant-icon ">🏪</div>
      <!-- bottom Side -->
      <div class="bottom-side py-3 mt-5">
        <div class="login-form px-3">
          <form method="POST" action="<?php echo e(route('admin.login.submit')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-3 input-group ">
              <label for="userName" class="input-group-text small"><?php echo e(__(' User Name')); ?></label>
              <input type="text" class="form-control w- form-control-sm <?php $__errorArgs = ['userName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                name="userName" placeholder="Username"
                value="<?php echo e(old('userName')); ?>" required placeholder="Enter your userName">

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

            </div>

            <div class="mb-3 input-group">
              <label for="password" class="input-group-text small"><?php echo e(__('Password')); ?></label>
              <input id="password" type="password" class="form-control form-control-sm <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required placeholder="············">

              <?php $__errorArgs = ['password'];
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
            <button type="submit" class="btn btn-primary w-100 mb-3 ">  <?php echo e(__('Login')); ?></button>

          </form>
        </div>
      </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>