<?php $__env->startSection('import_css'); ?>
    <link rel="stylesheet" href="<?php echo e($file->ver_img('admin/plugin/tags/tagsinput.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
    <script
        src="<?php echo e(asset('admin/app/js/products.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/products.js') ?>">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script
        src="<?php echo e($file->ver_img('admin/app/js/tinymce.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/tinymce.js') ?>">
    </script>
    <script src="<?php echo e($file->ver_img('admin/plugin/tags/tagsinput.js')); ?>"></script>
    <script src="<?php echo e($file->ver_img('admin/app/js/related_all.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e($product->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('name'); ?>
    Chỉnh sửa sản phẩm
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('ok')): ?>
        <script>
            toastr.success("Cập Nhật Sản Phẩm Thành Công");
        </script>
    <?php endif; ?>
    <input type="hidden" name="" id="product_id" value="<?php echo e($id); ?>">
    <div id="product" class="row mx-0">
        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Cập Nhật Sản Phẩm
                    </div>

                    <div class="card-body" id="product__add">
                        <?php echo Form::open([
                            'url' => route('product_handle_edit', ['id' => $product->id]),
                            'method' => 'POST',
                            'files' => true,
                        ]); ?>

                        <div class="form-group mb-5">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" id=""
                                value="<?php echo e($product->name); ?>" placeholder="">
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
                            <label for="">Mô tả ngắn</label>
                            <textarea class="form-control" name="des" id="" rows="4"><?php echo e($product->des); ?></textarea>
                            <?php $__errorArgs = ['des'];
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
                                value="<?php echo e($product->keywords); ?>">
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
                            <label for="">Giá Sản Phẩm</label>
                            <input type="text" class="form-control" name="price" value="<?php echo e($product->price); ?>"
                                id="prd_price" placeholder="">
                            <div class="box_output mt-3">
                                <span>Bạn Đang Nhập:<strong
                                        class="output_price pl-2"><?php echo e(crf($product->price)); ?></strong></span>
                            </div>
                            <?php $__errorArgs = ['price'];
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
                            <label for="">Giá gốc Sản Phẩm</label>
                            <input type="text" class="form-control" name="historical_cost"
                                value="<?php echo e($product->historical_cost); ?>" id="historical_cost" placeholder="">
                            <div class="box_output mt-3">
                                <span>Bạn Đang Nhập:<strong
                                        class="output_price--cost pl-2"><?php echo e(crf($product->historical_cost)); ?></strong></span>
                            </div>
                            <?php $__errorArgs = ['historical_cost'];
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
                            <label for="">Model</label>
                            <input type="text" class="form-control" name="model" value="<?php echo e($product->model); ?>"
                                id="" placeholder="">
                            <?php $__errorArgs = ['model'];
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
                            <label for="">Option 1: Video </label>
                            <input type="text" class="form-control" name="video" value="<?php echo e($product->video); ?>"
                                id="" placeholder="Điền mã nhúng Youtube vào đây">
                            <?php $__errorArgs = ['video'];
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
                            <label for="">Thông Tin</label>
                            <textarea name="info" id="info__tiny" class="form-control my-editor"><?php echo $product->info; ?></textarea>
                            <?php $__errorArgs = ['info'];
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
                            <label for="">Content</label>
                            <textarea name="content" id="content__tiny" class="form-control my-editor"><?php echo $product->content; ?></textarea>
                            <?php $__errorArgs = ['content'];
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
                                <label class="custom-file-label" for="main_img" id="forMain">Đổi hình ảnh chính không
                                    sửa
                                    đổi bỏ qua</label>
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
                                <img src="<?php echo e($file->ver_img($product->main_img)); ?>" alt="">
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <div class="custom-file">
                                <input type="file" name="sub_img" class="custom-file-input" id="sub_img">
                                <label class="custom-file-label" for="sub_img" id="forSub">Đổi hình ảnh phụ không sửa
                                    đổi bỏ
                                    qua</label>
                            </div>
                            <?php $__errorArgs = ['sub_img'];
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
                            <?php if($product->sub_img != null): ?>
                                <div class="show_main mt-4">
                                    <img src="<?php echo e($file->ver_img($product->sub_img)); ?>" alt="">
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-5">
                            <div class="custom-file">
                                <input type="file" name="bg" class="custom-file-input" id="bg_product">
                                <label class="custom-file-label" for="bg_product" id="forBg">Đổi/Thêm hình ảnh
                                    Backgroud
                                    (Không đổi/thêm có bỏ qua)</label>
                            </div>
                            <?php $__errorArgs = ['bg'];
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
                            <?php if($product->bg != null): ?>
                                <div class="show_main mt-4">
                                    <img src="<?php echo e($file->ver_img($product->bg)); ?>" alt="" width="100%"
                                        height="auto">
                                </div>
                            <?php else: ?>
                                <span>Chưa có hình ảnh background</span>
                            <?php endif; ?>

                        </div>
                        <div class="form-group mb-5">
                            <div class="custom-file">
                                <input type="file" name="gll700[]" class="custom-file-input" id="gll700" multiple>
                                <label class="custom-file-label" for="gll700" id="for700">Thêm Hình Ảnh Chi Tiết
                                    700x700
                                    (Không thêm bỏ qua)</label>
                            </div>
                            <?php $__errorArgs = ['gll700.*'];
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
                            <div class="show_gll_700 mt-4">
                                <table class="table-borderless table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Img</th>
                                            <th scope="col">Danh Mục</th>
                                            <th scope="col">Size</th>
                                            <th scope="col">Index</th>
                                            <th scope="col">Xoá</th>
                                        </tr>
                                    </thead>
                                    <tbody class="op_700">
                                        <?php $__currentLoopData = App\Models\Products::find($product->id)->gll()->orderBy('index', 'ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gl700): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($gl700->size == 700): ?>
                                                <tr>
                                                    <th scope="row"><?php echo e($gl700->id); ?></th>
                                                    <td>
                                                        <img src="<?php echo e($file->ver_img($gl700->link)); ?>" width="200"
                                                            class="va-radius-fb" alt="">
                                                    </td>
                                                    <td><?php echo e(App\Models\Products::where('id', '=', $gl700->products_id)->first()->cat_name); ?>

                                                    </td>
                                                    <td><?php echo e($gl700->size); ?></td>
                                                    <td><?php echo e($gl700->index); ?></td>
                                                    <td>
                                                        <i class="fas fa-trash delete_gll"
                                                            data-id="<?php echo e($gl700->id); ?>"></i>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="form-group mb-5">
                            <div class="custom-file">
                                <input type="file" name="gll80[]" class="custom-file-input" id="gll80" multiple>
                                <label class="custom-file-label" for="gll80" id="for80">Hình Ảnh Chi Tiết
                                    80x80</label>
                            </div>
                            <?php $__errorArgs = ['gll80.*'];
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
                            <div class="show_gll_80 mt-4">
                                <table class="table-borderless table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Img</th>
                                            <th scope="col">Danh Mục</th>
                                            <th scope="col">Size</th>
                                            <th scope="col">Index</th>
                                            <th scope="col">Xoá</th>
                                        </tr>
                                    </thead>
                                    <tbody class="op_80">
                                        <?php $__currentLoopData = App\Models\Products::find($product->id)->gll()->orderBy('index', 'ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gl80): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($gl80->size == 80): ?>
                                                <tr>
                                                    <th scope="row"><?php echo e($gl80->id); ?></th>
                                                    <td>
                                                        <img src="<?php echo e($file->ver_img($gl80->link)); ?>" class="va-radius-fb"
                                                            alt="">
                                                    </td>
                                                    <td><?php echo e(App\Models\Products::where('id', '=', $gl80->products_id)->first()->cat_name); ?>

                                                    </td>
                                                    <td><?php echo e($gl80->size); ?></td>
                                                    <td><?php echo e($gl80->index); ?></td>
                                                    <td>
                                                        <i class="fas fa-trash delete_gll"
                                                            data-id="<?php echo e($gl80->id); ?>"></i>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row mx-0">
                            <div class="form-group col-6 mb-5 pl-0">
                                <div class="custom-file">
                                    <input type="file" name="banner" class="custom-file-input" id="banner_prd">
                                    <label class="custom-file-label" for="banner_prd" id="forBannerPrd">Option 2: Banner
                                        Đi
                                        kèm</label>
                                </div>
                                <?php $__errorArgs = ['banner'];
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
                                <?php if($product->banner != null): ?>
                                    <div class="show_main mt-4">
                                        <img src="<?php echo e($file->ver_img($product->banner)); ?>" alt="">
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-6 mb-5 pr-0">
                                <input type="text" class="form-control" name="banner_link"
                                    value="<?php echo e($product->banner_link); ?>" id=""
                                    placeholder="Option 2: Link Banner">
                                <?php $__errorArgs = ['banner_link'];
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
                        </div>
                        <div class="form-group mb-5">
                            <div class="row mx-0">
                                <div class="accordion col-12 pl-0" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header p-0" id="headingOne">
                                            <h2 class="mb-0">
                                                <button
                                                    class="btn btn-link btn-block navi_btn d-flex justify-content-between align-items-center text-light text-left"
                                                    type="button" data-toggle="collapse" data-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    Danh Mục Sản Phẩm
                                                    <i class="fa-solid fa-angles-down"></i>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseOne"
                                            class="collapse <?php if(count($array_pc) > 0): ?> show <?php endif; ?>"
                                            aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <?php $__currentLoopData = category_child(App\Models\Category::all(), 0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate_other): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="va-checkbox d-flex align-items-center w-100"
                                                        style="margin-left: calc(<?php echo e($cate_other->level); ?> * 25px);">
                                                        <input type="checkbox" name="categories[]"
                                                            value="<?php echo e($cate_other->id); ?>"
                                                            id="category__<?php echo e($cate_other->id); ?>" class="check_ins"
                                                            <?php echo e(in_array($cate_other->id, $array_pc) ? 'checked' : ''); ?>>
                                                        <label for="category__<?php echo e($cate_other->id); ?>">
                                                            <?php echo e($cate_other->name); ?>

                                                        </label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <div class="row mx-0">
                                <div class="col-4 pl-0">
                                    <label for="">Kho</label>
                                    <select class="custom-select" name="stock">
                                        <option value="<?php echo e($product->stock); ?>"><?php echo e(stock_stt($product->stock)); ?></option>
                                        <?php $__currentLoopData = Config::get('product.stock', '1'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($stock != $product->stock): ?>
                                                <option value="<?php echo e($stock); ?>"><?php echo e(stock_stt($stock)); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="">Tình Trạng Sử Dụng</label>
                                    <select class="custom-select" name="usage_stt">
                                        <option value="<?php echo e($product->usage_stt); ?>"><?php echo e(usage_stt($product->usage_stt)); ?>

                                        </option>
                                        <?php $__currentLoopData = Config::get('product.usage_stt', '1'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $us): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($us != $product->usage_stt): ?>
                                                <option value="<?php echo e($us); ?>"><?php echo e(usage_stt($us)); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-4 pr-0">
                                    <label for="">Highlight</label>
                                    <select class="custom-select" name="highlight">
                                        <option value="<?php echo e($product->highlight); ?>">
                                            <?php echo e(highlight_stt($product->highlight)); ?>

                                            <?php $__currentLoopData = Config::get('product.highlight', '2'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($hl != $product->highlight): ?>
                                        <option value="<?php echo e($hl); ?>"><?php echo e(highlight_stt($hl)); ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-5">
                            <div class="row mx-0">
                                <div class="col-12 p-0">
                                    <label for="">Nhà Sản Xuất</label>
                                    <select class="custom-select" name="producer" id="producer">
                                        <option value="<?php echo e($product->producer_id); ?>">
                                            <?php echo e(App\Models\Producer::where('id', '=', $product->producer_id)->first()->name); ?>

                                        </option>
                                        <?php $__currentLoopData = $producer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pdc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($pdc->id != $product->producer_id): ?>
                                                <option value="<?php echo e($pdc->id); ?>"><?php echo e($pdc->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['producer'];
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
                                    <div class="form-group row mx-0 mt-4">
                                        <input type="text" id="search_pdc" class="form-control col-6"
                                            placeholder="Nhập Tên Nhà sản xuất">
                                        <div class="col-3 pr-0">
                                            <button class="btn navi_btn w-100" id="reload__pdc"><i
                                                    class="fas fa-sync-alt pr-2"></i> Làm
                                                Mới</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-5">
                            <div class="row mx-0">
                                <div class="col-4 pl-0">
                                    <label for="">Danh Mục Game</label>
                                    <select class="custom-select" name="cat_game" id="">
                                        <?php if($product->cat_game_id != null): ?>
                                            <option
                                                value="<?php echo e(App\Models\CatGame::where('name', 'LIKE', $product->cat_game_id)->firstOrFail()->id); ?>">
                                                <?php echo e($product->cat_game_id); ?></option>
                                            <?php $__currentLoopData = App\Models\CatGame::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($cg->name != $product->cat_game_id): ?>
                                                    <option value="<?php echo e($cg->id); ?>"><?php echo e($cg->name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <option value="0">Không Có</option>
                                            <?php $__currentLoopData = App\Models\CatGame::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($cg->id); ?>"><?php echo e($cg->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                    </select>
                                    <?php $__errorArgs = ['cat_game'];
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
                                <div class="col-4">
                                    <label for="">Loại sản phẩm</label>
                                    <select class="custom-select" name="type" id="type">
                                        <option
                                            value="<?php echo e(App\Models\typeProduct::where('name', '=', $product->type)->first()->id); ?>">
                                            <?php echo e($product->type); ?></option>
                                        <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($t->id != App\Models\typeProduct::where('name', '=', $product->type)->first()->id): ?>
                                                <option value="<?php echo e($t->id); ?>"><?php echo e($t->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['type'];
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
                                <div class="col-4">
                                    <label for="">Loại Phụ</label>
                                    <select class="custom-select" name="sub_type" id="sub_type">
                                        <?php if(count($sub_type) > 0): ?>
                                            <?php if($product->sub_type != null): ?>
                                                <option
                                                    value="<?php echo e(App\Models\typeProduct::where('name', '=', $product->sub_type)->first()->id); ?>">
                                                    <?php echo e($product->sub_type); ?></option>
                                                <?php $__currentLoopData = $sub_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(App\Models\typeProduct::where('name', '=', $product->sub_type)->first()->id != $st->id): ?>
                                                        <option value="<?php echo e($st->id); ?>"><?php echo e($st->name); ?>

                                                        </option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <option value="0">Chọn loại sản phẩm phụ</option>
                                                <?php $__currentLoopData = $sub_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($st->id); ?>"><?php echo e($st->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <option value="0">Không có loại phụ</option>
                                        <?php endif; ?>
                                    </select>
                                    <?php $__errorArgs = ['sub_type'];
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
                            </div>
                        </div>

                        <div class="form-group mb-5">
                            <div class="d-flex align-items-center mx-0 mb-4">
                                <label for="" class="mb-0 p-0">Chinh sách bảo hành </label>
                                <button class="btn navi_btn ml-3" id="reload__ins"><i
                                        class="fas fa-sync-alt pr-2"></i>Làm
                                    Mới</button>
                            </div>
                            <div class="row inner-cis mx-0">
                                <?php $__currentLoopData = $ins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-3 cis_item mb-4">
                                        <div class="va-checkbox d-flex align-items-center w-100">
                                            <input type="checkbox" name="ins[]" value="<?php echo e($in->id); ?>"
                                                id="ci__<?php echo e($in->id); ?>" class="check_ins"
                                                <?php if(in_array($in->id, $product_ins)): ?> checked <?php endif; ?>>
                                            <label for="ci__<?php echo e($in->id); ?>" data-toggle="tooltip"
                                                data-placement="top" title="Giá Bảo Hành: <?php echo e(crf($in->price)); ?> ">
                                                <?php echo e($in->name); ?>

                                            </label>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                        </div>
                        <div class="form-group mb-5">
                            <div class="d-flex align-items-center mx-0 mb-4">
                                <label for="" class="mb-0 p-0">Chinh sách của shop</label>
                                <button class="btn navi_btn ml-3" id="reload__plc"><i
                                        class="fas fa-sync-alt pr-2"></i>Làm
                                    Mới</button>
                            </div>

                            <div class="row inner-plc mx-0">
                                <?php $__currentLoopData = $policy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-3 plc_item mb-4">
                                        <div class="va-checkbox d-flex align-items-center w-100">
                                            <input type="checkbox" name="plc[]" value="<?php echo e($plc->id); ?>"
                                                id="plc__<?php echo e($plc->id); ?>" class="check_plc"
                                                <?php if(in_array($plc->id, $product_policies)): ?> checked <?php endif; ?>>
                                            <label for="plc__<?php echo e($plc->id); ?>" data-toggle="tooltip" data-html="true"
                                                data-placement="top" title="<?php echo e($plc->content); ?>">
                                                <?php echo e($plc->title); ?> (Pos: <?php echo e($plc->position); ?>)
                                            </label>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        

                        <div class="col-12 mt-4 p-0">
                            <div class="w-100">
                                <div class="card">
                                    <div class="card-header text-center">
                                        Chỉnh sửa Sản Phẩm Mua Kèm
                                    </div>
                                    <div class="card-body text-center">
                                        <button type="button" class="btn btn-primary btn-lg init__select"
                                            data-model="prd" relaName="product" relaId="<?php echo e($product->id); ?>">
                                           Xem và sửa liên kết
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        

                        <div class="col-12 my-4 p-0">
                            <div class="w-100">
                                <div class="card">
                                    <div class="card-header text-center">
                                        Bài viết liên quan
                                    </div>
                                    <div class="card-body">
                                        <div class="card-body text-center">
                                            <button type="button" class="btn btn-primary btn-lg init__select"
                                                data-model="blog" relaName="product" relaId="<?php echo e($product->id); ?>">
                                                Sửa liên kết bài viết
                                            </button>
                                        </div>
                                        


                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-5">
                            <input type="submit" value="Cập Nhật Sản Phẩm" class="btn navi_btn w-100">
                        </div>

                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($component)) { $__componentOriginal6bc41543ec8a7ccee9a15fa67078c4113b93e020 = $component; } ?>
<?php $component = App\View\Components\Admin\Modal\Product\Select::resolve(['btn' => 'blockPrd'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.modal.product.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Modal\Product\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6bc41543ec8a7ccee9a15fa67078c4113b93e020)): ?>
<?php $component = $__componentOriginal6bc41543ec8a7ccee9a15fa67078c4113b93e020; ?>
<?php unset($__componentOriginal6bc41543ec8a7ccee9a15fa67078c4113b93e020); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>