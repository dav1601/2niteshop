<?php $__env->startSection('import_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('admin/plugin/tags/tagsinput.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="<?php echo e(asset('admin/app/js/category.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/category.js') ?>">
</script>
<script src="<?php echo e(asset('admin/app/js/related_all.js')); ?>"></script>
<script src="<?php echo e(asset('admin/plugin/tags/tagsinput.js')); ?>">
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('name'); ?>
Danh Mục Sản Phẩm
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<input type="hidden" name="" id="array__selected" value="<?php echo e($selected); ?>">
<input type="hidden" name="" id="url__selected" value="<?php echo e($url); ?>">
<input type="hidden" name="" id="array__selected--blog" value="<?php echo e($selected_blog); ?>">
<input type="hidden" name="" id="url__handle--related" value="<?php echo e(route('handle_related_all')); ?>">
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
                         $(function () {
                         $(document).scrollTop($('.offset_cat').offset().top);
                        // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
                        });
                    </script>
                    <?php endif; ?>
                    <div class="card-body">
                        <?php echo Form::open(['url' => route('handle_add_cat') , 'method' => "POST" ,'files' => true ]); ?>

                        <div class="form-group mb-5">
                            <label for="">Tên Danh Mục</label>
                            <input type="text" class="form-control" name="name" id=""
                                placeholder="Tên Danh Mục (!Duy Nhất)" value="<?php echo e(old('name')); ?>">
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
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="title" id=""
                                placeholder="Title Danh Mục" value="<?php echo e(old('title')); ?>">
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
                            <label for="">Slug</label>
                            <input type="text" class="form-control" name="slug" id="" placeholder="Slug (!Duy Nhất)"
                                value="<?php echo e(old('slug')); ?>">
                            <?php $__errorArgs = ['slug'];
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
                            <label for="">Description</label>
                            <textarea type="text" class="form-control" name="desc" id=""
                                placeholder="Description danh mục"><?php echo e(old('desc')); ?></textarea>
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
                            <label for="">Keywords</label>
                            <input type="text" data-role="tagsinput" class="form-control" name="keywords" value="">
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
                        
                        <div class="form-group mb-4">
                            <label for="">Danh Mục Cha</label>
                            <select class="custom-select" name="parent" id="">
                                <option value="0">Là Danh Mục Chính</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cat->id); ?>"><?php echo e(str_repeat('--' , $cat->level)); ?> <?php echo e($cat->name); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        
                        <div class="form-group mb-5">
                            <label for="">Banner</label>
                            <div class="custom-file">
                                <input type="file" name="img" class="custom-file-input" id="img">
                                <label class="custom-file-label" for="img" id="forImg">Banner Danh Mục</label>
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
                            <label for="">Icon</label>
                            <div class="custom-file">
                                <input type="file" name="icon" class="custom-file-input" id="icon"
                                    aria-describedby="emailHelp">
                                <label class="custom-file-label" for="icon" id="forIcon">Icon Danh Mục (!Chỉ dành cho
                                    danh mục CHÍNH)</label>
                            </div>
                            <small id="emailHelp" class="form-text text-muted mt-3" style="font-size: 16px">Lưu Ý: Bạn
                                Chỉ Được Thêm Icon Cho Danh Mục
                                Chính</small>
                            <?php $__errorArgs = ['icon'];
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
                            <label for="">Galley Banner (!Chỉ Dành Cho Digital)</label>
                            <div class="custom-file">
                                <input type="file" name="gll[]" class="custom-file-input" id="gll" multiple>
                                <label class="custom-file-label" for="gll" id="forGll">Galley Banner (!Chỉ Dành Cho
                                    Digital)</label>
                            </div>
                            <?php $__errorArgs = ['gll'];
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
                            <label for="">Danh mục Skin đi kèm</label>
                            <select class="custom-select" name="bundled_skin" id="bundled_skin">
                                <option value="">Chọn Danh Mục Skin Đi Kèm</option>
                                <?php $__currentLoopData = category_child(App\Models\Category::all() , 0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e(str_repeat("--", $category->level)); ?><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        
                        
                        <div class="col-12 my-4 p-0">
                            <div class="w-100">
                                <div class="card">
                                    <div class="card-header text-center">
                                        Phụ kiện mua kèm
                                    </div>
                                    <div class="card-body">
                                        <div id="selected" class="mb-4">
                                            <h1 class="mb-3" style="font-size: 20px">Danh Sách Phụ Kiện Đã Chọn</h1>
                                            <?php if($selected != ""): ?>
                                            <?php $__currentLoopData = explode("," , $selected); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                            $product = App\Models\Products::where('id', '=' ,$id)->first();
                                            $array = explode("," , $selected);
                                            ?>
                                            <?php if (isset($component)) { $__componentOriginalc96bcfb20412907b86b9eb08b3bd97baf8829143 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Admin\Product\Checkbox::class, ['product' => $product,'class' => 'select__product','name' => 'products','prefix' => 'product','array' => $array]); ?>
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
                                            <span>Chưa có phụ kiệnk nào được chọn</span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="">Tìm Phụ Kiện</label>
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
                                        <?php if($selected_blog != ""): ?>
                                        <?php $__currentLoopData = explode("," , $selected_blog); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $blog = App\Models\Blogs::where('id', '=' , $id_blog)->first();
                                        $array = explode("," , $selected_blog);
                                        ?>
                                        <?php if (isset($component)) { $__componentOriginal4d16f58dbbe76fb7f58c004576a2700d6cd76429 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Admin\Blogs\Checkbox::class, ['blog' => $blog,'class' => 'select__blog','name' => 'blogs','prefix' => 'blog','array' => $array]); ?>
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
                            <input type="submit" value="Thêm Danh Mục" class="btn w-100 text-center navi_btn">
                        </div>

                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-12 mt-4 ">
            <div class="w-100">
                <div class="card --main">
                    <div class="card-header text-center">
                        <h2>Danh Sách Danh Mục</h2>
                    </div>
                    <div class="card-body" id="cat__show--product">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Hình Ảnh</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Sửa</th>
                                    <th scope="col">Xoá</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($cate->id); ?></td>
                                    <td class="lv-<?php echo e($cate->level); ?>"><?php echo e(str_repeat('------' , $cate->level)); ?> <?php echo e($cate->name); ?></td>
                                    <td class="lv-<?php echo e($cate->level); ?>"><?php echo e($cate->slug); ?></td>
                                    <td>
                                        <?php if(empty($cate->img)): ?>
                                        <img src="<?php echo e(asset('admin/layout/no.png')); ?>" width="250" height="100"
                                            class="va-radius-fb" alt="">
                                        <?php else: ?>
                                        <img src="<?php echo e(asset($cate->img)); ?>" width="400" height="100" class="va-radius-fb"
                                            alt="">
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(empty($cate->icon)): ?>
                                        <img src="<?php echo e(asset('admin/layout/no.png')); ?>" width="60" height="60"
                                            class="va-radius-fb" alt="">
                                        <?php else: ?>
                                        <img src="<?php echo e(asset($cate->icon)); ?>" class="va-radius-fb" alt="">
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('edit_cat', ['id'=>$cate->id])); ?>">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a data-url="<?php echo e(route('handle_delete_cat', ['id'=>$cate->id])); ?>"
                                            class="delete_cat">
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
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\admin\products\category\prd\index.blade.php ENDPATH**/ ?>