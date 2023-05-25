<div class="fp-loading">
<div class="position-relative w-100 h-100">
    <div class="fp-loading-bg"></div>
    <?php if (isset($component)) { $__componentOriginal48f2abf0c4f5727beb7bd4e16940ceebf447da33 = $component; } ?>
<?php $component = App\View\Components\Layout\Loading::resolve(['center' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.loading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layout\Loading::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal48f2abf0c4f5727beb7bd4e16940ceebf447da33)): ?>
<?php $component = $__componentOriginal48f2abf0c4f5727beb7bd4e16940ceebf447da33; ?>
<?php unset($__componentOriginal48f2abf0c4f5727beb7bd4e16940ceebf447da33); ?>
<?php endif; ?>
</div>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/layout/pageloading.blade.php ENDPATH**/ ?>