<?php $__env->startSection('import_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('admin/plugin/tags/tagsinput.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="<?php echo e(asset('admin/app/js/products.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/category.js') ?>">
</script>
<script src="<?php echo e(asset('admin/app/js/tinymce.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/tinymce.js') ?>">
</script>
<script src="<?php echo e(asset('admin/plugin/tags/tagsinput.js')); ?>"></script>
<script src="<?php echo e(asset('admin/app/js/related_all.js')); ?>"></script>
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

<input type="hidden" name="" value="<?php echo e(route('handle_search')); ?>" id="url__handle--search">
<input type="hidden" name="" value="<?php echo e(route('handle_cat')); ?>" id="url__handle--cat">
<input type="hidden" name="" value="<?php echo e(route('handle_reload')); ?>" id="url__handle--reload">
<input type="hidden" name="" value="<?php echo e(route('handle_delete_gll')); ?>" id="url__handle--delete">
<input type="hidden" name="" id="array__selected" value="<?php echo e($selected_js_product); ?>">
<input type="hidden" name="" id="url__selected" value="<?php echo e($url); ?>">
<input type="hidden" name="" id="array__selected--blog" value="<?php echo e($selected_js_blog); ?>">
<input type="hidden" name="" id="url__handle--related" value="<?php echo e(route('handle_related_all')); ?>">
<input type="hidden" name="" id="product_id" value="<?php echo e($id); ?>">
<div id="product" class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Cập Nhật Sản Phẩm
                </div>

                <div class="card-body" id="product__add">
                    <?php echo Form::open(['url' =>route('product_handle_edit', ['id'=> $product->id]) , 'method' => "POST"
                    ,'files' => true ]); ?>

                    <div class="form-group mb-5">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="name" id="" value="<?php echo e($product->name); ?>"
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
                        <label for="">Mô tả ngắn</label>
                        <textarea class="form-control" name="des" id="" rows="4"><?php echo e($product->des); ?></textarea>
                        <?php $__errorArgs = ['des'];
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
                        <label for="">Keywords</label>
                        <input type="text" data-role="tagsinput" class="form-control" name="keywords"
                            value="<?php echo e($product->keywords); ?>">
                        <?php $__errorArgs = ['keywords'];
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
                        <label for="">Giá Sản Phẩm</label>
                        <input type="text" class="form-control" name="price" value="<?php echo e($product->price); ?>"
                            id="prd_price" placeholder="">
                        <div class="box_output mt-3">
                            <span>Bạn Đang Nhập:<strong class="output_price pl-2"><?php echo e(crf($product->price
                                    )); ?></strong></span>
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
                    <div class="form-group mb-5">
                        <label for="">Giá gốc Sản Phẩm</label>
                        <input type="text" class="form-control" name="historical_cost"
                            value="<?php echo e($product->historical_cost); ?>" id="historical_cost" placeholder="">
                        <div class="box_output mt-3">
                            <span>Bạn Đang Nhập:<strong class="output_price--cost pl-2"><?php echo e(crf($product->historical_cost)); ?></strong></span>
                        </div>
                        <?php $__errorArgs = ['historical_cost'];
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
                        <label for="">Model</label>
                        <input type="text" class="form-control" name="model" value="<?php echo e($product->model); ?>" id=""
                            placeholder="">
                        <?php $__errorArgs = ['model'];
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
                        <label for="">Option 1: Video </label>
                        <input type="text" class="form-control" name="video" value="<?php echo e($product->video); ?>" id=""
                            placeholder="Điền mã nhúng Youtube vào đây">
                        <?php $__errorArgs = ['video'];
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
                        <label for="">Thông Tin</label>
                        <textarea name="info" id="info__tiny"
                            class="form-control my-editor"><?php echo $product->info; ?></textarea>
                        <?php $__errorArgs = ['info'];
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
                        <textarea name="content" id="content__tiny"
                            class="form-control my-editor"><?php echo $product->content; ?></textarea>
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
                        <div class="custom-file">
                            <input type="file" name="main_img" class="custom-file-input" id="main_img">
                            <label class="custom-file-label" for="main_img" id="forMain">Đổi hình ảnh chính không sửa
                                đổi bỏ qua</label>
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
                            <img src="<?php echo e(asset($product->main_img)); ?>" alt="">
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <div class="custom-file">
                            <input type="file" name="sub_img" class="custom-file-input" id="sub_img">
                            <label class="custom-file-label" for="sub_img" id="forSub">Đổi hình ảnh phụ không sửa đổi bỏ
                                qua</label>
                        </div>
                        <?php $__errorArgs = ['sub_img'];
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
                        <?php if($product->sub_img != NULL): ?>
                        <div class="show_main mt-4">
                            <img src="<?php echo e(asset($product->sub_img)); ?>" alt="">
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-5">
                        <div class="custom-file">
                            <input type="file" name="bg" class="custom-file-input" id="bg_product">
                            <label class="custom-file-label" for="bg_product" id="forBg">Đổi/Thêm hình ảnh Backgroud
                                (Không đổi/thêm có bỏ qua)</label>
                        </div>
                        <?php $__errorArgs = ['bg'];
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
                        <?php if($product->bg != NULL): ?>
                        <div class="show_main mt-4">
                            <img src="<?php echo e(asset($product->bg)); ?>" alt="" width="100%" height="auto">
                        </div>
                        <?php else: ?>
                        <span>Chưa có hình ảnh background</span>
                        <?php endif; ?>

                    </div>
                    <div class="form-group mb-5">
                        <div class="custom-file">
                            <input type="file" name="gll700[]" class="custom-file-input" id="gll700" multiple>
                            <label class="custom-file-label" for="gll700" id="for700">Thêm Hình Ảnh Chi Tiết 700x700
                                (Không thêm bỏ qua)</label>
                        </div>
                        <?php $__errorArgs = ['gll700.*'];
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
                        <div class="show_gll_700 mt-4">
                            <table class="table table-borderless">
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
                                    <?php $__currentLoopData = App\Models\Products::find($product->id) -> gll() ->orderBy('index' ,
                                    'ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gl700): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($gl700 -> size == 700): ?>
                                    <tr>
                                        <th scope="row"><?php echo e($gl700 -> id); ?></th>
                                        <td>
                                            <img src="<?php echo e(asset($gl700->link)); ?>" width="200" class=" va-radius-fb "
                                                alt="">
                                        </td>
                                        <td><?php echo e(App\Models\Products::where('id', '=' , $gl700->products_id)->first() ->
                                            cat_name); ?></td>
                                        <td><?php echo e($gl700->size); ?></td>
                                        <td><?php echo e($gl700->index); ?></td>
                                        <td>
                                            <i class="fas fa-trash delete_gll" data-id="<?php echo e($gl700->id); ?>"></i>
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
                            <label class="custom-file-label" for="gll80" id="for80">Hình Ảnh Chi Tiết 80x80</label>
                        </div>
                        <?php $__errorArgs = ['gll80.*'];
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
                        <div class="show_gll_80 mt-4">
                            <table class="table table-borderless">
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
                                    <?php $__currentLoopData = App\Models\Products::find($product->id) -> gll() ->orderBy('index' ,
                                    'ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gl80): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($gl80 -> size == 80): ?>
                                    <tr>
                                        <th scope="row"><?php echo e($gl80 -> id); ?></th>
                                        <td>
                                            <img src="<?php echo e(asset($gl80->link)); ?>" class=" va-radius-fb " alt="">
                                        </td>
                                        <td><?php echo e(App\Models\Products::where('id', '=' , $gl80->products_id)->first() ->
                                            cat_name); ?></td>
                                        <td><?php echo e($gl80->size); ?></td>
                                        <td><?php echo e($gl80->index); ?></td>
                                        <td>
                                            <i class="fas fa-trash delete_gll" data-id="<?php echo e($gl80->id); ?>"></i>
                                        </td>
                                    </tr>
                                    <?php endif; ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mx-0">
                        <div class="form-group mb-5 col-6 pl-0">
                            <div class="custom-file">
                                <input type="file" name="banner" class="custom-file-input" id="banner_prd">
                                <label class="custom-file-label" for="banner_prd" id="forBannerPrd">Option 2: Banner Đi
                                    kèm</label>
                            </div>
                            <?php $__errorArgs = ['banner'];
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
                            <?php if($product->banner != null): ?>
                            <div class="show_main mt-4">
                                <img src="<?php echo e(asset($product->banner)); ?>" alt="">
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-5 col-6 pr-0">
                            <input type="text" class="form-control" name="banner_link"
                                value="<?php echo e($product->banner_link); ?>" id="" placeholder="Option 2: Link Banner">
                            <?php $__errorArgs = ['banner_link'];
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
                    </div>
                    <div class="form-group mb-5">
                        <div class="row mx-0">
                            <div class="col-4 pl-0 mb-5">
                                <label for="">Danh Mục Chính</label>
                                <select class="custom-select" name="cat" id="cat">
                                    <option value="<?php echo e($product->cat_id); ?>"><?php echo e($product->cat_name); ?></option>
                                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($cate->id != $product->cat_id): ?>
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
                            
                            <div class="col-4 mb-5">
                                <label for="">Danh Mục Phụ 1</label>
                                <select class="custom-select" name="cat_1" id="cat_1">
                                    <option value="<?php echo e($product->sub_1_cat_id); ?>"><?php echo e($product->sub_1_cat_name); ?>

                                    </option>
                                    <?php $__currentLoopData = App\Models\Category::where('parent_id' , '=' , $product->cat_id) ->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate_1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($cate_1->id != $product->sub_1_cat_id): ?>
                                    <option value="<?php echo e($cate_1->id); ?>"><?php echo e($cate_1->name); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['cat_1'];
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

                            <div class="col-4 pr-0">
                                <label for="">Danh Mục Phụ 2</label>
                                <select class="custom-select" name="cat_2" id="cat_2">
                                    <?php if($product->sub_2_cat_id != null ): ?>
                                    <option value="<?php echo e($product->sub_2_cat_id); ?>"><?php echo e($product->sub_2_cat_name); ?>

                                    </option>
                                    <?php $__currentLoopData = App\Models\Category::where('parent_id' , '=' , $product->sub_1_cat_id)
                                    ->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate_2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($cate_2->id != $product->sub_2_cat_id): ?>
                                    <option value="<?php echo e($cate_2->id); ?>"><?php echo e($cate_2->name); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <option value="0">Không có danh mục phụ 2</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            
                            <div class="col-6 mb-5 pl-0">
                                <label for="">Op sub 1</label>
                                <select class="custom-select" name="op_sub_1" id="op_sub_1">
                                    <?php if($product->op_sub_1_id != null ): ?>
                                    <option value="<?php echo e($product->op_sub_1_id); ?>"><?php echo e($product->op_sub_1_name); ?>

                                    </option>
                                    <?php $__currentLoopData = App\Models\Category::where('parent_id' , '=' , $product->cat_id)
                                    ->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ops_1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($ops_1->id != $product->op_sub_1_id): ?>
                                    <option value="<?php echo e($ops_1->id); ?>"><?php echo e($ops_1->name); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <option value="">Chọn danh mục option 1 </option>
                                    <?php $__currentLoopData = App\Models\Category::where('parent_id' , '=' , $product->cat_id)
                                    ->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ops_1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ops_1->id); ?>"><?php echo e($ops_1->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php endif; ?>
                                </select>
                                <?php $__errorArgs = ['op_sub_1'];
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

                            
                            <div class="col-6">
                                <label for="">Op sub 2</label>
                                <select class="custom-select" name="op_sub_2" id="op_sub_2">
                                    <?php if($product->op_sub_1_id != null ): ?>
                                    <option value="<?php echo e($product->op_sub_2_id); ?>"><?php echo e($product->op_sub_2_name); ?>

                                    </option>
                                    <?php $__currentLoopData = App\Models\Category::where('parent_id' , '=' , $product->op_sub_1_id)
                                    ->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ops_2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($ops_2->id != $product->op_sub_2_id): ?>
                                    <option value="<?php echo e($ops_2->id); ?>"><?php echo e($ops_2->name); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <option value="">Chọn danh mục option sub 1</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            
                            <div class="col-4 pl-0">
                                <label for="">Danh Mục Chính 2</label>
                                <select class="custom-select" name="cat_2" id="cat_2">
                                    <?php if($product->cat_2_id != 0): ?>
                                    <option value="<?php echo e($product->cat_2_id); ?>"><?php echo e(App\Models\Category::where('id', '=' ,
                                        $product->cat_2_id )->first()->name); ?> </option>
                                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate_s2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($cate_s2->id != $product->cat_2_id ): ?>
                                    <option value="<?php echo e($cate_s2->id); ?>"><?php echo e($cate_s2->name); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php else: ?>
                                    <option value="0">Chọn Danh Mục Chính Gốc 2</option>
                                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cate->id); ?>"><?php echo e($cate->name); ?></option>
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

                            <div class="col-4">
                                <label for="">Danh Mục Phụ Của DM Chính 2</label>
                                <select class="custom-select" name="cat_2_id" id="cat_2_id">
                                    <?php if($product->cat_2_sub != 0): ?>
                                    <option value="<?php echo e($product->cat_2_sub); ?>"><?php echo e(App\Models\Category::where('id', '='
                                        ,$product->cat_2_sub )->first()->name); ?> </option>
                                    <?php $__currentLoopData = App\Models\Category::where('parent_id' , '=' , $product->cat_2_id)
                                    ->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate_2_s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($cate_2_s ->id != $product->cat_2_sub ): ?>
                                    <option value="<?php echo e($cate_2_s ->id); ?>"><?php echo e($cate_2_s ->name); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <option value="0">Chưa Chọn Danh Mục Gốc 2</option>
                                    <?php endif; ?>
                                </select>
                                <?php $__errorArgs = ['cat_2_id'];
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
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <div class="row mx-0">
                            <div class="col-4 pl-0">
                                <label for="">Kho</label>
                                <select class="custom-select" name="stock">
                                    <option value="<?php echo e($product->stock); ?>"><?php echo e(stock_stt($product->stock)); ?></option>
                                    <?php $__currentLoopData = Config::get('product.stock', '1');; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($stock != $product->stock ): ?>
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
                                    <?php $__currentLoopData = Config::get('product.usage_stt', '1');; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $us): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($us != $product->usage_stt): ?>
                                    <option value="<?php echo e($us); ?>"><?php echo e(usage_stt($us)); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-4 pr-0">
                                <label for="">Highlight</label>
                                <select class="custom-select" name="highlight">
                                    <option value="<?php echo e($product->highlight); ?>"><?php echo e(highlight_stt($product->highlight)); ?>

                                        <?php $__currentLoopData = Config::get('product.highlight', '2');; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                    <option value="<?php echo e($product->producer_id); ?>"><?php echo e(App\Models\Producer::where('id', '='
                                        , $product->producer_id)->first()->name); ?></option>
                                    <?php $__currentLoopData = $producer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pdc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($pdc->id != $product->producer_id ): ?>
                                    <option value="<?php echo e($pdc->id); ?>"><?php echo e($pdc->name); ?></option>
                                    <?php endif; ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['producer'];
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
                                    <?php if($product->cat_game_id != NULL): ?>
                                    <option value="<?php echo e(App\Models\CatGame::where('name', 'LIKE' ,
                                    $product->cat_game_id)->firstOrFail()->id); ?>"><?php echo e($product->cat_game_id); ?></option>
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
                            <div class="col-4">
                                <label for="">Loại sản phẩm</label>
                                <select class="custom-select" name="type" id="type">
                                    <option
                                        value="<?php echo e(App\Models\typeProduct::where('name', '=' , $product -> type )->first()->id); ?>">
                                        <?php echo e($product->type); ?></option>
                                    <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if( $t->id != App\Models\typeProduct::where('name', '=' , $product -> type
                                    )->first()->id ): ?>
                                    <option value="<?php echo e($t->id); ?>"><?php echo e($t->name); ?></option>
                                    <?php endif; ?>
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
                            <div class="col-4">
                                <label for="">Loại Phụ</label>
                                <select class="custom-select" name="sub_type" id="sub_type">
                                    <?php if(count($sub_type)>0): ?>
                                    <?php if($product -> sub_type != null): ?>
                                    <option
                                        value="<?php echo e(App\Models\typeProduct::where('name', '=' , $product->sub_type )->first()->id); ?>">
                                        <?php echo e($product->sub_type); ?></option>
                                    <?php $__currentLoopData = $sub_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(App\Models\typeProduct::where('name', '=' , $product->sub_type )->first()->id
                                    != $st ->id): ?>
                                    <option value="<?php echo e($st ->id); ?>"><?php echo e($st ->name); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <option value="0">Chọn loại sản phẩm phụ</option>
                                    <?php $__currentLoopData = $sub_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($st ->id); ?>"><?php echo e($st ->name); ?></option>
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
                        </div>
                    </div>

                    <div class="form-group mb-5">
                        <div class="d-flex mx-0 mb-4 align-items-center">
                            <label for="" class="p-0 mb-0">Chinh sách bảo hành </label>
                            <button class="btn navi_btn ml-3" id="reload__ins"><i class="fas fa-sync-alt pr-2"></i>Làm
                                Mới</button>
                        </div>
                        <div class="row mx-0 inner-cis">
                            <?php $__currentLoopData = $ins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-4 col-3 cis_item">
                                <div class="va-checkbox d-flex align-items-center w-100">
                                    <input type="checkbox" name="ins[]" value="<?php echo e($in -> id); ?>" id="ci__<?php echo e($in -> id); ?>"
                                        class="check_ins" <?php if(in_array($in->id, explode("," , $product->insurance))): ?>
                                    checked
                                    <?php endif; ?>>
                                    <label for="ci__<?php echo e($in -> id); ?>" data-toggle="tooltip" data-placement="top"
                                        title="Giá Bảo Hành: <?php echo e(crf($in -> price)); ?> ">
                                        <?php echo e($in -> name); ?>

                                    </label>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>
                    <div class="form-group mb-5">
                        <div class="d-flex mx-0 mb-4 align-items-center">
                            <label for="" class="p-0 mb-0">Chinh sách của shop</label>
                            <button class="btn navi_btn ml-3" id="reload__plc"><i class="fas fa-sync-alt pr-2"></i>Làm
                                Mới</button>
                        </div>

                        <div class="row mx-0 inner-plc">
                            <?php $__currentLoopData = $policy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-4 col-3 plc_item">
                                <div class="va-checkbox d-flex align-items-center w-100">
                                    <input type="checkbox" name="plc[]" value="<?php echo e($plc -> id); ?>"
                                        id="plc__<?php echo e($plc -> id); ?>" class="check_plc" <?php if(in_array($plc->id, explode(","
                                    , $product->policy))): ?>
                                    checked
                                    <?php endif; ?>>
                                    <label for="plc__<?php echo e($plc -> id); ?>" data-toggle="tooltip" data-html="true"
                                        data-placement="top" title="<?php echo e($plc -> content); ?>">
                                        <?php echo e($plc -> title); ?> (Pos: <?php echo e($plc->position); ?>)
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
                                <div class="card-body">
                                    <div id="selected" class="mb-4">
                                        <h1 class="mb-3" style="font-size: 20px">Danh Sách Sản Phẩm Đã Chọn</h1>
                                        <?php if(count($array_products) > 0 ): ?>
                                        <?php $__currentLoopData = $array_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $product = App\Models\Products::where('id', $item)->first();
                                        ?>
                                        <?php if (isset($component)) { $__componentOriginalc96bcfb20412907b86b9eb08b3bd97baf8829143 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Admin\Product\Checkbox::class, ['product' => $product,'class' => 'select__product','name' => 'products','prefix' => 'product','array' => $array_products]); ?>
