<div class="success__add position-relative">
    <div class="success__add--close position-absolute">
        <i class="fas fa-times"></i>
    </div>
    <div class="d-flex">
        <a href="{{ route('detail_product', ['slug' => $item->slug]) }}" class="success__add--img">
            <img src="{{ urlImg($item->options->image) }}" alt=" {{ $item->name }} ">
        </a>
        <div class="success__add--content">
            <a href="{{ route('detail_product', ['slug' => $item->slug]) }}" class="name">
                {{ $item->name }}
            </a>
            <span class="alerT">
                Thành công: Bạn đã thêm <a href="{{ route('detail_product', ['slug' => $item->slug]) }}"
                    class="name_2">{{ $item->name }}</a> vào <a href="{{ route('show_cart') }}" class="carT">Giỏ
                    Hàng</a>
            </span>
        </div>
    </div>
    <div class="success__add--btn row mx-0 mt-2 flex-nowrap">
        <div class="col-6 p-0">
            <a href="{{ route('show_cart') }}" class="go__cart">
                <i class="fas fa-shopping-bag"></i>
                <span>Vào Giỏ Hàng</span>
            </a>
        </div>
        <div class="col-6 p-0">
            <a href="{{ route('checkout') }}" class="go__cko">
                <i class="fas fa-credit-card"></i>
                <span>Thanh Toán</span>
            </a>

        </div>
    </div>
</div>
