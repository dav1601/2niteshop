$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var currentPage = $(".page-item.active .page-link").attr("data-page");
    $("#dateprev input").datetimepicker({
        format: "YYYY-MM-DD HH:mm:ss",
    });
    $("#datenext input").datetimepicker({
        format: "YYYY-MM-DD HH:mm:ss",
    });
    $(document).on("click", "#show_date_1", function () {
        $("#dateprev input").datetimepicker("toggle");
        $("#datenext input").val("");
    });
    $(document).on("click", "#show_date_2", function () {
        $("#datenext input").datetimepicker("toggle");
        $("#dateprev input").val("");
    });
    $("#dateprev input")
        .datetimepicker()
        .on("dp.hide", function () {
            $("#datenext input").val("");
            load_data();
        })
        .on("dp.show", function () {
            $("#datenext input").val("");
            load_data();
        })
        .on("dp.change", function () {
            $("#datenext input").val("");
            load_data();
        })

        .on("dp.update", function () {
            $("#datenext input").val("");
            load_data();
        });
    $("#datenext input")
        .datetimepicker()
        .on("dp.hide", function () {
            $("#dateprev input").val("");
            load_data();
        })
        .on("dp.show", function () {
            $("#dateprev input").val("");
            load_data();
        })
        .on("dp.change", function () {
            $("#dateprev input").val("");
            load_data();
        })

        .on("dp.update", function () {
            $("#dateprev input").val("");
            load_data();
        });
    // /////////////////////////////////
    var prefix = "#ord__filter--";
    var prefix_2 = "#ord_cus--";
    var url_2 = $(prefix + "url2").val();
    var route = $("#route").val();
    var load_data = function load_data(
        $action = "load",
        $type = 1,
        $sort = $(prefix + "sort").val(),
        $stt = $(prefix + "stt").val(),
        $nameOrMail = $(prefix + "nameMail").val(),
        $phone = $(prefix + "phone").val(),
        $dateP = $("#dateprev input").val(),
        $dateN = $("#datenext input").val(),
        $p = $(prefix + "prov").val(),
        $d = $(prefix + "dist").val(),
        $w = $(prefix + "ward").val(),
        $id = 0,
        $page = 1,
        $val = 0
    ) {
        var url = $(prefix + "url").val();
        $.ajax({
            type: "post",
            url: url,
            data: {
                act: $action,
                type: $type,
                sort: $sort,
                stt: $stt,
                nameOrMail: $nameOrMail,
                phone: $phone,
                dateP: $dateP,
                dateN: $dateN,
                p: $p,
                d: $d,
                w: $w,
                id: $id,
                page: $page,
                val: $val,
            },
            dataType: "json",
            success: function (data) {
                $("#table__show--orders").html(data.html);
                if (data.type == 2) {
                    var mess = "Cập nhật TT đơn hàng số " + $id + " thành công";
                    toastr.success(mess, "Cập nhật trạng thái đơn hàng");
                }
                if (data.type == 3) {
                    var mess =
                        "Cập nhật TT thanh toán đơn hàng số " +
                        $id +
                        " thành công";
                    toastr.success(mess, "Cập nhật TT thanh toán đơn hàng");
                }
                console.log(data);
            },
        });
    };
    // /////////////

    // //////////////////////////
    if (route == "show_orders") {
        setInterval(load_data, 5000);
    }
    // /////////////
    // //////////////////////////////////
    $(document).on("change", prefix + "sort", function () {
        load_data();
    });
    $(document).on("change", prefix + "stt", function () {
        load_data();
    });
    $(document).on("keyup", prefix + "nameMail", function () {
        load_data();
    });
    $(document).on("keyup", prefix + "phone", function () {
        load_data();
    });
    $(document).on("change", prefix + "prov", function () {
        var id = $(prefix + "prov" + " option:selected").attr("data-id");
        var val = $(this).val();
        if (val != 0) {
            $.ajax({
                type: "post",
                url: url_2,
                data: { id: id, type: 1 },
                dataType: "json",
                success: function (data) {
                    if (data.type == 1) {
                        $(prefix + "dist").html(data.html);
                    } else {
                        $(prefix + "ward").html(data.html);
                    }
                },
            });
        } else {
            $(prefix + "dist").html('<option value="0">Tất Cả</option>');
            $(prefix + "ward").html('<option value="0">Tất Cả</option>');
        }
        load_data();
    });
    $(document).on("change", prefix + "dist", function () {
        var id = $(prefix + "dist" + " option:selected").attr("data-id");
        var val = $(this).val();
        if (val != 0) {
            $.ajax({
                type: "post",
                url: url_2,
                data: { id: id, type: 2 },
                dataType: "json",
                success: function (data) {
                    if (data.type == 1) {
                        $(prefix + "dist").html(data.html);
                    } else {
                        $(prefix + "ward").html(data.html);
                    }
                },
            });
        } else {
            $(prefix + "ward").html('<option value="0">Tất Cả</option>');
        }
        load_data();
    });
    $(document).on("change", prefix + "ward", function () {
        load_data();
    });
    $(document).on("change", ".update__status", function () {
        var id = $(this).attr("data-id");
        var val = $(this).val();
        if (val == 3) {
            $(".update__paid").val(2);
        } else {
            $(".update__paid").val(1);
        }
        load_data(
            ($action = "update_stt"),
            ($type = 2),
            ($sort = $(prefix + "sort").val()),
            ($stt = $(prefix + "stt").val()),
            ($nameOrMail = $(prefix + "nameMail").val()),
            ($phone = $(prefix + "phone").val()),
            ($dateP = $("#dateprev input").val()),
            ($dateN = $("#datenext input").val()),
            ($p = $(prefix + "prov").val()),
            ($d = $(prefix + "dist").val()),
            ($w = $(prefix + "ward").val()),
            ($id = id),
            ($page = currentPage),
            ($val = val)
        );
    });
    $(document).on("change", ".update__paid", function () {
        var id = $(this).attr("data-id");
        var val = $(this).val();
        load_data(
            ($action = "update_paid"),
            ($type = 3),
            ($sort = $(prefix + "sort").val()),
            ($stt = $(prefix + "stt").val()),
            ($nameOrMail = $(prefix + "nameMail").val()),
            ($phone = $(prefix + "phone").val()),
            ($dateP = $("#dateprev input").val()),
            ($dateN = $("#datenext input").val()),
            ($p = $(prefix + "prov").val()),
            ($d = $(prefix + "dist").val()),
            ($w = $(prefix + "ward").val()),
            ($id = id),
            ($page = currentPage),
            ($val = val)
        );
    });
    $(document).on("click", ".page-link", function () {
        load_data(
            ($action = "load"),
            ($type = 1),
            ($sort = $(prefix + "sort").val()),
            ($stt = $(prefix + "stt").val()),
            ($nameOrMail = $(prefix + "nameMail").val()),
            ($phone = $(prefix + "phone").val()),
            ($dateP = $("#dateprev input").val()),
            ($dateN = $("#datenext input").val()),
            ($p = $(prefix + "prov").val()),
            ($d = $(prefix + "dist").val()),
            ($w = $(prefix + "ward").val()),
            ($id = 0),
            ($page = $(this).attr("data-page")),
            ($val = 0)
        );
    });
    // end ordersssssssssssssssssssssssssssssss

    $(document).on("keyup", "#ord_cus--wT", function () {
        var price = $(this).val();
        var url = $("#url__ajax--price").val();
        $.ajax({
            type: "post",
            url: url,
            data: { price: price },
            dataType: "json",
            success: function (data) {
                $(".output_price_T").text(data.price);
            },
        });
        load_data_customers();
    });
    $(document).on("keyup", "#ord_cus--wF", function () {
        var price = $(this).val();
        var url = $("#url__ajax--price").val();
        $.ajax({
            type: "post",
            url: url,
            data: { price: price },
            dataType: "json",
            success: function (data) {
                $(".output_price").text(data.price);
            },
        });
        load_data_customers();
    });

    var intervalCustomers = function load_data_customers(
        $action = "load",
        $type = 1,
        $sort = $(prefix_2 + "sort").val(),
        $vip = $(prefix_2 + "vip").val(),
        $nameOrMail = $(prefix_2 + "nameMail").val(),
        $phone = $(prefix_2 + "phone").val(),
        $wF = $(prefix_2 + "wF").val(),
        $wT = $(prefix_2 + "wT").val(),
        $p = $(prefix_2 + "prov").val(),
        $d = $(prefix_2 + "dist").val(),
        $w = $(prefix_2 + "ward").val(),
        $page = 1
    ) {
        var url_customers = $(prefix_2 + "urlAjax").val();
        $.ajax({
            type: "post",
            url: url_customers,
            data: {
                act: $action,
                vip: $vip,
                type: $type,
                sort: $sort,
                nameOrMail: $nameOrMail,
                phone: $phone,
                wF: $wF,
                wT: $wT,
                p: $p,
                d: $d,
                w: $w,
                page: $page,
            },
            dataType: "json",
            success: function (data) {
                $("#table__show--customers").html(data.html);
                console.log(data);
            },
        });
    };

    if (route == "customers") {
        setInterval(intervalCustomers, 5000);
    }

    $(document).on("change", prefix_2 + "prov", function () {
        var id = $(prefix_2 + "prov" + " option:selected").attr("data-id");
        var val = $(this).val();
        if (val != 0) {
            $.ajax({
                type: "post",
                url: url_2,
                data: { id: id, type: 1 },
                dataType: "json",
                success: function (data) {
                    if (data.type == 1) {
                        $(prefix_2 + "dist").html(data.html);
                    } else {
                        $(prefix_2 + "ward").html(data.html);
                    }
                },
            });
        } else {
            $(prefix_2 + "dist").html('<option value="0">Tất Cả</option>');
            $(prefix_2 + "ward").html('<option value="0">Tất Cả</option>');
        }
        load_data_customers();
    });
    $(document).on("change", prefix_2 + "dist", function () {
        var id = $(prefix_2 + "dist" + " option:selected").attr("data-id");
        var val = $(this).val();
        if (val != 0) {
            $.ajax({
                type: "post",
                url: url_2,
                data: { id: id, type: 2 },
                dataType: "json",
                success: function (data) {
                    if (data.type == 1) {
                        $(prefix_2 + "dist").html(data.html);
                    } else {
                        $(prefix_2 + "ward").html(data.html);
                    }
                },
            });
        } else {
            $(prefix_2 + "ward").html('<option value="0">Tất Cả</option>');
        }
        load_data_customers();
    });
    $(document).on("change", prefix_2 + "sort", function () {
        load_data_customers();
    });
    $(document).on("change", prefix_2 + "vip", function () {
        load_data_customers();
    });
    $(document).on("keyup", prefix_2 + "nameMail", function () {
        load_data_customers();
    });
    $(document).on("keyup", prefix_2 + "phone", function () {
        load_data_customers();
    });
    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY

});
