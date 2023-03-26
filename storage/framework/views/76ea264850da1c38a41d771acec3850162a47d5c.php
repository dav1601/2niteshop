<?php $__env->startSection('import_js'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo e($file->ver('admin/app/js/page_builder.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('name'); ?>
    Thêm Sản Phẩm
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="create-page-builder">
        <?php if (isset($component)) { $__componentOriginalc3a6cfaea5af6a42a2a1686da87a3b5120e540ea = $component; } ?>
<?php $component = App\View\Components\Admin\PageBuilder\Create::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.page-builder.create'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\PageBuilder\Create::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3a6cfaea5af6a42a2a1686da87a3b5120e540ea)): ?>
<?php $component = $__componentOriginalc3a6cfaea5af6a42a2a1686da87a3b5120e540ea; ?>
<?php unset($__componentOriginalc3a6cfaea5af6a42a2a1686da87a3b5120e540ea); ?>
<?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/admin/page-builder/create.blade.php ENDPATH**/ ?>