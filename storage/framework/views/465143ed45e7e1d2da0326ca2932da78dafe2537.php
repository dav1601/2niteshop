<?php $__env->startSection('title' , $page->title); ?>
<?php $__env->startSection('margin'); ?> dtl__margin option_page_detail <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="breadCrumb">
    <div class="container">
        <ol class="b__crumb">
            <li class="b__crumb--item">
                <i class="fas fa-home"></i>
            </li>
            <li class="b__crumb--item">
                <i class="fas fa-long-arrow-alt-right"></i>
            </li>
            <li class="b__crumb--item">
                <?php echo e($page->title); ?>

            </li>
        </ol>
    </div>
</div>

<div id="page__detail">
    <div class="container  page__detail">
        <div id="page_content">
            <?php echo $page->content; ?>

        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\client\page\index.blade.php ENDPATH**/ ?>