<?php switch($type):
    case ('change-layout'): ?>
        <?php
            $arrLayout = [['layout' => ['12'], 'rvs' => false], ['layout' => ['10', '2'], 'rvs' => true], ['layout' => ['9', '3'], 'rvs' => true], ['layout' => ['8', '4'], 'rvs' => true], ['layout' => ['7', '5'], 'rvs' => true], ['layout' => ['6', '6'], 'rvs' => false], ['layout' => ['4', '4', '4'], 'rvs' => false], ['layout' => ['flex-custom-25', 'flex-custom-50', 'flex-custom-25'], 'rvs' => false], ['layout' => ['3', '3', '3', '3'], 'rvs' => false], ['layout' => ['5ths', '5ths', '5ths', '5ths', '5ths'], 'rvs' => false]];
            // $arrLayout = [['layout' => ['12'], 'rvs' => false], ['layout' => ['10', '2'], 'rvs' => true], ['layout' => ['9', '3'], 'rvs' => true], ['layout' => ['8', '4'], 'rvs' => true], ['layout' => ['7', '5'], 'rvs' => true], ['layout' => ['6', '6'], 'rvs' => false], ['layout' => ['4', '4', '4'], 'rvs' => false], ['layout' => ['flex-custom-25', 'flex-custom-50', 'flex-custom-25'], 'rvs' => false], ['layout' => ['3', '3', '3', '3'], 'rvs' => false], ['layout' => ['5ths', '5ths', '5ths', '5ths', '5ths'], 'rvs' => false]];
        ?>
        <input type="hidden" id="selected_layout" sid="<?php echo e($data['id']); ?>" data-layout="<?php echo e(implode(',', $data['layout'])); ?>">
        <?php $__currentLoopData = $arrLayout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $string_1 = implode(',', $item['layout']);
                $string_2 = implode(',', $data['layout']);
            ?>


            <div class="select-layout col-12 <?php if($string_1 === $string_2): ?> active <?php endif; ?> row w-100 no-gutters mx-0 mb-4"
                data-layout="<?php echo e($string_1); ?>">
                <?php $__currentLoopData = $item['layout']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-<?php echo e($col); ?> px-2">
                        <div class="select-layout-item d-flex justify-content-center align-items-center">
                            <strong class="text-dark"> <?php echo e($col); ?> </strong>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            <?php if($item['rvs']): ?>
                <?php
                    $arrRev = array_reverse($item['layout']);
                    $string_3 = implode(',', $arrRev);
                ?>
                <div class="select-layout <?php if($string_3 === $string_2): ?> active <?php endif; ?> row w-100 mx-0 mb-4"
                    data-layout="<?php echo e($string_3); ?>">
                    <?php $__currentLoopData = $arrRev; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colRev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-<?php echo e($colRev); ?> px-2">
                            <div class="select-layout-item d-flex justify-content-center align-items-center">
                                <strong class="text-dark"> <?php echo e($colRev); ?> </strong>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php break; ?>

    <?php case ('edit-package'): ?>
        <?php if (isset($component)) { $__componentOriginal970885184d5fd167921d00faab6d094c09439537 = $component; } ?>
