@php
$categories = App\Models\Category::tree();
@endphp
<div class="mobile__menu mobile__main__menu">
    <div class="w-100">
        <div class="mobile__menu--header">
            <span>Menu</span>
            <a class="close__menu"><i class="fa-solid fa-xmark"></i></a>
        </div>
        <div class="mobile__menu--content">
            <ul id="accordionMobile" class="nite__menu">
                <x-category.categories :categories="$categories" />
                <li class="nite__menu--item">
                    <a href="tel:{{ str_replace(' ', '', getVal('switchboard')->value)}}"  >
                        <div class="icon-name">
                            <img src="{{ $file->ver_img('client/images/phone-call.png') }}" width="25" height="25" alt="">
                            <strong class="d-block ml-2">Mua Hàng: {{ str_replace(' ', '', getVal('switchboard')->value)}}</strong>
                        </div>
                    </a>
                </li>
                <li class="nite__menu--item">
                    <a href="https://suachua.haloshop.vn">
                        <div class="icon-name">
                            <img src="{{ $file->ver_img('client/images/service.png') }}" width="25" height="25" alt="">
                            <strong class="d-block ml-2">Sữa Chữa</strong>
                        </div>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</div>
