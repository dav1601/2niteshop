<?php $__env->startSection('import_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="<?php echo e(asset('admin/app/js/banners.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/banners.js') ?>">
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('name'); ?>
Quản lý ADS
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(session('ok')): ?>
<script>
    toastr.success("Thêm Slide Thành Công");
</script>
<?php endif; ?>
<input type="hidden" name="" id="url__ajax--slide" value="<?php echo e(route('handle_update_slide')); ?>">
<div class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Thêm Ads
                </div>
                <div class="card-body" id="slide__add">
                    <?php echo Form::open(['url' => route('ads_handle_add') , 'method' => "POST" ,'files' => true ]); ?>

                    <div class="form-group mb-5">
                        <label for="">Link Ads</label>
                        <input type="text" class="form-control" name="link" id="" placeholder="">
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
                            <input type="file" name="img" class="custom-file-input" id="imgAds">
                            <label class="custom-file-label" for="imgAds" id="forAds">Hình ảnh Ads size không vượt
                                quá
                                1Mb , Các đuôi cho phép: jpeg,png,jpg,tiff,svg</label>
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
                    </div>

                    <div class="form-group mb-5">
                        <label for="">Type</label>
                        <select class="custom-select" name="type" id="">
                            <?php $__currentLoopData = Config::get('navi.ads_type'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($type); ?>"><?php echo e($type); ?></option>
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
                    <div class="form-group mb-5">
                        <label for="">Trạng thái</label>
                        <select class="custom-select" name="active" id="">
                            <option value="1">Hoạt động</option>
                            <option value="0">Chờ</option>
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="Thêm" class="btn w-100 navi_btn">
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
                    Danh sách ADS
                </div>
                <div class="card-body" id="slide__show">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Link</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Type</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Thời gian</th>
                                <th scope="col">Xoá</th>
                            </tr>
                        </thead>
                        <tbody id="output__slide">
                            <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($slide->id); ?></th>
                                <td><?php echo e($slide->link); ?></td>
                                <td>
                                    <img src="<?php echo e(asset($slide->img)); ?>" width="100%" class="va-radius-fb">
                                </td>
                                <td>
                                  <?php echo e($slide->type); ?>

                                </td>
                                <td>
                                    <?php echo e($slide->active); ?>

                                </td>
                                <td><?php echo e($carbon -> create($slide->created_at) ->
                                    diffForHumans($carbon -> now('Asia/Ho_Chi_Minh'))); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo e(route('ads_handle_delete', ['id'=>$slide->id])); ?>">
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

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\admin\slides_banners\ads\add.blade.php ENDPATH**/ ?>