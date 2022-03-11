$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('change', "#img", function () {
        var file = $(this)[0].files;
        $("#forImg").html(file[0].name);
    });
    $(document).on('change', "#icon", function () {
        var file = $(this)[0].files;
        $("#forIcon").html(file[0].name);
    });
    $(document).on('change', "#gll", function () {
        var files = $(this)[0].files;
        $("#forGll").html(files.length + " Tệp");
    });
    $(document).on('click', ".delete_cat", function () {
        var url = $(this).attr('data-url');
        swal({
            title: "Bạn chắc chắn muốn xoá danh mục này chứ ?",
            text: "Khi xoá là không thể khôi phục lại!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = url;
                } else {
                    swal("Đừng bấm nhầm nữa nhé!");
                }
            });
    });


    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});