<div class="product__item  w-100 reval-item mb-3 <?php echo e($class); ?>" data-id="<?php echo e($message->id); ?>">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.productlabels','data' => ['product' => $message]]); ?>
<?php $component->withName('productlabels'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['product' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($message)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <div class="product__item--img" data-id="<?php echo e($message->id); ?>">
        <a href="<?php echo e(route('detail_product', ['slug'=>$message->slug])); ?>" class="d-block img_show">
            <img src="<?php echo e($file->ver_img($message->main_img)); ?>" alt="<?php echo e($message->name); ?>" class="img-fluid">
        </a>
        <a href="<?php echo e(route('detail_product', ['slug'=>$message->slug])); ?>" class="d-none img_hide">
            <img src="<?php echo e($file->ver_img($message->sub_img)); ?>" alt="<?php echo e($message->name); ?>" class="img-fluid">
        </a>
        <div class="quick__view qv__<?php echo e($message->id); ?>" data-toggle="tooltip" data-placement="top" title="Xem Nhanh" class="open__modal--qview"
            data-id="<?php echo e($message->id); ?>">
            <i class="fas fa-plus"></i>
        </div>
    </div>
    <div class="product__item--content">
        <a href="<?php echo e(route('detail_product', ['slug'=>$message->slug])); ?>" class="name d-block">
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







<?php /**PATH /home/u217861923/domains/vachill.com/public_html/resources/views/components/product/itemgrid.blade.php ENDPATH**/ ?>