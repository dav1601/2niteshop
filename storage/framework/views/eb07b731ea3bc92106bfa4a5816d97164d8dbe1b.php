<a href="<?php echo e(route('detail_product' , ['slug'=> $prd->slug])); ?>" class="rsl__item text-decoration-none">
    <div class="rsl__item--image">
         <img src="<?php echo e($file->ver_img($prd->main_img)); ?>" alt="" class="img-fluid">
    </div>
    <div class="rsl__item--info">
         <span class="name d-block">
            <?php echo e($prd->name); ?>

         </span>
       <span class="price d-block"><?php echo e(crf($prd->price)); ?></span>
    </div>
</a>
<?php /**PATH E:\xampp\htdocs\nava\resources\views\components\searchitem.blade.php ENDPATH**/ ?>