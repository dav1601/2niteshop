<div class="cart__item flex-wrap">
    <div class="cart__item--image">
        <a href="<?php echo e(route('detail_product', ['slug' => $cart->options->slug])); ?>" class="d-block">
            <img src="<?php echo e($file->ver_img($cart->options->image)); ?>" width="100" alt="<?php echo e($cart->name); ?>"
                class="img-fluid">
        </a>
    </div>
    <input type="hidden" id="cart__options-<?php echo e($cart->id); ?>" value="<?php echo e($cart->options->ins); ?>">
    <div class="cart__item--caption">
        <a href="<?php echo e(route('detail_product', ['slug' => $cart->options->slug])); ?>" class="d-block name">
            <?php echo e($cart->name); ?>

        </a>
        <span class="d-block model">
            Model: <?php echo e($cart->options->model); ?>

        </span>
        <span class="d-block price">
            Giá sản phẩm: <?php echo e(crf($cart->price)); ?>

        </span>

        <?php if($cart->options->ins != 0): ?>
            <div class="ins">
                <?php $__currentLoopData = explode(',', $cart->options->ins); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $ins = App\Models\Insurance::where('id', $value)->first();
                    ?>
                    <?php if($ins): ?>
                        <strong><?php echo e($ins->name); ?></strong>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
        <div class="qty">
            <div class="btn__type">
                <a class="btn-number py-0" <?php if($cart->qty == 1): ?> disabled <?php endif; ?> data-type="minus"
                    data-id="<?php echo e($cart->id); ?>" data-field="qty[<?php echo e($cart->id); ?>]"><i
                        class="fas fa-minus"></i></a>
            </div>
            <input type="text" name="qty[<?php echo e($cart->id); ?>]" min="1" max="1000" class="input-number"
                data-id="<?php echo e($cart->id); ?>" data-ajax="<?php echo e(true); ?>" value="<?php echo e($cart->qty); ?>"
                id="<?php echo e('qty-product-' . $cart->id); ?>">
            <div class="btn__type">
                <a class="btn-number py-0" <?php if($cart->qty == 100): ?> disabled <?php endif; ?> data-type="plus"
                    data-id="<?php echo e($cart->id); ?>" data-field="qty[<?php echo e($cart->id); ?>]"><i
                        class="fas fa-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="cart__item--action d-flex flex-column justify-content-end cia-<?php echo e($cart->id); ?>">
        <span class="sub_total d-block">
            Thành Tiền: <strong id="cart-sub-total-<?php echo e($cart->id); ?>"><?php echo e(crf($cart->options->sub_total)); ?></strong>
        </span>
        <button class="delete__cart d-inline-block" data-rowId="<?php echo e($cart->rowId); ?>">
            <i class="fas fa-trash"></i> Xoá
        </button>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/cart.blade.php ENDPATH**/ ?>