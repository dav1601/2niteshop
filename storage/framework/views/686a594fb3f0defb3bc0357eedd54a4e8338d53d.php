<?php $__env->startSection('title' , $product->name); ?>
<?php $__env->startSection('meta-desc' , $product->des); ?>
<?php $__env->startSection('meta-keyword' , $product->keywords); ?>
<?php $__env->startSection('og-title' , $product->name); ?>
<?php $__env->startSection('og-desc' , $product->des); ?>
<?php if($banner): ?>
<?php $__env->startSection('og-image' , $file->ver_img($banner->link)); ?>
<?php else: ?>
<?php $__env->startSection('og-image' , $file->main_banner()); ?>
<?php endif; ?>
<?php $__env->startSection('og-type' , 'product'); ?>
<?php $__env->startSection('twitter-title' , $product->name); ?>

<?php $__env->startSection('import_js'); ?>
<script src="<?php echo e($file->ver('client/app/js/slide.js')); ?>"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('margin'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if($product->bg != NULL): ?>
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
                <?php
                $index = count($bc)
                ?>
                <?php $__currentLoopData = $bc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $name = App\Models\Category::select('name')->where('slug', $b )->first();
                ?>
                <?php if($name): ?>
                <?php if($key != $index && $key != 0): ?>
                <li class="b__crumb--item">
                    <i class="fas fa-long-arrow-alt-right"></i>
                </li>
                <?php endif; ?>
                <li class="b__crumb--item">
                    <h1><?php echo e($name->name); ?></h1>
                </li>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <li class="b__crumb--item">
                    <i class="fas fa-long-arrow-alt-right"></i>
                </li>
                <li class="b__crumb--item">
                    <h1><?php echo e($product->name); ?></h1>
                </li>
            </ol>
        </div>
    </div>
    <div id="detail__product--content" class="container">
        <div class="w-100">
            <div class="row mx-0 dtl__prd">
                <div class="dtl__prd--left col-md-6 p-0">
                    <div class="w-100 position-relative">
                        <a class="my__action--prev my__action">
                            <i class="fas fa-chevron-up"></i>
                        </a>
                        <a class="my__action--next my__action">
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul id="vertical">
                            <?php $__currentLoopData = App\Models\Products::find($product->id)->gll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($gll -> size == 700): ?>
                            <?php
                            if (App\Models\gllProducts::where('products_id' , '=' , $gll->products_id) -> where('index'
                            , '=' , $gll->index) -> where('size' , '=' , 80) -> first()) {
                            $link_80 = App\Models\gllProducts::where('products_id' , '=' , $gll->products_id) ->
                            where('index' , '=' , $gll->index) -> where('size' , '=' , 80) -> first()->link;
                            } else {
                            $link_80 = $gll->link;
                            }
                            ?>
                            <li data-thumb="<?php echo e($file->ver_img($link_80)); ?>?now=<?php echo e($carbon->now()->timestamp); ?>"
                                alt="<?php echo e($product->name); ?>">
                                <img src="<?php echo e($file->ver_img($gll->link)); ?>?now=<?php echo e($carbon->now()->timestamp); ?>"
                                    alt="<?php echo e($product->name); ?>" />
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
                    <div class="w-100 banner__video">
                        <?php if($product -> banner != NULL): ?>
                        <div class="prd__banner">
                            <a href="<?php echo e(url($product->banner_link)); ?>" class="d-block">
                                <img src="<?php echo e($file->ver_img($product->banner)); ?>" class="img-fluid"
                                    alt="<?php echo e($product->name); ?>">
                            </a>
                        </div>
                        <?php endif; ?>
                        <?php if($product -> video != NULL): ?>
                        <div class="prd__video mt-4">
                            <?php echo $product->video; ?>

                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="dtl__prd--right col-md-6 pr-0">
                    <div class="w-100" id="prd" class="prd__dtl">

                        <div class="prd__dtl--name">
                            <h1><?php echo e($product->name); ?></h1>
                        </div>
                        <div class="prd__dtl--stats">
                            <ul>
                                <li><span>Nhà Sản Xuất:</span> <a href="<?php echo e(url('producer/'.$product->producer_slug)); ?>"
                                        class=""><?php echo e(App\Models\Producer::where('id', '=' ,
                                        $product->producer_id)->first()->name); ?></a></li>
                                <li><span>Models: <?php echo e($product->model); ?></span></li>
                            </ul>
                        </div>
                        <?php
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
                        ?>
                        <input type="hidden" name="" id="price_prd" value="<?php echo e($product->price); ?>">
                        <div class="prd__dtl--price">
                            <span class="d-block  <?php if($product->stock == 2 ): ?> call <?php endif; ?>"
                                data-price="<?php echo e($price); ?>"><?php if($product->stock!=2): ?>
                                <?php echo e(crf($price)); ?>

                                <?php else: ?>
                                CALL-<?php echo e(getVal('switchboard') ->value); ?>

                                <?php endif; ?></span>
                        </div>

                        <?php $__currentLoopData = $product_ins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="prd__dtl--insur">
                            <span class="d-block"><?php echo e(App\Models\bundled_product::where('id', $group)->first()->name); ?>:
                                <strong>*</strong></span>
                            <ul class="insur">
                                <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ins): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="insur__item <?php if($key == 0): ?> insur__item-active <?php endif; ?>"
                                    data-price="<?php echo e(App\Models\Insurance::where('id', '=' ,  $ins['ins_id'])->first()->price); ?>"
                                    data-id="<?php echo e($ins['ins_id']); ?>">
                                    <span><?php echo e(App\Models\Insurance::where('id', '=' , $ins['ins_id'])->first()->name); ?>

                                        (+ <?php echo e(crf(App\Models\Insurance::where('id', '=' , $ins['ins_id'])->first()->price)); ?>)</span>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="prd__dtl--cart row mx-0">
                            <?php if($product->stock == 1 && $product->price != 0): ?>
                            <div class="qty col-1 p-0 d-flex w-100">
                                <input type="text" name="qty[<?php echo e($product->id); ?>]" data-id="<?php echo e($product->id); ?>" value="1"
                                    id="dtl__prd--qty" min="1" max="1000" class="w-100 input-number">
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

                    
                    <?php if($product->info != NULL): ?>
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
                    <a class="active" data-toggle="tab" href="#dtl__info" role="tab" aria-selected="true">Thông tin chi
                        tiết</a>
                    <a class="" data-toggle="tab" href="#dtl__review" role="tab" aria-selected="false">Đánh giá</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-dtlContent">
                <div class="tab-pane  active w-100" id="dtl__info" role="tabpanel">
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
        
        <div class="w-100 dtl__bundled">
            <?php if($product -> type != "game"): ?>
            <?php if($bundled_skin != null || count($bundled_accessory) > 0): ?>
            <ul class="nav cat__tab" id="myTab__bundled" role="tablist">

                <li class="" role="presentation">
                    <a class="active active-bundled" data-toggle="tab" href="#tab__aces" role="tab" aria-controls="home"
                        aria-selected="true">Phụ kiện đi kèm</a>
                </li>
                <?php if($bundled_skin != NULL): ?>
                <li class="nav-item" role="presentation">
                    <a class=" active-bundled" data-toggle="tab" href="#tab__skin" role="tab" aria-controls="profile"
                        aria-selected="false">
                        Skin đi kèm
                        
                    </a>
                </li>
                <?php endif; ?>
            </ul>
            <div class="tab-content" id="myTabContent__bundled">
                <div class="tab-pane active" id="tab__aces" role="tabpanel">
                    <?php if(count($bundled_accessory) > 0): ?>
                    <div class="owl-carousel owl-theme owl-6">
                        <?php $__currentLoopData = $bundled_accessory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aces): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $m = App\Models\Products::where('id', '=' , $aces->products_id)->first();
                        ?>
                        <div class="item">
                            <?php if (isset($component)) { $__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Product\Itemgrid::class, ['type' => '2','class' => 'prddetail','message' => $m]); ?>
