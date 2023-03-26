<?php $__env->startSection('import_js'); ?>
    <script src="<?php echo e($file->import_js('home.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('banner'); ?>
    <div class="banner">
        <a href="<?php echo e(url($banner->link)); ?>" class="d-block">
            <img src="<?php echo e($file->ver_img($banner->img)); ?>" alt="<?php echo e($banner->name); ?>" class="w-100 lazy">
        </a>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if(getVal('background')->value != null): ?>
        <?php
            $bg = $file->ver_img(getVal('background')->value);
        ?>
        <style>
            body {
                background-image: url(<?php echo e($bg); ?>);
                background-attachment: fixed;
                background-repeat: no-repeat;
            }

            #biad__content--home {
                background: white;
                padding-left: 0;
                padding-right: 0;
            }

            #biad__header--bot {
                background: white;
            }

            #biad__header--bot>div {
                padding-left: 0;
                padding-right: 0;
            }

            .show__home {
                padding-left: 10px;
                padding-right: 10px;
            }

            .show__home--box:last-child {
                margin-bottom: 0 !important;
                padding-bottom: 100px;
            }
        </style>
    <?php endif; ?>
    <div id="biad__content--home" class="container">
        <div class="w-100 home">
            <div class="home__left">
                <?php if (isset($component)) { $__componentOriginalc6b64e917876d8219b5822a2249f530fc2ec18df = $component; } ?>
<?php $component = App\View\Components\Client\Menu\Menu::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('client.menu.menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Client\Menu\Menu::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
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
                            <?php for($i = 0; $i < count($slides); $i++): ?>
                                <?php if($i == 0): ?>
                                    <li data-target="#homeSlide" data-slide-to="<?php echo e($i); ?>" class="active">
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
                                            <img class="d-block w-100 img-fluid lazy" alt="<?php echo e($slide->name); ?>"
                                                src="<?php echo e($file->ver_img($slide->img)); ?>">
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <div class="carousel-item">
                                        <a href="<?php echo e(url($slide->link)); ?>" class="d-block">
                                            <img class="d-block w-100 img-fluid lazy" alt="<?php echo e($slide->name); ?>"
                                                src="<?php echo e($file->ver_img($slide->img)); ?>">
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
                        <?php if($bn->position == 'Phải'): ?>
                            <a href="<?php echo e(url($bn->link)); ?>" class="d-block">
                                <img src="<?php echo e($file->ver_img($bn->img)); ?>" class="lazy" alt="<?php echo e($bn->name); ?>"
                                    width="100%" height="auto" alt="<?php echo e($bn->name); ?>">
                            </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
        
        <div class="w-100 bot__banner owl-carousel owl-theme">
            <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($bt->position == 'Dưới'): ?>
                    <div class="item bot__banner--item">
                        <a href="<?php echo e(url($bt->link)); ?>" class="d-block w-100">
                            <img src="<?php echo e($file->ver_img($bt->img)); ?>" class="img-fluid lazy" alt="<?php echo e($bt->name); ?>">
                        </a>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        <div class="w-100 owl-carousel owl-theme mb-4">
            <div class="item">
                <a class="d-block w-100">
                    <img src="<?php echo e($file->ver_img_local('client/images/plc-1.png')); ?>" class="img-fluid lazy" alt="plc-1">
                </a>
            </div>
            <div class="item">
                <a class="d-block w-100">
                    <img src="<?php echo e($file->ver_img_local('client/images/plc-2.png')); ?>" class="img-fluid lazy" alt="policy">
                </a>
            </div>
            <div class="item">
                <a class="d-block w-100">
                    <img src="<?php echo e($file->ver_img_local('client/images/plc-3.png')); ?>" class="img-fluid lazy" alt="policy">
                </a>
            </div>
            <div class="item">
                <a class="d-block w-100">
                    <img src="<?php echo e($file->ver_img_local('client/images/plc-4.png')); ?>" class="img-fluid lazy" alt="policy">
                </a>
            </div>
        </div>
        
        <div class="w-100 show__home">
            <?php $__currentLoopData = $show_home; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal7cd869684c8c577e02b917a6c15734287e61bdfc = $component; } ?>
<?php $component = App\View\Components\Client\Home\Section::resolve(['item' => $item] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('client.home.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Client\Home\Section::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7cd869684c8c577e02b917a6c15734287e61bdfc)): ?>
<?php $component = $__componentOriginal7cd869684c8c577e02b917a6c15734287e61bdfc; ?>
<?php unset($__componentOriginal7cd869684c8c577e02b917a6c15734287e61bdfc); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    
    <div id="home__blogs">
        <div id="home__blogs--content" class="container">
            <a href="<?php echo e(url('tin-tuc')); ?>" id="home__blogs--title">
                <img src="<?php echo e($file->ver_img_local('client/images/bang-tin-home-banner-1280x80.jpg')); ?>" alt="Bảng Tin"
                    class="img-fluid lazy">
            </a>
            <div id="area__blogs">
                <div class="tab-content" id="myTabContent__blogs">
                    <div class="tab-pane active" id="tab__blogs" role="tabpanel">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper swiper-blogs">
                                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide">
                                        <?php if (isset($component)) { $__componentOriginalf39f559c5285947744fdc35c8c7b2100bbecdeab = $component; } ?>
<?php $component = App\View\Components\Blogsubitem::resolve(['blog' => $blog] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                    <?php
                                        unset($blog);
                                    ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/home.blade.php ENDPATH**/ ?>