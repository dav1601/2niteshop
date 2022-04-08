<?php $__env->startSection('import_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="<?php echo e(asset('admin/app/js/tinymce.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/tinymce.js') ?>">
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('name'); ?>
Quản Lý Trang
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(session('ok')): ?>
<script>
    toastr.success("Thêm Page Thành Công");
</script>
<?php endif; ?>
<?php if(session('not-ok')): ?>
<script>
    toastr.success("Thêm Page Không Thành Công");
</script>
<?php endif; ?>
<?php if(session('delete-ok')): ?>
<script>
    toastr.success("Xoá Page Thành Công");
</script>
<?php endif; ?>
<?php if(session('delete-not-ok')): ?>
<script>
    toastr.success("Xoá Page Không Thành Công");
</script>
<?php endif; ?>
<div class="row mx-0">

    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Thêm Trang
                </div>
                <div class="card-body">
                    <?php echo Form::open(['url' => route('handle_add_page') , 'method' => "POST" ,'files' => true ]); ?>

                    <div class="form-group mb-5">
                        <label for="">Tiêu đề</label>
                        <input type="text" class="form-control" name="title" id="" value="<?php echo e(old('title')); ?>"
                            placeholder="">
                        <?php $__errorArgs = ['title'];
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
                        <label for="">Content</label>
                        <textarea name="content" id="content__blog"
                            class="form-control my-editor"><?php echo old('content'); ?></textarea>
                        <?php $__errorArgs = ['content'];
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
                        <input type="submit" value="Thêm Trang" class="btn w-100 text-center navi_btn">
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
                    Danh sách trang
                </div>
                <div class="card-body" id="table__pages">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tiêu Đề</th>
                                <th scope="col">Người Đăng</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Xoá</th>
                                <th scope="col">Created_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($page -> id); ?></td>
                                <td><?php echo e($page -> title); ?></td>
                                <td><?php echo e(App\Models\User::where('id', '=' ,$page->users_id )->first()->name); ?></td>
                                <td>
                                    <a href="<?php echo e(route('edit_page', ['id'=>$page->id])); ?>">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('handle_delete_page', ['id'=>$page->id])); ?>">
                                        <i class="fa-solid fa-delete-left"></i>
                                    </a>
                                </td>
                                <td>
                                    <?php echo e($carbon -> create($page->created_at)->diffForHumans($carbon->now())); ?>

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

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\admin\pages\index.blade.php ENDPATH**/ ?>