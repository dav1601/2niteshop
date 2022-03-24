# Authenticating requests

<?php if(!$isAuthed): ?>
This API is not authenticated.
<?php else: ?>
<?php echo $authDescription; ?>


<?php echo $extraAuthInfo; ?>

<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\nava\vendor\knuckleswtf\scribe\resources\views\markdown\auth.blade.php ENDPATH**/ ?>