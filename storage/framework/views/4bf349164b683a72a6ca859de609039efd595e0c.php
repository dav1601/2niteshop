<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li class="nite__menu--item">
    <div class="d-flex align-items-center justify-content-between wp__iconName">
        <a href="<?php echo e(route('index_product' , ['slug'=>$category->slug])); ?>">

            <div class="icon-name">
                <?php if($category->icon != NULL): ?>
                <img src="<?php echo e($file->ver_img($category->icon)); ?>" width="25" height="25" alt="">
                <?php endif; ?>
                <span><?php echo e($category->name); ?></span>
            </div>
        </a>
        <?php if(count($category->children) > 0 ): ?>
        <span class="icon-toggle" data-id="<?php echo e($category->id); ?>">
            <i class="fa-solid fa-circle-plus"></i>
        </span>
        <?php endif; ?>
    </div>
    <?php if(count($category->children) > 0 ): ?>
    <?php if (isset($component)) { $__componentOriginal151164b18f4d25ca2d01e5917911f544cf7c0068 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Category\Arcord::class, ['category' => $category->children,'id' => $category->id,'level' => $category->level]); ?>
<?php $component->withName('category.arcord'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal151164b18f4d25ca2d01e5917911f544cf7c0068)): ?>
<?php $component = $__componentOriginal151164b18f4d25ca2d01e5917911f544cf7c0068; ?>
<?php unset($__componentOriginal151164b18f4d25ca2d01e5917911f544cf7c0068); ?>
<?php endif; ?>
    <?php endif; ?>
</li>
<?php if($category->id == 112): ?>
<?php
unset($category);
$category_120 = App\Models\Category::OneCatTree(120);
?>
<?php $__currentLoopData = $category_120; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li class="nite__menu--item">
    <div class="d-flex align-items-center justify-content-between wp__iconName">
        <a href="<?php echo e(route('index_product' , ['slug'=>$category->slug])); ?>">
            <div class="icon-name">
                <?php if($category->icon != NULL): ?>
                <img src="<?php echo e($file->ver_img($category->icon)); ?>" width="25" height="25" alt="">
                <?php endif; ?>
                <span><?php echo e($category->name); ?></span>
            </div>
        </a>
        <?php if(count($category->children) > 0 ): ?>
        <span class="icon-toggle" data-id="<?php echo e($category->id); ?>">
            <i class="fa-solid fa-circle-plus"></i>
        </span>
        <?php endif; ?>
    </div>
    <?php if(count($category->children) > 0 ): ?>
    <?php if (isset($component)) { $__componentOriginal151164b18f4d25ca2d01e5917911f544cf7c0068 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Category\Arcord::class, ['category' => $category->children,'id' => $category->id,'level' => $category->level]); ?>
<?php $component->withName('category.arcord'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal151164b18f4d25ca2d01e5917911f544cf7c0068)): ?>
<?php $component = $__componentOriginal151164b18f4d25ca2d01e5917911f544cf7c0068; ?>
<?php unset($__componentOriginal151164b18f4d25ca2d01e5917911f544cf7c0068); ?>
<?php endif; ?>
    <?php endif; ?>
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH E:\xampp\htdocs\nava\resources\views/components/category/categories.blade.php ENDPATH**/ ?>