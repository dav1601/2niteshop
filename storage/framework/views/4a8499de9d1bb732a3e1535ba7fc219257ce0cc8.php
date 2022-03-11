<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên</th>
            <th scope="col">SĐT</th>
            <th scope="col">SP</th>
            <th scope="col">TT</th>
            <th scope="col">TT SP</th>
            <th scope="col">TT Cọc</th>
            <th scope="col">Số tiền cọc</th>
            <th scope="col">TT Giao</th>
            <th scope="col">TG Nhận</th>
            <th scope="col">TG Đặt</th>
            <th scope="col">Update</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td>
                <?php echo e($cus->id); ?>

            </td>
            <td>
                <?php echo e($cus->name_cus); ?>

            </td>
            <td>
                <?php echo e($cus->phone); ?>

            </td>
            <td>
                <?php echo e(App\Models\Products::where('id', '=' , $cus->products_id)->first()->name); ?>

            </td>
            <td>
                <?php echo e(Config::get('orders.pre_orders.status.'.$cus->status)); ?>

                </div>
            </td>
            <td>
                <?php echo e(Config::get('orders.pre_orders.status_product.'.$cus->status_product)); ?>

            </td>
            <td>
                <?php echo e(Config::get('orders.pre_orders.deposit.'.$cus->deposit)); ?>

            </td>
            <td>
                <?php echo e(crf($cus->price_deposit)); ?>

            </td>
            <td>
                <?php echo e(Config::get('orders.pre_orders.delivered.'.$cus->delivery_status)); ?>

            </td>
            <td>
                <?php if($cus->delivery_time == NULL): ?>
                Trống
                <?php else: ?>
                <?php if($carbon -> create($cus->delivery_time) -> isToday()): ?>
                <?php echo e('Hôm Nay'); ?>

                <?php else: ?>
                <?php echo e($cus->delivery_time); ?>

                <?php endif; ?>
                
                <?php endif; ?>
            </td>
            <td>
                <?php echo e($cus->created_at); ?>

            </td>
            <td>
                <a href="<?php echo e(route('update_preOrders' , ['id'=>$cus->id])); ?>">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>

</table>
<div class="card-footer p-0" id="preOrder__show--page">
    <?php echo navi_ajax_page($number , $page , "","justify-content-center" , "mt-2"); ?>

</div>
<?php /**PATH /home/u217861923/domains/vachill.com/public_html/resources/views/components/admin/table/preorders.blade.php ENDPATH**/ ?>