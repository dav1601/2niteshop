<div class="va-checkbox va-checkbox-<?php echo e($product->id); ?> d-flex align-items-center w-100">
    <input type="checkbox"  name="<?php echo e($name); ?>[]" value="<?php echo e($product -> id); ?>"
        id="<?php echo e($prefix); ?>__<?php echo e($product -> id); ?>" class="check_plc <?php echo e($class); ?>" <?php if(in_array($product->id , $array)): ?> checked <?php endif; ?> >
    <label for="<?php echo e($prefix); ?>__<?php echo e($product -> id); ?>" >
        <?php echo e($product -> name); ?>

    </label>
</div>


<?php /**PATH E:\xampp\htdocs\nava\resources\views\components\admin\product\checkbox.blade.php ENDPATH**/ ?>