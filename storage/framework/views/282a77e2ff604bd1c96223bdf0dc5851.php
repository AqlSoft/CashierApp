<?php $__env->startSection('contents'); ?>

<div class="container-fluid">
  <div class="row">

    <div class="col-md-12">
      <div id="products-container">

        <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">
          <a href="<?php echo e(route('product-setting-home')); ?>" class="btn py-1 fw-bold btn-primary active">Home</a>
          <a href="<?php echo e(route('display-units-all')); ?>" class="btn py-1 fw-bold btn-primary">Units</a>
          <a href="<?php echo e(route('display-categories-all')); ?>" class="btn py-1 fw-bold btn-primary ">Categories</a>
        </h1>
      <div class="row">
            
                            <div class="col col-6 mb-3 p-1">
                                <div class="card w-100 mt-3">
                                    <div class="card-header">
                                        <h5 class="card-title py-2"><?php echo e(__('products.product_tax')); ?></h5>
                                    </div>
                                    <form action="" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="card-body">
                                            <div class="input-group sm mb-2">
                                                <label class="input-group-text" for="tax"><?php echo e(__('products.tax')); ?></label>
                                                <input type="number" class="form-control sm" name="tax" id="tax" value="">
                                            </div>
                                            
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-end">
                                                <button class="btn btn-outline-primary py-0" type="submit"><?php echo e(__('products.update_tax')); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

        </div>




      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/setting/products/index.blade.php ENDPATH**/ ?>