<?php $__env->startSection('title', $monitorTitle ?? 'Monitor Display'); ?>

<?php $__env->startSection('contents'); ?>
<div class="monitor-layout bg-dark text-light min-vh-100 d-flex flex-column">
    <!-- Header -->
    <div class="monitor-header py-4 px-3 text-center border-bottom border-secondary">
        <h1 class="display-4 fw-bold mb-0"><?php echo e($monitorTitle ?? 'Monitor Display'); ?></h1>
        <div class="lead"><?php echo e($monitorSubtitle ?? ''); ?></div>
    </div>

    <!-- Main Content Area -->
    <div class="monitor-content flex-fill container-fluid py-4">
        <!-- Example: Table or Cards for orders -->
        <?php echo $__env->yieldContent('monitor-content'); ?>
    </div>

    <!-- Footer / Marquee -->
    <div class="monitor-footer py-2 bg-secondary text-center">
        <marquee behavior="scroll" direction="left"><?php echo e($monitorFooter ?? 'Welcome to our restaurant! Enjoy our services.'); ?></marquee>
    </div>
</div>

<style>
    .monitor-layout {
        font-size: 1.5rem;
        letter-spacing: 1px;
    }

    .monitor-header {
        background: #222;
    }

    .monitor-footer {
        font-size: 1.2rem;
        background: #333 !important;
    }

    @media (max-width: 768px) {
        .monitor-layout {
            font-size: 1rem;
        }

        .monitor-header h1 {
            font-size: 2rem;
        }
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/layouts/monitors.blade.php ENDPATH**/ ?>