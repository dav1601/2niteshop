<ul id="cart__drop--menu">
    <div class="arrow-up"></div>
    <div id="content_sub_cart">
        @if (empty_cart())
            <span class="empty__cart">Giỏ hàng đang trống</span>
        @else
            @foreach ($cart as $cartsub)
                <li>
                    <x-cartsub :cartsub="$cartsub" />
                </li>
            @endforeach
        @endif
    </div>
    @if (!empty_cart())
        <div id="total">
            <span class="d-block">
                Tổng Tiền: <strong> {{ crf(total()) }}</strong>
            </span>
        </div>
    @endif
</ul>
@if (!empty_cart())
    <div id="ckOrCart">
        <div id="ckOrCart__cont">
            <a href="  {{ route('show_cart') }} " class="d-block" class="davi_btn" id="ckOrCart__cont--cart">
                <i class="fas fa-shopping-cart pr-2"></i>
                Giỏ Hàng
            </a>
            <a href=" {{ route('checkout') }}" class="d-block" class="davi_btn" id="ckOrCart__cont--ck">
                Thanh Toán
                <i class="fas fa-long-arrow-alt-right pl-2"></i>
            </a>
        </div>
    </div>
@endif
