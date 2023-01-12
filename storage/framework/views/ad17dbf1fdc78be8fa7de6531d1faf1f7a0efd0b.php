<div id="cart__mobile" class="cart__mobile">
    <div class="cart__mobile--header">
        <span class="title">Giỏ hàng</span>
        <span class="cart__mobile--xmark"><i class="fa-solid fa-xmark"></i></span>
    </div>
    <div class="cart__mobile--content">
        <div class="cart__drop">
            <?php if (isset($component)) { $__componentOriginal6d1a7a26d152ced42c26a1f63a6f819871efcd45 = $component; } ?>
<?php $component = App\View\Components\Client\Cart\Drop::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('client.cart.drop'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Client\Cart\Drop::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6d1a7a26d152ced42c26a1f63a6f819871efcd45)): ?>
<?php $component = $__componentOriginal6d1a7a26d152ced42c26a1f63a6f819871efcd45; ?>
<?php unset($__componentOriginal6d1a7a26d152ced42c26a1f63a6f819871efcd45); ?>
<?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/mobile/cart/wp.blade.php ENDPATH**/ ?>