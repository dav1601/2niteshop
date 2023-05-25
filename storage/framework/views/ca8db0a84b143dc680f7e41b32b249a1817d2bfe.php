<?php $__env->startSection('import_js'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo e($file->ver('admin/app/js/products.js')); ?>"></script>
    <script>
        // if (route('current'))
        var producer = <?php echo e(Js::from($producer)); ?>;
        var galleries = <?php echo e(Js::from($gallery)); ?>;
        var productId = <?php echo e(Js::from($product->id)); ?>;
        var isEdit = true;
    </script>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('name'); ?>
    Product
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="product__edit">
        
        <?php echo Form::open(['url' => route('product_handle_add'), 'method' => 'POST', 'files' => true]); ?>

        <div class="w-100 row no-gutters">
            <div class="col-8 row no-gutters pr-4">
                <?php if (isset($component)) { $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'col-12 mb-5']); ?>
                     <?php $__env->slot('content', null, ['class' => 'row w-100']); ?> 
                        <div class="form-group col-6">
                            <?php if (isset($component)) { $__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Input\Text::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Input\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['required' => 'true','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->name),'name' => 'name','label' => 'name']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84)): ?>
<?php $component = $__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84; ?>
<?php unset($__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84); ?>
<?php endif; ?>
                        </div>
                        <div class="form-group col-6">
                            <?php if (isset($component)) { $__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Input\Text::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Input\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'slug','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->slug),'disabled' => 'true','name' => 'slug']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84)): ?>
<?php $component = $__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84; ?>
<?php unset($__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84); ?>
<?php endif; ?>
                        </div>
                        <div class="form-group col-6">


                            <?php if (isset($component)) { $__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Input\Text::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Input\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'meta keywords','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->keywords),'name' => 'keywords','placeholder' => 'Type keyword and Enter','data-role' => 'tagsinput']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84)): ?>
<?php $component = $__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84; ?>
<?php unset($__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84); ?>
<?php endif; ?>
                        </div>
                        <div class="form-group col-6">
                            <?php if (isset($component)) { $__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Input\Text::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Input\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'model','name' => 'model','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->model)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84)): ?>
<?php $component = $__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84; ?>
<?php unset($__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84); ?>
<?php endif; ?>
                        </div>
                        <div class="form-group col-12">
                            <?php if (isset($component)) { $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Label::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => 'meta desc']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21)): ?>
<?php $component = $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21; ?>
<?php unset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21); ?>
<?php endif; ?>
                            <textarea class="form-control" name="des" id="" rows="4"><?php echo e($product->des); ?></textarea>
                            <?php if (isset($component)) { $__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Error::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Error::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'des']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40)): ?>
<?php $component = $__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40; ?>
<?php unset($__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40); ?>
<?php endif; ?>
                        </div>

                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2)): ?>
<?php $component = $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2; ?>
<?php unset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2); ?>
<?php endif; ?>
                
                <?php if (isset($component)) { $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'col-12 mb-5']); ?>
                     <?php $__env->slot('heading', null, ['class' => '']); ?> 
                        <h6 class="font-weight-bold d-flex">Giá và kho</h6>
                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('content', null, ['class' => 'row w-100']); ?> 
                        <div class="form-group col-6">

                            <?php if (isset($component)) { $__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Input\Text::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Input\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'giá bán','required' => 'true','name' => 'price','class' => 'input-price','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->price),'id' => 'prd_price','placeholder' => '...']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84)): ?>
<?php $component = $__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84; ?>
<?php unset($__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84); ?>
<?php endif; ?>
                        </div>
                        <div class="form-group col-6">

                            <?php if (isset($component)) { $__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Input\Text::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Input\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'giá gốc','required' => 'true','name' => 'historical_cost','class' => 'input-price','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->historical_cost),'id' => 'historical_cost','placeholder' => 'đ']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84)): ?>
<?php $component = $__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84; ?>
<?php unset($__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84); ?>
<?php endif; ?>

                        </div>
                        <div class="form-group col-6">

                            <?php if (isset($component)) { $__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Input\Text::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Input\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'số lượng','required' => 'true','type' => 'number','min' => '1','name' => 'quantity','id' => 'quantity','value' => ''.e($product->qty).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84)): ?>
<?php $component = $__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84; ?>
<?php unset($__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84); ?>
<?php endif; ?>
                        </div>
                        <div class="form-group col-6">

                            <?php if (isset($component)) { $__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Input\Text::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Input\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'giá giảm','name' => 'discount','id' => 'discount','value' => ''.e($product->discount).'','class' => 'input-price']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84)): ?>
