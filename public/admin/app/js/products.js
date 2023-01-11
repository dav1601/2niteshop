$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var prefix__filter = "#prd__filter--";
    var url_search = route("handle_search");
    var url_cat = route("handle_cat");
    var url_reload = route("handle_reload");
    var url_load = route("handle_load");
    var url = route("price");
    var url_delete_gll = route("handle_delete_gll");
    $(document).on("change", "#main_img", function () {
        var file = $(this)[0].files;
        $("#forMain").html(file[0].name);
    });
    $(document).on("change", "#sub_img", function () {
        var file = $(this)[0].files;
        $("#forSub").html(file[0].name);
    });
    $(document).on("change", "#gll700", function () {
        var files = $(this)[0].files;
        $("#for700").html(files.length + " Tệp");
    });
    $(document).on("change", "#gll80", function () {
        var files = $(this)[0].files;
        $("#for80").html(files.length + " Tệp");
    });
    $(document).on("change", "#banner_prd", function () {
        var file = $(this)[0].files;
        $("#forBannerPrd").html(file[0].name);
    });
    $(document).on("change", "#bg_product", function () {
        var file = $(this)[0].files;
        $("#forBg").html(file[0].name);
    });
    // //////////////////////

    // /////////////////////////////////////////

    // /////////////////////////////////////////

    // /////////////////////////////////////////////
    $(document).on(
        "keyup",
        "#search_pdc",
        _.debounce(function () {
            var kw = $(this).val();
            $.ajax({
                type: "post",
                url: url_search,
                data: { kw: kw },
                dataType: "json",
                success: function (data) {
                    $("#producer").html(data.html);
                },
            });
        }, 300)
    );

    // //////////////////////////////////
    $(document).on("click", "#reload__pdc", function () {
        var kw = $("#search_pdc").val();
        $.ajax({
            type: "post",
            url: url_reload,
            data: { type: 1, kw: kw },
            dataType: "json",
            beforeSend: function () {
                $("#reload__pdc").html(
                    '<span class="spinner-border spinner-border-sm pr-1" role="status" aria-hidden="true"></span> Loading...'
                );
            },
            success: function (data) {
                $("#producer").html(data.html);
                $("#reload__pdc").html(
                    '<i class="fas fa-sync-alt pr-2"></i> Làm Mới'
                );
                toastr.success("Làm mới nhà sản xuất thành công");
            },
        });
        return false;
    });
    // /////////////////////////////////
    $(document).on("click", "#reload__ins", function () {
        $.ajax({
            type: "post",
            url: url_reload,
            data: { type: 2 },
            dataType: "json",
            beforeSend: function () {
                $("#reload__ins").html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...'
                );
            },
            success: function (data) {
                $(".inner-cis").html(data.html);
                $("#reload__ins").html(
                    '<i class="fas fa-sync-alt pr-2"></i> Làm Mới'
                );
                toastr.success("Làm mới chính sách bảo hành thành công");
            },
        });
        return false;
    });
    ///////////////////////////////////////////////////////
    $(document).on("click", "#reload__plc", function () {
        $.ajax({
            type: "post",
            url: url_reload,
            data: { type: 3 },
            dataType: "json",
            beforeSend: function () {
                $("#reload__plc").html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...'
                );
            },
            success: function (data) {
                $(".inner-plc").html(data.html);
                $('[data-toggle="tooltip"]').tooltip();
                $("#reload__plc").html(
                    '<i class="fas fa-sync-alt pr-2"></i> Làm Mới'
                );
                toastr.success("Làm mới chính sách cửa hàng thành công");
            },
        });
        return false;
    });
    $(document).on("change", "#type", function () {
        var tp = $(this).val();
        if (tp != "") {
            $.ajax({
                type: "post",
                url: url_cat,
                data: { type: 4, tp: tp },
                dataType: "json",
                success: function (data) {
                    $("#sub_type").html(data.html);
                },
            });
        } else {
            $("#sub_type").html(
                '<option value="0">Bạn chưa chọn loại sản phẩm</option>'
            );
        }
    });

    // /////////////////////////////////////////
    function load_products(
        action = "load",
        type = 1,
        page = 1,
        id = 0,
        val = 0
    ) {
        let sort = $(prefix__filter + "sort").val();
        let nameOrId = $(prefix__filter + "name").val();
        let pF = $(prefix__filter + "priceF").val();
        let pT = $(prefix__filter + "priceT").val();
        let pdc = $(prefix__filter + "prdcer").val();
        let stock = $(prefix__filter + "stock").val();
        let author = $(prefix__filter + "author").val();
        let model = $(prefix__filter + "model").val();
        let val_sort = $(prefix__filter + "sort" + " option:selected").attr(
            "sort"
        );
        let searchId = [];
        let categories = $("#accordionCateogries input:checkbox:checked").map(
            function () {
                searchId.push($(this).val());
            }
        );
        categories = searchId;
        $.ajax({
            type: "post",
            url: url_load,
            data: {
                action: action,
                type: type,
                page: page,
                id: id,
                val: val,
                sort: sort,
                nameOrId: nameOrId,
                pF: pF,
                pT: pT,
                pdc: pdc,
                stock: stock,
                author: author,
                model: model,
                val_sort: val_sort,
                categories: categories,
            },
            dataType: "json",
            success: function (data) {
                $("#product__show--ajax").html(data.html);
                $("#product__show--page").html(data.page);
                if (data.type == 1) {
                    toastr.success("Load Dữ Liệu Thành Công");
                }
                if (data.type == 2) {
                    toastr.success(
                        "Cập Nhật trạng thái mới cho sản phẩm thành công"
                    );
                }
                if (data.type == 3) {
                    toastr.success(
                        "Cập Nhật tình trạng kho cho sản phẩm thành công"
                    );
                }
                if (data.type == 4) {
                    toastr.success(
                        "Cập Nhật hiển thị nổi bật cho sản phẩm thành công"
                    );
                }
            },
        });
    }
    // ////////////////////////////////////////

    // //////////////////////////////// end filter cat main

    // ///////////////////////////// end filter cat sub 1
    $(document).on("change", prefix__filter + "stock", function () {
        load_products();
    });
    $(document).on("change", prefix__filter + "sort", function () {
        load_products();
    });
    $(document).on("change", prefix__filter + "prdcer", function () {
        load_products();
    });
    $(document).on(
        "keyup",
        prefix__filter + "name",
        _.debounce(function () {
            load_products();
        }, 300)
    );
    $(document).on(
        "keyup",
        prefix__filter + "author",
        _.debounce(function () {
            load_products();
        }, 300)
    );
    $(document).on(
        "keyup",
        prefix__filter + "model",
        _.debounce(function () {
            load_products();
        }, 300)
    );
    var url_filter_price = route("price");
    $(document).on("click", ".check_ins", function () {
        load_products();
    });
    $(document).on(
        "keyup",
        "#prd__filter--priceT",
        _.debounce(function () {
            var price = $(this).val();
            $.ajax({
                type: "post",
                url: url,
                data: { price: price },
                dataType: "json",
                success: function (data) {
                    $(".output_price_T").text(data.price);
                },
            });
            load_products();
        }, 300)
    );
    $(document).on(
        "keyup",
        "#prd__filter--priceF",
        _.debounce(function () {
            var price = $(this).val();
            var url = route("price");
            $.ajax({
                type: "post",
                url: url,
                data: { price: price },
                dataType: "json",
                success: function (data) {
                    $(".output_price").text(data.price);
                },
            });
            load_products();
        }, 300)
    );
    // //////
    $(document).on("click", "#product__show--page .page-link", function () {
        var page = $(this).attr("data-page");
        load_products("load", 1, page);
        window.scrollTo({
            top: $("#pointScrollProduct").offset().top,
            behavior: "smooth",
        });
    });
    // /////////////

    $(document).on("change", "#product__show--stock", function () {
        var page = $("#product__show--page .page-item.active .page-link").attr(
            "data-page"
        );
        var id = $(this).attr("data-id");
        var val = $(this).val();
        load_products("update_stock", 3, page, id, val);
    });
    $(document).on("change", "#product__show--hl", function () {
        var page = $("#product__show--page .page-item.active .page-link").attr(
            "data-page"
        );
        var id = $(this).attr("data-id");
        var val = $(this).val();
        load_products("update_hl", 4, page, id, val);
    });
    // ////// start delete gll images in edit product
    $(document).on("click", ".delete_gll", function () {
        var id = $(this).attr("data-id");
        Swal.fire({
            title: "Bạn Chắc Chắn Xoá Chứ?",
            text: "Hình ảnh không thể khôi phục chỉ có thể thêm lại!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Vẫn Xoá",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: url_delete_gll,
                    data: { id: id },
                    dataType: "json",
                    success: function (data) {
                        $(".op_700").html(data.html1);
                        $(".op_80").html(data.html2);
                        if (data.error == 0) {
                            toastr.success("Xoá Hình Ảnh Thành Công");
                        }
                    },
                });
            } else {
                Swal.fire({
                    icon: "warning",
                    text: "Cẩn Thận Hơn Nhé!",
                });
            }
        });
    });

    // ////////////////// end
    $(document).on(
        "keyup",
        "#historical_cost",
        _.debounce(function () {
            var price = $(this).val();
            var url = route("price");
            $.ajax({
                type: "post",
                url: url,
                data: { price: price },
                dataType: "json",
                success: function (data) {
                    $(".output_price--cost").text(data.price);
                },
            });
        }, 300)
    );
    // //////////////////////////////////// remove product
    $(document).on("click", ".remove__product", function () {
        Swal.fire({
            title: "Bạn chắc chắn muốn xoá chứ?",
            text: "Bạn không thể khôi phục nếu lại khi đã xoá sản phẩm!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Vẫn Xoá!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = $(this).attr("data-url");
            }
        });
    });
    // ///////////////////////////
    $(document).on("click", ".prev__block", function () {
        var block_id = $(this).attr("block-id");
        $.ajax({
            type: "post",
            url: route("product_block_handle"),
            data: {
                block_id: block_id,
                type: "prev",
            },
            dataType: "json",
            success: function (data) {
                $("#block__prev--title").text(data.block.title);
                $("#block__prev--text").html(data.block.text);
                $("#modal__block--prev").modal("show");
            },
        });
    });
    $(document).on("click", ".block__product--delete", function (e) {
        e.preventDefault();
        const id = $(this).attr("data-id");
        Swal.fire({
            title: "Bạn chắc chắn muốn xoá chứ?",
            text: "Bạn không thể khôi phục nếu lại khi đã xoá!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Vẫn Xoá!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: route("product_block_handle"),
                    data: {
                        id: id,
                        type: "delete",
                        ajax: true,
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data.succes == 1) {
                            $("#block__product__table").html(data.html);
                            $.vaSwal("Xoá thành công", "", "success");
                        } else {
                            $.vaSwal("Xoá thất bại", "", "error");
                        }
                    },
                });
            }
        });
    });
    /////////////////////////////
    function converToNumber(array = []) {
        if (array.length > 0) {
            let newArr = [];
            for (let index = 0; index < array.length; index++) {
                newArr.push(Number(array[index]));
            }
            array = newArr;
            return array;
        }
        return [];
    }
    var prefix_id_select = "#modal__select--";
    var prefix_id_select_btn = "#modal__select--save-";
    var prefix_save = "#init__add--";
    var enabel_modal = $.getParamsUrl("enable_modal") ? 1 : 0;
    var relaId = $.getParamsUrl("relaId");
    var relaName = $.getParamsUrl("relaName")
        ? $.getParamsUrl("relaName")
        : "block";
    var model = $.getParamsUrl("model") ? $.getParamsUrl("model") : "prd";
    var page = $.getParamsUrl("s_page");
    var selected = $.getParamsUrl("selected")
        ? converToNumber($.getParamsUrl("selected").split(","))
        : [];
    var relaKey = $.getParamsUrl("relaKey");
    var relaModel = $.getParamsUrl("relaModel");
    var option = {};
    function resetParams() {
        selected = [];
        $.delParamsUrl("enable_modal");
        $.delParamsUrl("selected");
        $.delParamsUrl("model");
        $.delParamsUrl("relaId");
        $.delParamsUrl("relaName");
        $.delParamsUrl("s_page");
        $.delParamsUrl("relaModel");
        $.delParamsUrl("relaKey");
        return $.replaceNewUrl();
    }
    // function handle_select(id = null) {
    //     const index = selected.indexOf(Number(id));
    //     console.log(index);
    //     if (index !== -1) {
    //         selected.push(Number(id));
    //     } else {
    //         selected.splice(index, 1);
    //     }
    //     selected.length <= 0
    //         ? $.delParamsUrl("selected")
    //         : $.addParamsUrl("selected", selected.toString());
    //     return $.replaceNewUrl();
    // }
    function setModalParams(
        em = 1,
        _selected = null,
        _model = "prd",
        _relaId = null,
        _relaName = "block",
        _page = page,
        _relaModel = "",
        _relaKey = ""
    ) {
        $.addParamsUrl("enable_modal", em);
        $.addParamsUrl("selected", _selected.toString());
        $.addParamsUrl("model", _model);
        $.addParamsUrl("relaId", _relaId);
        $.addParamsUrl("relaName", _relaName);
        $.addParamsUrl("s_page", _page);
        $.addParamsUrl("relaModel", _relaModel);
        $.addParamsUrl("relaKey", _relaKey);
        return $.replaceNewUrl();
    }

    // function renderSelected(_m = "prd", _selected = selected) {
    //     $.ajax({
    //         type: "post",
    //         url: route("render_selected"),
    //         data: {
    //             model: _m,
    //             selected: _selected,
    //         },
    //         async: false,
    //         dataType: "json",
    //         success: function (data) {
    //             $("#modal__select--tags").html(data.html_tags);
    //         },
    //     });
    // }

    // /////////////////////
    function saveInitAdd() {
        let string = selected.toString();
        let inpSave = $("button[data-model='" + model + "']").prev();
        inpSave.val(string);
        updateCount();
        toastr.success("Lưu liên kết thành công");
    }
    function handle_select(id = null, remove = false) {
        if (!id) {
            return false;
        }
        let index = selected.indexOf(Number(id));

        if (index === -1) {
            selected.push(Number(id));
        } else {
            if (remove) {
                selected.splice(index, 1);
            }
        }
        $.addParamsUrl("selected", selected.toString());
        return $.replaceNewUrl();
    }
    function handle_model_rela(
        m = model,
        rM = relaModel,
        rK = relaKey,
        riD = relaId,
        rName = relaName,
        act = "load",
        _page = 1,
        _option = {},
        callback,
        _selected = selected
    ) {
        var rData = [];
        let search = $("#modal__select--search");
        _option["keyword"] = "";
        if (search) {
            _option["keyword"] = search.val();
        }
        $.ajax({
            type: "post",
            url: route("handle_model_rela"),
            data: {
                model: m,
                act: act,
                relaId: riD,
                selected: _selected.length <= 0 ? null : _selected,
                page: _page,
                relaName: rName,
                relaModel: rM,
                relaKey: rK,
                option: JSON.stringify(_option),
                enabel_modal: enabel_modal,
            },
            async: false,
            dataType: "json",
            beforeSend: function () {
                $(".select__btn--save").addClass("d-none");
                $(".select__btn--loading").removeClass("d-none");
            },
            success: function (data) {
                rData = data;
                const body = $(prefix_id_select + "body");
                const bodyTag = $(prefix_id_select + "tags");
                if (data.error === 0) {
                    setModalParams(
                        true,
                        data.selected,
                        m,
                        riD,
                        rName,
                        _page,
                        rM,
                        rK
                    );
                    body.html(data.html);
                    bodyTag.html(data.html_tags);
                    rData.success = true;
                    if (act == "save") {
                        $.vaSwal("Lưu thành công", "", "success");
                    }
                    callback;
                } else {
                    $.vaSwal("Lỗi", data.html, "error");
                    rData.success = false;
                }
                setTimeout(() => {
                    $(".select__btn--save").removeClass("d-none");
                    $(".select__btn--loading").addClass("d-none");
                }, 1000);
            },
        });
        if (rData.success) {
            relaId = $.getParamsUrl("relaId");
            relaName = $.getParamsUrl("relaName")
                ? $.getParamsUrl("relaName")
                : "block";
            relaKey = $.getParamsUrl("relaKey");
            modelRela = $.getParamsUrl("modelRela");
            model = $.getParamsUrl("model")
                ? $.getParamsUrl("model")
                : "products";
            page = $.getParamsUrl("s_page");
            selected = $.getParamsUrl("selected")
                ? converToNumber($.getParamsUrl("selected").split(","))
                : [];
            relaKey = $.getParamsUrl("relaKey");
            relaModel = $.getParamsUrl("relaModel");
            updateCount(model);
        }
        return rData;
    }
    $("#producer").autocomplete({
        source: producer,
    });
    if (enabel_modal) {
        $("#modal__select").modal("show");
    }
    $(document).on("click", ".content__block", function () {
        let content = $(this).attr("data-content");
        $("#view__content__block__body").html(content);
        $("#view__content__block").modal("show");
    });
    $(document).on("click", "#select__prd--page .page-link", function (e) {
        e.preventDefault();
        const page = $(this).attr("data-page");
        handle_model_rela(
            model,
            relaModel,
            relaKey,
            relaId,
            relaName,
            "page",
            page
        );
    });
    function loading__select(el, load) {
        const loading = $(".init__select__loading");
        if (load) {
            el.addClass("d-none");
            el.next(".init__select__loading").removeClass("d-none");
        } else {
            el.removeClass("d-none");
            el.next(".init__select__loading").addClass("d-none");
        }
    }
    function updateCount(_model = model) {
        let el = $("button[data-model='" + model + "'] span");
        el.text(selected.length + " Item");
    }
    $(document).on("click", ".init__select", function (e) {
        e.preventDefault();
        $("#modal__select--search").val("");
        let relaId = $(this).attr("relaId");
        let relaName = $(this).attr("relaName");
        let relaModel = $(this).attr("relaModel");
        let relaKey = $(this).attr("relaKey");
        let model = $(this).attr("data-model");
        let page = 1;
        let act = "load";
        let selected = [];
        const el = $(this).prev().val();
        if (relaId == 0) {
            act = "loadAdd";
        }
        if (el) {
            selected = converToNumber(el.split(","));
        }
        loading__select($(this), true);
        const data = handle_model_rela(
            model,
            relaModel,
            relaKey,
            relaId,
            relaName,
            act,
            page,
            {},
            loading__select($(this), false),
            selected
        );
        if (data.success) {
            $("#modal__select").modal("show");
        }
    });

    $(document).on("click", ".rs__params--select", function () {
        resetParams();
        $("#modal__select").modal("hide");
    });
    $(document).on("click", "#modal__select--save", function () {
        const type = $(this).attr("type-save");
        if (type == "temp") {
            saveInitAdd();
            resetParams();
            $("#modal__select").modal("hide");
        }

        // if (relaId == 0) {
        //     saveInitAdd();
        // } else {
        //     handle_model_rela(
        //         model,
        //         relaModel,
        //         relaKey,
        //         relaId,
        //         relaName,
        //         "save",
        //         page
        //     );
        // }
    });
    $(document).on("click", ".select__prd--check", function () {
        let id = $(this).val();
        if ($(this).is(":checked")) {
            handle_select(id);
        } else {
            handle_select(id, true);
        }
        handle_model_rela(
            model,
            relaModel,
            relaKey,
            relaId,
            relaName,
            "check",
            page
        );
    });
    $(document).on(
        "keyup",
        "#modal__select--search",
        _.debounce(function (e) {
            handle_model_rela(
                model,
                relaModel,
                relaKey,
                relaId,
                relaName,
                "search",
                page
            );
        }, 300)
    );
    $(document).on("click", ".modal__select--tag-item", function () {
        let id = $(this).attr("data-id");
        handle_select(id, true);
        handle_model_rela(
            model,
            relaModel,
            relaKey,
            relaId,
            relaName,
            "renderSelected",
            page
        );
    });
    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
