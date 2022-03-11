$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
function handle_select_all($act = "load", $type = "all") {
    var kw_blog = $("#search__name--blog").val();
    var kw = $("#search__name").val();
    var url_ajax = $("#url__handle--related").val();
    var selected_blog = $.get_checked('select__blog');
    var selected = $.get_checked('select__product');
    var url_selected = new URL($("#url__selected").val());
    var sps = url_selected.searchParams;
    if (selected.length > 0) {
        sps.append('selected', selected.toString());
        history.replaceState("", "", url_selected.toString());
    } else {
        sps.delete('selected');
        history.replaceState("", "", url_selected.toString());
    }
    if (selected_blog.length > 0) {
        sps.append('selected_blog', selected_blog.toString());
        history.replaceState("", "", url_selected.toString());
    } else {
        sps.delete('selected_blog');
        history.replaceState("", "", url_selected.toString());
    }
    $.ajax({
        type: "post",
        url: url_ajax,
        data: { selected: selected, selected_blog: selected_blog, act: $act, kw: kw, kw_blog: kw_blog, type: $type },
        dataType: "json",
        success: function (data) {
            if ($act == "click" && $type == "product") {
                $("#selected").html(data.html);
            } else if ($act == "click" && $type == "blog") {
                $("#selected_blog").html(data.html);
            }
            if ($act == "keyup" && $type == "blog") {
                $("#result_blog").html(data.html);
            } else if ($act == "keyup" && $type == "product") {
                $("#result").html(data.html);
            }
            if ($type == "all") {
                $("#selected").html(data.html);
                $("#selected_blog").html(data.html_2);
            }
            console.log(data);
        }
    });
}
handle_select_all();
$(document).on('click', ".select__blog", function () {
    var id = $(this).val();
    handle_select_all($act = "click", $type = "blog");
    $("#search__name--blog").val('');
    $("#result_blog").html("Tìm Tiếp Tục?");
});
$(document).on('keyup', "#search__name--blog", function () {
    handle_select_all($act = "keyup", $type = "blog");
});
$(document).on('click', ".select__product", function () {
    var id = $(this).val();
    handle_select_all($act = "click", $type = "product");
    $("#search__name").val('');
    $("#result").html("Tìm Tiếp Tục?");
});
$(document).on('keyup', "#search__name", function () {
    handle_select_all($act = "keyup", $type = "product");
});


// END HANDLEEEEEEEEEEEE RELATED BLOGS


// END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
