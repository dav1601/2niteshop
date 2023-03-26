<?php
    $name = Route::currentRouteName();
    $customTitle = 'Test';
?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <?php echo $__env->make('layouts.meta', ['customTitle' => 'dasdsadas'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->make('layouts.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->make('layouts.js', ['name' => $name], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
</head>

<?php if (isset($component)) { $__componentOriginal252edcefdbee3bce4e253e3911c7618a88421a16 = $component; } ?>
<?php $component = App\View\Components\Client\Plugin\Facebook::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('client.plugin.facebook'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Client\Plugin\Facebook::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal252edcefdbee3bce4e253e3911c7618a88421a16)): ?>
<?php $component = $__componentOriginal252edcefdbee3bce4e253e3911c7618a88421a16; ?>
<?php unset($__componentOriginal252edcefdbee3bce4e253e3911c7618a88421a16); ?>
<?php endif; ?>

<body>
    
    
    
    <?php if (isset($component)) { $__componentOriginal3f5a3a73d718448c7da3c3cd79ebdd9b2a177a13 = $component; } ?>
<?php $component = App\View\Components\Mobile\Menu::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('mobile.menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Mobile\Menu::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3f5a3a73d718448c7da3c3cd79ebdd9b2a177a13)): ?>
<?php $component = $__componentOriginal3f5a3a73d718448c7da3c3cd79ebdd9b2a177a13; ?>
<?php unset($__componentOriginal3f5a3a73d718448c7da3c3cd79ebdd9b2a177a13); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalaa66bbdc7eb09ced21adc881e2736a8f7e187b48 = $component; } ?>
<?php $component = App\View\Components\Mobile\Cart\Wp::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('mobile.cart.wp'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Mobile\Cart\Wp::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaa66bbdc7eb09ced21adc881e2736a8f7e187b48)): ?>
<?php $component = $__componentOriginalaa66bbdc7eb09ced21adc881e2736a8f7e187b48; ?>
<?php unset($__componentOriginalaa66bbdc7eb09ced21adc881e2736a8f7e187b48); ?>
<?php endif; ?>
    <?php if(Gate::allows('group-admin')): ?>
        <?php if (isset($component)) { $__componentOriginal16922a32012e445d83def1b667bd8c380818a472 = $component; } ?>
<?php $component = App\View\Components\Admin\Navbar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Navbar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16922a32012e445d83def1b667bd8c380818a472)): ?>
<?php $component = $__componentOriginal16922a32012e445d83def1b667bd8c380818a472; ?>
<?php unset($__componentOriginal16922a32012e445d83def1b667bd8c380818a472); ?>
<?php endif; ?>
    <?php endif; ?>
    <?php echo $__env->yieldContent('banner'); ?>
    <div id="b1ad">
        <div id="b1ad__header">
            <?php if (isset($component)) { $__componentOriginald225beedaa4fae9e46f48a7dbd9f19c6baec6892 = $component; } ?>
<?php $component = App\View\Components\Header\Top::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header.top'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Header\Top::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald225beedaa4fae9e46f48a7dbd9f19c6baec6892)): ?>
<?php $component = $__componentOriginald225beedaa4fae9e46f48a7dbd9f19c6baec6892; ?>
<?php unset($__componentOriginald225beedaa4fae9e46f48a7dbd9f19c6baec6892); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal9342f2fe4d62d9eeebeb40bf7a9eab037912aff3 = $component; } ?>
<?php $component = App\View\Components\Header\Mobile\Def::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header.mobile.def'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Header\Mobile\Def::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9342f2fe4d62d9eeebeb40bf7a9eab037912aff3)): ?>
<?php $component = $__componentOriginal9342f2fe4d62d9eeebeb40bf7a9eab037912aff3; ?>
<?php unset($__componentOriginal9342f2fe4d62d9eeebeb40bf7a9eab037912aff3); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalb6cfe1fbfca1da8dff80e79b590e361ed9251d22 = $component; } ?>
<?php $component = App\View\Components\Header\Mobile\Toprespon::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header.mobile.toprespon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Header\Mobile\Toprespon::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb6cfe1fbfca1da8dff80e79b590e361ed9251d22)): ?>
<?php $component = $__componentOriginalb6cfe1fbfca1da8dff80e79b590e361ed9251d22; ?>
<?php unset($__componentOriginalb6cfe1fbfca1da8dff80e79b590e361ed9251d22); ?>
<?php endif; ?>
            
            <?php if (isset($component)) { $__componentOriginal724840ca7fa3709151294f429e31003ab28d6e05 = $component; } ?>
