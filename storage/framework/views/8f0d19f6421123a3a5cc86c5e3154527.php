<style>
  /* Hover effect for the profile picture */
  .position-relative:hover .btn-upload {
    opacity: 1;
    z-index: 20;
  }
</style>

<div class="row">
  <div class="col-lg-12 col-sm-12">
    <h1 class="mt-2 pb-2" style="border-bottom: 1px solid #dedede"><?php echo e(__('profile.presonal_information')); ?></h1>

    <div class="d-flex justify-content-start align-items-start setting-nav p-0">
      
      <div class="nav flex-column justify-content-start text-end" style="width:180px;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link active " id="v-pills-basic-info-tab" data-bs-toggle="pill" data-bs-target="#v-pills-basic-info" type="button" role="tab" aria-controls="v-pills-basic-info" aria-selected="true">
          <?php echo e(__('profile.basic_information')); ?>

        </button>
        <button class="nav-link" id="v-pills-contact-info-tab" data-bs-toggle="pill" data-bs-target="#v-pills-contact-info" type="button" role="tab" aria-controls="v-pills-contact-info" aria-selected="false">
          <?php echo e(__('profile.contact_information')); ?>

        </button>
      </div>

      
      <div class="tab-content p-3 m-0" id="v-pills-tabContent">
        
        <div class="tab-pane fade show active" id="v-pills-basic-info" role="tabpanel" aria-labelledby="v-pills-basic-info-tab" tabindex="0">
          <form method="POST" enctype="multipart/form-data" action="<?php echo e(route('admins.update', $admin->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?> <!-- إضافة الطريقة الصحيحة -->

            
            <div class="m-auto text-center position-relative" style="width: 120px; height: 120px;">
              <input type="file" id="profilePhoto" name="image" class="d-none" accept="image/*"> <!-- تحديد نوع الملف -->
              <label for="profilePhoto" class="position-absolute top-50 start-50 translate-middle btn btn-upload d-flex align-items-center justify-content-center" style="width: 120px; height: 100px; border-radius: 50%; background-color: rgba(0, 0, 0, 0.5); color: white; opacity: 0; transition: opacity 0.3s; cursor: pointer;">
                <i class="fas fa-camera"></i>
              </label>

              <img src="<?php echo e($admin->profile->image ? asset('assets/admin/uploads/images/avatar/' . $admin->profile->image) : asset('assets/admin/images/avatar/user-1.png')); ?>" alt="Profile Picture" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;">
              <p><strong>Welcome</strong>, <?php echo e($admin->userName); ?></p>
            </div>

            
            <div class="border p-3">
              <h4 class="mb-3"><?php echo e(__('profile.basic_information')); ?></h4>

              <div class="row">
                
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="first_name" class="input-group-text"><?php echo e(__('profile.first_name')); ?></label>
                    <input type="text" id="first_name" class="form-control" name="first_name" value="<?php echo e(old('first_name', $admin->profile->first_name ?? '')); ?>">
                    <?php $__errorArgs = ['first_name'];
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
                    <label for="last_name" class="input-group-text"><?php echo e(__('profile.last_name')); ?></label>
                    <input type="text" id="last_name" class="form-control" name="last_name" value="<?php echo e(old('last_name', $admin->profile->last_name ?? '')); ?>">
                    <?php $__errorArgs = ['last_name'];
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
                    <label for="phone" class="input-group-text"><?php echo e(__('profile.phone')); ?></label>
                    <input type="text" id="phone" class="form-control" name="phone" value="<?php echo e(old('phone', $admin->profile->phone ?? '')); ?>">
                    <?php $__errorArgs = ['phone'];
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
                    <label for="branch_id" class="input-group-text"><?php echo e(__('profile.branch')); ?></label>
                    <input type="text" id="branch_id" class="form-control" name="branch_id" value="<?php echo e(old('branch_id', $admin->profile->branch->name ?? '')); ?>">
                    <?php $__errorArgs = ['branch_id'];
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
                <h4 class="mb-3 mt-2 pt-2" style="border-top: 1px solid #aaa"></h4>

                
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="country" class="input-group-text"><?php echo e(__('profile.country')); ?></label>
                    <input type="text" id="country" class="form-control" name="country" value="<?php echo e(old('country', $admin->profile->country ?? '')); ?>">
                    <?php $__errorArgs = ['country'];
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
                    <label for="city" class="input-group-text"><?php echo e(__('profile.city')); ?></label>
                    <input type="text" id="city" class="form-control" name="city" value="<?php echo e(old('city', $admin->profile->city ?? '')); ?>">
                    <?php $__errorArgs = ['city'];
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
                    <label for="address" class="input-group-text"><?php echo e(__('profile.address')); ?></label>
                    <input type="text" id="address" class="form-control" name="address" value="<?php echo e(old('address', $admin->profile->address ?? '')); ?>">
                    <?php $__errorArgs = ['address'];
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
                <button type="submit" class="py-0 btn btn-outline-primary p-3 mt-2" style="margin-inline-start: auto;"><?php echo e(__('profile.action-update')); ?></button>
              </div>
            </div>
          </form>
        </div>

        
        <div class="tab-pane fade" id="v-pills-contact-info" role="tabpanel" aria-labelledby="v-pills-contact-info-tab" tabindex="0">
          <div class="border p-3">
            <h4 class="mb-3"><?php echo e(__('profile.contact_information')); ?></h4>
            <form method="POST" action="<?php echo e(route('admins.update', $admin->id)); ?>">
              <?php echo csrf_field(); ?>
              <?php echo method_field('PUT'); ?> <!-- إضافة الطريقة الصحيحة -->
              <?php $__empty_1 = true; $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="row">
                  <div class="col col-12 col-md-6">
                    <div class="input-group sm mb-2">
                      <label for="category_name" class="input-group-text"><?php echo e(__('profile.category_name')); ?></label>
                      <input type="text" id="category_name" class="form-control" name="category_name" value="<?php echo e(old('category_name', $contact->category_name ?? '')); ?>">
                      <?php $__errorArgs = ['category_name'];
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
                      <label for="name" class="input-group-text"><?php echo e(__('profile.name')); ?></label>
                      <input type="text" id="name" class="form-control" name="name" value="<?php echo e(old('name', $contact->name ?? '')); ?>">
                      <?php $__errorArgs = ['name'];
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
                      <label for="contact" class="input-group-text"><?php echo e(__('profile.contact')); ?></label>
                      <input type="text" id="contact" class="form-control" name="contact" value="<?php echo e(old('contact', $contact->contact ?? '')); ?>">
                      <?php $__errorArgs = ['contact'];
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
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-muted"><?php echo e(__('profile.no_contacts_found')); ?></p>
              <?php endif; ?>
              <div class="input-group sm mt-2" style="border-top: 1px solid #aaa">
                <button type="submit" class="py-0 btn btn-outline-primary p-3 mt-2" style="margin-inline-start: auto;"><?php echo e(__('profile.action-update')); ?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/users/partials/personal-info.blade.php ENDPATH**/ ?>