$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    ScrollReveal().reveal('.prdcat', { reset: true, origin: 'top', cleanup: true });
    ScrollReveal().reveal('.product__item--list', { reset: true, origin: 'top', cleanup: true });

    $('span[data-toggle="tab"]').on('shown.bs.tab', function (event) {
        $('.prdcat').css('opacity', '1');
        $('.product__item--list').css('opacity', '1');
    });



    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});