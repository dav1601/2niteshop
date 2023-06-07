<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['classWp' => '']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['classWp' => '']); ?>
<?php foreach (array_filter((['classWp' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php
    $nameRoute = Route::currentRouteName();
    if ($nameRoute == 'index_product' || $nameRoute == 'index_product_1' || $nameRoute == 'index_product_2') {
        $product_cat = Str::replaceFirst('/', '', Str::replace(url('category/'), '', url()->current()));
        $route_product = url('products/' . $product_cat . '/' . $message->slug);
    } else {
        $route_product = route('detail_product', ['slug' => $message->slug]);
    }
?>
<div class="<?php echo e($classWp); ?>">
    <div class="product__item--list d-flex reval-item w-100 flex-wrap" data-id="<?php echo e($message->id); ?>">
        <div class="image position-relative" data-id="<?php echo e($message->id); ?>">
            <a href="<?php echo e($route_product); ?>" class="img_show">
                <img data-src="<?php echo e($file->ver_img($message->main_img)); ?>" alt="<?php echo e($message->name); ?>" class="lazyload">
            </a>
            <a href="<?php echo e($route_product); ?>" class="img_hide">
                <img data-src="<?php echo e($file->ver_img($message->sub_img)); ?>" alt="<?php echo e($message->name); ?>" class="lazyload">
            </a>
            <div class="quick__view qv__<?php echo e($message->id); ?>" data-toggle="tooltip" data-placement="top"
                title="Xem Nhanh" class="open__modal--qview" data-id="<?php echo e($message->id); ?>">
                <i class="fas fa-plus"></i>
            </div>
            <?php if (isset($component)) { $__componentOriginal21bcf1c932c9149c46da0b8caaf3876dbacb371f = $component; } ?>
<?php $component = App\View\Components\Productlabels::resolve(['product' => $message] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('productlabels'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Productlabels::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal21bcf1c932c9149c46da0b8caaf3876dbacb371f)): ?>
<?php $component = $__componentOriginal21bcf1c932c9149c46da0b8caaf3876dbacb371f; ?>
<?php unset($__componentOriginal21bcf1c932c9149c46da0b8caaf3876dbacb371f); ?>
<?php endif; ?>
        </div>
        <div class="info__product">
            <div class="prdcer">
                <span>Nhà sản xuất: <a
                        href="<?php echo e(route('producer', ['slug' => $message->producer->slug])); ?>"><?php echo e($message->producer->name); ?></a></span>
            </div>
            <div class="name">
                <a href="<?php echo e($route_product); ?>" class="d-block"><?php echo e($message->name); ?></a>
            </div>
            <div class="des">
                <p><?php echo ltrim(Str::limit(strip_tags($message->content), 240, '..'), '&nbsp;'); ?></p>
            </div>
            <div class="price">
                <?php if($message->price != 0): ?>
                    <span id="price__<?php echo e($message->id); ?>" class="<?php echo e('price-' . $message->id); ?>"
                        prd-price="<?php echo e($message->price); ?>"
                        data-price="<?php echo e($message->price); ?>"><?php echo e(crf($message->price)); ?></span>
                <?php else: ?>
                    <span id="price__<?php echo e($message->id); ?>">CALL-<?php echo e(getVal('switchboard')->value); ?></span>
                <?php endif; ?>
            </div>
            <div class="d-inline-block ml-1">
                <?php if (isset($component)) { $__componentOriginal4298ddbdc8bd28edbcb68906c214424a0d37eab8 = $component; } ?>
<?php $component = App\View\Components\Client\Cart\Add\Btn::resolve(['product' => $message] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('client.cart.add.btn'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Client\Cart\Add\Btn::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4298ddbdc8bd28edbcb68906c214424a0d37eab8)): ?>
<?php $component = $__componentOriginal4298ddbdc8bd28edbcb68906c214424a0d37eab8; ?>
<?php unset($__componentOriginal4298ddbdc8bd28edbcb68906c214424a0d37eab8); ?>
<?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/listitem.blade.php ENDPATH**/ ?>