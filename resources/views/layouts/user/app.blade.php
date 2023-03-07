@php
    $name = Route::currentRouteName();
    switch ($name) {
        case 'profile':
            $title = 'Thông Tin Tài Khoản';
            break;
        case 'address':
            $title = 'Địa Chỉ';
            break;
        case 'purchase':
            $title = 'Đơn Hàng';
            break;

        default:
            $title = '';
            break;
    }
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('layouts.meta', ['title' => $title])
    {{-- link css --}}
    @include('layouts.css')
    {{-- end link css --}}
    {{-- link js --}}
    @include('layouts.js', ['name' => $name])
    {{-- end script --}}
</head>
<x-client.plugin.facebook />

<body>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SB7F2KSJJL"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-SB7F2KSJJL');
    </script>
    {{-- <div id="popup">

    </div> --}}

    <x-mobile.menu />
    <x-mobile.cart.wp />


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
                                            @if (Auth::user()->avatar != null)
                                                <img src="{{ $daviUser->getAvatarUser(Auth::id()) }}" width="48"
                                                    height="48" class="rounded-circle" alt="avatar user">
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
                                                    <img src="{{ $file->ver_img_local('client/images/user-mini.png') }}"
                                                        width="20" height="20" alt="user mini">
                                                    <span class="d-block pl-2">Tài Khoản Của Tôi</span>
                                                </a>
                                                <ul id="collapseOne"
                                                    class="{{ $name != 'purchase' ? 'show' : '' }} collapse mt-2"
                                                    data-parent="#user__accordion">
                                                    <li>
                                                        <a href="{{ route('profile') }}"
                                                            class="{{ $name == 'profile' ? 'user_active' : '' }} d-block">Hồ
                                                            Sơ</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('address') }}"
                                                            class="{{ $name == 'address' ? 'user_active' : '' }} d-block">Địa
                                                            Chỉ</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="d-block">Đổi Mật Khẩu</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="la-item">
                                                <a href="{{ route('purchase') }}" class="d-flex align-items-center">
                                                    <img src="{{ $file->ver_img_local('client/images/cargo.png') }}"
                                                        width="20" height="20" alt="icon cargo">
                                                    <span
                                                        class="d-block {{ $name == 'purchase' ? 'user_active' : '' }} pl-2">Đơn
                                                        Mua</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                @if ($name != 'purchase')
                                    <div class="col-12 col-lg-10 w-100 layout__account--right">
                                        <x-client.account.menumini :name="$name" />
                                        <div class="_vapx">
                                            <div
                                                class="right__header d-flex justify-content-between align-items-center">
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
                                    <div class="col-12 col-lg-10 w-100 layout__account--purchase pr-lg-0">
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
    <x-Ajax />
</body>
<x-server.common />

</html>
