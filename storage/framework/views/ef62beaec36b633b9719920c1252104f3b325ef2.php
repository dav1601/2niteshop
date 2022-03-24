<?php
$name = Route::currentRouteName();
?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="fb:admins" content="100007446334009" />
    <meta property="fb:app_id" content="349901006628885" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="shortcut icon" href="<?php echo e($file->ver_img('client/images/email-logo.png')); ?>" type="image/x-icon">
    <title><?php echo $__env->yieldContent('title' , config('2niteseo.meta.defaults.title')); ?></title>
    <link rel="canonical" href="<?php echo e(URL::current()); ?>">
    <meta name='description' itemprop='description' content='<?php echo $__env->yieldContent(' meta-desc' ,
        config('2niteseo.meta.defaults.description')); ?>' />
    <meta name='keywords' content='<?php echo $__env->yieldContent(' meta-keyword' , config('2niteseo.meta.defaults.keywords')); ?>' />
    <meta property="og:description" content="<?php echo $__env->yieldContent('og-desc' , config('2niteseo.meta.defaults.description')); ?>" />
    <meta property="og:title" content="<?php echo $__env->yieldContent('og-title' , config('2niteseo.meta.defaults.title')); ?>" />
    <meta property="og:image" content="<?php echo $__env->yieldContent('og-image' , $file->ver_img('client/images/banner_2nite.png')); ?>" />
    <meta property="og:site_name" content="<?php echo $__env->yieldContent('site_name' , config('2niteseo.meta.defaults.title')); ?>" />
    <meta property="og:type" content="<?php echo $__env->yieldContent('og-type' , " website"); ?>" />
    <meta property="og:url" content="<?php echo e(Url::current()); ?>" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="<?php echo $__env->yieldContent('twitter-title' , config('2niteseo.meta.defaults.title')); ?>" />
    
    <link rel="stylesheet" href="<?php echo e($file->ver('plugin/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e($file->ver('plugin/reset.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo e($file->import_css('app.css')); ?>">
    <?php echo $__env->yieldContent('import_css'); ?>
    
    <script src="<?php echo e($file->ver('plugin/bootstrap/js/jquery-3.5.1.min.js')); ?>"></script>
    <script src="<?php echo e($file->ver('plugin/bootstrap/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e($file->ver('plugin/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e($file->import_js('helper.js')); ?>"></script>
    <?php echo $__env->yieldContent('import_js'); ?>
    <?php echo app('Tightenco\Ziggy\BladeRouteGenerator')->generate(); ?>
    <script src="<?php echo e($file->import_js('app.js')); ?>">
    </script>
    <script src="<?php echo e($file->ver('client/owl/dist/owl.carousel.min.js')); ?>">
    </script>
    <script src="<?php echo e($file->ver('client/ls/dist/js/lightslider.min.js')); ?>">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/620a40269bd1f31184dc8432/1frs0l6ee';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SB7F2KSJJL"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-SB7F2KSJJL');
    </script>
    
    <div id="bg-loading"></div>
    <div id="bg-menu" class="d-none"></div>
    <?php if (isset($component)) { $__componentOriginal3f5a3a73d718448c7da3c3cd79ebdd9b2a177a13 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Mobile\Menu::class, []); ?>
<?php $component->withName('mobile.menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3f5a3a73d718448c7da3c3cd79ebdd9b2a177a13)): ?>
<?php $component = $__componentOriginal3f5a3a73d718448c7da3c3cd79ebdd9b2a177a13; ?>
<?php unset($__componentOriginal3f5a3a73d718448c7da3c3cd79ebdd9b2a177a13); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalaa66bbdc7eb09ced21adc881e2736a8f7e187b48 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Mobile\Cart\Wp::class, []); ?>
<?php $component->withName('mobile.cart.wp'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaa66bbdc7eb09ced21adc881e2736a8f7e187b48)): ?>
<?php $component = $__componentOriginalaa66bbdc7eb09ced21adc881e2736a8f7e187b48; ?>
<?php unset($__componentOriginalaa66bbdc7eb09ced21adc881e2736a8f7e187b48); ?>
<?php endif; ?>
    <div id="loading">
        <img src="<?php echo e($file->ver_img('client/images/loading.gif')); ?>" alt="Loading........." width="60">
    </div>
    <?php if(Gate::allows('group-admin')): ?>
    <?php if (isset($component)) { $__componentOriginal16922a32012e445d83def1b667bd8c380818a472 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Admin\Navbar::class, []); ?>
