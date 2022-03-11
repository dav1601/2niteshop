<div class="success__add position-relative">
    <div class="success__add--close position-absolute">
        <i class="fas fa-times"></i>
    </div>
<div class="d-flex">
    <a href="<?php echo e(route('detail_product', ['slug'=>$item->slug])); ?>" class="success__add--img">
        <img src="<?php echo e($file->ver_img($item->main_img)); ?>" alt="">
    </a>
    <div class="success__add--content">
         <a href="<?php echo e(route('detail_product', ['slug'=>$item->slug])); ?>" class="name">
             <?php echo e($item->name); ?>

         </a>
         <span class="alerT">
        Thành công: Bạn đã thêm <a href="<?php echo e(route('detail_product', ['slug'=>$item->slug])); ?>" class="name_2"><?php echo e($item->name); ?></a> vào <a href="<?php echo e(route('show_cart')); ?>" class="carT">Giỏ Hàng</a>
         </span>
    </div>
</div>
<div class="success__add--btn row mx-0 flex-nowrap mt-2">
   <div class="col-6 p-0">
     <a href="<?php echo e(route('show_cart')); ?>" class="go__cart">
        <i class="fas fa-shopping-bag"></i>
        <span>Vào Giỏ Hàng</span>
     </a>
   </div>
   <div class="col-6 p-0">
 <a href="<?php echo e(route('checkout')); ?>" class="go__cko">
    <i class="fas fa-credit-card"></i>
    <span>Thanh Toán</span>
</a>

</div>
</div>
</div>
<?php /**PATH /home/u217861923/domains/vachill.com/public_html/resources/views/components/addcart.blade.php ENDPATH**/ ?>