<?php
if ($item->status == 1 ) {
$tooltip = "Đơn Hàng đã đặt lúc ".$item->created_at;
}elseif($item->status == 2){
$tooltip = "Đơn Hàng đã bắt đầu vận chuyển lúc ".$item->updated_at;
}elseif($item->status == 3){
$tooltip = "Đơn Hàng đã giao thành công lúc ".$item->updated_at;
}
$cart = unserialize($item->cart);
?>
<div class="purchase__item">
  <div class="purchase__item--info">
    <div class="IdStt d-flex justify-content-between">
      <div class="idItem">
        <span>ID Đơn Hàng: <?php echo e($item->id); ?></span>
      </div>
      <div class="sttItem d-flex align-items-center sttItem-<?php echo e($item->status); ?>">
        <?php if($item->status != 4): ?>
        <i class="fas fa-truck"></i>
        <?php endif; ?>
        <span class="stt stt-<?php echo e($item->status); ?>">
          <?php echo e(Config::get('orders.status.'.$item->status )); ?>

        </span>
        <?php if($item->status != 4): ?>
        <div class="tooltipItem" data-toggle="tooltip" data-placement="bottom" title="<?php echo e($tooltip); ?>">
          <i class="far fa-question-circle"></i>
        </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="products">
      <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="product d-flex justify-content-between  mb-3">
        <img src="<?php echo e($file->ver_img($product->options->image)); ?>" width="100" alt="">
        <div class="content d-block">
          <a href="<?php echo e(route('detail_product', ['slug'=>Str::slug($product->name)])); ?>" class="name">
            <?php echo e($product->name); ?>

          </a>
          <?php if($product->options->ins != 0): ?>
          <span class="d-block ins my-2">Chế độ bảo hành: <?php echo e(App\Models\Insurance::where('id' , '=' ,
            $product->options->ins)->first() ->name); ?></span>
          <?php endif; ?>
          <span class="qty mt-2 d-block">
            x<?php echo e($product->qty); ?>

          </span>
        </div>
        <span class="sub_total d-flex align-items-center">
          <?php echo e(crf($product->options->sub_total)); ?>

        </span>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
  <div class="_1J7vLy"></div>
  <div class="purchase__item--stats">
    <div class="_37UAJO d-flex justify-content-end align-items-center">
      <div class="d-flex align-items-center">
        <div class="d-flex align-items-center mr-2 total">
          <i class="fas fa-dollar-sign mr-1"></i>
          <span>Tổng số tiền:</span>
        </div>
        <span class="total_price"><?php echo e(crf($item->total)); ?></span>
      </div>
    </div>
    <?php if($item->status == 1): ?>
    <div class="_37UAJO action d-flex justify-content-end align-items-end flex-column">
      <button class="stardust-button-not-main update__cancel" data-type="<?php echo e($type); ?>" data-id="<?php echo e($item->id); ?>">Huỷ Đơn
        Hàng</button>
      <!-- section-warning -->
      <div class="wrapper-warning mt-2">
        <div class="card-2">
          <div class="icon"><i class="fas fa-exclamation-circle"></i></div>
          <div class="subject">
            <h3>Lưu Ý:</h3>
            <p>Khách hàng Nhấn vào <strong class="update__orders" data-type="<?php echo e($type); ?>" >CẬP NHẬT</strong> Trước khi <strong>HUỶ</strong> để cập nhật trạng thái mới nhất của toàn bộ đơn hàng</p>
          </div>
        </div>
      </div>
      <!-- section-warning -->
    </div>
    <?php endif; ?>
  </div>

</div>
<?php /**PATH E:\xampp\htdocs\nava\resources\views/components/client/account/purchase/item.blade.php ENDPATH**/ ?>