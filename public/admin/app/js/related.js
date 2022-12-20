$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function handle_select($act = "load") {
        var kw = $("#search__name").val();
        var url_ajax = route('handle_related_all');
        var selected = $.get_checked('select__blog');
        var url_selected = new URL($("#url__selected").val());
        var sps = url_selected.searchParams;
        if (selected.length > 0) {
            sps.append('selected', selected.toString());
            history.replaceState("", "", url_selected.toString());
        } else {
            sps.delete('selected');
            history.replaceState("", "", url_selected.toString());
        }
         $.ajax({
            type: "post",
            url: url_ajax,
            data:{selected:selected , act:$act , kw:kw },
            dataType: "json",
            success: function (data) {
                 if ($act == "click"){
                    $("#selected").html(data.html);
                 }
                 if ($act == "keyup"){
                     $("#result").html(data.html);
                }
            }
        });
    }
    handle_select();
    $(document).on('click', ".select__blog", function () {
        var id = $(this).val();
        handle_select($act="click");
        $("#search__name").val('');
        $("#result").html("Tìm Tiếp Tục?");
    });
    $(document).on('keyup' , "#search__name" , function(){
        handle_select($act="keyup");
    });
     $(document).on('change' , "#realatedFor" , function(){
         var act = "change";
         var forRealted = $(this).val();
            $.ajax({
                type: "post",
                url: route('handle_related_for'),
                data: {act:act , forR:forRealted},
                dataType: "json",
                success: function(data) {
                   $(".outputFor").html(data.html);
                }
            });
        });
        $(document).on('keyup' , "#search__product" , function(){
            var kw = $(this).val();
            var act = "search";
               $.ajax({
                   type: "post",
                   url: route('handle_related_for'),
                   data: {act:act , kw:kw},
                   dataType: "json",
                   success: function(data) {
                      $("#realatedForPrd").html(data.html_2);
                   }
               });
        });



    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
