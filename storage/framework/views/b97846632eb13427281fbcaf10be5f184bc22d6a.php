
<?php $__env->startSection('import_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="<?php echo e(asset('admin/app/js/banners.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/banners.js') ?>">
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('name'); ?>
Quản lý Slides
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
                    Thêm Slide
                </div>
                <div class="card-body" id="slide__add">
                    <?php echo Form::open(['url' => route('slide_handle_add') , 'method' => "POST" ,'files' => true ]); ?>

                    <div class="form-group mb-5">
                        <label for="">Tên Slide</label>
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
                        <div class="custom-file">
                            <input type="file" name="img" class="custom-file-input" id="imgSlide">
                            <label class="custom-file-label" for="imgSlide" id="forSlide">Hình ảnh slide size không vượt
                                quá
                                500kb , Các đuôi cho phép: jpeg,png,jpg,tiff,svg</label>
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
                        <label for="">Link Banner</label>
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
                        <label for="">Vị trí</label>
                        <select class="custom-select" name="index" id="">
                            <option value="">Vị trí</option>
                            <?php $__currentLoopData = Config::get('navi.index_slides'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($index); ?>"><?php echo e($index); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            Vị trí này đã có slide đang hiển thị
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Trạng thái</label>
                        <select class="custom-select" name="stt" id="">
                            <option value="1">Hiển thị</option>
                            <option value="2">Chờ</option>
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="Thêm Slide" class="btn w-100 navi_btn">
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
                    Danh sách slides
                </div>
                <div class="card-body" id="slide__show">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Link</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Vị trí</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Người đăng</th>
                                <th scope="col">Thời gian</th>
                                <th scope="col">Xoá</th>
                            </tr>
                        </thead>
                        <tbody id="output__slide">
                            <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($slide->id); ?></th>
                                <td><?php echo e($slide->name); ?></td>
                                <td><?php echo e($slide->link); ?></td>
                                <td>
                                    <img src="<?php echo e(asset( $slide->img )); ?>" width="200" class=" va-radius-fb " alt="">
                                </td>
                                <td>
                                    <select class="custom-select" name="" id="slide__show--index"
                                        data-id="<?php echo e($slide->id); ?>" data-stt="<?php echo e($slide->status); ?>">
                                        <option value="<?php echo e($slide->index); ?>"><?php echo e($slide->index); ?></option>
                                        <?php $__currentLoopData = Config::get('navi.index_slides'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($index != $slide->index ): ?>
                                        <option value="<?php echo e($index); ?>"><?php echo e($index); ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </td>
                                <td>
                                    <select class="custom-select" name="" id="slide__show--stt"
                                        data-id="<?php echo e($slide->id); ?>" data-index=" <?php echo e($slide->index); ?>">
                                        <option value="<?php echo e($slide->status); ?>"><?php echo e(slide_stt($slide->status)); ?></option>
                                        <?php $__currentLoopData = Config::get('navi.status_slides'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($stt != $slide->status ): ?>
                                        <option value="<?php echo e($stt); ?>"><?php echo e(slide_stt($stt)); ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </td>
                                <td class="text-center"><?php echo e($slide->author_post); ?></td>
                                <td><?php echo e($carbon -> create($slide->created_at) ->
                                    diffForHumans($carbon -> now('Asia/Ho_Chi_Minh'))); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo e(route('slide_delete', ['id'=>$slide->id])); ?>" class="delete_slide">
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217861923/domains/vachill.com/public_html/resources/views/admin/slides_banners/slides/index.blade.php ENDPATH**/ ?>