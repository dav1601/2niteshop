<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['col' => 'col-3', 'selected' => [], 'show' => true, 'classCheckbox' => '']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['col' => 'col-3', 'selected' => [], 'show' => true, 'classCheckbox' => '']); ?>
<?php foreach (array_filter((['col' => 'col-3', 'selected' => [], 'show' => true, 'classCheckbox' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $attrInput = [];
    if (isset($cusAttrInput)) {
        foreach ($cusAttrInput->attributes as $key => $value) {
            $attrInput[$key] = $value;
        }
    }
    $categories = App\Models\Category::tree();
?>
<div id="<?php echo e($idard); ?>">
    <?php
        $idcoll = 'collapse-' . $idard;
    ?>
    <div class="card">
        <div class="card-header p-0" id="headingOne">
            <h2 class="mb-0">
                <button
                    class="btn btn-link btn-block navi_btn <?php echo e($classbtn); ?> d-flex justify-content-between align-items-center text-light"
                    type="button" data-toggle="collapse" data-target="#<?php echo e($idcoll); ?>" aria-expanded="true"
                    aria-controls="<?php echo e($idcoll); ?>">
                    Danh Mục Sản Phẩm
                    <i class="fa-solid fa-angles-down"></i>
                </button>
            </h2>
        </div>
        <div id="<?php echo e($idcoll); ?>" class="<?php echo e($classcoll); ?> <?php echo e($show ? 'show' : ''); ?> collapse">
            <div class="card-body w-100 row" style="max-height: 500px; overflow-y: auto ; overflow-x:hidden">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $margin = 'margin-left:' . $cate->level * 30 . 'px';
                    ?>
                    <div class="<?php echo e($col); ?> mb-2 pb-2" style="border-bottom:1px solid grey">

                        <?php if (isset($component)) { $__componentOriginalb55959d51e142b18c2605db0103c6235c5331246 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Acheckbox::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.acheckbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Acheckbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(in_array($cate->id, $selected)),'customattr' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attrInput),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($id . $cate->id)]); ?>
                             <?php $__env->slot('input', null, ['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($name),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cate->id)]); ?> 
                             <?php $__env->endSlot(); ?>
                             <?php $__env->slot('label', null, []); ?> 
                                <?php echo e($cate->name); ?>

                             <?php $__env->endSlot(); ?>
                             <?php $__env->slot('main', null, ['style' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($margin)]); ?> 

                             <?php $__env->endSlot(); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb55959d51e142b18c2605db0103c6235c5331246)): ?>
<?php $component = $__componentOriginalb55959d51e142b18c2605db0103c6235c5331246; ?>
<?php unset($__componentOriginalb55959d51e142b18c2605db0103c6235c5331246); ?>
<?php endif; ?>
                        <?php while(count($cate->children) > 0): ?>
                            <?php $__currentLoopData = $cate->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $margin = 'margin-left:' . $cate->level * 30 . 'px';
                                ?>
                                <?php if (isset($component)) { $__componentOriginalb55959d51e142b18c2605db0103c6235c5331246 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Acheckbox::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.acheckbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Acheckbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(in_array($cate->id, $selected)),'customattr' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attrInput),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($id . $cate->id)]); ?>
                                     <?php $__env->slot('input', null, ['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($name),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cate->id)]); ?> 
                                     <?php $__env->endSlot(); ?>
                                     <?php $__env->slot('label', null, []); ?> 
                                        <?php echo e($cate->name); ?>

                                     <?php $__env->endSlot(); ?>
                                     <?php $__env->slot('main', null, ['style' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($margin),'class' => '','id' => '']); ?> 

                                     <?php $__env->endSlot(); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb55959d51e142b18c2605db0103c6235c5331246)): ?>
<?php $component = $__componentOriginalb55959d51e142b18c2605db0103c6235c5331246; ?>
<?php unset($__componentOriginalb55959d51e142b18c2605db0103c6235c5331246); ?>
<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endwhile; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/product/categories.blade.php ENDPATH**/ ?>