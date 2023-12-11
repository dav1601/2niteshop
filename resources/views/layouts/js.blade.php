<input type="hidden" name="" id="no-show-popup" value="{{ Session::has('nsp') ? Session::get('nsp') : 0 }}">
<x-app.plugin.debug />
<script>
    var nameRoute = {{ Js::from($name) }};
    var cookie_view = {{ Js::from(Cookie::has('view') ? Cookie::get('view') : 'grid') }};
</script>


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


@routes
<script src="{{ $file->ver('app/common.js') }}"></script>
<script src="{{ $file->import_js('helper.js') }}"></script>
<script src="{{ $file->import_js('global.js') }}"></script>


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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
    integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('import_js')
<script src="{{ $file->import_js('app.js') }}"></script>
