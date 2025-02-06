<?php $__env->startSection('extra-links'); ?>
<link href="<?php echo e(asset('assets/admin/css/register.style.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center">
  <div class="main-container">
    <div class="row g-0">
      <!-- Left Side -->
      <div class="col-md-6 left-side d-flex flex-column justify-content-center text-white p-4">
        <div class="position-relative">
          <!-- Decorative Elements -->
          <div class="decoration-dot-1"></div>
          <div class="decoration-dot-2"></div>
          <div class="decoration-circle"></div>
          <div class="decoration-x">×</div>

          <h1 class="display-5 fw-bold mb-2">Join Our<br>Cashier Team</h1>
          <p class="lead fs-6 mb-0">Create your cashier account</p>
        </div>
      </div>

      <!-- Right Side -->
      <div class="col-md-6 d-flex align-items-center justify-content-center py-3">
        <div class="signup-form px-3">
          <div class="text-center mb-3">
            <div class="restaurant-icon">🏪</div>
            <h5 class="mb-2"> <?php echo e(__('Create Account')); ?></h5>
          </div>

          <form method="POST" action="<?php echo e(route('admin.register.submit')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
              <label for="userName" class="form-label small"><?php echo e(__('User Name')); ?></label>
              <input id="userName" type="text" class="form-control form-control-sm <?php $__errorArgs = ['userName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="userName"  id="userName" value="<?php echo e(old('userName')); ?>" placeholder="Enter your user name" required>
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

            <div class="mb-3">
              <label for="employeeId" class="form-label small"><?php echo e(__('Email Address')); ?></label>
              <input id="email" type="email" class="form-control form-control-sm <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required  placeholder="Enter your email address">
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
            </div>

            <div class="mb-3">
              <label for="password" class="form-label small">Password</label>
              <input type="password" class="form-control form-control-sm <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" id="password" placeholder="············" required>
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

            <div class="mb-3">
              <label for="confirmPassword" class="form-label small"><?php echo e(__('Confirm Password')); ?></label>
              <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" required placeholder="············">
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-3"> <?php echo e(__('Create Account')); ?></button>

            <div class="text-center">
              <p class="small mb-0">Already have an account? <a href="<?php echo e(route('admin.login')); ?>" class="text-decoration-none color-link">Login</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\kashear_project\resources\views/admin/auth/register.blade.php ENDPATH**/ ?>