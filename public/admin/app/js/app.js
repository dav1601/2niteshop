$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $("li.module a").attr("target", "_blank");
    endLoading();
    function endLoading() {
        let el = $("#page__loading");
        el.addClass("d-none");
    }
    $('[data-toggle="tooltip"]').tooltip();
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

    // END PRICE

    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