<?php $component = $__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84; ?>
<?php unset($__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84); ?>
<?php endif; ?>
                        </div>

                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2)): ?>
<?php $component = $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2; ?>
<?php unset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'col-12 mb-5']); ?>
                     <?php $__env->slot('heading', null, ['class' => '']); ?> 
                        <h6 class="font-weight-bold d-flex">Thông số và thông tin chi tiết</h6>
                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('content', null, ['class' => 'row w-100']); ?> 
                        <div class="form-group col-6">
                            <?php if (isset($component)) { $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Label::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => 'Thông số']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21)): ?>
<?php $component = $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21; ?>
<?php unset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21); ?>
<?php endif; ?>
                            <div class="w-100">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#mInfoProduct">
                                    <i class="fa-solid fa-pen-to-square mr-2"></i>Editor
                                </button>
                            </div>
                            <?php if (isset($component)) { $__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Error::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Error::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'info']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40)): ?>
<?php $component = $__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40; ?>
<?php unset($__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40); ?>
<?php endif; ?>
                        </div>
                        <div class="form-group col-6">
                            <?php if (isset($component)) { $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Label::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => 'Thông tin chi tiết']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21)): ?>
<?php $component = $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21; ?>
<?php unset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21); ?>
<?php endif; ?>
                            <div class="w-100">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#mContentProduct">
                                    <i class="fa-solid fa-pen-to-square mr-2"></i>Editor
                                </button>
                            </div>
                            <?php if (isset($component)) { $__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Error::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Error::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'content']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40)): ?>
<?php $component = $__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40; ?>
<?php unset($__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40); ?>
<?php endif; ?>
                        </div>

                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2)): ?>
