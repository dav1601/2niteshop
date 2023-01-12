<div id="biad__header--top">
    <div class="header__content">
        <div class="d-flex justify-content-between align-items-center container">
            <div class="header__content--logo">
                <a href="<?php echo e(route('home')); ?>" class="d-block">
                    <img src="<?php echo e($file->ver_img(getVal('logo')->value)); ?>" alt="logo" width="169" height="90">
                </a>
            </div>
            <div class="header__content--search">
                <form action="<?php echo e(route('search_main')); ?>" method="get" class="d-flex position-relative"
                    value="">
                    <input type="text" name="keyword" id="search"
                        value="<?php if(Request::has('keyword')): ?> <?php echo e(Request::get('keyword')); ?> <?php endif; ?>"
                        placeholder="Nhập từ khoá sản phẩm cần tìm.....">
                    <button type="submit"><i class="fas fa-search"></i></button>
                    <div id="resultQuery" class="position-absolute">
                        <div id="arrow" class="position-relative">
                            <div class="arrow-up"></div>
                        </div>
                        <ul id="list_result"></ul>
                    </div>
                </form>
            </div>
            <div class="header__content--info">
                <ul class="info__menu">
                    
                    <?php if(Auth::check()): ?>
                        <li class="info__menu--item account-auth">
                            <a href="<?php echo e(route('profile')); ?>" class="d-block">
                                <div class="item__content">
                                    <i class="fas fa-user-check"></i>
                                    <div class="text">
                                        <span class="text-1 d-block">Tài Khoản</span>
                                        <span class="text-2 d-block">Sửa/Đăng xuất</span>
                                    </div>
                                </div>
                            </a>
                            <div class="b1ad__drop">
                                <ul class="b1ad__drop--menu">
                                    <li class="b1ad__drop--item">
                                        <div class="arrow-up"></div>
                                        <a href="<?php echo e(route('profile')); ?>">
                                            <i class="fas fa-user-edit not pr-1"></i>
                                            <span>Sửa tài khoản</span>
                                        </a>
                                        <a href="<?php echo e(route('purchase')); ?>">
                                            <i class="fas fa-receipt not pr-1"></i>
                                            <span>Đơn hàng</span>
                                        </a>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt not pr-1"></i>
                                            <span>Đăng Xuất</span>
                                        </a>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                            class="d-none">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php else: ?>
                        <li class="info__menu--item account-1">
                            <a href="<?php echo e(route('login')); ?>" class="d-block">
                                <div class="item__content">
                                    <i class="fas fa-user"></i>
                                    <div class="text">
                                        <span class="d-block text-1">Tài khoản</span>
                                        <span class="text-2 d-block">Đăng nhập/Đăng ký</span>
                                    </div>
                                </div>
                            </a>
                            <div class="b1ad__drop">
                                <ul class="b1ad__drop--menu">
                                    <li class="b1ad__drop--item">
                                        <div class="arrow-up"></div>
                                        <a href="<?php echo e(route('login')); ?>">
                                            <i class="fas fa-sign-in-alt not pr-1"></i>
                                            <span>Đăng Nhập</span>
                                        </a>
                                        <a href="<?php echo e(route('register')); ?>">
                                            <i class="fas fa-sign-in-alt not pr-1"></i>
                                            <span>Đăng Ký</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>
                    
                    <li class="info__menu--item pay-slow">
                        <a href="<?php echo e(url('pages/dich-vu-tra-gop-tai')); ?>" class="d-block">
                            <div class="item__content">
                                <i class="fas fa-dollar-sign"></i>
                                <div class="text">
                                    <span class="d-block text-1">Trả Góp</span>
                                    <span class="text-2 d-block">Lãi suất chỉ từ 0%</span>
                                </div>
                            </div>
                        </a>

                    </li>
                    
                    <li class="info__menu--item contact">
                        <a href="<?php echo e(route('contact')); ?>" class="d-block">
                            <div class="item__content">
                                <i class="fas fa-phone-alt"></i>
                                <div class="text">
                                    <span class="text-1 d-block">Liên hệ</span>
                                    <span class="text-2 d-block">với chúng tôi</span>
                                </div>
                            </div>
                        </a>

                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/header/top.blade.php ENDPATH**/ ?>