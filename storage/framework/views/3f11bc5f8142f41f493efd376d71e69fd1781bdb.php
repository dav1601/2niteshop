<li class="pgb-section mb-4 init-sort" data-id="<?php echo e($section->id); ?>" id="pgb-section-<?php echo e($section->id); ?>"
    data-ord="<?php echo e(isset($section->ord) ? $section->ord : 'none'); ?>" data-type="section-item">
    <div class="pgb-section-act">
        <div class="item move" sid="<?php echo e($section->id); ?>" data-ord="<?php echo e(isset($section->ord) ? $section->ord : 'none'); ?>">
            <i class="fa-solid fa-maximize"></i>
        </div>
        <div class="item layout" sid="<?php echo e($section->id); ?>">
            <i class="fa-solid fa-grip"></i>
        </div>
        <div class="item edit" sid="<?php echo e($section->id); ?>">
            <i class="fa-regular fa-pen-to-square"></i>
        </div>
        <div class="item remove" sid="<?php echo e($section->id); ?>">
            <i class="fa-regular fa-trash-can"></i>
        </div>
    </div>
    <div class="pgb-section-body">
        <?php if (isset($component)) { $__componentOriginalc85c08dffe6b16c159bc9270c4b32e7a6d569ad3 = $component; } ?>
<?php $component = App\View\Components\Admin\Pagebuilder\Column::resolve(['isCreate' => true,'section' => $section] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.pagebuilder.column'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Pagebuilder\Column::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc85c08dffe6b16c159bc9270c4b32e7a6d569ad3)): ?>
<?php $component = $__componentOriginalc85c08dffe6b16c159bc9270c4b32e7a6d569ad3; ?>
<?php unset($__componentOriginalc85c08dffe6b16c159bc9270c4b32e7a6d569ad3); ?>
<?php endif; ?>
    </div>


</li>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/pagebuilder/section/item.blade.php ENDPATH**/ ?>