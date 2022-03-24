<?php $__env->startSection('import_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="<?php echo e(asset('admin/app/js/tinymce.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/tinymce.js') ?>">
</script>
<script src="<?php echo e(asset('admin/app/js/related.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/related.js') ?>">
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('name'); ?>
Danh Mục Bài Viết
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(session('ok')): ?>
<script>
    toastr.success("Thêm Thể Loại Thành Công");
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
    <input type="hidden" name="" id="url__handle--related" value="<?php echo e(route('handle_related')); ?>">
    <input type="hidden" name="" id="url__handle--relatedFor" value="<?php echo e(route('handle_related_for')); ?>">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Thêm Liên Kết
                </div>
                <div class="card-body">
                    <?php echo Form::open(['url' => route('edit_handle_related' , ['id' => $related->id]) , 'method' => "POST" ,'files' => true ]); ?>

                    <div id="selected" class="mb-4">
                        <h1 class="mb-3" style="font-size: 20px">Danh Sách Bài Viết Đã Chọn</h1>
                        <?php if($selected != ""): ?>
                        <?php $__currentLoopData = explode("," , $selected); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $blog = App\Models\Blogs::where('id', '=' , $id)->first();
                        $array = explode("," , $selected);
                        ?>
                        <?php if($blog): ?>
                        <?php if (isset($component)) { $__componentOriginal4d16f58dbbe76fb7f58c004576a2700d6cd76429 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Admin\Blogs\Checkbox::class, ['blog' => $blog,'class' => 'select__blog','name' => 'blogs','prefix' => 'blog','array' => $array]); ?>
<?php $component->withName('admin.blogs.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4d16f58dbbe76fb7f58c004576a2700d6cd76429)): ?>
<?php $component = $__componentOriginal4d16f58dbbe76fb7f58c004576a2700d6cd76429; ?>
<?php unset($__componentOriginal4d16f58dbbe76fb7f58c004576a2700d6cd76429); ?>
<?php endif; ?>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <span>Chưa có bài viết nào được chọn</span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Tìm Bài Viết</label>
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
                            <option value="<?php echo e($related->for); ?>"><?php echo e(config('navi.realted_posts.'.$related->for)); ?>

                            </option>
                            <?php $__currentLoopData = config('navi.realted_posts'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($key != $related->for): ?>
                            <option value="<?php echo e($key); ?>"><?php echo e(config('navi.realted_posts.'.$key)); ?></option>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>


                    </div>
                    <div class="form-group outputFor mb-5">
                        <?php if($related->for == "category"): ?>
                        <label for="realatedForCat">Chọn Danh Mục</label>
                        <select class="custom-select mb-3" name="rFCat" id="realatedForCat">';
                            <option value="<?php echo e($related->cat_id); ?>"><?php echo e(App\Models\Category::where('id', '=' ,
                                $related->cat_id)->first()->name); ?></option>
                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($cat->id != $related->cat_id): ?>
                            <option value="<?php echo e($cat->id); ?>"><?php echo e(str_repeat('--', $cat->level)); ?><?php echo e($cat->name); ?></option>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php else: ?>
                        <label for="">Chọn Sản Phẩm</label>
                        <select class="custom-select mb-3" name="rFPrd" id="realatedForPrd">';
                            <option value="<?php echo e($related->product_id); ?>"><?php echo e(App\Models\Products::where('id', '=' , $related->product_id )->first()->name); ?>i</option>
                        </select>
                        <input type="text" name=""  class="form-control" id="search__product" placeholder="Nhập tên sản phẩm muốn thay đổi vào đây">
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="Edit Liên Kết" class="btn w-100 text-center navi_btn">
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\admin\blogs\related\edit.blade.php ENDPATH**/ ?>