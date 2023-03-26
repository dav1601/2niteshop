$(function () {
  

    $(document).on("change", "#img", function () {
        var file = $(this)[0].files;
        $("#forImg").html(file[0].name);
    });
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
    var prefix = "#blog__filter--";
    var url = route("handle_ajax_blogs");
    function load_data(
        $act = "load",
        $sort = $(prefix + "sort").val(),
        $active = $(prefix + "active").val(),
        $titleOrId = $(prefix + "name").val(),
        $cat = $(prefix + "cat").val(),
        $cat_2 = $(prefix + "cat_s1").val(),
        $auth = $(prefix + "author").val(),
        $dateP = $("#dateprev input").val(),
        $dateN = $("#datenext input").val(),
        $id = 0,
        $page = 1,
        $val = 0
    ) {
        $.ajax({
            type: "post",
            url: url,
            data: {
                act: $act,
                sort: $sort,
                active: $active,
                titleOrId: $titleOrId,
                cat: $cat,
                cat_2: $cat_2,
                auth: $auth,
                dP: $dateP,
                dN: $dateN,
                id: $id,
                val: $val,
                page: $page,
            },
            dataType: "json",
            beforeSend: function () {
                $("#outputTableBlog").html(
                    "<h1>Đang Lọc Dữ Liệu...............</h1>"
                );
            },
            success: function (data) {
                console.log(data);
                $("#outputTableBlog").html(data.html);
            },
        });
    }
    $(document).on("change", prefix + "sort", function () {
        load_data();
    });
    $(document).on("change", prefix + "active", function () {
        load_data();
    });
    $(document).on("change", prefix + "cat", function () {
        load_data();
    });
    $(document).on("change", prefix + "cat_s1", function () {
        load_data();
    });
    $(document).on("keyup", prefix + "name", function () {
        load_data();
    });
    $(document).on("keyup", prefix + "author", function () {
        load_data();
    });
    $(document).on("click", ".page-link", function () {
        load_data(
            ($act = "load"),
            ($sort = $(prefix + "sort").val()),
            ($active = $(prefix + "active").val()),
            ($titleOrId = $(prefix + "name").val()),
            ($cat = $(prefix + "cat").val()),
            ($cat_2 = $(prefix + "cat_s1").val()),
            ($auth = $(prefix + "author").val()),
            ($dateP = $("#dateprev input").val()),
            ($dateN = $("#datenext input").val()),
            ($id = 0),
            ($page = $(this).attr("data-page")),
            ($val = 0)
        );
        $(document).scrollTop(0);
    });
    $(document).on("change", ".update__active", function () {
        load_data(
            ($act = "update"),
            ($sort = $(prefix + "sort").val()),
            ($active = $(prefix + "active").val()),
            ($titleOrId = $(prefix + "name").val()),
            ($cat = $(prefix + "cat").val()),
            ($cat_2 = $(prefix + "cat_s1").val()),
            ($auth = $(prefix + "author").val()),
            ($dateP = $("#dateprev input").val()),
            ($dateN = $("#datenext input").val()),
            ($id = $(this).attr("data-id")),
            ($page = $(".page-item.active page-link").attr("data-page")),
            ($val = $(this).val())
        );
        var mess =
            "Cập nhật Trạng Thái bài viết số  " +
            $(this).attr("data-id") +
            " thành công";
        toastr.success(mess, "Cập nhật trạng thái bài viết");
    });
    load_data();
    //   /////////////////////////////////////////////////

    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
