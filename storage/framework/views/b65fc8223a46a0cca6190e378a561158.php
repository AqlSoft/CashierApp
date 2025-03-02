

<?php $__env->startSection('contents'); ?>
<div class="container-fluid">
  <div class="row">

    <div class="col-md-12">
      <div id="products-container">
        
        <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">Display Products List
          <a class="ms-3 add-icon" data-bs-toggle="collapse" data-bs-target="#addProductForm" aria-expanded="false"
            aria-controls="addProductForm">
            <i data-bs-toggle="tooltip" title="Add New product" class="fa fa-plus"></i>
          </a>
        </h1>
          <!-- هنا سيتم اضافة المنتجات -->
        <div class="row">
          <div class="col col-12 collapse  pt-3" id="addProductForm">
            <div class="row">
              <div
                class="col ">
                <div class="card card-body">
                  <form action="/admin/products/store" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="input-group sm mb-2">
                      <label class="input-group-text" for="quantity">Categery</label>
                      <select class="form-select form-control sm py-0" name="category" id="category">
                        <option readonly>All Categery Types</option>
                        <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                      <label class="input-group-text" for="name">Product Name</label>
                      <input type="text" class="form-control sm" name="name" id="name" value="">
                      <label class="input-group-text" for="cost_price">Cost Price</label>
                      <input type="number" class="form-control sm" name="cost_price" id="cost_price">

                    </div>
                    <div class="input-group sm mt-2">

                      <label class="input-group-text" for="admin_id">Person</label>
                      <select class="form-select  form-control sm py-0" name="admin_id" id="admin_id">
                        <option readonly>All Persons</option>
                        <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($admin->id); ?>"><?php echo e($admin->userName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
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
                    <div class="input-group sm mt-2" style="border-top: 1px solid #aaa">
                      
                      <button type="submit" class="py-0 btn btn-primary p-3 mt-2" style="margin-left:850px;">Save product</button>
                    </div>
                  </form>
                </div>
              </div>

            </div>
            <div class="py-2" style="border-bottom: 1px solid #dedede"></div>
          </div>
        </div>
        <!-- هنا سيتم عرض المنتجات -->
        <table class="table table-striped  mt-3 ">
          <thead>
            <tr>
              <th>
                #
              </th>
              <th>Name</th>
              <th>Cost Price</th>
              <th>QTY</th>
              <th>Admin</th>
              <th>Status</th>
              <th>Control</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php
            $counter = 0;
            ?>
            <?php if(count($products)): ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>

              <td><?php echo e(++$counter); ?></td>
              <td><?php echo e($product->name); ?></td>
              <td><?php echo e($product->cost_price); ?></td>
              <td><?php echo e($product->quantity); ?></td>
              <td><?php echo e($product->creator->userName); ?></td>
              <td>  
                <?php if($product->status === 1): ?>
              <span
                class=" text-success"><?php echo e($status[$product->status]); ?></span>
            <?php else: ?>
              <span class=" text-danger"><?php echo e($status[$product->status]); ?></span>
              <?php endif; ?>
              
              <td>
              <a class="btn btn-sm py-0" href="<?php echo e(route('view-product-info', $product->id)); ?>"><i
              class="fas fa-eye text-success"></i></a>
                <a class="btn btn-sm py-0" href="<?php echo e(route('edit-product-info', $product->id)); ?>"><i
                    class="fa fa-edit text-primary"></i></a>

                <a class="btn btn-sm py-0" onclick="if(!confirm('You are about to delete a product, are you sure!?.')){return false}"
                  title="Delete Product and related Information" href="<?php echo e(route('destroy-product-info', $product->id)); ?>"><i
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



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\kashear_project\resources\views/admin/products/index.blade.php ENDPATH**/ ?>