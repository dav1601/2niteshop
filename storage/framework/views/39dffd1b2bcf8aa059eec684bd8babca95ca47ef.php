<?php $__env->startSection('title', $product->name); ?>
<?php $__env->startSection('meta-desc', $product->des); ?>
<?php $__env->startSection('meta-keyword', $product->keywords); ?>
<?php $__env->startSection('news_keywords', $product->keywords); ?>
<?php $__env->startSection('og-title', $product->name); ?>
<?php $__env->startSection('og-desc', $product->des); ?>
<?php if($product->banner): ?>
    <?php $__env->startSection('og-image', $file->ver_img($product->banner_link)); ?>
<?php endif; ?>
<?php $__env->startSection('og-type', 'detail product'); ?>
<?php $__env->startSection('twitter-title', $product->name); ?>

<?php $__env->startSection('import_js'); ?>
    <script src="<?php echo e($file->ver('client/app/js/slide.js')); ?>"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('margin'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php
        $arrGll = collect($product->gll)
            ->groupBy('size')
            ->toArray();
        $arrIns = collect($product->ins)
            ->groupBy('group')
            ->toArray();
        $list_active = [];
        $data_op = [];
        $ops = [];
        if (count($arrIns) > 0) {
            foreach ($arrIns as $group => $item_ins) {
                $list_active[$group] = $item_ins[0];
            }
        }
        foreach ($list_active as $key => $item_g) {
            $ops[] = $item_g['id'];
        }
        $ops = implode(',', $ops);
        $policies = collect($product->policies)->filter(function ($plc) {
            return $plc->fullset == 0;
        });
        $fullset = collect($product->policies)
            ->filter(function ($plc) {
                return $plc->fullset != 0;
            })
            ->first();
        $price = price_product($product, $ops);
        // if (count($arrIns) > 0) {
        //     if (count($list_active) > 0) {
        //         foreach ($list_active as $group => $value) {
        //             $price += (int) $product->price + (int) $value['price'];
        //             $data_op[] = $value['id'];
        //         }
        //     }
        // }
        // else {
        //     if ($product->stock != 2) {
        //         $price = (int) $product->price;
        //     }
        // }
    ?>
    
    <?php if($product->bg != null): ?>
        <?php
            $bg = asset($product->bg);
        ?>
        <style>
            body {
                background-image: url(<?php echo e($bg); ?>);
                background-attachment: fixed;
                background-repeat: no-repeat;

            }

            #breadCrumb .b__crumb {
                margin-bottom: 0px !important;
            }

            #detail__product--content {
                background: white;
            }

            #biad__header--bot {
                background: white;
                padding-left: 0;
                padding-right: 0;
            }
        </style>
    <?php endif; ?>
    <div id="detail__product" class="dtl__prd">
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
                        <?php echo e($product->name); ?>

                    </li>
                </ol>
            </div>
        </div>
        <div id="detail__product--content" class="container">
            <div class="w-100">
                <div class="row dtl__prd mx-0">
                    <div class="dtl__prd--left col-md-6 p-0">
                        <div class="w-100 position-relative">
                            <a class="my__action--prev my__action">
                                <i class="fas fa-chevron-up"></i>
                            </a>
                            <a class="my__action--next my__action">
                                <i class="fas fa-chevron-down"></i>
                            </a>

                            <ul id="vertical">
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
                        <div class="w-100 banner__video">
                            <?php if($product->banner != null): ?>
                                <div class="prd__banner">
                                    <a href="<?php echo e(url($product->banner_link)); ?>" class="d-block">
                                        <img src="<?php echo e($file->ver_img($product->banner)); ?>" class="img-fluid"
                                            alt="<?php echo e($product->name); ?>">
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if($product->video != null): ?>
                                <div class="prd__video mt-4">
                                    <?php echo $product->video; ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="dtl__prd--right col-md-6 pr-0">
                        <div class="w-100" id="prd" class="prd__dtl">

                            <div class="prd__dtl--name">
                                <?php echo e($product->name); ?>

                            </div>
                            <div class="prd__dtl--stats">
                                <ul>
                                    <li><span>Nhà Sản Xuất:</span> <a
                                            href="<?php echo e(url('producer/' . $product->producer->slug)); ?>"
                                            class=""><?php echo e($product->producer->name); ?></a>
                                    </li>
                                    <li><span>Models: <?php echo e($product->model); ?></span></li>
                                </ul>
                            </div>

                            <div class="prd__dtl--price">
                                <span
                                    class="d-block <?php echo e('price-' . $product->id); ?> <?php if($product->stock == 2): ?> call <?php endif; ?>"
                                    data-price="<?php echo e($price); ?>" prd-price="<?php echo e($product->price); ?>">
                                    <?php if($product->stock != 2): ?>
                                        <?php echo e(crf($price)); ?>

                                    <?php else: ?>
                                        CALL-<?php echo e(getVal('switchboard')->value); ?>

                                    <?php endif; ?>
                                </span>
                            </div>


                            <div class="prd__dtl--insur">
                                <?php $__currentLoopData = $arrIns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $g = App\Models\bundled_product::where('id', $key)->first();
                                    ?>
                                    <span class="d-block"><?php echo e($g->name); ?>:
                                        <strong>*</strong></span>
                                    <ul class="insur" id="<?php echo e('insur-' . $key); ?>">
                                        <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_2 => $ins): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $active = $list_active[$key]['id'];
                                            ?>

                                            <li class="insur__item <?php if($ins['id'] == $active): ?> insur__item-active <?php endif; ?>"
                                                data-group="<?php echo e($ins['group']); ?>" data-price="<?php echo e((int) $ins['price']); ?>"
                                                data-id="<?php echo e($ins['id']); ?>">
                                                <span><?php echo e($ins['name']); ?>

                                                    (+
                                                    <?php echo e(crf($ins['price'])); ?>)
                                                </span>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>

                            <div class="prd__dtl--cart row mx-0">
                                
                                <?php if (isset($component)) { $__componentOriginal4298ddbdc8bd28edbcb68906c214424a0d37eab8 = $component; } ?>
