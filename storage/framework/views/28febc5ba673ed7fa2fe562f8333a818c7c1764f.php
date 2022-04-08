<?php $__env->startSection('import_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="<?php echo e(asset('admin/app/js/tinymce.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/tinymce.js') ?>">
</script>
<script src="<?php echo e(asset('admin/app/js/prd_related.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/prd_related.js') ?>">
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('name'); ?>
Danh Mục Bài Viết
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(session('ok')): ?>
<script>
    toastr.success("Cập Nhật Liên Kết Thành Công");
</script>
<?php endif; ?>
<?php if(session('delete')): ?>
<script>
    toastr.success("Xoá Thể Loại Thành Công");
</script>
<?php endif; ?>
<div class="row mx-0">
    <input type="hidden" name="" id="array__selected" value="<?php echo e($selected); ?>">
    <input type="hidden" name="" id="url__selected" value="<?php echo e($url); ?>">
    <input type="hidden" name="" id="url__handle--related" value="<?php echo e(route('prd_handle_related')); ?>">
    <input type="hidden" name="" id="url__handle--relatedFor" value="<?php echo e(route('prd_handle_related_for')); ?>">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Cập Nhật Liên Kết Sản Phẩm
                </div>
                <div class="card-body">
                    <?php echo Form::open(['url' => route('prd_edit_handle_related' , ['id' => $related->id]) , 'method' => "POST" ,'files' => true ]); ?>

                    <div id="selected" class="mb-4">
                        <h1 class="mb-3" style="font-size: 20px">Danh Sách Sản Phẩm Đã Chọn</h1>
                        <?php if($selected != ""): ?>
                        <?php $__currentLoopData = explode("," , $selected); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $product = App\Models\Products::where('id', '=' , $id)->first();
                        $array = explode("," , $selected);
                        ?>
                        <?php if (isset($component)) { $__componentOriginalc96bcfb20412907b86b9eb08b3bd97baf8829143 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Admin\Product\Checkbox::class, ['product' => $product,'class' => 'select__product','name' => 'products','prefix' => 'product','array' => $array]); ?>
<?php $component->withName('admin.product.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc96bcfb20412907b86b9eb08b3bd97baf8829143)): ?>
<?php $component = $__componentOriginalc96bcfb20412907b86b9eb08b3bd97baf8829143; ?>
<?php unset($__componentOriginalc96bcfb20412907b86b9eb08b3bd97baf8829143); ?>
<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <span>Chưa có bài viết nào được chọn</span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Tìm Sản Phẩm</label>
                        <input type="text" class="form-control" name="" id="search__name"
                            placeholder="Nhập tên bài viết">
                        <div id="result" class="mt-4">

                        </div>
                        <?php $__errorArgs = ['blogs'];
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
                        <label for="">Liên Kết Cho:</label>
                        <select class="custom-select" name="realatedFor" id="realatedFor">
                            <option value="<?php echo e($related->for); ?>"><?php echo e(config('navi.realted_products.'.$related->for)); ?>

                            </option>
                            <?php $__currentLoopData = config('navi.realted_products'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($key != $related->for): ?>
                            <option value="<?php echo e($key); ?>"><?php echo e(config('navi.realted_products.'.$key)); ?></option>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group outputFor mb-5">
                        <?php if($related->for == "blog"): ?>
                        <label for="">Chọn Bài Viết</label>
                        <select class="custom-select mb-3" name="rFPrd" id="realatedForPrd">';
                            <option value="<?php echo e($related->blog_id); ?>"><?php echo e(App\Models\Blogs::where('id', '=' , $related->blog_id )->first()->title); ?>i</option>
                        </select>
                        <input type="text" name=""  class="form-control" id="search__blog" placeholder="Nhập tên bài viết muốn thay đổi vào đây">
                        <?php else: ?>
                        <label for="">Chọn Sản Phẩm</label>
                        <select class="custom-select mb-3" name="rFPrd" id="realatedForPrd">';
                            <option value="<?php echo e($related->product_id); ?>"><?php echo e(App\Models\Products::where('id', '=' , $related->product_id )->first()->name); ?>i</option>
                        </select>
                        <input type="text" name=""  class="form-control" id="search__product" placeholder="Nhập tên sản phẩm muốn thay đổi vào đây">
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="Cập Nhật Liên Kết" class="btn w-100 text-center navi_btn">
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\admin\products\related\edit.blade.php ENDPATH**/ ?>