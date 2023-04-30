@if (count($products) > 0)
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($products as $prd)
                @if (isset($prd->product))
                    <div class="swiper-slide" id="home-swiper-product-{{ $prd->product->id }}">
                        <x-product.itemgrid type="1" :message="$prd->product" />
                    </div>
                @else
                    <div class="swiper-slide" id="home-swiper-product-{{ $prd->id }}">
                        <x-product.itemgrid type="1" :message="$prd" />
                    </div>
                @endif

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
    <div style="min-height: 400px;" class="w-100 d-flex justify-content-center align-items-center">
        <strong class="d-block my-4 text-black">Hiện chưa có sản phẩm nào !</strong>
    </div>
@endif
