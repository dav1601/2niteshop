<?php $__env->startSection('title', $cat_blog->name); ?>
<?php $__env->startSection('meta-desc', 'Chuyên trang tin tức bao gồm tin tức mới, đập hộp review các sản phẩm mới, hướng dẫn và thủ thuật
    sử dụng các sản phẩm công nghệ, game và tin khuyến mãi,... tại HALO SHOP.'); ?>
<?php $__env->startSection('meta-keyword', '2nite shop, 2niteshop, 2nite channel, tin tuc cong nghe, tin tuc game, game moi, game news,
    tech news, game hot, review, unbox, iphone moi, macbook moi, surface moi, tips, huong dan va thu thuat'); ?>
<?php $__env->startSection('news_keywords', '2nite shop, 2niteshop, 2nite channel, tin tuc cong nghe, tin tuc game, game moi, game news,
    tech news, game hot, review, unbox, iphone moi, macbook moi, surface moi, tips, huong dan va thu thuat'); ?>
<?php $__env->startSection('og-title', $cat_blog->name); ?>
<?php $__env->startSection('og-desc', '2nite shop, 2niteshop, 2nite channel, tin tuc cong nghe, tin tuc game, game moi, game news, tech
    news, game hot, review, unbox, iphone moi, macbook moi, surface moi, tips, huong dan va thu thuat'); ?>
<?php $__env->startSection('og-image', $file->main_banner()); ?>
<?php $__env->startSection('twitter-title', $cat_blog->name); ?>


<?php $__env->startSection('import_css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
        integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('import_js'); ?>
    <script src="<?php echo e($file->ver('client/app/js/cart.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('margin'); ?> dtl__margin option_blog <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
                    <?php echo e($bc); ?>

                </li>
            </ol>
        </div>
    </div>

    <div id="blog">
        <div class="container">
            <div class="row mx-0">
                <div class="col-12 col-lg-9 pl-lg-0 va-fix-81">
                    <h1 id="blog__title"><?php echo e($bc); ?></h1>
                    <div id="blog__show" class="blog blog-wrapper">
                        <?php if(count($blogs) > 0): ?>
                            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if (isset($component)) { $__componentOriginalb5c0ad383316127ff9a55f3c2e85f39cf6a2e6d6 = $component; } ?>
<?php $component = App\View\Components\Blogitem::resolve(['blog' => $blog,'cat' => $cat] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('blogitem'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Blogitem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb5c0ad383316127ff9a55f3c2e85f39cf6a2e6d6)): ?>
<?php $component = $__componentOriginalb5c0ad383316127ff9a55f3c2e85f39cf6a2e6d6; ?>
<?php unset($__componentOriginalb5c0ad383316127ff9a55f3c2e85f39cf6a2e6d6); ?>
<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php if($kw == 0): ?>
                                <div id="pagn">
                                    <?php echo e($blogs->links()); ?>

                                </div>
                            <?php else: ?>
                                <?php echo e($blogs->appends(['search' => $kw])->links()); ?>

                            <?php endif; ?>
                        <?php else: ?>
                            <span class="no-blog text-lg">Không Có Bài Viết Nào Thuộc Danh Mục Này</span>
                            <?php if($kw != 0): ?>
                                <a href="<?php echo e($backLink); ?>" class="davi_btn w-100 d-block">
                                    Trở Lại
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="col-12 col-lg-3 pr-lg-0 va-fix-19" id="blog__right">
                    <?php echo Form::open(['method' => 'GET']); ?>

                    <input type="text" name="search" class="form-control w-100" id="search_blog"
                        placeholder="Tìm bài viết" value="<?php if($kw != 0): ?> <?php echo e($kw); ?> <?php endif; ?>">
                    <button type="submit" class="davi_btn"><i class="fas fa-search"></i></button>
                    <?php echo Form::close(); ?>

                    <div class="category">
                        <h2 class="category__title">
                            Danh Mục Tin
                        </h2>
                        <ul class="category__menu">
                            <?php if($cat != 0): ?>
                                <li class="d-flex align-items-center">
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                    <a href="<?php echo e(url('tin-tuc/')); ?>" class="d-block">Bảng Tin</a>
                                </li>
                            <?php endif; ?>
                            <?php $__currentLoopData = App\Models\CatBlog::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catB): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="d-flex align-items-center">
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                    <a href="<?php echo e(url('tin-tuc/' . $catB->slug)); ?>" class="d-block"><?php echo e($catB->name); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
                    </div>
                </div>
            </div>




        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/client/blog/index.blade.php ENDPATH**/ ?>