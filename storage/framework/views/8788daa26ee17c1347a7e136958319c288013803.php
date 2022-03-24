<div class="product__item--list d-flex reval-item flex-wrap" data-id="<?php echo e($message->id); ?>">
    <div class="image position-relative" data-id="<?php echo e($message->id); ?>">
        <a href="<?php echo e(route('detail_product', ['slug'=>$message->slug])); ?>" class="image__main">
            <img src="<?php echo e($file->ver_img($message ->main_img)); ?>" alt="<?php echo e($message->name); ?>" class="img-fluid">
        </a>
        <a href="<?php echo e(route('detail_product', ['slug'=>$message->slug])); ?>" class="image__sub">
            <img src="<?php echo e($file->ver_img($message ->sub_img)); ?>" alt="<?php echo e($message->name); ?>" class="img-fluid">
        </a>
        <div class="quick__view qv__<?php echo e($message->id); ?>" data-toggle="tooltip" data-placement="top" title="Xem Nhanh" class="open__modal--qview"
            data-id="<?php echo e($message->id); ?>">
            <i class="fas fa-plus"></i>
        </div>
        <?php if (isset($component)) { $__componentOriginal21bcf1c932c9149c46da0b8caaf3876dbacb371f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Productlabels::class, ['product' => $message]); ?>
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
    </div>
    <div class="info__product">
        <div class="prdcer">
            <span>Nhà sản xuất: <a href="<?php echo e(route('producer', ['slug'=>$message->producer_slug])); ?>"><?php echo e(App\Models\Producer::where('id', '=' ,$message->producer_id )->first()->name); ?></a></span>
        </div>
        <div class="name">
            <a href="<?php echo e(route('detail_product', ['slug'=>$message->slug])); ?>" class="d-block"><?php echo e($message -> name); ?></a>
        </div>
        <div class="des">
            <p><?php echo e($message -> des); ?></p>
        </div>
        <div class="price">
            <?php if($message -> price != 0): ?>
            <span id="price__<?php echo e($message->id); ?>"><?php echo e(crf($message->price)); ?></span>
            <?php else: ?>
            <span id="price__<?php echo e($message->id); ?>">CALL-<?php echo e(getVal("switchboard")->value); ?></span>
            <?php endif; ?>
        </div>
        <div class="prd__dtl--cart row mx-0">
            <div class="qty col-1 p-0 d-flex w-100">
                <input type="text" name="qty[<?php echo e($message->id); ?>]" data-id="<?php echo e($message->id); ?>" value="1"
                    id="dtl__prd--qty" min="1" max="1000" class="w-100 input-number" data-prd="<?php echo e($message ->price); ?>">
                <div class="btn__type d-flex flex-column">
                    <a class="btn-number py-0" data-type="plus" data-field="qty[<?php echo e($message->id); ?>]"><i
                            class="fas fa-plus"></i></a>
                    <a class="btn-number py-0" data-type="minus" data-field="qty[<?php echo e($message->id); ?>]"><i
                            class="fas fa-minus"></i></a>
                </div>
            </div>
            <a class="btn-cart btn-cart-<?php echo e($message->id); ?> col-11 p-0" data-id="<?php echo e($message->id); ?>" id="button-cart" data-qty="1"
                data-price="<?php echo e($message->price); ?>" data-op="0">
                <i class="fas fa-shopping-bag"></i>
                <span>Thêm Giỏ Hàng</span>
            </a>
        </div>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\nava\resources\views\components\listitem.blade.php ENDPATH**/ ?>