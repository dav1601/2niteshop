
<?php $__env->startSection('import_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="<?php echo e(asset('admin/app/js/banners.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/banners.js') ?>">
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('name'); ?>
Quản Lý Banners
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(session('ok')): ?>
<script>
    toastr.success("Cập Nhật Banner Thành Công");
</script>
<?php endif; ?>
<div class="col-12 mt-4 p-0">
    <div class="w-100">
        <div class="card">
            <div class="card-header text-center">
                Thêm Banner
            </div>
            <div class="card-body" id="banner__add">
                <?php echo Form::open(['url' => route('banner_handle_edit' , ['id'=> $banner->id]) , 'method' => "POST"
                ,'files' => true ]); ?>

                <div class="form-group mb-5">
                    <label for="">Tên Banner</label>
                    <input type="text" class="form-control" name="name" id="" value="<?php echo e($banner->name); ?>"
                        placeholder="">
                    <?php $__errorArgs = ['name'];
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
                    <label for="">Link Banner</label>
                    <input type="text" class="form-control" name="link" value="<?php echo e($banner->link); ?>" id=""
                        placeholder="">
                    <?php $__errorArgs = ['link'];
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
                    <div class="custom-file">
                        <input type="file" name="img" class="custom-file-input" id="imgBanner">
                        <label class="custom-file-label" for="img" id="forBanner">Đổi hình ảnh Banner , Hình ảnh size
                            không quá 500kb , Các
                            đuôi ảnh
                            cho phép: jpeg,png,jpg,tiff,svg</label>
                    </div>
                    <?php $__errorArgs = ['img'];
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
                    <div class="show_main mt-4">
                        <img src="<?php echo e(asset($banner->img)); ?>" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="form-group mb-5">
                    <label for="">Vị trí</label>
                    <select class="custom-select" name="position" id="" disabled>
                        <option value="<?php echo e($banner->position); ?>"><?php echo e($banner->position); ?></option>
                    </select>
                    <?php $__errorArgs = ['position'];
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
                    <?php if(session('index')): ?>
                    <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                        Vị trí này đã tồn tại
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="form-group mb-5">
                    <label for="">Thứ Tự</label>
                    <select class="custom-select" name="index" id="" disabled>
                        <option value="<?php echo e($banner->index); ?>"><?php echo e($banner->index); ?></option>
                    </select>
                    <?php $__errorArgs = ['index'];
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
                    <?php if(session('index')): ?>
                    <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                        Thứ tự này đã tồn tại
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="form-group mb-5">
                    <input type="submit" value="Cập Nhật Banner" class="btn navi_btn w-100">
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\admin\slides_banners\banners\edit.blade.php ENDPATH**/ ?>