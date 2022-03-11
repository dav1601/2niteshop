<div class="ml-0 mr-0 mb-3 mt-3 d-none" id="menu__mini--user">
    <div class="row mx-0 justify-content-between align-items-center niteshop__brcUser">
        <div class="col-3 px-0 niteshop__brcUser--item  @if ($name == "profile") niteshop__brcUser--active @endif">
            <a href="{{ route('profile') }}">Hồ Sơ</a>
        </div>
        <div class="col-3 px-0 niteshop__brcUser--item @if ($name == "address") niteshop__brcUser--active @endif">
            <a href="{{ route('address') }}">Địa chỉ</a>
        </div>
        <div class="col-3 px-0 niteshop__brcUser--item">
            <a href="{{ route('profile') }}">Đổi mật khẩu</a>
        </div>
        <div class="col-3 px-0 niteshop__brcUser--item @if ($name == "purchase") niteshop__brcUser--active @endif">
            <a href="{{ route('purchase') }}">Đơn mua</a>
        </div>
    </div>
</div>
