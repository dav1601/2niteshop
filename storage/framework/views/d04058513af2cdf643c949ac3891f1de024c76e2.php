<?php
$prd = App\Models\Products::where('id', '=' , $cart->id)->first();
if ($cart->options->ins != 0) {
$group = App\Models\Insurance::where('id' , $cart->options->ins)->first()->group;
} else {
$group = 0;
}
?>
<div class="cart__item flex-wrap">
    <div class="cart__item--image">
        <a href="<?php echo e(route('detail_product', ['slug'=>$prd->slug])); ?>" class="d-block">
            <img src="<?php echo e($file->ver_img($cart->options->image)); ?>" width="100" alt="<?php echo e($cart->name); ?>"
                class="img-fluid">
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
            <span><?php echo e($group == 1 ? "Thời gian bảo hành":"Phụ kiện mua kèm"); ?>: <strong><?php echo e(App\Models\Insurance::where('id', '=' , $cart->options->ins
                    )->first()->name); ?></strong></span>
        </div>
        <?php endif; ?>
        <div class="qty">
            <?php
            if ($cart->options->ins != 0) {
            $op = App\Models\Insurance::where('id', '=' , $cart->options->ins
            )->first()->price;
            } else {
            $op = 0;
            }
            ?>
            <div class="btn__type">
                <a class="btn-number py-0" data-type="minus" data-field="qty[<?php echo e($cart->id); ?>]"><i
                        class="fas fa-minus"></i></a>
            </div>
            <input type="text" name="qty[<?php echo e($cart->id); ?>]" data-id="<?php echo e($cart->id); ?>"
                data-sub="<?php echo e($cart->options->sub_total); ?>" data-rowId="<?php echo e($cart->rowId); ?>" data-op="<?php echo e($op); ?>"
                value="<?php echo e($cart->qty); ?>" id="dtl__prd--qty" min="1" max="1000" class="input-number"
                data-opId="<?php echo e($cart->options->ins); ?>">
            <div class="btn__type">
                <a class="btn-number py-0" data-type="plus" data-field="qty[<?php echo e($cart->id); ?>]"><i
                        class="fas fa-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="cart__item--action d-flex flex-column justify-content-end cia-<?php echo e($cart->id); ?>">
        <span class="sub_total d-block">
            Thành Tiền: <strong><?php echo e(crf($cart->options->sub_total)); ?></strong>
        </span>
        <button class="delete__cart d-inline-block" data-rowId="<?php echo e($cart->rowId); ?>">
            <i class="fas fa-trash"></i> Xoá
        </button>
    </div>
</div>
<?php /**PATH /home/u217861923/domains/vachill.com/public_html/resources/views/components/cart.blade.php ENDPATH**/ ?>