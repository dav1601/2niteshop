<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Giá trị</th>
            <th scope="col">Email</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Hình thức TT</th>
            <th scope="col">Trạng thái ĐH</th>
            <th scope="col">Thanh Toán ĐH</th>
            <th scope="col">Tỉnh</th>
            <th scope="col">Xem</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($ord -> id); ?></td>
            <td><?php echo e($ord -> name); ?></td>
            <td><?php echo e(crf($ord->total)); ?></td>
            <td><?php echo e($ord->email); ?></td>
            <td><?php echo e($ord -> phone); ?></td>
            <td>
                <?php echo e($ord->payment); ?>

            </td>
            <td>
                <?php echo Config::get('orders.badges.'.$ord->status); ?>

            </td>
            <td>
                <?php echo Config::get('orders.badges_paid.'.$ord->paid); ?>

            </td>
            <td>
                <?php echo e($ord->prov); ?>

            </td>
            <td>
                <a href="<?php echo e(route('detail_order', ['id'=>$ord->id])); ?>">
                    <i class="fas fa-eye"></i>
                </a>
            </td>

        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>

</table>
<div class="card-footer p-0" id="orders_show--page">
  <?php if($number > 1): ?>
  <?php echo navi_ajax_page($number , $page , "","justify-content-center" , "mt-2"); ?>

  <?php endif; ?>
</div>

<?php /**PATH /home/u217861923/domains/vachill.com/public_html/resources/views/components/tableorders.blade.php ENDPATH**/ ?>