<?php $component = $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2; ?>
<?php unset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2); ?>
<?php endif; ?>
                
                <?php if (isset($component)) { $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'col-12 mb-5']); ?>
                     <?php $__env->slot('heading', null, ['class' => '']); ?> 
                        <h6 class="font-weight-bold d-flex">Hình ảnh</h6>
                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('content', null, ['class' => '']); ?> 
                        <div class="row">
                            <div class="w-100 col-6 mb-3">
                                
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.ui.form.image','data' => ['width' => '305px','blockEventDef' => 'true','height' => '305px','classUpload' => '','classClear' => 'single-image-product','classInput' => 'single-input-product','name' => 'main_img','id' => 'imgProductMain','label' => 'Hình ảnh chính','image' => $file->ver_img($product->main_img),'required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.ui.form.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['width' => '305px','blockEventDef' => 'true','height' => '305px','classUpload' => '','classClear' => 'single-image-product','classInput' => 'single-input-product','name' => 'main_img','id' => 'imgProductMain','label' => 'Hình ảnh chính','image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($file->ver_img($product->main_img)),'required' => true]); ?>
                                     <?php $__env->slot('btn_clear', null, ['data-type' => 'img_main']); ?>  <?php $__env->endSlot(); ?>
                                     <?php $__env->slot('btn_upload', null, ['data-type' => 'img_main']); ?>  <?php $__env->endSlot(); ?>
                                     <?php $__env->slot('input', null, ['data-type' => 'img_main']); ?>  <?php $__env->endSlot(); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </div>
                            <div class="w-100 col-6 mb-3">
                                
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.ui.form.image','data' => ['width' => '305px','blockEventDef' => 'true','height' => '305px','classUpload' => 'single-image-product-upload','classClear' => 'single-image-product-upload-delete','classInput' => 'single-image-product-input','name' => 'sub_img','id' => 'imgProductSub','label' => 'Hình ảnh phụ','image' => $file->ver_img($product->sub_img)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.ui.form.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['width' => '305px','blockEventDef' => 'true','height' => '305px','classUpload' => 'single-image-product-upload','classClear' => 'single-image-product-upload-delete','classInput' => 'single-image-product-input','name' => 'sub_img','id' => 'imgProductSub','label' => 'Hình ảnh phụ','image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($file->ver_img($product->sub_img))]); ?>
                                     <?php $__env->slot('btn_clear', null, ['data-type' => 'img_sub']); ?>  <?php $__env->endSlot(); ?>
                                     <?php $__env->slot('btn_upload', null, ['data-type' => 'img_sub']); ?>  <?php $__env->endSlot(); ?>
                                     <?php $__env->slot('input', null, ['data-type' => 'img_sub']); ?>  <?php $__env->endSlot(); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </div>
                            <div class="w-100 col-6">
                                
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.ui.form.image','data' => ['width' => '305px','blockEventDef' => 'true','height' => '305px','classUpload' => '','classClear' => 'single-image-product','classInput' => 'single-input-product','name' => 'bg','id' => 'imgProductBg','label' => 'Hình ảnh nền sản phẩm','image' => $file->ver_img($product->bg)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.ui.form.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['width' => '305px','blockEventDef' => 'true','height' => '305px','classUpload' => '','classClear' => 'single-image-product','classInput' => 'single-input-product','name' => 'bg','id' => 'imgProductBg','label' => 'Hình ảnh nền sản phẩm','image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($file->ver_img($product->bg))]); ?>
                                     <?php $__env->slot('btn_clear', null, ['data-type' => 'img_bg']); ?>  <?php $__env->endSlot(); ?>
                                     <?php $__env->slot('btn_upload', null, ['data-type' => 'img_bg']); ?>  <?php $__env->endSlot(); ?>
                                     <?php $__env->slot('input', null, ['data-type' => 'img_bg']); ?>  <?php $__env->endSlot(); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </div>
                        </div>

                     <?php $__env->endSlot(); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2)): ?>
<?php $component = $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2; ?>
<?php unset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2); ?>
<?php endif; ?>
                
                <?php if (isset($component)) { $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'col-12 mb-5']); ?>
                     <?php $__env->slot('heading', null, ['class' => '']); ?> 
                        <h6 class="font-weight-bold d-flex">Thêm Hình ảnh chi tiết</h6>
                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('content', null, ['class' => '','id' => 'body-gallery']); ?> 
                        <?php if (isset($component)) { $__componentOriginalc45b07ad776af439fae1d222352b59be7e111d90 = $component; } ?>
<?php $component = App\View\Components\Admin\Product\Gallery::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.product.gallery'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Product\Gallery::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['galleries' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($gallery),'productAct' => 'edit']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc45b07ad776af439fae1d222352b59be7e111d90)): ?>
<?php $component = $__componentOriginalc45b07ad776af439fae1d222352b59be7e111d90; ?>
<?php unset($__componentOriginalc45b07ad776af439fae1d222352b59be7e111d90); ?>
<?php endif; ?>
                     <?php $__env->endSlot(); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2)): ?>
<?php $component = $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2; ?>
<?php unset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2); ?>
<?php endif; ?>
                
                <?php if (isset($component)) { $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'col-12 mb-5']); ?>
                     <?php $__env->slot('heading', null, ['class' => '']); ?> 
                        <h6 class="font-weight-bold d-flex">Danh sách hình ảnh chi tiết</h6>
                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('content', null, ['class' => '']); ?> 
                        
                     <?php $__env->endSlot(); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2)): ?>
