<div class="row w-100 cart-handler mx-0">
    @if ($product->stock == 1 && $product->price != 0)
        <div class="qty col-1 d-flex w-100 p-0">
            <input type="text" name="qty[{{ $product->id }}]" data-id="{{ $product->id }}" value="1"
                id="{{ 'qty-product-' . $product->id }}" min="1" max="100" class="w-100 input-number">
            <div class="btn__type d-flex flex-column">
                <a class="btn-number py-0" data-type="plus" data-field="qty[{{ $product->id }}]"><i
                        class="fas fa-plus"></i></a>
                <a class="btn-number py-0" data-type="minus" data-field="qty[{{ $product->id }}]"><i
                        class="fas fa-minus"></i></a>
            </div>
        </div>

        <a class="btn-cart col-11 p-0" data-id="{{ $product->id }}" id="{{ 'btn-add-cart-' . $product->id }}"
            data-qty="1" data-op="{{ $options }}">
            <i class="fas fa-shopping-bag"></i>
            <span>Thêm Giỏ Hàng</span>
        </a>
    @else
        <a class="col-12 btn-preOrder" data-id="{{ $product->id }}" id="preOrder">
            <i class="fas fa-shopping-bag"></i>
            <span>Đặt Hàng Ngay</span>
        </a>
    @endif
</div>
