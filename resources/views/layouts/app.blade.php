@php
$name = Route::currentRouteName();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="fb:admins" content="100007446334009" />
    <meta property="fb:app_id" content="349901006628885" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ $file->ver_img('client/images/email-logo.png') }}" type="image/x-icon">
    <title>@yield('title' , config('2niteseo.meta.defaults.title'))</title>
    <link rel="canonical" href="{{ URL::current() }}">
    <meta name='description' itemprop='description' content='@yield(' meta-desc' ,
        config('2niteseo.meta.defaults.description'))' />
    <meta name='keywords' content='@yield(' meta-keyword' , config('2niteseo.meta.defaults.keywords'))' />
    <meta property="og:description" content="@yield('og-desc' , config('2niteseo.meta.defaults.description'))" />
    <meta property="og:title" content="@yield('og-title' , config('2niteseo.meta.defaults.title'))" />
    <meta property="og:image" content="@yield('og-image' , $file->ver_img('client/images/banner_2nite.png'))" />
    <meta property="og:site_name" content="@yield('site_name' , config('2niteseo.meta.defaults.title'))" />
    <meta property="og:type" content="@yield('og-type' , 'website')" />
    <meta property="og:url" content="{{ Url::current() }}" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="@yield('twitter-title' , config('2niteseo.meta.defaults.title'))" />
    {{-- link css --}}
    <link rel="stylesheet" href="{{ $file->ver('plugin/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ $file->ver('plugin/reset.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ $file->ver('client/owl/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ $file->ver('client/owl/dist/assets/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ $file->ver('client/ls/dist/css/lightslider.min.css') }}">
    <link rel="stylesheet" href="{{ $file->import_css('app.css') }}">
    @yield('import_css')
    {{-- end link css --}}
    <script src="{{ $file->ver('plugin/bootstrap/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ $file->ver('plugin/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ $file->ver('plugin/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ $file->import_js('helper.js') }}"></script>
    @yield('import_js')
    @routes
    <script src="{{ $file->import_js('app.js') }}">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ $file->ver('client/zoom-master/jquery.zoom.min.js') }}">
    </script>
    @if($name != 'search_main' && $name != 'show_cart')
    <script src="{{ $file->import_js('product.js') }}"></script>
    @endif
    <script src="{{ $file->ver('client/owl/dist/owl.carousel.min.js') }}">
    </script>
    <script src="{{ $file->ver('client/ls/dist/js/lightslider.min.js') }}">
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    {{-- end script --}}
</head>
<div id="bg-loading"></div>
<div id="loading">
    <img src="{{ $file->ver_img('admin/images/layout/loading-unscreen.gif') }}" alt="Loading......." width="200">
</div>
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
{{-- END OF GOOGLE ANSL --}}

<body>
    {{-- <div id="popup">
    </div> --}}
    <div id="bg-menu" class="d-none"></div>
    <x-mobile.menu />
    <x-mobile.cart.wp />

    @if (Gate::allows('group-admin'))
    <x-admin.navbar />
    @endif
    @yield('banner')
    <div id="b1ad">
        <div id="b1ad__header">
            <x-header.top />
            <x-header.mobile.def />
            <x-header.mobile.toprespon />
            {{-- --}}
            <x-header.bottom :name="$name" />
            {{-- end header botttttt --}}
            <div id="header__scroll" class="d-none">
                <x-header.bottom :name="$name" />
            </div>
            {{-- end header scroll --}}
        </div>
        <div id="biad__content" class="@yield('margin')">
            @yield('content')
        </div>
        <x-Footer />
    </div>
    <input type="hidden" name="" value="{{ $name }}" id="nameRoute">
    <input type="hidden" name="" id="cookie_view" value="{{ Cookie::has('view') ? Cookie::get('view'): " grid" }}">
    <x-modal.Product />
    <x-modal.preorder />
    <x-Ajax />
</body>

</html>
