<?php
    $options = explode(',', $cartsub->options->ins);
?>

<div class="card__item--sub d-flex justify-content-between align-items-center position-relative">
    <div class="img">

        <a href="<?php echo e(route('detail_product', ['slug' => $cartsub->options->slug])); ?>">
            <img src="<?php echo e($file->ver_img($cartsub->options->image)); ?>" width="60" alt=" <?php echo e($cartsub->name); ?> ">
        </a>
    </div>
    <div class="info">
        <div class="name">
            <a href="<?php echo e(route('detail_product', ['slug' => $cartsub->options->slug])); ?>">
                <?php echo e($cartsub->name); ?>

            </a>
        </div>
        <?php if(count($options) > 0): ?>
            <div class="option">
                <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $op): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $ins = App\Models\Insurance::where('id', '=', $cartsub->options->ins)->first();
                    ?>
                    <?php if($ins): ?>
                        <strong><?php echo e($ins->name); ?></strong>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="qty">
        <span class="d-block">
            x<?php echo e($cartsub->qty); ?>

        </span>
    </div>
    <div class="sub_total" style="text-transform: none">
        <span class="d-block">
            <?php echo e(crf($cartsub->options->sub_total)); ?>

        </span>
    </div>
    <div class="remove">
        <span class="d-block delete__cart" data-rowId="<?php echo e($cartsub->rowId); ?>">
            <i class="fas fa-times"></i>
        </span>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/cartsub.blade.php ENDPATH**/ ?>