$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    jQuery.ajaxCart = function ajaxCart(data = {}, callback) {
        const type = data.type;
        $.ajax({
            type: "post",
            url: route("add_cart"),
            data: data,
            dataType: "json",
            success: function (data) {
                $.end_loading();
                callback;
                $(".items").text(data.html_items);
                $(".cart__drop").html(data.cart_drop);
                $("#cart__show").html(data.cart);
                $("#cart__checkout").html(data.checkout);
                if (type == "add") {
                    Swal.fire({
                        position: "top-end",
                        html: data.add_ok,
                        showConfirmButton: false,
                        timer: 6500,
                    });
                }
            },
        });
    };
    function loadCart() {
        const data = { type: "load" };
        $.ajaxCart(data);
    }
    function initApp() {
        checkScrollTop();
        loadCart();
        set_cookie_view(cookie_view);
        $.initSwiper();
        $.initMultipleSwiper();
    }
    initApp();
    function showMobileMenu(show = true, menu = "category") {
        const el = $(".mobile__menu." + "--" + menu);
        if (show) {
            $("body").css("overflow", "hidden");
            el.css("left", 0);
        } else {
            $("body").css("overflow", "auto");
            el.css("left", "-100vw");
        }
        return;
    }
    $(document).on("click", ".eyes-pass", function () {
        if ($(this).hasClass("fa-eye")) {
            $(this).prev("input").attr("type", "text");
            $(this).removeClass("fa-eye");
            $(this).addClass("fa-eye-slash");
        } else {
            $(this).prev("input").attr("type", "password");
            $(this).removeClass("fa-eye-slash");
            $(this).addClass("fa-eye");
        }
        // làm load form ajax cho modal auth
    });

    $(document).on("click", ".loadModalReg", function () {
        renderForm("reg", true);
    });
    $(document).on("click", ".loadTempReg", function () {
        renderForm("reg", false);
    });
    $(document).on("click", ".loadModalLogin", function () {
        renderForm("login", true);
    });
    $(document).on("click", ".loadTempLogin", function () {
        renderForm("login", false);
    });

    function renderForm(type = "login", modal = true) {
        let authModal = $("#authModal");
        let title = "Đăng nhập";
        let data = { type: type };
        switch (type) {
            case "reg":
                title = "Đăng ký";
                break;
            case "restore":
                title = "Khôi phục";
                break;
            default:
                break;
        }
        $.ajax({
            type: "post",
            url: route("auth.template"),
            data: data,
            dataType: "json",
            success: function (data) {
                $("#authModalTitle").html(
                    `<h2 class="title text-center">${title}</h2>`
                );
                $("#authContent").html(data.html);
                if (modal) {
                    authModal.modal("show");
                }
            },
        });
    }
    //
    $(document).on("submit", "#formRegModal", function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        const form = $(this)[0];
        $.errForm(true, form);
        $.btn_loading(form, true, true);
        $.ajax({
            type: "post",
            url: route("ajax.auth.register"),
            data: data,
            dataType: "json",
            success: function (data) {
                $.btn_loading(form, false, true);
                $.errForm(false, form, data.errors);
                if (data.s) {
                    window.location.href = route("home");
                }
            },
        });
    });
    //
    $(document).on("submit", "#formLoginModal", function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        const form = $(this)[0];
        $.errForm(true, form);
        $.btn_loading(form, true, true);
        $.ajax({
            type: "post",
            url: route("navi_login"),
            data: data,
            dataType: "json",
            success: function (data) {
                $.btn_loading(form, false, true);
                $.errForm(false, form, data.errors.input);
                if (data.errors.login) {
                    $.vaToast(data.errors.login, "e", 15000);
                    loginPass.val("");
                }
                if (data.s) {
                    if (data.role <= 3) {
                        window.location.href = route("dashboard");
                    } else {
                        window.location.href = route("home");
                    }
                }
            },
        });
    });

    //////////////////////
    $(window).scroll(function (event) {
        let scroll = $(window).scrollTop();
        let element = $("#wrapper__header--top");
        if ($(window).width() <= 1024) {
            if (scroll >= 250) {
                element.addClass(
                    "fixed__top animate__animated animate__bounceInDown"
                );
            } else {
                element.removeClass(
                    "fixed__top animate__animated animate__bounceInDown"
                );
            }
        }
    });
    function loadingCart(id = null, loading = false) {
        if (!id) {
            return;
        }
        let btn = $("#btn-add-cart-" + id);

        // let child = btn.children(".btn-cart-add");
        // let cartLoading = btn.children(".btn-cart-loading");
        if (loading) {
            $.btn_loading(btn, true, false, "mr-2 text-white");
            // child.addClass("d-none");
            // cartLoading.removeClass("d-none");
        } else {
            $.btn_loading(btn, false, false);
            // child.removeClass("d-none");
            // cartLoading.addClass("d-none");
        }
    }
    $(document).on("click", ".delete__cart", function () {
        const rowId = $(this).attr("data-rowid");
        const data = {
            type: "delete",
            rowId: rowId,
        };
        $.ajaxCart(data);
    });
    $(document).on("click", ".btn-cart", function () {
        const id = Number($(this).attr("data-id"));
        let qty = Number($("#qty-product-" + id).val());
        let ops = $("#cart__options-" + id).val();
        let isLoading = !$(this)
            .children(".btn-cart-loading")
            .hasClass("d-none");
        if (isLoading) {
            return alert("handing");
        }
        const data = {
            type: "add",
            qty: qty,
            id: id,
            ops: ops,
        };
        loadingCart(id, true);
        $.ajaxCart(data, loadingCart(id, false));
    });
    $(document).on("change", ".input-number", function () {
        let max = Number($(this).attr("max"));
        let min = Number($(this).attr("min"));
        let isAjax = $(this).attr("data-ajax");
        let id = Number($(this).attr("data-id"));
        let elPrice = $(".price-" + id);
        let opsPrice = 0;
        let currentVal = Number($(this).val());
        let ops = $("#cart__options-" + id).val();
        if (currentVal > 1) {
            $(
                ".cart-handler-" + id + " .btn-number[data-type=minus]"
            ).removeClass("disabled");
        } else {
            $(".cart-handler-" + id + " .btn-number[data-type=minus]").addClass(
                "disabled"
            );
        }
        if (currentVal < 100) {
            $(
                ".cart-handler-" + id + " .btn-number[data-type=plus]"
            ).removeClass("disabled");
        } else {
            $(".cart-handler-" + id + " .btn-number[data-type=plus]").addClass(
                "disabled"
            );
        }
        if (currentVal < min || currentVal > max) {
            $(this).val(1);
            return alert(
                "Bạn đã nhập quá số lượng tối thiểu hoặc tối đa có thể đặt hàng của sản phẩm!"
            );
        }
        $(".insur__item-active").each(function (idx) {
            opsPrice += Number($(this).attr("data-price"));
        });
        let price = (Number(elPrice.attr("prd-price")) + opsPrice) * currentVal;
        elPrice.attr("data-price", price);
        elPrice.text($.crf(price));
        if (isAjax) {
            const data = {
                type: "update",
                qty: currentVal,
                id: id,
                ops: ops,
            };
            loadingCart(id, true);
            $.ajaxCart(data, loadingCart(id, false));
        }
    });
    $(document).on("click", ".btn-number", function () {
        let type = $(this).attr("data-type");
        let id = Number($(this).attr("data-id"));
        let elInput = $("#qty-product-" + id);
        let elBtn = $("#btn-add-cart-" + id);
        let max = Number(elInput.attr("max"));
        let min = Number(elInput.attr("min"));
        let disabled = $(this).hasClass("disabled");
        let ajax = Boolean($(this).attr("data-ajax"));
        let currentVal = Number(elInput.val());
        if (disabled) {
            return;
        }
        if (type == "plus") {
            currentVal++;
        } else {
            currentVal--;
        }
        if (currentVal >= min && currentVal <= max) {
            elInput.val(currentVal);
            $(".input-number").trigger("change");
        }
    });
    //////////////////////
    $('[data-toggle="tooltip"]').tooltip();

    $(".tawk-button").css("width", "30px !important");
    //  chỉnh chiều cao cho ảnh phải banner
    function setHeight() {
        let heightHome = Number($(".home__left").height());
        let heightImg = Number($("#homeSlide img").height());
        let slideImg = $(
            "#biad__content--home .home__right--slide #homeSlide img"
        );
        if ($(".home__left").css("display") != "none") {
            $(".home__right").css("height", heightImg);
            // slideImg.css("height", heightHome);
            $(".home__right--banner img").css(
                "height",
                Number(heightImg / 4 - 6)
            );
        } else {
            $(".home__right").css("height", "auto");
            slideImg.css("height", "auto");
            $(".home__right--banner img").css(
                "height",
                Number(heightImg / 4 - 5)
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
    // setHeight();

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
    var urlQv = route("loadDataQuickView");
    var offset = $("#biad__header--bot").offset().top;
    var height = $("#biad__header--bot").height();
    var pointSroll = $("#home_content").offset().top;
    var scroll = offset + height;
    function checkScrollTop() {
        var top = $(document).scrollTop();
        if (top >= pointSroll) {
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

    $(document).on("click", ".success__add--close i ", function () {
        Swal.close();
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

    /////////////////////////////////
    // START RESPONSIVEEEEEEEEEEEE
    $(document).on("click", ".close__menu", function () {
        showMobileMenu(false);
    });

    // đóng menu
    // mở menu
    $(document).on("click", ".menu-trigger", function () {
        showMobileMenu(true);
    });

    //  đóng cart responsive
    $(".cart__mobile--xmark").click(function (e) {
        showMobileMenu(false, "cart");
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
        showMobileMenu(true, "cart");
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
        // setHeight();
        settingBtnModal();
        $.initSwiper();
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
