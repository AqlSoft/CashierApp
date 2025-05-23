<?php $__env->startSection('contents'); ?>
<div class="row">
  <div class="col col-10">
    <div class="d-flex justify-content-between align-items-center gap-1" style="border-bottom: 1px solid #dedede">
      <h2 class="mt-4 pb-2" style="width:300px;">
        <i class="fas fa-info-circle "></i><?php echo e(__('products.show-title')); ?>

      </h2>
      <div class="input-group pt-2 mx-5">
        <a href="<?php echo e(route('display-product-all')); ?>"
          class="btn px-3 py-1 btn-outline-secondary btn-sm">
          <i class="fas fa-arrow-circle-left"></i> <?php echo e(__('products.action-back')); ?></a>
        <button id="editBtn" type="button" class="btn py-1 btn-outline-info btn-sm">
          <i class="fa fa-edit"></i> <?php echo e(__('products.action-edit')); ?>

        </button>
        <a class="btn py-1 px-3 btn-outline-warning btn-sm"
          href=""><i class="fa fa-gift "></i> <?php echo e(__('products.action-offer')); ?></a>
        <a href="<?php echo e(route('park-product',  [$product->id])); ?>" class="btn py-1 px-3 btn-outline-primary btn-sm">
          <i class="fa fa-parking "></i> <?php echo e(__('products.action-park')); ?></a>
        <a href="" class="btn px-3 py-1 btn-outline-danger btn-sm"
          onclick="if(!confirm('You are about to delete a product, are you sure!?.')){return false}"
          title="Delete Product and related Information" href="<?php echo e(route('destroy-product-info',  $product->id)); ?>"><i
            class="fa fa-trash "></i> <?php echo e(__('products.action-delete')); ?>

        </a>
        <a class="btn px-3py-1 btn-outline-secondary btn-sm"
          href="<?php echo e(route('cancel-product-info',  $product->id)); ?>"><i
            class="fa fa-times "></i><?php echo e(__('products.action-cancel')); ?></a>
      </div>
    </div>

    <form action="<?php echo e(route('update-product-info')); ?>" method="POST" id="productForm">
      <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
      <?php echo csrf_field(); ?>
      <fieldset class="mt-2 ms-0 mb-0 shadow-sm" id="productFieldset" disabled>
        <div class="row mt-2">
          <div class="col-lg-10 col-sm-10">
            <div class="bulk border-dark p-0 m-1">
              <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3"><?php echo e(__('products.category')); ?>:</div>
                <div class="col col-9">
                  <input type="text" class="form-control-plaintext" readonly value="<?php echo e($product->category->cat_name); ?>">
                </div>
              </div>
              <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3"><?php echo e(__('products.name')); ?>:</div>
                <div class="col col-9">
                  <input type="text" class="form-control" name="name" value="<?php echo e($product->name); ?>">
                </div>
              </div>
              <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3"><?php echo e(__('products.brief')); ?>:</div>
                <div class="col col-9">
                  <input type="text" class="form-control" name="description" value="<?php echo e($product->description); ?>">
                </div>
              </div>
              <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3"><?php echo e(__('products.cost_price')); ?>:</div>
                <div class="col col-9">
                  <input type="number" class="form-control" name="cost_price" value="<?php echo e($product->cost_price); ?>">
                </div>
              </div>
              <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3"><?php echo e(__('products.sale_price')); ?>:</div>
                <div class="col col-9">
                  <input type="number" class="form-control" name="sale_price" value="<?php echo e($product->sale_price); ?>">
                </div>
              </div>
              <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3"><?php echo e(__('products.processing_time')); ?>:</div>
                <div class="col col-9">
                  <input type="time" class="form-control" name="processing_time" value="<?php echo e($product->processing_time); ?>">
                </div>
              </div>
              <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3"><?php echo e(__('products.status')); ?>:</div>
                <?php
                $statuses = \App\Models\Product::getStatusPro();
                $statusText = $statuses[$product->status] ?? 'Unknown Status';
                $statusClass = match($product->status) {
                \App\Models\Product::PRODUCT_JUST_CREATED => 'text-success',
                \App\Models\Product::PRODUCT_EDITING => 'text-warning',
                \App\Models\Product::PRODUCT__PARKED => 'text-info',
                \App\Models\Product::PRODUCT__CANCELED => 'text-danger',
                default => 'text-secondary'
                };
                ?>
                <div class="col col-9 <?php echo e($statusClass); ?>">
                  <input type="text" class="form-control-plaintext" readonly value="<?php echo e($statusText); ?>">
                </div>
              </div>
              <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3"><?php echo e(__('products.created_by')); ?>:</div>
                <div class="col col-9">
                  <input type="text" class="form-control-plaintext" readonly value="<?php echo e($product->creator->userName); ?>">
                </div>
              </div>
              <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3"><?php echo e(__('products.created_at')); ?>:</div>
                <div class="col col-9">
                  <input type="text" class="form-control-plaintext" readonly value="<?php echo e($product->created_at); ?>">
                </div>
              </div>
              <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3"><?php echo e(__('products.edited_by')); ?>:</div>
                <div class="col col-9">
                  <input type="text" class="form-control-plaintext" readonly value="<?php echo e($product->editor->userName); ?>">
                </div>
              </div>
              <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3"><?php echo e(__('products.updated_at')); ?>:</div>
                <div class="col col-9">
                  <input type="text" class="form-control-plaintext" readonly value="<?php echo e($product->updated_at); ?>">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="pt-2 px-3  justify-content-end">
          <button type="submit" class="py-0 btn btn-outline-primary p-3 mt-2" id="saveBtn" style="display:none;margin-inline-start: auto;">
            <i class="fa fa-save"></i> <?php echo e(__('products.action-save')); ?>

          </button>
        </div>
      </fieldset>
    </form>
  </div>
</div>

<script>
  document.getElementById('editBtn').onclick = function() {
    document.getElementById('productFieldset').disabled = false;
    document.getElementById('saveBtn').style.display = 'inline-block';
  };
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/products/show.blade.php ENDPATH**/ ?>