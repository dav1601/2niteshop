<table class="table-dark table-bordered table">
    <thead>
        <tr>
            <th>
                Chọn
            </th>
            <th scope="col" class="text-center">ID</th>
            <th scope="col">Tên Item</th>
            <?php if($m === 'BlockProduct' || $m === 'Policy' || $m === 'Insurance'): ?>
                <th scope="col" class="text-center">Content</th>
            <?php endif; ?>
            <?php if($m === 'Policy'): ?>
                <th scope="col" class="text-center">Position</th>
            <?php endif; ?>
            <?php if($m === 'PageBuilder'): ?>
                <th scope="col" class="text-center">Type</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $vadata->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $name = '';
                $name = collect($item)->get($p);
            ?>
            <tr>
                <td style="width:60px;">
                    <?php
                        $id = 'select__prd--check-' . $item->id;
                    ?>
                    <div class="col-3 select__prd--item mb-4">
                        <div class="va-checkbox d-flex align-items-center w-100">
                            <input type="checkbox" value="<?php echo e($item->id); ?>" class="select__prd--check"
                                id="<?php echo e($id); ?>" <?php echo e(array_key_exists($item->id, $selected) ? 'checked' : ''); ?>

                                data-name="<?php echo e($name); ?>">
                            <label for="<?php echo e($id); ?>"></label>
                        </div>
                    </div>
                </td>
                <td style="width:160px;" class="text-center"> <?php echo e($item->id); ?> </td>
                <td> <?php echo e($name); ?> </td>
                <?php if($m === 'Insurance'): ?>
                    <td class="text-center">
                        Giá: <?php echo e(crf($item->price)); ?>

                    </td>
                <?php endif; ?>

                <?php if($m === 'BlockProduct'): ?>
                    <td class="text-center">
                        <button type="button" data-content=" <?php echo e($item->text); ?>"
                            class="btn btn-primary content__block"><i class="fa-solid fa-eye"></i></button>
                    </td>
                <?php endif; ?>
                <?php if($m === 'PageBuilder'): ?>
                    <td class="text-center">
                        <?php echo e($item->type); ?>

                    </td>
                <?php endif; ?>
                <?php if($m === 'Policy'): ?>
                    <td class="text-center">
                        <button type="button" data-content=" <?php echo e($item->content); ?>"
                            class="btn btn-primary content__block"><i class="fa-solid fa-eye"></i></button>
                    </td>
                    <td class="text-center">
                        <?php echo e($item->position); ?>

                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </tbody>
</table>
<div class="card-footer" id="select__prd--page">
    <?php echo navi_ajax_page($vadata->number_page, $page, '', 'justify-content-center', 'mt-2'); ?>

</div>
<?php if($m === 'BlockProduct' || $m === 'Policy'): ?>
    <div class="modal fade" id="view__content__block" tabindex="-1" role="dialog"
        aria-labelledby="view__content__blockTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="view__content__blockTitle">Content</h5>
                </div>
                <div class="modal-body" id="view__content__block__body">

                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/product/select/table.blade.php ENDPATH**/ ?>