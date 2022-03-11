$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('[data-toggle="tooltip"]').tooltip();
    $("#toggle__sidebar").click(function (e) {
        e.preventDefault();
        $("#sidebar").toggleClass('hide-sidebar');
        $("#content").toggleClass('full-content');
    });
    var url_cart = $("#url__add--cart").val();
    // PRICE
    $(document).on('keyup', "#ins_price", function () {
        $.format_price($(this).val());
    });
    $(document).on('keyup', "#prd_price", function () {
        $.format_price($(this).val());
    });






    // END PRICE




    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
