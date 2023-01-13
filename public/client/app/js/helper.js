$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    jQuery.loading = function loading() {
        $("#page__loading").removeClass("d-none");
    };
    jQuery.end_loading = function end_loading() {
        $("#page__loading").addClass("d-none");
    };
    jQuery.crf = function crf(number = 0) {
        return new Intl.NumberFormat("en-US").format(number) + "đ";
    };
    jQuery.vaSwal = function vaSwal(title = "", text = "", icon = "") {
        return Swal.fire({
            title: title,
            text: text,
            icon: icon,
            showCancelButton: true,
        });
    };
    jQuery.vaToast = function vaToast(
        content = "",
        type = "s",
        timeout = 5000
    ) {
        switch (type) {
            case "s":
                return toastr.success(content, "", timeout);
            case "e":
                return toastr.error(content, "", timeout);
        }
        return;
    };
    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
