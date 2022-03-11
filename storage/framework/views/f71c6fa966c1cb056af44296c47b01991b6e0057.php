<?php $__env->startSection('import_js'); ?>
<script src="<?php echo e($file->import_js('home.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('banner'); ?>
<div class="banner">
    <a href="<?php echo e(url($banner->link)); ?>" class="d-block">
        <img src="<?php echo e($file->ver_img($banner->img)); ?>" alt="<?php echo e($banner->name); ?>" class="img-fluid">
    </a>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="biad__content--home" class="container">
    <div class="w-100 home">
        <div class="home__left">
            <?php if (isset($component)) { $__componentOriginalc6b64e917876d8219b5822a2249f530fc2ec18df = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Client\Menu\Menu::class, []); ?>
<?php $component->withName('client.menu.menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc6b64e917876d8219b5822a2249f530fc2ec18df)): ?>
<?php $component = $__componentOriginalc6b64e917876d8219b5822a2249f530fc2ec18df; ?>
<?php unset($__componentOriginalc6b64e917876d8219b5822a2249f530fc2ec18df); ?>
<?php endif; ?>
        </div>
        <div class="home__right">
            <div class="home__right--slide">
                <div id="homeSlide" class="carousel slide w-100" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php for($i = 0 ; $i < count($slides) ; $i++): ?> <?php if($i==0): ?> <li data-target="#homeSlide"
                            data-slide-to="<?php echo e($i); ?>" class="active">
                            </li>
                            <?php else: ?>
                            <li data-target="#homeSlide" data-slide-to="<?php echo e($i); ?>"></li>
                            <?php endif; ?>
                            <?php endfor; ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($loop->first): ?>
                        <div class="carousel-item active">
                            <a href="<?php echo e(url($slide->link)); ?>" class="d-block">
                                <img src="<?php echo e($file->ver_img($slide->img)); ?>" class="d-block w-100 img-fluid"
                                    alt="<?php echo e($slide->name); ?>">
                            </a>
                        </div>
                        <?php else: ?>
                        <div class="carousel-item">
                            <a href="<?php echo e(url($slide->link)); ?>" class="d-block">
                                <img src="<?php echo e($file->ver_img($slide->img)); ?>" class="d-block w-100 img-fluid"
                                    alt="<?php echo e($slide->name); ?>">
                            </a>
                        </div>
                        <?php endif; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <button class="slide__btn --prev" type="button" data-target="#homeSlide" data-slide="prev">
                        <i class="fas fa-angle-left"></i>
                    </button>
                    <button class="slide__btn --next" type="button" data-target="#homeSlide" data-slide="next">
                        <i class="fas fa-angle-right"></i>
                    </button>
                </div>
            </div>
            <div class="home__right--banner">
                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($bn -> position == "Phải"): ?>
                <a href="<?php echo e(url($bn->link)); ?>" class="d-block">
                    <img src="<?php echo e($file->ver_img($bn->img)); ?>" alt="<?php echo e($bn->name); ?>" class="img-fluid">
                </a>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
    
    <div class="w-100 bot__banner owl-carousel owl-theme">
        <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($bt -> position == "Dưới"): ?>
        <div class="item bot__banner--item">
            <a href="<?php echo e(url($bt->link)); ?>" class="d-block w-100">
                <img src="<?php echo e($file->ver_img($bt->img)); ?>" class="img-fluid" alt="<?php echo e($bt->name); ?>">
            </a>
        </div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    
    <div class="w-100 show__home">
        <?php $__currentLoopData = $config; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $id = $cf->cat;
        $id_2 = $cf->cat_2;
        $machine = App\Models\Products::select('id' ,'name' , 'slug' , 'price' ,'main_img', 'sub_img' , 'stock' , 'new'
        , 'highlight' , 'usage_stt')->where(function ($query) use ($id) {
        $query->where('cat_id', '=', $id)
        ->orWhere('sub_1_cat_id', '=', $id)
        ->orWhere('cat_2_id', '=', $id)
        ->orWhere('cat_2_sub', '=', $id);
        });
        $machine = $machine -> where('type' , 'LIKE' , 'machine')->get();
        // ////////////////////////////
        $access = App\Models\Products::select('id' ,'name' , 'slug' , 'price' ,'main_img', 'sub_img' , 'stock' , 'new' ,
        'highlight' , 'usage_stt')->where(function ($query) use ($id) {
        $query->where('cat_id', '=', $id)
        ->orWhere('cat_2_id', '=', $id);
        });
        $access = $access->where('type', 'LIKE', 'access') ->get();
        // ////////////////////////////
        $machine_2 = App\Models\Products::select('id' ,'name' , 'slug' , 'price' ,'main_img', 'sub_img' , 'stock' ,
        'new' , 'highlight' , 'usage_stt')->where('cat_id' , '=' , $cf->cat_2) -> where('type' , 'LIKE' ,
        'machine')->get();
        // ////////////////////////////
        $access_2 = App\Models\Products::select('id' ,'name' , 'slug' , 'price' ,'main_img', 'sub_img' , 'stock' , 'new'
        , 'highlight' , 'usage_stt')->where(function ($query) use ($id_2) {
        $query->where('cat_id', '=', $id_2)
        ->orWhere('cat_2_id', '=', $id_2);
        });
        $access_2 = $access_2->where('type', 'LIKE', 'access')->orderBy('id' ,'DESC') ->get();
        // ////////////////////////////
        if ($cf->tab=="second"){
        $access = App\Models\Products::select('id' ,'name' , 'slug' , 'price' ,'main_img', 'sub_img' , 'stock' , 'new' ,
        'highlight' , 'usage_stt')->where('usage_stt' , '=' , 2)-> where('cat_id' , '=' , $cf->cat)->orderBy('id'
        ,'DESC')->get();
        }
        // ////////////////////////////
        $option = explode("," , $cf->option);
        // ////////////////////////////
        $game = App\Models\Products::select('id' ,'name' , 'slug' , 'price' ,'main_img', 'sub_img' , 'stock' , 'new' ,
        'highlight' , 'usage_stt')->where(function ($query) use ($id , $id_2) {
        $query->where('cat_id', '=', $id)
        ->orWhere('cat_2_id', '=', $id)
        ->orWhere('cat_id', '=', $id_2)
        ->orWhere('cat_2_id', '=', $id_2);
        });
        // ////////////////////////////
        $game_2 = App\Models\Products::select('id' ,'name' , 'slug' , 'price' ,'main_img', 'sub_img' , 'stock' , 'new' ,
        'highlight' , 'usage_stt')->where(function ($query) use ($id , $id_2) {
        $query->where('cat_id', '=', $id)
        ->orWhere('cat_2_id', '=', $id)
        ->orWhere('cat_id', '=', $id_2)
        ->orWhere('cat_2_id', '=', $id_2);
        });
        // ////////////////////////////
        $game_hot = $game->where('highlight' , '=' , 2)-> where('type' , 'LIKE' ,"game")->orderBy('id' ,'DESC')->get();
        // ////////////////////////////
        $game_new = $game_2->where('new' , '=' , 1)-> where('stock' , '!=' , 2)-> where('type' , 'LIKE' ,
        "game")->orderBy('id' ,'DESC')->get();
        // ////////////////////////////
        $game_future = App\Models\Products::select('id' ,'name' , 'slug' , 'price' ,'main_img', 'sub_img' , 'stock' ,
        'new' , 'highlight' , 'usage_stt')->where(function ($query) use ($id , $id_2) {
        $query->where('cat_id', '=', $id)
        ->orWhere('cat_id', '=', $id_2);
        });
        $game_future = $game_future-> where('stock' , '=' , 2)->where('type' , 'LIKE' , 'game')->orderBy('id'
        ,'DESC')->get();
        // ////////////////////////////

        if ($cf->cat_digital != NULL) {
        $cat_digital = $cf->cat_digital;
        $digital = App\Models\Products::select('id' ,'name' , 'slug' , 'price' ,'main_img', 'sub_img' , 'stock' ,
        'new' , 'highlight' , 'usage_stt')->where(function ($query) use ($cat_digital) {
        $query->where('cat_id', '=', $cat_digital)
        ->orWhere('cat_2_id', '=', $cat_digital)
        ->orWhere('cat_2_sub', '=', $cat_digital);
        });
        $digital = $digital ->orderBy('id','DESC')->get();
        } else {
         $digital = [];
        }
        ////////////////////////////
        ?>
        
        <div class="show__home--box box__<?php echo e($cf->id); ?> mb-5">
            <div class="box__banner">
                <div class="box__banner--main">
                    <a href="<?php echo e(url($cf->main_link)); ?>" class="d-block">
                        <img src="<?php echo e($file->ver_img($cf->main_img)); ?>" alt="<?php echo e($cf->name); ?>" class="img-fluid">
                    </a>
                </div>
                <div class="box__banner--sub owl-carousel owl-theme">
                    <?php if($cf->use_img != NULL): ?>
                    <div class="item pl-0">
                        <a href="<?php echo e($cf->use_link); ?>" class="d-block">
                            <img src="<?php echo e($file->ver_img($cf->use_img)); ?>" alt="<?php echo e($cf->name); ?>" class="img-fluid">
                        </a>
                    </div>
                    <?php endif; ?>
                    <?php if($cf->instruct_img != NULL): ?>
                    <div class="item">
                        <a href="<?php echo e($cf->instruct_link); ?>" class="d-block">
                            <img src="<?php echo e($file->ver_img($cf->instruct_img)); ?>" alt="<?php echo e($cf->name); ?>" class="img-fluid">
                        </a>
                    </div>
                    <?php endif; ?>
                    <?php if($cf->access_img != NULL): ?>
                    <div class="item">
                        <a href="<?php echo e($cf->access_link); ?>" class="d-block">
                            <img src="<?php echo e($file->ver_img($cf->access_img)); ?>" alt="<?php echo e($cf->name); ?>" class="img-fluid">
                        </a>
                    </div>
                    <?php endif; ?>
                    <?php if($cf->fix_img != NULL): ?>
                    <div class="item pr-0">
                        <a href="<?php echo e($cf->fix_link); ?>" class="d-block">
                            <img src="<?php echo e($file->ver_img($cf->fix_img)); ?>" alt="<?php echo e($cf->name); ?>" class="img-fluid">
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="box__cat">
                
                
                <div class="box__cat--item">
                    <?php if($cf->tab != "none"): ?>
                    
                    <ul class="nav cat__tab" id="myTab__<?php echo e($cf->id); ?>" role="tablist">
                        
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.styletabs','data' => ['type' => 'cat','cf' => $cf]]); ?>
<?php $component->withName('styletabs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'cat','cf' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cf)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <li class="nav-item" role="presentation">
                            <a class="active active-<?php echo e($cf->cat); ?>" data-toggle="tab" href="#tab__mh--<?php echo e($cf->id); ?>"
                                role="tab" aria-controls="home" aria-selected="true">Máy <?php echo e(App\Models\Category::where('id', '=' , $cf->cat)->first() -> name); ?></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="  active-<?php echo e($cf->cat); ?>" data-toggle="tab" href="#tab__aces--<?php echo e($cf->id); ?>"
                                role="tab" aria-controls="profile" aria-selected="false">
                                <?php if($cf->tab != "second"): ?>
                                Phụ Kiện
                                <?php else: ?>
                                Máy PS4 SECOND HAND
                                <?php endif; ?>
                                
                            </a>
                        </li>
                    </ul>
                    
                    
                    <div class="tab-content" id="myTabContent__<?php echo e($cf->id); ?>">
                        <div class="tab-pane active" id="tab__mh--<?php echo e($cf->id); ?>" role="tabpanel">
                            <?php if(count($machine) > 0): ?>
                            <div class="owl-carousel owl-theme">
                                <?php $__currentLoopData = $machine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item">
                                    <?php if (isset($component)) { $__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Product\Itemgrid::class, ['type' => '1','class' => 'prdhome','message' => $m]); ?>
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
                            <strong>Hiện chưa có sản phẩm nào</strong>
                            <?php endif; ?>
                            
                        </div>
                        
                        <div class="tab-pane" id="tab__aces--<?php echo e($cf->id); ?>" role="tabpanel">
                            <?php if(count($access) > 0): ?>
                            <div class="owl-carousel owl-theme">
                                <?php $__currentLoopData = $access; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aces): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item">
                                    <?php if (isset($component)) { $__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Product\Itemgrid::class, ['type' => '1','class' => 'prdhome','message' => $aces]); ?>
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
                            <?php if($cf->tab=="second"): ?>
                            <strong>Chưa có sản phẩm second hand!</strong>
                            <?php else: ?>
                            <strong>Chưa có phụ kiện nào!</strong>
                            <?php endif; ?>
                            <?php endif; ?>
                            
                        </div>
                        
                    </div>
                    
                    <?php else: ?>
                    
                    <?php if(count($machine) + count($option) > 0): ?>
                    <div class="owl-carousel owl-theme">
                        <?php $__currentLoopData = $machine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <?php if (isset($component)) { $__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Product\Itemgrid::class, ['type' => '1','class' => 'prdhome','message' => $m]); ?>
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
                        
                        <?php if($cf->option != NULL): ?>
                        <?php $__currentLoopData = $option; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $op): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $prd = App\Models\Products::where('id', '=' , $op)->first();
                        ?>
                        <div class="item">
                            <?php if (isset($component)) { $__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Product\Itemgrid::class, ['type' => '1','class' => 'prdhome','message' => $prd]); ?>
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
                        <?php endif; ?>
                        
                    </div>

                    <?php else: ?>
                    <strong>Hiện chưa có sản phẩm nào</strong>
                    <?php endif; ?>
                    

                    
                    <?php endif; ?>
                </div>
                
                <?php if($cf -> cat_2 != NULL): ?>
                
                <div class="box__cat--item --item-2 mt-5">
                    <?php if($cf->tab != "none"): ?>
                    
                    <ul class="nav cat__tab" id="myTab__<?php echo e($cf->cat_2); ?>" role="tablist">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.styletabs','data' => ['type' => 'cat_2','cf' => $cf]]); ?>
