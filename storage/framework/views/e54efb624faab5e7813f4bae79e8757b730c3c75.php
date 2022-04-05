<div class="ml-0 mr-0 mb-3 mt-3 d-none" id="menu__mini--user">
    <div class="row mx-0 justify-content-between align-items-center niteshop__brcUser">
        <div class="col-3 px-0 niteshop__brcUser--item  <?php if($name == "profile"): ?> niteshop__brcUser--active <?php endif; ?>">
            <a href="<?php echo e(route('profile')); ?>">Hồ Sơ</a>
        </div>
        <div class="col-3 px-0 niteshop__brcUser--item <?php if($name == "address"): ?> niteshop__brcUser--active <?php endif; ?>">
            <a href="<?php echo e(route('address')); ?>">Địa chỉ</a>
        </div>
        <div class="col-3 px-0 niteshop__brcUser--item">
            <a href="<?php echo e(route('profile')); ?>">Đổi mật khẩu</a>
        </div>
        <div class="col-3 px-0 niteshop__brcUser--item <?php if($name == "purchase"): ?> niteshop__brcUser--active <?php endif; ?>">
            <a href="<?php echo e(route('purchase')); ?>">Đơn mua</a>
        </div>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\nava\resources\views/components/client/account/menumini.blade.php ENDPATH**/ ?>