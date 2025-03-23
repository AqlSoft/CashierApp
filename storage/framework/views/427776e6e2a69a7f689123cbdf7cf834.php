<?php $__env->startSection('contents'); ?>
<div class="container-fluid">
  <div class="row">

    <div class="col-md-12">
      <div id="products-container">

        <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">Order List
          <a class="ms-3 add-icon" data-bs-toggle="collapse" data-bs-target="#addOrderForm" aria-expanded="false"
            aria-controls="addOrderForm">
            <i data-bs-toggle="tooltip" title="Add New order" class="fa fa-plus"></i>
          </a>
        </h1>
        <!-- add Client modal -->
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
          tabindex="-1">
          <div class="modal-dialog modal-dialog-centered modal-sm ">
            <form action="/admin/clients/store" method="POST">
              <?php echo csrf_field(); ?>
              <div class="modal-content">
                <h1 class="modal-title fs-5 mt-2  ps-3" id="exampleModalToggleLabel"
                  style="border-bottom: 1px solid #dedede">Add New Client </h1>
                <div class="modal-body"> 
                <div class="input-group sm mb-2">
                <label class="input-group-text" for="vat_number">Vat Number</label>
                <input type="number" class="form-control sm" name="vat_number" id="vat_number" >
                  </div>
                  <div class="input-group sm mb-2">
                    <label class="input-group-text" for="name">Client name</label>
                    <input type="text" class="form-control sm" name="name" id="name">
                  </div>
                  <div class="input-group sm mb-2">
                    <label class="input-group-text" for="phone">Phone Number</label>
                    <input type="number" class=" form-control sm " name="phone" id="phone">
                  </div>
                  <div class="input-group sm mb-2">
                    <label class="input-group-text" for="address">Address</label>
                    <input type="text" class="form-control sm" name="address" id="address">
                  </div>
                  <div class="input-group pt-2 px-3 mt-2 justify-content-end "
                    style="border-top: 1px solid #dedede">
                    <button type="button" class="btn px-3 py-1 btn-outline-secondary btn-sm"
                      data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn px-3 py-1 btn-primary btn-sm">Save Client</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div> 
        <!-- هنا سيتم اضافة الطلبات -->
        <div class="row">
          <div class="col col-12 collapse  pt-3" id="addOrderForm">
            <div class="row">
              <div
                class="col ">
                <div class="card card-body">
                  <form action="/admin/orders/store" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="input-group sm mb-2">
                      <label class="input-group-text" for="order_sn">Order SN</label>
                      <input type="number" class="form-control sm" name="order_sn" id="order_sn" value="<?php echo e($order_SN); ?>">
                      <label class="input-group-text" for="customer_id"> Client</label>
                      <select class="form-select  form-control sm py-0" name="customer_id" id="customer_id">
                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($customer->id); ?>" <?php echo e($defaultCustomer && $customer->id == $defaultCustomer->id ? 'selected' : ''); ?>><?php echo e($customer->name); ?></option>
                        <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                      <label class="input-group-text" for="customer_id">
                        <a class="btn btn-sm py-0" href="#" data-bs-target="#exampleModalToggle"
                          data-bs-toggle="modal">
                          <i class="fa-solid fa-user-plus" title="View Details"></i></a>
                      </label>
                      <label class="input-group-text" for="order_date">Order Date</label>
                      <input type="text" value="<?php echo e(date('Y-m-d')); ?>" placeholder="YYYY-MM-DD" class="fc-datepicker form-control sm " name="order_date" id="order_date">
                    </div>
                    <div class="input-group sm mt-2">
                      <label class="input-group-text" for="notes">Notes</label>
                      <input type="text" class="form-control sm" name="notes" id="notes">
                      <div class="input-group-text">
                        <input class="form-check-input mt-0" name="status" type="checkbox" value="1"
                          aria-label="Checkbox for following text input">
                      </div>
                      <button type="button" class="input-group-text text-start">Active</button>
                    </div>
                    <div class="input-group d-flex sm mt-2 justify-content-end" style="border-top: 1px solid #aaa">
                      <button type="submit" class="py-0 btn btn-primary p-3 mt-2">Save Order</button>
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
              <th> #</th>
              <th>Order SN</th>
              <th>Client Name</th>
              <th>Order Date</th>
              <th>Status</th>
              <th>Control</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $counter = 0;
            ?>
            <?php if(count($orders)): ?>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e(++$counter); ?></td>
              <td><?php echo e($order->order_sn); ?></td>
              <td><?php echo e(@$order->customer->name); ?></td> <!-- اسم العميل -->
              <td><?php echo e($order->order_date); ?></td>
              <td>
                <?php if($order->status == 1): ?>
                <span class="badge bg-primary"><?php echo e($status[$order->status]); ?></span>
                <?php elseif($order->status == 2): ?>
                <span class="badge bg-warning"><?php echo e($status[$order->status]); ?></span>
                <?php elseif($order->status == 3): ?>
                <span class="badge bg-secondary"><?php echo e($status[$order->status]); ?></span>
                <?php elseif($order->status == 4): ?>
                <span class="badge bg-info"><?php echo e($status[$order->status]); ?></span>
                <?php elseif($order->status == 5): ?>
                <span class="badge bg-success"><?php echo e($status[$order->status]); ?></span>
                <?php else: ?>
                <span class="badge bg-danger"><?php echo e($status[$order->status]); ?></span>
                <?php endif; ?>
              </td>

              <td>
                <?php if($order->status == 1 || $order->status == 2  ): ?>
                <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="Add order item"
                  href="<?php echo e(route('add-orderitem-input-entry', [$order->id])); ?>"><i
                    class="fa fa-square-plus text-success"></i></a>
                    <a class="btn btn-sm py-0" href="<?php echo e(route('edit-order-info', $order->id)); ?>"><i
                    class="fa fa-edit text-primary"></i></a>
                    <a class="btn btn-sm py-0" onclick="if(!confirm('You are about to Archive a order, are you sure!?.')){return false}"
                  title="Archive  order and related Information" href="<?php echo e(route('destroy-order-info', $order->id)); ?>">
                  <i class="fa fa-trash text-danger"></i></a>
                <?php endif; ?>
                <a class="btn btn-sm py-0" href="<?php echo e(route('view-order-info', $order->id)); ?>"><i
                    class="fas fa-eye text-success" title="View Details"></i></a>
                    <?php if($order->status == 5): ?>
                <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="print order"
                  href="#"><i class="fa fa-print text-secondary"></i></a>
                  <?php endif; ?>
                  <?php if($order->status ==0): ?>
                  <a class="btn btn-sm py-0" onclick="if(!confirm('You are about to Archive a order, are you sure!?.')){return false}"
                  title="Archive  order and related Information" href="<?php echo e(route('destroy-order-info', $order->id)); ?>"><i
                    class="fa fa-trash text-danger"></i></a>
                  <?php endif; ?>

              

              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
              <td colspan="7">No order has been added yet, Add your .</td>
            </tr>
            <?php endif; ?>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\kashear_project\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>