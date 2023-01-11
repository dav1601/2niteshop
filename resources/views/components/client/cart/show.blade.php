
@if (count($cart) > 0)
    <div id="cart__show" class="cartShow row mx-0">
        <div class="col-12 col-lg-8" id="wp_cartShow_left">
            <div class="w-100 cartShow--left">
                @foreach ($cart as $item)
                    <x-Cart :cart="$item" />
                @endforeach
            </div>
        </div>
        <div class="col-12 col-lg-4 pr-0" id="wp_cartShow_right">
            <div class="w-100 cartShow--right">
                <span class="d-block plus_cart">cộng giỏ hàng</span>
                <div class="box-total bt-qty d-flex justify-content-between align-items-center">
                    <span>Số Lượng sản phẩm</span>
                    <strong>{{ count($cart) }}</strong>
                </div>
                <div class="box-total bt-price d-flex justify-content-between align-items-center">
                    <span>Tổng giỏ hàng</span>
                    <strong> {{ crf($myCart->total()) }}</strong>
                </div>
                <div class="box-total">
                    <a href="{{ route('checkout') }}" class="davi_btn w-100">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
@else
    <div id="cart__empty" class="d-flex flex-column align-items-center">
        <img src="{{ $file->ver_img_local('client/images/empty-cart.png') }}" alt="empty cart">
        <span class="d-block text-uppercase my-2 mr-4" style="font-size: 20px; font-weight:600;">Giỏ hàng bạn đang
            trống</span>
    </div>
@endif
