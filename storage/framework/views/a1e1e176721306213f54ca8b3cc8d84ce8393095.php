<input type="hidden" name="" id="no-show-popup" value="<?php echo e(Session::has('nsp') ? Session::get('nsp') : 0); ?>">
<?php if (isset($component)) { $__componentOriginal9636b50d9f0a3581b759498e9135550b36d917c2 = $component; } ?>
<?php $component = App\View\Components\App\Plugin\Debug::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app.plugin.debug'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\App\Plugin\Debug::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9636b50d9f0a3581b759498e9135550b36d917c2)): ?>
<?php $component = $__componentOriginal9636b50d9f0a3581b759498e9135550b36d917c2; ?>
<?php unset($__componentOriginal9636b50d9f0a3581b759498e9135550b36d917c2); ?>
<?php endif; ?>
<script>
    var nameRoute = <?php echo e(Js::from($name)); ?>;
    var cookie_view = <?php echo e(Js::from(Cookie::has('view') ? Cookie::get('view') : 'grid')); ?>;
</script>
<script src="<?php echo e($file->ver('plugin/bootstrap/js/jquery-3.5.1.min.js')); ?>"></script>
<script src="<?php echo e($file->ver('plugin/bootstrap/js/popper.min.js')); ?>"></script>
<script src="<?php echo e($file->ver('plugin/bootstrap/js/bootstrap.min.js')); ?>"></script>
<?php echo app('Tightenco\Ziggy\BladeRouteGenerator')->generate(); ?>
<script src="<?php echo e($file->import_js('helper.js')); ?>"></script>
<script src="<?php echo e($file->import_js('global.js')); ?>"></script>
<script src="<?php echo e($file->import_js('app.js')); ?>"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo e($file->ver('client/zoom-master/jquery.zoom.min.js')); ?>"></script>
<?php if($name != 'search_main' && $name != 'show_cart'): ?>
    <script src="<?php echo e($file->import_js('product.js')); ?>"></script>
<?php endif; ?>
<script src="<?php echo e($file->ver('client/owl/dist/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e($file->ver('client/ls/dist/js/lightslider.min.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<?php echo $__env->yieldContent('import_js'); ?>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/layouts/js.blade.php ENDPATH**/ ?>