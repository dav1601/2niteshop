@php
    $options = explode(',', $cart->options->ins);
@endphp
<div class="cart__item">
    <div class="cart__item--image">
        <a href="{{ route('detail_product', ['slug' => $cart->options->slug]) }}" class="d-block">
            <img src="{{ urlImg($cart->options->image, 'media') }}" width="100" alt=" {{ $cart->name }} ">
        </a>
    </div>
    <div class="cart__item--caption">
        <a href="{{ route('detail_product', ['slug' => $cart->options->slug]) }}" class="d-block name">
            {{ $cart->name }}
        </a>
        <span class="d-block model">
            Model: {{ $cart->options->model }}
        </span>
        <span class="d-block price">
            Giá sản phẩm: {{ crf($cart->price) }}
        </span>
        @if (count($options) > 0)
            <div class="ins">
                @foreach ($options as $key => $cs_op)
                    @php
                        $cs_ins = App\Models\Insurance::where('id', '=', $cart->options->ins)->first();
                    @endphp
                    @if ($cs_ins)
                        <strong>{{ $cs_ins->name }}</strong>
                    @endif
                @endforeach
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
