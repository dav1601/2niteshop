<?php
$module = session('active');
$route = Route::currentRouteName();
?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" href="<?php echo e(asset('admin/layout/navi.png')); ?>" type="image/jpg">
    <title> <?php echo $__env->yieldContent('title', '2NITE SHOP'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('plugin/reset.css')); ?>">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo e(asset('plugin/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="<?php echo e(asset('admin/app/css/app.css')); ?>?ver=<?php echo filemtime('public/admin/app/css/app.css') ?>">
    <?php echo $__env->yieldContent('import_css'); ?>
    <?php echo app('Tightenco\Ziggy\BladeRouteGenerator')->generate(); ?>
    <?php if(Auth::check()): ?>
    <script type="text/javascript">
        const user = <?php echo json_encode(Auth::user()); ?>

    </script>
    <?php endif; ?>
    <script src="<?php echo e(asset('plugin/bootstrap/js/jquery-3.5.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugin/bootstrap/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugin/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e($file->ver('admin/app/js/config.js')); ?>"></script>
    <script src="https://cdn.tiny.cloud/1/46qb89d4cz98aitjnlsvzjvtse38gjx9wq9jacc0re2v39y6/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"
        integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php echo $__env->yieldContent('import_js'); ?>
    <script
        src="<?php echo e($file->ver('admin/app/js/tinymce.js')); ?>">
    </script>
    <script src="<?php echo e(asset('admin/app/js/app.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/app.js') ?>">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <div id="wrapper">
        <div id="sidebar">
            <div class="sidebar">
                <div class="sidebar__head">
                    <div class="sidebar__head--logo d-flex align-items-center">
                        <img src="<?php echo e(asset('admin/layout/navi.png')); ?>" width="100px" class="rounded-circle" alt="">
                        <span>NAVITeam</span>
                    </div>
                    <div class="sidebar__head--info d-flex align-items-center justify-content-center my-2">
                        <?php if(Auth::user() ->avatar != NULL): ?>
                        <img src="<?php echo e(asset(Auth::user() ->avatar)); ?>" width="60" height="60" alt="">
                        <?php else: ?>
                        <img src="<?php echo e(asset('client/images/user-large.png')); ?>" width="60" height="60" alt="">
                        <?php endif; ?>
                        <div class="text">
                            <span class="d-block"><?php echo e(Auth::user() -> name); ?></span>
                            <span><?php echo e(App\Models\Role::where('id', '=' , Auth::user() -> role_id )->first() -> name); ?></span>
                        </div>
                    </div>
                </div>
                <div class="sidebar__content">
                    <h1 class="text-center mb-3 text-uppercase font-weight-bold" style="font-size: 16px">Tổng Quan</h1>
                    <div class="accordion" id="sidebar__content--accordion">
                        <ul class="sidebar__content--menu">
                            <li class="module">
                                <a class="<?php echo e($module == 'dashboard'?'module_active':''); ?>" data-toggle="collapse"
                                    data-target="#dashboard" aria-expanded="true" aria-controls="dashboard">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="left">
                                            <i class="fas fa-home"></i>
                                            <span>Dashboard</span>
                                        </div>
                                        <div class="right">
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </a>
                                <div id="dashboard" class="collapse module_drop <?php echo e($module == 'dashboard'?'show':''); ?>"
                                    data-parent="#sidebar__content--accordion">
                                    <ul class="module__drop--menu">
                                        <li class="item">
                                            <a href="<?php echo e(route('dashboard')); ?>"
                                                class="<?php echo e($route == 'dashboard'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Dashboard NAVI</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="<?php echo e(route('add_cofhome_view')); ?>"
                                                class="<?php echo e($route == 'add_cofhome_view'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Config Trang Chủ</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="<?php echo e(route('add_cofinfor_view')); ?>"
                                                class="<?php echo e($route == 'add_cofinfor_view'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Config Thông Tin</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            
                            <li class="module">
                                <a class="<?php echo e($module == 'category'?'module_active':''); ?>" data-toggle="collapse"
                                    data-target="#product" aria-expanded="true" aria-controls="product">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="left">
                                            <i class="fas fa-box"></i>
                                            <span>Sản Phẩm</span>
                                        </div>
                                        <div class="right">
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </a>
                                <div id="product"
                                    class="collapse module_drop <?php echo e($module == 'category'?'show':''); ?> <?php echo e($module == 'prd'?'show':''); ?>"
                                    data-parent="#sidebar__content--accordion">
                                    <ul class="module__drop--menu">
                                        <li class="item">
                                            <a href="<?php echo e(route('add_product_view')); ?>"
                                                class="<?php echo e($route == 'add_product_view'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Thêm Sản Phẩm</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="<?php echo e(route('show_product')); ?>"
                                                class="<?php echo e($route == 'show_product'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Danh Sách Sản Phẩm</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="#" class="<?php echo e($route == 'product_view_edit'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Chỉnh Sửa Sản Phẩm</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="<?php echo e(route('cat')); ?>"
                                                class="<?php echo e($route == 'cat'?'route_active':''); ?> <?php echo e($route == 'edit_cat'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Danh Mục Sản Phẩm</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="<?php echo e(route('prd_add_related_view')); ?>"
                                                class="<?php echo e($route == 'prd_add_related_view'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Thêm Sản Phẩm Liên Quan</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="<?php echo e(route('bundled')); ?>"
                                                class="<?php echo e($route == 'bundled'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Bundled Danh Mục</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="<?php echo e(route('prdcer')); ?>"
                                                class="<?php echo e($route == 'prdcer'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Nhà Sản Xuất</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="<?php echo e(route('game')); ?>"
                                                class="<?php echo e($route == 'game'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Danh Mục Game</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="<?php echo e(route('insurance')); ?>"
                                                class="<?php echo e($route == 'insurance'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Chính Sách Bảo Hành</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="<?php echo e(route('plc')); ?>"
                                                class="<?php echo e($route == 'plc'?'route_active':''); ?>  <?php echo e($route == 'edit_plc'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Các Chính Sách Của Shop</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            
                            <li class="module">
                                <a class="<?php echo e($module == 'users'?'module_active':''); ?> " data-toggle="collapse"
                                    data-target="#user" aria-expanded="true" aria-controls="user">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="left">
                                            <i class="fas fa-users"></i>
                                            <span>Users</span>
                                        </div>
                                        <div class="right">
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </a>
                                <div id="user" class="collapse module_drop <?php echo e($module == 'users'?'show':''); ?>"
                                    data-parent="#sidebar__content--accordion">
                                    <ul class="module__drop--menu">
                                        <li class="item">
                                            <a href="<?php echo e(route('add_user')); ?>"
                                                class="<?php echo e($route == 'add_user'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Thêm User</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="<?php echo e(route('show_user')); ?>"
                                                class="<?php echo e($route == 'show_user'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Danh Sách Người Dùng</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="<?php echo e(route('admin_profile' , ['id' => Auth::id()])); ?>"
                                                class="<?php echo e($route == 'admin_profile'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Thông Tin Tài Khoản</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="<?php echo e(route('setting_profile' , ['id' => Auth::id()])); ?>"
                                                class="<?php echo e($route == 'setting_profile'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Cài Đặt Thông Tin Tài Khoản</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            
                            <li class="module">
                                <a class="<?php echo e($module == 'orders'?'module_active':''); ?>" data-toggle="collapse"
                                    data-target="#order" aria-expanded="true" aria-controls="order">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="left">
                                            <i class="fas fa-receipt"></i>
                                            <span>Đơn Hàng</span>
                                        </div>
                                        <div class="right">
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </a>
                                <div id="order" class="collapse module_drop <?php echo e($module == 'orders'?'show':''); ?> "
                                    data-parent="#sidebar__content--accordion">
                                    <ul class="module__drop--menu">
                                        <li class="item">
                                            <a href="<?php echo e(route('show_orders')); ?>"
                                                class="<?php echo e($route == 'show_orders'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Danh Sách Đơn Hàng</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="<?php echo e(route('customers')); ?>"
                                                class="<?php echo e($route == 'customers'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Danh Sách Khách Hàng</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="<?php echo e(route('show_preOrders')); ?>"
                                                class="<?php echo e($route == 'show_preOrders'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Danh Sách Đặt Hàng Trước</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="#" class="<?php echo e($route == 'detail_order'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Chi Tiết Đơn Hàng</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="#" class="<?php echo e($route == 'update_preOrders'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Chi Tiết Đơn Đặt Hàng</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                            
                            <li class="module">
                                <a class="<?php echo e($module == 'blog'?'module_active':''); ?>" data-toggle="collapse"
                                    data-target="#blog" aria-expanded="true" aria-controls="blog">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="left">
                                            <i class="fas fa-blog"></i>
                                            <span>Bài Viết</span>
                                        </div>
                                        <div class="right">
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </a>
                                <div id="blog" class="collapse module_drop <?php echo e($module == 'blog'?'show':''); ?> "
                                    data-parent="#sidebar__content--accordion">
                                    <ul class="module__drop--menu">
                                        <li class="item">
                                            <a href="<?php echo e(route('add_blog_view')); ?>"
                                                class="<?php echo e($route == 'add_blog_view'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Thêm Bài Viết</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="<?php echo e(route('show_blogs')); ?>"
                                                class="<?php echo e($route == 'show_blogs'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Danh Sách Bài Viết</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="<?php echo e(route('category_blog')); ?>"
                                                class="<?php echo e($route == 'category_blog'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Danh Mục Bài Viết</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="<?php echo e(route('add_related_view')); ?>"
                                                class="<?php echo e($route == 'add_related_view'?'route_active':''); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Thêm Bài Viết Liên Quan</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            
                            <li class="module">
                                <a class="<?php echo e($module == 'banner'?'module_active':''); ?>" data-toggle="collapse"
                                    data-target="#banner" aria-expanded="true" aria-controls="banner">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="left">
                                            <i class="fab fa-slideshare"></i>
                                            <span>Slide Và Banner</span>
                                        </div>
                                        <div class="right">
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </a>
                                <div id="banner" class="collapse module_drop <?php echo e($module == 'banner'?'show':''); ?>"
                                    data-parent="#sidebar__content--accordion">
                                    <ul class="module__drop--menu">
                                        <li class="item">
                                            <a href="<?php echo e(route('banner_view_add')); ?>"
                                                class="<?php echo e($route == 'banner_view_add'?'route_active':''); ?> <?php echo e($route == 'banner_view_edit'?'route_active':''); ?> ">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Quản Lý Banner</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="<?php echo e(route('slide_view_add')); ?>"
                                                class="<?php echo e($route == 'slide_view_add'?'route_active':''); ?> ">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Quản Lý Slide</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            
                            <li class="module">
                                <a class="" data-toggle="collapse" data-target="#page" aria-expanded="true"
                                    aria-controls="page">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="left">
                                            <i class="fas fa-pager"></i>
                                            <span>Trang</span>
                                        </div>
                                        <div class="right">
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </a>
                                <div id="page" class="collapse module_drop <?php echo e($module == 'pages'?'show':''); ?> "
                                    data-parent="#sidebar__content--accordion">
                                    <ul class="module__drop--menu">
                                        <li class="item">
                                            <a href="<?php echo e(route('manage_pages')); ?>">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Quản Lý Trang</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="#">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                <span>Chỉnh Sửa Trang</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div id="content">
            <div class="content w-100">
                <div class="content__header">
                    <div class="content__header--left">
                        <i class="fas fa-bars" id="toggle__sidebar"></i>
                        <a href="<?php echo e(route('home')); ?>">Trang Chủ Client</a>
                    </div>
                    <div class="content__header--right dropdown">
                        <a class="avatar" id="avatar__drop" data-toggle="dropdown" aria-expanded="false">
                            <?php if(Auth::user() ->avatar != NULL): ?>
                            <img src="<?php echo e(asset(Auth::user() ->avatar)); ?>" width="60" height="60" alt="">
                            <?php else: ?>
                            <img src="<?php echo e(asset('client/images/user-large.png')); ?>" width="60" height="60" alt="">
                            <?php endif; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right drop-content" aria-labelledby="avatar__drop">
                            <a class="dropdown-item" href="<?php echo e(route('admin_profile' , ['id' => Auth::id()])); ?>"><i
                                    class="far fa-user pr-3"></i>Hồ Sơ</a>
                            <a class="dropdown-item" href="<?php echo e(route('setting_profile' , ['id' => Auth::id()])); ?>"><i
                                    class="fas fa-cog pr-3"></i>Cài Đặt</a>
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i
                                    class="fas fa-sign-out-alt pr-3"></i>Thoát</a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="content__body">
                    <h1 class="content__body--name mb-5"><?php echo $__env->yieldContent('name'); ?></h1>
                    <div class="content__body--main">
                        <input type="hidden" name="" value="<?php echo e(route('price')); ?>" id="url__ajax--price">
                        <input type="hidden" name="" value="<?php echo e($route); ?>" id="route">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php /**PATH E:\xampp\htdocs\nava\resources\views/admin/layout/app.blade.php ENDPATH**/ ?>