<?php $component = App\View\Components\Client\Cart\Add\Btn::resolve(['product' => $product,'options' => $ops] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

                        </div>
                        
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
                            <?php if($fullset != null): ?>
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

                        
                        <?php if($product->info != null): ?>
                            <div class="w-100 prd__dtl--info">
                                <div class="see__detail w-100 position-absolute">
                                    <a class="see__detail--btn d-block"><i class="fas fa-long-arrow-alt-down pr-1"></i>
                                        <span>Xem chi tiết thông số kỹ thuật</span></a>
                                </div>
                                <div class="info__wrapper w-100">
                                    <?php echo $product->info; ?>

                                </div>
                            </div>
                        <?php endif; ?>
                        
                    </div>
                </div>
            </div>
            
            <div class="w-100" id="dtlContent">
                <nav>
                    <div class="nav" id="dtl__tabs" role="tablist">
                        <a class="active" data-toggle="tab" href="#dtl__info" role="tab" aria-selected="true">Thông
                            tin chi
                            tiết</a>
                        <a class="" data-toggle="tab" href="#dtl__review" role="tab"
                            aria-selected="false">Đánh giá</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-dtlContent">
                    <div class="tab-pane active w-100" id="dtl__info" role="tabpanel">
                        <div class="see__detail w-100 position-absolute">
                            <a class="see__full--btn d-block"><i class="fas fa-long-arrow-alt-down pr-1"></i>
                                <span>Xem chi tiết bài viết</span></a>
                        </div>
                        <div id="dtl__info--wrapper">
                            <?php echo $product->content; ?>

                        </div>

                    </div>
                    <div class="tab-pane w-100" id="dtl__review" role="tabpanel">2</div>
                </div>
            </div>

        </div>
        
        <?php if(count($product->related_blogs) > 0): ?>
            <div id="home__blogs">
                <div id="home__blogs--content" class="container">
                    <h2 class="related__blogs--title font-weight-bold text-uppercase mb-3" style="font-size: 17px">Bài
                        viết liên
                        quan :</h1>
                        <div id="area__blogs">
                            <div class="tab-content" id="myTabContent__blogs">
                                <div class="tab-pane active" id="tab__blogs" role="tabpanel">
                                    <div class="owl-carousel owl-theme owl-6">
                                        <?php $__currentLoopData = $product->related_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="item">
                                                <?php if (isset($component)) { $__componentOriginalf39f559c5285947744fdc35c8c7b2100bbecdeab = $component; } ?>
<?php $component = App\View\Components\Blogsubitem::resolve(['blog' => $blog_item] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('blogsubitem'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Blogsubitem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf39f559c5285947744fdc35c8c7b2100bbecdeab)): ?>
<?php $component = $__componentOriginalf39f559c5285947744fdc35c8c7b2100bbecdeab; ?>
<?php unset($__componentOriginalf39f559c5285947744fdc35c8c7b2100bbecdeab); ?>
<?php endif; ?>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        <?php endif; ?>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/client/product/detail.blade.php ENDPATH**/ ?>