@php
    $menu_fix = App\Models\FixMenu::all();
@endphp

<div id="biad__header--bot">
    <div class="d-flex justify-content-between align-items-center container">
        <div class="@if ($name != 'home') drop__show @endif bot bot__left">
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
                    <a href="tel:{{ str_replace(' ', '', getVal('switchboard')->value) }}">
                        <i class="fas fa-phone-alt"></i>
                        <span>Mua Hàng:</span>
                        <strong>{{ getVal('switchboard')->value }}</strong>
                    </a>
                </li>
                <li class="center__drop">
                    <a href="">
                        Sửa Chữa
                    </a>
                    <div class="center__drop--fix">
                        <ul>
                            @foreach ($menu_fix as $fm)
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
                <span id="items" class="items">{{ Cart::instance('shopping')->count() }} Sản Phẩm -- Gọi --
                    {{ getVal('switchboard')->value }}</span>
                <i class="fas fa-shopping-bag"></i>
            </a>
            <div id="cart__drop" class="cart__drop">
                <x-client.cart.drop />
            </div>
            {{-- end cart drop --}}
        </div>
    </div>
</div>
