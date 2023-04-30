$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
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
    $(document).ajaxSuccess(function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-role="tagsinput"]').tagsinput("items");
        initPlugin();
    });
    function initPlugin() {
        $.initSwiper();
        $.initMultipleSwiper();
        $.initColorPicker();
        endLoading();
    }
    $("li.module a").attr("target", "_blank");
    function endLoading() {
        let el = $("#page__loading");
        el.addClass("d-none");
    }
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-role="tagsinput"]').tagsinput("items");
    $("#toggle__sidebar").click(function (e) {
        e.preventDefault();
        $("#sidebar").toggleClass("hide-sidebar");
        $("#content").toggleClass("full-content");
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
        $.preview_img($(this));
    });
    $(document).on("click", ".clear-images", function () {
        const id = $(this).attr("data-id");
        $("#" + id).val("");
        $("#for" + id).text("Đang trống");
        $(".preview-" + id).remove();
        $(this).remove();
    });

    // END PRICE
    // *lfm upload

    //

    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
