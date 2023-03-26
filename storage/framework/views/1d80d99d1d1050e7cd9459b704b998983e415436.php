<?php $__env->startSection('import_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo e(asset('admin/app/js/banners.js')); ?>?ver=<?php echo filemtime('admin/app/js/banners.js') ?>">
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
    <div class="row mx-0">
        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Thêm Slide
                    </div>
                    <div class="card-body" id="slide__add">
                        <?php echo Form::open(['url' => route('slide_handle_add'), 'method' => 'POST', 'files' => true]); ?>

                        <div class="form-group mb-5">
                            <label for="">Tên Slide</label>
                            <input type="text" class="form-control" name="name" id="" placeholder="">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
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
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
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
                        <?php if (isset($component)) { $__componentOriginal19571530086391dd0a770e0cef2481dd23608ab5 = $component; } ?>
<?php $component = App\View\Components\Admin\Form\File::resolve(['name' => 'img','id' => 'imgSlide'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.file'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\File::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal19571530086391dd0a770e0cef2481dd23608ab5)): ?>
<?php $component = $__componentOriginal19571530086391dd0a770e0cef2481dd23608ab5; ?>
<?php unset($__componentOriginal19571530086391dd0a770e0cef2481dd23608ab5); ?>
<?php endif; ?>
                        
                        

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
                    <div class="card-body w-100 row" id="slide__show">
                        <?php if (isset($component)) { $__componentOriginala0b8408abb15e09eb11fd280621111bbe6268550 = $component; } ?>
<?php $component = App\View\Components\Admin\Slides\Show::resolve(['slides' => $slides] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.slides.show'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Slides\Show::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0b8408abb15e09eb11fd280621111bbe6268550)): ?>
<?php $component = $__componentOriginala0b8408abb15e09eb11fd280621111bbe6268550; ?>
<?php unset($__componentOriginala0b8408abb15e09eb11fd280621111bbe6268550); ?>
<?php endif; ?>
                    </div>
                    <div class="modal fade" id="slideModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
                        aria-labelledby="slideModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="slideModalLabel">Chỉnh sửa slide</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php echo Form::open(['url' => '#', 'method' => 'POST', 'files' => true, 'class' => 'formUpdateSlide']); ?>

                                <div class="modal-body" id="slideModalContent">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary saveSlide">Save</button>
                                    <?php echo Form::close(); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/admin/slides_banners/slides/index.blade.php ENDPATH**/ ?>