<?php $__env->startSection('import_js'); ?>
<script src="<?php echo e($file->ver('client/app/js/cart.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('margin'); ?> dtl__margin  checkout_success <?php $__env->stopSection(); ?>
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
               Đặt Hàng Thành Công
            </li>
        </ol>
    </div>
</div>

<div id="ckout_s" >
<div class="container" class="cks">
    <div class="row mx-0 w-100">
        <div class="col-12 col-lg-6 pl-lg-0 cks_left d-flex flex-column align-items-center" >
          <div class="img d-flex justify-content-center">
              <img src="<?php echo e($file->ver_img('client/images/checked-2.png')); ?>" alt="">
          </div>
          <div class="box my-3">
             <div class="box__title d-flex align-items-center">
                <h3 style="margin-top:12px">Cảm ơn quý khách đã đặt hàng thành công tại <strong>2NITE SHOP</strong></h3>
                <img src="<?php echo e($file->ver_img('client/images/happy.png')); ?>" height="30px" class="ml-2" alt="">
             </div>
             <div class="box__content">
                 <span>ID Đơn Hàng Của Quý Khách Là: <strong><?php echo e($ordered->id); ?></strong></span>
                 <span>Chúng tôi sẽ gửi cho bạn 1 email về chi tiết đơn hàng và trạng thái đơn hàng để khách hàng tiện theo dõi.</span>
                 <span>Nếu Khách Hàng cần hỗ trợ liên hệ ngay với E-mail: <strong>vaone6v2@gmail.com</strong> hoặc Gọi ngay đến: <strong><?php echo e(getVal('switchboard')->value); ?></strong> để được hỗ trợ nhanh nhất! Cảm ơn quý khách.</span>
             </div>
             <div class="box__btn">
                <a href="<?php echo e(route('home')); ?>" class="davi_btn w-100">Tiếp tục mua hàng</a>
             </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 pr-lg-0 cks_right">
          <h2>Sản Phẩm Bạn Đã Đặt</h2>
          <div class="cks_right--ordered">
              <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.carts','data' => ['cart' => $item]]); ?>
<?php $component->withName('carts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['cart' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <div  >
                <div class="row mx-0 mb-3  ">
                    <span class="col-6 pl-0">Chi phí vận chuyển linh hoạt:</span>
                    <strong class="col-6 pr-4 d-flex justify-content-end">CALL-<?php echo e(getVal('switchboard')->value); ?></strong>
                </div>
                <div class="row mx-0 mb-3">
                    <span class="col-6 pl-0">Tổng Tiền:</span>
                    <strong class="col-6 pr-4  d-flex justify-content-end" ><?php echo e(crf($ordered->total)); ?></strong>
                </div>
                <div class="row mx-0">
                    <span class="col-6 pl-0">Ngày đặt</span>
                    <strong class="col-6 pr-4  d-flex justify-content-end" ><?php echo e($ordered->created_at); ?></strong>
                </div>
            </div>
          </div>
          <div id="info">
            <div class="row mx-0 w-100">
                <div class="col-12 col-sm-6 pl-sm-0">
                    <h2>Thông tin khách hàng</h2>
                    <div class="box-info">
                        <span>Tên: <strong><?php echo e($ordered->name); ?></strong></span>
                        <span>Số điện thoại: <strong><?php echo e($ordered->phone); ?></strong></span>
                        <span>Email: <strong><?php echo e($ordered->email); ?></strong></span>
                        <span>Hình thức thanh toán: <strong><?php echo e($ordered->payment); ?></strong></span>
                        <span>Note: <strong><?php echo e($ordered->note); ?></strong></span>
                    </div>
                </div>
                <div class="col-12 col-sm-6 pr-sm-0">
                    <h2>Thông tin vận chuyển</h2>
                    <div class="box-info">
                        <span>Tỉnh: <strong><?php echo e($ordered->prov); ?></strong></span>
                        <span>Quận/Huyện: <strong><?php echo e($ordered->dist); ?></strong></span>
                        <span>Phường/Xã: <strong><?php echo e($ordered->ward); ?></strong></span>
                        <span>Địa chỉ: <strong><?php echo e($ordered->address); ?></strong></span>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217861923/domains/vachill.com/public_html/resources/views/client/cart/checkout-success.blade.php ENDPATH**/ ?>