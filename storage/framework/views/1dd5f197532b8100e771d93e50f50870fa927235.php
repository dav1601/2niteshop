<?php if(count($selected) > 0): ?>
    <?php $__currentLoopData = $selected; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="modal__select--tag-item badge badge-primary c-pointer my-2 mr-2" style="flex-grow: 0; flex-shrink:0"
            data-id="<?php echo e($id); ?>">
            <span class="d-block"> <?php echo e($name); ?> <i class="fa-solid fa-xmark ml-2"></i></span>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/tags/select.blade.php ENDPATH**/ ?>