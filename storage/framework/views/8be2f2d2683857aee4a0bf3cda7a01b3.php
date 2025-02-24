
<?php $__env->startSection('contents'); ?>
<h2 class="mt-4 pb-2" style="border-bottom: 1px solid #dedede"><i class="fa fa-edit px-1"></i> Edit product Info  </h2>
<fieldset class="mt-2 mb-4 mx-0 mb-0 shadow-sm">

  <div class="row">
    <div
      class=" card-body ">
      <form action="<?php echo e(route('update-product-info')); ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
        <?php echo csrf_field(); ?>
        <div class="input-group  mb-2">
          <label class="input-group-text text-muted" for="product"><i
              class="fa fa-tag  px-2"></i>Product Name</label>
          <input type="text" class="form-control " name="name"
            value="<?php echo e(old('name', $product)); ?>" />
          <label class="input-group-text text-muted" for="category"><i class="fa fa-tags  px-2"></i>
            Category</label>
          <select class="form-select form-control sm py-0" name="category" id="category">
            <option readonly>All Categery Types</option>
            <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
          <label class="input-group-text" for="admin_id">Person</label>
          <select class="form-select  form-control sm py-0" name="admin_id" id="admin_id">
            <option readonly>All Persons</option>
            <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($admin->id); ?>"><?php echo e($admin->userName); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
        <div class="input-group  mt-2">
          <label class="input-group-text text-muted" for="cost_price"><i
              class="fa fa-sticky-note  px-2"></i>Cost Price</label>
          <input type="text" class="form-control" name="cost_price" id="cost_price"
            value="<?php echo e(old('cost_price', $product)); ?>">
          <label class="input-group-text text-muted" for="cost_price"><i
              class="fa fa-sticky-note  px-2"></i>Quantity</label>
          <input type="text" class="form-control" name="quantity" id="quantity"
            value="<?php echo e(old('quantity', $product)); ?>">
          <label class="input-group-text" for="quantity">Status</label>
          <select class="form-select form-control sm py-0" name="status" id="status">
            <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
        <div class="input-group  mt-2">
          <label class="input-group-text text-muted" for="brief"><i
              class="fa fa-file-alt  px-2"></i>Description</label>
          <input type="text" class="form-control " name="brief" id="brief"
            value="<?php echo e(old('description', $product)); ?>">

          <button type="reset" class="input-group-text btn py-0 btn-outline-secondary"
            data-bs-toggle="tooltip" data-bs-placement="top" title="Reset form to original values">
            <i class="fas fa-undo me-1"></i> Reset
          </button>
          <button type="submit" class="input-group-text btn py-0 btn-primary" data-bs-toggle="tooltip"
            data-bs-placement="top" title="Save receipt Info changes">
            <i class="fas fa-save me-1"></i> Update
          </button>
        </div>
    </div>

    <!-- <div class="input-group  mt-2">
                                      <button type="reset" class="form-control btn btn-outline-info py-0">Reset Form</button>
                                      <button type="submit" class="form-control btn btn-outline-primary py-0">Edit Receipt</button>
                                    </div> -->


    </form>
  </div>

  </div>
</fieldset>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\kashear_project\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>