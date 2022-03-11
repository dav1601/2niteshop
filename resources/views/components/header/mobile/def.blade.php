<div class="container px-0 mobile__header d-none">
    <div class="mobile__header--wrapper">
        <div class="mobile__header--bar">
            <ul class="j__menu">
                @if (Auth::check())
                <li class="j__menu--item">
                    <a href="{{ route('profile') }}">
                        <i class="fa-solid fa-user"></i>
                        <span>Tài khoản</span>
                    </a>
                </li>
                <li class="j__menu--item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Đăng xuất</span>
                    </a>
                </li>
                @else
                <li class="j__menu--item">
                    <a href="{{ route('login') }}">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        <span>Đăng nhập</span>
                    </a>
                </li>
                <li class="j__menu--item">
                    <a href="{{ route('register') }}">
                        <i class="fa-solid fa-pen-clip"></i>
                        <span>Đăng ký</span>
                    </a>
                </li>
                @endif
                <li class="j__menu--item">
                    <a href="{{ route('contact') }}">
                        <i class="fa-solid fa-phone"></i>
                        <span>Liên hệ</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</div>
