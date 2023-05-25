<?php $__env->startSection('import_js'); ?>
    <script src="<?php echo e($file->import_js('home.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(getVal('background')->value != null): ?>
        <?php
            $bg = $file->ver_img(getVal('background')->value);
        ?>
        <style>
            body {
                background-image: url(<?php echo e($bg); ?>);
                background-attachment: fixed;
                background-repeat: no-repeat;
            }

            #biad__content--home {
                background: white;
                padding-left: 0;
                padding-right: 0;
            }

            #biad__header--bot {
                background: white;
            }

            #biad__header--bot>div {
                padding-left: 0;
                padding-right: 0;
            }

            .show__home {
                padding-left: 10px;
                padding-right: 10px;
            }

            .show__home--box:last-child {
                margin-bottom: 0 !important;
                padding-bottom: 100px;
            }
        </style>
    <?php endif; ?>
    

    
   
    
    
    </div>

    
    
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/home.blade.php ENDPATH**/ ?>