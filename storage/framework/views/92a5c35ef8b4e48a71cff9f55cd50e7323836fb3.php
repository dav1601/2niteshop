<li class="card secsion__home my-3" data-index="<?php echo e($index); ?>">
    <div class="card-header cursor-pointer">
        <div class="d-flex justify-content-between">
            <div class="secsion__home--header">
                Section-<?php echo e($index + 1); ?>

            </div>
            <div class="section__home--action">
                <button type="button" class="btn btn-primary section__home--delete" data-id="<?php echo e($showid); ?>"
                    data-index="<?php echo e($index); ?>"><i class="fa-solid fa-trash"></i></button>
            </div>
        </div>
    </div>
    <div class="card-body text-center">
        <?php
            $name = 'section-category-' . $index . '[]';
            $id = 'category__section-' . $index;
            $attr = 'data-index=' . $index . ' ' . 'section-id=' . $idSection;
            $idard = 'section-accord-' . $index;
        ?>
        <?php if (isset($component)) { $__componentOriginal14ccd556195a083e2011d1951fb32f245d8802c5 = $component; } ?>
<?php $component = App\View\Components\Admin\Product\Categories::resolve(['show' => $show,'classcoll' => 'section-home-coll','name' => $name,'class' => 'section__category','id' => $id,'customattr' => $attr,'selected' => $selected,'idard' => $idard] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.product.categories'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Product\Categories::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal14ccd556195a083e2011d1951fb32f245d8802c5)): ?>
<?php $component = $__componentOriginal14ccd556195a083e2011d1951fb32f245d8802c5; ?>
<?php unset($__componentOriginal14ccd556195a083e2011d1951fb32f245d8802c5); ?>
<?php endif; ?>
    </div>
</li>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/section/home.blade.php ENDPATH**/ ?>