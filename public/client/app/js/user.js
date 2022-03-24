$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $(document).on("click", "#target__file", () => {
        $("#dvsAvatar").click();
        return false;
    });
    $(document).on("click", ".type__item", function () {
        $(".type__item").removeClass("type__item--active");
        $(this).addClass("type__item--active");
    });
    var avatar__user = $("#user__info--avatar").val();
    function checkAddAddress() {
        var name = $("#name").val();
        var phone = $("#phone").val();
        var prov = $("#prov").val();
        var prov_id = $("#prov :selected").attr("data-id");
        var dist = $("#dist").val();
        var dist_id = $("#dist :selected").attr("data-id");
        var ward = $("#ward").val();
        var ward_id = $("#ward :selected").attr("data-id");
        var detail = $("#detail").val();
        var type = $(".type__item--active").attr("data-type");
        var def = $("#set__def:checked").val();
        if (
            name == "" ||
            phone == "" ||
            prov == 0 ||
            dist == 0 ||
            ward == 0 ||
            detail == ""
        ) {
            $("#add__address").addClass("disabled");
            $("#add__address").prop("disabled", true);
            $("#add__address").css("cursor", "not-allowed");
            $("#update__address").addClass("disabled");
            $("#update__address").prop("disabled", true);
            $("#update__address").css("cursor", "not-allowed");
        } else {
            $("#add__address").removeClass("disabled");
            $("#add__address").prop("disabled", false);
            $("#add__address").css("cursor", "pointer");
            $("#update__address").removeClass("disabled");
            $("#update__address").prop("disabled", false);
            $("#update__address").css("cursor", "pointer");
        }
    }
    function renderAlert($icon = "success", $title = "Tiêu Đề") {
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
        });

        Toast.fire({
            icon: $icon,
            title: $title,
        });
    }

    $(document).on("click", "#add__address", function () {
        var name = $("#name").val();
        var phone = $("#phone").val();
        var prov = $("#prov").val();
        var prov_id = $("#prov :selected").attr("data-id");
        var dist = $("#dist").val();
        var dist_id = $("#dist :selected").attr("data-id");
        var ward = $("#ward").val();
        var ward_id = $("#ward :selected").attr("data-id");
        var detail = $("#detail").val();
        var type = $(".type__item--active").attr("data-type");
        var def = $("#set__def:checked").val();
        var act = "add";
        $.ajax({
            type: "post",
            url: route("ajax__address"),
            data: {
                name: name,
                phone: phone,
                prov: prov,
                prov_id: prov_id,
                dist: dist,
                dist_id: dist_id,
                ward: ward,
                ward_id: ward_id,
                detail: detail,
                type: type,
                def: def,
                act: act,
            },
            dataType: "json",
            beforeSend: function () {
                $.loading();
            },
            success: function (data) {
                $("#rc__address").html(data.html);
                $.end_loading();
                if (data.ok == 1) {
                    renderAlert("success", "Thêm địa chỉ Thành công");
                    $("#outputAddress").html(data.rs_form);
                } else {
                    renderAlert("error", "Thêm địa chỉ thất bại");
                }
                $("#addAddress").modal("hide");
            },
        });
    });
    //    ////////////////////////////////////////
    $(document).on("click", "#update__address", function () {
        var name = $("#name").val();
        var phone = $("#phone").val();
        var prov = $("#prov").val();
        var prov_id = $("#prov :selected").attr("data-id");
        var dist = $("#dist").val();
        var dist_id = $("#dist :selected").attr("data-id");
        var ward = $("#ward").val();
        var ward_id = $("#ward :selected").attr("data-id");
        var detail = $("#detail").val();
        var type = $(".type__item--active").attr("data-type");
        var def = $("#set__def:checked").val();
        var act = "update";
        var id = $(this).attr("data-id");
        $.ajax({
            type: "post",
            url: route("ajax__address"),
            data: {
                name: name,
                phone: phone,
                prov: prov,
                prov_id: prov_id,
                dist: dist,
                dist_id: dist_id,
                ward: ward,
                ward_id: ward_id,
                detail: detail,
                type: type,
                def: def,
                act: act,
                id: id,
            },
            dataType: "json",
            beforeSend: function () {
                $.loading();
            },
            success: function (data) {
                $("#rc__address").html(data.html);
                $.end_loading();
                if (data.ok == 1) {
                    renderAlert("success", "Cập Nhật địa chỉ Thành công");
                } else {
                    renderAlert("error", "Cập Nhật địa chỉ thất bại");
                }
            },
        });
    });

    // ////////////////////////////////////////////
    $(document).on("click", ".aa__del", function () {
        var id = $(this).attr("data-id");
        var act = "delete";
        $.ajax({
            type: "post",
            url: route("ajax__address"),
            data: { id: id, act: act },
            dataType: "json",
            beforeSend: function () {
                $.loading();
            },
            success: function (data) {
                $("#rc__address").html(data.html);
                $.end_loading();
                if (data.ok == 1) {
                    renderAlert("success", "Xoá địa chỉ Thành công");
                } else {
                    renderAlert("Xoá", "Xoá địa chỉ thất bại");
                }
            },
        });
    });
    $(document).on("click", ".aa__edit", function () {
        var id = $(this).attr("data-id");
        var act = "data";
        $.ajax({
            type: "post",
            url: route("ajax__address"),
            data: { id: id, act: act },
            dataType: "json",
            beforeSend: function () {
                $.loading();
            },
            success: function (data) {
                $("#outputEditAddress").html(data.html_2);
                $("#editAddress").modal("show");
                $.end_loading();
            },
        });
    });
    $(document).on("click", ".aa__btn", function () {
        var id = $(this).attr("data-id");
        var act = "setDef";
        $.ajax({
            type: "post",
            url: route("ajax__address"),
            data: { id: id, act: act },
            dataType: "json",
            beforeSend: function () {
                $.loading();
            },
            success: function (data) {
                $("#rc__address").html(data.html);
                $.end_loading();
                if (data.ok == 1) {
                    renderAlert(
                        "success",
                        "Cập nhật địa chỉ mặc định Thành công"
                    );
                } else {
                    renderAlert("Xoá", "Cập nhật địa chỉ mặc định Thất Bại");
                }
            },
        });
    });
    // //////////////////// end delete address
    $(document).on("keyup", "#name", function () {
        checkAddAddress();
    });
    $(document).on("keyup", "#phone", function () {
        checkAddAddress();
    });
    $(document).on("change", "#prov", function () {
        var url = route("change_address_2");
        var id = $("#prov :selected").attr("data-id");
        if ($(this).val() == 0) {
            $("#dist").html('<option value="0">Bạn Chưa Chọn Tỉnh</option>');
            $("#ward").html(
                '<option value="0">Bạn Chưa Chọn Quận/Huyện</option>'
            );
        } else {
            $.ajax({
                type: "post",
                url: url,
                data: { type: 1, id: id },
                dataType: "json",
                success: function (data) {
                    if (data.type == 1) {
                        $("#dist").html(data.html);
                    } else {
                        $("#ward").html(data.html);
                    }
                },
            });
        }
        checkAddAddress();
    });
    $(document).on("change", "#dist", function () {
        var url = route("change_address_2");
        var id = $("#prov :selected").attr("data-id");
        if ($(this).val() == 0) {
            $("#ward").html(
                '<option value="0">Bạn Chưa Chọn Quận/Huyện</option>'
            );
        } else {
            $.ajax({
                type: "post",
                url: url,
                data: { type: 2, id: id },
                dataType: "json",
                success: function (data) {
                    if (data.type == 1) {
                        $("#dist").html(data.html);
                    } else {
                        $("#ward").html(data.html);
                    }
                },
            });
        }
        checkAddAddress();
    });
    $(document).on("change", "#ward", function () {
        checkAddAddress();
    });
    $(document).on("keyup", "#detail", function () {
        checkAddAddress();
    });

    $(document).on("change", "#dvsAvatar", function () {
        var formData = new FormData();
        var url = route("ajax__avatar");
        formData.append("avatar", $(this)[0].files[0]);
        $.ajax({
            type: "post",
            url: url,
            data: formData,
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend: function () {
                var loading = $("#ajax__avatar--loading").val();
                $("#davishop__avatar--edit").attr("src", loading);
            },
            success: function (data) {
                if (data.ok == 0) {
                    $.each(data.errors.avatar, function (key, val) {
                        alert(val);
                    });
                    $("#davishop__avatar--edit").attr("src", avatar__user);
                    $(".davishop__avatar img").attr("src", avatar__user);
                } else {
                    $("#davishop__avatar--edit").attr("src", data.img);
                    $(".davishop__avatar img").attr("src", data.img);
                    deleteAjaxImage(data.unlink);
                    $("#target__file").text("Huỷ Bỏ");
                    $("#target__file").attr("id", "cancel__target");
                }
            },
        });
    });
    $(document).on("click", "#cancel__target", function () {
        $("#davishop__avatar--edit").attr("src", avatar__user);
        $(".davishop__avatar img").attr("src", avatar__user);
        $("#dvsAvatar").val("");
        $(this).text("Thay Ảnh");
        $(this).attr("id", "target__file");
        return false;
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
    // AREA PURCHASE
    $(document).on("click", ".stt__item", function () {
        $(".stt__item").removeClass("active");
        $(this).addClass("active");
        var url = new URL($("#url__origin--purchase").val());
        var sps = url.searchParams;
        var type = $(this).attr("data-type");
        sps.append("type", type);
        var new_url = url.toString();
        history.replaceState("", "", new_url);
    });

    $(document).on("click", ".update__cancel", function () {
        var type = $(this).attr("data-type");
        var id = $(this).attr("data-id");
        var url = route("ajax__order");
        $.ajax({
            type: "post",
            url: url,
            data: { act: "cancel", id: id, type: type },
            dataType: "json",
            success: function (data) {
                $("#purchase__layout").html(data.html);
                renderAlert("success", `Cập nhật đơn hàng số ${id} thành công`);
            },
        });
    });
    $(document).on("click", ".update__orders", function () {
        var type = $(this).attr("data-type");
        var url = route("ajax__order");
        $.ajax({
            type: "post",
            url: url,
            data: { act: "load", type: type },
            dataType: "json",
            success: function (data) {
                $("#purchase__layout").html(data.html);
                renderAlert("success", `Cập nhật toàn bộ đơn hàng thành công`);
            },
        });
    });
    $(document).on("keyup", "#searchBill", function () {
        var kw = $(this).val();
        $.ajax({
            type: "post",
            url: route("ajax__order_search"),
            data: { kw: kw },
            dataType: "json",
            beforeSend: function () {
                $.loading();
            },
            success: function (data) {
                $(".wp__all").html(data.html);
                $.end_loading();
            },
        });
    });

    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
