<div class="product__item--labels">
    <?php if($product->new == 1): ?>
    <span class="new label">MỚI</span>
    <?php endif; ?>
    <?php if($product->stock != 1 ): ?>
    <span class="stock-<?php echo e($product->stock); ?> stock label"><?php echo e(stock_stt($product->stock)); ?></span>
    <?php endif; ?>
    <?php if($product->highlight == 2 ): ?>
    <span class="hl-<?php echo e($product->stock); ?> hl label">HOT</span>
    <?php endif; ?>
</div><?php /**PATH E:\xampp\htdocs\nava\resources\views/components/productlabels.blade.php ENDPATH**/ ?>