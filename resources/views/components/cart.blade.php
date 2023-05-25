<div class="cart__item flex-wrap">
    <div class="cart__item--image">
        <a href="{{ route('detail_product', ['slug' => $cart->options->slug]) }}" class="d-block">
            <img src="{{ $file->ver_img($cart->options->image) }}" width="100" alt="{{ $cart->name }}"
                class="img-fluid">
        </a>
    </div>
    <input type="hidden" id="cart__options-{{ $cart->id }}" value="{{ $cart->options->ins }}">
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

        @if ($cart->options->ins != 0)
            <div class="ins">
                @foreach (explode(',', $cart->options->ins) as $key => $value)
                    @php
                        $ins = App\Models\Insurance::where('id', $value)->first();
                    @endphp
                    @if ($ins)
                        <strong>{{ $ins->name }}</strong>
                    @endif
                @endforeach
            </div>
        @endif
        <div class="qty">
            <div class="btn__type">
                <a class="btn-number py-0" @if ($cart->qty == 1) disabled @endif data-type="minus"
                    data-id="{{ $cart->id }}" data-field="qty[{{ $cart->id }}]"><i
                        class="fas fa-minus"></i></a>
            </div>
            <input type="text" name="qty[{{ $cart->id }}]" min="1" max="1000" class="input-number"
                data-id="{{ $cart->id }}" data-ajax="{{ true }}" value="{{ $cart->qty }}"
                id="{{ 'qty-product-' . $cart->id }}">
            <div class="btn__type">
                <a class="btn-number py-0" @if ($cart->qty == 100) disabled @endif data-type="plus"
                    data-id="{{ $cart->id }}" data-field="qty[{{ $cart->id }}]"><i
                        class="fas fa-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="cart__item--action d-flex flex-column justify-content-end cia-{{ $cart->id }}">
        <span class="sub_total d-block">
            Thành Tiền: <strong id="cart-sub-total-{{ $cart->id }}">{{ crf($cart->options->sub_total) }}</strong>
        </span>
        <button class="delete__cart d-inline-block" data-rowId="{{ $cart->rowId }}">
            <i class="fas fa-trash"></i> Xoá
        </button>
    </div>
</div>
