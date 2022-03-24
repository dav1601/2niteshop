
<?php $__env->startSection('import_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="<?php echo e(asset('admin/app/js/products.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/category.js') ?>">
</script>
<script src="<?php echo e(asset('admin/app/js/tinymce.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/tinymce.js') ?>">
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('name'); ?>
Thêm Sản Phẩm
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(session('ok')): ?>
<script>
    toastr.success("Thêm Bundled Thành Công");
</script>
<?php endif; ?>
<?php if(session('delete')): ?>
<script>
    toastr.success("Xoá Bundled Thành Công");
</script>
<?php endif; ?>
<input type="hidden" name="" value="<?php echo e(route('handle_search')); ?>" id="url__handle--search">
<input type="hidden" name="" value="<?php echo e(route('handle_cat')); ?>" id="url__handle--cat">
<input type="hidden" name="" value="<?php echo e(route('handle_reload')); ?>" id="url__handle--reload">
<div class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Thêm Bundled
                </div>
                <div class="card-body">
                    <?php echo Form::open(['url' => route('handle_add_bundled') , 'method' => "POST" ,'files' => true ]); ?>

                    <div class="form-group mb-5">
                        <label for="">Danh Mục Chính</label>
                        <select class="custom-select" name="cat" id="cat">
                            <option value="">Chọn Danh Mục Chính</option>
                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cate->id); ?>"><?php echo e($cate->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['cat'];
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
                        <label for="">Danh mục Bundled</label>
                        <select class="custom-select" name="cat_id" id="cat_id">
                            <option value="0">Chưa Chọn Danh Mục Chính</option>
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Danh mục Skin đi kèm</label>
                        <select class="custom-select" name="bundled_skin" id="bundled_skin">
                            <option value="0">Chưa Chọn Danh Mục Chính</option>
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Phụ Kiện Đi Kèm</label>
                        <div class="box_access row mx-0">
                            <span>Chưa Chọn Danh Mục Chính.....</span>
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="Thêm Bundled" class="btn navi_btn w-100">
                    </div>

                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Danh Sách Bundled
                </div>
                <div class="card-body" id="bundled_show">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Bundle Skin</th>
                                <th scope="col">Bundled Accessory</th>
                                <th scope="col">Bundled Danh Mục</th>
                                <th scope="col">Sửa</th>
                                <th scope="col">Xoá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $bundled; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bdl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($bdl->id); ?>

                                </td>
                                <td>
                                   <?php if($bdl->bundled_skin != 0): ?>
                                   <?php echo e(App\Models\Category::where('id', '=' , $bdl->bundled_skin)->first()->name); ?>

                                   <?php else: ?>
                                       Không có danh mục skin
                                   <?php endif; ?>
                                </td>
                                <td>
                                    <?php
                                    $ba = explode(",",$bdl-> bundled_accessory);
                                    ?>
                                    <?php if(count($ba) > 0): ?>
                                    <ul>
                                        <?php $__currentLoopData = $ba; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                       
                                        <li class="d-flex align-items-center"><i class="fas fa-circle pr-2 mt-0" style="font-size: 8px !important;"></i> <?php echo e(App\Models\Products::where('id', '=' , $b)->first()->name); ?>,</li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <?php else: ?>
                                    Không có phụ kiện đi kèm
                                    <?php endif; ?>

                                </td>
                                <td>
                                    <?php echo e(App\Models\Category::where('id', '=' , $bdl->cat_id)->first()->name); ?>

                                </td>
                                <td>
                                    <a href="">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('handle_delete_bundled', ['id'=>$bdl->id])); ?>">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\admin\products\category\prd\bundled.blade.php ENDPATH**/ ?>