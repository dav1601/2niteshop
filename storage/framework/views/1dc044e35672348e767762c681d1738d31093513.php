<div class="w-100">
    <div class="card">
        <div class="card-header text-center">
            <h6> <?php echo e($title); ?></h6>
        </div>
        <div class="card-body d-flex justify-content-center">
            <input type="hidden" id="<?php echo e($id); ?>" name="<?php echo e($name); ?>" value="<?php echo e($selected); ?>">
            <?php if($onlymodel): ?>
                <button type="button" class="btn btn-primary init__select" data-model="<?php echo e($onlymodel); ?>"
                    relaName="null" relaKey="null" relaId="null" relaModel="null">
                    

                    <span class=""><?php echo e($selected ? count(explode(',', $selected)) : 0); ?>

                        Items</span>
                </button>
            <?php else: ?>
                <button type="button" class="btn btn-primary init__select" data-model="<?php echo e($model); ?>"
                    relaName="<?php echo e($rela[0]); ?>" relaKey="<?php echo e($rela[1]); ?>" relaId="<?php echo e($relaId); ?>"
                    relaModel="<?php echo e($modelRela); ?>">
                    

                    <span class=""><?php echo e($selected ? count(explode(',', $selected)) : 0); ?>

                        Items</span>
                </button>
            <?php endif; ?>

        </div>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/relation/rela.blade.php ENDPATH**/ ?>