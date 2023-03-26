<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('layouts.meta', ['title' => 'ĐĂNG NHẬP'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="client/app/login/style.css">
    <script src="<?php echo e(asset('plugin/bootstrap/js/jquery-3.5.1.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>ĐĂNG NHẬP</title>
    <link rel="shortcut icon" href="<?php echo e($file->ver_img_local('client/images/email-logo.png')); ?>" type="image/x-icon">
    <link rel="canonical" href="<?php echo e(URL::current()); ?>">

</head>
<style>
    body {
        background-image: url("http://localhost/nava/public/client/images/bg.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        z-index: 1;
    }
</style>

<body>
    <?php if(session('error')): ?>
        <script>
            toastr.error("Sai Tên Đăng Nhập Hoặc Mật Khẩu", "Lỗi Đăng Nhập");
        </script>
    <?php endif; ?>

    <?php if (isset($component)) { $__componentOriginalf5dd6bae1a7963a44688af780dfcd10590303194 = $component; } ?>
<?php $component = App\View\Components\Admin\Modal\Auth\Login::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.modal.auth.login'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Modal\Auth\Login::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5dd6bae1a7963a44688af780dfcd10590303194)): ?>
<?php $component = $__componentOriginalf5dd6bae1a7963a44688af780dfcd10590303194; ?>
<?php unset($__componentOriginalf5dd6bae1a7963a44688af780dfcd10590303194); ?>
<?php endif; ?>
</body>

</html>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/auth/login.blade.php ENDPATH**/ ?>