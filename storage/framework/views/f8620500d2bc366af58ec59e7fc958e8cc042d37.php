<input type="hidden" name="" value=" <?php echo e(URL::current()); ?> " id="index_current_url">
<?php if(Auth::check()): ?>
<input type="hidden" name="" value="<?php echo e($daviUser->getAvatarUser(Auth::id())); ?>" id="user__info--avatar">
<?php endif; ?>



<?php /**PATH E:\xampp\htdocs\nava\resources\views\components\ajax.blade.php ENDPATH**/ ?>