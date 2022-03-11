$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('change', "#sort__search--main", function () {
        var page = 1;
        var dataView = $(this).attr('data-view');
        var val = $(this).val();
        var op = $("#sort__search--main :selected").attr('ord');
        var kw = $(this).attr('data-kw');
        var url1 = route('search_main_ajax');
        var url = new URL($("#index_current_url").val());
        var sps = url.searchParams;
        sps.append('keyword', kw);
        sps.append('sort', val);
        sps.append('ord', op);
        sps.append('page', 1);
        history.replaceState("", "", url.toString());
        $.ajax({
            type: "post",
            url: url1,
            data: { kw: kw, page: page, ord: op, sort: val, view: dataView },
            dataType: "json",
            beforeSend: function () {
                $("#loading").css('display', 'flex');
                $("#bg-loading").css('display', 'flex');
            },
            success: function (data) {
                $("#outputGrid").html(data.html);
                $("#outputList").html(data.html_2);
                if (dataView == "grid") {
                    $("#grid .products__page").html(data.page);
                } else {
                    $("#list .products__page").html(data.page);
                }
                $("#loading").css('display', 'none');
                $("#bg-loading").css('display', 'none');
                console.log(data);
            }
        });
    });
    $(document).on('click', ".page__search--main .page-link", function () {
        var page = $(this).attr('data-page');
        var dataView = $("#sort__search--main").attr('data-view');
        var val = $("#sort__search--main").val();
        var op = $("#sort__search--main :selected").attr('ord');
        var url1 = route('search_main_ajax');
        var url = new URL($("#index_current_url").val());
        var kw = $("#sort__search--main").attr('data-kw');
        var sps = url.searchParams;
        sps.append('keyword', kw);
        sps.append('sort', val);
        sps.append('ord', op);
        if (page != 1) {
            sps.append('page', page);
        }
        history.replaceState("", "", url.toString());
        $.ajax({
            type: "post",
            url: url1,
            data: { kw: kw, page: page, ord: op, sort: val, view: dataView },
            dataType: "json",
            beforeSend: function () {
                $("#loading").css('display', 'flex');
                $("#bg-loading").css('display', 'flex');
            },
            success: function (data) {
                $("#outputGrid").html(data.html);
                $("#outputList").html(data.html_2);
                $("#list .products__page").html(data.page);
                $(document).scrollTop(0);
                $("#loading").css('display', 'none');
                $("#bg-loading").css('display', 'none');
                console.log(data);
            }
        });
    });



    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
