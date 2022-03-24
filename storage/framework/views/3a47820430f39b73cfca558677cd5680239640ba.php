<?php $__env->startSection('import_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('admin/plugin/tags/tagsinput.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
<script src="<?php echo e(asset('admin/app/js/category.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/category.js') ?>">
</script>
<script src="<?php echo e(asset('admin/app/js/related_all.js')); ?>"></script>
<script src="<?php echo e(asset('admin/plugin/tags/tagsinput.js')); ?>">
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('name'); ?>
Cập Nhật Danh Mục
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<input type="hidden" name="" id="url__selected" value="<?php echo e($url); ?>">
<input type="hidden" name="" id="array__selected--blog" value="<?php echo e($selected_js_blog); ?>">
<input type="hidden" name="" id="url__handle--related" value="<?php echo e(route('handle_related_all')); ?>">
<input type="hidden" name="" id="product_id" value="<?php echo e($id); ?>">
<div id="cat__add--product">
    <div class="row mx-0">
        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Cập Nhật Danh Mục</h2>
                    </div>
                    <?php if(session('update')): ?>
                    <script>
                        toastr.success("Cập Nhật Danh Mục Thành Công");
                    </script>
                    <?php endif; ?>
                    <?php if(session('error')): ?>
                    <script>
                        toastr.error("Bạn Chỉ Được Cập Nhật Icon Cho Danh Mục Chính");
                    </script>
                    <?php endif; ?>
                    <div class="card-body">
                        <?php echo Form::open(['url' => route('handle_edit_cat') , 'method' => "POST" ,'files' => true ]); ?>

                        <input type="hidden" name="id" value="<?php echo e($id); ?>">
                        <div class="form-group mb-5">
                            <label for="">Tên Danh Mục</label>
                            <input type="text" class="form-control" name="name" id="" value="<?php echo e($cat -> name); ?>"
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
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="title" id="" placeholder="Title Danh Mục"
                                value="<?php echo e($cat->title); ?>">
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
                            <input type="text" class="form-control" name="slug" value="<?php echo e($cat -> slug); ?>" id=""
                                placeholder="">
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
                                placeholder="Description danh mục" rows="4"><?php echo e($cat->desc); ?></textarea>
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
                            <input type="text" data-role="tagsinput" class="form-control" name="keywords"
                                value="<?php echo e($cat->keywords); ?>">
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
                                <?php if($cat -> parent_id == 0 ): ?>
                                <option value="0">Là Danh Mục Chính (Không Được Chỉnh Sửa Lại Danh Mục Khác Chỉ có thể
                                    XOÁ)</option>
                                <?php else: ?>
                                <option value="<?php echo e($cat -> parent_id); ?>"><?php echo e(App\Models\Category::where('id','=' , $cat ->
                                    parent_id) -> first() -> name); ?></option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($cate -> id != $cat -> parent_id ): ?>
                                <option value="<?php echo e($cate->id); ?>"><?php echo e(str_repeat('--' , $cate->level)); ?> <?php echo e($cate->name); ?>

                                </option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>


                            </select>
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Banner</label>
                            <div class="custom-file">
                                <input type="file" name="img" class="custom-file-input" id="img">
                                <label class="custom-file-label" for="img" id="forImg">Cập Nhật Hình Ảnh (Không update
                                    bỏ trống)</label>
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
                            <div class="mt-4">
                                <?php if(empty($cat -> img)): ?>
                                <span>Chưa Có Hình Ảnh Banner Hoặc Không Có Hình Ảnh Banner</span>
                                <?php else: ?>
                                <img src="<?php echo e(asset($cat->img)); ?>" class="w-100 va-radius-fb" alt="">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Icon</label>
                            <div class="custom-file">
                                <input type="file" name="icon" class="custom-file-input" id="icon">
                                <label class="custom-file-label" for="icon" id="forIcon">Cập Nhật Icon (Không update bỏ
                                    trống)</label>
                            </div>
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
                            <div class="mt-4">
                                <?php if(empty($cat -> icon)): ?>
                                <span>Chưa Có Hình Ảnh Icon Hoặc Không Có Hình Ảnh Icon</span>
                                <?php else: ?>
                                <img src="<?php echo e(asset($cat->icon)); ?>" class="va-radius-fb" alt="">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Galley Banner (Chỉ Dành Cho Digital)</label>
                            <div class="custom-file">
                                <input type="file" name="gll" class="custom-file-input" id="gll" multiple>
                                <label class="custom-file-label" for="gll" id="forGll"></label>
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
                                <?php if($bundled_skin): ?>
                                <option value="<?php echo e($bundled_skin->skin_cat_id); ?>"><?php echo e(App\Models\Category::where('id', '='
                                    , $bundled_skin->skin_cat_id)->first()->name); ?></option>
                                <option value="">Trống</option>
                                <?php $__currentLoopData = category_child(App\Models\Category::all() , 0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($category->id != $bundled_skin->skin_cat_id): ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e(str_repeat("--", $category->level)); ?><?php echo e($category->name); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <option value="">Chọn Danh Mục Skin Đi Kèm</option>
                                <?php $__currentLoopData = category_child(App\Models\Category::all() , 0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e(str_repeat("--", $category->level)); ?><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        

                        <div class="col-12 mt-4 p-0">
                            <div class="w-100">
                                <div class="card">
                                    <div class="card-header text-center">
                                        Chỉnh sửa Phụ Kiện Mua Kèm
                                    </div>
                                    <div class="card-body">
                                        <div id="selected" class="mb-4">
                                            <h1 class="mb-3" style="font-size: 20px">Danh Sách Phụ Kiện Đã Chọn</h1>
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
                        

                        <div class="col-12 mt-4 p-0">
                            <div class="w-100">
                                <div class="card">
                                    <div class="card-header text-center">
                                        Chỉnh sửa bài viết liên quan
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
                                            <div class="alert alert-danger mt-4 alert-dismissible fade show"
                                                role="alert">
                                                <?php echo e($message); ?>

                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
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
                            <input type="submit" value="Cập Nhật Danh Mục" class="btn w-100 text-center navi_btn">
                        </div>
                        <div class="form-group mb-5">
                            <a href="<?php echo e(route('cat')); ?>" class="btn w-100 d-none text-center navi_btn">Quay Về Danh Mục
                                Sản Phẩm</a>
                        </div>
                        <?php echo Form::close(); ?>



                    </div>
                </div>
            </div>
        </div>
        


        
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\admin\products\category\prd\edit.blade.php ENDPATH**/ ?>