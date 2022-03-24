<?php
$prd = App\Models\Products::where('id', '=' , $cart->id)->first();
?>
<div class="cart__item">
    <div class="cart__item--image">
        <a href="<?php echo e(route('detail_product', ['slug'=>$prd->slug])); ?>" class="d-block">
            <img src="<?php echo e($file->ver_img($cart->options->image)); ?>" width="100" alt="">
        </a>
    </div>
    <div class="cart__item--caption">
        <a href="<?php echo e(route('detail_product', ['slug'=>$prd->slug])); ?>" class="d-block name">
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
            <span>Chế độ bảo hành: <strong><?php echo e(App\Models\Insurance::where('id', '=' , $cart->options->ins
                    )->first()->name); ?></strong></span>
        </div>
        <?php endif; ?>
        <div class="qty">
            <span>Số Lượng: x <strong><?php echo e($cart->qty); ?></strong></span>
        </div>
    </div>
    <div class="cart__item--action cia-<?php echo e($cart->id); ?> d-flex flex-column justify-content-end">
        <span class="sub_total d-block">
            Thành Tiền: <strong><?php echo e(crf($cart->options->sub_total)); ?></strong>
        </span>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\nava\resources\views\components\carts.blade.php ENDPATH**/ ?>