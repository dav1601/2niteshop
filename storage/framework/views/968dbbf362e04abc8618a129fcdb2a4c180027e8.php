<?php
$menu_fix = App\Models\FixMenu::all();
?>

<div id="biad__header--bot">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="<?php if($name != "home"): ?> drop__show <?php endif; ?> bot bot__left ">
            <a class="b1ad_menu">
                <i class="fas fa-bars"></i>
                <span>Danh mục sản phẩm</span>
            </a>
            <div class="bot__left--drop">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.client.menu.menu','data' => []]); ?>
<?php $component->withName('client.menu.menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </div>
        <div class="bot bot__center">
            <ul class="d-flex align-items-center">
                <li>
                    <a href="tel:<?php echo e(str_replace(' ', '', getVal('switchboard')->value)); ?>">
                        <i class="fas fa-phone-alt"></i>
                        <span>Mua Hàng:</span>
                        <strong><?php echo e(getVal('switchboard') ->value); ?></strong>
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
                <span id="items" class="items"><?php echo e(Cart::instance('shopping')->count()); ?> Sản Phẩm -- Gọi -- <?php echo e(getVal('switchboard')->value); ?></span>
                <i class="fas fa-shopping-bag"></i>
            </a>
            <div id="cart__drop" class="cart__drop">
                <ul id="cart__drop--menu">
                    <div class="arrow-up"></div>
                    <div id="content_sub_cart">
                        <?php if(empty_cart()): ?>
                        <span class="empty__cart">Giỏ hàng đang trống</span>
                        <?php else: ?>
                        <?php $__currentLoopData = Cart::instance('shopping')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartsub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.cartsub','data' => ['cartsub' => $cartsub]]); ?>
<?php $component->withName('cartsub'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['cartsub' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cartsub)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                    <?php if(!empty_cart()): ?>
                    <div id="total">
                        <span class="d-block">
                            Tổng Tiền: <strong> <?php echo e(crf(total())); ?></strong>
                        </span>
                    </div>
                    <?php endif; ?>
                </ul>
                <?php if(!empty_cart()): ?>
                <div id="ckOrCart">
                    <div id="ckOrCart__cont">

                        <a href="  <?php echo e(route('show_cart')); ?> " class="d-block" class="davi_btn"
                            id="ckOrCart__cont--cart">
                            <i class="fas fa-shopping-cart pr-2"></i>
                            Giỏ Hàng
                        </a>
                        <a href=" <?php echo e(route('checkout')); ?>" class="d-block" class="davi_btn" id="ckOrCart__cont--ck">
                            Thanh Toán
                            <i class="fas fa-long-arrow-alt-right pl-2"></i>
                        </a>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            
        </div>
    </div>
</div>
<?php /**PATH /home/u217861923/domains/vachill.com/public_html/resources/views/components/header/bottom.blade.php ENDPATH**/ ?>