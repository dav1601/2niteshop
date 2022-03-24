
<?php $__env->startSection('import_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="<?php echo e(asset('admin/app/js/tinymce.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/tinymce.js') ?>">
</script>
<script src="<?php echo e(asset('admin/app/js/blogs.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/blogs.js') ?>">
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('name'); ?>
Danh Mục Bài Viết
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(session('ok')): ?>
<script>
    toastr.success("Sửa Bài Viết Thành Công");
</script>
<?php endif; ?>
<div class="row mx-0">


    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                   Sửa Bài Viết
                </div>
                <div class="card-body">
                    <?php echo Form::open(['url' => route('handle_edit_blog' , ['id' => $blog->id]) , 'method' => "POST" ,'files' => true ]); ?>

                    <div class="form-group mb-5">
                        <label for="">Tiêu đề</label>
                        <input type="text" class="form-control" name="title" value="<?php echo e($blog->title); ?>" id="" placeholder="">
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
                        <label for="">DESC</label>
                        <textarea name="desc" class="form-control" rows="10"><?php echo $blog->desc; ?></textarea>
                        <?php $__errorArgs = ['desc'];
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
                            <input type="file" name="img" class="custom-file-input" id="img">
                            <label class="custom-file-label" for="img" id="forImg">Đổi Hình ảnh bài viết ( không đổi bỏ qua phầN này)</label>
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
                        <div class="form-group mt-4">
                            <img src="<?php echo e(asset($blog->img)); ?>" alt="">
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Danh mục bài viết</label>
                        <select class="custom-select" name="cat" id="">
                            <option value="<?php echo e($blog->cat_id); ?>"><?php echo e(App\Models\CatBlog::where('id', '=' , $blog->cat_id)->first()->name); ?></option>
                            <?php $__currentLoopData = $category_blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($cb ->id != $blog->cat_id): ?>
                            <option value="<?php echo e($cb->id); ?>"><?php echo e($cb->name); ?></option>
                            <?php endif; ?> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
                        </select>
                        <?php $__errorArgs = ['cat'];
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
                        <label for="">Danh mục 2 bài viết</label>
                        <select class="custom-select" name="cat_2" id="">
                            <?php if($blog->cat_sub_id != NULL): ?>
                            <option value="<?php echo e($blog->cat_sub_id); ?>"><?php echo e(App\Models\CatBlog::where('id', '=' , $blog->cat_sub_id)->first()->name); ?></option>
                            <?php $__currentLoopData = $category_blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($cb ->id != $blog->cat_sub_id): ?>
                            <option value="<?php echo e($cb->id); ?>"><?php echo e($cb->name); ?></option>
                            <?php endif; ?> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <option value="">Chọn  danh mục 2</option>
                            <?php $__currentLoopData = $category_blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cb->id); ?>"><?php echo e($cb->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                          
                           
                        </select>
                        <?php $__errorArgs = ['cat_2'];
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
                            class="form-control my-editor"><?php echo $blog->content; ?></textarea>
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
                        <input type="submit" value="Cập Nhật Bài Viết" class="btn w-100 text-center navi_btn">
                    </div>
                    <?php echo Form::close(); ?>

                    <div class="form-group mb-5">
                        <a href="<?php echo e(route('show_blogs')); ?>" class="btn w-100 text-center navi_btn">Quay Lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\admin\blogs\edit.blade.php ENDPATH**/ ?>