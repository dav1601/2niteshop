<?php $__env->startSection('import_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
<script
    src="<?php echo e(asset('admin/app/js/dashboard.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/dashboard.js') ?>">
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
                    <?php echo Form::open(['url' => route('edit_cofhome_handle' , ['id' => $config->id]) , 'method' => "POST"
                    ,'files' => true ]); ?>

                    <div class="form-group mb-5">
                        <label for="">Tên</label>
                        <input type="text" class="form-control" name="name" id="" value="<?php echo e($config->name); ?>"
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
                        <div class="custom-file">
                            <input type="file" name="main_img" class="custom-file-input" id="main_img">
                            <label class="custom-file-label" for="main_img" id="forMain">Không sửa đổi để trống</label>
                        </div>
                        <?php $__errorArgs = ['main_img'];
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
                        <div class="show_main mt-4">
                            <img src="<?php echo e(asset($config->main_img)); ?>" alt="">
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Link Main</label>
                        <input type="text" class="form-control" name="link_main" id="" value="<?php echo e($config->main_link); ?>"
                            placeholder="Link Banner Chính">
                        <?php $__errorArgs = ['link_main'];
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
                            <input type="file" name="use_img" class="custom-file-input" id="use_img">
                            <label class="custom-file-label" for="use_img" id="forUse">Banner cẩm nang sử dụng (Không
                                sửa đổi để trống)</label>
                        </div>
                        <?php $__errorArgs = ['use_img'];
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
                        <div class="show_main mt-4">
                            <img src="<?php echo e(asset($config->use_img)); ?>" alt="">
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Link Usage</label>
                        <input type="text" class="form-control" name="link_use" id="" value="<?php echo e($config->use_link); ?>"
                            placeholder="Link Banner cẩm nang sử dụng">
                        <?php $__errorArgs = ['link_use'];
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
                            <input type="file" name="instruct_img" class="custom-file-input" id="instruct_img">
                            <label class="custom-file-label" for="instruct_img" id="forinstruct">Banner hướng dẫn tạo
                                tài khoản (Khong cap nhat bo qua)</label>
                        </div>
                        <?php $__errorArgs = ['instruct_img'];
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
                        <div class="show_main mt-4">
                            <img src="<?php echo e(asset($config->instruct_img)); ?>" alt="">
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
                            <input type="file" name="access_img" class="custom-file-input" id="access_img">
                            <label class="custom-file-label" for="access_img" id="foraccess">Banner phụ kiện khuyên
                                dùng</label>
                        </div>
                        <?php $__errorArgs = ['access_img'];
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
                        <div class="show_main mt-4">
                            <img src="<?php echo e(asset($config->access_img)); ?>" alt="">
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
                            <input type="file" name="fix_img" class="custom-file-input" id="fix_img">
                            <label class="custom-file-label" for="fix_img" id="forfix">Banner lỗi và cách khắc
                                phục</label>
                        </div>
                        <?php $__errorArgs = ['fix_img'];
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
                        <div class="show_main mt-4">
                            <img src="<?php echo e(asset($config->fix_img)); ?>" alt="">
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Link Fix</label>
                        <input type="text" class="form-control" name="link_fix" id="" value="<?php echo e($config->fix_link); ?>"
                            placeholder="Link Banner lỗi và cách khắc phục ">
                        <?php $__errorArgs = ['link_fix'];
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
                        <label for="">Danh Mục Chính</label>
                        <select class="custom-select" name="cat" id="cat">
                            <option value="<?php echo e($config->cat); ?>"><?php echo e(App\Models\Category::where('id', '=' ,
                                $config->cat)->first()->name); ?></option>
                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($cate->id != $config->cat): ?>
                            <option value="<?php echo e($cate->id); ?>"><?php echo e($cate->name); ?></option>
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
                        <label for="">Danh Mục Chính 2 </label>
                        <select class="custom-select" name="cat_2" id="cat_2">
                            <?php if($config->cat_2 != NULL): ?>
                            <option value="<?php echo e($config->cat_2); ?>"><?php echo e(App\Models\Category::where('id', '=' ,
                                $config->cat_2)->first()->name); ?></option>
                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($cate->id != $config->cat_2): ?>
                            <option value="<?php echo e($cate->id); ?>"><?php echo e($cate->name); ?></option>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <option value="">Chọn Danh Mục Chính 2</option>
                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cate->id); ?>"><?php echo e($cate->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

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
                        <label for="">Phụ Kiện Đi Kèm</label>
                        <?php if(count($access) > 0): ?>
                        <div class="row mx-0">
                            <?php $__currentLoopData = $access; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $as): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-4 col-3 acs_item">
                                <div class="va-checkbox d-flex align-items-center w-100">
                                    <input type="checkbox" name="access[]" value="<?php echo e($as->id); ?>" id="acs__<?php echo e($as->id); ?>"
                                        class="check_acs" <?php if(in_array($as->id, explode(",",$config->option))): ?> checked
                                    <?php endif; ?> >
                                    <label for="acs__<?php echo e($as->id); ?>">
                                        <?php echo e($as->name); ?>

                                    </label>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php else: ?>
                        <div class="box_access row mx-0">
                            <span>Không có phụ kiện nào thuộc danh mục 1.....</span>
                        </div>
                        <?php endif; ?>

                    </div>
                    <div class="form-group mb-5">
                        <label for="">Color</label>
                        <input type="text" class="form-control" name="color" value="<?php echo e($config->color); ?>" id=""
                            placeholder="Color">
                        <?php $__errorArgs = ['color'];
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
                        <label for="">Tab danh mục</label>
                        <select class="custom-select" name="tab" id="">
                            <option value="<?php echo e($config->tab); ?>"><?php echo e($config->tab); ?></option>
                            <?php $__currentLoopData = Config::get('navi.tab'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if( $config->tab != $tab): ?>
                            <option value="<?php echo e($tab); ?>"><?php echo e($tab); ?></option>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Vị trí</label>
                        <select class="custom-select" name="position" id="">
                            <option value="<?php echo e($config->position); ?>"><?php echo e($config->position); ?></option>
                            <?php $__currentLoopData = Config::get('navi.position_home'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($config->position != $pos): ?>
                            <option value="<?php echo e($pos); ?>"><?php echo e($pos); ?></option>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Danh Mục Digital</label>
                        <select class="custom-select" name="cat_digital" id="">
                            <?php if($config->cat_digital == NULL): ?>
                            <option value="0">Chọn Danh Mục</option>
                            <?php $__currentLoopData = App\Models\Category::OneCatTree(141)[0]->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat_digital): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat_digital->id); ?>"><?php echo e($cat_digital->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <option value="<?php echo e($config->cat_digital); ?>"><?php echo e(App\Models\Category::where('id', '=' ,
                                $config->cat_digital)->first()->name); ?></option>
                            <?php $__currentLoopData = App\Models\Category::OneCatTree(141)[0]->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat_digital): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($cat_digital->id != $config->cat_digital): ?>
                            <option value="<?php echo e($cat_digital->id); ?>"><?php echo e($cat_digital->name); ?></option>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <option value="0">Trống</option>
                            <?php endif; ?>

                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="Cập nhật Config Home" class="btn navi_btn w-100">
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
    

    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\admin\dashboard\config_home_edit.blade.php ENDPATH**/ ?>