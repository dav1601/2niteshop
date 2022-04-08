
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
                    <?php echo Form::open(['url' => route('add_handle_related') , 'method' => "POST" ,'files' => true ]); ?>

                    <div id="selected" class="mb-4">
                        <h1 class="mb-3" style="font-size: 20px">Danh Sách Bài Viết Đã Chọn</h1>
                        <?php if($selected != ""): ?>
                        <?php $__currentLoopData = explode("," , $selected); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $blog = App\Models\Blogs::where('id', '=' , $id)->first();
                        $array = explode("," , $selected);
                        ?>
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
                            <option value="">Chọn</option>
                            <option value="category">Danh Mục</option>
                            <option value="product">Sản Phẩm</option>
                        </select>
                    </div>
                    <div class="form-group outputFor mb-5">

                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="Thêm Liên Kết" class="btn w-100 text-center navi_btn">
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
                    Thêm Thể Loại
                </div>
                <div class="card-body" id="cssTableRL">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Posts</th>
                                <th scope="col">Product Id</th>
                                <th scope="col">Cat Id</th>
                                <th scope="col">For</th>
                                <th scope="col">Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = App\Models\RelatedPosts::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                   <?php echo e($ord->id); ?>

                                </td>
                                <td>
                                    <?php echo e($ord->posts); ?>

                                </td>
                                <td>
                                    <?php if($ord->product_id != NULL): ?> 
                                    <?php echo e(App\Models\Products::where('id', '=' , $ord->product->id)->first()->name); ?>

                                        <?php else: ?>
                                        Không Có
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($ord->cat_id != NULL): ?> 
                                    <?php echo e(App\Models\Category::where('id', '=' , $ord->cat_id)->first()->name); ?>

                                        <?php else: ?>
                                        Không Có
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo e($ord->for); ?>

                                </td>
                                <td>
                                    <a href="<?php echo e(route('edit_related_view' , ['id' => $ord->id , 'selected' => "?selected=".$ord->posts])); ?>">
                                        <i class="fas fa-eye"></i>
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\admin\blogs\related\add.blade.php ENDPATH**/ ?>