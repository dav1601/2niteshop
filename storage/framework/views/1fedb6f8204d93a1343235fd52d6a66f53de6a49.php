<?php $__env->startSection('import_css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('admin/plugin/tags/tagsinput.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo e(asset('admin/app/js/category.js')); ?>?ver=<?php echo filemtime('admin/app/js/category.js') ?>">
    </script>
    <script src="<?php echo e(asset('admin/app/js/related_all.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/plugin/tags/tagsinput.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('name'); ?>
    Danh Mục Sản Phẩm
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div id="cat__add--product">
        <div class="row mx-0">
            <div class="col-12 mt-4 p-0">
                <div class="w-100">
                    <div class="card">
                        <div class="card-header text-center">
                            Thêm Danh Mục
                        </div>
                        <?php if(session('ok')): ?>
                            <script>
                                toastr.success("Thêm Danh Mục Thành Công");
                            </script>
                        <?php endif; ?>
                        <?php if(session('error')): ?>
                            <script>
                                toastr.error("Bạn Chỉ Được Thêm Icon Cho Danh Mục Chính");
                            </script>
                        <?php endif; ?>
                        <?php if(session('delete')): ?>
                            <script>
                                toastr.success("Xoá Danh Mục Thành Công");
                                $(function() {
                                    $(document).scrollTop($('.offset_cat').offset().top);
                                    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
                                });
                            </script>
                        <?php endif; ?>
                        <div class="card-body">
                            <div class="form-group w-100">
                                <?php echo Form::open(['url' => route('crawler.category'), 'method' => 'POST']); ?>

                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="url" required
                                            placeholder="Nhập Url của danh mục halo shop">

                                    </div>
                                    <div class="col-3">
                                        <input type="submit" value="Crawl" class="btn w-100 navi_btn text-center">

                                    </div>
                                </div>
                                <?php echo Form::close(); ?>

                            </div>
                            <?php echo Form::open(['url' => route('handle_add_cat'), 'method' => 'POST', 'files' => true]); ?>

                            <div class="form-group mb-5">
                                <label for="">Tên Danh Mục</label>
                                <input type="text" class="form-control" name="name" id=""
                                    placeholder="Tên Danh Mục (!Duy Nhất)"
                                    value="<?php echo e(old('name')); ?><?php echo e(get_crawler('page_title')); ?>">
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
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" id=""
                                    placeholder="Title Danh Mục" value="<?php echo e(old('title')); ?><?php echo e(get_crawler('title')); ?>">
                                <?php $__errorArgs = ['title'];
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
                                <label for="">Slug</label>
                                <input type="text" class="form-control" name="slug" id=""
                                    placeholder="Slug (!Duy Nhất)" value="<?php echo e(old('slug')); ?><?php echo e(get_crawler('slug')); ?>">
                                <?php $__errorArgs = ['slug'];
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
                                <label for="">Description</label>
                                <textarea type="text" class="form-control" name="desc" id="" placeholder="Description danh mục"><?php echo e(old('desc')); ?><?php echo e(get_crawler('desc')); ?></textarea>
                                <?php $__errorArgs = ['desc'];
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
                                <label for="">Keywords</label>
                                <input type="text" data-role="tagsinput" class="form-control" name="keywords"
                                    value="<?php echo e(get_crawler('kws')); ?>">
                                <?php $__errorArgs = ['keywords'];
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
                                <label for="">Danh Mục Cha</label>
                                <select class="custom-select" name="parent" id="">
                                    <option value="0">Là Danh Mục Chính</option>
                                    <?php if (isset($component)) { $__componentOriginalc9001fce224566214481bc365a1025e7bd824b18 = $component; } ?>
<?php $component = App\View\Components\Admin\Form\Select\Option::resolve(['categories' => $categories] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.select.option'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\Select\Option::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc9001fce224566214481bc365a1025e7bd824b18)): ?>
<?php $component = $__componentOriginalc9001fce224566214481bc365a1025e7bd824b18; ?>
<?php unset($__componentOriginalc9001fce224566214481bc365a1025e7bd824b18); ?>
<?php endif; ?>
                                </select>
                            </div>
                            
                            <?php if (isset($component)) { $__componentOriginal19571530086391dd0a770e0cef2481dd23608ab5 = $component; } ?>
<?php $component = App\View\Components\Admin\Form\File::resolve(['name' => 'img','id' => 'imgCategory','custom' => ['plh' => 'Banner']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

                            <?php if (isset($component)) { $__componentOriginal19571530086391dd0a770e0cef2481dd23608ab5 = $component; } ?>
<?php $component = App\View\Components\Admin\Form\File::resolve(['name' => 'icon','id' => 'iconCategory','custom' => [
                                'plh' => 'Icon Danh Mục (!Chỉ
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        dành cho
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        danh mục CHÍNH)',
                            ]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                <input type="submit" value="Thêm Danh Mục" class="btn w-100 navi_btn text-center">
                            </div>

                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12 mt-4">
                <div class="w-100">
                    <div class="card --main">
                        <div class="card-header text-center">
                            <h2>Danh Sách Danh Mục</h2>
                        </div>
                        <div class="card-body">

                            <ul class="admin-cate admin-cate-connect row no-gutters lv-0" id="admin-cate-0"
                                data-lv="0">
                                <?php if (isset($component)) { $__componentOriginal8dfd7164f23edfceef9d5b00d69c950cc5e7cefa = $component; } ?>
<?php $component = App\View\Components\Admin\Category\Dd\Item::resolve(['categories' => $categories] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.category.dd.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Category\Dd\Item::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8dfd7164f23edfceef9d5b00d69c950cc5e7cefa)): ?>
<?php $component = $__componentOriginal8dfd7164f23edfceef9d5b00d69c950cc5e7cefa; ?>
<?php unset($__componentOriginal8dfd7164f23edfceef9d5b00d69c950cc5e7cefa); ?>
<?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
    <div class="modal show" id="m_editCategory" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="m_editCategoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <?php echo Form::open(['url' => '#', 'method' => 'POST', 'files' => true, 'class' => 'formUpdateCategory']); ?>

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chỉnh sửa slide</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/admin/products/category/prd/index.blade.php ENDPATH**/ ?>