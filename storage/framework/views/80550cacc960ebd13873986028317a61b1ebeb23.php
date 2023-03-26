<?php $__env->startSection('import_css'); ?>
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
    <script
        src="<?php echo e(asset('admin/app/js/dashboard.js')); ?>?ver=<?php echo filemtime('admin/app/js/dashboard.js') ?>">
    </script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="<?php echo e($file->ver('admin/app/js/show_home.js')); ?>"></script>
    <script>
        var showId = <?php echo e(Js::from($id)); ?>;
        var section = [];
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('name'); ?>
    Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('ok')): ?>
        <script>
            toastr.success("Cập nhật Config Thành Công");
        </script>
    <?php endif; ?>

    <div class="row mx-0">
        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Update Config Home
                    </div>
                    <div class="card-body" id="config__home--add">
                        <?php echo Form::open([
                            'url' => route('edit_cofhome_handle', ['id' => $config->id]),
                            'method' => 'POST',
                            'files' => true,
                        ]); ?>

                        <div class="d-flex justify-content-end align-items-center mb-4">
                            <input type="checkbox" name="active" value="1"
                                <?php if($config->active == 1): ?> checked <?php endif; ?> class="toggle-active"
                                data-id=<?php echo e($config->id); ?> data-toggle="toggle" data-width="100">
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Tên</label>
                            <input type="text" class="form-control" name="name" id=""
                                value="<?php echo e($config->name); ?>" placeholder="">
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
                            <div class="custom-file">
                                <input type="file" name="main_img" class="custom-file-input" id="main_img">
                                <label class="custom-file-label" for="main_img" id="forMain">Không sửa đổi để
                                    trống</label>
                            </div>
                            <?php $__errorArgs = ['main_img'];
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
                            <div class="show_main mt-4">
                                <img src="<?php echo e($file->ver_img($config->main_img)); ?>" alt="">
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Link Main</label>
                            <input type="text" class="form-control" name="link_main" id=""
                                value="<?php echo e($config->main_link); ?>" placeholder="Link Banner Chính">
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
                        <div class="form-group mb-5">
                            <div class="custom-file">
                                <input type="file" name="use_img" class="custom-file-input" id="use_img">
                                <label class="custom-file-label" for="use_img" id="forUse">Banner cẩm nang sử dụng
                                    (Không
                                    sửa đổi để trống)</label>
                            </div>
                            <?php $__errorArgs = ['use_img'];
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
                            <div class="show_main mt-4">
                                <img src="<?php echo e($file->ver_img($config->use_img)); ?>" alt="">
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Link Usage</label>
                            <input type="text" class="form-control" name="link_use" id=""
                                value="<?php echo e($config->use_link); ?>" placeholder="Link Banner cẩm nang sử dụng">
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
                        <div class="form-group mb-5">
                            <div class="custom-file">
                                <input type="file" name="instruct_img" class="custom-file-input" id="instruct_img">
                                <label class="custom-file-label" for="instruct_img" id="forinstruct">Banner hướng dẫn tạo
                                    tài khoản (Khong cap nhat bo qua)</label>
                            </div>
                            <?php $__errorArgs = ['instruct_img'];
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
                            <div class="show_main mt-4">
                                <img src="<?php echo e($file->ver_img($config->instruct_img)); ?>" alt="">
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Link Hướng dẫn</label>
                            <input type="text" class="form-control" name="link_instruct" id=""
                                value="<?php echo e($config->instruct_link); ?>" placeholder="Link Banner hướng dẫn tạo tài khoản ">
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
                        <div class="form-group mb-5">
                            <div class="custom-file">
                                <input type="file" name="access_img" class="custom-file-input" id="access_img">
                                <label class="custom-file-label" for="access_img" id="foraccess">Banner phụ kiện khuyên
                                    dùng</label>
                            </div>
                            <?php $__errorArgs = ['access_img'];
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
                            <div class="show_main mt-4">
                                <img src="<?php echo e($file->ver_img($config->access_img)); ?>" alt="">
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Link phụ kiện</label>
                            <input type="text" class="form-control" name="link_access" id=""
                                value="<?php echo e($config->access_link); ?>" placeholder="Link Banner phụ kiện khuyên dùng">
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
                        <div class="form-group mb-5">
                            <div class="custom-file">
                                <input type="file" name="fix_img" class="custom-file-input" id="fix_img">
                                <label class="custom-file-label" for="fix_img" id="forfix">Banner lỗi và cách khắc
                                    phục</label>
                            </div>
                            <?php $__errorArgs = ['fix_img'];
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
                            <div class="show_main mt-4">
                                <img src="<?php echo e($file->ver_img($config->fix_img)); ?>" alt="">
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Link Fix</label>
                            <input type="text" class="form-control" name="link_fix" id=""
                                value="<?php echo e($config->fix_link); ?>" placeholder="Link Banner lỗi và cách khắc phục ">
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
                            <input type="text" class="form-control" name="color" value="<?php echo e($config->color); ?>"
                                id="" placeholder="Color">
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
                        <div class="col-12 my-4 p-0">
                            <div class="w-100">
                                <div class="card">
                                    <div class="card-header text-center">
                                        Thêm Section
                                    </div>
                                    <div class="card-body text-center">
                                        <button type="button" id="add__section" class="btn btn-primary"><i
                                                class="fa-solid fa-plus"></i></button>
                                        <input type="hidden" name="section" value="" id="count__section">
                                    </div>
                                </div>
                                <div id="home__section">

                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-4 p-0">
                            <div class="w-100">
                                <div class="card">
                                    <div class="card-header text-center">
                                        Danh mục digital
                                    </div>
                                    <div class="card-body">
                                        <?php
                                            $cat_digital = explode(',', $config->cat_digital);
                                        ?>
                                        <?php if (isset($component)) { $__componentOriginal14ccd556195a083e2011d1951fb32f245d8802c5 = $component; } ?>
<?php $component = App\View\Components\Admin\Product\Categories::resolve(['name' => 'category__digital[]','class' => 'category__digital','id' => 'category__digital','idard' => 'digital','selected' => $cat_digital] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.product.categories'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Product\Categories::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal14ccd556195a083e2011d1951fb32f245d8802c5)): ?>
<?php $component = $__componentOriginal14ccd556195a083e2011d1951fb32f245d8802c5; ?>
<?php unset($__componentOriginal14ccd556195a083e2011d1951fb32f245d8802c5); ?>
<?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-5">
                            <input type="submit" value="CẬP NHẬT" class="btn navi_btn w-100">
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
        

        
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/admin/dashboard/config_home_edit.blade.php ENDPATH**/ ?>