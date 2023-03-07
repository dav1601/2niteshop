<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.meta', ['title' => 'ĐĂNG KÝ']);
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="client/app/login/style.css">
    <script src="{{ asset('plugin/bootstrap/js/jquery-3.5.1.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>ĐĂNG KÝ</title>
    <link rel="shortcut icon" href="{{ $file->ver_img_local('client/images/email-logo.png') }}" type="image/x-icon">
    <link rel="canonical" href="{{ URL::current() }}">


</head>

<body>
    <x-admin.modal.auth.reg />
</body>

</html>
