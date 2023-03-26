<?php
    $idFor = 'for' . $id;
?>
<div class="form-group <?php echo e($class); ?> mb-5">
    <div class="custom-file">
        <input type="file" name="<?php echo e($multiple ? $name . '[]' : $name); ?>" class="custom-file-input dav-input-file"
            <?php if($multiple): ?> multiple <?php endif; ?> id="<?php echo e($id); ?>">
        <label class="custom-file-label" for="<?php echo e($id); ?>" id="<?php echo e($idFor); ?>"> <?php echo e($custom['plh']); ?> </label>
    </div>
    <?php
        $name = $multiple ? $name . '.*' : $name;
    ?>
    <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
            <?php echo e($message); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/form/file.blade.php ENDPATH**/ ?>