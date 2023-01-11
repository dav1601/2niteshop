@php
    $name = Route::currentRouteName();
    $customTitle = 'Test';
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.meta', ['customTitle' => 'dasdsadas'])
    {{-- link css --}}
    @include('layouts.css')
    {{-- end link css --}}
    @include('layouts.js', ['name' => $name])
    {{-- end script --}}
</head>
<div id="bg-loading"></div>
<div id="loading">
    <img src="{{ $file->ver_img_local('admin/images/layout/loading-unscreen.gif') }}" alt="Loading......." width="200">
</div>
<!--Start of Tawk.to Script-->
<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>
<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "102195108617874");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml: true,
            version: 'v14.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!--End of Tawk.to Script-->
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
            {{--  --}}
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
    <x-modal.Product />
    <x-modal.preorder />
    <x-Ajax />
</body>
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        slidesPerGroup: 4,
        spaceBetween: 10,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>

</html>
