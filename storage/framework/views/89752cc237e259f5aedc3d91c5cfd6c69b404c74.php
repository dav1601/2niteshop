<div id="collapse-<?php echo e($id); ?>" class="collapse multi-collapse" data-id="<?php echo e($id); ?>" aria-labelledby="headingOne"  >
<ul class="nite__menu lv-<?php echo e($level); ?>">
    <?php if (isset($component)) { $__componentOriginal60e598b48b6ed397697efe971f94a2c8191f8780 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Category\Categories::class, ['categories' => $category]); ?>
<?php $component->withName('category.categories'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
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
<?php /**PATH E:\xampp\htdocs\nava\resources\views\components\category\arcord.blade.php ENDPATH**/ ?>