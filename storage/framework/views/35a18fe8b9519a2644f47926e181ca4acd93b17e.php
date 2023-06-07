<div class="form-group mb-5">
    <label for="">Tên Danh Mục</label>
    <input type="text" class="form-control" name="name" id="" value="<?php echo e($category->name); ?>" placeholder="">
</div>
<div class="form-group">
    <label for="">Danh Mục Cha</label>
    <select class="custom-select" name="parent" id="parent">
        <option <?php if($category->parent_id == 0): ?> selected <?php endif; ?> value="0">⭐Là Danh Mục Chính</option>
        <?php if (isset($component)) { $__componentOriginalc9001fce224566214481bc365a1025e7bd824b18 = $component; } ?>
<?php $component = App\View\Components\Admin\Form\Select\Option::resolve(['categories' => App\Models\Category::tree(),'selected' => $category->parent_id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.select.option'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\Select\Option::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc9001fce224566214481bc365a1025e7bd824b18)): ?>
<?php $component = $__componentOriginalc9001fce224566214481bc365a1025e7bd824b18; ?>
<?php unset($__componentOriginalc9001fce224566214481bc365a1025e7bd824b18); ?>
<?php endif; ?>
    </select>
</div>
<input type="hidden" name="id" value="<?php echo e($category->id); ?>">
<div class="form-group mb-5">
    <label for="">Title</label>
    <input type="text" class="form-control" name="title" id="" placeholder="Title Danh Mục"
        value="<?php echo e($category->title); ?>">

</div>
<div class="form-group mb-5">
    <label for="">Slug</label>
    <input type="text" class="form-control" name="slug" value="<?php echo e($category->slug); ?>" id=""
        placeholder="">
</div>

<div class="form-group mb-5">
    <label for="">Description</label>
    <textarea type="text" class="form-control" name="desc" id="" placeholder="" rows="4"><?php echo e($category->desc); ?></textarea>
</div>

<div class="form-group mb-5">
    <label for="">Keywords</label>
    <input type="text" data-role="tagsinput" id="m_editCategoryKw" class="form-control" name="keywords"
        value="<?php echo e($category->keywords); ?>">
</div>

<div class="my-4">
    <label class="mb-4">Active:</label>
    <div class="switch">
        <input type="checkbox" id="<?php echo e('switch-category-' . $category->id); ?>" name="active-category"
            data-id="<?php echo e($category->id); ?>" class="switch-category"
            <?php if($category->active == 1): ?> checked <?php endif; ?> /><label
            for="<?php echo e('switch-category-' . $category->id); ?>">Toggle</label>
    </div>
</div>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.ui.form.image','data' => ['name' => 'img','blockEventDef' => 'true','classImage' => 'rounded','classWp' => 'w-100 mb-5','classClear' => 'image-category-clear','classUpload' => 'image-category-upload','classInput' => 'image-category-input','id' => 'm_editCategoryBanner','image' => $file->ver_img($category->img),'label' => 'Banner']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.ui.form.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'img','blockEventDef' => 'true','classImage' => 'rounded','classWp' => 'w-100 mb-5','classClear' => 'image-category-clear','classUpload' => 'image-category-upload','classInput' => 'image-category-input','id' => 'm_editCategoryBanner','image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($file->ver_img($category->img)),'label' => 'Banner']); ?>
     <?php $__env->slot('input', null, ['data-id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category->id),'data-type' => 'img']); ?> 

     <?php $__env->endSlot(); ?>
     <?php $__env->slot('btn_clear', null, ['data-id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category->id),'data-type' => 'img']); ?> 

     <?php $__env->endSlot(); ?>
     <?php $__env->slot('btn_upload', null, ['data-id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category->id),'data-type' => 'img']); ?> 

     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.ui.form.image','data' => ['name' => 'icon','blockEventDef' => 'true','classImage' => 'rounded','classClear' => 'image-category-clear','classUpload' => 'image-category-upload','classInput' => 'image-category-input','id' => 'm_editCategoryIcon','image' => $file->ver_img($category->icon),'label' => 'icon','width' => '64px','height' => '64px']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.ui.form.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'icon','blockEventDef' => 'true','classImage' => 'rounded','classClear' => 'image-category-clear','classUpload' => 'image-category-upload','classInput' => 'image-category-input','id' => 'm_editCategoryIcon','image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($file->ver_img($category->icon)),'label' => 'icon','width' => '64px','height' => '64px']); ?>
     <?php $__env->slot('input', null, ['data-id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category->id),'data-type' => 'icon']); ?> 

     <?php $__env->endSlot(); ?>
     <?php $__env->slot('btn_clear', null, ['data-id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category->id),'data-type' => 'icon']); ?> 

     <?php $__env->endSlot(); ?>
     <?php $__env->slot('btn_upload', null, ['data-id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category->id),'data-type' => 'icon']); ?> 

     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/modal/category/edit.blade.php ENDPATH**/ ?>