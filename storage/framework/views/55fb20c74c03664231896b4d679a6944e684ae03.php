<!DOCTYPE html>

<?php $__env->startSection('import_css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script
        src="<?php echo e(asset('admin/app/js/products.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/products.js') ?>">
    </script>
    <script src="<?php echo e(asset('admin/app/js/tinymce.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/tinymce.js') ?>">
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('name'); ?>
    Thêm Block Sản Phẩm
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('succes') == 1): ?>
        <script>
            toastr.success("Thêm Block Sản Phẩm Thành Công");
        </script>
    <?php elseif(session('success') == 2): ?>
        <script>
            toastr.success("Thêm Block Sản Phẩm Thất Bại");
        </script>
    <?php endif; ?>


    <div id="block__product" class="row mx-0">
        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Thêm Block Sản Phẩm
                    </div>
                    <div class="card-body" id="block__product__add">
                        <?php echo Form::open(['url' => route('product_block_handle', ['type' => 'add']), 'method' => 'POST']); ?>

                        <div class="form-group mb-5">
                            <label for="">Tiêu đề</label>
                            <input type="text" class="form-control" name="title" id=""
                                value="<?php echo e(old('title')); ?>" placeholder="">
                            <?php $__errorArgs = ['text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    <?php echo e($message); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Text</label>
                            <textarea name="text" id="block__product__tiny" class="form-control my-editor"><?php echo old('text'); ?></textarea>
                            <?php $__errorArgs = ['text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    <?php echo e($message); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group mb-5">
                            <input type="submit" value="Thêm Block Sản Phẩm" class="btn navi_btn w-100">
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Danh sách block sản phẩm
                    </div>
                    <div class="card-body" id="block__product__table">
                        <?php if (isset($component)) { $__componentOriginal292138666e012357e061ee240d4f7aa423e0daba = $component; } ?>
<?php $component = App\View\Components\Admin\Table\Product\Block::resolve(['vadata' => $data] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.table.product.block'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Table\Product\Block::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal292138666e012357e061ee240d4f7aa423e0daba)): ?>
<?php $component = $__componentOriginal292138666e012357e061ee240d4f7aa423e0daba; ?>
<?php unset($__componentOriginal292138666e012357e061ee240d4f7aa423e0daba); ?>
<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<div class="modal fade" id="modal__block--prev" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-black-50" id="block__prev--title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="block__prev--text">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<?php if (isset($component)) { $__componentOriginal6bc41543ec8a7ccee9a15fa67078c4113b93e020 = $component; } ?>
<?php $component = App\View\Components\Admin\Modal\Product\Select::resolve(['btn' => 'blockPrd'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.modal.product.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Modal\Product\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6bc41543ec8a7ccee9a15fa67078c4113b93e020)): ?>
<?php $component = $__componentOriginal6bc41543ec8a7ccee9a15fa67078c4113b93e020; ?>
<?php unset($__componentOriginal6bc41543ec8a7ccee9a15fa67078c4113b93e020); ?>
<?php endif; ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/admin/products/block/add.blade.php ENDPATH**/ ?>