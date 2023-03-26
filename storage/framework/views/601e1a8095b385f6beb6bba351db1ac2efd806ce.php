<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li data-lv="<?php echo e($category->level); ?>" style="margin-left: <?php echo e($category->level * 30); ?>px"
        class="admin-cate-dd <?php echo e($category->parent_id == 0 ? 'col-4 px-4 my-2' : ''); ?> justify-between"
        data-sort="<?php echo e($category->position); ?>" data-parent="<?php echo e($category->parent_id); ?>" data-id="<?php echo e($category->id); ?>"
        data-sort="<?php echo e($category->position); ?>" id="admin-cate-dd-<?php echo e($category->id); ?>">
        <div class="admin-cate-item d-flex w-100 --<?php echo e($category->id); ?> --lv-<?php echo e($category->level); ?> justify-between">
            <span class="d-block">
                <?php echo e($category->name); ?>

            </span>
            <div class="--action mr-2" style="z-index:100; ">
                <i class="fa-solid fa-pen-to-square admin-cate-edit" data-id="<?php echo e($category->id); ?>"></i>
                <?php if(count($category->children) > 0): ?>
                    <i class="fa-solid fa-plus admin-cate-show ml-3" data-id="<?php echo e($category->id); ?>"></i>
                <?php endif; ?>
            </div>
        </div>
        <?php if(count($category->children) > 0): ?>
            <?php if (isset($component)) { $__componentOriginal10e4bba7967bd657ef420e669598a97eaf136b48 = $component; } ?>
<?php $component = App\View\Components\Admin\Category\Dd\Collapse::resolve(['category' => $category] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.category.dd.collapse'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Category\Dd\Collapse::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal10e4bba7967bd657ef420e669598a97eaf136b48)): ?>
<?php $component = $__componentOriginal10e4bba7967bd657ef420e669598a97eaf136b48; ?>
<?php unset($__componentOriginal10e4bba7967bd657ef420e669598a97eaf136b48); ?>
<?php endif; ?>
        <?php endif; ?>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/category/dd/item.blade.php ENDPATH**/ ?>