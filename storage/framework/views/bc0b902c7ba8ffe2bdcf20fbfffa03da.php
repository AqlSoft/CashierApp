<?php $__env->startSection('contents'); ?>

<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="d-flex justify-content-start align-items-start setting-nav p-0">
            <div class="nav justify-content-start text-end" style="width:200px;" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                <button class="nav-link <?php echo e($tab == 'general' ? 'active' : ''); ?>" id="v-pills-general-setting-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-general-setting" type="button" role="tab" aria-controls="v-pills-general-setting" aria-selected="<?php echo e($tab == 'general' ? 'true' : 'false'); ?>">
                    <a href="<?php echo e(route('home-setting')); ?>"><?php echo e(__('settings.general')); ?></a>
                </button>

                <button class="nav-link <?php echo e($tab == 'branches' ? 'active' : ''); ?>" id="v-pills-branches-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-branches" type="button" role="tab" aria-controls="v-pills-branches" aria-selected="<?php echo e($tab == 'branches' ? 'true' : 'false'); ?>">
                    <a href="<?php echo e(route('display-branches-list')); ?>"><?php echo e(__('settings.branches')); ?></a>
                </button>

                <button class="nav-link <?php echo e($tab == 'contacts' ? 'active' : ''); ?>" id="v-pills-contacts-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-contacts" type="button" role="tab" aria-controls="v-pills-contacts" aria-selected="<?php echo e($tab == 'contacts' ? 'true' : 'false'); ?>">
                    <a href="<?php echo e(route('display-contacts-list')); ?>"><?php echo e(__('settings.contacts')); ?></a>
                </button>

                <button class="nav-link <?php echo e($tab == 'orders' ? 'active' : ''); ?>" id="v-pills-orders-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders" aria-selected="<?php echo e($tab == 'orders' ? 'true' : 'false'); ?>">
                    <a href="<?php echo e(route('display-orders-list')); ?>"><?php echo e(__('settings.orders')); ?></a>
                </button>

                <button class="nav-link <?php echo e($tab == 'invoices' ? 'active' : ''); ?>" id="v-pills-invoices-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-invoices" type="button" role="tab" aria-controls="v-pills-invoices" aria-selected="<?php echo e($tab == 'invoices' ? 'true' : 'false'); ?>">
                    <a href="<?php echo e(route('display-invoices-list')); ?>"><?php echo e(__('settings.invoices')); ?></a>
                </button>

                <button class="nav-link <?php echo e($tab == 'currencies' ? 'active' : ''); ?>" id="v-pills-currencies-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-currencies" type="button" role="tab" aria-controls="v-pills-currencies" aria-selected="<?php echo e($tab == 'currencies' ? 'true' : 'false'); ?>">
                    <a href="<?php echo e(route('display-currencies-list')); ?>"><?php echo e(__('settings.currencies')); ?></a>
                </button>

                <button class="nav-link <?php echo e($tab == 'displays' ? 'active' : ''); ?>" id="v-pills-displays-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-displays" type="button" role="tab" aria-controls="v-pills-displays" aria-selected="<?php echo e($tab == 'displays' ? 'true' : 'false'); ?>">
                    <a href=""><?php echo e(__('settings.displays')); ?></a>
                </button>
            </div>
            <div class="tab-content p-3 m-0" id="v-pills-tabContent">
                <div class="tab-pane fade <?php echo e($tab == 'general' ? 'show active' : ''); ?>" id="v-pills-general-setting" role="tabpanel"
                    aria-labelledby="v-pills-general-setting-tab" tabindex="0">
                    <?php if($tab == 'general'): ?> <?php echo $__env->make('admin.setting.partials.general', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
                </div>
                <div class="tab-pane fade <?php echo e($tab == 'branches' ? 'show active' : ''); ?>" id="v-pills-branches" role="tabpanel"
                    aria-labelledby="v-pills-branches-tab" tabindex="0">
                    <?php if($tab == 'branches'): ?> <?php echo $__env->make('admin.setting.partials.branches', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
                </div>
                <div class="tab-pane fade <?php echo e($tab == 'contacts' ? 'show active' : ''); ?>" id="v-pills-contacts" role="tabpanel"
                    aria-labelledby="v-pills-contacts-tab" tabindex="0">
                    <?php if($tab == 'contacts'): ?> <?php echo $__env->make('admin.setting.contacts.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
                </div>
                <div class="tab-pane fade <?php echo e($tab == 'orders' ? 'show active' : ''); ?>" id="v-pills-orders" role="tabpanel"
                    aria-labelledby="v-pills-orders-tab" tabindex="0">
                    <?php if($tab == 'orders'): ?> <?php echo $__env->make('admin.setting.orders.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
                </div>
                <div class="tab-pane fade <?php echo e($tab == 'invoices' ? 'show active' : ''); ?>" id="v-pills-invoices" role="tabpanel"
                    aria-labelledby="v-pills-invoices-tab" tabindex="0">
                    <?php if($tab == 'invoices'): ?> <?php echo $__env->make('admin.setting.partials.invoices', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
                </div>
                <div class="tab-pane fade <?php echo e($tab == 'currencies' ? 'show active' : ''); ?>" id="v-pills-currencies" role="tabpanel"
                    aria-labelledby="v-pills-currencies-tab" tabindex="0">
                    <?php if($tab == 'currencies'): ?> <?php echo $__env->make('admin.setting.currency.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
                </div>
            </div>
        </div>

        <script>
            function adjustActiveTabHeight() {
                const navHeight = document.querySelector('.nav').clientHeight;
                const activeTab = document.querySelector('.tab-pane.active.show');
                const maxHeight = Math.max(navHeight, activeTab.clientHeight);
                if (!activeTab) return;
                activeTab.style.height = maxHeight + 'px';
            }
            document.addEventListener('DOMContentLoaded', function() {
                adjustActiveTabHeight();
                window.addEventListener('resize', adjustActiveTabHeight);
                const navBtns = document.querySelectorAll('.nav button.nav-link');
                navBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        setTimeout(adjustActiveTabHeight, 100);
                    });
                });
            });
        </script>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/setting/index.blade.php ENDPATH**/ ?>