<?php $component = $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2; ?>
<?php unset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2); ?>
<?php endif; ?>
                
                <?php if (isset($component)) { $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'col-12 mb-5']); ?>
                     <?php $__env->slot('heading', null, ['class' => '']); ?> 
                        <h6 class="font-weight-bold d-flex">Các liên kết của sản phẩm</h6>
                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('content', null, ['class' => '']); ?> 
                        <div class="row">
                            
                            <div class="col-4 mb-3">
                                <?php if (isset($component)) { $__componentOriginal26c694d0de26a602022c55bcf67683cd2823b619 = $component; } ?>
<?php $component = App\View\Components\Admin\Relation\Rela::resolve(['rl' => 'products-ins','relaid' => $product->id,'selected' => $ins] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.relation.rela'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Relation\Rela::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal26c694d0de26a602022c55bcf67683cd2823b619)): ?>
<?php $component = $__componentOriginal26c694d0de26a602022c55bcf67683cd2823b619; ?>
<?php unset($__componentOriginal26c694d0de26a602022c55bcf67683cd2823b619); ?>
<?php endif; ?>
                            </div>

                            
                            
                            <div class="col-4 mb-3">
                                <?php if (isset($component)) { $__componentOriginal26c694d0de26a602022c55bcf67683cd2823b619 = $component; } ?>
<?php $component = App\View\Components\Admin\Relation\Rela::resolve(['rl' => 'products-plc','relaid' => $product->id,'selected' => $policies] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.relation.rela'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Relation\Rela::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal26c694d0de26a602022c55bcf67683cd2823b619)): ?>
<?php $component = $__componentOriginal26c694d0de26a602022c55bcf67683cd2823b619; ?>
<?php unset($__componentOriginal26c694d0de26a602022c55bcf67683cd2823b619); ?>
<?php endif; ?>
                            </div>
                            
                            
                            <div class="col-4 mb-3">
                                <?php if (isset($component)) { $__componentOriginal26c694d0de26a602022c55bcf67683cd2823b619 = $component; } ?>
<?php $component = App\View\Components\Admin\Relation\Rela::resolve(['rl' => 'product-products','relaid' => $product->id,'selected' => $rela_products] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.relation.rela'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Relation\Rela::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal26c694d0de26a602022c55bcf67683cd2823b619)): ?>
<?php $component = $__componentOriginal26c694d0de26a602022c55bcf67683cd2823b619; ?>
<?php unset($__componentOriginal26c694d0de26a602022c55bcf67683cd2823b619); ?>
<?php endif; ?>

                            </div>
                            
                            <div class="col-4 mb-3">
                                <?php if (isset($component)) { $__componentOriginal26c694d0de26a602022c55bcf67683cd2823b619 = $component; } ?>
<?php $component = App\View\Components\Admin\Relation\Rela::resolve(['rl' => 'products-blogs','relaid' => $product->id,'selected' => $rela_blogs] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.relation.rela'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Relation\Rela::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal26c694d0de26a602022c55bcf67683cd2823b619)): ?>
<?php $component = $__componentOriginal26c694d0de26a602022c55bcf67683cd2823b619; ?>
<?php unset($__componentOriginal26c694d0de26a602022c55bcf67683cd2823b619); ?>
<?php endif; ?>
                            </div>
                            
                            
                            <div class="col-4 mb-3">
                                <?php if (isset($component)) { $__componentOriginal26c694d0de26a602022c55bcf67683cd2823b619 = $component; } ?>
<?php $component = App\View\Components\Admin\Relation\Rela::resolve(['rl' => 'products-block','relaid' => $product->id,'selected' => $blocks] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.relation.rela'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Relation\Rela::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal26c694d0de26a602022c55bcf67683cd2823b619)): ?>
<?php $component = $__componentOriginal26c694d0de26a602022c55bcf67683cd2823b619; ?>
<?php unset($__componentOriginal26c694d0de26a602022c55bcf67683cd2823b619); ?>
<?php endif; ?>
                            </div>
                            
                        </div>
                     <?php $__env->endSlot(); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2)): ?>
<?php $component = $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2; ?>
<?php unset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginald7fc8f80a6c60591340d5a5c1c4ec20d3dbfdcd7 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Submit::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.submit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Submit::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald7fc8f80a6c60591340d5a5c1c4ec20d3dbfdcd7)): ?>
<?php $component = $__componentOriginald7fc8f80a6c60591340d5a5c1c4ec20d3dbfdcd7; ?>
<?php unset($__componentOriginald7fc8f80a6c60591340d5a5c1c4ec20d3dbfdcd7); ?>
<?php endif; ?>
            </div>

            
            
            <div class="col-4">
                <div class="row w-100 no-gutters">
                    <div class="col-12 mb-4">
                        <?php if (isset($component)) { $__componentOriginal14ccd556195a083e2011d1951fb32f245d8802c5 = $component; } ?>
<?php $component = App\View\Components\Admin\Product\Categories::resolve(['show' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.product.categories'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Product\Categories::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['col' => 'col-12']); ?>
                             <?php $__env->slot('cusAttrInput', null, ['class' => 'category_create_product']); ?>  <?php $__env->endSlot(); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal14ccd556195a083e2011d1951fb32f245d8802c5)): ?>
<?php $component = $__componentOriginal14ccd556195a083e2011d1951fb32f245d8802c5; ?>
<?php unset($__componentOriginal14ccd556195a083e2011d1951fb32f245d8802c5); ?>
<?php endif; ?>
                    </div>
                    <?php if (isset($component)) { $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'col-12']); ?>
                         <?php $__env->slot('heading', null, ['class' => '']); ?> 
                            Associations
                         <?php $__env->endSlot(); ?>
                         <?php $__env->slot('content', null, ['class' => '']); ?> 
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <?php if (isset($component)) { $__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Input\Text::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Input\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Ngày mở bán','id' => 'date_sold','value' => ''.e($product->date_sold).'','name' => 'date_sold','required' => 'true','disabled' => true]); ?>
                                         <?php $__env->slot('append', null, []); ?> 
                                            <button type="button" class="btn btn-primary date-picker"
                                                data-target="#date_sold">
                                                <i class="fa-solid fa-calendar"></i>
                                            </button>
                                         <?php $__env->endSlot(); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84)): ?>
