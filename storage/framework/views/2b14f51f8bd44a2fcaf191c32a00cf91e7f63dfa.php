<?php
$orders_all = App\Models\User::find(Auth::id())->orders()->get();
?>
<div class="" id="myTabPurchase" role="tablist">
  <a class="stt__item stt__item--0 <?php if($type == 0 ): ?> active <?php endif; ?>" id="purchase__tab--0" data-type="0"
    data-toggle="tab" href="#type__0" role="tab" aria-controls="all" aria-selected="true">Tất Cả</a>
  <?php $__currentLoopData = config('orders.status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $stt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <a class="stt__item stt__item--<?php echo e($key); ?> <?php if($type == $key ): ?> active <?php endif; ?>" data-type="<?php echo e($key); ?>"
    id="purchase__tab--<?php echo e($key); ?>" data-toggle="tab" href="#type__<?php echo e($key); ?>" role="tab" aria-controls="<?php echo e($key); ?>"
    aria-selected="true"><?php echo e($stt); ?></a>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="tab-content" id="myTabContentPurchase" style="margin-top:10px">
  <div class="tab-pane fade show <?php if($type == 0 ): ?> active <?php endif; ?>" id="type__0" role="tabpanel"
    aria-labelledby="purchase__tab--0">
    <div class="_1MmTVs">
      <i class="fas fa-search"></i>
      <input type="text" name="" id="searchBill" placeholder="Tìm kiếm theo ID đơn hàng">
    </div>
    <div class="wp__all">
      <?php if(count($orders_all) > 0 ): ?>
      <?php $__currentLoopData = $orders_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_all): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if (isset($component)) { $__componentOriginalca1af69e671725303ab2f8ecb8d385bc67bed217 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Client\Account\Purchase\Item::class, ['item' => $order_all,'type' => 0]); ?>
<?php $component->withName('client.account.purchase.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalca1af69e671725303ab2f8ecb8d385bc67bed217)): ?>
<?php $component = $__componentOriginalca1af69e671725303ab2f8ecb8d385bc67bed217; ?>
<?php unset($__componentOriginalca1af69e671725303ab2f8ecb8d385bc67bed217); ?>
<?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php else: ?>
      <div class="empty__orders">
        <div class="empty__orders--cont">
          <img src="<?php echo e($file->ver_img('client/images/empty-orders.png')); ?>" alt="">
          <span class="d-block mt-2">Chưa có đơn hàng</span>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <?php $__currentLoopData = config('orders.status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $stt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="tab-pane fade show <?php if($type == $key ): ?> active <?php endif; ?>" id="type__<?php echo e($key); ?>" role="tabpanel"
    aria-labelledby="purchase__tab--<?php echo e($key); ?>">
    <?php
    $orders = App\Models\Orders::orderBy('id' , 'DESC')-> where('status' , '=' , $key) -> where('users_id' , '=' ,
    Auth::id()) -> get();
    ?>
    <div class="wp__item--<?php echo e($key); ?>">
      <?php if(count($orders) > 0 ): ?>
      <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if (isset($component)) { $__componentOriginalca1af69e671725303ab2f8ecb8d385bc67bed217 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Client\Account\Purchase\Item::class, ['item' => $order,'type' => $key]); ?>
<?php $component->withName('client.account.purchase.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalca1af69e671725303ab2f8ecb8d385bc67bed217)): ?>
<?php $component = $__componentOriginalca1af69e671725303ab2f8ecb8d385bc67bed217; ?>
<?php unset($__componentOriginalca1af69e671725303ab2f8ecb8d385bc67bed217); ?>
<?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php else: ?>
      <div class="empty__orders">
        <div class="empty__orders--cont">
          <img src="<?php echo e($file->ver_img('client/images/empty-orders.png')); ?>" alt="">
          <span class="d-block mt-2">Chưa có đơn hàng</span>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH E:\xampp\htdocs\nava\resources\views/components/client/account/purchase/layout.blade.php ENDPATH**/ ?>