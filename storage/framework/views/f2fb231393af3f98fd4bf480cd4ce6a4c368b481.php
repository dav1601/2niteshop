<?php $__env->startSection('import_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
<script src="<?php echo e(asset('admin/app/js/tinymce.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/tinymce.js') ?>">
</script>
<script
    src="<?php echo e(asset('admin/app/js/dashboard.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/dashboard.js') ?>">
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('name'); ?>
Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(session('success')): ?>
<script>
    toastr.success("Cập Nhật Config Thành Công");
</script>
<?php endif; ?>
<?php if(session('error')): ?>
<script>
    toastr.error("Cập Nhật Config Thất Bại");
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
                    Sửa Config
                </div>
                <div class="card-body" id="config__home--add">
                    <?php echo Form::open(['url' => route('edit_info_handle' , ['id' => $config->id]) , 'method' => "POST"
                    ,'files' => true ]); ?>

                    <div class="form-group mb-5">
                        <label for="">Tên</label>
                        <input type="text" class="form-control" name="name" id="" value="<?php echo e($config->name); ?>"
                            placeholder="Nhập tên config">
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
                        <label for="">Type</label>
                        <select class="custom-select" name="type" id="type">
                            <option value="<?php echo e($config->type); ?>"><?php echo e($config->type); ?></option>
                            <?php $__currentLoopData = config('orders.type'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($val != $config->type): ?>
                            <option value="<?php echo e($val); ?>"><?php echo e($val); ?></option>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['type'];
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
                    
                    <div class="form-group mb-5 img <?php if($config->type != 'img'): ?> d-none <?php endif; ?>">
                        <label for="">Value Image</label>
                        <div class="custom-file">
                            <input type="file" name="value_img" class="custom-file-input" id="val_img">
                            <label class="custom-file-label" for="val_img" id="forVImg">Sửa/Thêm Hình Ảnh (không chỉnh sửa bỏ
                                qua )</label>
                        </div>
                        <?php $__errorArgs = ['value_img'];
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
                        <?php if($config->type == 'img' && $config->value != NULL): ?>
                        <div class="custom-control custom-checkbox mt-4">
                            <input type="checkbox" name="setNull" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Tích vào để xoá ảnh</label>
                        </div>
                        <?php endif; ?>
                        <?php if($config->type == 'img' && $config->value != NULL): ?>
                        <div class="show_main mt-4">
                            <img src="<?php echo e(asset($config->value)); ?>" alt="" width="100%" height="auto">
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group mb-5 html <?php if($config->type != 'html'): ?> d-none <?php endif; ?>">
                        <label for="">Value HTML</label>
                        <textarea name="value" id="value_config_infor"
                            class="form-control my-editor"><?php echo $config->value; ?></textarea>
                        <?php $__errorArgs = ['value'];
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
                    <div
                        class="form-group not-html mb-5 <?php if($config->type == 'html' || $config->type == 'img'): ?> d-none <?php endif; ?>">
                        <label for="">VALUE NOT HTML</label>
                        <textarea class="form-control" name="value" id="" rows="4"><?php echo e($config->value); ?></textarea>
                        <?php $__errorArgs = ['value'];
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
                        <input type="submit" value="Sửa Config Thông Tin" class="btn navi_btn w-100">
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
    

    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\admin\dashboard\config_info_edit.blade.php ENDPATH**/ ?>