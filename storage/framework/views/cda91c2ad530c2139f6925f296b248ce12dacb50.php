<?php
    $menu_fix = App\Models\FixMenu::all();
?>

<div id="biad__header--bot">
    <div class="d-flex justify-content-between align-items-center container">
        <div class="<?php if($name != 'home'): ?> drop__show <?php endif; ?> bot bot__left">
            <a class="b1ad_menu">
                <i class="fas fa-bars"></i>
                <span>Danh mục sản phẩm</span>
            </a>
            <div class="bot__left--drop">
                <?php if (isset($component)) { $__componentOriginalc6b64e917876d8219b5822a2249f530fc2ec18df = $component; } ?>
<?php $component = App\View\Components\Client\Menu\Menu::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('client.menu.menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Client\Menu\Menu::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc6b64e917876d8219b5822a2249f530fc2ec18df)): ?>
<?php $component = $__componentOriginalc6b64e917876d8219b5822a2249f530fc2ec18df; ?>
<?php unset($__componentOriginalc6b64e917876d8219b5822a2249f530fc2ec18df); ?>
<?php endif; ?>
            </div>
        </div>
        <div class="bot bot__center">
            <ul class="d-flex align-items-center">
                <li>
                    <a href="tel:<?php echo e(str_replace(' ', '', getVal('switchboard')->value)); ?>">
                        <i class="fas fa-phone-alt"></i>
                        <span>Mua Hàng:</span>
                        <strong><?php echo e(getVal('switchboard')->value); ?></strong>
                    </a>
                </li>
                <li class="center__drop">
                    <a href="">
                        Sửa Chữa
                    </a>
                    <div class="center__drop--fix">
                        <ul>
                            <?php $__currentLoopData = $menu_fix; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="fix__item">
                                    <a href="<?php echo e(url($fm->link)); ?>"><?php echo e($fm->name); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="bot bot__right">
            <a href="<?php echo e(route('show_cart')); ?>" id="cart">
                <span id="items" class="items"><?php echo e(Cart::instance('shopping')->count()); ?> Sản Phẩm -- Gọi --
                    <?php echo e(getVal('switchboard')->value); ?></span>
                <i class="fas fa-shopping-bag"></i>
            </a>
            <div id="cart__drop" class="cart__drop">
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
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/header/bottom.blade.php ENDPATH**/ ?>