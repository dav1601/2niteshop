<div class="product__item--labels">
    @if ($product->new == 1)
    <span class="new label">MỚI</span>
    @endif
    @if ($product->stock != 1 )
    <span class="stock-{{ $product->stock }} stock label">{{ stock_stt($product->stock) }}</span>
    @endif
    @if ($product->highlight == 2 )
    <span class="hl-{{ $product->stock }} hl label">HOT</span>
    @endif
</div>