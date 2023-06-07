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

<?php if (isset($component)) { $__componentOriginalf56e96fa23f50da776b13da3b20b3c57206083f1 = $component; } ?>
<?php $component = App\View\Components\Include\Bootstrap::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('include.bootstrap'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Include\Bootstrap::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf56e96fa23f50da776b13da3b20b3c57206083f1)): ?>
<?php $component = $__componentOriginalf56e96fa23f50da776b13da3b20b3c57206083f1; ?>
<?php unset($__componentOriginalf56e96fa23f50da776b13da3b20b3c57206083f1); ?>
<?php endif; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/plugins/object-fit/ls.object-fit.min.js"
    integrity="sha512-uq8vhRSzhuN8xiniPi20LTGnDZs2UumLLjBHgwfAZnDtS4C/tNCqvr/ZZ4mzkt7BIKe1HB/O1o4zfiu5GX1S9g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/plugins/parent-fit/ls.parent-fit.min.js"
    integrity="sha512-1oXBldvRhlG5dHYmpmBFccqjN+ncdNSs6uwLtxiOufvBQy4Or63PsXibQSuokBUcY8SN7eQ3uJ4SqPM+E4xcFQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/plugins/blur-up/ls.blur-up.min.js"
    integrity="sha512-m2OFel/sfChYJK3Vokl0nOGYUko9mfJdUR4oHNQAI7Vz7T3vpfIvw3wDK6j5rxOpoKkLetgGwWTjbEoiSnriWA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js"
    integrity="sha512-q583ppKrCRc7N5O0n2nzUiJ+suUv7Et1JGels4bXOaMFQcamPk9HjdUknZuuFjBNs7tsMuadge5k9RzdmO+1GQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<?php echo app('Tightenco\Ziggy\BladeRouteGenerator')->generate(); ?>
<script src="<?php echo e($file->ver('app/common.js')); ?>"></script>
<script src="<?php echo e($file->import_js('helper.js')); ?>"></script>
<script src="<?php echo e($file->import_js('global.js')); ?>"></script>



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
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.4.0/socket.io.min.js"></script>
<script src="<?php echo e($file->ver('js/laravel-server/laravel-echo-server.js')); ?>"></script>
<?php echo $__env->yieldContent('import_js'); ?>
<script src="<?php echo e($file->import_js('app.js')); ?>"></script>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/layouts/js.blade.php ENDPATH**/ ?>