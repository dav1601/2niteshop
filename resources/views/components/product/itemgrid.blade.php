@props(['classWp' => ''])
@php
    $nameRoute = Route::currentRouteName();
    if ($nameRoute == 'index_product' || $nameRoute == 'index_product_1' || $nameRoute == 'index_product_2') {
        $product_cat = Str::replaceFirst('/', '', Str::replace(url('category/'), '', url()->current()));
        $route_product = url('products/' . $product_cat . '/' . $message->slug);
    } else {
        $route_product = route('detail_product', ['slug' => $message->slug]);
    }
@endphp
<div class="{{ $classWp }}">
    <div class="product__item w-100 reval-item {{ $class }} mb-3" data-id="{{ $message->id }}">
        <x-productlabels :product="$message" />
        <div class="product__item--img" data-id="{{ $message->id }}">
            <a href="{{ $route_product }}" class="{{ $message->path_second ? 'img_show' : '' }}">
                <img src="{{ urlImg($message->path_first, 'media') }}" alt="{{ $message->name }}">

            </a>
            @if ($message->path_second)
                <a href="{{ $route_product }}" class="img_hide">
                    <img src="{{ urlImg($message->path_second, 'media') }}" alt="{{ $message->name }}">

                </a>
            @endif

            <div class="quick__view qv__{{ $message->id }}" data-toggle="tooltip" data-placement="top"
                title="Xem Nhanh" class="open__modal--qview" data-id="{{ $message->id }}">
                <i class="fas fa-plus"></i>
            </div>
        </div>
        <div class="product__item--content">
            <a href="{{ $route_product }}" class="name d-block">
                {{ $message->name }}
            </a>
            @if ($message->stock != 2)
                <span class="price d-block text-center">
                    {{ crf($message->price) }}
                </span>
            @else
                <span class="price d-block text-center">
                    CALL-{{ getVal('switchboard')->value }}
                </span>
            @endif
        </div>
    </div>
</div>
{{-- write modal here --}}


{{-- ----------------- --}}


{{-- ----------------- --}}
