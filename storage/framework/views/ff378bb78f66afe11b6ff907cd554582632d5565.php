<?php $__env->startSection('import_js'); ?>
<script src="<?php echo e($file->ver('client/app/js/user.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('margin'); ?> option__profile <?php $__env->stopSection(); ?>
<?php $__env->startSection('b_crumb'); ?>
Tài khoản của bạn
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rh__left'); ?>
<h1 class="my__address mb-1">Địa Chỉ Của Tôi</h1>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('class_rc'); ?> wp__address <?php $__env->stopSection(); ?>
<?php $__env->startSection('rh__right'); ?>

<button class="davi_btn--address mt-0" style="width:179px" data-toggle="modal" data-target="#addAddress">
    <i class="fas fa-plus pr-2"></i>
    Thêm địa chỉ
</button>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('rc'); ?>
<div id="rc__address">
    <?php $__currentLoopData = $user_address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if (isset($component)) { $__componentOriginal18a78e27bc1a31dfd5fb565537e33ae627d74fe9 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Client\Account\Address\Item::class, ['address' => $address]); ?>
<?php $component->withName('client.account.address.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18a78e27bc1a31dfd5fb565537e33ae627d74fe9)): ?>
<?php $component = $__componentOriginal18a78e27bc1a31dfd5fb565537e33ae627d74fe9; ?>
<?php unset($__componentOriginal18a78e27bc1a31dfd5fb565537e33ae627d74fe9); ?>
<?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php if (isset($component)) { $__componentOriginal6526de6096dddf9189cb31c7acb41fe1f4c326e9 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Client\Modal\Editaddress::class, []); ?>
<?php $component->withName('client.modal.editaddress'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6526de6096dddf9189cb31c7acb41fe1f4c326e9)): ?>
<?php $component = $__componentOriginal6526de6096dddf9189cb31c7acb41fe1f4c326e9; ?>
<?php unset($__componentOriginal6526de6096dddf9189cb31c7acb41fe1f4c326e9); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginal19f1290b4242ffd93f93474da1797064c525805f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Client\Modal\Address::class, []); ?>
<?php $component->withName('client.modal.address'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal19f1290b4242ffd93f93474da1797064c525805f)): ?>
<?php $component = $__componentOriginal19f1290b4242ffd93f93474da1797064c525805f; ?>
<?php unset($__componentOriginal19f1290b4242ffd93f93474da1797064c525805f); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\client\user\address.blade.php ENDPATH**/ ?>