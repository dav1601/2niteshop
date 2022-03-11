<div id="biad__header--top">
    <div class="header__content">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="header__content--logo">
                <a href="{{ route('home') }}" class="d-block">
                    <img src="{{ $file->ver_img('client/images/logo.png') }}" alt="" width="169" height="90">
                </a>
            </div>
            <div class="header__content--search">
                <form action="{{ route('search_main') }}" method="get" class="d-flex position-relative" value="">
                    <input type="text" name="keyword" id="search"
                        value="@if (Request::has('keyword')) {{ Request::get('keyword') }}@endif"
                        placeholder="Nhập từ khoá sản phẩm cần tìm.....">
                    <button type="submit"><i class="fas fa-search"></i></button>
                    <div id="resultQuery" class="position-absolute">
                        <div id="arrow" class="position-relative">
                            <div class="arrow-up"></div>
                        </div>
                        <ul id="list_result"></ul>
                    </div>
                </form>
            </div>
            <div class="header__content--info">
                <ul class="info__menu">
                    {{-- --}}
                    @if (Auth::check())
                    <li class="info__menu--item account-auth">
                        <a href="{{ route('profile') }}" class="d-block">
                            <div class="item__content">
                                <i class="fas fa-user-check"></i>
                                <div class="text">
                                    <span class="text-1 d-block">Tài Khoản</span>
                                    <span class="text-2 d-block">Sửa/Đăng xuất</span>
                                </div>
                            </div>
                        </a>
                        <div class="b1ad__drop">
                            <ul class="b1ad__drop--menu">
                                <li class="b1ad__drop--item">
                                    <div class="arrow-up"></div>
                                    <a href="{{ route('profile') }}">
                                        <i class="fas fa-user-edit pr-1 not"></i>
                                        <span>Sửa tài khoản</span>
                                    </a>
                                    <a href="{{ route('purchase') }}">
                                        <i class="fas fa-receipt pr-1 not"></i>
                                        <span>Đơn hàng</span>
                                    </a>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt pr-1 not"></i>
                                        <span>Đăng Xuất</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @else
                    <li class="info__menu--item account-1">
                        <a href="{{ route('login') }}" class="d-block">
                            <div class="item__content">
                                <i class="fas fa-user"></i>
                                <div class="text">
                                    <span class="d-block text-1">Tài khoản</span>
                                    <span class="text-2 d-block">Đăng nhập/Đăng ký</span>
                                </div>
                            </div>
                        </a>
                        <div class="b1ad__drop">
                            <ul class="b1ad__drop--menu">
                                <li class="b1ad__drop--item">
                                    <div class="arrow-up"></div>
                                    <a href="{{ route('login') }}">
                                        <i class="fas fa-sign-in-alt not pr-1"></i>
                                        <span>Đăng Nhập</span>
                                    </a>
                                    <a href="{{ route('register') }}">
                                        <i class="fas fa-sign-in-alt not pr-1"></i>
                                        <span>Đăng Ký</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    {{-- --}}
                    <li class="info__menu--item pay-slow">
                        <a href="{{ url('pages/dich-vu-tra-gop-tai') }}" class="d-block">
                            <div class="item__content">
                                <i class="fas fa-dollar-sign"></i>
                                <div class="text">
                                    <span class="d-block text-1">Trả Góp</span>
                                    <span class="text-2 d-block">Lãi suất chỉ từ 0%</span>
                                </div>
                            </div>
                        </a>

                    </li>
                    {{-- --}}
                    <li class="info__menu--item contact">
                        <a href="{{ route('contact') }}" class="d-block">
                            <div class="item__content">
                                <i class="fas fa-phone-alt"></i>
                                <div class="text">
                                    <span class="text-1 d-block">Liên hệ</span>
                                    <span class="text-2 d-block">với chúng tôi</span>
                                </div>
                            </div>
                        </a>

                    </li>
                    {{-- --}}
                </ul>
            </div>
        </div>
    </div>
</div>
