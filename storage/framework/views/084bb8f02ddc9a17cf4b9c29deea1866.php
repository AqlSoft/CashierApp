<?php $__env->startSection('extra-links'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/orderitem.css')); ?>">
    <style>
        .table th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            background: #d3dce3;
            color: #000;
            padding-top: 10px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
    <h1 class="mt-3 pb-2 " style="border-bottom: 2px solid #dedede">Create Invoices
    </h1>
    <form action="<?php echo e(route('payments.cash.store', $order->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <fieldset class="table mt-3">
    
            <input type="hidden" name="order" value="<?php echo e($order->id); ?>">
            <div class="row mt-3 ">
                <div class="col col-2 text-end fw-bold bg-transparent">Serial Number:</div>
                <div class="col col-4 bg-transparent"> <input value="<?php echo e($order->serial_number ?? 'N/A'); ?>"
                        name="serial_number" style="width: 160px;border:none;border-bottom: 2px solid #dedede " class="bg-transparent"disabled>
                </div>
                <div class="col col-2 text-end fw-bold bg-transparent">Order Date:</div>
                <div class="col col-4 bg-transparent"><input value="<?php echo e($order->order_date ?? 'N/A'); ?>" name="order_date"
                        style="width: 160px;border:none;border-bottom: 2px solid #dedede" class="bg-transparent" disabled></div>
                <div class="col col-2 text-end fw-bold bg-transparent"> Invoice Number :</div>
                <div class="col col-4 bg-transparent"><input name="invoice_number" value="<?php echo e($invoiceNumber); ?>" class="bg-transparent"
                        style="width: 160px;border:none;border-bottom: 2px solid #dedede"></div>
                <div class="col col-2 text-end fw-bold bg-transparent">Invoice Date:</div>
                <div class="col col-4 bg-transparent"><input name="invoice_date" value="<?php echo e(date('Y-m-d')); ?>"
                        placeholder="YYYY-MM-DD" class="bg-transparent "
                        style="width: 160px;border:none;border-bottom: 2px solid #dedede"></div>
                <div class="col col-2 text-end fw-bold bg-transparent ">Vat Number:</div>
                <div class="col col-4 bg-transparent"><input name="vat_number" class="bg-transparent "
                        style="width: 160px;border:none;border-bottom: 2px solid #dedede"></div>
                <div class="col col-2 text-end fw-bold bg-transparent">Client Name:</div>
                <div class="col col-4 bg-transparent"><input name="" value="<?php echo e($order->customer->name ?? 'N/A'); ?>"
                        style="width: 160px;border:none;border-bottom: 2px solid #dedede" class="bg-transparent" disabled>
                    <input type="hidden" name="client_id" id="client_id" value="<?php echo e($order->customer->id); ?>">
                </div>
                <div class="col col-2 text-end fw-bold bg-transparent"> Order Status :</div>
                <div class="col col-4 bg-transparent">
                
                        <span class="bg-transparent text-primary"><input value="<?php echo e($status[$order->status] ?? 'N/A'); ?>"
                                name="status" style="width: 160px;border:none;border-bottom: 2px solid #dedede"
                                disabled></span>
                </div>
                <div class="col col-2 text-end fw-bold bg-transparent">Due Date:</div>
                <div class="col col-4 bg-transparent"><input name="due_date" value="<?php echo e(date('Y-m-d')); ?>"
                        class="bg-transparent " placeholder="YYYY-MM-DD"
                        style="width: 160px;border:none;border-bottom: 2px solid #dedede"></div>
                <div class="col col-2 text-end fw-bold bg-transparent ">Payment Date:</div>
                <div class="col col-4 bg-transparent "><input name="payment_date" value="<?php echo e(date('Y-m-d')); ?>"
                        class="bg-transparent " placeholder="YYYY-MM-DD"
                        style="width: 160px;border:none;border-bottom: 2px solid #dedede"></div>
                <div class="col col-2 text-end fw-bold bg-transparent ">Invoice Type:</div>
                <div class="col col-4 bg-transparent "><input name="type" value="sales" class="bg-transparent "
                        style="width: 160px;border:none;border-bottom: 2px solid #dedede"></div>
            </div>

            <table class="mt-3 w-100   table-hover mb-2">
                <thead>
                    <tr>
                        <th>#</th>
                        <!-- <th>category</th> -->
                        <th>Product</th>
                        <th>Unit</th>
                        <th>Quantity</th>
                        <th>price</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        $counter = 0;
                    ?>
                    <?php if(isset($order->orderItems) && count($order->orderItems)): ?>
                        <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(++$counter); ?></td>
                                <!-- <td><?php echo e($orderItem->category->cat_name); ?></td> عرض اسم الفئة -->
                                <td><?php echo e($orderItem->product->name); ?></td> <!-- عرض اسم المنتج -->
                                <td><?php echo e($orderItem->unit->name); ?></td> <!-- عرض اسم الوحدة -->
                                <td><?php echo e($orderItem->quantity); ?></td>
                                <td><?php echo e($orderItem->price); ?></td>
                                <td><?php echo e($orderItem->price * $orderItem->quantity); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">No order Item has been added yet, Add your .</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <tfoot class="bg-transparent mt-3 ">
                    <tr >
                        <td colspan="5" class="fw-bold text-end text-primary ">Amount :</td>
                        <td class="text-primary"   style="border:none;border-bottom: 2px solid #dedede; width:100px;">
                            <input id="amount" name="amount" class="bg-transparent" value="<?php echo e($amount); ?>"
                            style="border:none;"  readonly>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="fw-bold text-end text-primary ">Vat Amount :</td>
                        <td class="text-primary"   style="border:none;border-bottom: 2px solid #dedede; width:100px;">
                            <input id="vat_amount" name="vat_amount" class="bg-transparent" value="<?php echo e($vatAmount); ?>"  style="border:none;"  >
                        </td>
                    </tr>

                    <tr>
                        <td colspan="5" class="fw-bold text-end text-primary ">Total Amount :</td>
                        <td class="text-primary"   style="border:none;border-bottom: 2px solid #dedede; width:100px;">
                            <input id="total_amount" name="total_amount" class="bg-transparent" value="<?php echo e($totalAmount); ?>"
                                style="border:none;" readonly>
                        </td>
                    </tr>
                </tfoot>
            </table>

            <div class="input-group pt-2 px-3 justify-content-end ">
            <button class="btn px-3 py-1 btn-outline-secondary btn-sm" title="Cancel Invoice">
                  Print
                </button>
                <button class="btn px-3 py-1 btn-outline-secondary btn-sm dropdown-toggle" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Confirm & Pay
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item active" href="#" data-bs-target="#exampleModalToggle"
                            data-bs-toggle="modal">Cash Payment</a></li>
                    <li><a class="dropdown-item" href="#">Debit Card </a></li>
                    <li><a class="dropdown-item" href="#">Transfer</a></li>
                    <li><a class="dropdown-item" href="#">Credit Sales </a></li>
                </ul>
                <button class="btn px-3 py-1 btn-outline-secondary btn-sm" title="Cancel Invoice">
                    Cancel 
                </button>
            </div>
    
    </fieldset>
    <!-- Cash Payment modal -->
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm ">
            <div class="modal-content">
                <h1 class="modal-title fs-5 mt-2  ps-3" id="exampleModalToggleLabel"
                    style="border-bottom: 1px solid #dedede">Cash Payment </h1>
                <div class="modal-body">
                        
                        <div class="input-group sm mb-1">
                            <label class="input-group-text" for="amount">Amount</label>
                            <input type="number" step="0.01" class="form-control sm" value="<?php echo e($amount); ?>"
                                name="amount" id="amount">
                        </div>
                        <div class="input-group sm mb-1">
                            <label class="input-group-text" for="vatAmount">Vat Amount </label>
                            <input type="number" step="0.01" class="form-control sm" name="vat_amount"
                                value="<?php echo e($vatAmount); ?>" id="vatAmount">
                        </div>
                        <div class="input-group sm mb-1">
                            <label class="input-group-text" for="total_amount">Total Amount</label>
                            <input type="number" step="0.01" class="form-control sm" value="<?php echo e($totalAmount); ?>"
                                name="total_amount" id="total_amount">
                        </div>
                        <div class="input-group sm mb-1">
                            <label class="input-group-text" for="paid">Paid</label>
                            <input type="number" step="0.01" class="form-control sm" name="paid" id="paid">
                        </div>
                        <div class="input-group sm sm mb-1">
                            <label class="input-group-text" for="Remaining">Remaining</label>
                            <input type="number" step="0.01" class="form-control sm" name="remaining"
                                id="remaining">
                        </div>
                        <div class="input-group sm mb-1">
                            <label class="input-group-text" for="amount_from">Amount From</label>
                            <input type="number" step="0.01" class="form-control sm"   name="amount_from" id="amount_from">
                        </div>
                        <div class="input-group sm mb-1">
                            <label class="input-group-text" for="amount">Amount To</label>
                            <input type="number" step="0.01" class="form-control sm"  name="amount_to" id="amount_to">
                        </div>
                        <div class="input-group sm mb-1">
                            <label class="input-group-text" for="account_from">From</label>
                            <select class="form-control py-0 sm" name="account_from" id="account_from">
                                <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($fa->id); ?>"><?php echo e($fa->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        </div>
                        <div class="input-group sm mb-0">
                            <label class="input-group-text" for="account_to">To</label>
                            <select class="form-control sm py-0" name="account_to" id="account_to">
                                <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ta->id); ?>"><?php echo e($ta->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        </div>
                        <div class="input-group pt-2 px-3 mt-2 justify-content-end "
                            style="border-top: 1px solid #dedede">
                            <button type="button" class="btn px-3 py-1 btn-outline-secondary btn-sm"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn px-3 py-1 btn-primary btn-sm">confirm</button>
                        </div>
                
                </div>

            </div>
        </div>
    </div>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const paidInput = document.getElementById('paid');
            const remainingInput = document.getElementById('remaining');

            // القيمة الإجمالية (Total Amount) - يتم تمريرها من الكونترولر
            const totalAmount = <?php echo e($totalAmount); ?>;

            // تحديث قيمة Remaining عند تغيير Paid
            paidInput.addEventListener('input', function() {
                const paidAmount = parseFloat(paidInput.value) || 0; // القيمة المدخلة أو 0 إذا كانت فارغة
                const remainingAmount = totalAmount - paidAmount; // حساب المبلغ المتبقي

                // تحديث حقل Remaining
                remainingInput.value = remainingAmount.toFixed(2); // عرض القيمة مع خانتين عشريتين
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\kashear_project\resources\views/admin/invoices/create.blade.php ENDPATH**/ ?>