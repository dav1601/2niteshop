<?php $__env->startSection('import_css'); ?>
<link rel="stylesheet"
    href="<?php echo e(asset('client/Date-Time-Picker-Bootstrap-4/build/css/bootstrap-datetimepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="<?php echo e(asset('admin/app/js/pre_orders.js')); ?>"></script>
<script src="<?php echo e(asset('client/Date-Time-Picker-Bootstrap-4/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('name'); ?>
Update đơn hàng đặt trước
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row mx-0">
    <?php if(session('ok')): ?>
    <script>
        toastr.success("Update Thành Công");
    </script>
    <?php endif; ?>
    <?php if(session('not-ok')): ?>
    <script>
        toastr.success("Update Không Thành Công");
    </script>
    <?php endif; ?>
    
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Update Đơn Hàng Đặt Trước
                </div>
                <div class="card-body pb-0" id="">
                    <?php echo Form::open(['url' =>route('handle_update', ['id'=> $id]) , 'method' =>
                    "POST",'files' => true ]); ?>

                    <div class="form-group mb-5">
                        <label for="">Tên Khách Hàng</label>
                        <input type="text" class="form-control" name="name" value="<?php echo e($pord -> name_cus); ?>" id=""
                            placeholder="">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
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
                    <div class="form-group mb-5">
                        <label for="">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo e($pord->phone); ?>" id=""
                            placeholder="">
                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
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
                    <div class="form-group mb-5">
                        <label for="">Tiền Khách Cọc</label>
                        <input type="text" class="form-control" name="price_deposit" value="<?php echo e($pord->price_deposit); ?>"
                            id="price_deposit" placeholder="">
                        <div class="box_output mt-3">
                            <span>Bạn Đang Nhập:<strong class="output_price pl-2"><?php echo e(crf( $pord->price_deposit)); ?></strong></span>
                        </div>
                        <?php $__errorArgs = ['price_deposit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
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
                    <div class="form-group mb-5">
                        <label for="">Giá sản phẩm về tới kho</label>
                        <input type="text" class="form-control" name="" value="<?php echo e(crf($pord->price)); ?>" id=""
                            placeholder="" disabled>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Tên Sản Phẩm</label>
                        <input type="text" class="form-control" name=""
                            value="<?php echo e(App\Models\Products::where('id', '=' , $pord->products_id)->first()->name); ?> ---- Id : <?php echo e($pord->products_id); ?>"
                            disabled>
                    </div>
                    <div class="row mx-0">
                        <div class="col-3 pl-0">
                            <div class="form-group">
                                <label for="">Trạng thái xử lý</label>
                                <select class="custom-select" name="status">
                                    <option value="<?php echo e($pord->status); ?>"><?php echo e(Config::get('orders.pre_orders.status.'.$pord->status)); ?></option>
                                    <?php $__currentLoopData = Config::get('orders.pre_orders.status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $stt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key != $pord->status): ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($stt); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Trạng thái sản phẩm</label>
                                <select class="custom-select" name="status_product" disabled>
                                    <option value="<?php echo e($pord->status); ?>"><?php echo e(Config::get('orders.pre_orders.status_product.'.$pord->status_product)); ?>

                                    </option>
                                    <?php $__currentLoopData = Config::get('orders.pre_orders.status_product'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $stt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key != $pord->status_product): ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($stt); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Trạng thái đặt cọc</label>
                                <select class="custom-select" name="deposit">
                                    <option value="<?php echo e($pord->deposit); ?>"><?php echo e(Config::get('orders.pre_orders.deposit.'.$pord->deposit)); ?></option>
                                    <?php $__currentLoopData = Config::get('orders.pre_orders.deposit'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $stt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key != $pord->deposit): ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($stt); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Trạng thái giao hàng</label>
                                <select class="custom-select" name="delivery_status">
                                    <option value="<?php echo e($pord->delivery_status); ?>"><?php echo e(Config::get('orders.pre_orders.delivered.'.$pord->delivery_status )); ?></option>
                                    <?php $__currentLoopData = Config::get('orders.pre_orders.delivered'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $stt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key != $pord->delivery_status): ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($stt); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 my-5 pl-0" >
                        <label for="">Chọn Ngày Cho Khách Lấy Hàng</label>
                        <div id="datenext" class="positon-relative">
                            <input type="text" name="delivery_time" value="<?php echo e($pord->delivery_time); ?>" class="form-control">
                       <span id="show_date_2">
                        <i class="fas fa-calendar"></i>
                       </span>
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="Cập Nhật Đơn đặt hàng" class="btn navi_btn w-100">
                    </div>


                    <?php echo Form::close(); ?>

                </div>

            </div>
        </div>
    </div>
    
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217861923/domains/vachill.com/public_html/resources/views/admin/orders/update.blade.php ENDPATH**/ ?>