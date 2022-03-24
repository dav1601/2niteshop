<?php
$fullset = 0;
$policies = array();
$policy = explode(",", $product->policy);
foreach ($policy as $item) {
if (App\Models\Policy::where('id', '=', $item)->first()->fullset == 1) {
$fullset = $item;
} else {
$policies[] = App\Models\Policy::where('id', '=', $item)->first();
}
}
$policies = collect($policies);
$policies = $policies->sortBy('position');
if ($product->insurance != NULL) {
$insurance = explode("," , $product->insurance);
$price = $product->price + App\Models\Insurance::where('id', '=' ,
$insurance[0])->first()->price;
} else {
if ($product->stock != 2) {
$price = $product->price ;
} else {
$price = 0;
}
}
if ($product->insurance != NULL) {
$group = App\Models\Insurance::whereIn('id' , explode("," , $product->insurance))->select('group')->distinct()->first()->group;
} else {
$group = 0;
}
?>
<div class="box__sub--btn    <?php if($product->stock==3): ?> d-none <?php endif; ?>">
    <div class="prd__dtl--cart row mx-0">
        <?php if($product->stock == 1 && $product->price != 0): ?>
        <div class="qty col-1 p-0 d-flex w-100">
            <input type="text" name="qty[<?php echo e($product->id); ?>]" data-id="<?php echo e($product->id); ?>" value="1" id="dtl__prd--qty"
                min="1" max="1000" class="w-100 input-number">
            <div class="btn__type d-flex flex-column">
                <a class="btn-number py-0" data-type="plus" data-field="qty[<?php echo e($product->id); ?>]"><i
                        class="fas fa-plus"></i></a>
                <a class="btn-number py-0" data-type="minus" data-field="qty[<?php echo e($product->id); ?>]"><i
                        class="fas fa-minus"></i></a>
            </div>
        </div>
        <a class="btn-cart col-11 p-0" data-id="<?php echo e($product->id); ?>" id="button-cart" data-qty="1"
            data-price="<?php echo e($price); ?>" data-op="0">
            <i class="fas fa-shopping-bag"></i>
            <span>Thêm Giỏ Hàng</span>
        </a>
        <?php else: ?>
        <a class="col-12 btn-preOrder" data-id="<?php echo e($product->id); ?>" id="preOrder">
            <i class="fas fa-shopping-bag"></i>
            <span>Đặt Hàng Ngay</span>
        </a>
        <?php endif; ?>
    </div>
</div>
<div id="wrapperr" class="position-relative">
    <div id="wrapper__detail">
        <div class="row mx-0 w-100 dtl__sub mb-4 pb-4">
            <div class="col-6 pl-0 dtl__sub--l">
                <div class="w-100" id="wrapper_slide">
                    <div class="control__prev controls">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                    <div class="control__next controls">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <ul id="detailSubGallery">
                        <?php $__currentLoopData = App\Models\Products::find($product->id)->gll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($gll -> size == 700): ?>
                        <?php
                        if (App\Models\gllProducts::where('products_id' , '=' , $gll->products_id) -> where('index', '='
                        ,
                        $gll->index) -> where('size' , '=' , 80) -> first()) {
                        $link_80 = App\Models\gllProducts::where('products_id' , '=' , $gll->products_id) ->
                        where('index' , '=' , $gll->index) -> where('size' , '=' , 80) -> first()->link;
                        } else {
                        $link_80 = $gll->link;
                        }
                        ?>
                        <li data-thumb="<?php echo e($file->ver_img($link_80)); ?>" class="position-relative">
                            <img src="<?php echo e($file->ver_img($gll->link)); ?>" />
                            <?php if (isset($component)) { $__componentOriginal21bcf1c932c9149c46da0b8caaf3876dbacb371f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Productlabels::class, ['product' => $product]); ?>
