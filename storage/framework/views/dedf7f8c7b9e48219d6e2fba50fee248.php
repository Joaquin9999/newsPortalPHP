<!-- resources/views/layouts/main.blade.php -->
<!doctype html>
<html lang="en">
<?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Referencia al archivo head.blade.php -->

<body>

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main>
        <?php echo $__env->yieldContent('content'); ?><!-- Aquí se insertará el contenido específico de la página -->
    </main>

    <footer>
        <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </footer>

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>


    <script src="<?php echo e(asset('backend/assets plantilla news/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets plantilla news/js/tiny-slider.js')); ?>"></script>

    <script src="<?php echo e(asset('backend/assets plantilla news/js/flatpickr.min.js')); ?>"></script>


    <script src="<?php echo e(asset('backend/assets plantilla news/js/aos.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets plantilla news/js/glightbox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets plantilla news/js/navbar.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets plantilla news/js/counter.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets plantilla news/js/custom.js')); ?>"></script>

</body>

</html><?php /**PATH /home/neji21/Documents/php/newsPortalPHP/resources/views/layouts/main.blade.php ENDPATH**/ ?>