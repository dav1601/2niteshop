@php
$prd = App\Models\Products::where('id', '=' , $cart->id)->first();
@endphp
<div class="cart__item">
    <div class="cart__item--image">
        <a href="{{ route('detail_product', ['slug'=>$prd->slug]) }}" class="d-block">
            <img src="{{ $file->ver_img($cart->options->image) }}" width="100" alt="">
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
            <span>Chế độ bảo hành: <strong>{{ App\Models\Insurance::where('id', '=' , $cart->options->ins
                    )->first()->name }}</strong></span>
        </div>
        @endif
        <div class="qty">
            <span>Số Lượng: x <strong>{{ $cart->qty }}</strong></span>
        </div>
    </div>
    <div class="cart__item--action cia-{{ $cart->id }} d-flex flex-column justify-content-end">
        <span class="sub_total d-block">
            Thành Tiền: <strong>{{ crf($cart->options->sub_total) }}</strong>
        </span>
    </div>
</div>
