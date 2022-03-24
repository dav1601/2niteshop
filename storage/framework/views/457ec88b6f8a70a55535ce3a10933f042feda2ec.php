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
Danh Sách Sản Phẩm
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" name="" value="<?php echo e(route('handle_ajax_customers')); ?>" id="ord_cus--urlAjax">
<input type="hidden" name="" value="<?php echo e(route('change_address_2')); ?>" id="ord__filter--url2">

<div class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Bảng Lọc
                </div>
                <div class="card-body row mx-0" id="preOrder">
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Sắp xếp</label>
                            <select class="custom-select" name="" id="preOrder--sort">
                                <option value="DESC">Mới nhất</option>
                                <option value="ASC">Cũ nhất</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3 mb-4">
                        <div class="form-group">
                            <label for="">Tên</label>
                            <input type="text" class="form-control" name="" id="preOrder--name"
                                placeholder="Tên khách hàng">
                        </div>
                    </div>
                    <div class="col-3 mb-4">
                        <div class="form-group">
                            <label for="">Tên Sản Phẩm</label>
                            <input type="text" class="form-control" name="" id="preOrder--namePrd"
                                placeholder="Tên khách hàng">
                        </div>
                    </div>
                    <div class="col-3 mb-4">
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="text" class="form-control" name="" id="preOrder--phone"
                                placeholder="Số điện thoại khách hàng">
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Trạng thái xử lý</label>
                            <select class="custom-select" name="" id="preOrder--stt">
                                <option value="">Tất Cả</option>
                                <?php $__currentLoopData = Config::get('orders.pre_orders.status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $stt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>" ><?php echo e($stt); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Trạng thái sản phẩm</label>
                        <select class="custom-select" name="" id="preOrder--sttPrd">
                                <option value="">Tất Cả</option>
                                <?php $__currentLoopData = Config::get('orders.pre_orders.status_product'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $stt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>" ><?php echo e($stt); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Trạng thái đặt cọc</label>
                            <select class="custom-select" name="" id="preOrder--deposit">
                                <option value="">Tất Cả</option>
                                <?php $__currentLoopData = Config::get('orders.pre_orders.deposit'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $stt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>" ><?php echo e($stt); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Trạng thái giao hàng</label>
                            <select class="custom-select" name="" id="preOrder--delivery">
                                <option value="">Tất Cả</option>
                                <?php $__currentLoopData = Config::get('orders.pre_orders.delivered'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $stt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>" ><?php echo e($stt); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Danh sách đơn đặt hàng trước
                </div>
                <div class="card-body pb-0" id="table__show--preOrders">
                    <?php if (isset($component)) { $__componentOriginal58c8bb3bb6f34d2245f00b8c423f1015070d74fb = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Admin\Table\Preorders::class, ['customers' => $pre_orders,'number' => $number,'page' => $page]); ?>
<?php $component->withName('admin.table.preorders'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal58c8bb3bb6f34d2245f00b8c423f1015070d74fb)): ?>
<?php $component = $__componentOriginal58c8bb3bb6f34d2245f00b8c423f1015070d74fb; ?>
<?php unset($__componentOriginal58c8bb3bb6f34d2245f00b8c423f1015070d74fb); ?>
<?php endif; ?>
                </div>

            </div>
        </div>
    </div>
    
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\admin\orders\pre-order.blade.php ENDPATH**/ ?>