$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    jQuery.loading = function loading() {
        $("#loading").css('display', 'flex');
        $("#bg-loading").css('display', 'blog');
    }
    jQuery.end_loading =   function end_loading() {
        $("#loading").css('display', 'none');
        $("#bg-loading").css('display', 'none');
    }



// END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
