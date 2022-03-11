<div id="collapse-<?php echo e($id); ?>" class="collapse multi-collapse" data-id="<?php echo e($id); ?>" aria-labelledby="headingOne"  >
<ul class="nite__menu lv-<?php echo e($level); ?>">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.category.categories','data' => ['categories' => $category]]); ?>
<?php $component->withName('category.categories'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['categories' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
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
<?php /**PATH /home/u217861923/domains/vachill.com/public_html/resources/views/components/category/arcord.blade.php ENDPATH**/ ?>