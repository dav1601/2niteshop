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
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.category.arcord','data' => ['category' => $category->children,'id' => $category->id,'level' => $category->level]]); ?>
<?php $component->withName('category.arcord'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['category' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category->children),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category->id),'level' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category->level)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
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
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.category.arcord','data' => ['category' => $category->children,'id' => $category->id,'level' => $category->level]]); ?>
<?php $component->withName('category.arcord'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['category' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category->children),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category->id),'level' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category->level)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php endif; ?>
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/u217861923/domains/vachill.com/public_html/resources/views/components/category/categories.blade.php ENDPATH**/ ?>