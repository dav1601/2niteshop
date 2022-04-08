<?php $__env->startSection('import_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="<?php echo e(asset('admin/app/js/category.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/category.js') ?>">
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('name'); ?>
Bảo Hành
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(session('ok')): ?>
<script>
    toastr.success("Thêm Bảo Hành Thành Công");
</script>
<?php endif; ?>
<?php if(session('error')): ?>
<script>
    toastr.error("Chính Sách Bảo Hành Này Đã Tồn Tại");
</script>
<?php endif; ?>
<?php if(session('delete')): ?>
<script>
    toastr.success("Xoá Bảo Hành Thành Công");
</script>
<?php endif; ?>
<div id="pdc" class="row mx-0">
    <div class="col-6 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Thêm Bảo hành
                </div>
                <div class="card-body" id="pdc__add">
                    <?php echo Form::open(['url' => route('handle_add_insurance') , 'method' => "POST" ,'files' => true ]); ?>

                    <div class="form-group mb-5">
                        <label for="">Tên Chính Sách Bảo Hành</label>
                        <input type="text" class="form-control" name="name" id="" placeholder="">
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
                        <label for="">Giá</label>
                        <input type="text" class="form-control" name="price" id="ins_price" placeholder="">
                        <div class="box_output mt-3">
                            <span>Bạn Đang Nhập:<strong class="output_price pl-2">0đ</strong></span>
                        </div>
                        <?php $__errorArgs = ['price'];
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
                    <div class="form-group">
                        <label for="">Group</label>
                        <select class="custom-select" name="group" id="">
                            <option value="1">Chế độ bảo hành</option>
                            <option value="2">Sản Phẩm Mua Kèm</option>
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="Thêm Thể Loại" class="btn w-100 text-center navi_btn">
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
    
    <div class="col-6 mt-4 pr-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Danh Sách Bảo Hành
                </div>
                <div class="card-body" id="pdc__show">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Xoá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $insurances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insurance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($insurance -> id); ?></th>
                                <td><?php echo e($insurance -> name); ?></td>
                                <td><?php echo e(crf($insurance -> price)); ?></td>
                                <td>
                                    <a href="<?php echo e(route('handle_detele_insurance', ['id'=> $insurance -> id])); ?>"
                                        class="d-block">
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

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\admin\products\category\insurance\index.blade.php ENDPATH**/ ?>