<div class="row">
  <div class="col-lg-12 col-sm-12">
    <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede"><?php echo e(__('profile.admin_profile')); ?></h1>

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
          <h4 class="mb-3 "><?php echo e(__('profile.basic_information')); ?></h4>
          
          <div>
            <p><?php echo e(__('profile.profile_picture')); ?>:</p>
            <form method="POST" action="" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <?php echo method_field('PUT'); ?>
              <input type="file" id="profilePhoto" name="image" class="d-none" onchange="this.form.submit()">
              <label for="profilePhoto" class="btn btn-upload">
                <i class="fas fa-camera me-2"></i><?php echo e(__('profile.change_photo')); ?>

              </label>
            </form>
            <img src="<?php echo e(asset($admin->profile->image ?? 'default-profile.png')); ?>" alt="Profile Picture" style="width: 150px; height: 150px; border-radius: 50%;">
          </div>
          
          <form method="POST" action="<?php echo e(route('admins.update', $admin->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="row mb-3">
              <div class="col col-5 fw-bold text-end"><?php echo e(__('profile.name_arabic')); ?>:</div>
              <div class="col col-7">
                <input type="text" class="form-control" name="first_name" value="<?php echo e(old('first_name', $admin->profile->first_name ?? 'N/A')); ?>" onchange="this.form.submit()" style="border:none;background-color:transparent;">
              </div>
            </div>
          </form>

          
          <form method="POST" action="<?php echo e(route('admins.update', $admin->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="row mb-3">
              <div class="col col-5 fw-bold text-end"><?php echo e(__('profile.name_english')); ?>:</div>
              <div class="col col-7">
                <input type="text" class="form-control" name="last_name" value="<?php echo e(old('last_name', $admin->profile->last_name ?? 'N/A')); ?>" onchange="this.form.submit()" style="border:none;background-color:transparent;">
              </div>
            </div>
          </form>

          
          <form method="POST" action="<?php echo e(route('admins.update', $admin->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="row mb-3">
              <div class="col col-5 fw-bold text-end"><?php echo e(__('profile.job_title')); ?>:</div>
              <div class="col col-7">
                <input type="text" class="form-control" name="job_title" value="<?php echo e(old('job_title', $admin->job_title ?? 'N/A')); ?>" onchange="this.form.submit()" style="border:none;background-color:transparent;">
              </div>
            </div>
          </form>

          
          <div class="row mb-3">
              <div class="col col-5 fw-bold text-end"><?php echo e(__('profile.hire_date')); ?>:</div>
              <div class="col col-7">
              <?php echo e($admin->created_at->format('Y-m-d')); ?>

              </div>
            </div>
            <div class="row mb-3">
              <div class="col col-5 fw-bold text-end"><?php echo e(__('profile.work_duration')); ?>:</div>
              <div class="col col-7">
              <?php echo e($admin->created_at->diffForHumans()); ?>

              </div>
            </div>

          
          <form method="POST" action="<?php echo e(route('admins.update', $admin->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="row mb-3">
              <div class="col col-5 fw-bold text-end"><?php echo e(__('profile.department_branch')); ?>:</div>
              <div class="col col-7">
                <input type="text" class="form-control" name="city" value="<?php echo e(old('city', $admin->profile->city ?? 'N/A')); ?>" onchange="this.form.submit()" style="border:none;background-color:transparent;">
              </div>
            </div>
          </form>

        
        </div>

        
        <div class="tab-pane fade" id="v-pills-contact-info" role="tabpanel" aria-labelledby="v-pills-contact-info-tab" tabindex="0">
          <h4  class="mb-3 "><?php echo e(__('profile.contact_information')); ?></h4>
          
          <form method="POST" action="<?php echo e(route('admins.update', $admin->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="row mb-3">
              <div class="col col-5 fw-bold text-end"><?php echo e(__('profile.primary_mobile')); ?>:</div>
              <div class="col col-7">
                <input type="text" class="form-control" name="phone" value="<?php echo e(old('phone', $admin->profile->phone ?? 'N/A')); ?>" onchange="this.form.submit()" style="border:none;background-color:transparent;">
              </div>
            </div>
          </form>

          
          <form method="POST" action="<?php echo e(route('admins.update', $admin->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="row mb-3">
              <div class="col col-5 fw-bold text-end"><?php echo e(__('profile.email')); ?>:</div>
              <div class="col col-7">
                <input type="email" class="form-control" name="email" value="<?php echo e(old('email', $admin->email)); ?>" onchange="this.form.submit()" style="border:none;background-color:transparent;">
              </div>
            </div>
          </form>

          
          <form method="POST" action="<?php echo e(route('admins.update', $admin->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="row mb-3">
              <div class="col col-5 fw-bold text-end"><?php echo e(__('profile.residential_address')); ?>:</div>
              <div class="col col-7">
                <input type="text" class="form-control" name="address" value="<?php echo e(old('address', $admin->profile->address ?? 'N/A')); ?>" onchange="this.form.submit()" style="border:none;background-color:transparent;">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/users/partials/personal-info.blade.php ENDPATH**/ ?>