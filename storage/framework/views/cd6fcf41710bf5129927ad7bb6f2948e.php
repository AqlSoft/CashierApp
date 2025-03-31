<?php $__env->startSection('extra-links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/orderitem.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

<h1 class="mt-3 pb-2 d-flex" style="border-bottom: 1px solid #dedede">
  Add Order Items <a href="<?php echo e(route('fast-creqate-order')); ?>" class="py-0 mx-2 d-flex align-items-center"><i data-bs-toggle="tooltip" title="Add New order" class="fa fa-plus py-0"></i> New</a>
  <div class="row gap-1 mx-4">
    <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendingOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <?php if($pendingOrder->wait_no == 'new'): ?>
    <a href="<?php echo e(route('add-orderitem', [$pendingOrder->id])); ?>" title="Order SN - <?php echo e($pendingOrder->order_sn); ?>"
      class="col col-auto btn btn-sm btn-info sm"><?php echo e($pendingOrder->wait_no); ?></a>
    <?php else: ?>
    <a href="<?php echo e(route('add-orderitem', [$pendingOrder->id])); ?>" title="Order SN - <?php echo e($pendingOrder->order_sn); ?>"
      class="col col-auto btn btn-sm btn-outline-secondary sm"><?php echo e($pendingOrder->wait_no); ?></a>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php endif; ?>
  </div>
</h1>

<div class="container">
  <div class="row mt-3 d-flex gap-3">
    <div class="col col-4">
      <div class="row">
        <div class="col col-12">
          <!-- Category list -->
          <select class="form-select form-control mt-2" id="category-select">
            <option selected value="">All category</option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($category->id); ?>"><?php echo e($category->cat_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col col-12">
          <div class="selected-products-container" style="font-size: 14px;">
            <!-- Header Row -->
            <div class="row g-0 border-bottom py-2  fw-bold align-items-center">
              <div class="col-1 text-center fw-bold fs-6">#</div>
              <div class="col-3 ps-2 fw-bold fs-6">Meal</div>
              <div class="col-2 text-center fw-bold fs-6">Qty</div>
              <div class="col-2 text-center fw-bold fs-6">U.Price</div>
              <div class="col-2 text-center fw-bold fs-6">T.Price</div>
              <div class="col-2 text-center fw-bold fs-6">Action</div>
            </div>

            <!-- Items Rows -->
            <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row g-0 border-bottom py-2 align-items-center">
              <form action="<?php echo e(route('update-orderitem')); ?>" method="post" class="d-flex align-items-center w-100">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($oItem->id); ?>">

                <div class="col-1 text-center fs-6"><?php echo e($loop->iteration); ?></div>
                <div class="col-3 ps-2 fs-6"><?php echo e($oItem->product->name); ?></div>

                <div class="col-2 text-center fs-6">
                  <input type="number"
                    name="quantity"
                    value="<?php echo e($oItem->quantity); ?>"
                    style="width: 50px; border: 1px solid #dedede; padding: 2px 5px;"
                    class="text-center fs-6">
                </div>

                <div class="col-2 text-center fs-6">
                  <input type="number"
                    name="price"
                    value="<?php echo e(old('price',$oItem->price)); ?>"
                    style="width: 70px; border: 1px solid #dedede; padding: 2px 5px;"
                    class="text-center fs-6">
                </div>

                <div class="col-2 text-end fs-6"><?php echo e($oItem->quantity * $oItem->price); ?></div>

                <div class="col-2 text-center fs-6">
                  <div class="d-flex justify-content-center gap-1">
                    <button type="submit" class="btn btn-sm p-0 border-0 bg-transparent" title="Update Order Item">
                      <i class="fas fa-save text-secondary fs-6"></i>
                    </button>
                    <a class="btn btn-sm p-0 border-0 bg-transparent"
                      onclick="return confirm('You are about to delete an item, are you sure?')"
                      title="Delete order item"
                      href="<?php echo e(route('destroy-oItem-info', $oItem->id)); ?>">
                      <i class="fa fa-trash text-danger fs-6"></i>
                    </a>
                  </div>
                </div>
              </form>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>


          <div class="py-1" style="border-bottom: 1px solid #dedede"></div>
          <!-- Display total price -->
          <div class="total-price mt-2">
            <h4>Total Price: <span id="total-price"><?php echo e($totalPrice); ?></span></h4>
          </div>
          <div class="py-1" style="border-bottom: 1px solid #dedede"></div>
          <div class="input-group pt-2 px-3 justify-content-end align-items-center">
            <a href="/admin/orders/index" class="btn px-3 py-1 btn-outline-secondary btn-sm" title="Cancel Invoice">
              Back To Order
            </a>
            <a href="<?php echo e(route('add-invoices', $order->id)); ?>" class="btn px-3 py-1 btn-outline-secondary btn-sm" title="Cancel Invoice">
              Invoice
            </a>
            <?php if($order->status === 2): ?>
            <button class="btn px-3 py-1 btn-outline-secondary btn-sm dropdown-toggle"
              id="submit-order-items" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Finish
            </button>
            <?php elseif($order->status === 3): ?>
            <a href="<?php echo e(route('allow-order-editting', [$order->id])); ?>"
              class="btn px-3 py-1 btn-outline-secondary btn-sm">Allow edit</a>
            <?php endif; ?>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item active" href="#" data-bs-target="#cashPaymentModal" data-bs-toggle="modal">Cash Payment</a></li>
              <li><a class="dropdown-item" href="#">Debit Card</a></li>
              <li><a class="dropdown-item" href="#">Transfer</a></li>
              <li><a class="dropdown-item" href="#">Credit Sales</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="col col-7 pb-3 pt-3 px-4">
      <!-- Products display -->
      <div class="row d-flex gap-2" id="product-list">
        <?php if(isset($products) && count($products)): ?>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col col-2 productlist p-0"
          style="border-radius: 5px;border: 2px solid <?php echo e(in_array($product->id, $Ois) ? '#007bff' : '#f7f5f5'); ?>"
          data-category="<?php echo e($product->category_id); ?>">
          <form action="/admin/orderItems/store/<?php echo e($order->id); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
            <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
            <button type="submit" class="product-item">
              <div class="productlistimg-container">
                <div class="productlistimg"
                  style="background-image: url('<?php echo e($product->image ? asset('assets/admin/uploads/images/products/' . $product->image) : asset('assets/admin/images/default-product.png')); ?>');">
                </div>
                <div class="price-overlay">
                  <h5 class="price-display"><?php echo e($product->sale_price); ?></h5>
                </div>
              </div>
              <div class="productlistcontent">
                <h5 class="mt-1"><?php echo e($product->name); ?></h5>
                <?php if(($quantities[$product->id] ?? 0) > 0): ?>
                <p class="mb-3 quantity-display">Qty:<?php echo e($quantities[$product->id] ?? 0); ?></p>
                <?php endif; ?>
              </div>
            </button>
          </form>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<!-- Cash Payment modal -->
<div class="modal fade" id="cashPaymentModal" aria-hidden="true" aria-labelledby="cashPaymentModalLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <h1 class="modal-title fs-5 mt-2 ps-3" id="cashPaymentModalLabel" style="border-bottom: 1px solid #dedede">Cash Payment</h1>
      <form id="cash-payment-form" action="<?php echo e(route('payments.cash.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
        <div class="modal-body">
          <div class="input-group sm mb-1">
            <label class="input-group-text" for="amount">Amount</label>
            <input type="number" step="0.01" class="form-control sm" name="amount" id="amount" value="<?php echo e($totalPrice); ?>" required readonly>
          </div>
          <div class="input-group sm mb-1">
            <label class="input-group-text" for="vatAmount">Vat Amount</label>
            <input type="number" step="0.01" class="form-control sm" name="vat_amount" id="vatAmount" value="<?php echo e($vatAmount); ?>" required readonly>
          </div>
          <div class="input-group sm mb-1">
            <label class="input-group-text" for="total_amount">Total Amount</label>
            <input type="number" step="0.01" class="form-control sm" name="total_amount" id="total_amount" value="<?php echo e($totalAmount); ?>" required readonly>
          </div>
          <div class="input-group sm mb-1">
            <label class="input-group-text" for="paid">Paid</label>
            <input type="number" step="0.01" class="form-control sm" name="paid" id="paid" value="<?php echo e($totalAmount); ?>" required>
          </div>
          <div class="input-group sm mb-1">
            <label class="input-group-text" for="remaining">Remaining</label>
            <input type="number" step="0.01" class="form-control sm" name="remaining" id="remaining" value="0" required readonly>
          </div>

          <div class="input-group pt-2 px-3 mt-2 justify-content-end" style="border-top: 1px solid #dedede">
            <button type="button" class="btn px-3 py-1 btn-outline-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn px-3 py-1 btn-primary btn-sm">Confirm</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Filter products by category
    $('#category-select').change(function() {
      const selectedCategoryId = $(this).val();
      $('.productlist').each(function() {
        const productCategoryId = $(this).data('category');
        if (selectedCategoryId === "" || productCategoryId == selectedCategoryId) {
          $(this).show();
        } else {
          $(this).hide();
        }
      });
    });

    // Initialize modal behavior
    const cashPaymentModal = document.getElementById('cashPaymentModal');
    if (cashPaymentModal) {
      cashPaymentModal.addEventListener('shown.bs.modal', function() {
        const paidInput = document.getElementById('paid');
        const totalAmount = parseFloat(document.getElementById('total_amount').value);

        // Set paid amount to total amount
        paidInput.value = totalAmount.toFixed(2);

        // Calculate remaining amount
        updateRemaining();

        // Focus on paid input and select all text
        paidInput.focus();
        paidInput.select();
      });
    }

    // Update remaining amount when paid amount changes
    const paidInput = document.getElementById('paid');
    if (paidInput) {
      paidInput.addEventListener('input', updateRemaining);
    }

    function updateRemaining() {
      const totalAmount = parseFloat(document.getElementById('total_amount').value);
      const paid = parseFloat(document.getElementById('paid').value) || 0;
      const remaining = totalAmount - paid;
      document.getElementById('remaining').value = remaining.toFixed(2);
    }
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\kashear_project\resources\views/admin/orderitem/create.blade.php ENDPATH**/ ?>