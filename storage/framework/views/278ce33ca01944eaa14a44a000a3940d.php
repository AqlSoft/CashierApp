
<?php $__env->startSection('header-links'); ?>
<li class="breadcrumb-item"><a href="#">Account</a></li>
<li class="breadcrumb-item active" aria-current="page">View Profile</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8">
      <h1 class="mt-3 pb-2 header-border"> Profile</h1>

      <!-- تبويبات التنقل -->
      <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="PersonalInfo-tab" data-bs-toggle="tab" data-bs-target="#PersonalInfo" type="button" role="tab" aria-controls="PersonalInfo" aria-selected="true">Personal Info</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="sessions-tab" data-bs-toggle="tab" data-bs-target="#sessions" type="button" role="tab" aria-controls="sessions" aria-selected="false">Sessions</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Tab Three</button>
        </li>
      </ul>

      <!-- محتوى التبويبات -->
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="PersonalInfo" role="tabpanel" aria-labelledby="PersonalInfo-tab">
          <div class="profile-container ">
            <div class="profile-header">
              <h4>Update Your Personal Info</h4>
            </div>

            <!-- Profile Picture Section -->
            <div class="row mb-4 ">
              <div class=" col col-4">
                <img src="<?php echo e(asset('assets/admin/uploads/images/avatar/avatar-04.jpg')); ?>" alt="Profile Picture" class="profile-picture">
                <div class="mt-3">
                  <input type="file" id="profilePhoto" class="d-none">
                  <label for="profilePhoto" class="btn btn-upload">
                    <i class="fas fa-camera me-2"></i>Change Photo
                  </label>
                </div>
                <small class="text-muted ">JPEG or PNG, max 2MB</small>
              </div>

              <!-- Personal Information Section -->

              <div class="col col-8 mb-2 mt-4">
                <div class="row mb-3">
                  <div class="col col-8 mb-2">
                    <form method="POST" action="<?php echo e(route('admins.update', $admin->id)); ?>">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('PUT'); ?>
                      <div class="row">
                        <div class="col col-5 fw-bold text-end">User Name:</div>
                        <div class="col col-7 text-start ">
                          <input type="text" class="form-control sm py-0 " name="userName" value="<?php echo e(old('userName', $admin->userName)); ?>"
                            onchange="this.form.submit()" style="border:none;background-color:transparent;">
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="col col-8 mb-2 ">
                    <form method="POST" action="<?php echo e(route('admins.update', $admin->id)); ?>">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('PUT'); ?>

                      <div class="row">
                        <div class="col col-5 fw-bold text-end">Job Title:</div>
                        <div class="col col-7">
                          <input type="text" name="job_title" class="form-control sm py-0" value="<?php echo e(old('job_title', $admin->job_title)); ?>"
                            onchange="this.form.submit()" style="border:none;background-color:transparent;">
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="col col-8 mb-2">
                    <form method="POST" action="<?php echo e(route('admins.update', $admin->id)); ?>">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('PUT'); ?>

                      <div class="row">
                        <div class="col col-5 fw-bold text-end">Email:</div>
                        <div class="col col-7 text-start">
                          <input type="text" class="form-control sm py-0" name="email" value="<?php echo e(old('email', $admin->email)); ?>"
                            onchange="this.form.submit()" style="border:none;background-color:transparent;width:200px">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="sessions" role="tabpanel" aria-labelledby="sessions-tab">
            <?php if($admin->shifts->isNotEmpty()): ?>
            <div class="row mt-2">
              <div class="col col-12">
                <div class="selected-products-container" style="font-size: 14px;">
                  <!-- Header Row -->
                  <div class="row g-0 border-bottom py-2  fw-bold align-items-center table-header">
                    <div class="col-1 text-center fw-bold">#</div>
                    <div class="col-3 fw-bold">Session Name</div>
                    <div class="col-3 text-center fw-bold">Start Time</div>
                    <div class="col-3 text-center fw-bold">End Time</div>
                    <div class="col-2 text-center fw-bold">Status</div>

                  </div>

                  <!-- Items Rows -->
                  <?php $__currentLoopData = $admin->shifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="row g-0 border-bottom py-2 align-items-center">
                    <div class="col-1 text-center fs-6"><?php echo e($loop->iteration); ?></div>
                    <div class="col-3 ps-2 fs-6"><?php echo e($shift->monybox->name); ?></div>
                    <div class="col-3 text-center fs-6"><?php echo e($shift->start_time->format('d/m/Y H:i')); ?></div>
                    <div class="col-3 text-center fs-6">
                      <?php if($shift->end_time): ?>
                      <?php echo e($shift->end_time->format('d/m/Y H:i')); ?>

                      <?php else: ?>
                      <span class=" btn btn-sm btn-warning">In Progress</span>
                      <?php endif; ?>
                    </div>
                    <div class="col-2 text-center fs-6"> <?php if($shift->status == 'Active'): ?>
                      <span class="btn btn-sm btn-success">Active</span>
                      <?php else: ?>
                      <span class="btn btn-sm btn-secondary">Closed</span>
                      <?php endif; ?>
                    </div>



                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>




              </div>
            </div>
            <?php else: ?>
            <div class="alert alert-info mb-0">
              No shifts found for this user
            </div>
            <?php endif; ?>
          </div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <p class="mt-3">....................</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\kashear_project\resources\views/admin/users/profile.blade.php ENDPATH**/ ?>