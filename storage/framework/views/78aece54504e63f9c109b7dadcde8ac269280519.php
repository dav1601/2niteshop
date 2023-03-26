<li class="pgb-package init-sort-package trans-025-all w-100" pack-id="<?php echo e($package['id']); ?>" data-type="package-item"
    id="pgb-package-<?php echo e($package['id']); ?>" cid="<?php echo e($package['cid']); ?>">
    <div class="w-100 d-flex justify-content-around align-items-center">
        <div class="pgb-package-name text-uppercase">
            <?php echo e($package['payload']['type']); ?>

        </div>
        <div class="pbg-package-act d-flex justify-content-center align-items-center">
            <i class="fa-regular fa-pen-to-square pack-edit" data-type="<?php echo e($package['payload']['type']); ?>"
                pack-id="<?php echo e($package['id']); ?>" cid="<?php echo e($package['cid']); ?>"></i>
            <i class="fa-regular fa-trash-can pack-remove" cid="<?php echo e($package['cid']); ?>"
                data-type="<?php echo e($package['payload']['type']); ?>" pack-id="<?php echo e($package['id']); ?>"></i>
        </div>
    </div>
</li>

<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/pagebuilder/package.blade.php ENDPATH**/ ?>