<?php $component = App\View\Components\Admin\Pagebuilder\Edit\Package::resolve(['package' => $data['package'],'type' => $data['typePack']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.pagebuilder.edit.package'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Pagebuilder\Edit\Package::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal970885184d5fd167921d00faab6d094c09439537)): ?>
<?php $component = $__componentOriginal970885184d5fd167921d00faab6d094c09439537; ?>
<?php unset($__componentOriginal970885184d5fd167921d00faab6d094c09439537); ?>
<?php endif; ?>
    <?php break; ?>

    <?php case ('edit-column'): ?>
        <input type="hidden" name="" id="edit-col-id" value="<?php echo e($data['id']); ?>">
        <?php if (isset($component)) { $__componentOriginalc55512298d7256a3e33ccdb5da5f3996d1902984 = $component; } ?>
<?php $component = App\View\Components\Admin\Pagebuilder\Layout\Tabs::resolve(['isPack' => false,'adv' => $data['advanced']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.pagebuilder.layout.tabs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Pagebuilder\Layout\Tabs::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php $__env->slot('style', null, []); ?> 
                <div class="form-group mb-4">
                    <label>Background Column</label>
                    <div class="input-group myColorPicker">
                        <input type="text" class="form-control color-picker" value="<?php echo e($data['style']['background']); ?>"
                            id="pgb-col-bg">
                    </div>
                </div>
                <?php if (isset($component)) { $__componentOriginal473117a5f2695396ed878d09de079a810f9c4ab1 = $component; } ?>
<?php $component = App\View\Components\Admin\Pagebuilder\Style\Border::resolve(['package' => $data] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.pagebuilder.style.border'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Pagebuilder\Style\Border::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal473117a5f2695396ed878d09de079a810f9c4ab1)): ?>
<?php $component = $__componentOriginal473117a5f2695396ed878d09de079a810f9c4ab1; ?>
<?php unset($__componentOriginal473117a5f2695396ed878d09de079a810f9c4ab1); ?>
<?php endif; ?>
             <?php $__env->endSlot(); ?>
             <?php $__env->slot('advanced', null, []); ?> 
                <?php if (isset($component)) { $__componentOriginal6b3f2ca3d1e9ca3b3c37b329c5616ef23d8a1499 = $component; } ?>
<?php $component = App\View\Components\Admin\Dark\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.dark.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Dark\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                     <?php $__env->slot('header', null, []); ?> 
                        Full Width On Devices
                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('body', null, []); ?> 
                        <?php $__currentLoopData = config('pagebuilder.breakpoint'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" <?php if(in_array($key, explode(',', $data['advanced']['fw_devices']))): echo 'checked'; endif; ?> value="<?php echo e($key); ?>"
                                    id="col-fw-on-<?php echo e($key); ?>" class="custom-control-input pgb-fw-devices">
                                <label class="custom-control-label" for="col-fw-on-<?php echo e($key); ?>">Full Width On
                                    <?php echo e($item['name']); ?>

                                </label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6b3f2ca3d1e9ca3b3c37b329c5616ef23d8a1499)): ?>
<?php $component = $__componentOriginal6b3f2ca3d1e9ca3b3c37b329c5616ef23d8a1499; ?>
<?php unset($__componentOriginal6b3f2ca3d1e9ca3b3c37b329c5616ef23d8a1499); ?>
<?php endif; ?>
                <div class="form-group mb-4">
                    <label for="edit-col-class">Classes</label>
                    <input type="text" data-role="tagsinput" class="form-control" value="<?php echo e($data['class']); ?>"
                        id="edit-col-class" aria-describedby="classesHelp">
                    <small id="classesHelp" class="form-text text-muted">Nhập class và nhấn <strong>TAB</strong> hoặc
                        <strong>Enter</strong></small>
                </div>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc55512298d7256a3e33ccdb5da5f3996d1902984)): ?>
<?php $component = $__componentOriginalc55512298d7256a3e33ccdb5da5f3996d1902984; ?>
<?php unset($__componentOriginalc55512298d7256a3e33ccdb5da5f3996d1902984); ?>
<?php endif; ?>
    <?php break; ?>

    <?php case ('edit-section'): ?>
        <input type="hidden" name="" id="edit-section-id" value="<?php echo e($data['id']); ?>">
        <?php if (isset($component)) { $__componentOriginalc55512298d7256a3e33ccdb5da5f3996d1902984 = $component; } ?>
<?php $component = App\View\Components\Admin\Pagebuilder\Layout\Tabs::resolve(['isPack' => false,'adv' => $data['advanced']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.pagebuilder.layout.tabs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Pagebuilder\Layout\Tabs::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php $__env->slot('style', null, []); ?> 
                <div class="form-group mb-4">
                    <label>Background Section</label>
                    <div class="input-group myColorPicker">
                        <input type="text" class="form-control color-picker"
                            value="<?php echo e($data['style']['background_section']); ?>" id="pgb-section-bg-wp">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label>Background Container</label>
                    <div class="input-group myColorPicker">

                        <input type="text" class="form-control color-picker"
                            value="<?php echo e($data['style']['background_container']); ?>" id="pgb-section-bg">
                    </div>

                </div>
                <?php if (isset($component)) { $__componentOriginal473117a5f2695396ed878d09de079a810f9c4ab1 = $component; } ?>
<?php $component = App\View\Components\Admin\Pagebuilder\Style\Border::resolve(['package' => $data] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.pagebuilder.style.border'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Pagebuilder\Style\Border::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal473117a5f2695396ed878d09de079a810f9c4ab1)): ?>
<?php $component = $__componentOriginal473117a5f2695396ed878d09de079a810f9c4ab1; ?>
<?php unset($__componentOriginal473117a5f2695396ed878d09de079a810f9c4ab1); ?>
<?php endif; ?>
             <?php $__env->endSlot(); ?>
             <?php $__env->slot('advanced', null, []); ?> 
                <div class="form-group">
                    <label>Container Content:</label>
                    
                    <div class="switch" style="top: -15px">
                        <input type="checkbox" id="<?php echo e('switch-section-cotainer'); ?>" class="switch-slide"
                            <?php if($data['container'] == 'true'): ?> checked <?php endif; ?> /><label
                            for="<?php echo e('switch-section-cotainer'); ?>">Toggle</label>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="edit-section-class">Classes</label>
                    <input type="text" data-role="tagsinput" class="form-control" value="<?php echo e($data['payload']['class']); ?>"
                        id="edit-section-class" aria-describedby="classesHelp">
                    <small id="classesHelp" class="form-text text-muted">Nhập class và nhấn <strong>TAB</strong> hoặc
                        <strong>Enter</strong></small>
                </div>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc55512298d7256a3e33ccdb5da5f3996d1902984)): ?>
<?php $component = $__componentOriginalc55512298d7256a3e33ccdb5da5f3996d1902984; ?>
<?php unset($__componentOriginalc55512298d7256a3e33ccdb5da5f3996d1902984); ?>
<?php endif; ?>
    <?php break; ?>

    <?php default: ?>
        <div class="pgb-shortCode" style="min-width: 800px" id="pgb-shortCode">
            <div class="row justify-content-start no-gutters align-items-center w-100">
                <?php $__currentLoopData = config('pagebuilder.short_code'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t => $shortCode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="pgb-shortCode-item col-3" value="<?php echo e($t); ?>" cid="<?php echo e($data); ?>">
                        <img src="<?php echo e($shortCode['icon']); ?>" alt="shortcodeimg">
                        <span class="name font-weight-bold d-block text-dark"><?php echo e($shortCode['name']); ?></span>
                        <span class="note text-muted d-block text-dark mt-1">
                            <?php echo e($shortCode['note']); ?>

                        </span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
<?php endswitch; ?>
<input type="hidden" name="type" id="pgb-modal-type" value="<?php echo e($type); ?>">
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/modal/pagebuilder/package.blade.php ENDPATH**/ ?>