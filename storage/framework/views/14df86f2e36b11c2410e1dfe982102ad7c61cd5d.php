<?php $__env->startSection('import_js'); ?>
<script src="<?php echo e($file->ver('client/app/js/cart.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('margin'); ?> dtl__margin  option_cart <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div id="breadCrumb">
    <div class="container">
        <ol class="b__crumb">
            <li class="b__crumb--item">
                <i class="fas fa-home"></i>
            </li>
            <li class="b__crumb--item">
                <i class="fas fa-long-arrow-alt-right"></i>
            </li>
            <li class="b__crumb--item">
               Giỏ Hàng
            </li>
        </ol>
    </div>
</div>

<div id="cart" >
<div class="container" id="empty_output">
    <?php if(Cart::instance('shopping')->count() > 0): ?>
    <div id="cart__show" class="cartShow row mx-0">
        <div class="col-12 col-lg-8" id="wp_cartShow_left">
            <div class="w-100 cartShow--left">
                <?php $__currentLoopData = Cart::instance('shopping')->content()->sortBy('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginalf4b4cbd14aa875689d096f75790a47118f19ba50 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Cart::class, ['cart' => $cart]); ?>
<?php $component->withName('Cart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf4b4cbd14aa875689d096f75790a47118f19ba50)): ?>
<?php $component = $__componentOriginalf4b4cbd14aa875689d096f75790a47118f19ba50; ?>
<?php unset($__componentOriginalf4b4cbd14aa875689d096f75790a47118f19ba50); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="col-12 col-lg-4 pr-0 " id="wp_cartShow_right">
              <div class="w-100 cartShow--right">
                <span class="d-block plus_cart">cộng giỏ hàng</span>
                <div class="box-total bt-qty d-flex justify-content-between align-items-center">
                      <span>Số Lượng sản phẩm</span>
                      <strong><?php echo e(Cart::instance('shopping')->count()); ?></strong>
                </div>
                <div class="box-total bt-price d-flex justify-content-between align-items-center">
                  <span>Tổng giỏ hàng</span>
                  <strong> <?php echo e(crf(total())); ?></strong>
              </div>
              <div class="box-total">
                  <a href="<?php echo e(route('checkout')); ?>" class="davi_btn w-100">Thanh toán</a>
              </div>
              </div>
        </div>
  </div>
    <?php else: ?>

        <div id="cart__empty" class="d-flex flex-column align-items-center">
             <img src="<?php echo e($file->ver_img('client/images/empty-cart.png')); ?>" alt="">
             <span class="d-block my-2 text-uppercase mr-4" style="font-size: 20px; font-weight:600;">Giỏ hàng bạn đang trống</span>
        </div>
    <?php endif; ?>

</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\client\cart\show.blade.php ENDPATH**/ ?>