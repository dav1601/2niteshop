<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    $module = session('active');
    $route = Route::currentRouteName();
@endphp

<head>
    {{-- @cloudinaryJS --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ $file->ver_img(config('setting-2nite.icon')) }}" type="image/x-icon">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"
        integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- reset --}}
    <x-include.bootstrap />
    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.4.1/swiper-bundle.min.css"
        integrity="sha512-nGNAKpV+BrfDZabPX1O6q6mRlT57/amdj+6vF322ongqKABLHYLfLc3jYtVVbkiR9towDWPPE9gWFE2tsZIPZg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- swiper --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- font --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css"
        integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- jq ui --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- animate --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- toastr --}}
    @php
        file_put_contents(public_path('pgb/pgb.css'), '');
    @endphp
    <link rel="stylesheet" href="{{ url('pgb/pgb.css') }}" id="pgb-link">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('admin/plugin/tags/tagsinput.css') }}">
    <link rel="stylesheet" href="{{ $file->ver('plugin/color-picker/color.min.css') }}">
    {{-- ---------- --}}

    {{-- ---------------- --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"
        integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    @yield('import_css')
    <link rel="stylesheet" href="{{ $file->ver('admin/app/css/app.css') }}">

    <x-app.plugin.debug />
    @routes
    <script type="text/javascript">
        const user = {!! json_encode(Auth::user()) !!};
        const path_ab = {!! json_encode(env('PATH_TINYMCE')) !!};
    </script>
    {{-- ------------- --}}

    {{-- bootstrap --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js"
        integrity="sha512-q583ppKrCRc7N5O0n2nzUiJ+suUv7Et1JGels4bXOaMFQcamPk9HjdUknZuuFjBNs7tsMuadge5k9RzdmO+1GQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- lazysize --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
        integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- form --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"
        integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- moment --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"
        integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- loadash --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- toastr --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.12/sweetalert2.all.min.js"
        integrity="sha512-J8fMSsNsuWKj3xd1PRJ7M328sNj4jzUm2uYFI/spmO29rvGJvjsYXBTCun7OFCaRMeDowiEFGdXrkbBlCL5myw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- sweetalert 2 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.13.6/underscore-min.js"
        integrity="sha512-2V49R8ndaagCOnwmj8QnbT1Gz/rie17UouD9Re5WxbzRVUGoftCu5IuqqtAM9+UC3fwfHCSJR1hkzNQh/2wdtg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- underscorre --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.4.0/socket.io.min.js"></script>
    <script src="{{ $file->ver('js/laravel-server/laravel-echo-server.js') }}"></script>
    {{-- server --}}
    <script src="{{ asset('admin/plugin/tags/tagsinput.js') }}"></script>
    {{-- tags --}}
    <script src="https://cdn.tiny.cloud/1/bho6ckhdsdjmv2bmyaxmm2dn52w16ounvk9au2ys2oqo8gty/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    {{-- tinymce --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.4.1/swiper-bundle.min.js"
        integrity="sha512-3Ei7OPFo83kw3cPbDLeLhn/YF8tZB7Vs8sfli0B/KEekureL5eosDeshYFICCvt4K8i0yUil/lK3cSiic2Wjkg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- swiper slide --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"
        integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- datetime picker --}}
    {{-- ---- end plugin --}}
    <script src="{{ $file->ver('app/common.js') }}"></script>
    <script src="{{ $file->ver('admin/app/js/config.js') }}"></script>
    <script src="{{ $file->ver('admin/app/js/tinymce.js') }}"></script>
    <script src="{{ $file->ver('admin/app/js/relationship.js') }}"></script>
    <script src="{{ $file->ver('plugin/color-picker/color.min.js') }}"></script>
    @yield('import_js')
    <script src="{{ $file->ver('admin/app/js/app.js') }}"></script>


</head>


<body>

    @if (Session::has('success'))
        <script>
            let message = '{{ Session::get('success') }}';
            toastr.success(message);
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            let message = '{{ Session::get('error') }}';
            toastr.error(message);
        </script>
    @endif
    <x-layout.pageloading />
    <x-admin.layout.response />
    <div id="wrapper">
        <div id="sidebar">
            <div class="sidebar">
                <div class="sidebar__head">
                    <div class="sidebar__head--logo d-flex align-items-center">
                        <img src="https://res.cloudinary.com/vanh-tech/image/upload/v1681081513/my_logo_dark_tfzcgj.png"
                            width="250" height="150" alt="">
                    </div>
                    <div class="sidebar__head--info d-flex align-items-center justify-content-center my-2">
                        {{-- <img src="{{ urlImg(Auth::user()->avatar) }}" alt=""> --}}
                        <div class="text">
                            <span class="d-block">{{ Auth::user()->name }}</span>

                        </div>
                    </div>
                </div>
                <div class="sidebar__content">
                    <h1 class="text-uppercase font-weight-bold mb-3 text-center" style="font-size: 16px">Tổng Quan</h1>
                    <div class="accordion" id="sidebar__content--accordion">

                        <ul class="sidebar__content--menu">
                            @foreach (config('admin.sidebar.module') as $key => $data)
                                <x-admin.layout.sidebar.module :key="$key" :data="$data" :active="$module" />
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div id="content" class="position-relative">
            @yield('outside-content')
            <div class="content w-100">
                <div class="content__header">
                    <div class="content__header--left">
                        <i class="fas fa-bars" id="toggle__sidebar"></i>
                        <a href="{{ route('home') }}">Trang Chủ Client</a>
                    </div>
                    <div class="content__header--right dropdown">
                        <a class="avatar" id="avatar__drop" data-toggle="dropdown" aria-expanded="false">
                            <img src="{{ urlImg(Auth::user()->avatar) }}" class="rounded" width="60" height="60"
                                alt="">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right drop-content" aria-labelledby="avatar__drop">
                            <a class="dropdown-item" href="{{ route('admin_profile', ['id' => Auth::id()]) }}"><i
                                    class="far fa-user pr-3"></i>Hồ Sơ</a>
                            <a class="dropdown-item" href="{{ route('setting_profile', ['id' => Auth::id()]) }}"><i
                                    class="fas fa-cog pr-3"></i>Cài Đặt</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i
                                    class="fas fa-sign-out-alt pr-3"></i>Thoát</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                {{-- END CONTENT HEADER --}}
                <div class="content__body">
                    <h1 class="content__body--name mb-5">@yield('name')</h1>
                    <div class="content__body--main">
                        <input type="hidden" name="" value="{{ $route }}" id="route">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-admin.modal.product.select btn="selected" />
</body>

</html>
