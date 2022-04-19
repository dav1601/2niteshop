$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    jQuery.loading = function loading() {
        $("#bg-loading").css("display", "block");
        $("#loading").css("display", "flex");
    };
    jQuery.end_loading = function end_loading() {
        $("#bg-loading").css("display", "none");
        $("#loading").css("display", "none");
    };

    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
