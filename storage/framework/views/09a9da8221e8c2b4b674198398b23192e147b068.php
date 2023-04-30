<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // $("#home-swiper-product-116").html("test");
        function getComponentProduct(id, type = "list") {
            const el = $("#home-swiper-product-" + id);
            $.ajax({
                type: "post",
                url: route('prd.component'),
                data: {
                    prdId: Number(id),
                    type: type
                },
                dataType: "json",
                success: function(data) {
                    console.log(el, data.html);
                    if (!data.prd) {
                        alert("Sản phẩm không tồn tại");
                    } else {
                        el.html(data.html);
                    }
                }
            });
        }
        window.Echo.channel('common').listen("UpdateProduct", (e) => {
            const prdId = e.product;
            getComponentProduct(prdId, "grid");
            const data = {
                type: 'realtimeupdate',
                id: prdId,
                rtupdate: true
            }
            $.ajaxCart(data);
        });

        // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
    });
</script>
<?php if(auth()->guard()->check()): ?>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            window.Echo.join('user.' +
                <?php echo e(Auth::id()); ?>,
            ).listen("UpdateOrder", function(e) {
                if (route().current('purchase')) {
                    $.loadOrder(true);
                }
            });

            // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
        });
    </script>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/server/common.blade.php ENDPATH**/ ?>