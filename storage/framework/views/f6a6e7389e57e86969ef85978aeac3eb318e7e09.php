<?php $__env->startSection('import_css'); ?>
<link rel="stylesheet"
    href="<?php echo e(asset('client/Date-Time-Picker-Bootstrap-4/build/css/bootstrap-datetimepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="<?php echo e(asset('admin/app/js/tinymce.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/tinymce.js') ?>">
</script>
<script src="<?php echo e(asset('admin/app/js/oders.js')); ?>"></script>
<script src="<?php echo e(asset('client/Date-Time-Picker-Bootstrap-4/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('name'); ?>
Chi Tiết Đơn Hàng
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" name="" value="<?php echo e(route('handle_ajax_orders')); ?>" id="ord__filter--url">
<input type="hidden" name="" value="<?php echo e(route('change_address_2')); ?>" id="ord__filter--url2">
<div class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Chi tiết đơn hàng (ID: <?php echo e($ordered->id); ?>)
                </div>
                <div class="card-body row mx-0" id="detail_order">
                    <div class="row w-100 mx-0 mb-4">
                        <div class="d-none">
                            <select class="custom-select" name="" id="ord__filter--sort">
                                <option value="DESC">Mới nhất</option>
                                <option value="ASC">Cũ nhất</option>
                            </select>
                        </div>
                        <div class="col-6 pl-0">
                            <select name="" id="" class="custom-select update__status" data-id="<?php echo e($ordered->id); ?>">
                                <option value="<?php echo e($ordered->status); ?>"><?php echo e(status_order($ordered->status)); ?></option>
                                <?php $__currentLoopData = config('orders.status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key != $ordered->status): ?>
                                <option value="<?php echo e($key); ?>"><?php echo e(status_order($key)); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-6 pr-0">
                            <select name="" id="" class="custom-select update__paid up-<?php echo e($ordered->id); ?>"
                                data-id="<?php echo e($ordered->id); ?>">
                                <option value="<?php echo e($ordered->paid); ?>"><?php echo e(paid_order( $ordered->paid)); ?></option>
                                <?php $__currentLoopData = config('orders.paid'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $paid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key != $ordered->paid): ?>
                                <option value="<?php echo e($key); ?>"><?php echo e(paid_order($key)); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <h1>Danh sách sản phẩm</h1>
                    </div>
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Chính sách bảo hành</th>
                                <th scope="col">Giá sản phẩm</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Tổng Phụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($item->options->cost); ?>

                                </td>
                                <td>
                                    <img src="<?php echo e(asset( $item->options->image )); ?>" width="150px" alt="">
                                </td>
                                <td>
                                    <?php echo e($item->name); ?>

                                </td>
                                <td>
                                    <?php if($item->options->ins != 0): ?>
                                    <?php echo e(App\Models\Insurance::where('id', '=' , $item->options->ins)->first()->name); ?>(+
                                    <?php echo e(crf(App\Models\Insurance::where('id', '=' , $item->options->ins
                                    )->first()->price)); ?> )
                                    <?php else: ?>
                                    Không có chính sách bảo hành đi kèm
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo e(crf($item->price)); ?>

                                </td>
                                <td class="text-center">
                                    x<?php echo e($item->qty); ?>

                                </td>
                                <td>
                                    <?php echo e(crf($item->options->sub_total)); ?>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="5" class="text-right" style="font-size: 20px">Tổng Đơn:</td>
                                <td colspan="2" class="text-right" style="font-size: 20px; color:#1dd1a1; font-weight:700"><?php echo e(crf($ordered->total)); ?></td>

                            </tr>
                        </tbody>

                    </table>
                    <div id="info">
                        <div class="row mx-0 w-100">
                            <div class="col-6 pl-0">
                                <h2>Thông tin khách hàng</h2>
                                <div class="box">
                                    <span>Tên: <strong><?php echo e($ordered->name); ?></strong></span>
                                    <span>Số điện thoại: <strong><?php echo e($ordered->phone); ?></strong></span>
                                    <span>Email: <strong><?php echo e($ordered->email); ?></strong></span>
                                    <span>Hình thức thanh toán: <strong><?php echo e($ordered->payment); ?></strong></span>
                                    <span>Note: <strong><?php echo e($ordered->note); ?></strong></span>
                                </div>
                            </div>
                            <div class="col-6 pr-0">
                                <h2>Thông tin vận chuyển</h2>
                                <div class="box">
                                    <span>Tỉnh: <strong><?php echo e($ordered->prov); ?></strong></span>
                                    <span>Quận/Huyện: <strong><?php echo e($ordered->dist); ?></strong></span>
                                    <span>Phường/Xã: <strong><?php echo e($ordered->ward); ?></strong></span>
                                    <span>Chi tiết: <strong><?php echo e($ordered->address); ?></strong></span>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="card-footer">
                    <a href="<?php echo e(route('show_orders')); ?>" class="btn navi_btn w-100">Quay Lại Trang Danh Sách Đơn
                        Hàng</a>
                </div>

            </div>
        </div>
    </div>
    







    
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\admin\orders\detail.blade.php ENDPATH**/ ?>