$(function () {
    var modalAddress = $("#modal-address");
    var btnSaveAddress = $("#save__address");
    var modalAddressContent = $("#modal-address-content");
    var blobAvatar = "";
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
        var dist = $("#dist").val();
        var ward = $("#ward").val();
        var detail = $("#detail").val();
        if (
            name == "" ||
            phone == "" ||
            prov == 0 ||
            dist == 0 ||
            ward == 0 ||
            detail == ""
        ) {
            $("#save__address").addClass("disabled");
            $("#save__address").prop("disabled", true);
            $("#save__address").css("cursor", "not-allowed");
            // $("#update__address").addClass("disabled");
            // $("#update__address").prop("disabled", true);
            // $("#update__address").css("cursor", "not-allowed");
        } else {
            $("#save__address").removeClass("disabled");
            $("#save__address").prop("disabled", false);
            $("#save__address").css("cursor", "pointer");
            // $("#update__address").removeClass("disabled");
            // $("#update__address").prop("disabled", false);
            // $("#update__address").css("cursor", "pointer");
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
    // ANCHOR ajax update profile //////////////////////////////////////////////////////

    // ANCHOR ajax address //////////////////////////////////////////////////////
    function ajaxAddress(act = "add", params = {}, callBtnLoading = true) {
        params["act"] = act;
        params["route"] = route().current();
        return $.ajax({
            type: "post",
            url: route("ajax__address"),
            data: params,
            dataType: "json",
            beforeSend: function () {
                if (act === "add" || act === "update") {
                    $.btn_loading_v2(btnSaveAddress, true);
                }
            },
            success: function (res) {
                const data = res.data;
                console.log(data);
                if (params["route"] !== "checkout" && act !== "data-address") {
                    $("#rc__address").html(data.list_item_address);
                } else {
                    $(".section-select-address-list").html(
                        data.list_item_address
                    );
                }
                switch (act) {
                    case "add":
                        modalAddressContent.html(data.form_clear);

                        renderAlert("success", "Thêm địa chỉ Thành công");
                        $.btn_loading_v2(btnSaveAddress, false);

                        modalAddress.modal("hide");
                        break;
                    case "update":
                        renderAlert("success", "Cập nhật địa chỉ Thành công");
                        $.btn_loading_v2(btnSaveAddress, false);

                        break;
                    case "data-address":
                        modalAddressContent.html(data.html_content_address);
                        modalAddress.modal("show");
                        break;
                    case "set-def-address":
                        renderAlert(
                            "success",
                            "Cập nhật địa chỉ mặc đỊnh thành công"
                        );
                        break;
                    default:
                        break;
                }
            },
            error: function (err) {
                console.log(err);
                const data = err.responseJSON.data;
                if (err.status === 403) {
                    $.validationFail(data);
                    $.btn_loading_v2(btnSaveAddress, false);
                    return;
                }
                switch (act) {
                    case "add":
                        renderAlert("error", "Thêm địa chỉ thất bại");
                        $.btn_loading_v2(btnSaveAddress, false);
                        break;
                    case "update":
                        renderAlert("error", "Cập nhật địa chỉ thất bại");
                        $.btn_loading_v2(btnSaveAddress, false);
                        break;
                    case "data-address":
                        renderAlert("error", "tải dữ liệu địa chỉ thất bại");
                        break;
                    case "set-def-address":
                        renderAlert(
                            "error",
                            "Cập nhật địa chỉ mặc đỊnh thất bại"
                        );
                        break;
                    default:
                        break;
                }
            },
        });
    }
    // $(document).on("click", "#add__address", function () {
    //     var name = $("#name").val();
    //     var phone = $("#phone").val();
    //     var prov = $("#prov").val();
    //     var prov_id = $("#prov :selected").attr("data-id");
    //     var dist = $("#dist").val();
    //     var dist_id = $("#dist :selected").attr("data-id");
    //     var ward = $("#ward").val();
    //     var ward_id = $("#ward :selected").attr("data-id");
    //     var detail = $("#detail").val();
    //     var type = $(".type__item--active").attr("data-type");
    //     var def = $("#set__def:checked").val();
    //     var act = "add";
    //     var data = {
    //         name: name,
    //         phone: phone,
    //         prov: prov,
    //         prov_id: prov_id,
    //         dist: dist,
    //         dist_id: dist_id,
    //         ward: ward,
    //         ward_id: ward_id,
    //         detail: detail,
    //         type: type,
    //         def: def,
    //         act: act,
    //     };
    // });
    $(document).on("click", "#save__address", function () {
        let params = {
            name: $("#name").val(),
            phone: $("#phone").val(),
            prov: $("#prov").val(),
            prov_id: $("#prov :selected").attr("data-id"),
            dist: $("#dist").val(),
            dist_id: $("#dist :selected").attr("data-id"),
            ward: $("#ward").val(),
            ward_id: $("#ward :selected").attr("data-id"),
            detail: $("#detail").val(),
            type: $(".type__item--active").attr("data-type"),
            def: $("#set__def:checked").val(),
            id: $(this).attr("address-id"),
        };
        $.btn_loading_v2($(this), true);
        ajaxAddress($(this).attr("data-type"), params)
            .then(() => {
                $.btn_loading_v2($(this), false);
            })
            .catch(() => {
                $.btn_loading_v2($(this), false);
            });
    });
    //    ////////////////////////////////////////
    // $(document).on("click", "#update__address", function () {
    //     var name = $("#name").val();
    //     var phone = $("#phone").val();
    //     var prov = $("#prov").val();
    //     var prov_id = $("#prov :selected").attr("data-id");
    //     var dist = $("#dist").val();
    //     var dist_id = $("#dist :selected").attr("data-id");
    //     var ward = $("#ward").val();
    //     var ward_id = $("#ward :selected").attr("data-id");
    //     var detail = $("#detail").val();
    //     var type = $(".type__item--active").attr("data-type");
    //     var def = $("#set__def:checked").val();
    //     var act = "update";
    //     var id = $(this).attr("data-id");
    //     $.ajax({
    //         type: "post",
    //         url: route("ajax__address"),
    //         data: {
    //             name: name,
    //             phone: phone,
    //             prov: prov,
    //             prov_id: prov_id,
    //             dist: dist,
    //             dist_id: dist_id,
    //             ward: ward,
    //             ward_id: ward_id,
    //             detail: detail,
    //             type: type,
    //             def: def,
    //             act: act,
    //             id: id,
    //         },
    //         dataType: "json",
    //         beforeSend: function () {
    //             $.loading();
    //         },
    //         success: function (data) {
    //             $("#rc__address").html(data.html);
    //             $.end_loading();
    //             if (data.ok == 1) {
    //                 renderAlert("success", "Cập Nhật địa chỉ Thành công");
    //             } else {
    //                 renderAlert("error", "Cập Nhật địa chỉ thất bại");
    //             }
    //         },
    //     });
    // });

    // ////////////////////////////////////////////
    $(document).on("click", ".aa__del", function () {
        $.btn_loading_v2($(this), true);
        ajaxAddress("delete", { id: $(this).attr("data-id") }).catch(() => {
            $.btn_loading_v2($(this), false);
        });
    });
    $(document).on("click", ".aa__edit", function () {
        const id = $(this).attr("data-id");
        $.btn_loading_v2($(this), true);
        ajaxAddress("data-address", { id: id })
            .then((res) => {
                $.btn_loading_v2($(this), false);
            })
            .catch((err) => {
                $.btn_loading_v2($(this), false);
            });
    });
    $(document).on("click", ".aa__btn", function () {
        const id = $(this).attr("data-id");
        $.btn_loading_v2($(this), true);
        ajaxAddress("set-def-address", { id: id })
            .then(() => {
                $.btn_loading_v2($(this), false);
            })
            .catch(() => {
                $.btn_loading_v2($(this), false);
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
        const id = $("#prov :selected").attr("data-id");
        if ($(this).val() == 0) {
            $("#dist").html('<option value="0">Bạn Chưa Chọn Tỉnh</option>');
            $("#ward").html(
                '<option value="0">Bạn Chưa Chọn Quận/Huyện</option>'
            );
        } else {
            $.renderOptionAddress(id, "dist");
        }
        checkAddAddress();
    });
    $(document).on("change", "#dist", function () {
        const id = $("#prov :selected").attr("data-id");
        if ($(this).val() == 0) {
            $("#ward").html(
                '<option value="0">Bạn Chưa Chọn Quận/Huyện</option>'
            );
        } else {
            $.renderOptionAddress(id, "ward");
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
        const file = $(this)[0].files[0];
        if (file) {
            $("#davishop__avatar--edit").attr("src", URL.createObjectURL(file));
            $("#target__file").text("Huỷ Bỏ");
            $("#target__file").attr("id", "cancel__target");
        }
        // var formData = new FormData();
        // var url = route("ajax__avatar");
        // formData.append("avatar", $(this)[0].files[0]);
        // $.ajax({
        //     type: "post",
        //     url: url,
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
        //             $.each(data.errors.avatar, function (key, val) {
        //                 alert(val);
        //             });
        //             $("#davishop__avatar--edit").attr("src", avatar__user);
        //             $(".davishop__avatar img").attr("src", avatar__user);
        //         } else {
        //             $("#davishop__avatar--edit").attr("src", data.img);
        //             $(".davishop__avatar img").attr("src", data.img);
        //             deleteAjaxImage(data.unlink);
        //             $("#target__file").text("Huỷ Bỏ");
        //             $("#target__file").attr("id", "cancel__target");
        //         }
        //     },
        // });
    });

    $(document).on("click", "#cancel__target", function () {
        $("#davishop__avatar--edit").attr("src", currentAvatar);
        $("#dvsAvatar").val("");
        $(this).text("Thay Ảnh");
        $(this).attr("id", "target__file");
        return false;
    });
    // function deleteAjaxImage($path = "") {
    //     var url = route("ajax__avatar__delete");
    //     $.ajax({
    //         type: "post",
    //         url: url,
    //         data: { path: $path },
    //         dataType: "json",
    //     });
    // }
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

    jQuery.loadOrder = function loadOrder(
        realTime = false,
        act = "load",
        idAct = 0
    ) {
        let idOrd = $("#searchBill").val();
        const params = new Proxy(new URLSearchParams(window.location.search), {
            get: (searchParams, prop) => searchParams.get(prop),
        });
        let type = params.type;
        $.ajax({
            type: "post",
            url: route("ajax__order_search"),
            data: { id: idOrd, type: type, act: act, ida: idAct },
            dataType: "json",
            beforeSend: function () {
                $.loading();
            },
            success: function (data) {
                if (realTime) {
                    $.vaSwal("Thông báo", "Đơn hàng của bạn vừa được cập nhật");
                }
                $("#myTabContentPurchase").html(data.html);
                $.end_loading();
            },
        });
    };
    $(document).on("keyup", "#searchBill", function () {
        $.loadOrder();
    });
    $(document).on("click", ".update__cancel", function () {
        let id = $(this).attr("data-id");
        $.loadOrder(false, "cancel", id);
    });
    $("#formUpdateProfile").ajaxForm({
        success: function (res) {
            console.log(res);
        },
    });
    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
