<div class="product__item--labels">
    @if (is_product_new($product->created_at))
        <span class="new label">MỚI</span>
    @endif
    @if ($product->stock != 1)
        <span class="stock-{{ $product->stock }} stock label">{{ stock_stt($product->stock) }}</span>
    @endif
    @if ($product->highlight == 2)
        <span class="hl-{{ $product->stock }} hl label">HOT</span>
    @endif
</div>
