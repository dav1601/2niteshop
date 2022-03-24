<?php
    $currentUrl = URL::current();
    if ($cat == 0) {
        $href =  $currentUrl ."/" . App\Models\CatBlog::where('id', '=' ,  $blog->cat_id)->first()->slug . "/" . $blog->slug;
    } else {
        $href =  $currentUrl."/".$blog->slug ;
    }
?>
<div class="blog__item w-100">
  <div class="row mx-0">
    <div class="blog__item--left pl-0 col-3 va-fix-36 position-relative">
      <span class="b-date b-time">
        <?php echo e(Illuminate\Support\Carbon::create($blog->created_at) -> day); ?>

        <i><?php echo e(Illuminate\Support\Carbon::create($blog->created_at) ->format('M')); ?></i>
      </span>
      <a href="<?php echo e($href); ?>" class="up__views">
          <img src="<?php echo e($file->ver_img($blog->img)); ?>" alt="" class="img-fluid">
      </a>
    </div>
    <div class="blog__item--right pr-0 col-9 va-fix-64">
       <div class="viewACmt d-flex align-items-center">
            <div class="view d-flex align-items-center">
                <span class="icon">
                    <i class="fas fa-comments"></i>
                </span>
                <span class="total">
                    0
                </span>
            </div>
            <div class="cmt d-flex align-items-center">
                <span class="icon">
                    <i class="fas fa-eye"></i>
                </span>
                <span class="total">
                   <?php echo e($blog->views); ?>

                </span>
            </div>
       </div>
       <div class="title">
         <a href="<?php echo e($href); ?>" class="d-block hover:no-underline up__views">
              <?php echo e($blog->title); ?>

         </a>
       </div>
       <div class="desc">
         <span>
          <?php echo e($blog->desc); ?>

         </span>
       </div>
    </div>
  </div>
</div>
<?php /**PATH E:\xampp\htdocs\nava\resources\views\components\blogitem.blade.php ENDPATH**/ ?>