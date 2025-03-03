
<?php $__env->startSection('contents'); ?>
<div class="row">
  <div class="col col-8">
  <h2 class="mt-4 pb-2" style="border-bottom: 1px solid #dedede"><i class="fas fa-info-circle px-1"></i>Order Details</h2>
    <fieldset class="mt-2 ms-0 mb-0  shadow-sm">
      <div class="row mt-2">
        <div class="col-lg-12 col-sm-12">
          <div class="bulk border-dark p-0 m-1">
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1 ">
              <div class="col col-3  "> serial_number  : </div>
              <div class="col col-9 "><?php echo e($order->serial_number); ?></div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Order Date  : </div>
              <div class="col col-9 "><?php echo e($order->order_date); ?> </div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3  "> Client Name  : </div>
              <div class="col col-9 "><?php echo e($order->customer->name); ?></div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Notes  : </div>
              <div class="col col-9 "><?php echo e($order->notes); ?></div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Status  : </div>
              <div class="col col-9 "> <?php echo e($status[$order->status]); ?> </div>
            </div>
        
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Created By  : </div>
              <div class="col col-9 "> <?php echo e(@$order->creator->userName); ?></div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Date Created At  : </div>
              <div class="col col-9 "><?php echo e($order->created_at); ?></div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Edited By  : </div>
              <div class="col col-9 "><?php echo e(@$order->editor->userName); ?> </div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Date Modified: </div>
              <div class="col col-9 text-start"><?php echo e($order->updated_at); ?></div>
            </div>
          </div>
        </div>

      </div>
  </div>
  </fieldset>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\kashear_project\resources\views/admin/orders/show.blade.php ENDPATH**/ ?>