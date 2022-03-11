<?php
$categories = App\Models\Category::tree();
?>
<ul id="home__menu" class="menu__toggle">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.client.menu.categories','data' => ['categories' => $categories]]); ?>
<?php $component->withName('client.menu.categories'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['categories' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($categories)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
</ul>
<?php /**PATH /home/u217861923/domains/vachill.com/public_html/resources/views/components/client/menu/menu.blade.php ENDPATH**/ ?>