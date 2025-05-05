<?php $__env->startSection('header-links'); ?>
    <li class="breadcrumb-item"><a href="#">Account</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Profile</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h1 class="mt-3 pb-2 header-border">Profile</h1>

                <!-- تبويبات التنقل -->
                <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="PersonalInfo-tab" data-bs-toggle="tab"
                            data-bs-target="#PersonalInfo" type="button" role="tab" aria-controls="PersonalInfo"
                            aria-selected="true">Personal Info</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="sessions-tab" data-bs-toggle="tab" data-bs-target="#sessions"
                            type="button" role="tab" aria-controls="sessions" aria-selected="false">Sessions</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="statistics-tab" data-bs-toggle="tab" data-bs-target="#statistics"
                            type="button" role="tab" aria-controls="statistics" aria-selected="false">Statistics</button>
                    </li>
                    <form action="<?php echo e(route('admin.logout')); ?>" class="nav-item" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="nav-link">Logout</button>
                    </form>
                </ul>

                <!-- محتوى التبويبات -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="PersonalInfo" role="tabpanel"
                        aria-labelledby="PersonalInfo-tab">
                        <div class="profile-container">
                            <div class="profile-header">
                                <h4>Update Your Personal Info</h4>
                            </div>

                            <!-- Profile Picture Section -->
                            <?php echo $__env->make('admin.users.partials.personal-info', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                          
                        </div>
                    </div>

                    <div class="tab-pane fade" id="sessions" role="tabpanel" aria-labelledby="sessions-tab">
                      
                        <?php echo $__env->make('admin.users.partials.session-section', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>

                    <div class="tab-pane fade" id="statistics" role="tabpanel" aria-labelledby="statistics-tab">
                    <?php echo $__env->make('admin.users.partials.statistics', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/users/profile.blade.php ENDPATH**/ ?>