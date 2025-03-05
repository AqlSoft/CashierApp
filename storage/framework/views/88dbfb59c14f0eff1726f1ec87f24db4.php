

<?php $__env->startSection('extra-links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/orderitem.css')); ?>">
<style>
  .table th {
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.75rem;
    letter-spacing: 0.5px;
    background: #d3dce3;
    color: #000;
    padding-top: 10px;
  }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<h1 class="mt-3 pb-2 " style="border-bottom: 2px solid #dedede">Order Details
</h1>

<fieldset class="table mt-3">

  <div class="row mt-3">
    <div class="col col-2 text-end fw-bold">Serial Number:</div>
    <div class="col col-4"> <?php echo e($order->serial_number); ?></div>
    <div class="col col-2 text-end fw-bold">Date Expiry:</div>
    <div class="col col-4"><?php echo e($order->order_date); ?></div>
    <div class="col col-2 text-end fw-bold">Representative:</div>
    <div class="col col-4"><?php echo e($order->customer->name); ?></div>
    <div class="col col-2 text-end fw-bold">Status:</div>
    <div class="col col-4">
      <?php if($order->status == 1): ?>
      <span class="bg-transparent text-primary">New</span>
      <?php elseif($order->status == 2): ?>
      <span class=" text-warning">In Progress</span>
      <?php else: ?>
      <?php endif; ?>
    </div>

  </div>

  <table class="mt-3 w-100   table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>category</th>
        <th>Product</th>
        <th>price</th>
        <th>Unit</th>
        <th>Quantity</th>
        <th>Notes</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

      <?php
      $counter = 0;
      ?>
      <?php if(count($orderItems)): ?>
      <?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e(++$counter); ?></td>
        <td><?php echo e($orderItem->id); ?></td>
        <td><?php echo e($orderItem->order->id); ?></td> <!-- عرض معرف الطلب -->
        <td><?php echo e($orderItem->category->name); ?></td> <!-- عرض اسم الفئة -->
        <td><?php echo e($orderItem->product->name); ?></td> <!-- عرض اسم المنتج -->
        <td><?php echo e($orderItem->quantity); ?></td>
        <td><?php echo e($orderItem->unit->name); ?></td> <!-- عرض اسم الوحدة -->
        <td><?php echo e($orderItem->price); ?></td>
        <td><?php echo e($orderItem->notes); ?></td>

      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php else: ?>
      <tr>
        <td colspan="7">No product has been added yet, Add your .</td>
      </tr>
      <?php endif; ?>
    </tbody>

  </table>

  <div class="input-group pt-2 px-3 justify-content-end">
    <button class="btn px-3 py-1 btn-outline-secondary btn-sm" title="Bach to Order">
      Bach to Order
    </button>

    <button class="btn px-3 py-1 btn-outline-secondary btn-sm" title="Confirm Order">
      Confirm Order
    </button>
    <button class="btn px-3 py-1 btn-outline-secondary btn-sm" title="Cancel Order">
      Cancel Order
    </button>
  </div>
</fieldset>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\kashear_project\resources\views/admin/invoice/create.blade.php ENDPATH**/ ?>