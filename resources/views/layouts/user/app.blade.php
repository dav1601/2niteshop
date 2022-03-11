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
    <meta property="og:type" content="@yield('og-type' , " website")" />
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <script src="{{ $file->ver('client/owl/dist/owl.carousel.min.js') }}">
    </script>
    <script src="{{ $file->ver('client/ls/dist/js/lightslider.min.js') }}">
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
    {{-- <div id="popup">

    </div> --}}
    <div id="bg-loading"></div>
    <div id="bg-menu" class="d-none"></div>
    <x-mobile.menu />
    <x-mobile.cart.wp />
    <div id="loading">
        <img src="{{ $file->ver_img('client/images/loading.gif') }}" alt="Loading........." width="60">
    </div>
    @if (Gate::allows('group-admin'))
    <x-admin.navbar />
    @endif
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
                            @yield('b_crumb')
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
                                            @if (Auth::user()->avatar != Null)
                                            <img src="{{ $daviUser->getAvatarUser(Auth::id()) }}" width="48" height="48"
                                                class=" rounded-circle " alt="">

                                            @endif
                                        </div>
                                        <div class="davishop__info pl-2">
                                            <strong class="d-block name">{{ Auth::user()->name }}</strong>
                                            <a href="{{ route('profile') }}" class="edit d-block text-decoration-none">
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
                                                    <img src="{{ $file->ver_img('client/images/user-mini.png') }}"
                                                        width="20" height="20" alt="">
                                                    <span class="d-block pl-2">Tài Khoản Của Tôi</span>
                                                </a>
                                                <ul id="collapseOne"
                                                    class="collapse {{ $name != 'purchase' ? 'show':'' }} mt-2"
                                                    data-parent="#user__accordion">
                                                    <li>
                                                        <a href="{{ route('profile') }}"
                                                            class="{{ $name == 'profile'?'user_active':'' }}  d-block">Hồ
                                                            Sơ</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('address') }}"
                                                            class="{{ $name == 'address'?'user_active':'' }} d-block">Địa
                                                            Chỉ</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="d-block">Đổi Mật Khẩu</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="la-item">
                                                <a href="{{ route('purchase') }}" class="d-flex align-items-center">
                                                    <img src="{{ $file->ver_img('client/images/cargo.png') }}"
                                                        width="20" height="20" alt="">
                                                    <span
                                                        class="d-block pl-2 {{ $name == 'purchase'?'user_active':'' }}">Đơn
                                                        Mua</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                @if ($name != "purchase")
                                <div class="col-12 col-lg-10 w-100 layout__account--right">
                                    <x-client.account.menumini :name="$name" />
                                    <div class="_vapx">
                                        <div class="right__header d-flex justify-content-between align-items-center">
                                            <div class="rh__left">
                                                @yield('rh__left')
                                            </div>
                                            <div class="rh__right">
                                                @yield('rh__right')
                                            </div>
                                        </div>
                                        <div class="right__content @yield('class_rc')">
                                            @yield('rc')
                                        </div>
                                    </div>

                                </div>
                                @else
                                <div class="col-12 col-lg-10 w-100 layout__account--purchase pr-lg-0 ">
                                    <x-client.account.menumini :name="$name" />
                                    @yield('purchase')
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-Footer />
    </div>
    <input type="hidden" name="" value="{{ $name }}" id="nameRoute">
    <x-modal.Product />
    <x-Ajax />
</body>

</html>
