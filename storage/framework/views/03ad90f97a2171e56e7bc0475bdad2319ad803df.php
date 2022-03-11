<div id="cart__mobile" class="cart__mobile">
<div class="cart__mobile--header">
<span class="title">Giỏ hàng</span>
<span class="cart__mobile--xmark"><i class="fa-solid fa-xmark"></i></span>
</div>
<div class="cart__mobile--content" >
    <div class="cart__drop">
        <ul id="cart__drop--menu" class="cart__drop--menu">
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
<?php /**PATH /home/u217861923/domains/vachill.com/public_html/resources/views/components/mobile/cart/wp.blade.php ENDPATH**/ ?>