$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var heightContent = $("#dtl__info--wrapper").height();
    if (heightContent <= 200) {
        $(".see__detail").css("display", "none");
    } else {
        $(".see__detail").css("display", "flex");
    }
    function get_checked(class_name) {
        var filter = [];
        $("." + class_name + ":checked").each(function () {
            filter.push($(this).val());
        });
        return filter;
    }
    function fomat($price = "", $class = "") {
        var url = route("format");
        $.ajax({
            type: "post",
            url: url,
            data: { price: $price },
            dataType: "json",
            success: function (data) {
                $("." + $class).html(data.price);
            },
        });
    }
    // detail product

    // end input number
    // end active insur

    // end detail

    // ///////////
    $(document).on("click", ".see__detail--btn", function () {
        $(".prd__dtl--info").css("max-height", "100%");
        $(this).addClass("close");
        $(".see__detail--btn span").text("Thu gọn");
        $(".see__detail--btn i").removeClass("fa-long-arrow-alt-down");
        $(".see__detail--btn i").addClass("fa-long-arrow-alt-up");
    });
    $(document).on("click", ".see__detail--btn.close", function () {
        $(".prd__dtl--info").css("max-height", "400px");
        $(this).removeClass("close");
        $(".see__detail--btn span").text("Xem chi tiết thông số kỹ thuật");
        $(".see__detail--btn i").removeClass("fa-long-arrow-alt-up");
        $(".see__detail--btn i").addClass("fa-long-arrow-alt-down");
    });
    $(document).on("click", ".see__full--btn", function () {
        $("#dtl__info").css("height", "auto");
        $(this).addClass("close");
        $(".see__full--btn span").text("Thu gọn");
        $(".see__full--btn i").removeClass("fa-long-arrow-alt-down");
        $(".see__full--btn i").addClass("fa-long-arrow-alt-up");
    });
    $(document).on("click", ".see__full--btn.close", function () {
        $("#dtl__info").css("height", "200px");
        $(this).removeClass("close");
        $(".see__full--btn span").text("Xem chi tiết bài viết");
        $(".see__full--btn i").removeClass("fa-long-arrow-alt-up");
        $(".see__full--btn i").addClass("fa-long-arrow-alt-down");
    });

    $("#nav-dtlContent").html(function (i, h) {
        return h.replace(/&nbsp;/g, "");
    });

    function loading_data_product($page = 1) {
        var page = $page;
        var genre = get_checked("game_genre").toString();
        var dataView = $("#sort").attr("data-view");
        var id = $("#sort").attr("data-id");
        var val = $("#sort").val();
        var op = $("#sort :selected").attr("ord");
        // var url1 = route("index_ajax");
        var url = new URL(window.location.href);
        var sps = url.searchParams;
        if (val != "id") {
            sps.set("sort", val);
            sps.set("ord", op);
        }
        if (page != 1) {
            sps.set("page", page);
        } else {
            sps.delete("page");
        }
        if (genre.length != 0) {
            sps.set("genre", genre);
        } else {
            sps.delete("genre");
            genre = "";
        }
        history.replaceState("", "", url.toString());
        $.ajax({
            type: "get",
            url: route("index_product", { slug: category.slug }),
            data: {
                id: category.slug,
                page: page,
                ord: op,
                sort: val,
                view: dataView,
                genre: genre,
                isAjax: true,
            },
            dataType: "json",
            beforeSend: function () {
                $.loading();
            },
            success: function (data) {
                $("#outputGrid").html(data.html);
                $("#outputList").html(data.html_2);
                $('[data-toggle="tooltip"]').tooltip();
                $(".products__page").html(data.page);
                $(document).scrollTop($("#category__filter").offset().top - 48);
                $.end_loading();
            },
        });
    }
    $(document).on("change", "#sort", function () {
        loading_data_product();
    });
    $(document).on("click", ".game_genre", function () {
        loading_data_product();
    });
    $(document).on("click", ".products__page .page-link", function () {
        loading_data_product($(this).attr("data-page"));
    });
    // ////////////////////
    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
