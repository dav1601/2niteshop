<div class="container px-0 mobile__header d-none">
    <div class="mobile__header--wrapper">
        <div class="mobile__header--bar">
            <ul class="j__menu">
                <?php if(Auth::check()): ?>
                <li class="j__menu--item">
                    <a href="<?php echo e(route('profile')); ?>">
                        <i class="fa-solid fa-user"></i>
                        <span>Tài khoản</span>
                    </a>
                </li>
                <li class="j__menu--item">
                    <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Đăng xuất</span>
                    </a>
                </li>
                <?php else: ?>
                <li class="j__menu--item">
                    <a href="<?php echo e(route('login')); ?>">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        <span>Đăng nhập</span>
                    </a>
                </li>
                <li class="j__menu--item">
                    <a href="<?php echo e(route('register')); ?>">
                        <i class="fa-solid fa-pen-clip"></i>
                        <span>Đăng ký</span>
                    </a>
                </li>
                <?php endif; ?>
                <li class="j__menu--item">
                    <a href="<?php echo e(route('contact')); ?>">
                        <i class="fa-solid fa-phone"></i>
                        <span>Liên hệ</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</div>
<?php /**PATH /home/u217861923/domains/vachill.com/public_html/resources/views/components/header/mobile/def.blade.php ENDPATH**/ ?>