<?php $__env->startSection('import_js'); ?>
<script src="<?php echo e($file->ver('client/app/js/user.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('margin'); ?> option__profile <?php $__env->stopSection(); ?>
<?php $__env->startSection('b_crumb'); ?>
Đơn hàng của bạn
<?php $__env->stopSection(); ?>
<?php $__env->startSection('purchase'); ?>
<div id="wp__purchase">
    <input type="hidden" name="" id="url__origin--purchase" value="<?php echo e($origin); ?>">
    <div id="purchase__layout">
        <?php if (isset($component)) { $__componentOriginal46db42b3916d4a5efb7156492fab238659c05d6c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Client\Account\Purchase\Layout::class, ['type' => $type]); ?>
<?php $component->withName('client.account.purchase.layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal46db42b3916d4a5efb7156492fab238659c05d6c)): ?>
<?php $component = $__componentOriginal46db42b3916d4a5efb7156492fab238659c05d6c; ?>
<?php unset($__componentOriginal46db42b3916d4a5efb7156492fab238659c05d6c); ?>
<?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\client\user\purchase.blade.php ENDPATH**/ ?>