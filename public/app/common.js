$(function () {
    jQuery.page_loading = function page_loading(loading = true) {
        return !loading
            ? $(".fp-loading").addClass("d-none")
            : $(".fp-loading").removeClass("d-none");
    };
    jQuery.iconLoading = function iconLoading(center = false) {
        let html = "";
        if (center)
            html += `<div class="d-flex justify-content-center align-items-center w-100 h-100">`;
        html += `<div class="loadingio-spinner-spinner-n9di4kxn1i">
                 <div class="ldio-5wn61nbeypm">
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                 </div>
             </div>`;
        if (center) html += `</div>`;
        return html;
    };
    jQuery.initSwiper = function initSwiper(
        el = ".mySwiper",
        perView = 4,
        perG = 4,
        space = 10
    ) {
        let pv640 = perView > 1 ? perView - 1 : 1;
        let pv480 = pv640 > 1 ? pv640 - 1 : 1;
        let pv320 = pv480 > 1 ? pv480 - 1 : 1;
        return new Swiper(el, {
            slidesPerView: perView,
            slidesPerGroup: perG,
            spaceBetween: space,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: pv320,
                    slidesPerGroup: pv320,
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: pv480,
                    slidesPerGroup: pv480,
                },
                // when window width is >= 640px
                640: {
                    slidesPerView: pv640,
                    slidesPerGroup: pv640,
                },
                1336: {
                    slidesPerView: perView,
                    slidesPerGroup: perView,
                },
            },
        });
    };
    jQuery.initMultipleSwiper = function initMultipleSwiper() {
        const els = $(".module-swiper");
        $.each(els, function (i, slide) {
            let items = Number($(slide).attr("data-items")) ?? 4;
            let perGroup = Number($(slide).attr("data-per-group")) ?? items;
            let id = $(slide).attr("id") ?? null;
            if (id) {
                $.initSwiper("#" + id, items, perGroup);
            }
        });
    };
    jQuery.btn_loading_v2 = function btn_loading_v2(
        el,
        loading = true,
        submit = false
    ) {
        let btnSubmit = $(el);
        btnSubmit = $(btnSubmit);
        if (submit) {
            btnSubmit = $(el).find("[type='submit']");
        }
        if (!btnSubmit) {
            return;
        }
        let original = btnSubmit.attr("data-original");
        if (!original) {
            let currentHtml = btnSubmit.html();
            btnSubmit.attr("data-original", currentHtml);
        }
        btnSubmit.prop("disabled", loading);
        if (loading) {
            btnSubmit.attr("is-loading", true);
            btnSubmit.html(`<span class="spinner-border spinner-border-sm"  role="status" aria-hidden="true"></span>
                Loading...`);
        } else {
            const old = btnSubmit.attr("data-original");
            btnSubmit.html(old);
            btnSubmit.attr("is-loading", false);
            btnSubmit.removeAttr("data-original");
        }

        return;
    };
    jQuery.validationFail = (errors = [], parent = ".form-group") => {
        const validatorOld = $(".validator-error");
        $.each(validatorOld, function (index, el) {
            $(el).remove();
        });
        console.log(errors);
        if (errors.length <= 0) {
            return;
        }
        $.each(errors, function (field, arrayError) {
            const el = $("[name=" + field + "]")[0];

            if (field == "category") {
                $("#product-category").append(alertErrorForm(arrayError[0]));
            }
            if (el) {
                const elParent = $(el).closest(parent);
                if (elParent) {
                    elParent.append(alertErrorForm(arrayError[0]));
                }
            }
        });
    };
    // NOTE lam phan nay //////////////////////////////////////////////////////
    jQuery.renderOptionAddress = (parent_id = null, type = "", output = "") => {
        return $.ajax({
            type: "post",
            url: route("common.render_options_address"),
            data: {
                parent_id: parent_id,
                type: type,
            },
            dataType: "json",
            success: function (res) {
                const data = res.data;
                if (output) {
                    output.html(data.html);
                } else {
                    $("#" + type).html(data.html);
                }
            },
        });
    };
    function alertErrorForm(err = "") {
        return `<div class="alert alert-danger alert-dismissible fade show mt-2 validator-error" role="alert">
        <strong>${err}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>`;
    }
});
