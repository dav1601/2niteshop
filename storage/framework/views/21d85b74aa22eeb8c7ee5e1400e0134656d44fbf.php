<li class="slide-item slide-item-<?php echo e($slide->id); ?>" slide-stt="<?php echo e($slide->status); ?>" slide-id="<?php echo e($slide->id); ?>"
    slide-index="<?php echo e($slide->index); ?>">
    <div class="slide-item-wp">
        <div class="d-flex justify-content-between align-items-center">
            <?php if($slide->status == 1): ?>
                <div class="slide-item-dd" data-id="<?php echo e($slide->id); ?>">
                    <i class="fa-solid fa-bars"></i>
                </div>
            <?php endif; ?>
            <div class="slide-item-info d-flex justify-content-between align-items-center" style="flex:1">
                <img src="<?php echo e($file->ver_img($slide->img)); ?>" style="flex:1;height:300px" alt="">
                <div class="--act d-flex">
                    <i class="fa-solid fa-pen-to-square slide-item-edit" data-id="<?php echo e($slide->id); ?>"></i>
                    <i class="fa-solid fa-trash slide-item-remove" data-id="<?php echo e($slide->id); ?>"></i>
                    <div class="switch">
                        <input type="checkbox" id="<?php echo e('switch-slide-' . $slide->id); ?>" data-id="<?php echo e($slide->id); ?>"
                            class="switch-slide" <?php if($slide->status == 1): ?> checked <?php endif; ?> /><label
                            for="<?php echo e('switch-slide-' . $slide->id); ?>">Toggle</label>
                    </div>
                </div>
            </div>
        </div>

    </div>
</li>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/slides/show/item.blade.php ENDPATH**/ ?>