<?php $component->withName('styletabs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'cat_2','cf' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cf)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <li class="" role="presentation">
                            <a class="active active-<?php echo e($cf->cat_2); ?>" data-toggle="tab"
                                href="#tab__mh--<?php echo e($cf->cat_2); ?>" role="tab" aria-controls="home"
                                aria-selected="true">Máy <?php echo e(App\Models\Category::where('id', '=' , $cf->cat_2)->first() -> name); ?></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="  active-<?php echo e($cf->cat_2); ?>" data-toggle="tab" href="#tab__aces--<?php echo e($cf->cat_2); ?>"
                                role="tab" aria-controls="profile" aria-selected="false">
                                <?php if($cf->tab != "second"): ?>
                                Phụ Kiện
                                <?php else: ?>
                                Máy PS4 SECOND HAND
                                <?php endif; ?>
                                
                            </a>
                        </li>
                    </ul>
                    
                    
                    <div class="tab-content" id="myTabContent__<?php echo e($cf->cat_2); ?>">
                        <div class="tab-pane active" id="tab__mh--<?php echo e($cf->cat_2); ?>" role="tabpanel">
                            <?php if(count($machine_2) > 0): ?>
                            <div class="owl-carousel owl-theme">
                                <?php $__currentLoopData = $machine_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m_2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item">
                                    <?php if (isset($component)) { $__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Product\Itemgrid::class, ['type' => '1','class' => 'prdhome','message' => $m_2]); ?>
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
                            <strong>Hiện chưa có sản phẩm nào</strong>
                            <?php endif; ?>
                            
                        </div>
                        
                        <div class="tab-pane" id="tab__aces--<?php echo e($cf->cat_2); ?>" role="tabpanel">
                            <?php if(count($access_2) > 0): ?>
                            <div class="owl-carousel owl-theme">
                                <?php $__currentLoopData = $access_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aces_2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item">
                                    <?php if (isset($component)) { $__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Product\Itemgrid::class, ['type' => '1','class' => 'prdhome','message' => $aces_2]); ?>
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
                            <?php if($cf->tab=="second"): ?>
                            <strong>Chưa có sản phẩm second hand!</strong>
                            <?php else: ?>
                            <strong>Chưa có phụ kiện nào!</strong>
                            <?php endif; ?>
                            <?php endif; ?>
                            
                        </div>
                        
                    </div>
                    
                    <?php else: ?>
                    


                    <?php endif; ?>
                    
                </div>
                
                <?php endif; ?>
                
            </div>
            
            <div class="box__game mt-5">
                <div class="box__game--1">
                    <ul class="nav cat__tab" id="gameTab__<?php echo e($cf->id); ?>" role="tablist">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.styletabs','data' => ['type' => 'cat','cf' => $cf]]); ?>
<?php $component->withName('styletabs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'cat','cf' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cf)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <li class="" role="presentation">
                            <a class="active active-<?php echo e($cf->id); ?>" data-toggle="tab" href="#tab__gameNew--<?php echo e($cf->id); ?>"
                                role="tab" aria-controls="home" aria-selected="true">Game Mới</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="  active-<?php echo e($cf->id); ?>" data-toggle="tab" href="#tab__gameHot--<?php echo e($cf->id); ?>"
                                role="tab" aria-controls="profile" aria-selected="false">
                                Game hot
                            </a>
                        </li>
                        <?php if($cf->cat_digital != NULL): ?>
                        <li class="nav-item" role="presentation">
                            <a class="active-<?php echo e($cf->id); ?>" data-toggle="tab" href="#tab__digital--<?php echo e($cf->id); ?>"
                                role="tab" aria-controls="profile" aria-selected="false">
                                <?php echo e(App\Models\Category::where('id', '=' , $cf->cat_digital)->first()->name); ?>

                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                    
                    <div class="tab-content" id="myTabGame__<?php echo e($cf->id); ?>">
                        <div class="tab-pane active" id="tab__gameNew--<?php echo e($cf->id); ?>" role="tabpanel">
                            <?php if(count($game_new) > 0): ?>
                            <div class="owl-carousel owl-theme">
                                <?php $__currentLoopData = $game_new; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item">
                                    <?php if (isset($component)) { $__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Product\Itemgrid::class, ['type' => '1','class' => 'prdhome','message' => $gn]); ?>
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
                            <strong>Hiện chưa có game nào</strong>
                            <?php endif; ?>
                            
                        </div>
                        <div class="tab-pane " id="tab__gameHot--<?php echo e($cf->id); ?>" role="tabpanel">
                            <?php if(count($game_hot) > 0): ?>
                            <div class="owl-carousel owl-theme">
                                <?php $__currentLoopData = $game_hot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item">
                                    <?php if (isset($component)) { $__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Product\Itemgrid::class, ['type' => '1','class' => 'prdhome','message' => $gh]); ?>
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
                            <strong>Hiện chưa có game hot nào</strong>
                            <?php endif; ?>
                        </div>
                        <?php if($cf->cat_digital != NULL ): ?>
                        <div class="tab-pane " id="tab__digital--<?php echo e($cf->id); ?>" role="tabpanel">
                            <?php if(count($digital) > 0): ?>
                            <div class="owl-carousel owl-theme">
                                <?php $__currentLoopData = $digital; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dgt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item">
                                    <?php if (isset($component)) { $__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Product\Itemgrid::class, ['type' => '1','class' => 'prdhome','message' => $dgt]); ?>
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
                            <strong>Hiện chưa có thẻ <?php echo e(App\Models\Category::where('id', '=' , $cf->cat_digital)->first()->name); ?> nào</strong>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                </div>
                <div class="box__game--2 mt-5">
                    <ul class="nav cat__tab" id="gameTabFut__<?php echo e($cf->id); ?>" role="tablist">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.styletabs','data' => ['type' => 'id','cf' => $cf]]); ?>
<?php $component->withName('styletabs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'id','cf' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cf)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <li class="" role="presentation">
                            <a class="active active-<?php echo e($cf->id); ?>" data-toggle="tab" href="#tab__gameFut--<?php echo e($cf->id); ?>"
                                role="tab" aria-controls="home" aria-selected="true">game sắp phát hành</a>
                        </li>

                    </ul>
                    
                    <div class="tab-content" id="myTabGameFut__<?php echo e($cf->id); ?>">
                        <div class="tab-pane active" id="tab__gameFut--<?php echo e($cf->id); ?>" role="tabpanel">
                            <?php if(count($game_future) > 0): ?>
                            <div class="owl-carousel owl-theme">
                                <?php $__currentLoopData = $game_future; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item">
                                    <?php if (isset($component)) { $__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Product\Itemgrid::class, ['type' => '1','class' => 'prdhome','message' => $gf]); ?>
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
                            <strong>Hiện chưa có game nào</strong>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <?php if($cf->tab == "none"): ?>
            <?php
            $access_items = App\Models\Products::where(function ($query) use ($id , $id_2) {
            $query->where('cat_id', '=', $id)
            ->orWhere('cat_2_id', '=', $id);
            });
            $access_items = $access_items -> where('type' , 'LIKE' , 'access') ->get();
            ?>
            <div class="box__access mt-5">
                <ul class="nav cat__tab" id="accessTabFut__<?php echo e($cf->id); ?>" role="tablist">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.styletabs','data' => ['type' => 'id','cf' => $cf]]); ?>
<?php $component->withName('styletabs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'id','cf' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cf)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <li class="" role="presentation">
                        <a class="active active-<?php echo e($cf->id); ?>" data-toggle="tab" href="#tab__accessFut--<?php echo e($cf->id); ?>"
                            role="tab" aria-controls="home" aria-selected="true">Phụ kiện đi kèm</a>
                    </li>
                </ul>
                
                <div class="tab-content" id="myTabAccessFut__<?php echo e($cf->id); ?>">
                    <div class="tab-pane active" id="tab__accessFut--<?php echo e($cf->id); ?>" role="tabpanel">
                        <?php if(count( $access_items) > 0): ?>
                        <div class="owl-carousel owl-theme">
                            <?php $__currentLoopData = $access_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aci): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item">
                                <?php if (isset($component)) { $__componentOriginal58ee110754c547cdf765a6d10246c95d9c380967 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Product\Itemgrid::class, ['type' => '1','class' => 'prdhome','message' => $aci]); ?>
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
                        <strong>Hiện chưa có phụ kiện nào</strong>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div id="home__blogs">
    <div id="home__blogs--content" class="container">
        <a href="<?php echo e(url('tin-tuc')); ?>" id="home__blogs--title">
            <img src="<?php echo e($file->ver_img('client/images/bang-tin-home-banner-1280x80.jpg')); ?>" alt="Bảng Tin"
                class="img-fluid">
        </a>
        <div id="area__blogs">
            <div class="tab-content" id="myTabContent__blogs">
                <div class="tab-pane active" id="tab__blogs" role="tabpanel">
                    <div class="owl-carousel owl-theme owl-6">
                        <?php $__currentLoopData = App\Models\Blogs::select('id' , 'title' , 'slug' , 'desc' , 'img' , 'cat_id' ,
                        'cat_sub_id' , 'author' , 'views' , 'active' ,'created_at' , 'updated_at')-> where('active' , '=' , 1)->orderBy('id' ,
                        'DESC') ->limit(8)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <?php if (isset($component)) { $__componentOriginalf39f559c5285947744fdc35c8c7b2100bbecdeab = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Blogsubitem::class, ['blog' => $invo]); ?>
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views/home.blade.php ENDPATH**/ ?>