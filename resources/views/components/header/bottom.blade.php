@php
$menu_fix = App\Models\FixMenu::all();
@endphp

<div id="biad__header--bot">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="@if ($name != "home") drop__show @endif bot bot__left ">
            <a class="b1ad_menu">
                <i class="fas fa-bars"></i>
                <span>Danh mục sản phẩm</span>
            </a>
            <div class="bot__left--drop">
                <x-client.menu.menu />
            </div>
        </div>
        <div class="bot bot__center">
            <ul class="d-flex align-items-center">
                <li>
                    <a href="tel:{{ str_replace(' ', '', getVal('switchboard')->value)}}">
                        <i class="fas fa-phone-alt"></i>
                        <span>Mua Hàng:</span>
                        <strong>{{ getVal('switchboard') ->value }}</strong>
                    </a>
                </li>
                <li class="center__drop">
                    <a href="">
                        Sửa Chữa
                    </a>
                    <div class="center__drop--fix">
                        <ul>
                            @foreach ($menu_fix as $fm )
                            <li class="fix__item">
                                <a href="{{ url($fm->link) }}">{{ $fm->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="bot bot__right">
            <a href="{{ route('show_cart') }}" id="cart">
                <span id="items" class="items">{{ Cart::instance('shopping')->count() }} Sản Phẩm -- Gọi -- {{
                    getVal('switchboard')->value }}</span>
                <i class="fas fa-shopping-bag"></i>
            </a>
            <div id="cart__drop" class="cart__drop">
                <ul id="cart__drop--menu">
                    <div class="arrow-up"></div>
                    <div id="content_sub_cart">
                        @if (empty_cart())
                        <span class="empty__cart">Giỏ hàng đang trống</span>
                        @else
                        @foreach (Cart::instance('shopping')->content() as $cartsub )
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

                        <a href="  {{ route('show_cart') }} " class="d-block" class="davi_btn"
                            id="ckOrCart__cont--cart">
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
            </div>
            {{-- end cart drop --}}
        </div>
    </div>
</div>
