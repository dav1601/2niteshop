<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['label', 'class', 'required' => false]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['label', 'class', 'required' => false]); ?>
<?php foreach (array_filter((['label', 'class', 'required' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php
    $idFor = 'for' . $id;
?>

<div class="form-group <?php echo e($class); ?>">
    <?php if(isset($label)): ?>
        <?php if (isset($component)) { $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Label::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($label),'required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($required)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21)): ?>
<?php $component = $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21; ?>
<?php unset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21); ?>
<?php endif; ?>
    <?php endif; ?>
    <div class="custom-file">
        jpeg,png,jpg,tiff,svg
        <input type="file" name="<?php echo e($multiple ? $name . '[]' : $name); ?>"
            accept="image/png, image/jpeg, image/svg, image/tiff, image/jpg " class="custom-file-input dav-input-file"
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