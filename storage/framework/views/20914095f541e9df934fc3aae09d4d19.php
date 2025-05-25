<?php $__env->startSection('extra-links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/orderitem.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

<div class="container">

  <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede"><?php echo e(__('products.index-title')); ?>

    <a class="ms-3 add-icon" data-bs-toggle="collapse" data-bs-target="#addProductForm" aria-expanded="false"
      aria-controls="addProductForm">
      <i data-bs-toggle="tooltip" title="<?php echo e(__('products.add_new_product')); ?>" class="fa fa-plus"></i>
    </a>
  </h1>
  <!-- هنا سيتم اضافة المنتجات -->
  <div class="row">
    <div class="col col-12 collapse<?php echo e($errors->any() ? 'show' : ''); ?>  pt-3" id="addProductForm">
      <div class="row">
        <div class="col ">
          <div class="card card-body">
            <form action="<?php echo e(route('store-new-product')); ?>" method="POST" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <div class="input-group sm mb-2">
                <label class="input-group-text" for="quantity"><?php echo e(__('products.category')); ?></label>
                <select class="form-select form-control sm py-0 <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="category_id" id="category_id">
                  <option readonly><?php echo e(__('products.all_categery_types')); ?></option>
                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>><?php echo e($category->cat_name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <label class="input-group-text" for="name"><?php echo e(__('products.name')); ?></label>
                <input type="text" class="form-control sm <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" id="name" value="<?php echo e(old('name')); ?>">
              </div>
              <div class="input-group sm mt-2">
                <label class="input-group-text" for="sale_price"><?php echo e(__('products.sale_price')); ?></label>
                <input type="number" class="form-control sm <?php $__errorArgs = ['sale_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="sale_price" id="sale_price" value="<?php echo e(old('sale_price')); ?>">

                <label class="input-group-text" for="image"><?php echo e(__('products.image')); ?></label>
                <input type="file" class="form-control sm py-0 <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="image" id="image" accept="image/*">
              </div>
              <div class="input-group sm mt-2">
                <label class="input-group-text" for="brief"><?php echo e(__('products.brief')); ?></label>
                <input type="text" class="form-control sm <?php $__errorArgs = ['brief'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="brief" id="brief" value="<?php echo e(old('brief')); ?>">

                <div class="input-group-text">
                  <input class="form-check-input mt-0" name="status" type="checkbox" value="1"
                    aria-label="Checkbox for following text input" <?php echo e(old('status') ? 'checked' : ''); ?>>
                </div>
                <button type="button" class="input-group-text text-start"><?php echo e(__('products.active')); ?></button>
              </div>
              <div class="input-group sm mt-2" style="border-top: 1px solid #aaa">
                <button type="submit" class="py-0 btn btn-outline-primary p-3 mt-2" style="margin-inline-start: auto;"><?php echo e(__('products.action-save')); ?> </button>
              </div>

              <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="invalid-feedback d-block"><?php echo e($message); ?></span>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              <?php $__errorArgs = ['brief'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="invalid-feedback d-block"><?php echo e($message); ?></span>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="invalid-feedback d-block"><?php echo e($message); ?></span>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              <?php $__errorArgs = ['sale_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="invalid-feedback d-block"><?php echo e($message); ?></span>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="invalid-feedback d-block"><?php echo e($message); ?></span>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </form>
          </div>
        </div>
      </div>
      <div class="py-2" style="border-bottom: 1px solid #dedede"></div>
    </div>
  </div>

  <!-- هنا سيتم عرض المنتجات -->
  <div class="row mt-3 d-flex gap-3">
    <div class="col col-10 col-7 pb-3 pt-3 px-4">
      <div class="row ">
        <div class="col col-12">
          <div class="btn-group ">
            <a class="btn btn-outline-secondary <?php echo e(request('category') == null ? 'active' : ''); ?>"
              href="<?php echo e(route('display-product-all')); ?>"><?php echo e(__('products.all')); ?></a>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="btn btn-outline-primary <?php echo e(request('category') == $category->id ? 'active' : ''); ?>"
              href="<?php echo e(route('display-product-all', ['category' => $category->id])); ?>"><?php echo e($category->cat_name); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
        <div class="row mt-3 d-flex gap-2" id="product-list">
          <?php if(isset($products) && count($products)): ?>
          <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col col-2 productlist p-0 m-0"
            style="border-radius: 6px;border: 1px solid">
            <a href="<?php echo e(route('view-product-info', $product->id)); ?>">
              <button class="product-item">
                <div class="productlistimg-container">
                  <div class="productlistimg"
                    style="background-image: url('<?php echo e($product->image ? asset('assets/admin/uploads/images/products/' . $product->image) : asset('assets/admin/images/default-product.png')); ?>');">
                  </div>
                  <div class="price-overlay d-flex flex-column">
                    <h5 class="price-display"><?php echo e(number_format($product->sale_price, 2)); ?></h5>
                    <a class="btn btn-sm py-0 text-white btn-outline-primary" href="<?php echo e(route('view-product-info', $product->id)); ?>">
                      <?php echo e(__('products.action-more')); ?></a>
                  </div>
                </div>
                <div class="productlistcontent">
                  <h5 class="mt-1"><?php echo e($product->name); ?></h5>
                </div>
              </button>
            </a>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/products/index.blade.php ENDPATH**/ ?>