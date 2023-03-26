<div id="admin-cate-collapse-<?php echo e($category->id); ?>" class="multi-collapse admin-cate-collapse collapse"
    data-id="<?php echo e($category->id); ?>" data-lv="<?php echo e($category->level + 1); ?>">
    <ul class="admin-cate admin-cate-connect lv-<?php echo e($category->level + 1); ?>" data-id="<?php echo e($category->id); ?>"
        data-lv="<?php echo e($category->level + 1); ?>" id="admin-cate-<?php echo e($category->id); ?>">
        <?php if (isset($component)) { $__componentOriginal8dfd7164f23edfceef9d5b00d69c950cc5e7cefa = $component; } ?>
<?php $component = App\View\Components\Admin\Category\Dd\Item::resolve(['categories' => $category->children] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.category.dd.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Category\Dd\Item::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8dfd7164f23edfceef9d5b00d69c950cc5e7cefa)): ?>
<?php $component = $__componentOriginal8dfd7164f23edfceef9d5b00d69c950cc5e7cefa; ?>
<?php unset($__componentOriginal8dfd7164f23edfceef9d5b00d69c950cc5e7cefa); ?>
<?php endif; ?>
    </ul>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/category/dd/collapse.blade.php ENDPATH**/ ?>