<?php $component->withName('product.itemgrid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967)): ?>
<?php $component = $__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967; ?>
<?php unset($__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967); ?>
<?php endif; ?>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php else: ?>
                    <?php endif; ?>
                    

                    
                </div>
                
                <?php if($bundled_skin != NULL): ?>
                <?php
                $skin_cat_id = $bundled_skin ->skin_cat_id;
                $bundled_k = App\Models\Products::where(function($q) use ($skin_cat_id){
                $q -> where('sub_1_cat_id' , $skin_cat_id)
                -> orWhere('sub_2_cat_id' , $skin_cat_id);
                })->get();
                ?>
                <div class="tab-pane" id="tab__skin" role="tabpanel">
                    <?php if(count($bundled_k) > 0): ?>
                    
                    <div class="owl-carousel owl-theme owl-6">
                        <?php $__currentLoopData = $access; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aces): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <?php if (isset($component)) { $__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Product\Itemgrid::class, ['type' => '2','class' => 'prddetail','message' => $aces]); ?>
<?php $component->withName('product.itemgrid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967)): ?>
<?php $component = $__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967; ?>
<?php unset($__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967); ?>
<?php endif; ?>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php else: ?>
                    <strong>Chưa có skin nào thuộc danh mục này!</strong>
                    <?php endif; ?>

                    
                </div>
                <?php endif; ?>
                
            </div>
            
            <?php endif; ?>
            
            <?php else: ?>
            
            <?php
            $sub_1_cat_id = $product->sub_1_cat_id;
            $cat_2_sub = $product->cat_2_sub;
            $games = App\Models\Products::where(function ($query) use ($sub_1_cat_id , $cat_2_sub)
            {
            $query->where('sub_1_cat_id', '=', $sub_1_cat_id)
            ->orWhere('cat_2_sub', '=', $cat_2_sub);
            });
            $games = $games -> where('type' , 'LIKE' , 'game')->orderBy('id' , 'DESC') ->get();
            ?>
            <?php if(count($games) > 0 ): ?>
            <ul class="nav cat__tab" id="myTab__bundled" role="tablist">
                <li class="" role="presentation">
                    <a class="active active-bundled" data-toggle="tab" href="#tab__games" role="tab"
                        aria-controls="home" aria-selected="true">Games Liên Quan</a>
                </li>
            </ul>
            <div class="tab-content" id="dtlTabsGamesContent">
                <div class="tab-pane active" id="tab__games" role="tabpanel">
                    <?php if(count($games) > 0): ?>
                    <div class="owl-carousel owl-theme owl-6">
                        <?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($game -> id != $product ->id): ?>
                        <div class="item">
                            <?php if (isset($component)) { $__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Product\Itemgrid::class, ['type' => '2','class' => 'prddetail','message' => $game]); ?>
<?php $component->withName('product.itemgrid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967)): ?>
<?php $component = $__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967; ?>
<?php unset($__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967); ?>
<?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php else: ?>
                    <?php endif; ?>
                    

                    
                </div>
            </div>
            <?php else: ?>
            <strong>Không có games nào liên quan</strong>
            <?php endif; ?>
            <?php endif; ?>
            <?php if(count($related_product) > 0 ): ?>
            <ul class="nav cat__tab" id="myTab__relate" role="tablist">
                <li class="" role="presentation">
                    <a class="active active-bundled" data-toggle="tab" href="#tab__relate" role="tab"
                        aria-controls="home" aria-selected="true">Sản Phẩm Mua Kèm</a>
                </li>
            </ul>
            <div class="tab-content" id="dtlTabsRelateContent">
                <div class="tab-pane active" id="tab__relate" role="tabpanel">
                    <?php if(count($related_product) > 0): ?>
                    <div class="owl-carousel owl-theme owl-6">
                        <?php $__currentLoopData = $related_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rlp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $prd = App\Models\Products::where('id', '=' , $rlp->products_id)->first();
                        ?>
                        <?php if($rlp->products_id != $product ->id): ?>
                        <div class="item">
                            <?php if (isset($component)) { $__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Product\Itemgrid::class, ['type' => '2','class' => 'prddetail','message' =>  $prd]); ?>
<?php $component->withName('product.itemgrid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967)): ?>
<?php $component = $__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967; ?>
<?php unset($__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967); ?>
<?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php else: ?>
                    <?php endif; ?>
                    

                    
                </div>
            </div>
            <?php endif; ?>
        </div>
        
        


        
    </div>
    
    <?php if(count($related_cat_blog) > 0): ?>
    <div id="home__blogs">
        <div id="home__blogs--content" class="container">
            <h2 class="related__blogs--title mb-3 font-weight-bold text-uppercase" style="font-size: 17px">Bài viết liên
                quan :</h1>
                <div id="area__blogs">
                    <div class="tab-content" id="myTabContent__blogs">
                        <div class="tab-pane active" id="tab__blogs" role="tabpanel">
                            <div class="owl-carousel owl-theme owl-6">
                                <?php $__currentLoopData = $related_cat_blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $blog = App\Models\Blogs::where('id', '=' , $blog_item->posts)->first();
                                ?>
                                <div class="item">
                                    <?php if (isset($component)) { $__componentOriginalf39f559c5285947744fdc35c8c7b2100bbecdeab = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Blogsubitem::class, ['blog' => $blog]); ?>
<?php $component->withName('blogsubitem'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\client\product\detail.blade.php ENDPATH**/ ?>