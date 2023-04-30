<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($cat->id); ?>" <?php if(collect($cat)->get($key) == $selected): ?> selected <?php endif; ?>>
        <?php echo e(str_repeat('--', $cat->level)); ?>

        <?php echo e($cat->name); ?>

    </option>
    <?php if($cat->children): ?>
        <?php if (isset($component)) { $__componentOriginalc9001fce224566214481bc365a1025e7bd824b18 = $component; } ?>
<?php $component = App\View\Components\Admin\Form\Select\Option::resolve(['selected' => $selected,'key' => $key,'categories' => $cat->children] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.select.option'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\Select\Option::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc9001fce224566214481bc365a1025e7bd824b18)): ?>
<?php $component = $__componentOriginalc9001fce224566214481bc365a1025e7bd824b18; ?>
<?php unset($__componentOriginalc9001fce224566214481bc365a1025e7bd824b18); ?>
<?php endif; ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/form/select/option.blade.php ENDPATH**/ ?>