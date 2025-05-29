<?php $__env->startSection('contents'); ?>
<h1 class="mt-3"> <?php echo e(__('dashboard.home')); ?></h1>
<div class="row">
    <div class="col-9">
        <div class="card card-home my-3 mx-4">
            <div class="card-header py-2 px-3">
                <?php echo e(__('dashboard.general')); ?>

            </div>
            <div class="card-body pt-0 pb-3">
                <div class="row ">
                    <a class="col col-4 setting-item text-secondary" href="/admin/orders/index">
                        <div class="row mt-3">
                            <div class="col item-text">
                                <p class="my-0"><i class="fa-solid fa-cubes  px-2"></i> <?php echo e(__('dashboard.all_orders')); ?></p>
                                <small><?php echo e(__('dashboard.list_available_orders')); ?></small>
                            </div>
                        </div>
                    </a>

                    <a class="col col-4 setting-item text-secondary" href="<?php echo e(route('display-product-all')); ?>">
                        <div class="row pt-3">
                            <div class="col item-text">
                                <p class="my-0"><i class="fa-solid fa-boxes-stacked  px-2"></i><?php echo e(__('dashboard.all_products')); ?></p>
                                <small><?php echo e(__('dashboard.display_all_products')); ?></small>
                            </div>
                        </div>
                    </a>

                    <a class="col col-4 setting-item text-secondary" href="/admin/clients/index">
                        <div class="row pt-3">
                            <div class="col item-text">
                                <p class="my-0"><i class="fa-solid fa-users px-2"></i> <?php echo e(__('dashboard.all_clients')); ?></p>
                                <small><?php echo e(__('dashboard.display_all_clients')); ?></small>
                            </div>
                        </div>
                    </a>
                    <div class="py-2" style="border-bottom: 1px solid #dedede"></div>
                    <a class="col col-4 setting-item text-secondary" href="">
                        <div class="row pt-3">
                            <div class="col item-text">
                                <p class="my-0"><i class="fa-solid fa-tags  px-2"></i><?php echo e(__('dashboard.order_items')); ?></p>
                                <small><?php echo e(__('dashboard.display_all_order_items')); ?></small>
                            </div>
                        </div>
                    </a>

                    <a class="col col-4 setting-item text-secondary" href="<?php echo e(route('display-invoices-list')); ?>">
                        <div class="row pt-3">
                            <div class="col item-text">
                                <p class="my-0"> <i class="fa fa-user  px-2"></i><?php echo e(__('dashboard.all_invoices')); ?></p>
                                <small><?php echo e(__('dashboard.display_all_invoices')); ?></small>
                            </div>
                        </div>
                    </a>

                    <a class="col col-4 setting-item text-secondary" href="<?php echo e(route('display-payments-list')); ?>">
                        <div class="row pt-3">
                            <div class="col item-text">
                                <p class="my-0"> <i class="fa fa-user  px-2"></i><?php echo e(__('dashboard.all_payments')); ?></p>
                                <small><?php echo e(__('dashboard.display_all_payments')); ?></small>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div> 
    <div class="col-3" style=""> 

    </div>
</div>
<div class="row">
    <div class="col-9">
        <div class="card card-home my-3 mx-4">
            <div class="card-header py-2 px-3">
                <?php echo e(__('dashboard.general')); ?>

            </div>
            <div class="card-body pt-0 pb-3">
                <div class="row ">
                    <a class="col col-4 setting-item text-secondary" href="<?php echo e(route('admin-list')); ?>">
                        <div class="row pt-3">
                            <div class="col item-text">
                                <p class="my-0"> <i class="fa fa-user  px-2"></i><?php echo e(__('dashboard.all_admins')); ?></p>
                                <small><?php echo e(__('dashboard.display_all_admins')); ?></small>
                            </div>
                        </div>
                    </a>

                    <a class="col col-4 setting-item text-secondary" href="<?php echo e(route('roles-list')); ?>">
                        <div class="row pt-3">
                            <div class="col item-text">
                                <p class="my-0"><i class="fa-solid fa-credit-card  px-2"></i><?php echo e(__('dashboard.roles')); ?></p>
                                <small><?php echo e(__('dashboard.display_payment_methods')); ?></small>
                            </div>
                        </div>
                    </a>
                    <a class="col col-4 setting-item text-secondary" href="<?php echo e(route('permissions-list')); ?>">
                        <div class="row pt-3">
                            <div class="col item-text">
                                <p class="my-0"><i class="fa-solid fa-tags  px-2"></i><?php echo e(__('dashboard.permission')); ?></p>
                                <small><?php echo e(__('dashboard.display_permission_list')); ?></small>
                            </div>
                        </div>
                    </a>
                    <div class="py-2" style="border-bottom: 1px solid #dedede"></div>
                    <a class="col col-4 setting-item text-secondary" href="">
                        <div class="row pt-3">
                            <div class="col item-text">
                                <p class="my-0"><i class="fa-solid fa-gear  px-2"></i><?php echo e(__('dashboard.settings')); ?></p>
                                <small><?php echo e(__('dashboard.settings_and_options')); ?></small>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div> 
    <div class="col-3" style=""> 

    </div>
</div>

<!-- System Configurations -->
<div class="row">
    <div class="col-9">
        <div class="card card-home my-3 mx-4">
            <div class="card-header py-2 px-3">
                <?php echo e(__('dashboard.system_configurations')); ?>

            </div>
            <div class="card-body pt-0 pb-3">
                <div class="row ">
                    <a class="col col-4 setting-item text-secondary" href="<?php echo e(route('home-setting')); ?>">
                        <div class="row pt-3">
                            <div class="col item-text">
                                <p class="my-0"><i class="fa-solid fa-sliders  px-2"></i><?php echo e(__('dashboard.general_settings')); ?></p>
                                <small><?php echo e(__('dashboard.general_settings_options')); ?></small>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div> 
    <div class="col-3" style=""> 

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>