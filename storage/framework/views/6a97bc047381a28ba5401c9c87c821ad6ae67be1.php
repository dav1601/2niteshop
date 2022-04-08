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
                <div class="card-body row mx-0" id="ord_cus">
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Sắp xếp</label>
                            <select class="custom-select" name="" id="ord_cus--sort">
                                <option value="DESC">Mới nhất</option>
                                <option value="ASC">Cũ nhất</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Vip</label>
                            <select class="custom-select" name="" id="ord_cus--vip">
                                <option value="0">Tất cả</option>
                                <?php for($i = 1 ; $i <= 4 ; $i++ ): ?> <option value="<?php echo e($i); ?>">VIP <?php echo e($i); ?></option>
                                    <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="form-group">
                            <label for="">Tên hoặc Email Khách Hàng</label>
                            <input type="text" class="form-control" name="" id="ord_cus--nameMail"
                                placeholder="Tên hoặc Email khách hàng">
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="text" class="form-control" name="" id="ord_cus--phone"
                                placeholder="Số điện thoại khách hàng">
                        </div>
                    </div>
                    <div class="col-4 mb-4 pl-0">
                        <div class="form-group">
                            <label for="">Wallet từ</label>
                            <input type="text" class="form-control" name="" id="ord_cus--wF" placeholder="Wallet từ">
                            <div class="box_output mt-3">
                                <span>Bạn Đang Nhập:<strong class="output_price pl-2">0đ</strong></span>
                            </div>
                            <div class="box_output mt-3">
                                <span>Mặc định:<strong class="pl-2"><?php echo e(crf(App\Models\Customers::min('wallet'))); ?></strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="form-group">
                            <label for="">Đến Wallet</label>
                            <input type="text" class="form-control" name="" id="ord_cus--wT" placeholder="Đến Wallet">
                            <div class="box_output mt-3">
                                <span>Bạn Đang Nhập:<strong class="output_price_T pl-2">0đ</strong></span>
                            </div>
                            <div class="box_output mt-3">
                                <span>Mặc định:<strong class="pl-2"><?php echo e(crf(App\Models\Customers::max('wallet'))); ?></strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Tỉnh</label>
                            <select class="custom-select" name="" id="ord_cus--prov">
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
                            <select class="custom-select" name="" id="ord_cus--dist">
                                <option value="0">Tất cả</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Phường/Xã</label>
                            <select class="custom-select" name="" id="ord_cus--ward">
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
                    Danh sách khách hàng
                </div>
                <div class="card-body pb-0" id="table__show--customers">
                    <?php if (isset($component)) { $__componentOriginal4450a72d1f7c5674a95f60ebae347b5596d9d744 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Orders\Tablecustomer::class, ['number' => $number_page,'page' => $page,'customers' => $customers]); ?>
<?php $component->withName('orders.tablecustomer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4450a72d1f7c5674a95f60ebae347b5596d9d744)): ?>
<?php $component = $__componentOriginal4450a72d1f7c5674a95f60ebae347b5596d9d744; ?>
<?php unset($__componentOriginal4450a72d1f7c5674a95f60ebae347b5596d9d744); ?>
<?php endif; ?>
                </div>

            </div>
        </div>
    </div>
    
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\admin\orders\customer.blade.php ENDPATH**/ ?>