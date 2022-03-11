@php
$prd = App\Models\Products::where('id', '=' , $cart->id)->first();
if ($cart->options->ins != 0) {
$group = App\Models\Insurance::where('id' , $cart->options->ins)->first()->group;
} else {
$group = 0;
}
@endphp
<div class="cart__item flex-wrap">
    <div class="cart__item--image">
        <a href="{{ route('detail_product', ['slug'=>$prd->slug]) }}" class="d-block">
            <img src="{{ $file->ver_img($cart->options->image) }}" width="100" alt="{{ $cart->name }}"
                class="img-fluid">
        </a>
    </div>
    <div class="cart__item--caption">
        <a href="{{ route('detail_product', ['slug'=>$prd->slug]) }}" class="d-block name">
            {{$cart->name}}
        </a>
        <span class="d-block model">
            Model: {{$cart->options->model}}
        </span>
        <span class="d-block price">
            Giá sản phẩm: {{ crf($cart->price) }}
        </span>
        @if ($cart->options->ins != 0)
        <div class="ins">
            <span>{{ $group == 1 ? "Thời gian bảo hành":"Phụ kiện mua kèm" }}: <strong>{{ App\Models\Insurance::where('id', '=' , $cart->options->ins
                    )->first()->name }}</strong></span>
        </div>
        @endif
        <div class="qty">
            @php
            if ($cart->options->ins != 0) {
            $op = App\Models\Insurance::where('id', '=' , $cart->options->ins
            )->first()->price;
            } else {
            $op = 0;
            }
            @endphp
            <div class="btn__type">
                <a class="btn-number py-0" data-type="minus" data-field="qty[{{ $cart->id }}]"><i
                        class="fas fa-minus"></i></a>
            </div>
            <input type="text" name="qty[{{ $cart->id }}]" data-id="{{ $cart->id }}"
                data-sub="{{ $cart->options->sub_total }}" data-rowId="{{ $cart->rowId }}" data-op="{{ $op }}"
                value="{{ $cart->qty }}" id="dtl__prd--qty" min="1" max="1000" class="input-number"
                data-opId="{{ $cart->options->ins }}">
            <div class="btn__type">
                <a class="btn-number py-0" data-type="plus" data-field="qty[{{ $cart->id }}]"><i
                        class="fas fa-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="cart__item--action d-flex flex-column justify-content-end cia-{{ $cart->id }}">
        <span class="sub_total d-block">
            Thành Tiền: <strong>{{ crf($cart->options->sub_total) }}</strong>
        </span>
        <button class="delete__cart d-inline-block" data-rowId="{{ $cart->rowId }}">
            <i class="fas fa-trash"></i> Xoá
        </button>
    </div>
</div>
