<div class="row">
  <div class="col-lg-12 col-sm-12">
    <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede"><?php echo e(__('profile.account_settings')); ?></h1>

    <div class="d-flex justify-content-start align-items-start setting-nav p-0">
      
      <div class="nav flex-column justify-content-start text-end" style="width:180px;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link active" id="v-pills-password-tab" data-bs-toggle="pill" data-bs-target="#v-pills-password" type="button" role="tab" aria-controls="v-pills-password" aria-selected="true">
          <?php echo e(__('profile.change_password')); ?>

        </button>
        <button class="nav-link" id="v-pills-notifications-tab" data-bs-toggle="pill" data-bs-target="#v-pills-notifications" type="button" role="tab" aria-controls="v-pills-notifications" aria-selected="false">
          <?php echo e(__('profile.notifications')); ?>

        </button>
        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">
          <?php echo e(__('profile.internal_communication')); ?>

        </button>
        <button class="nav-link" id="v-pills-training-tab" data-bs-toggle="pill" data-bs-target="#v-pills-training" type="button" role="tab" aria-controls="v-pills-training" aria-selected="false">
          <?php echo e(__('profile.training_records')); ?>

        </button>
      </div>

      
      <div class="tab-content p-3 m-0" id="v-pills-tabContent">
        
        <div class="tab-pane fade show active" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab" tabindex="0">
          <h4><?php echo e(__('profile.change_password')); ?></h4>
          <form method="POST" action="<?php echo e(route('admins.updatePassword', $admin->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="row mb-3">
              <div class="col col-5 fw-bold text-end"><?php echo e(__('profile.current_password')); ?>:</div>
              <div class="col col-7">
                <input type="password" class="form-control" name="current_password" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col col-5 fw-bold text-end"><?php echo e(__('profile.new_password')); ?>:</div>
              <div class="col col-7">
                <input type="password" class="form-control" name="new_password" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col col-5 fw-bold text-end"><?php echo e(__('profile.confirm_password')); ?>:</div>
              <div class="col col-7">
                <input type="password" class="form-control" name="confirm_password" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo e(__('profile.update_password')); ?></button>
          </form>
        </div>

        
        <div class="tab-pane fade" id="v-pills-notifications" role="tabpanel" aria-labelledby="v-pills-notifications-tab" tabindex="0">
          <h4><?php echo e(__('profile.notifications')); ?></h4>
          <form method="POST" action="">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="enable_notifications" id="enable_notifications" <?php echo e($admin->profile->enable_notifications ? 'checked' : ''); ?>>
              <label class="form-check-label" for="enable_notifications">
                <?php echo e(__('profile.enable_notifications')); ?>

              </label>
            </div>
            <button type="submit" class="btn btn-primary mt-3"><?php echo e(__('profile.save_changes')); ?></button>
          </form>
        </div>

        
        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">
          <h4><?php echo e(__('profile.internal_communication')); ?></h4>
          <p><?php echo e(__('profile.messages_from_colleagues')); ?></p>
          <p><?php echo e(__('profile.important_notifications')); ?></p>
          <p><?php echo e(__('profile.requests_for_leave')); ?></p>
        </div>

        
        <div class="tab-pane fade" id="v-pills-training" role="tabpanel" aria-labelledby="v-pills-training-tab" tabindex="0">
          <h4><?php echo e(__('profile.training_records')); ?></h4>
          <p><?php echo e(__('profile.completed_training_courses')); ?></p>
          <ul>
            <li><?php echo e(__('profile.course_1')); ?></li>
            <li><?php echo e(__('profile.course_2')); ?></li>
          </ul>
          <p><?php echo e(__('profile.skills_acquired')); ?></p>
          <ul>
            <li><?php echo e(__('profile.skill_1')); ?></li>
            <li><?php echo e(__('profile.skill_2')); ?></li>
          </ul>
          <p><?php echo e(__('profile.future_training_needs')); ?></p>
          <ul>
            <li><?php echo e(__('profile.advanced_cashier_training')); ?></li>
            <li><?php echo e(__('profile.customer_service_excellence')); ?></li>
          </ul>
        </div>
      </div>

      
    </div>
  </div>
</div><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/users/partials/setting.blade.php ENDPATH**/ ?>