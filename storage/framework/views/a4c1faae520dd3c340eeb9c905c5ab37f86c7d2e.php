<?php
    $qty = $custom['qty'];
    $class = '';

?>
<div class="row w-100 cart-handler <?php echo e('cart-handler-' . $product->id); ?> mx-0">
    <?php if($product->stock == 1 && $product->price != 0): ?>
        <div class="qty col-1 d-flex w-100 p-0">
            <input type="text" name="qty[<?php echo e($product->id); ?>]" data-id="<?php echo e($product->id); ?>" value="<?php echo e($qty); ?>"
                id="<?php echo e('qty-product-' . $product->id); ?>" min="1" max="100" class="w-100 input-number">
            
            <input type="hidden" value="<?php echo e($options); ?>" id="<?php echo e('cart__options-' . $product->id); ?>">
            
            <div class="btn__type d-flex flex-column">
                <a class="btn-number py-0" <?php if($qty == 100): ?> disabled <?php endif; ?> data-type="plus"
                    data-ajax="<?php echo e($ajax); ?>" data-id="<?php echo e($product->id); ?>"
                    data-field="qty[<?php echo e($product->id); ?>]"><i class="fas fa-plus"></i></a>
                <a class="btn-number <?php if($qty == 1): ?> disabled <?php endif; ?> py-0"
                    data-ajax="<?php echo e($ajax); ?>" data-type="minus" data-id="<?php echo e($product->id); ?>"
                    data-field="qty[<?php echo e($product->id); ?>]"><i class="fas fa-minus"></i></a>
            </div>
        </div>

        <a class="btn-cart col-11 p-0" data-id="<?php echo e($product->id); ?>" id="<?php echo e('btn-add-cart-' . $product->id); ?>">
            <div class="btn-cart-add">
                <i class="fas fa-shopping-bag"></i>
                <span>Thêm Giỏ Hàng</span>
            </div>
            <img src="https://res.cloudinary.com/vanh-tech/image/upload/v1673454469/web-layout-images/Spinner-1s-200px_1_rcuxmn.gif"
                class="d-none btn-cart-loading" alt="loading-cart">
        </a>
    <?php else: ?>
        <a class="col-12 btn-preOrder" data-id="<?php echo e($product->id); ?>" id="preOrder">
            <i class="fas fa-shopping-bag"></i>
            <span>Đặt Hàng Ngay</span>
        </a>
    <?php endif; ?>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/client/cart/add/btn.blade.php ENDPATH**/ ?>