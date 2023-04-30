<?php
    $categories = App\Models\Category::tree();
?>
<div class="mobile__menu --category mobile__main__menu">
    <div style="" class="mobile__menu--category">
        <div class="mobile__menu--header">
            <span>Menu</span>
            <a class="close__menu"><i class="fa-solid fa-xmark"></i></a>
        </div>
        <div class="mobile__menu--content">
            <ul id="accordionMobile" class="nite__menu">
                <?php if (isset($component)) { $__componentOriginal60e598b48b6ed397697efe971f94a2c8191f8780 = $component; } ?>
<?php $component = App\View\Components\Category\Categories::resolve(['categories' => $categories] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <li class="nite__menu--item">
                    <a href="tel:<?php echo e(str_replace(' ', '', getVal('switchboard')->value)); ?>">
                        <div class="icon-name">
                            <img src="<?php echo e($file->ver_img_local('client/images/phone-call.png')); ?>" width="25"
                                height="25" alt="icon phone call">
                            <strong class="d-block ml-2">Mua Hàng:
                                <?php echo e(str_replace(' ', '', getVal('switchboard')->value)); ?></strong>
                        </div>
                    </a>
                </li>
                <li class="nite__menu--item">
                    <a href="https://suachua.haloshop.vn">
                        <div class="icon-name">
                            <img src="<?php echo e($file->ver_img_local('client/images/service.png')); ?>" width="25"
                                height="25" alt="icon service">
                            <strong class="d-block ml-2">Sữa Chữa</strong>
                        </div>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/mobile/menu.blade.php ENDPATH**/ ?>