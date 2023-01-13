<ul id="cart__drop--menu">
    <div class="arrow-up"></div>
    <div id="content_sub_cart">
        <?php if(empty_cart()): ?>
            <span class="empty__cart">Giỏ hàng đang trống</span>
        <?php else: ?>
            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartsub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <?php if (isset($component)) { $__componentOriginal9f4678081f50f8e67443ed53ee37ec3f5df3dd29 = $component; } ?>
<?php $component = App\View\Components\Cartsub::resolve(['cartsub' => $cartsub] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cartsub'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cartsub::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9f4678081f50f8e67443ed53ee37ec3f5df3dd29)): ?>
<?php $component = $__componentOriginal9f4678081f50f8e67443ed53ee37ec3f5df3dd29; ?>
<?php unset($__componentOriginal9f4678081f50f8e67443ed53ee37ec3f5df3dd29); ?>
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
            <a href="  <?php echo e(route('show_cart')); ?> " class="d-block" class="davi_btn" id="ckOrCart__cont--cart">
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
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/client/cart/drop.blade.php ENDPATH**/ ?>