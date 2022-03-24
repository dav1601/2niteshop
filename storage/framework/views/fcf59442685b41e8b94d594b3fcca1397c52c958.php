<?php $__env->startSection('import_js'); ?>
<script src="<?php echo e($file->ver('client/app/js/cart.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('margin'); ?> dtl__margin option_checkout <?php $__env->stopSection(); ?>
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
                Thanh toán
            </li>
        </ol>
    </div>
</div>
<div id="wp_checkout">
    <div class="container">
        <?php echo Form::open(['url' => route('handle_checkout') , 'method' => "POST"]); ?>

        <div class="checkout row mx-0">
            <div class="col-12 col-lg-4 pl-lg-0 checkout__left">
                <h1 class="mb-4">Thanh Toán</h1>
                <div class="section__checkout section__info">
                    <div class="section__checkout--title">
                        Thông tin cá nhân
                    </div>
                    <div class="section__checkout--body">
                        <div class="form-group">
                            <label for="">Họ Và Tên <strong class="pl-1">*</strong></label>
                            <input type="text" class="form-control" name="fullname" value="<?php echo e(old('fullname')); ?>" placeholder="Họ và Tên" >
                            <?php $__errorArgs = ['fullname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert">
                                <?php echo e($message); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="">E-Mail <strong class="pl-1">*</strong></label>
                            <input type="text" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="E-Mail" >
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert">
                                <?php echo e($message); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Số Điện Thoại <strong class="pl-1">*</strong></label>
                            <input type="text" class="form-control" value="<?php echo e(old('phone')); ?>" name="phone" placeholder="Số điện thoại" >
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert">
                                <?php echo e($message); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>
                <div class="section__checkout section__info">
                    <div class="section__checkout--title">
                        Địa chỉ nhận hàng
                    </div>
                    <div class="section__checkout--body">
                        <div class="form-group">
                            <label for="">Tỉnh: <strong class="pl-1">*</strong></label>
                            <select name="prov" id="prov" class="custom-select">
                                <option value="">Chọn Tỉnh</option>
                                <?php $__currentLoopData = $prov; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($pr ->id); ?>"><?php echo e($pr->_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['prov'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert">
                                <?php echo e($message); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Quận <strong class="pl-1">*</strong></label>
                            <select name="dist" id="dist" class="custom-select">
                                <option value="">Bạn chưa chọn Tỉnh</option>
                            </select>
                            <?php $__errorArgs = ['dist'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert">
                                <?php echo e($message); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Phường/Xã <strong class="pl-1">*</strong></label>
                            <select name="ward" id="ward" class="custom-select">
                                <option value="">Bạn chưa chọn Quận</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ cụ thể: <strong class="pl-1">*</strong></label>
                            <textarea name="address" id="" cols="30" rows="5" class="form-control"><?php echo e(old('address')); ?></textarea>
                            <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert">
                                <?php echo e($message); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group d-flex">
                            <input type="checkbox" style="margin-top: 3px;" name="conform" id="conform" checked>
                            <label for="conform" class="conform">Địa chỉ nhận hàng và địa chỉ thanh toán của tôi giống
                                nhau.</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 pr-lg-0 checkout__right">
                <div class="section__checkout section__move">
                    <div class="row mx-0">
                        <div class="col-6 pl-0">
                            <div class="section__checkout--title">
                                Phương thức giao hàng
                            </div>
                            <div class="section__checkout--body d-flex align-items-center">
                                <i class="fas fa-shipping-fast"></i>
                                <input type="radio" name="shipping" class="mx-1" id="shipping" checked>
                                <label for="shipping" class="conform pl-0">Phí vận chuyển linh hoạt</label>
                            </div>
                        </div>
                        <div class="col-6 pr-0">
                            <div class="section__checkout--title">
                                Phương thức thanh toán
                            </div>
                            <div class="section__checkout--body">
                                <div class="form-group">
                                    <i class="fas fa-wallet"></i>
                                    <input type="radio" name="payment" class="mx-1" id="cod" value="cod" checked>
                                    <label for="cod" class="conform pl-0">Thu tiền khi giao hàng</label>
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-money-check-alt"></i>
                                    <input type="radio" name="payment" class="mx-1" id="bank" value="transfer">
                                    <label for="bank" class="conform pl-0">Chuyển khoản ngân hàng</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="section__checkout section__cp">
                    <div class="section__checkout--title">
                        Coupon / Voucher / Điểm thưởng
                    </div>
                    <div class="section__checkout--body">
                        <div class="form-group row mx-0">
                            <label for="" class="col-12 col-sm-4 pl-0">Nhập mã Coupon tại đây <strong
                                    class="pl-1">*</strong></label>
                            <div class="col-sm-8 col-12 px-0 d-flex">
                                <input type="text" style="flex: 1" class="form-control" name="coupon"
                                    placeholder="Nhập mã Coupon tại đây ">
                                <a class="check_cp cp">Kiểm Tra</a>
                            </div>
                        </div>
                        <div class="form-group row mx-0">
                            <label for="" class="col-12 col-sm-4 pl-0">Nhập mã quà tặng tại đây <strong
                                    class="pl-1">*</strong></label>
                            <div class="col-sm-8 col-12 px-0 d-flex">
                                <input type="text" style="flex: 1" class="form-control" name="gift_code"
                                    placeholder="Nhập mã quà tặng tại đây">
                                <a class="check_cp cp_gift">Kiểm Tra</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="section__checkout section__cart">
                    <div class="section__checkout--title">
                        Giỏ hàng
                    </div>
                    <div class="section__checkout--body">
                        <div id="checkout_cart">
                            <?php $__currentLoopData = Cart::instance('shopping')->content()->sortBy('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (isset($component)) { $__componentOriginalf4b4cbd14aa875689d096f75790a47118f19ba50 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Cart::class, ['cart' => $cart]); ?>
<?php $component->withName('Cart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf4b4cbd14aa875689d096f75790a47118f19ba50)): ?>
<?php $component = $__componentOriginalf4b4cbd14aa875689d096f75790a47118f19ba50; ?>
<?php unset($__componentOriginalf4b4cbd14aa875689d096f75790a47118f19ba50); ?>
<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div id="checkout_total">
                            <div class="row mx-0 ck_total">
                                <span class="col-md-9 col-6 pl-0">Chi phí vận chuyển linh hoạt:</span>
                                <strong class="col-md-3 col-6 pr-md-4 pr-2">CALL-<?php echo e(getVal('switchboard')->value); ?></strong>
                            </div>
                            <div class="row mx-0 ck_total">
                                <span class="col-md-9 col-6 pl-0">Tổng Tiền:</span>
                                <strong class="col-md-3 col-6 pr-md-4 pr-2" id="ck_total"><?php echo e(crf(total())); ?></strong>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="section__checkout section__cart">
                    <div class="section__checkout--title">
                        Xác nhận đơn hàng
                    </div>
                    <div class="section__checkout--body">
                        <div class="form-group">
                            <textarea name="note" id="note" cols="30" rows="4" class="form-control"
                                style="max-width: 100%" placeholder="Thêm ghi chú cho đơn hàng của bạn"><?php echo e(old('note')); ?></textarea>
                        </div>
                        <div class="form-group d-flex">
                            <input type="checkbox" style="margin-top: 3px;" name="reg_blog" id="reg_blog" value="1" checked>
                            <label for="reg_blog" class="conform">Tôi muốn đăng ký nhận bản tin DAVJ GAME Store.</label>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Xác Nhận Đơn Hàng" class="davi_btn" style="border: none">
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
        <?php echo Form::close(); ?>

    </div>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\client\cart\checkout.blade.php ENDPATH**/ ?>