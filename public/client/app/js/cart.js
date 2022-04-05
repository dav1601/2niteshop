$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var url_cart = route("add_cart");
    $(document).on("change", ".input-number", function () {
        var minValue = parseInt($(this).attr("min"));
        var maxValue = parseInt($(this).attr("max"));
        var valueCurrent = parseInt($(this).val());
        var input = $(this).attr("name");
        var rowId = $(this).attr("data-rowId");
        var op = parseInt($(this).attr("data-op"));
        var id = $(this).attr("data-id");
        var op_id = $(this).attr("data-opid");
        if (valueCurrent >= minValue) {
            $(
                ".btn-number[data-type='minus'][data-field='" + name + "']"
            ).removeAttr("disabled");
        } else {
            alert("Sorry, the minimum value was reached");
            $(this).val($(this).data("oldValue"));
        }
        if (valueCurrent <= maxValue) {
            $(
                ".btn-number[data-type='plus'][data-field='" + name + "']"
            ).removeAttr("disabled");
        } else {
            alert("Sorry, the maximum value was reached");
            $(this).val($(this).data("oldValue"));
        }
        $.ajax({
            type: "post",
            url: url_cart,
            data: {
                id: id,
                qty: valueCurrent,
                rowId: rowId,
                op: op,
                op_id: op_id,
                type: "update",
            },
            dataType: "json",
            beforeSend: function () {
                $.loading();
            },
            success: function (data) {
                if (data.items != 0) {
                    $(".cia-" + id + " strong").text(data.sub_total);
                    $("input[name='" + input + "']").attr(
                        "data-rowid",
                        data.new_rowId
                    );
                    console.log(data);
                } else {
                    $("#empty_output").html(data.cart);
                }
                $("#checkout_cart").html(data.cart);
                $(".bt-qty strong").text(data.count);
                $("#count_mobile").text(data.count);
                $(".bt-price strong").text(data.total_format);
                $("#ck_total").text(data.total_format);
                $("#cart__drop").html(data.sub_cart);
                $("#items").html(data.html_items);
                $(".cart__drop").html(data.sub_cart);
                $(".items").html(data.html_items);
                $.end_loading();
            },
        });
    });
    // end input number
    // end active insur
    // end cart
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