<?php $component->withName('productlabels'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal21bcf1c932c9149c46da0b8caaf3876dbacb371f)): ?>
<?php $component = $__componentOriginal21bcf1c932c9149c46da0b8caaf3876dbacb371f; ?>
<?php unset($__componentOriginal21bcf1c932c9149c46da0b8caaf3876dbacb371f); ?>
<?php endif; ?>
                        </li>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="col-6 pr-0 dtl__sub--r">
                <div class="w-100" class="prd__dtl">
                    <div class="prd__dtl--name">
                        <span><?php echo e($product->name); ?></span>
                    </div>
                    <div class="prd__dtl--stats">
                        <ul>
                            <li><span>Nhà Sản Xuất:</span> <a href="<?php echo e(url('producer/'.$product->producer_slug)); ?>"
                                    class=""><?php echo e(App\Models\Producer::where('id', '=' ,
                                    $product->producer_id)->first()->name); ?></a></li>
                            <li><span>Models: <?php echo e($product->model); ?></span></li>
                        </ul>
                    </div>


                    <input type="hidden" name="" id="price_prd" value="<?php echo e($product->price); ?>">
                    <div class="prd__dtl--price">
                        <span class="d-block  <?php if($product->stock == 2 ): ?> call <?php endif; ?>"
                            data-price="<?php echo e($price); ?>"><?php if($product->stock!=2): ?>
                            <?php echo e(crf($price)); ?>

                            <?php else: ?>
                            CALL-<?php echo e(getVal('switchboard') ->value); ?>

                            <?php endif; ?></span>
                    </div>
                    <?php if($product->insurance != NULL): ?>
                    <div class="prd__dtl--insur">
                        <span class="d-block"><?php echo e($group == 1 ? "Chọn thời gian bảo hành":"Chọn phụ kiện mua kèm"); ?>:
                            <strong>*</strong></span>
                        <ul class="insur">
                            <?php $__currentLoopData = $insurance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ins): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="insur__item <?php if($key == 0): ?> insur__item-active <?php endif; ?>"
                                data-price="<?php echo e(App\Models\Insurance::where('id', '=' ,  $ins)->first()->price); ?>"
                                data-id="<?php echo e($ins); ?>">
                                <span><?php echo e(App\Models\Insurance::where('id', '=' , $ins)->first()->name); ?> (+ <?php echo e(crf(App\Models\Insurance::where('id', '=' , $ins)->first()->price)); ?>)</span>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <div class="w-100 prd__dtl--contact">
                        <div class="contact">
                            <div class="contact__top">
                                <span class="d-block"><i class="fas fa-phone-alt"></i> Mua Hàng Liên Hệ Tổng Đài: <a
                                        href="tel:<?php echo e(str_replace(' ', '', getVal('switchboard')->value)); ?>"><?php echo e(getVal('switchboard')->value); ?></a></span>
                            </div>
                            <div class="contact__bot">
                                <span>Vui lòng gọi kiểm tra số lượng trước khi tới cửa hàng</span>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 prd__dtl--stars d-flex align-items-center">
                        <div class="rating">
                            <span class="stack">
                                <i class="far fa-star"></i>
                            </span>
                            <span class="stack">
                                <i class="far fa-star"></i>
                            </span>
                            <span class="stack">
                                <i class="far fa-star"></i>
                            </span>
                            <span class="stack">
                                <i class="far fa-star"></i>
                            </span>
                            <span class="stack">
                                <i class="far fa-star"></i>
                            </span>
                        </div>
                        <div class="reviews ml-3">
                            <span>Dựa trên 0 Đánh Giá. - Viết đánh giá</span>
                        </div>
                    </div>
                    
                    <div class="w-100 prd__dtl--policy">
                        <?php if($fullset != 0): ?>
                        <?php
                        $fs = App\Models\Policy::where('id', '=' , $fullset)->first();
                        ?>
                        <div class="fullset mb-1 d-flex align-items-center">
                            <div class="fs__left">
                                <?php echo $fs->icon; ?>

                            </div>
                            <div class="fs__right">
                                <div class="name">
                                    <span><?php echo e($fs->title); ?></span>
                                </div>
                                <div class="content">
                                    <?php echo $fs->content; ?>

                                </div>

                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="policy position-relative">
                            <div class="call position-absolute">
                                <a href="tel:<?php echo e(str_replace(' ', '', getVal('switchboard')->value)); ?>"><i
                                        class="fas fa-phone-volume"></i> Tổng đài <?php echo e(getVal('switchboard')->value); ?></a>
                                <a href="tel:<?php echo e(str_replace('.', '', getVal('hotline')->value)); ?>"><i
                                        class="fas fa-mobile-alt"></i> HOTLINE <?php echo e(getVal('hotline')->value); ?></a>
                            </div>
                            <ul class="plc">
                                <?php $__currentLoopData = $policies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="plc__item">
                                    <span class="plc__item--icon">
                                        <?php echo $plc->icon; ?>

                                    </span>
                                    <div class="plc__item--content">
                                        <div class="name">
                                            <span class="d-block"> <?php echo e($plc->title); ?></span>
                                        </div>
                                        <div class="content">
                                            <?php echo $plc->content; ?>

                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>
                        </div>
                    </div>
                    
                    

                </div>
            </div>
        </div>
        
        <div id="dtl__info--wrapper" class="w-100" style="overflow: hidden">
            <h1 class="info-title">Thông Tin Sản Phẩm</h1>
            <?php echo $product->content; ?>

        </div>

        

        
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\nava\resources\views\components\modal\detail.blade.php ENDPATH**/ ?>