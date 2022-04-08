<?php
$nameRoute = Route::currentRouteName();
if ($nameRoute == "index_product" || $nameRoute == "index_product_1" || $nameRoute == "index_product_2"){
$product_cat = Str::replaceFirst('/', '', Str::replace(url('category/'), '', url()->current()));
$route_product = url('products/'.$product_cat.'/'.$message->slug);
} else {
$route_product = route('detail_product', ['slug'=>$message->slug]);
}
?>
<div class="product__item  w-100 reval-item mb-3 <?php echo e($class); ?>" data-id="<?php echo e($message->id); ?>">
    <?php if (isset($component)) { $__componentOriginal21bcf1c932c9149c46da0b8caaf3876dbacb371f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Productlabels::class, ['product' => $message]); ?>
<?php $component->withName('productlabels'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal21bcf1c932c9149c46da0b8caaf3876dbacb371f)): ?>
<?php $component = $__componentOriginal21bcf1c932c9149c46da0b8caaf3876dbacb371f; ?>
<?php unset($__componentOriginal21bcf1c932c9149c46da0b8caaf3876dbacb371f); ?>
<?php endif; ?>
    <div class="product__item--img" data-id="<?php echo e($message->id); ?>">
        <a href="<?php echo e($route_product); ?>" class="d-block img_show">
            <img src="<?php echo e($file->ver_img($message->main_img)); ?>" alt="<?php echo e($message->name); ?>" class="img-fluid">
        </a>
        <a href="<?php echo e($route_product); ?>" class="d-none img_hide">
            <img src="<?php echo e($file->ver_img($message->sub_img)); ?>" alt="<?php echo e($message->name); ?>" class="img-fluid">
        </a>
        <div class="quick__view qv__<?php echo e($message->id); ?>" data-toggle="tooltip" data-placement="top" title="Xem Nhanh"
            class="open__modal--qview" data-id="<?php echo e($message->id); ?>">
            <i class="fas fa-plus"></i>
        </div>
    </div>
    <div class="product__item--content">
        <a href="<?php echo e($route_product); ?>" class="name d-block">
            <?php echo e($message->name); ?>

        </a>
        <?php if($message->stock != 2 ): ?>
        <span class="price text-center d-block">
            <?php echo e(crf($message->price)); ?>

        </span>
        <?php else: ?>
        <span class="price text-center d-block">
            CALL-<?php echo e(getVal("switchboard") ->value); ?>

        </span>
        <?php endif; ?>
    </div>
</div>







<?php /**PATH E:\xampp\htdocs\nava\resources\views\components\product\itemgrid.blade.php ENDPATH**/ ?>