<?php $component->withName('admin.navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16922a32012e445d83def1b667bd8c380818a472)): ?>
<?php $component = $__componentOriginal16922a32012e445d83def1b667bd8c380818a472; ?>
<?php unset($__componentOriginal16922a32012e445d83def1b667bd8c380818a472); ?>
<?php endif; ?>
    <?php endif; ?>
    <div id="b1ad">
        <div id="b1ad__header">
            <?php if (isset($component)) { $__componentOriginald225beedaa4fae9e46f48a7dbd9f19c6baec6892 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Header\Top::class, []); ?>
<?php $component->withName('header.top'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald225beedaa4fae9e46f48a7dbd9f19c6baec6892)): ?>
<?php $component = $__componentOriginald225beedaa4fae9e46f48a7dbd9f19c6baec6892; ?>
<?php unset($__componentOriginald225beedaa4fae9e46f48a7dbd9f19c6baec6892); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal9342f2fe4d62d9eeebeb40bf7a9eab037912aff3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Header\Mobile\Def::class, []); ?>
<?php $component->withName('header.mobile.def'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9342f2fe4d62d9eeebeb40bf7a9eab037912aff3)): ?>
<?php $component = $__componentOriginal9342f2fe4d62d9eeebeb40bf7a9eab037912aff3; ?>
<?php unset($__componentOriginal9342f2fe4d62d9eeebeb40bf7a9eab037912aff3); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalb6cfe1fbfca1da8dff80e79b590e361ed9251d22 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Header\Mobile\Toprespon::class, []); ?>
<?php $component->withName('header.mobile.toprespon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb6cfe1fbfca1da8dff80e79b590e361ed9251d22)): ?>
<?php $component = $__componentOriginalb6cfe1fbfca1da8dff80e79b590e361ed9251d22; ?>
<?php unset($__componentOriginalb6cfe1fbfca1da8dff80e79b590e361ed9251d22); ?>
<?php endif; ?>
            
            <?php if (isset($component)) { $__componentOriginal724840ca7fa3709151294f429e31003ab28d6e05 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Header\Bottom::class, ['name' => $name]); ?>
<?php $component->withName('header.bottom'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal724840ca7fa3709151294f429e31003ab28d6e05)): ?>
<?php $component = $__componentOriginal724840ca7fa3709151294f429e31003ab28d6e05; ?>
<?php unset($__componentOriginal724840ca7fa3709151294f429e31003ab28d6e05); ?>
<?php endif; ?>
            
            <div id="header__scroll" class="d-none">
                <?php if (isset($component)) { $__componentOriginal724840ca7fa3709151294f429e31003ab28d6e05 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Header\Bottom::class, ['name' => $name]); ?>
<?php $component->withName('header.bottom'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal724840ca7fa3709151294f429e31003ab28d6e05)): ?>
<?php $component = $__componentOriginal724840ca7fa3709151294f429e31003ab28d6e05; ?>
<?php unset($__componentOriginal724840ca7fa3709151294f429e31003ab28d6e05); ?>
<?php endif; ?>
            </div>
            
        </div>
        <div id="biad__content" class="<?php echo $__env->yieldContent('margin'); ?>">
            <div id="breadCrumb">
                <div class="container">
                    <ol class="b__crumb">
                        <li class="b__crumb--item">
                            <i class="fas fa-home"></i>
                        </li>
                        <li class="b__crumb--item">
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </li>
                        <li class="b__crumb--item">
                            <?php echo $__env->yieldContent('b_crumb'); ?>
                        </li>
                    </ol>
                </div>
            </div>
            <div id="wrapper__account">
                <div class="container">
                    <div id="account">
                        <div class="w-100">
                            <div class="row mx-0" class="layout__account">
                                <div class="d-none d-lg-block col-lg-2 w-100 layout__account--left pl-0">
                                    <div class="left__header">
                                        <div class="davishop__avatar">
                                            <?php if(Auth::user()->avatar != Null): ?>
                                            <img src="<?php echo e($daviUser->getAvatarUser(Auth::id())); ?>" width="48" height="48"
                                                class=" rounded-circle " alt="">

                                            <?php endif; ?>
                                        </div>
                                        <div class="davishop__info pl-2">
                                            <strong class="d-block name"><?php echo e(Auth::user()->name); ?></strong>
                                            <a href="<?php echo e(route('profile')); ?>" class="edit d-block text-decoration-none">
                                                <i class="fas fa-pen"></i>
                                                <span>Sửa Hồ Sơ</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="left__content">
                                        <ul id="list__account">
                                            <li class="la-item accordion" id="user__accordion">
                                                <a class="d-flex align-items-center" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    <img src="<?php echo e($file->ver_img('client/images/user-mini.png')); ?>"
                                                        width="20" height="20" alt="">
                                                    <span class="d-block pl-2">Tài Khoản Của Tôi</span>
                                                </a>
                                                <ul id="collapseOne"
                                                    class="collapse <?php echo e($name != 'purchase' ? 'show':''); ?> mt-2"
                                                    data-parent="#user__accordion">
                                                    <li>
                                                        <a href="<?php echo e(route('profile')); ?>"
                                                            class="<?php echo e($name == 'profile'?'user_active':''); ?>  d-block">Hồ
                                                            Sơ</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo e(route('address')); ?>"
                                                            class="<?php echo e($name == 'address'?'user_active':''); ?> d-block">Địa
                                                            Chỉ</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="d-block">Đổi Mật Khẩu</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="la-item">
                                                <a href="<?php echo e(route('purchase')); ?>" class="d-flex align-items-center">
                                                    <img src="<?php echo e($file->ver_img('client/images/cargo.png')); ?>"
                                                        width="20" height="20" alt="">
                                                    <span
                                                        class="d-block pl-2 <?php echo e($name == 'purchase'?'user_active':''); ?>">Đơn
                                                        Mua</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <?php if($name != "purchase"): ?>
                                <div class="col-12 col-lg-10 w-100 layout__account--right">
                                    <?php if (isset($component)) { $__componentOriginal7a1eddf0fb63533ae599ea3eb44bfeda8734ab79 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Client\Account\Menumini::class, ['name' => $name]); ?>
