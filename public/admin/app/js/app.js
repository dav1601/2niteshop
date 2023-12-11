$(function () {
    $(document).on("focusin", function (e) {
        if (
            $(e.target).closest(
                ".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root"
            ).length
        ) {
            e.stopImmediatePropagation();
        }
    });

    jQuery.initColorPicker = function initColorPicker() {
        return $(".color-picker").minicolors({
            // animation speed
            animationSpeed: 50,

            // easing function
            animationEasing: "swing",

            // defers the change event from firing while the user makes a selection
            changeDelay: 0,

            // hue, brightness, saturation, or wheel
            control: "hue",

            // default color
            defaultValue: "",

            // hex or rgb
            format: "hex",

            // show/hide speed
            showSpeed: 100,
            hideSpeed: 100,

            // is inline mode?
            inline: false,

            // a comma-separated list of keywords that the control should accept (e.g. inherit, transparent, initial).
            keywords: "transparent",

            // uppercase or lowercase
            letterCase: "lowercase",

            // enables opacity slider
            opacity: false,

            // custom position
            position: "bottom left",

            // additional theme class
            theme: "default",

            // an array of colors that will show up under the main color <a href="https://www.jqueryscript.net/tags.php?/grid/">grid</a>
            swatches: [],
        });
    };
   
    initPlugin();
    $.page_loading(false);
    $(document).ajaxSuccess(function (event, request, settings, res) {
        if (res.hasOwnProperty("message")) {
            if (res.message) {
                toastr.success(res.message);
            }
        }
        initPlugin();
        initGalleryVideo();
    });
    // //////////////////////////////////
    $(document).ajaxError((e, x, settings, exception) => {
        if (x.responseJSON) {
            if (x.responseJSON.hasOwnProperty("message")) {
                return toastr.error(x.responseJSON.message, "Ajax Error", {
                    timeOut: 10000,
                });
            }
        }
        let message;
        let statusErrorMap = {
            400: "Server understood the request, but request content was invalid.",
            401: "Unauthorized access.",
            403: "Forbidden resource can't be accessed.",
            500: "Internal server error.",
            503: "Service unavailable.",
        };

        if (x.status) {
            message = statusErrorMap[x.status];
            if (!message) {
                message = "Unknown Error \n.";
            }
        } else if (exception == "parsererror") {
            message = "Error.\nParsing JSON Request failed.";
        } else if (exception == "timeout") {
            message = "Request Time out.";
        } else if (exception == "abort") {
            message = "Request was aborted by the server";
        } else {
            message = "Unknown Error \n.";
        }
        toastr.error(message, "Ajax Error", { timeOut: 10000 });
    });
    // //////////////////////////////////////////////////////////////////
    $(".date-picker").datetimepicker({
        minDate: true,
        timepicker: false,
        datepicker: true,
        format: "Y-m-d H:i:s",
        formatTime: "H:i:s",
        formatDate: "Y-m-d",
        defaultTime: "00:00:00",
    });
    $(document).on("change", ".date-picker", function () {
        if (!$(this).is("input")) {
            const value = $(this).attr("value");
            const target = $(this).attr("data-target");
            if (value && target) {
                $(target).attr("value", value);
            }
        }
    });

    function initPlugin() {
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-role="tagsinput"]').tagsinput("items");
        $.initSwiper();
        $.initMultipleSwiper();
        $.initColorPicker();
    }
    function initGalleryVideo() {
        let galleryVideo = $("div[id^='module-gallery-video-']");
        $.each(galleryVideo, function (indexInArray, gllVideo) {
            let id = $(gllVideo).attr("id");
            lightGallery(document.getElementById(id), {
                plugins: [lgVideo],
            });
        });
    }
    $("li.module a").attr("target", "_blank");
    $("#toggle__sidebar").click(function (e) {
        e.preventDefault();
        $("#sidebar").toggleClass("hide-sidebar");
        $("#content").toggleClass("full-content");
    });
    $(document).on("click", ".delete-route", function () {
        const route = $(this).attr("data-href");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                return (window.location.href = route);
            }
        });
    });
    // PRICE
    $(document).on("keyup", "#ins_price", function () {
        $.format_price($(this).val());
    });
    $(document).on("keyup", "#prd_price", function () {
        $.format_price($(this).val());
    });
    //
    $(document).on("change", ".dav-input-file", function () {
        console.log("ok");
        $.preview_img($(this));
    });
    $(document).on("click", ".clear-images", function () {
        const id = $(this).attr("data-id");
        const dataClear = $(this).attr("data-clear");
        $("#" + id).val("");
        $("#for" + id).text("Đang trống");
        $("." + dataClear).remove();
        $(this).remove();
    });

    // END PRICE
    // *lfm upload
    $(document).on("change", "#type_config_info", function () {
        var val = $(this).val();
        if (val != "") {
            if (val == "html") {
                $(".html").removeClass("d-none");
                $(".img").addClass("d-none");
                $(".not-html").addClass("d-none");
            } else if (val == "img") {
                $(".img").removeClass("d-none");
                $(".not-html").addClass("d-none");
                $(".html").addClass("d-none");
            } else {
                $(".not-html").removeClass("d-none");
                $(".img").addClass("d-none");
                $(".html").addClass("d-none");
            }
        } else {
            $(".not-html").addClass("d-none");
            $(".html").addClass("d-none");
            $(".img").addClass("d-none");
        }
    });
    //
    $(document).on("click", ".open-dialog-file", function () {
        const target = $(this).attr("data-target");
        if (target) {
            $(target).click();
        }
    });
    $(document).on("click", ".a-ui-file-upload-add", function () {
        const block = $(this).attr("data-block") === "true";
        if (block) {
            return;
        }
        const target = $(this).attr("data-target");
        if (target) {
            $(target).click();
        }
    });
    $(document).on("click", ".a-ui-file-upload-clear", function () {
        const block = $(this).attr("data-block") === "true";
        if (block) {
            return;
        }
        const target = $(this).attr("data-target");
        const image = $("img[data-target='" + target + "']");
        image.attr("src", image.attr("original-image"));
        $(target).val("");
        $(this).addClass("d-none");
    });
    $(document).on("change", ".a-ui-file-upload-input", function () {
        const block = $(this).attr("data-block") === "true";
        if (block) {
            return;
        }
        const id = $(this).attr("id");
        const target = "#" + id;
        const image = $("img[data-target='" + target + "']");
        const buttonClear = $("#clear-" + id);
        const file = this.files[0];
        if (file) {
            image.attr("src", URL.createObjectURL(file));
            buttonClear.removeClass("d-none");
        }
    });
    //
    function collapseToggleIcon(act, id) {
        const button = $(`[aria-controls=${id}]`);
        const icon = button.find("i");
        console.log("🚀 ~ file: app.js:252 ~ collapseToggleIcon ~ icon:", icon);
        if (act === "hide") {
            icon.removeClass("fa-caret-up");
            icon.addClass("fa-caret-down");
        } else {
            icon.removeClass("fa-caret-down");
            icon.addClass("fa-caret-up");
        }
    }

    $(".va-card-collapse").on("hide.bs.collapse", function () {
        collapseToggleIcon("hide", $(this).attr("id"));
    });
    $(".va-card-collapse").on("show.bs.collapse", function () {
        collapseToggleIcon("show", $(this).attr("id"));
    });
    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
