$(function () {
    var prefix__filter = "#prd__filter--";
    var url_search = route("handle_search");
    var url_cat = route("handle_cat");
    var url_reload = route("handle_reload");
    var url_load = route("handle_load");
    var url_delete_gll = route("handle_delete_gll");
    var btnSubmit = $("#submit-product");
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

    $("#formProducts").ajaxForm({
        beforeSend: function () {
            $.btn_loading_v2(btnSubmit, true, false);
        },
        success: function (res) {
            const data = res.data;
            $.btn_loading_v2(btnSubmit, false, false);
            return (location.href = data.redirect_edit);
        },
        error: function (res) {
            const data = res.responseJSON.data;
            console.log(data);
            $.validationFail(data);
            $.btn_loading_v2(btnSubmit, false, false);
        },
    });

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
    function currentPage() {
        return $("#product__show--page .page-item.active .page-link").attr(
            "data-page"
        );
    }
    function load_products(action = "load", page = 1, dataAjax = {}) {
        switch (action) {
            case "delete-product":
                $.btn_loading_v2(dataAjax.btn);
                break;

            default:
                $("#product__show--ajax").html($.ioLoading());
                break;
        }
        let form = new FormData();
        let sort = $(prefix__filter + "sort").val();
        let nameOrId = $(prefix__filter + "name").val();
        let priceMin = $(prefix__filter + "min").val();
        let priceMax = $(prefix__filter + "max").val();
        let pdc = $(prefix__filter + "prdcer").val();
        let author = $(prefix__filter + "author").val();
        let model = $(prefix__filter + "model").val();
        let status = $(prefix__filter + "status").val();
        let usage = $(prefix__filter + "usage").val();
        let val_sort = $(prefix__filter + "sort" + " option:selected").attr(
            "sort"
        );
        let categories = [];
        let selectedCategories = $(".a-checkbox-input:checked");
        $.each(selectedCategories, function (i, e) {
            categories.push($(e).val());
        });
        form.append("act", action);
        form.append("page", page);
        if (!_.isEmpty(dataAjax)) {
            for (const key in dataAjax) {
                form.append(key, dataAjax[key]);
            }
        }

        form.append("sort", val_sort);
        form.append("field", sort);
        form.append("name", nameOrId);
        form.append("pMin", priceMin);
        form.append("pMax", priceMax);
        form.append("producer", pdc);
        form.append("author", author);
        form.append("model", model);
        form.append("status", status);
        form.append("usage", usage);
        form.append("categories", categories);
        return $.ajax({
            type: "post",
            url: url_load,
            data: form,
            cache: false,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (res) {
                const data = res.data;
                $("#product__show--ajax").html(data.html);
                $("#product__show--page").html(data.page);
            },
        });
    }
    if (route().current("show_product")) {
        load_products();
    }
    // ////////////////////////////////////////
    $(document).on("click", prefix__filter + "category", function () {
        load_products();
    });
    // //////////////////////////////// end filter cat main

    // ///////////////////////////// end filter cat sub 1

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

    // //////
    $(document).on("click", "#product__show--page .page-link", function () {
        const page = $(this).attr("data-page");
        load_products("load", page).then(() => {
            window.scrollTo({
                top: $("#pointScrollProduct").offset().top,
                behavior: "smooth",
            });
        });
    });
    // /////////////

    $(document).on("change", "#product__show--hl", function () {
        const dataAjax = {
            id: $(this).attr("data-id"),
            highlight: $(this).val(),
        };
        load_products("update_hl", currentPage(), dataAjax);
    });
    $(document).on("change", prefix__filter + "status", function () {
        load_products();
    });
    $(document).on("change", prefix__filter + "usage", function () {
        load_products();
    });
    $(document).on("change", "#triggerPriceChange", function () {
        load_products();
    });
    // ////// start delete gll images in edit product
    $(document).on("click", ".delete_gll", function () {
        let id = $(this).attr("data-id");
        let index = $(this).attr("data-index");

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
                delete gll80[index];
                delete gll700[index];
                $.ajax({
                    type: "post",
                    url: url_delete_gll,
                    data: { gll80: gll80, gll700: gll700 },
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
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
            confirmButtonText: "Delete",
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
    if (typeof producer !== "undefined") {
        $("#producer").autocomplete({
            source: producer,
        });
    }
    const handle_gallery = (act = "load", dataAjax = {}) => {
        const ajax = {
            gallery: JSON.stringify(galleries),
            act: act,
        };
        const data = Object.assign(ajax, dataAjax);
        let form = new FormData();
        for (var key in data) {
            form.append(key, data[key]);
        }

        return $.ajax({
            type: "post",
            url: route("handle_gallery"),
            data: form,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
        });
    };

    $(document).on("change", ".gallery-input", function () {
        const id = productId;
        const elid = $(this).attr("id");
        const index = parseInt($(this).attr("data-index"));
        const size = $(this).attr("data-size");
        const target = "#" + elid;
        const file = $(this).prop("files")[0];
        handle_gallery("upload-image", {
            index: index,
            id: id,
            size: size,
            file: file,
        })
            .then((res) => {
                if (res.image) {
                    const image = $("img[data-target='" + target + "']");
                    image.attr("src", res.image);
                    $("#clear-" + elid).removeClass("d-none");
                    $("#clear-" + elid).addClass("d-block");
                    toastr.success("Upload hình ảnh thành công");
                }
            })
            .catch((res) => {});
    });
    // ///////////////////////////////////////////////////
    $(document).on("click", ".a-product-gallery-add", function () {
        const id = isEdit ? productId : null;
        const item = {
            id: null,
            image_700: "",
            image_80: "",
            products_id: id,
        };
        const index = galleries.length;
        galleries.push(item);
        handle_gallery("add-gallery", {
            isEdit: isEdit,
            item: JSON.stringify(item),
            index: index,
            id: id,
        }).then((res) => {
            $("#product-galleries").append(res.html);
        });
    });
    // //////////////////////////////////////////////////
    $(document).on("click", ".gallery-upload", function () {
        const target = $(this).attr("data-target");
        Swal.fire({
            title: "Bạn chắc chắn thay đổi hình ảnh?",
            text: "Hình ảnh hiện tại sẽ bị xoá và thay thế bằng ảnh mới",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Upload",
        }).then((result) => {
            if (result.isConfirmed) {
                $(target).click();
            }
        });
    });
    $(document).on("click", ".gallery-clear", function () {
        const id = productId;
        const index = parseInt($(this).attr("data-index"));
        const size = $(this).attr("data-size");

        Swal.fire({
            title: "Bạn Chắc Chắn Xoá Chứ?",
            text: "Hình ảnh không thể khôi phục chỉ có thể thêm lại!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Delete",
        }).then((result) => {
            if (result.isConfirmed) {
                handle_gallery("delete-image", {
                    index: index,
                    id: id,
                    size: size,
                }).then((res) => {
                    const target = $(this).attr("data-target");
                    const image = $("img[data-target='" + target + "']");
                    image.attr("src", res.image);
                    $(this).removeClass("d-block");
                    $(this).addClass("d-none");
                    toastr.success("Xoá hình ảnh thành công");
                });
            } else {
                Swal.fire({
                    icon: "warning",
                    text: "Cẩn Thận Hơn Nhé!",
                });
            }
        });
    });
    initSortGallery();
    function sortGallery() {
        let sort = [];
        const els = $("#product-galleries").find(".a-product-gallery-item");

        $.each(els, function (index, el) {
            sort.push($(el).attr("data-id"));
        });
        handle_gallery("sort", {
            sort: sort,
        }).then((res) => {
            console.log(res);
            toastr.success("Sắp xếp gallery thành công");
        });
    }
    $(document).on("click", ".gallery-delete", function () {
        Swal.fire({
            title: "Bạn chắc chứ?",
            text: "Hình ảnh không thể khôi phục chỉ có thể thêm lại!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Delete",
        }).then((result) => {
            if (result.isConfirmed) {
                if (isEdit) {
                    handle_gallery("delete-gallery", {
                        id: productId,
                        index: $(this).attr("data-key"),
                    }).then((res) => {
                        if (res.deleted) {
                            $(this).closest(".a-product-gallery-item").remove();
                            sortGallery();
                        }
                    });
                } else {
                    $(this).closest(".a-product-gallery-item").remove();
                }
            } else {
                Swal.fire({
                    icon: "warning",
                    text: "Cẩn Thận Hơn Nhé!",
                });
            }
        });
    });
    function initSortGallery() {
        $("#product-galleries").sortable({
            items: ".a-product-gallery-item",
            forcePlaceholderSize: true,
            cursor: "move",
            scroll: false,
            tolerance: "pointer",
            cursorAt: { bottom: 10, right: 10 },
            axis: "y",
            update: function (event, ui) {
                if (isEdit) {
                    sortGallery();
                }
            },
            sort: function (event, ui) {
                $(ui.item[0]).css({
                    "border-style": "solid",
                    "border-color": "#ED4C67",
                });
            },
            stop: function (event, ui) {
                $(ui.item[0]).css({
                    "border-style": "dashed",
                    "border-color": "grey",
                });
            },
        });
    }
    // ----------------------------------------------------------------
    $(document).on("change", ".single-image-product-input", function () {
        const type = $(this).attr("data-type");
        handle_gallery("single-image-upload", {
            id: productId,
            type: type,
            image: $(this).prop("files")[0],
        }).then((res) => {
            if (res.uploaded) {
                const target = $(this).attr("data-target");
                const image = $("img[data-target='" + target + "']");
                image.attr("src", res.image);
                if (type !== "img_main") {
                    $("#clear-" + $(this).attr("id")).removeClass("d-none");
                }
                toastr.success("Cập nhật hình ảnh thành công");
            }
        });
    });
    // ----------------------------------------------------------------
    $(document).on("click", ".single-image-product-upload", function () {
        Swal.fire({
            title: "Bạn muốn tiếP tục upload?",
            text: "Hình ảnh hiện tại sẽ bị xoá và thay thế bằng ảnh mới!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Upload",
        }).then((result) => {
            if (result.isConfirmed) {
                const target = $(this).attr("data-target");
                $(target).click();
            }
        });
    });
    // ----------------------------------------------------------------
    $(document).on("click", ".single-image-product-delete", function () {
        Swal.fire({
            title: "Bạn chắc chắn xoá hình ảnh này?",
            text: "Hình ảnh không thể khôi phục chỉ có thể upload lại!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Delete",
        }).then((result) => {
            if (result.isConfirmed) {
                const type = $(this).attr("data-type");
                handle_gallery("single-image-delete", {
                    id: productId,
                    type: type,
                }).then((res) => {
                    if (res.deleted) {
                        console.log(res);
                        const target = $(this).attr("data-target");
                        const image = $("img[data-target='" + target + "']");
                        image.attr("src", res.image);
                        toastr.success("Xoá hình ảnh thành công");
                    }
                });
            } else {
                Swal.fire({
                    icon: "warning",
                    text: "Cẩn Thận Hơn Nhé!",
                });
            }
        });
    });
    // /////////////////////
});
