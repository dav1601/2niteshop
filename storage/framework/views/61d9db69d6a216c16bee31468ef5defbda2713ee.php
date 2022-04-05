<?php
$categories = App\Models\Category::tree();
?>
<div class="mobile__menu mobile__main__menu">
    <div class="w-100">
        <div class="mobile__menu--header">
            <span>Menu</span>
            <a class="close__menu"><i class="fa-solid fa-xmark"></i></a>
        </div>
        <div class="mobile__menu--content">
            <ul id="accordionMobile" class="nite__menu">
                <?php if (isset($component)) { $__componentOriginal60e598b48b6ed397697efe971f94a2c8191f8780 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Category\Categories::class, ['categories' => $categories]); ?>
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
                <li class="nite__menu--item">
                    <a href="tel:<?php echo e(str_replace(' ', '', getVal('switchboard')->value)); ?>"  >
                        <div class="icon-name">
                            <img src="<?php echo e($file->ver_img('client/images/phone-call.png')); ?>" width="25" height="25" alt="">
                            <strong class="d-block ml-2">Mua Hàng: <?php echo e(str_replace(' ', '', getVal('switchboard')->value)); ?></strong>
                        </div>
                    </a>
                </li>
                <li class="nite__menu--item">
                    <a href="https://suachua.haloshop.vn">
                        <div class="icon-name">
                            <img src="<?php echo e($file->ver_img('client/images/service.png')); ?>" width="25" height="25" alt="">
                            <strong class="d-block ml-2">Sữa Chữa</strong>
                        </div>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\nava\resources\views/components/mobile/menu.blade.php ENDPATH**/ ?>