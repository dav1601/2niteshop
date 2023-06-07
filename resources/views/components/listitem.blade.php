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
    <div class="product__item--list d-flex reval-item w-100 flex-wrap" data-id="{{ $message->id }}">
        <div class="image position-relative" data-id="{{ $message->id }}">
            <a href="{{ $route_product }}" class="img_show">
                <img data-src="{{ $file->ver_img($message->main_img) }}" alt="{{ $message->name }}" class="lazyload">
            </a>
            <a href="{{ $route_product }}" class="img_hide">
                <img data-src="{{ $file->ver_img($message->sub_img) }}" alt="{{ $message->name }}" class="lazyload">
            </a>
            <div class="quick__view qv__{{ $message->id }}" data-toggle="tooltip" data-placement="top"
                title="Xem Nhanh" class="open__modal--qview" data-id="{{ $message->id }}">
                <i class="fas fa-plus"></i>
            </div>
            <x-productlabels :product="$message" />
        </div>
        <div class="info__product">
            <div class="prdcer">
                <span>Nhà sản xuất: <a
                        href="{{ route('producer', ['slug' => $message->producer->slug]) }}">{{ $message->producer->name }}</a></span>
            </div>
            <div class="name">
                <a href="{{ $route_product }}" class="d-block">{{ $message->name }}</a>
            </div>
            <div class="des">
                <p>{!! ltrim(Str::limit(strip_tags($message->content), 240, '..'), '&nbsp;') !!}</p>
            </div>
            <div class="price">
                @if ($message->price != 0)
                    <span id="price__{{ $message->id }}" class="{{ 'price-' . $message->id }}"
                        prd-price="{{ $message->price }}"
                        data-price="{{ $message->price }}">{{ crf($message->price) }}</span>
                @else
                    <span id="price__{{ $message->id }}">CALL-{{ getVal('switchboard')->value }}</span>
                @endif
            </div>
            <div class="d-inline-block ml-1">
                <x-client.cart.add.btn :product="$message" />
            </div>
        </div>
    </div>
</div>
