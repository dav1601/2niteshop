<?php
    $slides = collect($slides)->groupBy('status');
    $check = $slides->first()[0]->status == 1;
    if (!$check) {
        $slides = $slides->reverse();
    }
?>


<div class="row w-100">
    <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stt => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <ul class="col-6 stt-<?php echo e($stt); ?> px-2">
            <h5 class="card-header text-center"> <?php echo e($stt == 1 ? 'Hoạt động' : 'Chờ'); ?> </h5>
            <?php
                $items = collect($items)->sortBy('index');
            ?>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal64467c3227c8bf0927bac82415768dd95f7d0da9 = $component; } ?>
<?php $component = App\View\Components\Admin\Slides\Show\Item::resolve(['slide' => $item] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.slides.show.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Slides\Show\Item::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal64467c3227c8bf0927bac82415768dd95f7d0da9)): ?>
<?php $component = $__componentOriginal64467c3227c8bf0927bac82415768dd95f7d0da9; ?>
<?php unset($__componentOriginal64467c3227c8bf0927bac82415768dd95f7d0da9); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/slides/show.blade.php ENDPATH**/ ?>