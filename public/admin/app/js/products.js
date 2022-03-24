$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var prefix__filter = "#prd__filter--";
    var url_search = $("#url__handle--search").val();
    var url_cat = $("#url__handle--cat").val();
    var url_reload = $("#url__handle--reload").val();
    var url_load = $('#url__handle--load').val();
    var url = $("#url__ajax--price").val();
    var url_delete_gll = $("#url__handle--delete").val();
    $(document).on('change', "#main_img", function () {
        var file = $(this)[0].files;
        $("#forMain").html(file[0].name);
    });
    $(document).on('change', "#sub_img", function () {
        var file = $(this)[0].files;
        $("#forSub").html(file[0].name);
    });
    $(document).on('change', "#gll700", function () {
        var files = $(this)[0].files;
        $("#for700").html(files.length + " Tệp");
    });
    $(document).on('change', "#gll80", function () {
        var files = $(this)[0].files;
        $("#for80").html(files.length + " Tệp");
    });
    $(document).on('change', "#banner_prd", function () {
        var file = $(this)[0].files;
        $("#forBannerPrd").html(file[0].name);
    });
    $(document).on('change', "#bg_product", function () {
        var file = $(this)[0].files;
        $("#forBg").html(file[0].name);
    });
    // //////////////////////
    $(document).on('change', "#cat", function () {
        var cat_id = $(this).val();
        if (cat_id != '') {
            $.ajax({
                type: "post",
                url: url_cat,
                data: { cat_id: cat_id, type: 1 },
                dataType: "json",
                beforeSend: function () {
                    $(".box_access").html('<span>Đang Load Dữ Liệu.....</span>');
                },
                success: function (data) {
                    $("#cat_1").html(data.html_2);
                    $("#op_sub_1").html(data.html_2);
                    $("#bundled_skin").html(data.html);
                    $("#cat_id").html(data.html);
                    $(".box_access").html(data.html_3);
                }
            });
        } else {
            $("#cat_1").html('<option value="">Chưa Chọn Danh Mục Chính</option>');
            $("#op_sub_1").html('<option value="">Chưa Chọn Danh Mục Chính</option>');
            $("#bundled_skin").html('<option value="">Chưa Chọn Danh Mục Chính</option>');
            $("#cat_id").html('<option value="">Chưa Chọn Danh Mục Chính</option>');
            $(".box_access").html('<span>Chưa Chọn Danh Mục Chính.....</span>');
        }

    });
    // /////////////////////////////////////////
    $(document).on('change', "#op_sub_1", function () {
        var cat_id = $(this).val();
        if (cat_id != '') {
            $.ajax({
                type: "post",
                url: url_cat,
                data: { cat_id: cat_id, type: 1 },
                dataType: "json",
                success: function (data) {
                    $("#op_sub_2").html(data.html);
                }
            });
        } else {
            $("#op_sub_2").html('<option value="">Chưa Chọn Op Sub 1 </option>');
        }

    });
    $(document).on('change', "#cat_2", function () {
        var cat_id = $(this).val();
        if (cat_id != '') {
            $.ajax({
                type: "post",
                url: url_cat,
                data: { cat_id: cat_id, type: 1 },
                dataType: "json",
                success: function (data) {
                    $("#cat_2_id").html(data.html);
                }
            });
        } else {
            $("#cat_2_id").html('<option value="">Chưa Chọn Danh Mục Gốc 2 </option>');
        }

    });
    // /////////////////////////////////////////
    $(document).on('change', "#cat_1", function () {
        var cat_id = $(this).val();
        if (cat_id != '') {
            $.ajax({
                type: "post",
                url: url_cat,
                data: { cat_id: cat_id, type: 2 },
                dataType: "json",
                success: function (data) {
                    $("#cat_2").html(data.html);
                }
            });
        } else {
            $("#cat_2").html('<option value="">Chưa Chọn Danh Mục Phụ 1</option>');
        }

    });
    // /////////////////////////////////////////////
    $(document).on('keyup', "#search_pdc", function () {
        var kw = $(this).val();
        $.ajax({
            type: "post",
            url: url_search,
            data: { kw: kw },
            dataType: "json",
            success: function (data) {
                $("#producer").html(data.html);
            }
        });
    });

    // //////////////////////////////////
    $(document).on('click', "#reload__pdc", function () {
        var kw = $("#search_pdc").val();
        $.ajax({
            type: "post",
            url: url_reload,
            data: { type: 1, kw: kw },
            dataType: "json",
            beforeSend: function () {
                $("#reload__pdc").html('<span class="spinner-border spinner-border-sm pr-1" role="status" aria-hidden="true"></span> Loading...');
            },
            success: function (data) {
                $("#producer").html(data.html);
                $("#reload__pdc").html('<i class="fas fa-sync-alt pr-2"></i> Làm Mới');
                toastr.success('Làm mới nhà sản xuất thành công');
            }
        });
        return false;
    });
    // /////////////////////////////////
    $(document).on('click', "#reload__ins", function () {
        $.ajax({
            type: "post",
            url: url_reload,
            data: { type: 2 },
            dataType: "json",
            beforeSend: function () {
                $('#reload__ins').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...');
            },
            success: function (data) {
                $(".inner-cis").html(data.html);
                $('#reload__ins').html('<i class="fas fa-sync-alt pr-2"></i> Làm Mới');
                toastr.success('Làm mới chính sách bảo hành thành công');
            }
        });
        return false;
    });
    ///////////////////////////////////////////////////////
    $(document).on('click', "#reload__plc", function () {
        $.ajax({
            type: "post",
            url: url_reload,
            data: { type: 3 },
            dataType: "json",
            beforeSend: function () {
                $('#reload__plc').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...');
            },
            success: function (data) {
                $(".inner-plc").html(data.html);
                $('[data-toggle="tooltip"]').tooltip();
                $('#reload__plc').html('<i class="fas fa-sync-alt pr-2"></i> Làm Mới');
                toastr.success('Làm mới chính sách cửa hàng thành công');
            }
        });
        return false;
    });
    $(document).on('change', "#type", function () {
        var tp = $(this).val();
        if (tp != '') {
            $.ajax({
                type: "post",
                url: url_cat,
                data: { type: 4, tp: tp },
                dataType: "json",
                success: function (data) {
                    $("#sub_type").html(data.html);
                }
            });
        } else {
            $("#sub_type").html('<option value="0">Bạn chưa chọn loại sản phẩm</option>');
        }

    });

    // /////////////////////////////////////////
    function load_products($action = "load", $type = 1, $sort = $(prefix__filter + "sort").val(), $nameOrId = $(prefix__filter + "name").val(), $pF = $(prefix__filter + "priceF").val(), $pT = $(prefix__filter + "priceT").val(), $cat = $(prefix__filter + "cat").val(), $cat_s1 = $(prefix__filter + "cat_s1").val(), $cat_s2 = $(prefix__filter + "cat_s2").val(), $pdc = $(prefix__filter + "prdcer").val(), $stock = $(prefix__filter + "stock").val(), $author = $(prefix__filter + "author").val(), $model = $(prefix__filter + "model").val(),
        $page = 1, $id = 0, $val = 0) {
        var option = $(prefix__filter + "sort" + " option:selected").attr('sort');
        $.ajax({
            type: "post",
            url: url_load,
            data: { action: $action, type: $type, sort: $sort, nameOrId: $nameOrId, pF: $pF, pT: $pT, cat: $cat, cat_s1: $cat_s1, cat_s2: $cat_s2, pdc: $pdc, stock: $stock, author: $author, model: $model, page: $page, option: option, id: $id, val: $val },
            dataType: "json",
            success: function (data) {
                $("#product__show--ajax").html(data.html);
                $("#product__show--page").html(data.page);
                if (data.type == 1) {
                    toastr.success("Load Dữ Liệu Thành Công");
                }
                if (data.type == 2) {
                    toastr.success("Cập Nhật trạng thái mới cho sản phẩm thành công");
                }
                if (data.type == 3) {
                    toastr.success("Cập Nhật tình trạng kho cho sản phẩm thành công");
                }
                if (data.type == 4) {
                    toastr.success("Cập Nhật hiển thị nổi bật cho sản phẩm thành công");
                }
            }
        });
    }
    // ////////////////////////////////////////
    $(document).on('change', prefix__filter + "cat", function () {
        var cat_id = $(this).val();
        if (cat_id != 0) {
            $.ajax({
                type: "post",
                url: url_cat,
                data: { cat_id: cat_id, type: 1 },
                dataType: "json",
                success: function (data) {
                    $(prefix__filter + "cat_s1").html(data.html_2);
                }
            });
        } else {
            $(prefix__filter + "cat_s1").html('<option value="">Tất cả</option>');
            $(prefix__filter + "cat_s2").html('<option value="">Tất cả</option>');
        }
        load_products();
    });
    // //////////////////////////////// end filter cat main
    $(document).on('change', prefix__filter + "cat_s1", function () {
        var cat_id = $(this).val();
        if (cat_id != 0) {
            $.ajax({
                type: "post",
                url: url_cat,
                data: { cat_id: cat_id, type: 2 },
                dataType: "json",
                success: function (data) {
                    $(prefix__filter + "cat_s2").html(data.html);
                }
            });
        } else {
            $(prefix__filter + "cat_s2").html('<option value="">Tất cả</option>');
        }
        load_products();
    });

    // ///////////////////////////// end filter cat sub 1
    $(document).on('change', prefix__filter + "stock", function () {
        load_products();
    });
    $(document).on('change', prefix__filter + "sort", function () {
        load_products();
    });
    $(document).on('change', prefix__filter + "prdcer", function () {
        load_products();
    });
    $(document).on('keyup', prefix__filter + "name", function () {
        load_products();
    });
    $(document).on('keyup', prefix__filter + "author", function () {
        load_products();
    });
    $(document).on('keyup', prefix__filter + "model", function () {
        load_products();
    });
    $(document).on('keyup', "#prd__filter--priceT", function () {
        var price = $(this).val();
        var url = $("#url__ajax--price").val();
        $.ajax({
            type: "post",
            url: url,
            data: { price: price },
            dataType: "json",
            success: function (data) {
                $('.output_price_T').text(data.price);
            }
        });
        load_products();
    });
    $(document).on('keyup', "#prd__filter--priceF", function () {
        var price = $(this).val();
        var url = $("#url__ajax--price").val();
        $.ajax({
            type: "post",
            url: url,
            data: { price: price },
            dataType: "json",
            success: function (data) {
                $('.output_price').text(data.price);
            }
        });
        load_products();
    });
    // //////
    $(document).on('click', "#product__show--page .page-link", function () {
        var page = $(this).attr('data-page');
        load_products($action = "load", $type = 1, $sort = $(prefix__filter + "sort").val(), $nameOrId = $(prefix__filter + "name").val(), $pF = $(prefix__filter + "priceF").val(), $pT = $(prefix__filter + "priceT").val(), $cat = $(prefix__filter + "cat").val(), $cat_s1 = $(prefix__filter + "cat_s1").val(), $cat_s2 = $(prefix__filter + "cat_s2").val(), $pdc = $(prefix__filter + "prdcer").val(), $stock = $(prefix__filter + "stock").val(), $author = $(prefix__filter + "author").val(), $model = $(prefix__filter + "model").val(), $page = page, $id = 0, $val = 0);
        window.scrollTo({ top: $("#pointScrollProduct").offset().top, behavior: 'smooth' });
    });
    // /////////////
    $(document).on('change', "#product__show--new", function () {
        var page = $("#product__show--page .page-item.active .page-link").attr('data-page');
        var id = $(this).attr('data-id');
        var val = $(this).val();
        load_products($action = "update_new", $type = 2, $sort = $(prefix__filter + "sort").val(), $nameOrId = $(prefix__filter + "name").val(), $pF = $(prefix__filter + "priceF").val(), $pT = $(prefix__filter + "priceT").val(), $cat = $(prefix__filter + "cat").val(), $cat_s1 = $(prefix__filter + "cat_s1").val(), $cat_s2 = $(prefix__filter + "cat_s2").val(), $pdc = $(prefix__filter + "prdcer").val(), $stock = $(prefix__filter + "stock").val(), $author = $(prefix__filter + "author").val(), $model = $(prefix__filter + "model").val(), $page = page, $id = id, $val = val);
    });
    $(document).on('change', "#product__show--stock", function () {
        var page = $("#product__show--page .page-item.active .page-link").attr('data-page');
        var id = $(this).attr('data-id');
        var val = $(this).val();
        load_products($action = "update_stock", $type = 3, $sort = $(prefix__filter + "sort").val(), $nameOrId = $(prefix__filter + "name").val(), $pF = $(prefix__filter + "priceF").val(), $pT = $(prefix__filter + "priceT").val(), $cat = $(prefix__filter + "cat").val(), $cat_s1 = $(prefix__filter + "cat_s1").val(), $cat_s2 = $(prefix__filter + "cat_s2").val(), $pdc = $(prefix__filter + "prdcer").val(), $stock = $(prefix__filter + "stock").val(), $author = $(prefix__filter + "author").val(), $model = $(prefix__filter + "model").val(), $page = page, $id = id, $val = val);
    });
    $(document).on('change', "#product__show--hl", function () {
        var page = $("#product__show--page .page-item.active .page-link").attr('data-page');
        var id = $(this).attr('data-id');
        var val = $(this).val();
        load_products($action = "update_hl", $type = 4, $sort = $(prefix__filter + "sort").val(), $nameOrId = $(prefix__filter + "name").val(), $pF = $(prefix__filter + "priceF").val(), $pT = $(prefix__filter + "priceT").val(), $cat = $(prefix__filter + "cat").val(), $cat_s1 = $(prefix__filter + "cat_s1").val(), $cat_s2 = $(prefix__filter + "cat_s2").val(), $pdc = $(prefix__filter + "prdcer").val(), $stock = $(prefix__filter + "stock").val(), $author = $(prefix__filter + "author").val(), $model = $(prefix__filter + "model").val(), $page = page, $id = id, $val = val);
    });
    // ////// start delete gll images in edit product
    $(document).on('click', ".delete_gll", function () {
        var id = $(this).attr('data-id');
        // swal({
        //     title: "Bạn chắc chứ?",
        //     text: "Khi đã xoá thì không thể khôi phục ảnh này chỉ có thể THÊM VÀO LẠI",
        //     icon: "warning",
        //     buttons: true,
        //     dangerMode: true,
        // })
        //     .then((willDelete) => {
        //         if (willDelete) {

        //         } else {
        //             swal("Đừng click nhầm nữa nhé bae!");
        //         }
        //     });
        Swal.fire({
            title: 'Bạn Chắc Chắn Xoá Chứ?',
            text: "Hình ảnh không thể khôi phục chỉ có thể thêm lại!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Vẫn Xoá'
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
                        console.log(data);
                    }
                });
            } else {
                Swal.fire({
                    icon: 'warning',
                    text: 'Cẩn Thận Hơn Nhé!',
                  });
            }
          })
    });

    // ////////////////// end
    $(document).on('keyup', "#historical_cost", function () {
        var price = $(this).val();
        var url = $("#url__ajax--price").val();
        $.ajax({
            type: "post",
            url: url,
            data: { price: price },
            dataType: "json",
            success: function (data) {
                $('.output_price--cost').text(data.price);
            }
        });
    });
    // //////////////////////////////////// remove product
    $(document).on('click', ".remove__product", function () {
        Swal.fire({
            title: 'Bạn chắc chắn muốn xoá chứ?',
            text: "Bạn không thể khôi phục nếu lại khi đã xoá sản phẩm!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Vẫn Xoá!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = $(this).attr('data-url');
            }
        })
    });


    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
