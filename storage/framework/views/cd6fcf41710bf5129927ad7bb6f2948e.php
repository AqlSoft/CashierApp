

<?php $__env->startSection('extra-links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/store.entries.css')); ?>">
<style>
  

.table th {
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.75rem;
    letter-spacing: 0.5px;
    background:#d3dce3;
    color:#000;
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
      <?php if(isset($order->orderItems) && count($order->orderItems)): ?>
      <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <form action="<?php echo e(route('update-orderitem-input')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="orderitem_id" value="<?php echo e($orderItem->id); ?>">

        <tr >
          <td><?php echo e(++$counter); ?></td>
          <td>
            <input value="<?php echo e($orderItem->category->cat_name ?? 'N/A'); ?>" style="width: 150px">
          </td>

          <td data-bs-toggle="tooltip" data-bs-title="">
            <input value="<?php echo e($orderItem->product->name ?? 'N/A'); ?>" style="width: 160px">
          </td>
          <td><input type="text" name="price" value="<?php echo e($orderItem->price); ?>"  style="width: 120px"></td>
          <td>
            <input value="<?php echo e($orderItem->unit->name ?? 'N/A'); ?>" name="unit" style="width: 100px">
          </td>
          <td>
            <input type="number" name="quantity" value="<?php echo e(old('quantity', $orderItem->quantity)); ?>"    id="quantity" style="width: 110px">
          </td>
          <td><input type="text" name="notes" value="<?php echo e($orderItem->notes); ?>"></td>
          <td>
            <div class="d-flex btn-group">
              <button type="submit" class="btn btn-sm py-1 btn-outline-secondary" title="Update">
                <i class="fas fa-save"></i>
              </button>
              <button type="button" class="btn btn-sm py-1 btn-outline-secondary" title="Copy">
                <i class="fas fa-copy"></i>
              </button>
              <a href="#', $orderItem->id) }}"
                class="btn btn-sm py-1 btn-outline-secondary delete-entry"
                data-entry-id="<?php echo e($orderItem->id); ?>"
                data-product-name="<?php echo e($orderItem->product->name ?? 'N/A'); ?>"
                onclick="return confirmDelete(this)" title="Delete">
                <i class="fas fa-trash"></i>
              </a>
            </div>
          </td>
        </tr>
      </form>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


      <?php else: ?>
      <tr>
        <td colspan="7">No order item has been added yet</td>
      </tr>
      <?php endif; ?>
      
      
      <form action="<?php echo e(route('save-orderitem-info')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="order" value="<?php echo e($order->id); ?>">

        <table class="table-secondary ">
          <tr class=" px-3 py-1">
            <td><?php echo e(++$counter); ?></td>
            <td>
              <select name="category" style="width: 150px" id="category">
                <option value="">Select a category</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>"><?php echo e($category->cat_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </td>
            <td>
              <select id="product" name="product" class="" style="width: 160px" disabled>
                <option value="">Select a product</option>
              </select>
            </td>
            <td>
                <input type="text" class="" id="price" name="price" readonly placeholder="Price" style="width: 120px">
            </td>
            <td>
              <input type="text" class="" id="unit" name="unit" readonly placeholder="Unit" style="width: 100px">
            </td>
            <td>
              <input type="number" name="quantity" required id="quantity" style="width: 110px" placeholder="Quantity" style="width: 100px">
            </td>

            <td>
              <input type="text" name="notes" id="notes" >
            </td>

            <td>
              <div class="btn-group">
                <button type="submit" class="btn btn-sm btn-outline-primary" title="Save">
                  <i class="fas fa-save"></i>
                </button>
                <button type="reset" class="btn btn-sm btn-outline-secondary" title="Reset">
                  <i class="fas fa-undo"></i>
                </button>
              </div>
            </td>
          </tr>
        </table>
      </form>
    </tbody>

  </table>

  <div class="input-group pt-2 px-3 justify-content-end">
    <button class="btn px-3 py-1 btn-outline-secondary btn-sm" title="Bach to Order">
      Back To Store
    </button>

    <button class="btn px-3 py-1 btn-outline-secondary btn-sm" title="Confirm Order">
      Approve Receipt
    </button>
    <button class="btn px-3 py-1 btn-outline-secondary btn-sm" title="Cancel Order">
      Print Receipt
    </button>
  </div>
</fieldset>
<script>
    $(document).ready(function() {
        // عند تغيير الفئة
        $('#category').change(function() {
            var categoryId = $(this).val();
            var Url = "<?php echo e(route('get-products-by-category', ['categoryId' => ':categoryId'])); ?>";
            Url = Url.replace(':categoryId', categoryId);
            console.log(categoryId, Url);

            if (categoryId) {
                // طلب Ajax لاسترجاع المنتجات
                $.ajax({
                    url: Url,
                    type: "GET",
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#product').empty().append('<option value="">Select a product</option>');
                        $.each(data, function(key, product) {
                            $('#product').append('<option value="' + product.id + '" data-price="' + product.sale_price + '" data-unit="' + product.unit.name + '">' + product.name + '</option>');
                        });
                        $('#product').prop('disabled', false);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            } else {
                $('#product').empty().append('<option value="">Select a product</option>').prop('disabled', true);
                $('#price').val('');
                $('#unit').val('');
            }
        });

        // عند تغيير المنتج
        $('#product').change(function() {
            var selectedProduct = $(this).find(':selected');
            var price = selectedProduct.data('price');
            var unit = selectedProduct.data('unit');
            $('#price').val(price);
            $('#unit').val(unit); // تعبئة حقل الوحدة
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\kashear_project\resources\views/admin/orderitem/create.blade.php ENDPATH**/ ?>