<?php $component->withName('client.account.menumini'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7a1eddf0fb63533ae599ea3eb44bfeda8734ab79)): ?>
<?php $component = $__componentOriginal7a1eddf0fb63533ae599ea3eb44bfeda8734ab79; ?>
<?php unset($__componentOriginal7a1eddf0fb63533ae599ea3eb44bfeda8734ab79); ?>
<?php endif; ?>
                                    <div class="_vapx">
                                        <div class="right__header d-flex justify-content-between align-items-center">
                                            <div class="rh__left">
                                                <?php echo $__env->yieldContent('rh__left'); ?>
                                            </div>
                                            <div class="rh__right">
                                                <?php echo $__env->yieldContent('rh__right'); ?>
                                            </div>
                                        </div>
                                        <div class="right__content <?php echo $__env->yieldContent('class_rc'); ?>">
                                            <?php echo $__env->yieldContent('rc'); ?>
                                        </div>
                                    </div>

                                </div>
                                <?php else: ?>
                                <div class="col-12 col-lg-10 w-100 layout__account--purchase pr-lg-0 ">
                                    <?php if (isset($component)) { $__componentOriginal7a1eddf0fb63533ae599ea3eb44bfeda8734ab79 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Client\Account\Menumini::class, ['name' => $name]); ?>
<?php $component->withName('client.account.menumini'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7a1eddf0fb63533ae599ea3eb44bfeda8734ab79)): ?>
<?php $component = $__componentOriginal7a1eddf0fb63533ae599ea3eb44bfeda8734ab79; ?>
<?php unset($__componentOriginal7a1eddf0fb63533ae599ea3eb44bfeda8734ab79); ?>
<?php endif; ?>
                                    <?php echo $__env->yieldContent('purchase'); ?>
                                </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (isset($component)) { $__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Footer::class, []); ?>
<?php $component->withName('Footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf)): ?>
<?php $component = $__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf; ?>
<?php unset($__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf); ?>
<?php endif; ?>
    </div>
    <input type="hidden" name="" value="<?php echo e($name); ?>" id="nameRoute">
    <?php if (isset($component)) { $__componentOriginalf1539043f996ad19222d3857327d27715a337b42 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Modal\Product::class, []); ?>
<?php $component->withName('modal.Product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf1539043f996ad19222d3857327d27715a337b42)): ?>
<?php $component = $__componentOriginalf1539043f996ad19222d3857327d27715a337b42; ?>
<?php unset($__componentOriginalf1539043f996ad19222d3857327d27715a337b42); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal6ecf414484838f2a180a39f5cf6522506b2be900 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Ajax::class, []); ?>
<?php $component->withName('Ajax'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6ecf414484838f2a180a39f5cf6522506b2be900)): ?>
<?php $component = $__componentOriginal6ecf414484838f2a180a39f5cf6522506b2be900; ?>
<?php unset($__componentOriginal6ecf414484838f2a180a39f5cf6522506b2be900); ?>
<?php endif; ?>
</body>

</html>
<?php /**PATH E:\xampp\htdocs\nava\resources\views\layouts\user\app.blade.php ENDPATH**/ ?>