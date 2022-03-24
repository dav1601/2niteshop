<?php $__currentLoopData = $groupedEndpoints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h1 id="<?php echo Str::slug($group['name']); ?>"><?php echo $group['name']; ?></h1>

    <?php echo Parsedown::instance()->text($group['description']); ?>


    <?php $__currentLoopData = $group['endpoints']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $endpoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make("scribe::themes.default.endpoint", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php /**PATH E:\xampp\htdocs\nava\vendor\knuckleswtf\scribe\resources\views\themes\default\groups.blade.php ENDPATH**/ ?>