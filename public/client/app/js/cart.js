$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var url_cart = route("add_cart");

    var url_address = route("change_address");
    $(document).on("change", "#prov", function () {
        var id = $(this).val();
        if (id != "") {
            $.ajax({
                type: "post",
                url: url_address,
                data: { id: id, type: 1 },
                dataType: "json",
                success: function (data) {
                 
                    if (data.type == 1) {
                        $("#dist").html(data.html);
                    } else {
                        $("#ward").html(data.html);
                    }
                },
            });
        } else {
            $("#dist").html('<option value="">Bạn chưa chọn Tỉnh</option>');
            $("#ward").html('<option value="">Bạn chưa chọn Quận</option>');
        }
    });
    $(document).on("change", "#dist", function () {
        var id = $(this).val();
        if (id != "") {
            $.ajax({
                type: "post",
                url: url_address,
                data: { id: id, type: 2 },
                dataType: "json",
                success: function (data) {
                    if (data.type == 1) {
                        $("#dist").html(data.html);
                    } else {
                        $("#ward").html(data.html);
                    }
                },
            });
        } else {
            $("#ward").html('<option value="">Bạn chưa chọn Quận</option>');
        }
    });

    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
