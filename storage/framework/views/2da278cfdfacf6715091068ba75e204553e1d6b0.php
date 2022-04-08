<div class="va-checkbox va-checkbox-<?php echo e($blog->id); ?> d-flex align-items-center w-100">
    <input type="checkbox" name="<?php echo e($name); ?>[]" value="<?php echo e($blog -> id); ?>"
        id="<?php echo e($prefix); ?>__<?php echo e($blog -> id); ?>" class="check_plc <?php echo e($class); ?>" <?php if(in_array($blog->id , $array)): ?> checked <?php endif; ?> >
    <label for="<?php echo e($prefix); ?>__<?php echo e($blog -> id); ?>" >
        <?php echo e($blog -> title); ?> 
    </label>
</div>

<?php /**PATH E:\xampp\htdocs\nava\resources\views\components\admin\blogs\checkbox.blade.php ENDPATH**/ ?>