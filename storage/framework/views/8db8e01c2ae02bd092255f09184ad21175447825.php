<b><code><?php echo e($name); ?></code></b>&nbsp;&nbsp;<?php if($type): ?><small><?php echo e($type); ?></small><?php endif; ?> <?php if(!$required): ?>
    <i>optional</i><?php endif; ?> &nbsp;
<?php if(($isInput ?? true) && empty($hasChildren)): ?>
    <?php
        $isList = Str::endsWith($type, '[]');
        $fullName =str_replace('[]', '.0', $name);
        $baseType = $isList ? substr($type, 0, -2) : $type;
        // Ignore the first '[]': the frontend will take care of it
        while (\Str::endsWith($baseType, '[]')) {
            $fullName .= '.0';
            $baseType = substr($baseType, 0, -2);
        }
        // When the body is an array, the item names will be ".0.thing"
        $fullName = ltrim($fullName, '.');
        switch($baseType) {
            case 'number':
            case 'integer':
                $inputType = 'number';
                break;
            case 'file':
                $inputType = 'file';
                break;
            default:
                $inputType = 'text';
        }
    ?>
    <?php if($type === 'boolean'): ?>
        <label data-endpoint="<?php echo e($endpointId); ?>" hidden>
            <input type="radio" name="<?php echo e($fullName); ?>"
                   value="<?php echo e($component === 'body' ? 'true' : 1); ?>"
                   data-endpoint="<?php echo e($endpointId); ?>"
                   data-component="<?php echo e($component); ?>"
            >
            <code>true</code>
        </label>
        <label data-endpoint="<?php echo e($endpointId); ?>" hidden>
            <input type="radio" name="<?php echo e($fullName); ?>"
                   value="<?php echo e($component === 'body' ? 'false' : 0); ?>"
                   data-endpoint="<?php echo e($endpointId); ?>"
                   data-component="<?php echo e($component); ?>"
            >
            <code>false</code>
        </label>
    <?php elseif($isList): ?>
        <input type="<?php echo e($inputType); ?>"
               name="<?php echo e($fullName."[0]"); ?>"
               data-endpoint="<?php echo e($endpointId); ?>"
               data-component="<?php echo e($component); ?>" hidden>
        <input type="<?php echo e($inputType); ?>"
               name="<?php echo e($fullName."[1]"); ?>"
               data-endpoint="<?php echo e($endpointId); ?>"
               data-component="<?php echo e($component); ?>" hidden>
    <?php else: ?>
        <input type="<?php echo e($inputType); ?>"
               name="<?php echo e($fullName); ?>"
               data-endpoint="<?php echo e($endpointId); ?>"
               value="<?php echo (isset($example) && (is_string($example) || is_numeric($example))) ? $example : ''; ?>"
               data-component="<?php echo e($component); ?>" hidden>
    <?php endif; ?>
<?php endif; ?>
<br>
<?php echo Parsedown::instance()->text($description); ?>

<?php /**PATH E:\xampp\htdocs\nava\resources\views\vendor\scribe\components\field-details.blade.php ENDPATH**/ ?>