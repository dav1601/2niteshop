<?php if(session('success')): ?>
    <script>
        let message = <?php echo e(session('success')); ?>;
        toastr.success(message);
    </script>
<?php elseif(session('error')): ?>
    <script>
        let message = <?php echo e(session('error')); ?>;
        toastr.error(message);
    </script>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/layout/response.blade.php ENDPATH**/ ?>