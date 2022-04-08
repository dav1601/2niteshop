<?php if(count($sorted) > 0): ?>
<?php $__currentLoopData = $sorted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($item -> name != NULL || $item ->name != ''): ?>
<div class="d-flex item-activiti justify-content-start align-items-center">
    <img src="<?php echo e($file->ver_img($item->main_img)); ?>" class=" rounded-circle " width="50" height="50"
        alt="">
    <div class="content flex-grow-1 d-flex justify-content-between align-items-center">
        <div class="activivi">
            <span class="d-block title"><strong>Bạn</strong> đã đăng sản phẩm <a
                    target="_blank"
                    href="<?php echo e(route('detail_product' ,['slug' => $item->slug])); ?>"><?php echo e($item->name); ?></a> </span>
            <span class="d-block time">
                <?php if($carbon -> create($item->created_at) -> isToday()): ?>
                Hôm nay , <?php echo e($carbon -> create($item->created_at)->fomat('H:i a')); ?>

                <?php elseif($carbon -> create($item->created_at) -> isYesterday()): ?>
                Hôm qua , <?php echo e($carbon -> create($item->created_at)->fomat('H:i a')); ?>

                <?php elseif(!$carbon -> create($item->created_at) -> isToday() && !$carbon ->
                create($item->created_at) -> isYesterday()): ?>
                <?php echo e($item->created_at); ?>

                <?php endif; ?>
            </span>
        </div>
        <div class="view_time">
            <span class="d-block time-ago mb-1"> <?php echo e($carbon ->
                create($item->created_at)->diffForHumans($carbon->now())); ?></span>
        </div>
    </div>
</div>
<hr>
<?php else: ?>
<div class="d-flex item-activiti justify-content-start align-items-center">
    <img src="<?php echo e($file->ver_img($item->img)); ?>" class=" rounded-circle " width="50" height="50"
        alt="">
    <div class="content flex-grow-1 d-flex justify-content-between align-items-center">
        <div class="activivi">
            <?php
            $href = url('tin-tuc/'.App\Models\CatBlog::where('id', '=' ,
            $item->cat_id)->first()->slug.'/'.$item->slug);
            ?>
            <span class="d-block title"><strong>Bạn</strong> đã đăng bài viết <a
                    target="_blank" href="<?php echo e($href); ?>"><?php echo e($item->title); ?></a> </span>
            <span class="d-block time">
                <?php if($carbon -> create($item->created_at) -> isToday()): ?>
                Hôm nay , <?php echo e($carbon -> create($item->created_at)->fomat('H:i a')); ?>

                <?php elseif($carbon -> create($item->created_at) -> isYesterday()): ?>
                Hôm qua , <?php echo e($carbon -> create($item->created_at)->fomat('H:i a')); ?>

                <?php elseif(!$carbon -> create($item->created_at) -> isToday() && !$carbon ->
                create($item->created_at) -> isYesterday()): ?>
                <?php echo e($item->created_at); ?>

                <?php endif; ?>
            </span>
        </div>
        <div class="view_time">
            <span class="d-block time-ago mb-1"> <?php echo e($carbon ->
                create($item->created_at)->diffForHumans($carbon->now())); ?></span>
        </div>
    </div>
</div>
<hr>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\nava\resources\views\components\admin\profile\itemactivities.blade.php ENDPATH**/ ?>