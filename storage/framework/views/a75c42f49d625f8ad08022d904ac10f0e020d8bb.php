<?php
$prd = App\Models\Products::where('id', '=' , $cartsub->id)->first();
if($cartsub->options->ins != 0){
$group = App\Models\Insurance::where('id' , $cartsub->options->ins)->first()->group;
} else {
$group = 0;
}
?>
<div class="card__item--sub d-flex justify-content-between align-items-center position-relative">
    <div class="img">
        <a href="<?php echo e(route('detail_product', ['slug'=>$prd->slug])); ?>">
            <img src="<?php echo e($file->ver_img($prd->main_img)); ?>" width="60" alt="">
        </a>
    </div>
    <div class="info">
        <div class="name">
            <a href="<?php echo e(route('detail_product', ['slug'=>$prd->slug])); ?>">
                <?php echo e($cartsub->name); ?>

            </a>
        </div>
        <?php if($cartsub->options->ins != 0 ): ?>
        <div class="option">
            <span><?php echo e($group == 1 ? "Thời gian bảo hành":"Phụ kiện mua kèm"); ?>: <strong><?php echo e(App\Models\Insurance::where('id', '=' , $cartsub->options->ins
                    )->first()->name); ?></strong></span>
        </div>
        <?php endif; ?>
    </div>
    <div class="qty">
        <span class="d-block">
            x<?php echo e($cartsub->qty); ?>

        </span>
    </div>
    <div class="sub_total" style="text-transform: none">
        <span class="d-block">
            <?php echo e(crf($cartsub->options->sub_total)); ?>

        </span>
    </div>
    <div class="remove">
        <span class="d-block delete__cart" data-rowId="<?php echo e($cartsub->rowId); ?>">
            <i class="fas fa-times"></i>
        </span>
    </div>
</div>
<?php /**PATH /home/u217861923/domains/vachill.com/public_html/resources/views/components/cartsub.blade.php ENDPATH**/ ?>