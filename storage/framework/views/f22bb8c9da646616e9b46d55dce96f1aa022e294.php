<?php $__env->startSection('title' , $blog->title); ?>
<?php $__env->startSection('meta-desc' , $blog->desc); ?>
<?php $__env->startSection('meta-keyword' , "2nite shop, 2niteshop, 2nite channel, tin tuc cong nghe, tin tuc game, game moi, game news, tech news, game hot, review, unbox, iphone moi, macbook moi, surface moi, tips, huong dan va thu thuat"); ?>
<?php $__env->startSection('og-title' , $blog->title); ?>
<?php $__env->startSection('og-desc' , $blog->desc); ?>
<?php $__env->startSection('og-image' , $file->ver_img($blog->img)); ?>
<?php $__env->startSection('twitter-title' , $blog->title); ?>
<?php $__env->startSection('og-type' , 'blog'); ?>



<?php $__env->startSection('import_css'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
    integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('import_js'); ?>
<script src="<?php echo e($file->ver('client/app/js/cart.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('margin'); ?> dtl__margin option_blog_detail <?php $__env->stopSection(); ?>
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
                <?php echo e($blog->title); ?>

            </li>
        </ol>
    </div>
</div>

<div id="blog__detail">
    <div class="container  blog__detail" style="max-width: 1030px !important;">
        <div class="blog__detail--title">
            <h1><?php echo e($blog->title); ?></h1>
        </div>
        <div class="blog__detail--info d-flex align-items-center">
            <div class="box-author box">
                <span class="b-posted">Tác Giả:</span>
                <span class="b-author">
                    <i class="far fa-user-circle"></i>
                    <span><?php echo e($blog->author); ?></span>
                </span>
            </div>
            <div class="box-view box">
                <i class="far fa-eye"></i>
                <span class="b-view">
                    <?php echo e($blog->views); ?> Lượt Xem
                </span>
            </div>
            <div class="box-cat box">
                <span class="b-icon-cat"><i class="far fa-newspaper"></i></span>
                <span class="b-cat">
                    <?php
                        $slug = url('tin-tuc/'. App\Models\CatBlog::where('id', '=' , $blog->cat_id)->first()->slug);
                    if ($blog->cat_sub_id != NULL) {
                        $slug_2 = url('tin-tuc/'.App\Models\CatBlog::where('id', '=' , $blog->cat_sub_id)->first()->slug);
                    }
                    ?>
                    <a href="<?php echo e($slug); ?>"><?php echo e(App\Models\CatBlog::where('id', '=' , $blog->cat_id)->first()->name); ?></a>
                    <?php if($blog->cat_sub_id != NULL): ?>
                    <a href="<?php echo e($slug_2); ?>">, <?php echo e(App\Models\CatBlog::where('id', '=' , $blog->cat_sub_id)->first()->name); ?></a>

                    <?php endif; ?>
                </span>
            </div>
        </div>
        <div class="blog__detail--content w-100">
          <?php echo $blog->content; ?>

        </div>
        <div class="blog__detail--involve mt-5">
          <h1 class="mb-4">Bài Viết Liên Quan</h1>
          <div class="row mx-0">
              <?php $__currentLoopData = $involve; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-md-4 col-sm-6 col-12 w-100 va-fix-padding">
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\client\blog\detail.blade.php ENDPATH**/ ?>