<!doctype html>
<html lang="<?php echo e(App::getLocale()); ?>" dir="<?php echo e($dir); ?>" data-bs-theme="auto">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title><?php echo $__env->yieldContent('title', 'Cashier System'); ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('ce366b8b3640b0beefc0', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));
        });
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('assets/admin/css/sidebar.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/admin/css/my-custom-styles.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/admin/css/admin-layout.css')); ?>" rel="stylesheet">

    <!-- RTL/LTR Styles -->
    <?php if($dir == 'rtl'): ?>
    <link href="<?php echo e(asset('assets/admin/css/rtl.css')); ?>" rel="stylesheet">
    <?php endif; ?>

    <?php echo $__env->yieldContent('extra-links'); ?>

</head>

<body class="<?php echo e($dir); ?>-direction">

    <div class="admin-wrapper">
        <?php echo $__env->make('inc.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <div id="content">
            <header id="main-header" class="">
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <?php echo $__env->yieldContent('header-links'); ?>
                    </ul>
                </nav>
            </header>
            <div class="container-fluid py-5 mb-5">
                <div class="container mt-3">
                    
                    <div aria-live="polite" aria-atomic="true" class="position-relative">
                        <div class="mt-5 toast-container position-fixed 
                            <?php if(app()->getLocale() == 'ar'): ?> top-0 start-0 <?php else: ?> top-0 end-0 <?php endif; ?> p-3" style="z-index: 9999;">
                            <?php if(session('success')): ?>
                            <div class="toast align-items-center text-bg-success border-0 show mt-3" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="d-flex">
                                    <div class="toast-body mt-5">
                                        <?php echo e(session('success')); ?>

                                    </div>
                                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if($errors->any()): ?>
                            <div class="toast align-items-center text-bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="d-flex">
                                    <div class="toast-body">
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div><?php echo e($error); ?></div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if(session('error')): ?>
                            <div class="toast align-items-center text-bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="d-flex">
                                    <div class="toast-body">
                                        <?php echo e(session('error')); ?>

                                    </div>
                                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <?php echo $__env->yieldContent('contents'); ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/js/all.min.js"
        integrity="sha512-1JkMy1LR9bTo3psH+H4SV5bO2dFylgOy+UJhMus1zF4VEFuZVu5lsi4I6iIndE4N9p01z1554ZDcvMSjMaqCBQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Show all toasts automatically
            var toastElList = [].slice.call(document.querySelectorAll('.toast'))
            toastElList.map(function (toastEl) {
                var t = new bootstrap.Toast(toastEl, { delay: 5000 });
                t.show();
            });
            // Tooltip code
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(
                tooltipTriggerEl), {
                placement: 'bottom'
            })
        })
    </script>
    <?php echo $__env->yieldContent('extra-scripts'); ?>
</body>

</html><?php /**PATH C:\wamp64\www\CashierApp\resources\views/layouts/admin.blade.php ENDPATH**/ ?>