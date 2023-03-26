<?php switch($type):
    case ('change-layout'): ?>
        <?php
            $arrLayout = [['layout' => ['12'], 'rvs' => false], ['layout' => ['10', '2'], 'rvs' => true], ['layout' => ['9', '3'], 'rvs' => true], ['layout' => ['8', '4'], 'rvs' => true], ['layout' => ['7', '5'], 'rvs' => true], ['layout' => ['6', '6'], 'rvs' => false], ['layout' => ['4', '4', '4'], 'rvs' => false], ['layout' => ['3', '3', '3', '3'], 'rvs' => false], ['layout' => ['5ths', '5ths', '5ths', '5ths', '5ths'], 'rvs' => false]];
        ?>
        <input type="hidden" id="selected_layout" sid="<?php echo e($data['id']); ?>" data-layout="<?php echo e(implode(',', $data['layout'])); ?>">
        <?php $__currentLoopData = $arrLayout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $string_1 = implode(',', $item['layout']);
                $string_2 = implode(',', $data['layout']);
            ?>


            <div class="select-layout col-12 <?php if($string_1 === $string_2): ?> active <?php endif; ?> row w-100 mb-3"
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
                <div class="select-layout <?php if($string_3 === $string_2): ?> active <?php endif; ?> row w-100 mb-3"
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

    <?php case ('edit-section'): ?>
        <input type="hidden" name="" id="edit-section-id" value="<?php echo e($data['id']); ?>">
        <div class="form-group">
            <label for="edit-section-bg">Background Wrapper Section</label>
            <input type="text" class="form-control" id="edit-section-bg" value="<?php echo e($data['payload']['background']); ?>"
                placeholder="Fill in the background color code">

        </div>
        <div class="form-group">
            <label for="edit-section-class">Classes</label>
            <input type="text" data-role="tagsinput" class="form-control" value="<?php echo e($data['payload']['class']); ?>"
                id="edit-section-class" aria-describedby="classesHelp">
            <small id="classesHelp" class="form-text text-muted">Nhập class và nhấn <strong>TAB</strong> hoặc
                <strong>Enter</strong></small>
        </div>
        <div class="form-group">
            <label>Container:</label>
            
            <div class="switch">
                <input type="checkbox" id="<?php echo e('switch-section-cotainer'); ?>" class="switch-slide"
                    <?php if($data['container'] == 'true'): ?> checked <?php endif; ?> /><label
                    for="<?php echo e('switch-section-cotainer'); ?>">Toggle</label>
            </div>
        </div>
    <?php break; ?>

    

    <?php default: ?>
        

        <div class="pgb-shortCode w-100" id="pgb-shortCode">
            <div class="row justify-content-start no-gutters align-items-center w-100" >
                <?php $__currentLoopData = config('pagebuilder.short_code'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t => $shortCode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="pgb-shortCode-item col-3" value="<?php echo e($t); ?>" cid="<?php echo e($data); ?>">
                        <img src="<?php echo e($shortCode['icon']); ?>" alt="shortcodeimg">
                        <span class="name font-weight-bold d-block text-dark"><?php echo e($shortCode['name']); ?></span>
                        <span class="note text-muted d-block text-dark">
                            <?php echo e($shortCode['note']); ?>

                        </span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
<?php endswitch; ?>
<input type="hidden" name="type" id="pgb-modal-type" value="<?php echo e($type); ?>">
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/modal/pagebuilder/package.blade.php ENDPATH**/ ?>