
<?php
    $href = url('tin-tuc/' . $blog->category->slug . '/' . $blog->slug);
?>
<div class="bis w-100">
    <div class="bis__image position-relative overflow-hidden">
        <span class="bis__time">
            <?php echo e($carbon->create($blog->created_at)->day); ?>

            <i><?php echo e($carbon->create($blog->created_at)->format('M')); ?></i>
        </span>
        <a href="<?php echo e($href); ?>" class="d-block">
            <img src="<?php echo e($file->ver_img($blog->img)); ?>" alt="<?php echo e($blog->title); ?>" class="img-fluid lazy">
        </a>
    </div>
    <div class="bis__stats">
        <div class="bis__stats--item --auth">
            <i class="far fa-user-circle"></i>
            <span><?php echo e($blog->author); ?></span>
        </div>
        <div class="bis__stats--item --cmts">
            <i class="far fa-comments"></i>
            <span>0</span>
        </div>
        <div class="bis__stats--item --views">
            <i class="far fa-eye"></i>
            <span><?php echo e($blog->views); ?></span>
        </div>
    </div>
    <div class="bis__title">
        <a href="<?php echo e($href); ?>" class="d-block"><?php echo e($blog->title); ?></a>
    </div>


    <div class="bis__desc">
        <span class="d-block"><?php echo ltrim(Str::limit(strip_tags($blog->content), 200, '..'), '&nbsp;'); ?></span>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/blogsubitem.blade.php ENDPATH**/ ?>