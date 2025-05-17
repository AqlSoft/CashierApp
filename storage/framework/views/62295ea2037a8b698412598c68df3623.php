<?php $__env->startSection('contents'); ?>
<div class="container-fluid">
  <div class="row">

    <div class="col-md-12">
      <div id="">
        <h1 class="mt-3 pb-2 header-border"><?php echo e(__('monyBoxes.list')); ?>

          <a class="ms-3 add-icon" data-bs-toggle="collapse" data-bs-target="#addMonyBoxForm" aria-expanded="false"
            aria-controls="addMonyBoxForm">
            <i data-bs-toggle="tooltip" title="<?php echo e(__('monyBoxes.add_new')); ?>" class="fa fa-plus"></i>
          </a>
        </h1>
       
        <!-- هنا سيتم اضافة الخزن -->
        <div class="row">
          <div class="col col-12 collapse pt-3" id="addMonyBoxForm">
            <div class="row">
              <div class="col ">
                <div class="card card-body">
                  <form action="<?php echo e(route('store-Mony-box')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="input-group sm mb-2">
                      <label class="input-group-text" for="name"><?php echo e(__('monyBoxes.name')); ?></label>
                      <input type="text" class="form-control sm" name="name" id="name" value="">
                      <label class="input-group-text" for="date"><?php echo e(__('monyBoxes.date')); ?></label>
                      <input type="datetime-local" value="<?php echo e(date('Y-m-d')); ?>" placeholder="YYYY-MM-DD" class="fc-datepicker form-control sm" name="date" id="date">
                    </div>
                    <div class="input-group sm mt-2">
                      <label class="input-group-text" for="last_isal_exhcange"><?php echo e(__('monyBoxes.last_exchange')); ?></label>
                      <input type="text" class="form-control sm" name="last_isal_exhcange" id="last_isal_exhcange">
                      <label class="input-group-text" for="last_isal_collect"><?php echo e(__('monyBoxes.last_collection')); ?></label>
                      <input type="text" class="form-control sm" name="last_isal_collect" id="last_isal_collect">
                      <div class="input-group-text">
                        <input class="form-check-input mt-0" name="status" type="checkbox" value="true"
                          aria-label="Checkbox for following text input">
                      </div>
                      <button type="button" class="input-group-text text-start"><?php echo e(__('monyBoxes.active')); ?></button>
                    </div>
                    <div class="input-group d-flex sm mt-2 justify-content-end" style="border-top: 1px solid #aaa">
                      <button type="submit" class="py-0 btn btn-primary p-3 mt-2"><?php echo e(__('monyBoxes.save')); ?></button>
                      <button type="reset" class="py-0 btn btn-secondary p-3 mt-2" id="add-item"><?php echo e(__('monyBoxes.reset')); ?></button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="py-2" style="border-bottom: 1px solid #dedede"></div>
          </div>
        </div>
        <!-- هنا سيتم عرض الخزن -->
        <table class="table table-striped mt-3">
          <thead class="table-light">
            <tr>
              <th>#</th>
              <th><?php echo e(__('monyBoxes.name')); ?></th>
              <th><?php echo e(__('monyBoxes.date')); ?></th>
              <th><?php echo e(__('monyBoxes.last_exchange')); ?></th>
              <th><?php echo e(__('monyBoxes.last_collection')); ?></th>
              <th><?php echo e(__('monyBoxes.status')); ?></th>
              <th><?php echo e(__('monyBoxes.actions')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php if(count($m_boxes)): ?>
            <?php $__currentLoopData = $m_boxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m_box): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($loop->iteration); ?></td>
              <td><?php echo e($m_box->name); ?></td>
              <td><?php echo e($m_box->date); ?></td>
              <td><?php echo e($m_box->last_isal_exhcange); ?></td>
              <td><?php echo e($m_box->last_isal_collect); ?></td>
              <td>
                <span class="badge bg-<?php echo e($m_box->status == 'Active' ? 'success' : 'danger'); ?>"><?php echo e($m_box->status); ?></span>
              </td>
              <td>
                <a class="btn btn-sm btn-info py-0" href="#"><i class="fas fa-eye" title="<?php echo e(__('monyBoxes.view_details')); ?>"></i></a>
                <a class="btn btn-sm btn-warning py-0" href="<?php echo e(route('edit-monyBox-info', $m_box->id)); ?>">
                  <i class="fa fa-edit"></i>
                </a>
                <a class="btn btn-sm py-0 btn-danger" onclick="if(!confirm('<?php echo e(__('monyBoxes.confirm_delete')); ?>')){return false}"
                  title="<?php echo e(__('monyBoxes.delete_box')); ?>" href="<?php echo e(route('destroy-monyBox-info', $m_box->id)); ?>">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
              <td colspan="7"><?php echo e(__('monyBoxes.no_boxes_yet')); ?></td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/monyboxes/index.blade.php ENDPATH**/ ?>