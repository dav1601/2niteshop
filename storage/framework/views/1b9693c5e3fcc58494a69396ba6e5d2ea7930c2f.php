<?php $__env->startSection('import_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="<?php echo e(asset('admin/app/js/products.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/category.js') ?>">
</script>
<script src="<?php echo e(asset('admin/app/js/tinymce.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/tinymce.js') ?>">
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('name'); ?>
Danh Sách Sản Phẩm
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" name="" value="<?php echo e(route('handle_search')); ?>" id="url__handle--search">
<input type="hidden" name="" value="<?php echo e(route('handle_cat')); ?>" id="url__handle--cat">
<input type="hidden" name="" value="<?php echo e(route('handle_reload')); ?>" id="url__handle--reload">
<input type="hidden" name="" value="<?php echo e(route('handle_load')); ?>" id="url__handle--load">
<div class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Bảng Lọc
                </div>
                <div class="card-body row mx-0" id="prd__filter">
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Sắp xếp</label>
                            <select class="custom-select" name="" id="prd__filter--sort">
                                <option value="DESC" sort="id">Mới nhất</option>
                                <option value="ASC" sort="id">Cũ nhất</option>
                                <option value="ASC" sort="new">Tình trạng mới</option>
                                <option value="DESC" sort="new">Tình trạng bình thường</option>
                                <option value="ASC" sort="highlight">Nổi bật</option>
                                <option value="DESC" sort="highlight">Không nổi bật</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="form-group">
                            <label for="">Tên hoặc ID sản phẩm</label>
                            <input type="text" class="form-control" name="" id="prd__filter--name"
                                placeholder="Tìm tên hoặc id sản phẩm">
                        </div>
                    </div>
                    <div class="col-3 mb-4">
                        <div class="form-group">
                            <label for="">Giá từ</label>
                            <input type="text" class="form-control" name="" id="prd__filter--priceF"
                                placeholder="Giá từ">
                            <div class="box_output mt-3">
                                <span>Bạn Đang Nhập:<strong class="output_price pl-2">0đ</strong></span>
                            </div>
                            <div class="box_output mt-3">
                                <span>Mặc định:<strong class="pl-2"><?php echo e(crf(App\Models\Products::min('price'))); ?></strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 mb-4">
                        <div class="form-group">
                            <label for="">Đến giá</label>
                            <input type="text" class="form-control" name="" id="prd__filter--priceT"
                                placeholder="Đến giá">
                            <div class="box_output mt-3">
                                <span>Bạn Đang Nhập:<strong class="output_price_T pl-2">0đ</strong></span>
                            </div>
                            <div class="box_output mt-3">
                                <span>Mặc định:<strong class="pl-2"><?php echo e(crf(App\Models\Products::max('price'))); ?></strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Danh Mục Chính</label>
                            <select class="custom-select" name="" id="prd__filter--cat">
                                <option value="0">Tất Cả</option>
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Danh Mục Phụ 1</label>
                            <select class="custom-select" name="" id="prd__filter--cat_s1">
                                <option value="">Tất cả</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Danh Mục Phụ 2</label>
                            <select class="custom-select" name="" id="prd__filter--cat_s2">
                                <option value="">Tất cả</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Nhà sản xuất</label>
                            <select class="custom-select" name="" id="prd__filter--prdcer">
                                <option value="0">Tất cả</option>
                                <?php $__currentLoopData = App\Models\Producer::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prdcer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($prdcer->id); ?>"><?php echo e($prdcer->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-3 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Tình trạng kho</label>
                            <select class="custom-select" name="" id="prd__filter--stock">
                                <option value="0">Tất cả</option>
                                <?php $__currentLoopData = Config::get('product.stock', 'default'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($stock); ?>"><?php echo e(stock_stt($stock)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-3 mb-4 pl-0">
                        <div class="form-group">
                            <label for="">Tìm theo tên người đăng</label>
                            <input type="text" class="form-control" name="" id="prd__filter--author"
                                aria-describedby="helpId" placeholder="Nhập tên người đăng">
                        </div>
                    </div>
                    <div class="col-3 mb-4">
                        <div class="form-group">
                            <label for="">Tìm theo Model</label>
                            <input type="text" class="form-control" name="" id="prd__filter--model"
                                aria-describedby="helpId" placeholder="Nhập model">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12 mt-4 p-0" id="pointScrollProduct">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Danh sách sản phẩm
                </div>
                <div class="card-body" id="product__show" class="prd__s">
                    <div class="row mx-0" id="product__show--ajax">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php if (isset($component)) { $__componentOriginal0fb89950a429316d7f52876a6244f5797d8eedf7 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Admin\Product\Item::class, ['prd' => $prd]); ?>
<?php $component->withName('admin.product.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0fb89950a429316d7f52876a6244f5797d8eedf7)): ?>
<?php $component = $__componentOriginal0fb89950a429316d7f52876a6244f5797d8eedf7; ?>
<?php unset($__componentOriginal0fb89950a429316d7f52876a6244f5797d8eedf7); ?>
<?php endif; ?>
                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="card-footer" id="product__show--page">
                    <?php echo navi_ajax_page($number_page , 1 , "","justify-content-center" , "mt-2"); ?>

                </div>
            </div>
        </div>
    </div>






    
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views/admin/products/show.blade.php ENDPATH**/ ?>