<?php $component->withName('admin.product.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc96bcfb20412907b86b9eb08b3bd97baf8829143)): ?>
<?php $component = $__componentOriginalc96bcfb20412907b86b9eb08b3bd97baf8829143; ?>
<?php unset($__componentOriginalc96bcfb20412907b86b9eb08b3bd97baf8829143); ?>
<?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>

                                        <span>Chưa có sản phẩm nào được chọn</span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="">Tìm Sản Phẩm</label>
                                        <input type="text" class="form-control" name="related_products"
                                            id="search__name" placeholder="Nhập tên sản phẩm">
                                        <div id="result" class="mt-4">

                                        </div>
                                    </div>
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
                                    <div id="selected_blog" class="mb-4">
                                        <h1 class="mb-3" style="font-size: 20px">Danh Sách Bài Viết Đã Chọn</h1>
                                        <?php if(count($array_blogs) > 0 ): ?>
                                        <?php $__currentLoopData = $array_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $blog = App\Models\Blogs::where('id', '=' , $item_2)->first();
                                        ?>
                                        <?php if (isset($component)) { $__componentOriginal4d16f58dbbe76fb7f58c004576a2700d6cd76429 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Admin\Blogs\Checkbox::class, ['blog' => $blog,'class' => 'select__blog','name' => 'blogs','prefix' => 'blog','array' => $array_blogs]); ?>
<?php $component->withName('admin.blogs.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4d16f58dbbe76fb7f58c004576a2700d6cd76429)): ?>
<?php $component = $__componentOriginal4d16f58dbbe76fb7f58c004576a2700d6cd76429; ?>
<?php unset($__componentOriginal4d16f58dbbe76fb7f58c004576a2700d6cd76429); ?>
<?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                        <span>Chưa có bài viết nào được chọn</span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="">Tìm Bài Viết</label>
                                        <input type="text" class="form-control" name="" id="search__name--blog"
                                            placeholder="Nhập tên bài viết">
                                        <div id="result_blog" class="mt-4"></div>
                                        <?php $__errorArgs = ['blogs'];
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\admin\products\edit.blade.php ENDPATH**/ ?>