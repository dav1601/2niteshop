$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $(document).ajaxSuccess(function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-role="tagsinput"]').tagsinput("items");
    });
    $("li.module a").attr("target", "_blank");
    endLoading();
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

    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
