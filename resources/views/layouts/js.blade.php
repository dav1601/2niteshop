<input type="hidden" name="" id="no-show-popup" value="{{ Session::has('nsp') ? Session::get('nsp') : 0 }}">
<x-app.plugin.debug />
<script>
    var nameRoute = {{ Js::from($name) }};
    var cookie_view = {{ Js::from(Cookie::has('view') ? Cookie::get('view') : 'grid') }};
</script>
<script src="{{ $file->ver('plugin/bootstrap/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ $file->ver('plugin/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ $file->ver('plugin/bootstrap/js/bootstrap.min.js') }}"></script>
@routes
<script src="{{ $file->import_js('helper.js') }}"></script>
<script src="{{ $file->import_js('global.js') }}"></script>
<script src="{{ $file->import_js('app.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.14/vue.min.js"
    integrity="sha512-XdUZ5nrNkVySQBnnM5vzDqHai823Spoq1W3pJoQwomQja+o4Nw0Ew1ppxo5bhF2vMug6sfibhKWcNJsG8Vj9tg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ $file->ver('client/zoom-master/jquery.zoom.min.js') }}"></script>
@if ($name != 'search_main' && $name != 'show_cart')
    <script src="{{ $file->import_js('product.js') }}"></script>
@endif
<script src="{{ $file->ver('client/owl/dist/owl.carousel.min.js') }}"></script>
<script src="{{ $file->ver('client/ls/dist/js/lightslider.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.4.0/socket.io.min.js"></script>
<script src="{{ $file->ver('js/laravel-server/laravel-echo-server.js') }}"></script>
@yield('import_js')
