<div id="collapse-<?php echo e($id); ?>" class="collapse multi-collapse" data-id="<?php echo e($id); ?>" aria-labelledby="headingOne"  >
<ul class="nite__menu lv-<?php echo e($level); ?>">
    <?php if (isset($component)) { $__componentOriginal60e598b48b6ed397697efe971f94a2c8191f8780 = $component; } ?>
<?php $component = App\View\Components\Category\Categories::resolve(['categories' => $category] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('category.categories'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Category\Categories::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal60e598b48b6ed397697efe971f94a2c8191f8780)): ?>
<?php $component = $__componentOriginal60e598b48b6ed397697efe971f94a2c8191f8780; ?>
<?php unset($__componentOriginal60e598b48b6ed397697efe971f94a2c8191f8780); ?>
<?php endif; ?>
   <?php if($id == 120): ?>
   <li class="nite__menu--item">
    <a href="<?php echo e(url('category/amiibo')); ?>"  >
        <div class="icon-name">
            <span>Amiibo</span>
        </div>
    </a>
</li>
<li class="nite__menu--item">
    <a href="<?php echo e(url('category/nintendo-labo')); ?>"  >
        <div class="icon-name">
            <span>Nintendo Labo</span>
        </div>
    </a>
</li>
   <?php endif; ?>
</ul>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/category/arcord.blade.php ENDPATH**/ ?>