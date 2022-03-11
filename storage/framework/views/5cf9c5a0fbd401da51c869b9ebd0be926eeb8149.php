
<?php
  $href =  url('tin-tuc/'.App\Models\CatBlog::where('id', '=' , $blog->cat_id)->first()->slug.'/'.$blog->slug);
?>
<div class="bis w-100">
<div class="bis__image position-relative overflow-hidden">
    <span class="bis__time">
        <?php echo e(Illuminate\Support\Carbon::create($blog->created_at) -> day); ?>

        <i><?php echo e(Illuminate\Support\Carbon::create($blog->created_at) ->format('M')); ?></i>
      </span>
<a href="<?php echo e($href); ?>" class="d-block">
    <img src="<?php echo e($file->ver_img($blog->img)); ?>" alt="<?php echo e($blog->title); ?>" class="img-fluid">
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
<span class="d-block"><?php echo e($blog->desc); ?></span>
</div>
</div>
<?php /**PATH E:\xampp\htdocs\nava\resources\views/components/blogsubitem.blade.php ENDPATH**/ ?>