<?php $component = $__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84; ?>
<?php unset($__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84); ?>
<?php endif; ?>
                                </div>
                                <div class="col-6 mb-4">
                                    <?php if (isset($component)) { $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Label::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => 'Tình trạng sản phẩm']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21)): ?>
<?php $component = $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21; ?>
<?php unset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21); ?>
<?php endif; ?>
                                    <select class="custom-select" name="usage_stt">
                                        <?php $__currentLoopData = Config::get('product.usage_stt', '1'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $us): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($us); ?>"><?php echo e(usage_stt($us)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-6 mb-4">
                                    <?php if (isset($component)) { $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Label::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => 'sản phẩm nổi bật']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21)): ?>
<?php $component = $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21; ?>
<?php unset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21); ?>
<?php endif; ?>
                                    <select class="custom-select" name="highlight">
                                        <?php $__currentLoopData = Config::get('product.highlight', '1'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($hl); ?>"><?php echo e(highlight_stt($hl)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                
                                <div class="col-6 mb-4">
                                    <?php if (isset($component)) { $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Label::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => 'danh mục game']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21)): ?>
<?php $component = $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21; ?>
<?php unset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21); ?>
<?php endif; ?>
                                    <select class="custom-select" name="cat_game" id="">
                                        <option value="0">Select Category Game</option>
                                        <?php $__currentLoopData = $cat_game; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($cg->id); ?>"><?php echo e($cg->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if (isset($component)) { $__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Error::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Error::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'cat_game']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40)): ?>
