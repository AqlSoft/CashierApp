<?php $__env->startSection('header-links'); ?>
    <li class="breadcrumb-item"><a href="#"><?php echo e(__('profile.account')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('profile.view_profile')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<style>
  .nav-link.active {
    color: blue !important; 
    font-weight: bold; 
  }
</style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-3 pb-2 header-border"><?php echo e(__('profile.profile')); ?></h1>
                <!-- تبويبات التنقل -->
                <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="PersonalInfo-tab" data-bs-toggle="tab"
                            data-bs-target="#PersonalInfo" type="button" role="tab" aria-controls="PersonalInfo"
                            aria-selected="true"><?php echo e(__('profile.personal_info')); ?></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="jobInfo-tab" data-bs-toggle="tab" data-bs-target="#jobInfo"
                            type="button" role="tab" aria-controls="jobInfo" aria-selected="false"><?php echo e(__('profile.job_info')); ?></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="sessions-tab" data-bs-toggle="tab" data-bs-target="#sessions"
                            type="button" role="tab" aria-controls="sessions" aria-selected="false"><?php echo e(__('profile.sessions')); ?></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="security-logs-tab" data-bs-toggle="tab" data-bs-target="#security-logs"
                            type="button" role="tab" aria-controls="security-logs" aria-selected="false"><?php echo e(__('profile.security_logs')); ?></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings"
                            type="button" role="tab" aria-controls="settings" aria-selected="false"><?php echo e(__('profile.settings')); ?></button>
                    </li>
                    <form action="<?php echo e(route('admin.logout')); ?>" class="nav-item" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="nav-link"><?php echo e(__('profile.logout')); ?></button>
                    </form>
                </ul>

                <!-- محتوى التبويبات -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="PersonalInfo" role="tabpanel"
                        aria-labelledby="PersonalInfo-tab">
                            <!-- Profile Picture Section -->
                            <?php echo $__env->make('admin.users.partials.personal-info', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                  
                    </div>
                    <div class="tab-pane fade" id="jobInfo" role="tabpanel" aria-labelledby="jobInfo-tab">
                    <?php echo $__env->make('admin.users.partials.job-info', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                  </div>
                    <div class="tab-pane fade" id="sessions" role="tabpanel" aria-labelledby="sessions-tab">
                        <?php echo $__env->make('admin.users.partials.session-section', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>

                    <div class="tab-pane fade" id="security-logs" role="tabpanel" aria-labelledby="security-logs-tab">
                    <?php echo $__env->make('admin.users.partials.security-logs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                    <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                    
                    <?php echo $__env->make('admin.users.partials.setting', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/users/profile.blade.php ENDPATH**/ ?>