<table class="table-borderless table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tiêu Đề</th>
            <th scope="col">Thêm</th>
            <th scope="col">Xem</th>
            <th scope="col">Edit</th>
            <th scope="col">Xoá</th>
            <th scope="col">Created_at</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $vadata->blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item->id); ?></td>
                <td><?php echo e($item->title); ?></td>
                <td>
                    <a block-id=" <?php echo e($item->id); ?>  " data-model="prd" relaName="block" relaId="<?php echo e($item->id); ?>"
                        role="button" class="add__prd cursor-poniter init__select text-center"
                        id="isbid<?php echo e($item->id); ?>">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                    <div class="spinner-border text-primary d-none init__select__loading" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </td>
                <td>
                    <a block-id=" <?php echo e($item->id); ?> " class="prev__block cursor-poniter">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </td>
                <td>
                    <a href="<?php echo e(route('product_block_view', ['type' => 'edit', 'block_id' => $item->id])); ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td>
                <td>
                    <a role="button" data-id=" <?php echo e($item->id); ?> " class="block__product--delete">
                        <i class="fa-solid fa-delete-left"></i>
                    </a>
                </td>
                <td>
                    <?php echo e($carbon->create($item->created_at)->diffForHumans($carbon->now())); ?>

                </td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div class="card-footer" id="product__block">
    <?php echo navi_ajax_page($vadata->number_page, 1, '', 'justify-content-center', 'mt-2'); ?>

</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/table/product/block.blade.php ENDPATH**/ ?>