$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var vertical = true;
    var widthWindow = $(window).width();

        var slide = $('#vertical').lightSlider({
            gallery: true,
            item: 1,
            vertical: vertical,
            vThumbWidth: 80,
            vThumbHeight:80,
            thumbItem: 6,
            thumbMargin: 4,
            slideMargin: 0,
            onBeforeSlide: function (el) {
                if (el.getCurrentSlideCount() >= 4) {
                    $('.my__action--prev').css('top', '0');
                } else {
                    $('.my__action--prev').css('top', '20px');
                }
                hideNextPrev();
                activeZoom();
            },
            onAfterSlide: function (el) {
                if (el.getCurrentSlideCount() >= 4) {
                    $('.my__action--prev').css('top', '0');
                } else {
                    $('.my__action--prev').css('top', '20px');
                }
                hideNextPrev();
                activeZoom();
            },
        });
    function activeZoom (){
        var url = $('.lslide.active img').attr('src');
            $('.lslide.active').zoom({ url: url });
    }
    function hideNextPrev(){
        if (slide.getTotalSlideCount() <= 6) {
            $('.my__action').css('display', 'none');
        } else {
            if (slide.getCurrentSlideCount() == 1) {
                $('.my__action--prev').css('display', 'none');
            } else {
                $('.my__action--prev').css('display', 'flex');
            }
            if (slide.getCurrentSlideCount() == slide.getTotalSlideCount() ) {
                $('.my__action--next').css('display', 'none');
            } else {
                $('.my__action--next').css('display', 'flex');
            }
        }

    }
    if (slide.getTotalSlideCount() <= 6) {
        $('.my__action').css('display', 'none');
    }
    $(document).on('click', ".my__action--prev", function () {
        slide.goToPrevSlide();
        if (slide.getCurrentSlideCount() >= 4) {
            $('.my__action--prev').css('top', '0');
        } else {
            $('.my__action--prev').css('top', '20px');
        }
        hideNextPrev();
        activeZoom();
    });
    $(document).on('click', ".my__action--next", function () {
        slide.goToNextSlide();
        if (slide.getCurrentSlideCount() >= 4) {
            $('.my__action--prev').css('top', '0');
        } else {
            $('.my__action--prev').css('top', '20px');
        }
        hideNextPrev();
        activeZoom();
    });
    hideNextPrev();
    activeZoom();



// END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
