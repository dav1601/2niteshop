<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($category->id != 120): ?>
<li class="hm__item lv-<?php echo e($category->level); ?>" data-lv=<?php echo e($category->level); ?>>
    <a href="<?php echo e(url('category/'.$category->slug)); ?>">
        <div class="icon-name">
            <?php if($category ->parent_id == 0): ?>
            <img src="<?php echo e($file->ver_img($category->icon)); ?>" width="25" height="25" alt="">
            <?php endif; ?>
            <span><?php echo e($category->name); ?></span>
        </div>
        <?php if(count($category->children) > 0 && $category->parent_id !== 0): ?>
        <i class="fas fa-caret-right"></i>
        <?php endif; ?>
    </a>
    <?php if(count($category->children) > 0 ): ?>
    <ul class="sub__menu lv-<?php echo e($category->level + 1); ?>">
        <?php if (isset($component)) { $__componentOriginal1b334014b5062e2721d0c0606efeebec0019426e = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Client\Menu\Category::class, ['category' => $category->children]); ?>
<?php $component->withName('client.menu.category'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b334014b5062e2721d0c0606efeebec0019426e)): ?>
<?php $component = $__componentOriginal1b334014b5062e2721d0c0606efeebec0019426e; ?>
<?php unset($__componentOriginal1b334014b5062e2721d0c0606efeebec0019426e); ?>
<?php endif; ?>
    </ul>
    <?php endif; ?>
</li>
<?php if($loop->last && $category->level == 0): ?>
<?php
$categories_blog = App\Models\CatBlog::all();
?>
<li class="hm__item">
    <a href="<?php echo e(url('tin-tuc')); ?>">
        <div class="icon-name">
            <img src="<?php echo e($file->ver_img('admin/images/category/icon/news.png')); ?>" width="25" height="25" alt="">
            <span>Bản Tin</span>
        </div>
    </a>
    <ul class="sub__menu">
        <?php $__currentLoopData = $categories_blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(url('tin-tuc/'.$item->slug)); ?>">
            <div class="icon-name">
                <span><?php echo e($item->name); ?></span>
            </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</li>
<?php endif; ?>
<?php endif; ?>

<?php if($category->id == 112): ?>
<?php
$categories_120 = App\Models\Category::OneCatTree(120);
?>
<?php $__currentLoopData = $categories_120; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_120): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li class="hm__item lv-<?php echo e($category_120->level); ?>" data-lv=<?php echo e($category_120->level); ?>>
    <a href="<?php echo e(url('category/'.$category_120->slug)); ?>">
        <div class="icon-name">
            <img src="<?php echo e($file->ver_img('admin/images/category/icon/icons8-nintendo-switch-logo-64.png')); ?>" width="25"
                height="25" alt="">
            <span><?php echo e($category_120->name); ?></span>
        </div>
    </a>
    <?php if(count($category_120->children) > 0 ): ?>
    <ul class="sub__menu lv-<?php echo e($category_120->level + 1); ?>">
        <?php if (isset($component)) { $__componentOriginal1b334014b5062e2721d0c0606efeebec0019426e = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Client\Menu\Category::class, ['category' => $category_120->children]); ?>
<?php $component->withName('client.menu.category'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b334014b5062e2721d0c0606efeebec0019426e)): ?>
<?php $component = $__componentOriginal1b334014b5062e2721d0c0606efeebec0019426e; ?>
<?php unset($__componentOriginal1b334014b5062e2721d0c0606efeebec0019426e); ?>
<?php endif; ?>
    </ul>
    <?php endif; ?>
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH E:\xampp\htdocs\nava\resources\views\components\client\menu\categories.blade.php ENDPATH**/ ?>