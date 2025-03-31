<?php $__env->startSection('contents'); ?>
<div class="container-fluid content-report">
  <table class="table table-bordered table-sm mt-1  ">
    <thead>
      <tr>
                <th scope="col">#</th>
                <th scope="col">Meal</th>
                <th scope="col">Qty</th>
                <th scope="col">U.Price</th>
                <th scope="col">T.Price</th>
              
        <!-- <th class="header-color">#</th> -->
      
      </tr>
    </thead>
    <tbody>
      <?php
      $counter = 0;
      ?>
      <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($loop->iteration); ?></td>
        <td><?php echo e($oItem->product->name); ?></td>
        <td><?php echo e($oItem->quantity); ?></td>
        <td><?php echo e($oItem->price); ?></td>
        <td><?php echo e($oItem->quantity * $oItem->price); ?></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    </tbody>
  
    <tfoot>
      <tr>
        <td colspan="4" class="fw-bold text-end">Totals</td>
        <td class="price"><?php echo e($total_price); ?></td>
      </tr>
      <tr>
        <td colspan="4" class="fw-bold text-end">Vat Rate</td>
        <td class="price"><?php echo e($vat_rate); ?></td>
      </tr>
      <tr>
        <td colspan="4" class="fw-bold text-end">Total Amount</td>
        <td class="price"><?php echo e($total_amount); ?></td>
      </tr>
    </tfoot>
  </table>
  <div class="row footer-section mt-1 row">
    <div class=" col col-12"><img class="" src="<?php echo e(asset('assets/admin/uploads/images/R.png')); ?>" alt="logo_report" /></div>
            
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.reports.template1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\kashear_project\resources\views/admin/invoices/create.blade.php ENDPATH**/ ?>