<?php $component = $__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40; ?>
<?php unset($__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40); ?>
<?php endif; ?>
                                </div>
                                <div class="col-6 mb-4">
                                    <?php if (isset($component)) { $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Label::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => 'phân loại sản phẩm']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21)): ?>
<?php $component = $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21; ?>
<?php unset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21); ?>
<?php endif; ?>
                                    <select class="custom-select" name="type" id="type">
                                        <option value="">Select Type Product</option>
                                        <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($t->id); ?>"><?php echo e($t->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if (isset($component)) { $__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Error::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Error::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'type']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40)): ?>
<?php $component = $__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40; ?>
<?php unset($__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40); ?>
<?php endif; ?>
                                </div>
                                
                                <div class="col-12">
                                    <?php if (isset($component)) { $__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Input\Text::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Input\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Nhà Sản Xuất','name' => 'producer','id' => 'producer','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(get_crawler('producer')),'aria-describedby' => 'producerHelp','placeholder' => 'Nhập Tên Nhà sản xuất']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84)): ?>
<?php $component = $__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84; ?>
<?php unset($__componentOriginal98ab7ae604b382c640f957abf57133ecfbd55f84); ?>
<?php endif; ?>
                                    <small id="producerHelp" class="form-text text-muted mt-2">Nếu nhà sản xuất không có
                                        trong
                                        dánh sách gợi ý thì hệ thống sẽ tự động thêm vào.</small>
                                </div>

                                
                            </div>
                         <?php $__env->endSlot(); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2)): ?>
<?php $component = $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2; ?>
<?php unset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2); ?>
<?php endif; ?>
                </div>
            </div>
            

        </div>
        <?php echo Form::close(); ?>

    </div>
    
    <?php if (isset($component)) { $__componentOriginala5f18ae664ad62494165a06e85924976adecaeb9 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'thông tin chi tiết']); ?>
         <?php $__env->slot('modal', null, ['id' => 'mContentProduct']); ?> 
         <?php $__env->endSlot(); ?>
         <?php $__env->slot('dialog', null, ['class' => 'modal-xl modal-dialog-scrollable']); ?> 
         <?php $__env->endSlot(); ?>
         <?php $__env->slot('body', null, []); ?> 
            <div class="form-group col-12">
                <textarea name="content" id="content__tiny" class="form-control my-editor">
                    <?php echo $product->content; ?>

                </textarea>
                <?php if (isset($component)) { $__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Error::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Error::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'content']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40)): ?>
<?php $component = $__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40; ?>
<?php unset($__componentOriginal18c6b1c91d5c983bf8ab3b6e2054ef7950952a40); ?>
<?php endif; ?>
            </div>

         <?php $__env->endSlot(); ?>
         <?php $__env->slot('footer', null, ['class' => '']); ?> 
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala5f18ae664ad62494165a06e85924976adecaeb9)): ?>
<?php $component = $__componentOriginala5f18ae664ad62494165a06e85924976adecaeb9; ?>
<?php unset($__componentOriginala5f18ae664ad62494165a06e85924976adecaeb9); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginala5f18ae664ad62494165a06e85924976adecaeb9 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Thông số']); ?>
         <?php $__env->slot('modal', null, ['id' => 'mInfoProduct']); ?> 
         <?php $__env->endSlot(); ?>
         <?php $__env->slot('dialog', null, ['class' => 'modal-xl']); ?> 
         <?php $__env->endSlot(); ?>
         <?php $__env->slot('body', null, []); ?> 
            <div class="form-group col-12">
                <textarea name="info" id="info__tiny" class="form-control my-editor"><?php echo $product->info; ?></textarea>
            </div>

         <?php $__env->endSlot(); ?>
         <?php $__env->slot('footer', null, ['class' => '']); ?> 
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala5f18ae664ad62494165a06e85924976adecaeb9)): ?>
<?php $component = $__componentOriginala5f18ae664ad62494165a06e85924976adecaeb9; ?>
<?php unset($__componentOriginala5f18ae664ad62494165a06e85924976adecaeb9); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>