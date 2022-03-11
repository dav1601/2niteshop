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
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.category.categories','data' => ['categories' => $categories]]); ?>
<?php $component->withName('category.categories'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['categories' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($categories)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
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
<?php /**PATH /home/u217861923/domains/vachill.com/public_html/resources/views/components/mobile/menu.blade.php ENDPATH**/ ?>