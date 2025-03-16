

<?php $__env->startSection('extra-links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/orderitem.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">Add Order Items</h1>
<div class="container">
    <div class="row mt-3 d-flex gap-3">
        <div class="col col-4">
            <div class="row">
                <div class="col col-12">
                    <!-- قائمة الفئات -->
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
                    <table class="table" id="selected-products">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Meal</th>
                                <th scope="col">Gty</th>
                                <th scope="col">U.Price</th>
                                <th scope="col">T.Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- سيتم إضافة الصفوف هنا عبر JavaScript -->
                        </tbody>
                    </table>

                    <!-- عرض الإجمالي الكلي -->
                    <div class="input-group pt-2 px-3 justify-content-between align-items-center">
                        <div class="total-price">
                            <h4>Total Price: <span id="total-price">0</span></h4>
                        </div>
                        <button class="btn px-3 py-1 btn-outline-secondary btn-sm dropdown-toggle" id="submit-order-items" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Finish
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item active" href="#" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Cash Payment</a></li>
                            <li><a class="dropdown-item" href="#">Debit Card</a></li>
                            <li><a class="dropdown-item" href="#">Transfer</a></li>
                            <li><a class="dropdown-item" href="#">Credit Sales</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col col-7 pb-3 pt-3 px-4">
            <!-- عرض المنتجات -->
            <div class="row d-flex gap-2" id="product-list">
                <?php if(isset($products) && count($products)): ?>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col col-2 productlist product-item" data-id="<?php echo e($product->id); ?>" data-name="<?php echo e($product->name); ?>" data-price="<?php echo e($product->sale_price); ?>" data-category="<?php echo e($product->category_id); ?>">
                    <div class="productlistimg">
                        <img src="<?php echo e(asset('assets/admin/uploads/images/products/' . $product->image)); ?>">
                    </div>
                    <div class="productlistcontent">
                        <h5 class="pb-2 mt-1"><?php echo e($product->name); ?></h5>
                        <p class="mb-3 quantity-display">gty: 0</p>
                    </div>
                    <div class="price-overlay">
                        <h5 class="price-display"><?php echo e($product->sale_price); ?></h5>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Cash Payment modal -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <h1 class="modal-title fs-5 mt-2 ps-3" id="exampleModalToggleLabel" style="border-bottom: 1px solid #dedede">Cash Payment</h1>
            <form id="cash-payment-form" action="<?php echo e(route('payments.cash.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <!-- حقول الفورم -->
                    <div class="input-group sm mb-1">
                        <label class="input-group-text" for="amount">Amount</label>
                        <input type="number" step="0.01" class="form-control sm" name="amount" id="amount" required>
                    </div>
                    <div class="input-group sm mb-1">
                        <label class="input-group-text" for="vatAmount">Vat Amount</label>
                        <input type="number" step="0.01" class="form-control sm" name="vat_amount" id="vatAmount" required>
                    </div>
                    <div class="input-group sm mb-1">
                        <label class="input-group-text" for="total_amount">Total Amount</label>
                        <input type="number" step="0.01" class="form-control sm" name="total_amount" id="total_amount" required readonly>
                    </div>
                    <div class="input-group sm mb-1">
                        <label class="input-group-text" for="paid">Paid</label>
                        <input type="number" step="0.01" class="form-control sm" name="paid" id="paid" required>
                    </div>
                    <div class="input-group sm mb-1">
                        <label class="input-group-text" for="remaining">Remaining</label>
                        <input type="number" step="0.01" class="form-control sm" name="remaining" id="remaining" required readonly>
                    </div>

                    <!-- زر الإرسال -->
                    <div class="input-group pt-2 px-3 mt-2 justify-content-end" style="border-top: 1px solid #dedede">
                        <button type="button" class="btn px-3 py-1 btn-outline-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn px-3 py-1 btn-primary btn-sm">Confirm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        let selectedProducts = [];

        // تصفية المنتجات حسب الفئة
        $('#category-select').change(function () {
            const selectedCategoryId = $(this).val();
            let foundProducts = false;

            $('.product-item').each(function () {
                const productCategoryId = $(this).data('category');

                if (selectedCategoryId === "" || productCategoryId == selectedCategoryId) {
                    $(this).show();
                    foundProducts = true;
                } else {
                    $(this).hide();
                }
            });

            if (!foundProducts && selectedCategoryId !== "") {
                alert('No products found in this category.');
            }
        });

        // إضافة منتج إلى الطلب
        $('.product-item').click(function () {
            const productId = $(this).data('id');
            const productName = $(this).data('name');
            const productPrice = $(this).data('price');

            const existingProduct = selectedProducts.find(item => item.id === productId);

            if (existingProduct) {
                existingProduct.quantity += 1;
            } else {
                selectedProducts.push({
                    id: productId,
                    name: productName,
                    price: productPrice,
                    quantity: 1
                });
            }

            updateTable();
            updateQuantityDisplay(productId, existingProduct ? existingProduct.quantity : 1);
            updateTotalPrice();
            $(this).toggleClass('selected');
        });

        // تحديث الجدول
        function updateTable() {
            const tbody = $('#selected-products tbody');
            tbody.empty();

            selectedProducts.forEach((product, index) => {
                const totalPrice = product.price * product.quantity;

                const row = `
                    <tr data-id="${product.id}">
                        <th scope="row">${index + 1}</th>
                        <td>${product.name}</td>
                        <td>${product.quantity}</td>
                        <td>${product.price}</td>
                        <td>${totalPrice}</td>
                        <td>
                            <button class="btn btn-sm py-0 remove-item"><i class="fa fa-trash text-danger"></i></button>
                        </td>
                    </tr>
                `;
                tbody.append(row);
            });
        }

        // تحديث عرض الكمية
        function updateQuantityDisplay(productId, quantity) {
            $(`.product-item[data-id="${productId}"] .quantity-display`).text(`gty: ${quantity}`);
        }

        // تحديث الإجمالي الكلي
        function updateTotalPrice() {
            let totalPrice = 0;
            selectedProducts.forEach(product => {
                totalPrice += product.price * product.quantity;
            });
            $('#total-price').text(totalPrice.toFixed(2));
        }

        // حذف منتج من الطلب
        $(document).on('click', '.remove-item', function () {
            const productId = $(this).closest('tr').data('id');
            selectedProducts = selectedProducts.filter(item => item.id !== productId);
            updateTable();
            updateQuantityDisplay(productId, 0);
            updateTotalPrice();
            $(`.product-item[data-id="${productId}"]`).removeClass('selected');
        });

        // حساب Total Amount و Remaining تلقائيًا
        function calculateTotals() {
            const amount = parseFloat($('#amount').val()) || 0;
            const vatAmount = parseFloat($('#vatAmount').val()) || 0;
            const paid = parseFloat($('#paid').val()) || 0;

            const totalAmount = amount + vatAmount;
            const remaining = totalAmount - paid;

            $('#total_amount').val(totalAmount.toFixed(2));
            $('#remaining').val(remaining.toFixed(2));
        }

        // تحديث القيم عند فتح المودال
        $('#exampleModalToggle').on('show.bs.modal', function () {
            const totalPrice = parseFloat($('#total-price').text()) || 0;
            $('#amount').val(totalPrice.toFixed(2));
            $('#vatAmount').val(0);
            $('#paid').val(0);
            calculateTotals();
        });

        // تحديث القيم عند تغيير الحقول
        $('#amount, #vatAmount, #paid').on('input', calculateTotals);

        // إرسال البيانات عند النقر على Confirm
        $('#cash-payment-form').submit(function (e) {
            e.preventDefault();

            const url = window.location.href;
            const orderId = url.split('/').pop();

            const items = selectedProducts.map(product => ({
                order_id: orderId,
                product_id: product.id,
                quantity: product.quantity,
                price: product.price
            }));

            const formData = {
                items: items,
                amount: $('#amount').val(),
                vat_amount: $('#vatAmount').val(),
                total_amount: $('#total_amount').val(),
                paid: $('#paid').val(),
                remaining: $('#remaining').val()
            };
const Url= "<?php echo e(route('payments.cash.store')); ?>";
console.log(Url,formData);
            $.ajax({
                url:Url,
                method: 'POST',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    alert('Payment saved successfully!');
                    console.log(url,response);
                    $('#exampleModalToggle').modal('hide');
                },
                error: function (error) {
                    alert('Error saving payment.');
                    console.error(error);
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\kashear_project\resources\views/admin/orderitem/create.blade.php ENDPATH**/ ?>