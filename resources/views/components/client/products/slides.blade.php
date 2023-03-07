@if (count($products) > 0)
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($products as $prd)
                <div class="swiper-slide" id="home-swiper-product-{{ $prd->product->id }}">
                    <x-product.itemgrid type="1" :message="$prd->product" />
                </div>
                @php
                    unset($prd);
                @endphp
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
@else
    <strong>Hiện chưa có sản phẩm nào !</strong>
@endif
