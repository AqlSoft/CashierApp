<?php $__env->startSection('contents'); ?>
<div class="container-fluid">
  <div class="row">

    <div class="col-md-12">
      <div id="products-container">

        <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede"> sessions List
          <a class="ms-3 add-icon" data-bs-toggle="collapse" data-bs-target="#addShiftForm" aria-expanded="false"
            aria-controls="addShiftForm">
            <i data-bs-toggle="tooltip" title="Add New session" class="fa fa-plus"></i>
          </a>
        </h1>

        <!-- هنا سيتم اضافة الشفتات -->
        <div class="col col-12 collapse  pt-3" id="addShiftForm">
          <div class="row">
            <div class="col ">
              <div class="card card-body">
                <form action="/admin/sales-shifts/store" method="POST">
                  <?php echo csrf_field(); ?>
                  <div class="input-group sm mb-2">
                    <label class="input-group-text" for="start_time">Start Time</label>
                    <input type="date" class="form-control sm" name="start_time" id="start_time" value="<?php echo e(date('Y-m-d')); ?>" placeholder="YYYY-MM-DD">
                    <!-- <label class="input-group-text" for="start_time">End Time</label>
                      <input type="date" class="form-control sm" name="end_time" id="end_time"> -->
                    <label class="input-group-text" for="admin_id"> Admins</label>
                    <select class="form-select form-control sm py-0" name="admin_id" id="admin_id" required>
                      <?php $__empty_1 = true; $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                      <option value="<?php echo e($admin->id); ?>">
                        <?php echo e($admin->userName); ?>

                        <?php if($admin->activeShift): ?>
                        (لديه شفت نشط حالياً)
                        <?php endif; ?>
                      </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                      <option value="" disabled>لا يوجد مستخدمين متاحين</option>
                      <?php endif; ?>
                    </select>

                    <label class="input-group-text" for="opening_balance">Opening Balance</label>
                    <input type="number" class=" form-control sm " name="opening_balance" id="opening_balance">
                  </div>
                  <div class="input-group sm mt-2">
                    <label class="input-group-text" for="monybox_id"> MonyBoxes</label>
                    <select class="form-select form-control sm py-0" name="monybox_id" id="monybox_id" required>
                      <?php $__currentLoopData = $monyBoxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monyBox): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($monyBox->id); ?>">
                        <?php echo e($monyBox->name); ?>

                        <?php if($monyBox->activeShift): ?>
                        (يوجد شفت نشط حالياً)
                        <?php endif; ?>
                      </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <label class="input-group-text" for="notes">Notes</label>
                    <input type="text" class="form-control sm" name="notes" id="notes">
                    <!-- <div class="input-group-text">
                      <input class="form-check-input mt-0" name="status" type="checkbox" value="true"
                        aria-label="Checkbox for following text input">
                    </div>
                    <button type="button" class="input-group-text text-start">Active</button> -->
                  </div>
                  <div class="input-group d-flex sm mt-2 justify-content-end" style="border-top: 1px solid #aaa">
                    <button type="submit" class="py-0 btn btn-primary p-3 mt-2">Save Shift</button>
                    <button type="reset" class="py-0 btn btn-secondary p-3 mt-2" id="add-item">reset</button>
                  </div>
                </form>
              </div>
            </div>

          </div>
          <div class="py-2" style="border-bottom: 1px solid #dedede"></div>
        </div>
      </div>
      <!-- هنا سيتم عرض المنتجات -->
      <table class="table table-striped  mt-3">
        <thead>
          <tr>
            <th>#</th>
            <th>MonyBox</th>
            <th>Admin</th>
            <th>Opening Balance</th>
            <th>Status</th>
            <th>Start Time</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $shifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($shift->monybox->name); ?></td>
            <td><?php echo e($shift->admin->userName); ?></td>
            <td><?php echo e($shift->opening_balance); ?></td>
            <td>
              <span class="badge bg-<?php echo e($shift->status == 'Active' ? 'success' : 'danger'); ?>">
                <?php echo e($shift->status); ?>

              </span>
            </td>
            <td><?php echo e($shift->start_time->format('Y-m-d H:i')); ?></td>
            <td>
              <a href="" class="btn btn-sm btn-info">
                <i class="fas fa-eye"></i>
              </a>
              <a href="<?php echo e(route('edit-shift-info',  $shift)); ?>" class="btn btn-sm btn-warning">
                <i class="fas fa-edit"></i>
              </a>
              <a href="<?php echo e(route('destroy-shift-info', $shift)); ?>" class="btn btn-sm btn-danger">
                <i class="fas  fa-trash"></i>
              </a>
              <?php if($shift->status == 'Active'): ?>
              <a href="<?php echo e(route('shifts.close', $shift->id)); ?>" class="btn btn-sm btn-secondary">

                <i class="fas fa-lock"></i> Close

                </form>
                <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<script>
  var date = $('.fc-datepicker').datepicker({
    dateFormat: 'yy-mm-dd'
  }).val();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/shifts/index.blade.php ENDPATH**/ ?>