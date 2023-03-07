<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 4,
            slidesPerGroup: 4,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
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
@auth
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            window.Echo.join('user.' +
                {{ Auth::id() }},
            ).listen("UpdateOrder", function(e) {
                if (route().current('purchase')) {
                    $.loadOrder(true);
                }
            });

            // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
        });
    </script>
@endauth
