<?php
$categories = App\Models\Category::tree();
?>
<ul id="home__menu" class="menu__toggle">
    <?php if (isset($component)) { $__componentOriginal3550924aba183d186089e0a5bc9a703afeee5772 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Client\Menu\Categories::class, ['categories' => $categories]); ?>
<?php $component->withName('client.menu.categories'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3550924aba183d186089e0a5bc9a703afeee5772)): ?>
<?php $component = $__componentOriginal3550924aba183d186089e0a5bc9a703afeee5772; ?>
<?php unset($__componentOriginal3550924aba183d186089e0a5bc9a703afeee5772); ?>
<?php endif; ?>
</ul>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/client/menu/menu.blade.php ENDPATH**/ ?>