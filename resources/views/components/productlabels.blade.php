<div class="product__item--labels">
    @if (is_product_new($product->created_at))
        <span class="new label">MỚI</span>
    @endif
    @if ($product->status != 1)
        @if ($product->status === 2)
            <span class="stock-call stock-2 label">CALL {{ getVal('switchboard')->value }}</span>
        @endif
        <span class="stock-{{ $product->status }} stock label">{{ stock_stt($product->status) }}</span>

    @endif

    @if (is_product_hot($product->num_orders))
        <span class="hl-{{ $product->stock }} hl label">HOT</span>
    @endif
</div>
