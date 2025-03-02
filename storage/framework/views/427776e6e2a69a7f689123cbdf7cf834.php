

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
        <!-- هنا سيتم اضافة المنتجات -->
        <div class="row">
          <div class="col col-12 collapse  pt-3" id="addOrderForm">
            <div class="row">
              <div
                class="col ">
                <div class="card card-body">
                  <form action="/admin/orders/store" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="input-group sm mb-2">
                      <label class="input-group-text" for="type"> Client</label>
                      <select class="form-select  form-control sm py-0" name="type" id="type">
                        <option readonly>All customer</option>
                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                    <div id="items-container">
                    <div class="item mb-3">
                    <div class="input-group sm mb-2">
                      <label class="input-group-text" for="quantity">Product</label>
                      <select class="form-select  form-control sm py-0" name="admin_id" id="admin_id">
                        <option readonly>All products</option>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    
                      <label class="input-group-text" for="cost_price">Cost Price</label>
                      <input type="number" class="form-control sm" name="cost_price" id="cost_price">
                    </div>
                    <div class="input-group sm mt-2">
                      <label class="input-group-text" for="quantity">Quantity</label>
                      <input type="number" class="form-control sm" name="quantity" id="quantity">

                    </div>
                    <div class="input-group sm mt-2">
                      <label class="input-group-text" for="brief">Description</label>
                      <input type="text" class="form-control sm" name="brief" id="brief">
                      <div class="input-group-text">
                        <input class="form-check-input mt-0" name="status" type="checkbox" value="1"
                          aria-label="Checkbox for following text input">
                      </div>
                      <button type="button" class="input-group-text text-start">Active</button>
                    </div>
                    </div>
                    </div>
                    <div class="input-group sm mt-2" style="border-top: 1px solid #aaa">                  
                      <button type="submit" class="py-0 btn btn-primary p-3 mt-2" style="margin-left:850px;">Save Order</button>
                      <button type="button" class="py-0 btn btn-secondary p-3 mt-2"  id="add-item" style="margin-left:850px;">Add Another Item</button>
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
              <th>
                #
              </th>
              <th>serial_number</th>
            <th>Customer Name</th>
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
      <td><?php echo e($order->serial_number); ?></td>
      <td><?php echo e($order->customer->name); ?></td> <!-- اسم العميل -->
                <td><?php echo e($order->order_date); ?></td>
        <td>
          <?php if($order->status == 1): ?>
          <span class="badge bg-primary">New</span>
          <?php elseif($order->status == 2): ?>
          <span class="badge bg-warning">In Progress</span>
          <?php else: ?>
          <span class="badge bg-success">Completed</span>
          <?php endif; ?>
        </td>

              <td>
              <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="Add order item"
                href="<?php echo e(route('add-orderitem-input-entry', [$order->id])); ?>"><i
                  class="fa fa-square-plus text-success"></i></a>
                <a class="btn btn-sm py-0" href="<?php echo e(route('view-order-info', $order->id)); ?>"><i
                    class="fas fa-eye text-success"   title="View Details"></i></a>
                <a class="btn btn-sm py-0" href="<?php echo e(route('edit-order-info', $order->id)); ?>"><i
                    class="fa fa-edit text-primary"></i></a>
                    <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="print order"
                    href="#"><i class="fa fa-print text-secondary"></i></a>
                <a class="btn btn-sm py-0" onclick="if(!confirm('You are about to delete a order, are you sure!?.')){return false}"
                  title="Delete order and related Information" href="<?php echo e(route('destroy-order-info', $order->id)); ?>"><i
                    class="fa fa-trash text-danger"></i></a>

              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
              <td colspan="7">No product has been added yet, Add your .</td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
        let itemCount = 1;
        document.getElementById('add-item').addEventListener('click', function() {
            const container = document.getElementById('items-container');
            const newItem = document.createElement('div');
            newItem.classList.add('item', 'mb-3');
            newItem.innerHTML = `
                <h5>Item ${itemCount + 1}</h5>
                <div class="mb-3">
                    <label for="product_id" class="form-label">Product ID</label>
                    <input type="number" class="form-control" name="items[${itemCount}][product_id]" required>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" name="items[${itemCount}][quantity]" required>
                </div>
                <div class="mb-3">
                    <label for="unit_id" class="form-label">Unit ID</label>
                    <input type="number" class="form-control" name="items[${itemCount}][unit_id]" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" step="0.01" class="form-control" name="items[${itemCount}][price]" required>
                </div>
            `;
            container.appendChild(newItem);
            itemCount++;
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\kashear_project\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>