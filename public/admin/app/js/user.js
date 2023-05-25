$(function () {
    var currentPage = $(".page-item.active .page-link").attr("data-page");
    var prefix = "#user_filter--";
    var url = route("show_user_ajax");
    function load_data(
        $sort = $(prefix + "sort").val(),
        $role = $(prefix + "role").val(),
        $nameId = $(prefix + "nameId").val(),
        $phone = $(prefix + "phone").val(),
        $prov = $(prefix + "provider").val(),
        $provId = $(prefix + "providerID").val(),
        $page = 1
    ) {
        $.ajax({
            type: "post",
            url: url,
            data: {
                sort: $sort,
                role: $role,
                nameId: $nameId,
                phone: $phone,
                prov: $prov,
                provId: $provId,
                page: $page,
            },
            dataType: "json",
            success: function (data) {
                $("#show__user").html(data.html);
                console.log(data);
            },
        });
    }
    $(document).on("change", prefix + "sort", function () {
        load_data();
    });
    $(document).on("change", prefix + "role", function () {
        load_data();
    });
    $(document).on(
        "keyup",
        prefix + "nameId",
        _.debounce(function () {
            load_data();
        }, 300)
    );
    $(document).on(
        "keyup",
        prefix + "phone",
        _.debounce(function () {
            load_data();
        }, 300)
    );
    $(document).on(
        "keyup",
        prefix + "provider",
        _.debounce(function () {
            load_data();
        }, 300)
    );
    $(document).on(
        "keyup",
        prefix + "providerID",
        _.debounce(function () {
            load_data();
        }, 300)
    );
    $(document).on("click", ".page-item .page-link", function () {
        load_data(
            ($sort = $(prefix + "sort").val()),
            ($role = $(prefix + "role").val()),
            ($nameId = $(prefix + "nameId").val()),
            ($phone = $(prefix + "phone").val()),
            ($prov = $(prefix + "provider").val()),
            ($provId = $(prefix + "providerID").val()),
            ($page = $(this).attr("data-page"))
        );
    });
    load_data();
    $(document).on("click", "#target__file", () => {
        $("#dvsAvatar").click();
        return false;
    });
    $(document).on("change", "#dvsAvatar", function () {
        const file = $(this)[0].files[0];
        $(".davishop__avatar img").attr("src", URL.createObjectURL(file));
        $("#davishop__avatar--edit").attr("src", URL.createObjectURL(file));
        console.log(URL.createObjectURL(file));
        // var formData = new FormData();
        // formData.append("avatar", $(this)[0].files[0]);
        // $.ajax({
        //     type: "post",
        //     url: route("ajax__avatar"),
        //     data: formData,
        //     dataType: "json",
        //     contentType: false,
        //     processData: false,
        //     beforeSend: function () {
        //         var loading = $("#ajax__avatar--loading").val();
        //         $("#davishop__avatar--edit").attr("src", loading);
        //     },
        //     success: function (data) {
        //         if (data.ok == 0) {
        //             Swal.fire({
        //                 icon: "error",
        //                 title: `${data.errors.avatar[0]}`,
        //             });
        //         } else {
        //             $("#davishop__avatar--edit").attr("src", data.img);
        //             $(".davishop__avatar img").attr("src", data.img);
        //             deleteAjaxImage(data.unlink);
        //         }
        //     },
        // });
    });
    function deleteAjaxImage($path = "") {
        var url = route("ajax__avatar__delete");
        $.ajax({
            type: "post",
            url: url,
            data: { path: $path },
            dataType: "json",
        });
    }
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
    var page = 1;
    $(document).on("click", "#load__more--activities", function () {
        page++;
        $.ajax({
            type: "get",
            url: route("admin_profile", user.id),
            data: { isAjax: true, page: page },
            dataType: "json",
            success: function (data) {
                if (data.html !== "") {
                    $("#activities").append(data.html);
                } else {
                    $("#button").addClass("d-none");
                }
            },
        });
    });
    //  get api + security code admin
    $(document).on("click", "#getSeCode", function () {
        var email = $("#emailSec").val();
        var password = $("#passSec").val();
        $.ajax({
            type: "post",
            url: route("get_security_code"),
            data: { email: email, password: password },
            dataType: "json",
            beforeSend: function () {
                $("#getSeCode").html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang xử lý....'
                );
                $("#getSeCode").prop("disabled", true);
            },
            success: function (data) {
                $("#getSeCode").html("Lấy Mã Bảo Vệ");
                $("#getSeCode").prop("disabled", false);
                if (data.ok == 0) {
                    $.each(data.errors, function (key, val) {
                        alert(val);
                    });
                } else {
                    $("#emailSec").val("");
                    $("#passSec").val("");
                    $("#getSecurityCode").modal("hide");
                    Swal.fire({
                        icon: "success",
                        title: "Đã gửi email vui lòng kiểm tra tin nhắn email để lấy MÃ BẢO VỆ",
                        showClass: {
                            popup: "animate__animated animate__fadeInUp",
                        },
                        hideClass: {
                            popup: "animate__animated animate__hinge",
                        },
                    });
                }
            },
        });
    });
    // get api token
    $(document).on("click", "#getApiTokenBtn", function () {
        var secode = $("#secode").val();
        $.ajax({
            type: "post",
            url: route("get_api_token"),
            data: { secode: secode },
            dataType: "json",
            beforeSend: function () {
                $("#getApiTokenBtn").html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang xử lý....'
                );
                $("#getApiTokenBtn").prop("disabled", true);
            },
            success: function (data) {
                $("#getApiTokenBtn").html("Lấy Api Token");
                $("#getApiTokenBtn").prop("disabled", false);
                if (data.ok == 0) {
                    $.each(data.errors, function (key, val) {
                        alert(val);
                    });
                } else {
                    $("#secode").val("");
                    $("#getApiToken").modal("hide");
                    Swal.fire({
                        icon: "success",
                        title: "Đã gửi email vui lòng kiểm tra tin nhắn email để lấy API TOKEN",
                        showClass: {
                            popup: "animate__animated animate__fadeInUp",
                        },
                        hideClass: {
                            popup: "animate__animated animate__hinge",
                        },
                    });
                }
            },
        });
    });
    // ////////////////////
    $(document).on("change", "#select-role", function () {
        let selected = $(this).val().split(",");
        $.ajax({
            type: "post",
            url: route("handle_roles", {
                type: "ajax-include-permissions",
            }),
            data: {
                selected: selected,
            },
            dataType: "json",
            success: function (data) {
                $("#list_permissions").html(data.data.rPerm);
            },
        });
    });

    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
