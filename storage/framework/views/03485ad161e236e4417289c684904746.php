<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="<?php echo e(asset('assets/admin/js/color.modes.js')); ?>"></script>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title><?php echo $__env->yieldContent('title', 'CashSys |  Cashier System'); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('assets/admin/css/sidebar.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/admin/css/my-custom-styles.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/admin/css/admin-layout.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('extra-links'); ?>
</head>

<body>
    
    <div class="admin-wrapper">
        <?php echo $__env->make('inc.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="content">
            <header id="main-header" class="">
              
                  <p>Arabic</p>
              
            </header>
            <div class="container-fluid pt-5">
                <div class="container">
                    <?php if(session('success')): ?>
                        <div class="alert alert-sm alert-success py-1 mt-2">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if(session('error')): ?>
                        <div class="alert alert-sm alert-danger py-1 mt-2">
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>
                    <?php echo $__env->yieldContent('contents'); ?>
                  

                </div>
            </div>
        </div>
        
    </div>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/js/all.min.js"
        integrity="sha512-1JkMy1LR9bTo3psH+H4SV5bO2dFylgOy+UJhMus1zF4VEFuZVu5lsi4I6iIndE4N9p01z1554ZDcvMSjMaqCBQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="<?php echo e(asset('assets/admin/js/app.main.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/color.modes.js')); ?>"></script>
    <script>
        $(document).ready(() => {

            $('.sidebar-toggle').click(() => {
                $('.sidebar').toggleClass('mini-sidebar');
                $('.sidebar-toggle').toggleClass('turn-90')
            });
        })
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.querySelector('.sidebar-toggle');
            const sidebar = document.querySelector('.main-sidebar');
            const backdrop = document.querySelector('.sidebar-backdrop');
            const body = document.body;

            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('show');
                backdrop.classList.toggle('show');
                body.classList.toggle('sidebar-open');
            });

            backdrop.addEventListener('click', function() {
                sidebar.classList.remove('show');
                backdrop.classList.remove('show');
                body.classList.remove('sidebar-open');
            });
        });
    </script>
</body>

</html>
<?php /**PATH C:\wamp64\www\kashear_project\resources\views/layouts/admin.blade.php ENDPATH**/ ?>