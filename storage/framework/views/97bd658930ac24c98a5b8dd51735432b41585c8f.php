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
    toastr.success("Sửa Page Thành Công");
</script>
<?php endif; ?>
<?php if(session('not-ok')): ?>
<script>
    toastr.success("Sửa Page Không Thành Công");
</script>
<?php endif; ?>

<div class="row mx-0">

    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                   Sửa Trang
                </div>
                <div class="card-body">
                    <?php echo Form::open(['url' => route('handle_edit_page' ,['id' => $id]) , 'method' => "POST" ,'files' => true ]); ?>

                    <div class="form-group mb-5">
                        <label for="">Tiêu đề</label>
                        <input type="text" class="form-control" name="title" id="" value="<?php echo e($page->title); ?>"
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
                            class="form-control my-editor"><?php echo $page->content; ?></textarea>
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
                        <input type="submit" value="Sửa Trang" class="btn w-100 text-center navi_btn">
                    </div>
                    <?php echo Form::close(); ?>

                    <div class="form-group mb-5">
                        <a href="<?php echo e(route('manage_pages')); ?>" class="btn w-100 text-center navi_btn">
                                Quay Lại Trang Quản Lý
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\admin\pages\edit.blade.php ENDPATH**/ ?>