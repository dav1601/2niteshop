<div id="headerForAdmin">
    <header class="header">
        <a href="#" class="header__logo">iilhamriz</a>

        <ion-icon name="menu-outline" class="header__toggle" id="nav-toggle"></ion-icon>

        <nav class="nav" id="nav-menu">
            <div class="nav__content bd-grid">

                <ion-icon name="close-outline" class="nav__close" id="nav-close"></ion-icon>

                <div class="nav__perfil">
                    <div class="nav__img">
                        <img src="<?php echo e($daviUser->getAvatarUser(Auth::id())); ?>" alt="" height="100%" width="100%">
                    </div>
                    <div>
                    <a href="<?php echo e(route('admin_profile' ,['id'=>Auth::id()])); ?>" target="_blank" class="nav__name"><?php echo e(Auth::user()->name); ?></a>
                        <span class="nav__profesion"><?php echo e($daviUser->getRoleUser(Auth::id())); ?></span>
                    </div>
                </div>

                <div class="nav__menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="<?php echo e(route('home')); ?>" target="_blank"  class="nav__link active">Trang chủ</a></li>
                        <li class="nav__item"><a href="<?php echo e(route('dashboard')); ?>" target="_blank" class="nav__link">Dashboard</a></li>
                        <li class="nav__item"><a href="<?php echo e(route('show_product')); ?>" target="_blank" class="nav__link">Sản Phẩm</a></li>
                        <li class="nav__item"><a href="<?php echo e(route('setting_profile' , ['id'=>Auth::id()])); ?>" target="_blank" class="nav__link">Cài Đặt</a></li>
                        <?php if($daviUser->ApiExists()): ?>
                        <li class="nav__item"><a href="<?php echo e(route('identity_confirmation')); ?>" target="_blank" class="nav__link">Api Docs</a></li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="nav__social">
                    <a href="#" class="nav__social-icon"><ion-icon name="logo-facebook"></ion-icon></a>
                    <a href="#" class="nav__social-icon"><ion-icon name="logo-instagram"></ion-icon></a>
                    <a href="#" class="nav__social-icon"><ion-icon name="logo-github"></ion-icon></a>
                    <a href="#" class="nav__social-icon"><ion-icon name="logo-linkedin"></ion-icon></a>

                </div>
            </div>
        </nav>
    </header>
</div>

<?php /**PATH E:\xampp\htdocs\nava\resources\views\components\admin\navbar.blade.php ENDPATH**/ ?>