$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var url = location.protocol + "//" + location.host + location.pathname;
    jQuery.get_checked = function get_checked(class_name) {
        var selected = [];
        $("." + class_name + ":checked").each(function () {
            selected.push($(this).val());
        });
        return selected;
    };
    jQuery.format_price = function format_price($price = "") {
        var url = route("price");
        $.ajax({
            type: "post",
            url: url,
            data: { price: $price },
            dataType: "json",
            success: function (data) {
                if (data.ok == 1) {
                    $(".output_price").text(data.price);
                } else {
                    alert("Bạn nhập không phải là SỐ");
                }
            },
        });
    };
    jQuery.vaSwal = function vaSwal(title = "", text = "", icon = "") {
        return Swal.fire({
            title: title,
            text: text,
            icon: icon,
            showCancelButton: true,
        });
    };
    const urlParams = new URLSearchParams(window.location.search);
    jQuery.addParamsUrl = function addParamsUrl(key, val) {
        return urlParams.set(key, val);
    };
    jQuery.delParamsUrl = function delParamsUrl(key) {
        return urlParams.delete(key);
    };
    jQuery.getParamsUrl = function getParamsUrl(key) {
        return urlParams.getAll(key).toString();
    };
    jQuery.hasParamsUrl = function hasParamsUrl(key) {
        return urlParams.has(key) ? true : false;
    };
    jQuery.replaceNewUrl = function replaceNewUrl() {
        window.history.replaceState({}, "", url + "?" + urlParams.toString());
    };

    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
