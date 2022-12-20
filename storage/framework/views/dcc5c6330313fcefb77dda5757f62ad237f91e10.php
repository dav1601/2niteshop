<?php
    $id_btn = 'modal__select--save-' . $btn;
?>
<div class="modal fade" id="modal__select" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content vadark">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Chọn liên kết</h5>
                <button type="button" class="close rs__params--select" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    
                    <ul id="modal__select--tags" class="form-control h-100 d-flex flex-wrap pb-4">
                        <?php if (isset($component)) { $__componentOriginalfc448cd7471a998e1699e44f63bb420390b567b0 = $component; } ?>
<?php $component = App\View\Components\Admin\Tags\Select::resolve(['selected' => $selected] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.tags.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Tags\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc448cd7471a998e1699e44f63bb420390b567b0)): ?>
<?php $component = $__componentOriginalfc448cd7471a998e1699e44f63bb420390b567b0; ?>
<?php unset($__componentOriginalfc448cd7471a998e1699e44f63bb420390b567b0); ?>
<?php endif; ?>
                    </ul>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Nhập id hoặc tên sản phẩm" class="form-control"
                        id="modal__select--search">
                </div>
                <div id="modal__select--body">
                    <?php if (isset($component)) { $__componentOriginal40027ead75602a56eb8c058776beeb41a406b8dc = $component; } ?>
<?php $component = App\View\Components\Admin\Product\Select\Table::resolve(['m' => $model,'page' => $page,'selected' => $selected] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.product.select.table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Product\Select\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal40027ead75602a56eb8c058776beeb41a406b8dc)): ?>
<?php $component = $__componentOriginal40027ead75602a56eb8c058776beeb41a406b8dc; ?>
<?php unset($__componentOriginal40027ead75602a56eb8c058776beeb41a406b8dc); ?>
<?php endif; ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rs__params--select"> Đóng
                </button>
                <button type="button" class="btn btn-primary select__btn--save" id="<?php echo e($id_btn); ?>">Lưu</button>
                <button class="btn btn-primary select__btn--loading d-none" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/modal/product/select.blade.php ENDPATH**/ ?>