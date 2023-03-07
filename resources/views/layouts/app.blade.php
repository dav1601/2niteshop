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

<x-client.plugin.facebook />

<body>
    {{-- <div id="popup">
    </div> --}}
    {{-- <x-layout.pageloading /> --}}
    {{-- <div id="bg-menu" class="d-none"></div> --}}
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

<x-server.common />
<x-admin.modal.auth />

</html>