<?php $component = App\View\Components\Header\Bottom::resolve(['name' => $name] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header.bottom'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Header\Bottom::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal724840ca7fa3709151294f429e31003ab28d6e05)): ?>
<?php $component = $__componentOriginal724840ca7fa3709151294f429e31003ab28d6e05; ?>
<?php unset($__componentOriginal724840ca7fa3709151294f429e31003ab28d6e05); ?>
<?php endif; ?>
            
            <div id="header__scroll" class="d-none">
                <?php if (isset($component)) { $__componentOriginal724840ca7fa3709151294f429e31003ab28d6e05 = $component; } ?>
<?php $component = App\View\Components\Header\Bottom::resolve(['name' => $name] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header.bottom'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Header\Bottom::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal724840ca7fa3709151294f429e31003ab28d6e05)): ?>
<?php $component = $__componentOriginal724840ca7fa3709151294f429e31003ab28d6e05; ?>
<?php unset($__componentOriginal724840ca7fa3709151294f429e31003ab28d6e05); ?>
<?php endif; ?>
            </div>
            
        </div>
        <div id="biad__content" class="<?php echo $__env->yieldContent('margin'); ?>">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <?php if (isset($component)) { $__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf = $component; } ?>
<?php $component = App\View\Components\Footer::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('Footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Footer::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf)): ?>
<?php $component = $__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf; ?>
<?php unset($__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf); ?>
<?php endif; ?>
    </div>
    <?php if (isset($component)) { $__componentOriginalf1539043f996ad19222d3857327d27715a337b42 = $component; } ?>
<?php $component = App\View\Components\Modal\Product::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal.Product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Modal\Product::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf1539043f996ad19222d3857327d27715a337b42)): ?>
<?php $component = $__componentOriginalf1539043f996ad19222d3857327d27715a337b42; ?>
<?php unset($__componentOriginalf1539043f996ad19222d3857327d27715a337b42); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal4747fc7fd8cffb6b4e0a83e11b8e83773fcacc14 = $component; } ?>
<?php $component = App\View\Components\Modal\Preorder::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal.preorder'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Modal\Preorder::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4747fc7fd8cffb6b4e0a83e11b8e83773fcacc14)): ?>
<?php $component = $__componentOriginal4747fc7fd8cffb6b4e0a83e11b8e83773fcacc14; ?>
<?php unset($__componentOriginal4747fc7fd8cffb6b4e0a83e11b8e83773fcacc14); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal6ecf414484838f2a180a39f5cf6522506b2be900 = $component; } ?>
<?php $component = App\View\Components\Ajax::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('Ajax'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Ajax::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6ecf414484838f2a180a39f5cf6522506b2be900)): ?>
<?php $component = $__componentOriginal6ecf414484838f2a180a39f5cf6522506b2be900; ?>
<?php unset($__componentOriginal6ecf414484838f2a180a39f5cf6522506b2be900); ?>
<?php endif; ?>
</body>

<?php if (isset($component)) { $__componentOriginal6f0850f373ebb37a73723564cf2ba6fbff84ea8a = $component; } ?>
<?php $component = App\View\Components\Server\Common::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('server.common'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Server\Common::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6f0850f373ebb37a73723564cf2ba6fbff84ea8a)): ?>
<?php $component = $__componentOriginal6f0850f373ebb37a73723564cf2ba6fbff84ea8a; ?>
<?php unset($__componentOriginal6f0850f373ebb37a73723564cf2ba6fbff84ea8a); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginal032bbdf7ac4a6d259e4904f494eb5505486444f9 = $component; } ?>
<?php $component = App\View\Components\Admin\Modal\Auth::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.modal.auth'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Modal\Auth::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal032bbdf7ac4a6d259e4904f494eb5505486444f9)): ?>
<?php $component = $__componentOriginal032bbdf7ac4a6d259e4904f494eb5505486444f9; ?>
<?php unset($__componentOriginal032bbdf7ac4a6d259e4904f494eb5505486444f9); ?>
<?php endif; ?>

</html>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/layouts/app.blade.php ENDPATH**/ ?>