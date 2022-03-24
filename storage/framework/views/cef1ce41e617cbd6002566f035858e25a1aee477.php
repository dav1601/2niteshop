<?php $__env->startSection('import_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="<?php echo e(asset('admin/app/js/category.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/category.js') ?>">
</script>
<script src="<?php echo e(asset('admin/app/js/tinymce.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/tinymce.js') ?>">
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('name'); ?>
Chinh sách của shop
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(session('ok')): ?>
<script>
    toastr.success("Cập Nhật Chính Sách Thành Công");
</script>
<?php endif; ?>

<div id="plc" class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Thêm Chính Sách
                </div>
                <div class="card-body" id="plc__add">
                    <?php echo Form::open(['url' => route('handle_edit_plc' , ['id' => $policy -> id]) , 'method' => "POST"
                    ,'files' => true ]); ?>

                    <div class="form-group mb-5">
                        <label for="">Tiêu Đề Chính Sách </label>
                        <input type="text" class="form-control" name="name" value="<?php echo e($policy -> title); ?>" id=""
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
                        <label for="">Icon</label>
                        <input type="text" class="form-control" value="<?php echo e($policy -> icon); ?>" name="icon" id=""
                            placeholder="">
                        <?php $__errorArgs = ['icon'];
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
                        <label for="">Vị trí</label>
                        <select class="custom-select" name="position" id="">
                            <option value="<?php echo e($policy->position); ?>"><?php echo e($policy->position); ?></option>
                           <?php $__currentLoopData = Config::get('product.position');; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php if($policy->position != $p ): ?>
                           <option value="<?php echo e($p); ?>"><?php echo e($p); ?></option>
                           <?php endif; ?>            
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Nội Dung</label>
                        <textarea name="content" id="plc__tiny"
                            class="form-control my-editor"><?php echo $policy -> content; ?></textarea>
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
                        <label for="">FullSet</label>
                        <select class="custom-select" name="fullset" id="">
                            <option value="<?php echo e($policy->fullset); ?>"><?php echo e($policy->fullset); ?></option>
                            <?php for($i =0 ; $i <= 1 ; $i++): ?> <?php if($policy->fullset != $i): ?>
                                <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                <?php endif; ?>
                                <?php endfor; ?>
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="Cập Nhật Chính Sách" class="btn w-100 text-center navi_btn">
                    </div>
                    <div class="form-group mb-5">
                        <a href="<?php echo e(route('plc')); ?>" class="btn w-100 text-center navi_btn d-block">Quay Về Trang Chính
                            Sách</a>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
    

    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\admin\products\category\policy\edit.blade.php ENDPATH**/ ?>