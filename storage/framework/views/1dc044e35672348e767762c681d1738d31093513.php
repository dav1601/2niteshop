<div class="w-100">
    <div class="card">
        <div class="card-header text-center">
            <?php echo e($title); ?>

        </div>
        <div class="card-body d-flex justify-content-center">
            <input type="hidden" name="<?php echo e($name); ?>" value="<?php echo e($selected); ?>">
            <button type="button" id="" class="btn btn-primary btn-lg init__select"
                data-model="<?php echo e($model); ?>" relaName="<?php echo e($rela[0]); ?>" relaKey="<?php echo e($rela[1]); ?>"
                relaId="<?php echo e($relaId); ?>" relaModel="<?php echo e($modelRela); ?>">
                <?php echo e($text); ?>

                <span class="btn btn-outline-light"><?php echo e($selected ? count(explode(',', $selected)) : 0); ?> Item</span>
            </button>
        </div>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/relation/rela.blade.php ENDPATH**/ ?>