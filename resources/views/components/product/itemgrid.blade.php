@php
    $nameRoute = Route::currentRouteName();
    if ($nameRoute == 'index_product' || $nameRoute == 'index_product_1' || $nameRoute == 'index_product_2') {
        $product_cat = Str::replaceFirst('/', '', Str::replace(url('category/'), '', url()->current()));
        $route_product = url('products/' . $product_cat . '/' . $message->slug);
    } else {
        $route_product = route('detail_product', ['slug' => $message->slug]);
    }
@endphp
<div class="product__item w-100 reval-item {{ $class }} mb-3" data-id="{{ $message->id }}">
    <x-productlabels :product="$message" />
    <div class="product__item--img" data-id="{{ $message->id }}">
        <a href="{{ $route_product }}" class="d-block img_show">
            <img src="{{ $file->ver_img($message->main_img) }}" alt="{{ $message->name }}" class="img-fluid lazy">
        </a>
        <a href="{{ $route_product }}" class="d-none img_hide">
            <img src="{{ $file->ver_img($message->sub_img) }}" alt="{{ $message->name }}" class="img-fluid lazy">
        </a>
        <div class="quick__view qv__{{ $message->id }}" data-toggle="tooltip" data-placement="top" title="Xem Nhanh"
            class="open__modal--qview" data-id="{{ $message->id }}">
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
{{-- write modal here --}}


{{-- ----------------- --}}


{{-- ----------------- --}}
