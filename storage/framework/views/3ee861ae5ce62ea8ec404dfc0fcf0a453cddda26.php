<div id="biad__header--top" class="d-none resposive position-relative">
    <div class="header__content--search --mobile d-none position-absolute w-100">
        <form action="<?php echo e(route('search_main')); ?>" method="get" class="d-flex position-relative" value="">
            <input type="text" name="keyword" id="search_term"
                value="<?php if(Request::has('keyword')): ?> <?php echo e(Request::get('keyword')); ?><?php endif; ?>"
                placeholder="Nhập từ khoá sản phẩm cần tìm.....">
            <button type="submit"><i class="fas fa-search"></i></button>
            <div id="resultQuery" class="position-absolute rsQueryMobile pt-0">
                <ul id="list_result" class="list_mobile"></ul>
            </div>
        </form>
    </div>
    <div class="header__content">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="header__content--logo">
                <a href="<?php echo e(route('home')); ?>" class="d-block">
                    <img src="<?php echo e($file->ver_img('client/images/logo.png')); ?>" alt="">
                </a>
            </div>
            <div class="header__content--action d-flex align-items-center">
                <div class="menu-trigger">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="mobile__search--wrapper ml-4">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <div class="mobile__cart--wrapper ml-4 position-relative">
                    <span id="count_mobile"  class="position-absolute"><?php echo e(Cart::instance('shopping')->count()); ?></span>
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\nava\resources\views/components/header/mobile/toprespon.blade.php ENDPATH**/ ?>