<?php $__env->startSection('import_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="<?php echo e(asset('admin/app/js/user.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/user.js') ?>">
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('name'); ?>
Danh Sách Sản Phẩm
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" name="" value="<?php echo e(route('show_user_ajax')); ?>" id="user_filter--urlAjax">
<?php if(session('ban')): ?>
<script>
    toastr.success("Ban User Thành Công");
</script>
<?php endif; ?>
<?php if(session('unban')): ?>
<script>
    toastr.success("Gỡ Ban cho User Thành Công");
</script>
<?php endif; ?>
<div class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Bảng Lọc
                </div>
                <div class="card-body row mx-0" id="user_filter">
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Sắp xếp</label>
                            <select class="custom-select" name="" id="user_filter--sort">
                                <option value="DESC" sort="id">Mới nhất</option>
                                <option value="ASC" sort="id">Cũ nhất</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Role</label>
                            <select class="custom-select" name="" id="user_filter--role">
                                <option value="0">Tất Cả</option>
                               <?php $__currentLoopData = App\Models\Role::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="form-group">
                            <label for="">Tên hoặc ID User</label>
                            <input type="text" class="form-control" name="" id="user_filter--nameId"
                                placeholder="Tìm tên hoặc id sản phẩm">
                        </div>
                    </div>
                    <div class="col-4 mb-4 pl-0">
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="text" class="form-control" name="" id="user_filter--phone"
                                aria-describedby="helpId" placeholder="Nhập số điện thoại">
                        </div>
                    </div>
                    <div class="col-3 mb-4 pl-0">
                        <div class="form-group">
                            <label for="">Provider</label>
                            <input type="text" class="form-control" name="" id="user_filter--provider"
                                aria-describedby="helpId" placeholder="Nhập nền tảng login">
                        </div>
                    </div>
                    <div class="col-3 mb-4">
                        <div class="form-group">
                            <label for="">Provider ID</label>
                            <input type="text" class="form-control" name="" id="user_filter--providerID"
                                aria-describedby="helpId" placeholder="Nhập ID USER nền tảng login">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Danh sách User
                </div>
                <div class="card-body"  class="user_show" id="show__user">
                       <?php if (isset($component)) { $__componentOriginal23802aac4276dff84dfec278607a7144e7efb8e5 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Admin\Users\Table\Showusers::class, ['users' => $users,'number' => $number,'page' => $page]); ?>
<?php $component->withName('admin.users.table.showusers'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23802aac4276dff84dfec278607a7144e7efb8e5)): ?>
<?php $component = $__componentOriginal23802aac4276dff84dfec278607a7144e7efb8e5; ?>
<?php unset($__componentOriginal23802aac4276dff84dfec278607a7144e7efb8e5); ?>
<?php endif; ?>
                </div>

            </div>
        </div>
    </div>

    
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views\admin\users\show_user.blade.php ENDPATH**/ ?>