<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Wallet</th>
            <th scope="col">VIP</th>
            <th scope="col">Email</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Tỉnh</th>
            <th scope="col">Quận/Huyện</th>
            <th scope="col">Phường/Xã</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td>
                <?php echo e($cus->id); ?>

            </td>
            <td>
                <?php echo e($cus->name); ?>

            </td>
            <td>
                <?php echo e(crf($cus->wallet)); ?>

            </td>
            <td>
                <div class="buttons">
                    <div class="button-admin all button-vip-<?php echo e($cus->vip); ?>">
                     <span class="admin">
                       VIP <?php echo e($cus->vip); ?>

                     </span>
                    </div>
                    <br/>
                  </div>
            </td>
            <td>
                <?php echo e($cus->email); ?>

            </td>
            <td>
                <?php echo e($cus->phone); ?>

            </td>
            <td>
                <?php echo e($cus->p); ?>

            </td>
            <td>
                <?php echo e($cus->d); ?>

            </td>
            <td>
                <?php echo e($cus->w); ?>

            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>

</table>
<div class="card-footer p-0" id="customers_show--page">
    <?php echo navi_ajax_page($number , $page , "","justify-content-center" , "mt-2"); ?>

</div>
<?php /**PATH E:\xampp\htdocs\nava\resources\views\components\orders\tablecustomer.blade.php ENDPATH**/ ?>