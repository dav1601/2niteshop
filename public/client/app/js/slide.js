$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var vertical = true;
    var widthWindow = $(window).width();

    $(window).resize(function () {
        if (slide) {
            slide.destroy();
            itemSlide = Math.ceil(Number($(".dtl__prd--left").width() / 80));
            slide = $("#vertical").lightSlider({
                gallery: true,
                item: 1,
                loop: true,
                thumbItem: itemSlide,
                slideMargin: 0,
                onBeforeSlide: function (el) {
                    hideNextPrev();
                    activeZoom();
                },
                onAfterSlide: function (el) {
                    hideNextPrev();
                    activeZoom();
                },
            });
        }
    });

    var itemSlide = Math.ceil(Number($(".dtl__prd--left").width() / 80));
    var slide = $("#vertical").lightSlider({
        gallery: true,
        item: 1,
        loop: true,
        thumbItem: itemSlide,
        slideMargin: 0,
        onBeforeSlide: function (el) {
            hideNextPrev();
            activeZoom();
        },
        onAfterSlide: function (el) {
            hideNextPrev();
            activeZoom();
        },
    });
    function activeZoom() {
        var url = $(".lslide.active img").attr("src");
        $(".lslide.active").zoom({ url: url });
    }
    function hideNextPrev() {
        if (slide.getTotalSlideCount() <= itemSlide) {
            $(".my__action").css("display", "none");
        } else {
            if (slide.getCurrentSlideCount() == 1) {
                $(".my__action--prev").css("display", "none");
            } else {
                $(".my__action--prev").css("display", "flex");
            }
            if (slide.getCurrentSlideCount() == slide.getTotalSlideCount()) {
                $(".my__action--next").css("display", "none");
            } else {
                $(".my__action--next").css("display", "flex");
            }
        }
    }

    $(document).on("click", ".my__action--prev", function () {
        slide.goToPrevSlide();
        hideNextPrev();
        activeZoom();
    });
    $(document).on("click", ".my__action--next", function () {
        slide.goToNextSlide();
        hideNextPrev();
        activeZoom();
    });
    hideNextPrev();
    activeZoom();

    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
