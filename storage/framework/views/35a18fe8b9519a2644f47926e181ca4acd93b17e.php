<div class="form-group mb-5">
    <label for="">Tên Danh Mục</label>
    <input type="text" class="form-control" name="name" id="" value="<?php echo e($category->name); ?>" placeholder="">

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

<?php if (isset($component)) { $__componentOriginal19571530086391dd0a770e0cef2481dd23608ab5 = $component; } ?>
<?php $component = App\View\Components\Admin\Form\File::resolve(['name' => 'img','id' => 'm_editCategoryBanner','custom' => [
    'plh' => 'Cập Nhật Hình Ảnh Banner (Không update
    bỏ trống)',
]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.file'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\File::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal19571530086391dd0a770e0cef2481dd23608ab5)): ?>
<?php $component = $__componentOriginal19571530086391dd0a770e0cef2481dd23608ab5; ?>
<?php unset($__componentOriginal19571530086391dd0a770e0cef2481dd23608ab5); ?>
<?php endif; ?>
<div class="my-4">
    <?php if(empty($category->img)): ?>
        <span>Chưa Có Hình Ảnh Banner </span>
    <?php else: ?>
        <img src="<?php echo e($file->ver_img($category->img)); ?>" style="max-width:100%;" class="va-radius-fb" alt="">
    <?php endif; ?>
</div>
<?php if (isset($component)) { $__componentOriginal19571530086391dd0a770e0cef2481dd23608ab5 = $component; } ?>
<?php $component = App\View\Components\Admin\Form\File::resolve(['name' => 'icon','id' => 'm_editCategoryIcon','custom' => [
    'plh' => 'Cập Nhật Icon (Không update bỏ
    trống)',
]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.file'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\File::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal19571530086391dd0a770e0cef2481dd23608ab5)): ?>
<?php $component = $__componentOriginal19571530086391dd0a770e0cef2481dd23608ab5; ?>
<?php unset($__componentOriginal19571530086391dd0a770e0cef2481dd23608ab5); ?>
<?php endif; ?>
<div class="my-4">
    <label class="mb-4">Active:</label>
    <div class="switch">
        <input type="checkbox" id="<?php echo e('switch-category-' . $category->id); ?>" name="active-category"
            data-id="<?php echo e($category->id); ?>" class="switch-category"
            <?php if($category->active == 1): ?> checked <?php endif; ?> /><label
            for="<?php echo e('switch-category-' . $category->id); ?>">Toggle</label>
    </div>
</div>
<div class="my-4">
    <?php if(empty($category->icon)): ?>
        <span>Chưa Có Hình Ảnh Icon</span>
    <?php else: ?>
        <img src="<?php echo e($file->ver_img($category->icon)); ?>" style="max-width:100%;" class="va-radius-fb" alt="">
    <?php endif; ?>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/modal/category/edit.blade.php ENDPATH**/ ?>