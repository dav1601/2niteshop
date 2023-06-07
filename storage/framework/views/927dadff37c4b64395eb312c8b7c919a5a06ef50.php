<?php $__env->startSection('import_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo e($file->ver('admin/app/js/products.js')); ?>"></script>
    <script>
        var minPrice = parseFloat(<?php echo e($minPrice); ?>);
        var maxPrice = parseFloat(<?php echo e($maxPrice); ?>);
    </script>
    <script src="<?php echo e($file->ver('admin/app/js/range.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('name'); ?>
    Danh Sách Sản Phẩm
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    
    <?php if (isset($component)) { $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
         <?php $__env->slot('heading', null, ['class' => 'text-center']); ?> 
            Bộ lọc
         <?php $__env->endSlot(); ?>
         <?php $__env->slot('content', null, []); ?> 
            <div class="row" id="prd__filter">
                <div class="col-2 mb-4">
                    <div class="form-group">
                        <?php if (isset($component)) { $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Label::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => 'sắp xếp']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21)): ?>
<?php $component = $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21; ?>
<?php unset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21); ?>
<?php endif; ?>
                        <select class="custom-select" name="" id="prd__filter--sort">
                            <option value="DESC" sort="id">Mới nhất</option>
                            <option value="ASC" sort="id">Cũ nhất</option>
                            <option value="DESC" sort="highlight">Bình Thường</option>
                            <option value="ASC" sort="highlight">Nổi bật</option>
                        </select>
                    </div>
                </div>
                <div class="col-2 mb-4">
                    <div class="form-group">
                        <?php if (isset($component)) { $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Label::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => 'nhà sản xuất']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21)): ?>
<?php $component = $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21; ?>
<?php unset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21); ?>
<?php endif; ?>
                        <select class="custom-select" name="" id="prd__filter--prdcer">
                            <option value="">Tất cả</option>
                            <?php $__currentLoopData = App\Models\Producer::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prdcer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($prdcer->id); ?>"><?php echo e($prdcer->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-2 mb-4">
                    <div class="form-group">
                        <?php if (isset($component)) { $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Label::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => 'Tình trạng']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21)): ?>
<?php $component = $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21; ?>
<?php unset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21); ?>
<?php endif; ?>
                        <select class="custom-select" name="" id="prd__filter--usage">
                            <option value="">Tất cả</option>
                            <?php $__currentLoopData = Config::get('product.usage_stt'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($usage); ?>"><?php echo e(usage_stt($usage)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-2 mb-4">
                    <div class="form-group">
                        <?php if (isset($component)) { $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Label::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => 'Kho']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21)): ?>
<?php $component = $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21; ?>
<?php unset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21); ?>
<?php endif; ?>
                        <select class="custom-select" name="" id="prd__filter--status">
                            <option value="">Tất cả</option>
                            <?php $__currentLoopData = Config::get('product.stock', 'default'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($stock); ?>"><?php echo e(stock_stt($stock)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="form-group">
                        <?php if (isset($component)) { $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Label::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => 'Tìm tên hoặc id sản phẩm']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21)): ?>
<?php $component = $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21; ?>
<?php unset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21); ?>
<?php endif; ?>
                        <input type="text" class="form-control" name="" id="prd__filter--name"
                            placeholder="Name,Id Product">
                    </div>
                </div>

                <div class="col-2 mb-4">
                    <div class="form-group">
                        <?php if (isset($component)) { $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Label::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => 'Tìm quản lý']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21)): ?>
<?php $component = $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21; ?>
<?php unset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21); ?>
<?php endif; ?>
                        <input type="text" class="form-control" name="" id="prd__filter--author"
                            aria-describedby="helpId" placeholder="Name Manager">
                    </div>
                </div>
                <div class="col-2 mb-4">
                    <div class="form-group">
                        <?php if (isset($component)) { $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Label::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => 'Tìm Model']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21)): ?>
<?php $component = $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21; ?>
<?php unset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21); ?>
<?php endif; ?>
                        <input type="text" class="form-control" name="" id="prd__filter--model"
                            aria-describedby="helpId" placeholder="Nhập model">
                    </div>
                </div>
                <div class="col-3 mb-4">
                    <?php if (isset($component)) { $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Form\Label::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Form\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => 'Khoảng giá','class' => 'mb-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21)): ?>
<?php $component = $__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21; ?>
<?php unset($__componentOriginalb30f1b15d41d938c39f11ba50f70b7b92b91da21); ?>
<?php endif; ?>
                    <div class="row">
                        <div class="col-12">
                            <div id="slider-range"></div>
                        </div>
                    </div>
                    <div class="row slider-labels">
                        <div class="col-6 caption">
                            <strong>Min:</strong> <span id="slider-range-value1"></span>
                        </div>
                        <div class="col-6 caption text-right">
                            <strong>Max:</strong> <span id="slider-range-value2"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form>
                                <input type="text" class="d-none" name="min-value" id="prd__filter--min"
                                    value="<?php echo e($minPrice); ?>">
                                <input type="text" class="d-none" name="max-value" id="prd__filter--max"
                                    value="<?php echo e($maxPrice); ?>">
                                <input type="hidden" name="" id="triggerPriceChange">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group mt-4">
                        <?php if (isset($component)) { $__componentOriginal14ccd556195a083e2011d1951fb32f245d8802c5 = $component; } ?>
<?php $component = App\View\Components\Admin\Product\Categories::resolve(['show' => false] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.product.categories'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Product\Categories::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['classCheckbox' => 'prd__filter--category','col' => 'col-12']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal14ccd556195a083e2011d1951fb32f245d8802c5)): ?>
<?php $component = $__componentOriginal14ccd556195a083e2011d1951fb32f245d8802c5; ?>
<?php unset($__componentOriginal14ccd556195a083e2011d1951fb32f245d8802c5); ?>
<?php endif; ?>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group mt-4">
                        <button type="button" class="btn btn-outline-primary w-100"
                            onClick="location.reload()">Reset</button>
                    </div>
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
<?php $component->withAttributes(['id' => 'pointScrollProduct']); ?>
         <?php $__env->slot('heading', null, ['class' => 'text-center']); ?> 
            Danh sách sản phẩm
         <?php $__env->endSlot(); ?>
         <?php $__env->slot('content', null, ['id' => 'product__show','class' => 'prd__s']); ?> 
            <div class="row mx-0" id="product__show--ajax"></div>
         <?php $__env->endSlot(); ?>
         <?php $__env->slot('footer', null, ['id' => 'product__show--page']); ?> 

         <?php $__env->endSlot(); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2)): ?>
<?php $component = $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2; ?>
<?php unset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2); ?>
<?php endif; ?>





    
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/admin/products/show.blade.php ENDPATH**/ ?>