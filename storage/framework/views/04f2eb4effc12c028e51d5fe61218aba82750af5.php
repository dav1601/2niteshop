<?php
    $arrGll = collect($product->gll)
        ->groupBy('size')
        ->toArray();
    $arrIns = collect($product->ins)
        ->groupBy('group')
        ->toArray();
    $list_active = [];
    $data_op = [];
    if (count($arrIns) > 0) {
        foreach ($arrIns as $group => $item_ins) {
            $list_active[$group] = $item_ins[0];
        }
    }
    $policies = collect($product->policies)->filter(function ($plc) {
        return $plc->fullset == 0;
    });
    $fullset = collect($product->policies)
        ->filter(function ($plc) {
            return $plc->fullset != 0;
        })
        ->first();
    $price = 0;
    if (count($arrIns) > 0) {
        if (count($list_active) > 0) {
            foreach ($list_active as $group => $value) {
                $price += (int) $product->price + (int) $value['price'];
                $data_op[] = $value['id'];
            }
        }
    } else {
        if ($product->stock != 2) {
            $price = (int) $product->price;
        }
    }
    $options = implode(',', $data_op);
?>
<div class="box__sub--btn <?php if($product->stock == 3): ?> d-none <?php endif; ?>">
    <?php if (isset($component)) { $__componentOriginal4298ddbdc8bd28edbcb68906c214424a0d37eab8 = $component; } ?>
<?php $component = App\View\Components\Client\Cart\Add\Btn::resolve(['product' => $product,'options' => $options] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('client.cart.add.btn'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Client\Cart\Add\Btn::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4298ddbdc8bd28edbcb68906c214424a0d37eab8)): ?>
<?php $component = $__componentOriginal4298ddbdc8bd28edbcb68906c214424a0d37eab8; ?>
<?php unset($__componentOriginal4298ddbdc8bd28edbcb68906c214424a0d37eab8); ?>
<?php endif; ?>
</div>
<div id="wrapperr" class="position-relative">
    <div id="wrapper__detail">
        <div class="row w-100 dtl__sub mx-0 mb-4 pb-4">
            <div class="col-12 col-lg-6 pl-lg-0 dtl__sub--l">
                <div class="w-100" id="wrapper_slide">
                    <div class="control__prev controls">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                    <div class="control__next controls">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <ul id="detailSubGallery">
                        <?php $__currentLoopData = $arrGll[700]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li data-thumb="<?php echo e($file->ver_img($arrGll[80][$key]['link'])); ?>?now=<?php echo e($carbon->now()->timestamp); ?>"
                                alt="<?php echo e($product->name); ?>">
                                <img src="<?php echo e($file->ver_img($gll['link'])); ?>?now=<?php echo e($carbon->now()->timestamp); ?>"
                                    alt="<?php echo e($product->name); ?>" />
                                <?php if (isset($component)) { $__componentOriginal21bcf1c932c9149c46da0b8caaf3876dbacb371f = $component; } ?>
<?php $component = App\View\Components\Productlabels::resolve(['product' => $product] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('productlabels'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Productlabels::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal21bcf1c932c9149c46da0b8caaf3876dbacb371f)): ?>
<?php $component = $__componentOriginal21bcf1c932c9149c46da0b8caaf3876dbacb371f; ?>
<?php unset($__componentOriginal21bcf1c932c9149c46da0b8caaf3876dbacb371f); ?>
<?php endif; ?>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="col-12 mt-lg-0 col-lg-6 pr-lg-0 dtl__sub--r mt-3">
                <div class="w-100" class="prd__dtl">
                    <div class="prd__dtl--name">
                        <span><?php echo e($product->name); ?></span>
                    </div>
                    <div class="prd__dtl--stats">
                        <ul>
                            <li><span>Nhà Sản Xuất:</span> <a href="<?php echo e(url('producer/' . $product->producer->slug)); ?>"
                                    class=""><?php echo e($product->producer->name); ?></a>
                            </li>
                            <li><span>Models: <?php echo e($product->model); ?></span></li>
                        </ul>
                    </div>


                    <input type="hidden" name="" id="price_prd" value="<?php echo e($product->price); ?>">
                    <div class="prd__dtl--price">

                        <span class="d-block <?php echo e('price-' . $product->id); ?> <?php if($product->stock == 2): ?> call <?php endif; ?>"
                            data-price="<?php echo e($price); ?>">
                            <?php if($product->stock != 2): ?>
                                <?php echo e(crf($price)); ?>

                            <?php else: ?>
                                CALL-<?php echo e(getVal('switchboard')->value); ?>

                            <?php endif; ?>
                        </span>
                    </div>
                    <?php if($product->stock == 1): ?>
                    <div class="prd__dtl--insur">
                        <?php $__currentLoopData = $arrIns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $g = App\Models\bundled_product::where('id', $key)->first();
                            ?>
                            <span class="d-block"><?php echo e($g->name); ?>:
                                <strong>*</strong></span>
                            <ul class="insur" id="<?php echo e('insur-' . $key); ?>">
                                <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ins): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="insur__item <?php if($key == 0): ?> insur__item-active <?php endif; ?>"
                                        data-group="<?php echo e($key); ?>" data-id="<?php echo e($ins['id']); ?>">
                                        <span><?php echo e($ins['name']); ?>

                                            (+
                                            <?php echo e(crf($ins['price'])); ?>)
                                        </span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                    <?php endif; ?>

                    
                    <?php if(count($product->blocks) > 0): ?>
                        <?php if (isset($component)) { $__componentOriginalf4edea9ee637b215ae5ec720d3c073f7fc49622f = $component; } ?>
<?php $component = App\View\Components\Client\Product\Block\Module::resolve(['contents' => $product->blocks] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('client.product.block.module'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Client\Product\Block\Module::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf4edea9ee637b215ae5ec720d3c073f7fc49622f)): ?>
<?php $component = $__componentOriginalf4edea9ee637b215ae5ec720d3c073f7fc49622f; ?>
<?php unset($__componentOriginalf4edea9ee637b215ae5ec720d3c073f7fc49622f); ?>
<?php endif; ?>
                    <?php endif; ?>

                    
                    <div class="d-flex w-100 m-0 mb-3 overflow-hidden">
                        <div class="col-6 nblock__installment">
                            <b>trả góp qua thẻ</b>
                            <span>visa,master card</span>
                        </div>
                        <div class="col-6 nblock__installment">
                            <b>trả góp hdsaigon</b>
                            <span>30p nhận máy,chỉ cần cmnd</span>
                        </div>
                    </div>

                    
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
                        <?php if($fullset): ?>
                            <div class="fullset d-flex align-items-center mb-1">
                                <div class="fs__left">
                                    <?php echo $fullset->icon; ?>

                                </div>
                                <div class="fs__right">
                                    <div class="name">
                                        <span><?php echo e($fullset->title); ?></span>
                                    </div>
                                    <div class="content">
                                        <?php echo $fullset->content; ?>

                                    </div>

                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="policy position-relative">
                            <div class="call position-absolute">
                                <a href="tel:<?php echo e(str_replace(' ', '', getVal('switchboard')->value)); ?>"><i
                                        class="fas fa-phone-volume"></i> Tổng đài
                                    <?php echo e(getVal('switchboard')->value); ?></a>
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
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/modal/detail.blade.php ENDPATH**/ ?>