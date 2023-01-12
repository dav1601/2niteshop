<div class="module__block">
    <div class="module__block--item">
        <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if (isset($component)) { $__componentOriginala7d407b395fe165f57bd0dfa2298c8506018cace = $component; } ?>
<?php $component = App\View\Components\Client\Product\Block\Content::resolve(['content' => $content] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('client.product.block.content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Client\Product\Block\Content::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala7d407b395fe165f57bd0dfa2298c8506018cace)): ?>
<?php $component = $__componentOriginala7d407b395fe165f57bd0dfa2298c8506018cace; ?>
<?php unset($__componentOriginala7d407b395fe165f57bd0dfa2298c8506018cace); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/client/product/block/module.blade.php ENDPATH**/ ?>