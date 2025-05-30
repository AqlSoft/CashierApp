<?php $__env->startSection('contents'); ?>

<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="d-flex justify-content-start align-items-start setting-nav p-0">
            <div class="nav justify-content-start text-end" style="width:200px;" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                <button class="nav-link <?php echo e($tab == 'general' ? 'active' : ''); ?>" id="v-pills-general-setting-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-general-setting" type="button" role="tab" aria-controls="v-pills-general-setting" aria-selected="<?php echo e($tab == 'general' ? 'true' : 'false'); ?>">
                    <a href="<?php echo e(route('product-setting-home')); ?>"><?php echo e(__('settings.home')); ?></a>
                </button>

                <button class="nav-link <?php echo e($tab == 'categroies' ? 'active' : ''); ?>" id="v-pills-branches-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-branches" type="button" role="tab" aria-controls="v-pills-branches" aria-selected="<?php echo e($tab == 'branches' ? 'true' : 'false'); ?>">
                    <a href="<?php echo e(route('display-categories-all')); ?>"><?php echo e(__('settings.categroies')); ?></a>
                </button>

                <button class="nav-link <?php echo e($tab == 'units' ? 'active' : ''); ?>" id="v-pills-contacts-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-contacts" type="button" role="tab" aria-controls="v-pills-contacts" aria-selected="<?php echo e($tab == 'contacts' ? 'true' : 'false'); ?>">
                    <a href="<?php echo e(route('display-units-all')); ?>"><?php echo e(__('settings.units')); ?></a>
                </button>

                <button class="nav-link <?php echo e($tab == 'taxes' ? 'active' : ''); ?>" id="v-pills-orders-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders" aria-selected="<?php echo e($tab == 'orders' ? 'true' : 'false'); ?>">
                    <a href="<?php echo e(route('taxes.index')); ?>"><?php echo e(__('settings.taxes')); ?></a>
                </button>
                  <button class="nav-link <?php echo e($tab == 'tax-groups' ? 'active' : ''); ?>" id="v-pills-orders-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders" aria-selected="<?php echo e($tab == 'orders' ? 'true' : 'false'); ?>">
                    <a href="<?php echo e(route('admin.tax-groups.index')); ?>"><?php echo e(__('settings.taxes-groups')); ?></a>
                </button>

            </div>
            <div class="tab-content p-3 m-0" id="v-pills-tabContent">
                <div class="tab-pane fade <?php echo e($tab == 'general' ? 'show active' : ''); ?>" id="v-pills-general-setting" role="tabpanel"
                    aria-labelledby="v-pills-general-setting-tab" tabindex="0">
                    <?php if($tab == 'general'): ?> <?php echo $__env->make('admin.setting.products.partials.general', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
                </div>
                <div class="tab-pane fade <?php echo e($tab == 'categroies' ? 'show active' : ''); ?>" id="v-pills-branches" role="tabpanel"
                    aria-labelledby="v-pills-branches-tab" tabindex="0">
                    <?php if($tab == 'categroies'): ?> <?php echo $__env->make('admin.setting.categroies.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
                </div>
                <div class="tab-pane fade <?php echo e($tab == 'units' ? 'show active' : ''); ?>" id="v-pills-contacts" role="tabpanel"
                    aria-labelledby="v-pills-contacts-tab" tabindex="0">
                    <?php if($tab == 'units'): ?> <?php echo $__env->make('admin.setting.units.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
                </div>
                <div class="tab-pane fade <?php echo e($tab == 'taxes' ? 'show active' : ''); ?>" id="v-pills-orders" role="tabpanel"
                    aria-labelledby="v-pills-orders-tab" tabindex="0">
                    <?php if($tab == 'taxes'): ?> <?php echo $__env->make('admin.taxes.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
                </div>
                  <div class="tab-pane fade <?php echo e($tab == 'tax-groups' ? 'show active' : ''); ?>" id="v-pills-orders" role="tabpanel"
                    aria-labelledby="v-pills-orders-tab" tabindex="0">
                    <?php if($tab == 'tax-groups'): ?> <?php echo $__env->make('admin.tax-groups.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
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
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/setting/products/index.blade.php ENDPATH**/ ?>