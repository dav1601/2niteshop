$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    jQuery.get_checked = function get_checked(class_name) {
        var selected = [];
        $('.' + class_name + ':checked').each(function () {
            selected.push($(this).val());
        });
        return selected;
    }
    jQuery.format_price = function format_price($price = '') {
        var url = $("#url__ajax--price").val();
        $.ajax({
            type: "post",
            url: url,
            data: { price: $price },
            dataType: "json",
            success: function (data) {
                if (data.ok == 1) {
                    $('.output_price').text(data.price);
                } else {
                    alert("Bạn nhập không phải là SỐ");
                }
            }
        });
    }

    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
