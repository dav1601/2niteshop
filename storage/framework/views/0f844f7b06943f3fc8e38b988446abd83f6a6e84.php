<div class="col-12 sta__item mt-4 p-0">
    <div class="w-100">
        <div class="card">
            <div class="card-header text-center">
                Tạo Page
            </div>
            <div class="card-body create-page">

                <div class="row w-100">
                    <div class="col-6">

                        <div class="create-page-item">
                            <div class="form-group">
                                <label for="pgb-title" class="text-dark">Tiêu đề trang web</label>
                                <input type="email" class="form-control" id="pgb-title">

                            </div>
                            <div class="form-group">
                                <label for="pgb-slug" class="text-dark">Slug</label>
                                <input type="email" class="form-control" id="pgb-slug">
                            </div>
                            <div class="form-group">
                                <select class="custom-select text-dark">
                                    <option selected value="0">Chọn loại page</option>
                                    <option value="full">Full Page (Bao gồm menu footer slug...Là 1 trang web hoàn
                                        chỉnh)</option>
                                    <option value="template">Template (Thường được nhúng vào thân website)</option>
                                    <option value="component">Component (Các phần html nhỏ để nhúng vào website)
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="create-page-item">
                            <h4 class="text-dark font-weight-bold">All Classes</h4>
                            <div class="mt-2">
                                <span class="text-dark font-weight-bold">Xem danh sách classes Bootstrap 4: <a
                                        href="https://hackerthemes.com/bootstrap-cheatsheet" target="_blank"
                                        class="font-weight-bold">Bootstrap 4 Cheat Sheet</a></span>
                            </div>
                            <div class="mt-2">
                                <span class="text-dark font-weight-bold">Custom Class:
                                </span>
                                <div class="d-flex flex-wrap">
                                    <?php for($i = 1; $i <= 10; $i++): ?>
                                        <span class="badge badge-pill badge-dark m-1" data-toggle="tooltip"
                                            data-placement="bottom"
                                            title="margin-bottom: <?php echo e($i * 10 . 'px'); ?>">mb-<?php echo e($i * 10); ?></span>
                                        <span class="badge badge-pill badge-dark m-1"data-toggle="tooltip"
                                            data-placement="top"
                                            title="margin-top: <?php echo e($i * 10 . 'px'); ?>">mt-<?php echo e($i * 10); ?></span>
                                        <span class="badge badge-pill badge-dark m-1"data-toggle="tooltip"
                                            data-placement="left"
                                            title="margin-left: <?php echo e($i * 10 . 'px'); ?>">ml-<?php echo e($i * 10); ?></span>
                                        <span class="badge badge-pill badge-dark m-1"data-toggle="tooltip"
                                            data-placement="right"
                                            title="margin-right: <?php echo e($i * 10 . 'px'); ?>">mr-<?php echo e($i * 10); ?></span>
                                    <?php endfor; ?>
                                    <span class="badge badge-pill badge-dark m-1"data-toggle="tooltip"
                                        data-placement="top" title="Title Red">title-red</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12 sta__item mt-4" id="wp-sections-build">
    <div class="w-100">
        <div class="card">
            <div class="card-header">
                Build Section
            </div>
            <?php if (isset($component)) { $__componentOriginal5a3acc42e8fac0977142d06a5f62439bfd52d298 = $component; } ?>
<?php $component = App\View\Components\Admin\Pagebuilder\Section::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.pagebuilder.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Pagebuilder\Section::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5a3acc42e8fac0977142d06a5f62439bfd52d298)): ?>
<?php $component = $__componentOriginal5a3acc42e8fac0977142d06a5f62439bfd52d298; ?>
<?php unset($__componentOriginal5a3acc42e8fac0977142d06a5f62439bfd52d298); ?>
<?php endif; ?>
            <div class="card-footer">
                <?php if (isset($component)) { $__componentOriginal8895df377ce551d31cc3894729bab76138508615 = $component; } ?>
<?php $component = App\View\Components\Admin\Pagebuilder\Component\Button\Add::resolve(['class' => 'pgb-add-section','t' => 'add-section'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.pagebuilder.component.button.add'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Pagebuilder\Component\Button\Add::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8895df377ce551d31cc3894729bab76138508615)): ?>
<?php $component = $__componentOriginal8895df377ce551d31cc3894729bab76138508615; ?>
<?php unset($__componentOriginal8895df377ce551d31cc3894729bab76138508615); ?>
<?php endif; ?>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="pgb-section-modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kim Đan My Luv</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo Form::open(['url' => '#', 'method' => 'POST', 'id' => 'pgb-section-form', 'files' => true]); ?>

            <div class="modal-body mx-2" id="pgb-section-modal-output">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Xác Nhận</button>
            </div>
            <?php echo Form::close(); ?>

        </div>

    </div>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/pagebuilder/create.blade.php ENDPATH**/ ?>