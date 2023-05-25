@php
    $qty = $custom['qty'];
    $class = '';

@endphp
<div class="row w-100 cart-handler {{ 'cart-handler-' . $product->id }} mx-0">
    @if ($product->status === 1)
        <div class="qty col-1 d-flex w-100 p-0">
            <input type="text" name="qty[{{ $product->id }}]" data-id="{{ $product->id }}" value="{{ $qty }}"
                id="{{ 'qty-product-' . $product->id }}" min="1" max="100" class="w-100 input-number">
            {{-- --- --}}
            <input type="hidden" value="{{ $options }}" id="{{ 'cart__options-' . $product->id }}">
            {{-- --- --}}
            <div class="btn__type d-flex flex-column">
                <a class="btn-number py-0" @if ($qty == 100) disabled @endif data-type="plus"
                    data-ajax="{{ $ajax }}" data-id="{{ $product->id }}"
                    data-field="qty[{{ $product->id }}]"><i class="fas fa-plus"></i></a>
                <a class="btn-number @if ($qty == 1) disabled @endif py-0"
                    data-ajax="{{ $ajax }}" data-type="minus" data-id="{{ $product->id }}"
                    data-field="qty[{{ $product->id }}]"><i class="fas fa-minus"></i></a>
            </div>
        </div>

        <a class="btn-cart col-11 p-0" data-id="{{ $product->id }}" id="{{ 'btn-add-cart-' . $product->id }}">
            <div class="btn-cart-add">
                <i class="fas fa-shopping-bag"></i>
                <span>Thêm Giỏ Hàng</span>
            </div>
            <img src="https://res.cloudinary.com/vanh-tech/image/upload/v1673454469/web-layout-images/Spinner-1s-200px_1_rcuxmn.gif"
                class="d-none btn-cart-loading" alt="loading-cart">
        </a>
    @else
        <a class="col-12 btn-preOrder" data-id="{{ $product->id }}" id="preOrder">
            <i class="fas fa-shopping-bag"></i>
            <span class="text-uppercase">đặt mua - preorder</span>
        </a>
    @endif
</div>
