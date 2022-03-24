<?php $__env->startSection('import_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="<?php echo e(asset('admin/app/js/user.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/user.js') ?>">
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('name'); ?>
Hồ sơ
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<input type="hidden" name="" value="<?php echo e(route('admin_profile_ajax')); ?>" id="load__more--url">
<input type="hidden" name="" value="<?php echo e($id); ?>" id="IdUser">
<div id="admin__profile">
    <div class="row mx-0">
        <div class="col-4 pl-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Chi tiết hồ sơ
                    </div>
                    <div class="card-body avatar__name text-center">
                        <img src="<?php echo e($daviUser->getAvatarUser($id)); ?>" class="rounded-circle mb-2"
                            alt="<?php echo e($user->name); ?>" width="128" height="128">
                        <h5 class="card-title mb-0"><?php echo e($user->name); ?></h5>
                        <div class="text-muted mb-2"><?php echo e($daviUser ->getRoleUser($id)); ?></div>
                    </div>
                    <hr>
                    <div class="card-body address">
                        <h5 class="h6 card-title">About</h5>
                        <ul id="address" class="about__contact">
                            <li class="mb-1">
                                <span><i class="fa-solid fa-house"></i> Sống tại : </span><a href="#">
                                    <?php if($profile->city != NULL): ?>
                                    <?php echo e($profile->address_1); ?>

                                    <?php else: ?>
                                    Chưa cập nhật
                                    <?php endif; ?>
                                </a>
                            </li>
                            <li class="mb-1">
                                <span><i class="fa-solid fa-building"></i> Làm việc tại : </span><a href="#">N1TE
                                    COMPANY</a>
                            </li>
                            <li class="mb-1">
                                <span><i class="fa-solid fa-location-dot"></i> Đến Từ : </span><a href="#">
                                    <?php if($profile->city != NULL): ?>
                                    <?php echo e($daviUser
                                    ->
                                    getNameWard($profile->w)); ?> , <?php echo e($daviUser -> getNameDist($profile->d)); ?> , <?php echo e($daviUser -> getNameCity($profile->city)); ?>

                                    <?php else: ?>
                                    Chưa cập nhật
                                    <?php endif; ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <hr>
                    <div class="card-body contact">
                        <h5 class="h6 card-title">Liên Hệ</h5>
                        <ul id="contact" class="about__contact">
                            <li class="mb-1">
                                <span><i class="fa-solid fa-phone"></i> Số điện thoại : </span><a
                                    href="tel:<?php echo e($user->phone); ?>"><?php echo e($user->phone); ?></a>
                            </li>
                            <li class="mb-1">
                                <span><i class="fa-solid fa-envelope"></i> Email : </span><a
                                    href="mailto:<?php echo e($user->email); ?>"><?php echo e($user->email); ?></a>
                            </li>
                            <li class="mb-1">
                                <span><i class="fa-brands fa-facebook"></i></span>
                                <?php if($profile->facebook != NULL): ?>
                                <a href="<?php echo e($profile->facebook); ?>">Facebook</a>
                                <?php else: ?>
                                <a href="#">Chưa cập nhật</a>
                                <?php endif; ?>

                            </li>
                            <li class="mb-1">
                                <span><i class="fa-brands fa-instagram-square"></i> </span>
                                <?php if($profile->instagram != NULL): ?>
                                <a href="<?php echo e($profile->instagram); ?>">Instagram</a>
                                <?php else: ?>
                                <a href="#">Chưa cập nhật</a>
                                <?php endif; ?>
                            </li>
                            <li class="mb-1">
                                <span><i class="fa-brands fa-twitter"></i></span>
                                <?php if($profile->twitter != NULL): ?>
                                <a href="<?php echo e($profile->twitter); ?>">Twitter</a>
                                <?php else: ?>
                                <a href="#">Chưa cập nhật</a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8 pr-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Hoạt động
                    </div>
                    <div class="card-body" id="wp__activities">
                        <div id="activities">
                          <?php if (isset($component)) { $__componentOriginal448ec691cf603a45185dc98a9c0befe60f4a783e = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Admin\Profile\Itemactivities::class, ['sorted' => $sorted]); ?>
<?php $component->withName('admin.profile.itemactivities'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal448ec691cf603a45185dc98a9c0befe60f4a783e)): ?>
<?php $component = $__componentOriginal448ec691cf603a45185dc98a9c0befe60f4a783e; ?>
<?php unset($__componentOriginal448ec691cf603a45185dc98a9c0befe60f4a783e); ?>
<?php endif; ?>
                        </div>
                        <?php if($number_page > 1 ): ?>
                        <div id="button">
                            <button class="btn w-100 text-center navi_btn" id="load__more--activities">Xem Thêm</button>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\admin\users\profile.blade.php ENDPATH**/ ?>