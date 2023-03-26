<?php $__env->startSection('import_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
    <script src="<?php echo e(asset('admin/app/js/dashboard.js')); ?>?ver=<?php echo filemtime('admin/app/js/dashboard.js') ?>">
    </script>
    <script src="<?php echo e($file->ver('admin/app/js/show_home.js')); ?>"></script>
    <script>
        var section = [];
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('name'); ?>
    Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('ok')): ?>
        <script>
            toastr.success("Thêm Config Thành Công");
        </script>
    <?php endif; ?>

    <div class="row mx-0">
        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Thêm Config
                    </div>
                    <div class="card-body" id="config__home--add">
                        <?php echo Form::open(['url' => route('add_cofhome_handle'), 'method' => 'POST', 'files' => true]); ?>

                        <div class="form-group mb-5">
                            <label for="">Tên</label>
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
                        <?php if (isset($component)) { $__componentOriginal19571530086391dd0a770e0cef2481dd23608ab5 = $component; } ?>
<?php $component = App\View\Components\Admin\Form\File::resolve(['name' => 'main_img','id' => 'main_img','custom' => [
                            'plh' => 'Banner Chính',
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
                            <label for="">Link Main</label>
                            <input type="text" class="form-control" name="link_main" id=""
                                placeholder="Link Banner Chính">
                            <?php $__errorArgs = ['link_main'];
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
<?php $component = App\View\Components\Admin\Form\File::resolve(['name' => 'use_img','id' => 'use_img','custom' => [
                            'plh' => 'Banner cẩm nang sử
                                                                                                                                                                                                                                    dụng',
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
                            <label for="">Link Usage</label>
                            <input type="text" class="form-control" name="link_use" id=""
                                placeholder="Link Banner cẩm nang sử dụng">
                            <?php $__errorArgs = ['link_use'];
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
<?php $component = App\View\Components\Admin\Form\File::resolve(['name' => 'instruct_img','id' => 'instruct_img','custom' => [
                            'plh' => 'Banner phụ kiện khuyên
                                                                                                                                                                                                                                                            dùng',
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
                            <label for="">Link Hướng dẫn</label>
                            <input type="text" class="form-control" name="link_instruct" id=""
                                placeholder="Link Banner hướng dẫn tạo tài khoản ">
                            <?php $__errorArgs = ['link_instruct'];
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
<?php $component = App\View\Components\Admin\Form\File::resolve(['name' => 'access_img','id' => 'access_img','custom' => [
                            'plh' => 'Banner phụ kiện khuyên
                                                                                                                                                                                                                                                            dùng',
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
                            <label for="">Link phụ kiện</label>
                            <input type="text" class="form-control" name="link_access" id=""
                                placeholder="Link Banner phụ kiện khuyên dùng">
                            <?php $__errorArgs = ['link_access'];
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
<?php $component = App\View\Components\Admin\Form\File::resolve(['name' => 'fix_img','id' => 'fix_img','custom' => [
                            'plh' => 'Banner lỗi và cách khắc
                                                                                                                                                                                                                                                                                                                            phục',
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
                            <label for="">Link Fix</label>
                            <input type="text" class="form-control" name="link_fix" id=""
                                placeholder="Link Banner lỗi và cách khắc phục ">
                            <?php $__errorArgs = ['link_fix'];
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
                            <label for="">Color</label>
                            <input type="text" class="form-control" name="color" id=""
                                placeholder="Color">
                            <?php $__errorArgs = ['color'];
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
                        <div class="col-12 my-4 pb-4" >
                            <div class="w-100">
                                <div class="card">
                                    <div class="card-header text-center">
                                        Thêm Section
                                    </div>
                                    <div class="card-body text-center">
                                        <button type="button" id="add__section" class="btn btn-primary"><i
                                                class="fa-solid fa-plus"></i></button>
                                        <input type="hidden" name="section" value="0" id="count__section">
                                    </div>
                                </div>
                                <ul id="home__section">

                                </ul>
                            </div>
                        </div>

                        

                        <div class="form-group mb-5">
                            <input type="submit" value="THÊM" class="btn navi_btn w-100">
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card" id="c-show-home">
                    <div class="card-header text-center">
                        Danh sách config home
                    </div>
                    <div class="card-body" id="config__home--show">
                        <table class="table-bordered table-center table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Số Section</th>
                                    <th scope="col">Màu sắc</th>
                                    <th scope="col">Vị trí</th>
                                    <th scope="col">Sửa</th>
                                    <th scope="col">Xoá</th>
                                </tr>
                            </thead>
                            <tbody id='sortable__show__home'>

                                <?php $__currentLoopData = $config; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $count_section = collect($conf->sections)
                                            ->groupBy('section')
                                            ->count();

                                    ?>
                                    <tr data-id="<?php echo e($conf->id); ?>">
                                        <td><?php echo e($conf->id); ?></td>
                                        <td><?php echo e($conf->name); ?></td>
                                        <td><?php echo e($count_section); ?></td>
                                        <td>
                                            <div class="box w-100 d-flex justify-content-center"
                                                style="width:20px; height:20px; background:<?php echo e($conf->color); ?>">
                                            </div>
                                        </td>
                                        <td class="sh__pos"><?php echo e($conf->position); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('edit_cofhome_view', ['id' => $conf->id])); ?>"
                                                class="d-block">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="d-block">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
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

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/admin/dashboard/config_home.blade.php ENDPATH**/ ?>