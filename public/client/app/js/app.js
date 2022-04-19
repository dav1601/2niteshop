$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    //
    //
    $('[data-toggle="tooltip"]').tooltip();

    $(".tawk-button").css("width", "30px !important");
    //  chỉnh chiều cao cho ảnh phải banner
    function setHeight() {
        var heightHome = parseInt($(".home__left").height());
        if ($(".home__left").css("display") != "none") {
            $(".home__right").css("height", heightHome);
            $("#biad__content--home .home__right--slide #homeSlide img").css(
                "height",
                heightHome
            );
            var heightSlide = $(
                "#biad__content--home .home__right--slide #homeSlide img"
            ).height();
            $(".home__right--banner img").css(
                "height",
                parseInt(heightSlide / 4 - 8)
            );
        } else {
            var heightSlide = $(
                "#biad__content--home .home__right--slide #homeSlide"
            ).height();
            $(".home__right").css("height", "auto");
            $("#biad__content--home .home__right--slide #homeSlide img").css(
                "height",
                "auto"
            );
            var heightSlide = $(
                "#biad__content--home .home__right--slide #homeSlide img"
            ).height();
            $(".home__right--banner img").css(
                "height",
                parseInt(heightSlide / 4 - 5)
            );
        }
    }
    // function responsiveModalQuickView() {
    //     var width = $(window).width();
    //     var height = $(window).height();
    //     var heightModal = $("#quickModal .modal-content").height();
    //     var boxBtn = $(".box__sub--btn");
    //     if (height <= heightModal) {
    //         $("#quickModal .modal-dialog").css("margin-top", 0);
    //         boxBtn.css("margin-top", height - 67);
    //     }
    //     console.log()
    // }

    setHeight();
    $(document).on("click", ".btn-number", function (e) {
        e.preventDefault();
        var fieldName = $(this).attr("data-field");
        var type = $(this).attr("data-type");
        if ($("#quickModal").hasClass("show")) {
            var input = $("#outputDetail input[name='" + fieldName + "']");
        } else {
            var input = $("input[name='" + fieldName + "']");
        }
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == "minus") {
                if (currentVal > input.attr("min")) {
                    input.val(currentVal - 1).change();
                }
                if (parseInt(input.val()) == input.attr("min")) {
                    $(this).attr("disabled", true);
                }
            } else if (type == "plus") {
                if (currentVal < input.attr("max")) {
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr("max")) {
                    $(this).attr("disabled", true);
                }
            }
        } else {
            input.val(0);
        }
    });
    $(document).on("focusin", ".input-number", function () {
        $(this).data("oldValue", $(this).val());
    });
    var url_cart = route("add_cart");
    function load_rememer_cart() {
        $.ajax({
            type: "post",
            url: url_cart,
            data: { type: "load" },
            dataType: "json",
            success: function (data) {
                $.end_loading();
                if (data.items != 0) {
                    $(".cartShow--left").html(data.cart);
                } else {
                    $("#empty_output").html(data.cart);
                }
                $("#checkout_cart").html(data.cart);
                $("bt-qty strong").text(data.count);
                $("bt-price strong").text(data.total_format);
                $("#ck_total").text(data.total_format);
                $("#cart__drop").html(data.sub_cart);
                $("#items").html(data.html_items);
            },
        });
    }
    load_rememer_cart();
    function renderAlert($icon = "success", $title = "Tiêu Đề") {
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
        });

        Toast.fire({
            icon: $icon,
            title: $title,
        });
    }
    var view = $("#cookie_view").val();
    var nsp = $("#no-show-popup").val();
    if (nsp == 0) {
        const myTimeout = setTimeout(myPopup, 2000);
        function myPopup() {
            $("#popup").modal("show");
        }
    }
    $(document).on("click", "#no-popup", function () {
        if ($(this).is(":checked")) {
            set_ses_popup(1);
        } else {
            set_ses_popup(0);
        }
    });
    var url__preOrder = route("pre_order");
    set_cookie_view(view);
    var urlQv = route("loadDataQuickView");
    var nameRoute = $("#nameRoute").val();
    var offset = $("#biad__header--bot").offset().top;
    var height = $("#biad__header--bot").height();
    var scroll = offset + height;
    function checkScrollTop() {
        var top = $(document).scrollTop();
        if (top >= scroll + 10) {
            $("#header__scroll")
                .addClass("davi__sticky animate__animated animate__slideInDown")
                .removeClass("d-none animate__slideInUp");
            if (nameRoute == "home") {
                $(".bot__left").addClass("drop__show");
            }
            $(".home__left").css("visibility", "hidden");
        } else {
            $("#header__scroll")
                .removeClass(
                    "davi__sticky animate__animated  animate__slideInDown"
                )
                .addClass("animate__slideInUp d-none");
            $(".home__left").css("visibility", "unset");
            if (nameRoute == "home") {
                $(".bot__left").removeClass("drop__show");
            }
        }
    }
    checkScrollTop();
    $(document).scroll(function () {
        checkScrollTop();
    });
    var debounce = function (func, wait, immediate) {
        var timeout;
        return function () {
            var context = this,
                args = arguments;
            var later = function () {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    };
    $("#search_term").on(
        "keyup",
        debounce(function () {
            var url = route("search");
            var kw = $(this).val();
            if (kw != "") {
                $.ajax({
                    type: "post",
                    url: url,
                    data: { kw: kw },
                    dataType: "json",
                    success: function (data) {
                        if (data.kw != null) {
                            $("#list_result").html(data.html);
                            $(".list_mobile").html(data.html);
                            $(".rsQueryMobile").slideDown();
                            $("#resultQuery").slideDown();
                        }
                        console.log(data);
                    },
                });
            } else {
                $("#resultQuery").slideUp();
                $(".rsQueryMobile").slideUp();
            }
        }, 300)
    );
    $("#search").on(
        "keyup",
        debounce(function () {
            var url = route("search");
            var kw = $(this).val();
            if (kw != "") {
                $.ajax({
                    type: "post",
                    url: url,
                    data: { kw: kw },
                    dataType: "json",
                    success: function (data) {
                        if (data.kw != null) {
                            $("#list_result").html(data.html);
                            $(".list_mobile").html(data.html);
                            $(".rsQueryMobile").slideDown();
                            $("#resultQuery").slideDown();
                        }
                        console.log(data);
                    },
                });
            } else {
                $("#resultQuery").slideUp();
                $(".rsQueryMobile").slideUp();
            }
        }, 300)
    );
    //  custom vị trí cho btn modal quick view
    function settingBtnModal() {
        var height = $(window).height();
        var heightModal = $("#quickModal .modal-content").height();
        var widthModal = parseInt($("#quickModal .modal-content").width()) - 12;
        if (height <= 602) {
            $("#quickModal .modal-dialog").css("margin-top", "0");
            $(".box__sub--btn").css("margin-top", height - 67);
            $("#quickModal .modal-content").css("height", height);
        } else {
            $("#quickModal .modal-dialog").css("margin-top", "1.75rem");
            $(".box__sub--btn").css("margin-top", heightModal - 77);
            $("#quickModal .modal-content").css("height", 602);
        }

        $(".box__sub--btn").css("width", widthModal);
    }

    $(document).on("click", ".quick__view", function () {
        var id = $(this).attr("data-id");
        $.ajax({
            type: "post",
            url: urlQv,
            data: { id: id },
            dataType: "json",
            beforeSend: function () {
                $.loading();
            },
            success: function (data) {
                $("#outputDetail").html(data.html);
                $("#quickModal").modal("show");
                settingBtnModal();
                $.end_loading();
            },
        });
    });
    $("#quickModal").on("shown.bs.modal", function (event) {
        if (!isNaN(parseInt($(".insur__item-active").attr("data-id")))) {
            $("#button-cart").attr(
                "data-op",
                parseInt($(".insur__item-active").attr("data-id"))
            );
        }
        var sub_slide = $("#detailSubGallery").lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            thumbItem: 4,
            controls: false,
            slideMargin: 0,
            enableDrag: true,
            onBeforeSlide: function (el) {
                toggleControls();
            },
            onAfterSlide: function (el) {
                toggleControls();
            },
        });
        function toggleControls() {
            if (
                sub_slide.getCurrentSlideCount() ==
                sub_slide.getTotalSlideCount()
            ) {
                $(".control__next").addClass("d-none");
            } else {
                $(".control__next").removeClass("d-none");
            }
            if (sub_slide.getCurrentSlideCount() == 1) {
                $(".control__prev").addClass("d-none");
            } else {
                $(".control__prev").removeClass("d-none");
            }
        }
        toggleControls();
        $(document).on("click", ".control__next", function () {
            sub_slide.goToNextSlide();
            toggleControls();
        });
        $(document).on("click", ".control__prev", function () {
            sub_slide.goToPrevSlide();
            toggleControls();
        });
    });
    // //////////////////////////////////

    // /////////////////////////////////
    $(document)
        .on("mouseenter", ".product__item", function (event) {
            var id = $(this).attr("data-id");
            $(".qv__" + id).addClass("animate__animated animate__zoomInDown");
        })
        .on("mouseleave", ".product__item", function () {
            $(".quick__view").removeClass(
                "animate__animated  animate__zoomInDown"
            );
        });
    // ///////////////
    $(document)
        .on("mouseenter", ".product__item--list", function (event) {
            var id = $(this).attr("data-id");
            $(".qv__" + id).addClass("animate__animated animate__zoomInDown");
        })
        .on("mouseleave", ".product__item--list", function () {
            $(".quick__view").removeClass(
                "animate__animated  animate__zoomInDown"
            );
        });
    // ///////////////
    $(document).on("click", ".btn-cart", function () {
        var id = $(this).attr("data-id");
        var op = $(this).attr("data-op");
        var sub_total = $(this).attr("data-price");
        var qty = $(this).attr("data-qty");
        $.ajax({
            type: "post",
            url: url_cart,
            data: {
                id: id,
                qty: qty,
                sub_total: sub_total,
                op: op,
                type: "add",
            },
            dataType: "json",
            beforeSend: function () {
                $.loading();
            },
            success: function (data) {
                if (data.items != 0) {
                    $(".cartShow--left").html(data.cart);
                } else {
                    $("#empty_output").html(data.cart);
                }
                $("#checkout_cart").html(data.cart);
                $("bt-qty strong").text(data.count);
                $("#count_mobile").text(data.count);
                $("bt-price strong").text(data.total_format);
                $("#ck_total").text(data.total_format);
                $("#cart__drop").html(data.sub_cart);
                $("#items").html(data.html_items);
                $(".cart__drop").html(data.sub_cart);
                $(".items").html(data.html_items);
                Swal.fire({
                    position: "top-end",
                    html: data.add_ok,
                    showConfirmButton: false,
                    timer: 5000,
                });
                console.log(data);
                $.end_loading();
            },
        });
    });
    $(document).on("click", ".success__add--close i ", function () {
        Swal.close();
    });
    $(document).on("click", ".delete__cart", function () {
        var rowId = $(this).attr("data-rowId");
        $.ajax({
            type: "post",
            url: url_cart,
            data: { rowId: rowId, type: "delete" },
            dataType: "json",
            success: function (data) {
                if (data.items != 0) {
                    $(".cartShow--left").html(data.cart);
                } else {
                    $("#empty_output").html(data.cart);
                }
                $("#checkout_cart").html(data.cart);
                $(".bt-qty strong").text(data.count);
                $("#count_mobile").text(data.count);
                $(".bt-price strong").text(data.total_format);
                $("#ck_total").text(data.total_format);
                $("#cart__drop").html(data.sub_cart);
                $("#items").html(data.html_items);
                $(".cart__drop").html(data.sub_cart);
                $(".items").html(data.html_items);
                $.end_loading();
            },
        });
        return false;
    });
    function set_ses_popup(nsp) {
        var url_cookie = route("set_nsp");
        $.ajax({
            type: "post",
            url: url_cookie,
            data: { val: nsp },
            dataType: "text",
            success: function (data) {
                console.log(data);
            },
        });
    }

    function set_cookie_view($type = "grid") {
        var url_cookie = route("set_cookie");
        $.ajax({
            type: "post",
            url: url_cookie,
            data: { type: $type },
            dataType: "json",
            success: function (data) {
                console.log("ok");
            },
        });
    }
    // set cookie view
    $(document).on("click", ".item-view", function () {
        set_cookie_view(($type = $(this).attr("data-type")));
        $("#sort").attr("data-view", $(this).attr("data-type"));
    });
    $(".carousel").carousel({
        interval: 8000,
    });
    $("#list__banner").owlCarousel({
        loop: false,
        margin: 10,
        slideBy: 1,
        nav: true,
        responsive: {
            0: {
                items: 1,
            },
            568: {
                items: 2,
            },
            1000: {
                items: 3,
            },
        },
    });
    $(".owl-carousel").owlCarousel({
        loop: false,
        margin: 10,
        slideBy: 4,
        nav: true,
        responsive: {
            0: {
                items: 1,
            },
            568: {
                items: 2,
            },
            668: {
                item: 3,
            },
            1000: {
                items: 4,
            },
        },
    });

    /////////////////////////////////
    // START RESPONSIVEEEEEEEEEEEE
    $(document).on("click", ".close__menu", function () {
        var widthMenu = $(".mobile__menu").width();
        $(".mobile__menu").css("left", -widthMenu);
        $("#bg-menu").addClass("d-none");
        $("body").css("overflow-y", "auto");
    });
    // đóng menu
    // mở menu
    $(document).on("click", ".menu-trigger", function () {
        var widthMenu = $(".mobile__menu").width();
        $(".mobile__menu").css("left", 0);
        $("#bg-menu").removeClass("d-none");
        $("body").css("overflow-y", "hidden");
    });
    // Đóng menu cart khi ấn vào background responsive
    $(document).on("click", "#bg-menu", function () {
        var widthMenu = $(".mobile__menu").width();
        var widthCart = $(".cart__mobile").width();
        $(".mobile__menu").css("left", -widthMenu);
        $(".cart__mobile").css("right", -widthCart);
        $("#bg-menu").addClass("d-none");
        $("body").css("overflow-y", "auto");
    });
    //  đóng cart responsive
    $(".cart__mobile--xmark").click(function (e) {
        var widthCart = $(".cart__mobile").width();
        $(".cart__mobile").css("right", -widthCart);
        $("#bg-menu").addClass("d-none");
        $("body").css("overflow-y", "auto");
    });
    // //////////////////
    $(document).on("click", "#preOrder", function () {
        $("#modal__body--preOrd #preOrderNow").attr(
            "data-id",
            $(this).attr("data-id")
        );
        $("#preOrdModal").modal("show");
    });
    $("#preOrdModal").on("hidden.bs.modal", function (event) {
        $.end_loading();
    });
    $(document).on("click", "#preOrderNow", function () {
        var name = $("#name").val();
        var phone = $("#phone").val();
        var id = $(this).attr("data-id");
        var url = route("pre_order");
        $.ajax({
            type: "post",
            url: url,
            data: { name: name, phone: phone, id: id },
            dataType: "json",
            success: function (data) {
                if (data.ok == 0) {
                    $.each(data.errors, function (key, value) {
                        alert(value);
                    });
                }
                if (data.created == 1) {
                    renderAlert(
                        "success",
                        "Quý khách đã gửi thông tin đặt hàng thành công.Bộ phận hỗ trợ sẽ liên lạc sớm nhất với quý khách."
                    );
                    $("#preOrdModal").modal("hide");
                }
                if (data.created == 0) {
                    renderAlert(
                        "error",
                        "Gửi thông tin đặt hàng thất bại. Quý khách thông cảm đặt hàng lại thành thật xin lỗi quý khách."
                    );
                }
            },
        });
    });
    //  /////////////////////////////
    $(".hm__item").hover(
        function () {
            $(this)
                .has(".sub__menu")
                .children(".sub__menu")
                .css("display", "block");
        },
        function () {
            $(this)
                .has(".sub__menu")
                .children(".sub__menu")
                .css("display", "none");
        }
    );

    // END RESPONSIVEEEEEEEEEEEEEEE
    $(".mobile__cart--wrapper").click(function (e) {
        $("#bg-menu").removeClass("d-none");
        $(".cart__mobile").css("right", "0");
        $("body").css("overflow-y", "hidden");
    });
    // ///////////////////////
    $(".mobile__search--wrapper").click(function (e) {
        $(".header__content--search.--mobile").toggleClass("d-none");
    });

    $(".home__right--slide").hover(
        function () {
            $(".slide__btn").css("visibility", "unset");
            $(".slide__btn.--next")
                .removeClass("animate__animated animate__fadeOutRight")
                .addClass("animate__animated animate__fadeInRight");
            $(".slide__btn.--prev")
                .removeClass("animate__animated animate__fadeOutLeft")
                .addClass("animate__animated animate__fadeInLeft");
        },
        function () {
            $(".slide__btn.--next")
                .removeClass("animate__animated animate__fadeInRight")
                .addClass("animate__animated animate__fadeOutRight");
            $(".slide__btn.--prev")
                .removeClass("animate__animated animate__fadeInLeft")
                .addClass("animate__animated animate__fadeOutLeft");
            $(".slide__btn").css("visibility", "hidden");
        }
    );
    $(window).resize(function () {
        setHeight();
        settingBtnModal();
        var right = parseInt($(".cart__mobile").css("right"));
        var windowWidth = $(window).width();
        if (right < 0) {
            if (windowWidth <= 568) {
                $(".cart__mobile").css("right", "-100%");
            } else {
                $(".cart__mobile").css("right", "-80%");
            }
        } else {
            $(".cart__mobile").css("right", 0);
        }
    });
    $(document).on("click", ".icon-toggle", function () {
        var id = $(this).attr("data-id");
        $("#collapse-" + id).collapse("toggle");
        if (
            $(this).children("i").hasClass("fa-circle-plus") &&
            !$("#collapse-" + id).hasClass("show")
        ) {
            $(this).children("i").removeClass("fa-circle-plus");
            $(this).children("i").addClass("fa-circle-minus");
        } else {
            $(this).children("i").removeClass("fa-circle-minus");
            $(this).children("i").addClass("fa-circle-plus");
        }
    });

    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});

