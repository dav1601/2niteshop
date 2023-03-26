<?php $__env->startSection('import_js'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo e($file->ver('admin/app/js/page_builder.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('name'); ?>
    Thêm Sản Phẩm
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="create-page-builder">
        <?php if (isset($component)) { $__componentOriginalb2c7a6916e7f493b0da21a7fc3e303e6e581c65e = $component; } ?>
<?php $component = App\View\Components\Admin\Pagebuilder\Create::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.pagebuilder.create'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Pagebuilder\Create::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb2c7a6916e7f493b0da21a7fc3e303e6e581c65e)): ?>
<?php $component = $__componentOriginalb2c7a6916e7f493b0da21a7fc3e303e6e581c65e; ?>
<?php unset($__componentOriginalb2c7a6916e7f493b0da21a7fc3e303e6e581c65e); ?>
<?php endif; ?>
    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/admin/pagebuilder/create.blade.php ENDPATH**/ ?>