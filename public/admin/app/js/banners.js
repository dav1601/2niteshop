
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('change', "#imgBanner", function () {
        var file = $(this)[0].files;
        $("#forBanner").html(file[0].name);
    });
    $(document).on('change', "#imgSlide", function () {
        var file = $(this)[0].files;
        $("#forSlide").html(file[0].name);
    });
    var url = $("#url__ajax--slide").val();;
    var prefix_slide = "#slide__show--";
    $(document).on('change', prefix_slide + "index", function () {
        var id = $(this).attr('data-id');
        var stt = $(this).attr('data-stt');
        var index = $(this).val();
        $.ajax({
            type: "post",
            url: url,
            data: { act: 1, id: id, stt: stt, index: index },
            dataType: "json",
            success: function (data) {
                if (data.error == 1) {
                    $("#output__slide").html(data.html);
                    toastr.error('Đang có slide hiển thị ở vị trí này vui lòng chuyển về chế độ Chờ');
                } else {
                    $("#output__slide").html(data.html);
                    toastr.success('Cập nhật vị trí slide thành công');
                }
            }
        });
    });
    $(document).on('change', prefix_slide + "stt", function () {
        var id = $(this).attr('data-id');
        var stt = $(this).val();
        var index = $(this).attr('data-index');
        console.log(stt);
        $.ajax({
            type: "post",
            url: url,
            data: { act: 2, id: id, stt: stt, index: index },
            dataType: "json",
            success: function (data) {
                if (data.error == 1) {
                    $("#output__slide").html(data.html);
                    toastr.error('Đang có slide hiển thị ở vị trí này vui lòng chuyển về chế độ Chờ');
                } else {
                    $("#output__slide").html(data.html);
                    toastr.success('Cập nhật trạng thái slide thành công');
                }

            }
        });
    });





    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});