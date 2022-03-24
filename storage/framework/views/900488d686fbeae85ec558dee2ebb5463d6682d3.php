<?php $__env->startSection('import_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('client/Date-Time-Picker-Bootstrap-4/build/css/bootstrap-datetimepicker.min.css')); ?>">
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
Danh Sách Sản Phẩm
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" name="" value="<?php echo e(route('handle_ajax_orders')); ?>" id="ord__filter--url">
<input type="hidden" name="" value="<?php echo e(route('change_address_2')); ?>" id="ord__filter--url2">
<div class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Bảng Lọc
                </div>
                <div class="card-body row mx-0" id="ord__filter">
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Sắp xếp</label>
                            <select class="custom-select" name="" id="ord__filter--sort">
                                <option value="DESC">Mới nhất</option>
                                <option value="ASC">Cũ nhất</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Trạng Thái</label>
                            <select class="custom-select" name="" id="ord__filter--stt">
                                <option value="0">Tất cả</option>
                                <?php $__currentLoopData = config('orders.status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $stt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>"><?php echo e($stt); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="form-group">
                            <label for="">Tên hoặc Email Khách Hàng</label>
                            <input type="text" class="form-control" name="" id="ord__filter--nameMail"
                                placeholder="Tên hoặc Email khách hàng">
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="text" class="form-control" name="" id="ord__filter--phone"
                                placeholder="Số điện thoại khách hàng">
                        </div>
                    </div>
                    <div class="col-3 mb-4 pl-0" >
                        <label for="">Chọn Ngày Đặt Hàng (trở về trước)</label>
                        <div id="dateprev" class="positon-relative">
                            <input type="text" class="form-control">
                       <span id="show_date_1">
                        <i class="fas fa-calendar"></i>
                       </span>
                        </div>
                    </div>
                    <div class="col-3 mb-4 pl-0" >
                        <label for="">Chọn Ngày Đặt Hàng (trở về sau)</label>
                        <div id="datenext" class="positon-relative">
                            <input type="text" class="form-control">
                       <span id="show_date_2">
                        <i class="fas fa-calendar"></i>
                       </span>
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Tỉnh</label>
                            <select class="custom-select" name="" id="ord__filter--prov">
                                <option value="0">Tất Cả</option>
                                <?php $__currentLoopData = App\Models\Province::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($prov->_name); ?>" data-id="<?php echo e($prov->id); ?>"><?php echo e($prov->_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Quận/Huyện</label>
                            <select class="custom-select" name="" id="ord__filter--dist">
                                <option value="0">Tất cả</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Phường/Xã</label>
                            <select class="custom-select" name="" id="ord__filter--ward">
                                <option value="0">Tất cả</option>
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
                    Danh sách sản phẩm
                </div>
                <div class="card-body pb-0" id="table__show--orders">
                   <?php if (isset($component)) { $__componentOriginalb68b54fc5da3de53e97a843e52bf43816dfedb51 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tableorders::class, ['number' => $number_page,'page' => $page,'order' => $orders]); ?>
<?php $component->withName('tableorders'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb68b54fc5da3de53e97a843e52bf43816dfedb51)): ?>
<?php $component = $__componentOriginalb68b54fc5da3de53e97a843e52bf43816dfedb51; ?>
<?php unset($__componentOriginalb68b54fc5da3de53e97a843e52bf43816dfedb51); ?>
<?php endif; ?>
                </div>

            </div>
        </div>
    </div>






    
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\admin\orders\show.blade.php ENDPATH**/ ?>