<div class="pgb-wp-column">
    <ul class="pgb-col row no-gutters trans-025-all" sid="<?php echo e($section->id); ?>">
        <?php $__currentLoopData = $section->layout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $data_column = $section->column[$index];
            ?>
            <?php if($data_column): ?>
                <?php
                    $attr = 'id=' . $data_column['id'];
                ?>
                <li class="col-<?php echo e($c); ?> px-2">
                    <div class="pgb-section-col">
                        <ul class="pgb-sort-connect-package pgb-sort-package pgb-wp-package pgb-wp-package-<?php echo e($data_column['id']); ?> trans-025-all"
                            data-type="package">
                            <?php if(isset($data_column['package'])): ?>
                                <?php $__currentLoopData = $data_column['package']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indexPack => $packItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if (isset($component)) { $__componentOriginalf8f5f0d6b901c11946bd3b3447071fc11b7014b7 = $component; } ?>
<?php $component = App\View\Components\Admin\Pagebuilder\Package::resolve(['package' => $packItem] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.pagebuilder.package'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Pagebuilder\Package::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf8f5f0d6b901c11946bd3b3447071fc11b7014b7)): ?>
<?php $component = $__componentOriginalf8f5f0d6b901c11946bd3b3447071fc11b7014b7; ?>
<?php unset($__componentOriginalf8f5f0d6b901c11946bd3b3447071fc11b7014b7); ?>
<?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>


                        <?php if (isset($component)) { $__componentOriginal8895df377ce551d31cc3894729bab76138508615 = $component; } ?>
<?php $component = App\View\Components\Admin\Pagebuilder\Component\Button\Add::resolve(['class' => 'render-modal-package ui-disabled','t' => 'render-package','customAttr' => $attr] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.pagebuilder.component.button.add'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Pagebuilder\Component\Button\Add::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8895df377ce551d31cc3894729bab76138508615)): ?>
<?php $component = $__componentOriginal8895df377ce551d31cc3894729bab76138508615; ?>
<?php unset($__componentOriginal8895df377ce551d31cc3894729bab76138508615); ?>
<?php endif; ?>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

</div>

<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/pagebuilder/column.blade.php ENDPATH**/ ?>