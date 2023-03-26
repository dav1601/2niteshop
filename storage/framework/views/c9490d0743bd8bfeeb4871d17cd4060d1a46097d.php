<?php if(count($products) > 0): ?>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide" id="home-swiper-product-<?php echo e($prd->product->id); ?>">
                    <?php if (isset($component)) { $__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967 = $component; } ?>
<?php $component = App\View\Components\Product\Itemgrid::resolve(['type' => '1','message' => $prd->product] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product.itemgrid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Product\Itemgrid::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967)): ?>
<?php $component = $__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967; ?>
<?php unset($__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967); ?>
<?php endif; ?>
                </div>
                <?php
                    unset($prd);
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
<?php else: ?>
    <strong>Hiện chưa có sản phẩm nào !</strong>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/client/products/slides.blade.php ENDPATH**/ ?>