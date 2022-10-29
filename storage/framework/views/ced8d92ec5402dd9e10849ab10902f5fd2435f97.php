
<?php $__env->startSection('import_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="<?php echo e(asset('admin/app/js/banners.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/banners.js') ?>">
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('name'); ?>
Quản Lý Banners
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(session('ok')): ?>
<script>
    toastr.success("Thêm Banner Thành Công");
</script>
<?php endif; ?>
<div class="row mx-0">
  
    
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Danh sách banner
                </div>
                <div class="card-body" id="show__banners">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Link</th>
                                <th scope="col">Vị trí</th>
                                <th scope="col">Thứ tự</th>
                                <th scope="col">Ngày đăng</th>
                                <th scope="col">Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($banner -> id); ?></th>
                                <td><?php echo e($banner -> name); ?></td>
                                <td><?php echo e($banner -> link); ?></td>
                                <td class="text-center"><?php echo e($banner -> position); ?></td>
                                <td class="text-center"><?php echo e($banner -> index); ?></td>
                                <td class="text-center"><?php echo e($carbon -> create($banner->created_at) ->
                                    diffForHumans($carbon -> now('Asia/Ho_Chi_Minh'))); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo e(route('banner_view_edit', ['id'=>$banner->id])); ?>" class="d-block">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/admin/slides_banners/banners/index.blade.php ENDPATH**/ ?>