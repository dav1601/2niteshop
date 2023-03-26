<div class="section__checkout section__cart">
    <div class="section__checkout--title">
        Giỏ hàng
    </div>
    <div class="section__checkout--body">
        <div id="checkout_cart">
            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginalf4b4cbd14aa875689d096f75790a47118f19ba50 = $component; } ?>
<?php $component = App\View\Components\Cart::resolve(['cart' => $item] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('Cart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf4b4cbd14aa875689d096f75790a47118f19ba50)): ?>
<?php $component = $__componentOriginalf4b4cbd14aa875689d096f75790a47118f19ba50; ?>
<?php unset($__componentOriginalf4b4cbd14aa875689d096f75790a47118f19ba50); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div id="checkout_total">
            <div class="row ck_total mx-0">
                <span class="col-md-9 col-6 pl-0">Chi phí vận chuyển linh hoạt:</span>
                <strong class="col-md-3 col-6 pr-md-4 pr-2">CALL-<?php echo e(getVal('switchboard')->value); ?></strong>
            </div>
            <div class="row ck_total mx-0">
                <span class="col-md-9 col-6 pl-0">Tổng Tiền:</span>
                <strong class="col-md-3 col-6 pr-md-4 pr-2" id="ck_total"><?php echo e(crf(total())); ?></strong>
            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/client/cart/checkout.blade.php ENDPATH**/ ?>