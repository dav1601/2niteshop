$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(document).on("change", "#imgBanner", function () {
        var file = $(this)[0].files;
        $("#forBanner").html(file[0].name);
    });
    $(document).on("change", "#imgAds", function () {
        var file = $(this)[0].files;
        $("#forAds").html(file[0].name);
    });

    var prefix_slide = "#slide__show--";
    $(document).on("change", prefix_slide + "index", function () {
        var id = $(this).attr("data-id");
        var stt = $(this).attr("data-stt");
        var index = $(this).val();
        $.ajax({
            type: "post",
            url: route("handle_update_slide"),
            data: { act: 1, id: id, stt: stt, index: index },
            dataType: "json",
            success: function (data) {
                if (data.error == 1) {
                    $("#output__slide").html(data.html);
                    toastr.error(
                        "Đang có slide hiển thị ở vị trí này vui lòng chuyển về chế độ Chờ"
                    );
                } else {
                    $("#output__slide").html(data.html);
                    toastr.success("Cập nhật vị trí slide thành công");
                }
            },
        });
    });
    $(document).on("change", prefix_slide + "stt", function () {
        var id = $(this).attr("data-id");
        var stt = $(this).val();
        var index = $(this).attr("data-index");
        $.ajax({
            type: "post",
            url: route("handle_update_slide"),
            data: { act: 2, id: id, stt: stt, index: index },
            dataType: "json",
            success: function (data) {
                if (data.error == 1) {
                    $("#output__slide").html(data.html);
                    toastr.error(
                        "Đang có slide hiển thị ở vị trí này vui lòng chuyển về chế độ Chờ"
                    );
                } else {
                    $("#output__slide").html(data.html);
                    toastr.success("Cập nhật trạng thái slide thành công");
                }
            },
        });
    });
    function handle_slide(
        act = "update_index",
        _data = {},
        form = null,
        cb = null
    ) {
        if (form) {
            $.btn_loading_v2(form, true, true);
            $.errForm(true, form);
        }
        let dataDef = {
            act: act,
        };
        let obj = Object.assign(dataDef, _data);
        let data = new FormData();
        for (let key in obj) {
            data.append(key, obj[key]);
        }
        $.ajax({
            type: "post",
            url: route("slide.handle"),
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            dataType: "json",
            success: function (data) {
                cb;
                $("#slide__show").html(data.html);
                if (form) {
                    $("#slideModalContent").html(data.html_edit);
                    if (data.update_slide.errors) {
                        $.errForm(false, form, data.update_slide.errors);
                    }
                    $.btn_loading_v2(form, false, true);
                }
                // initDropable();

                if (!data.update_slide.errors) {
                    $.vaToas("Cập nhật slides thành công");
                } else {
                    console.log(data);
                    $.vaToas("Cập nhật slides thất bại", "e");
                }
            },
        });
    }
    $(document).on("change", ".switch-slide", function () {
        const id = $(this).attr("data-id");
        const checked = $(this).is(":checked");
        const data = {
            active: checked ? 1 : 2,
            id: id,
        };
        handle_slide("update_stt", data);
    });
    // var initDropable = function () {
    //     $(".stt-1 .slide-item").droppable({
    //         drop: function (event, ui) {
    //             const itemDrag = ui.draggable[0];
    //             const isItem = itemDrag.classList.contains("slide-item");
    //             const stt = itemDrag.getAttribute("slide-stt");
    //             if (isItem && stt == 1) {
    //                 const current = $(this)[0];
    //                 const idDrop = current.getAttribute("slide-id");
    //                 const indexDrop = current.getAttribute("slide-index");
    //                 const idDrag = itemDrag.getAttribute("slide-id");
    //                 const indexDrag = itemDrag.getAttribute("slide-index");
    //                 handle_slide(
    //                     "update_index",
    //                     {},
    //                     null,
    //                     idDrop,
    //                     idDrag,
    //                     indexDrop,
    //                     indexDrag
    //                 );
    //             }
    //         },
    //     });
    // };
    // initDropable();
    // $(document).on("click", ".slide-item-edit", function () {
    //     const id = $(this).attr("data-id");
    //     $.ajax({
    //         type: "post",
    //         url: route("slide.modal.content"),
    //         data: { id: id },
    //         dataType: "json",
    //         success: function (data) {
    //             $("#slideModalContent").html(data.html);
    //             $("#slideModal").modal("show");
    //         },
    //     });
    // });
    // $(document).on("click", ".saveSlide", function () {});
    function initSortable() {
        $(".stt-1").sortable({
            update: function (event, ui) {
                let arrSort = {};
                let allEl = $(this).children();
                const data = {
                    arrSort: [],
                };
                handle_slide("update_index", data);
            },
        });
    }
    $(document).on("mousedown", ".stt-1 .slide-item-dd", function () {
        const id = $(this).attr("data-id");
        const el = $(".slide-item-" + id);
        initSortable();
        // el.draggable({
        //     scroll: true,
        //     axis: "y",
        //     containment: "body",
        //     revert: false,
        //     helper: "clone",
        //     disable: false,
        //     start: function (event, ui) {
        //         el.addClass("slide-drag");
        //         el.children(".slide-item-wp").addClass("d-none");
        //     },
        //     drag: function (event, ui) {
        //         console.log("drag");
        //     },
        //     stop: function (event, ui) {
        //         el.removeClass("slide-drag");
        //         el.children(".slide-item-wp").removeClass("d-none");
        //         console.log(ui.helper[0]);
        //     },
        // });
    });

    $(document).on("submit", ".formUpdateSlide", function (e) {
        e.preventDefault();
        let form = $(this)[0];
        $.errForm(true, form);
        let data = new FormData(this);
        let obj = {};
        data.forEach(function (value, key) {
            obj[key] = value;
        });
        handle_slide("update_slide", obj, form);
    });
    // $(".slide-item").draggable({
    //     scroll: true,
    //     containment: "body",
    //     revert: false,
    //     helper: "clone",
    //     disable: false,
    //     start: function (event, ui) {
    //         console.log(ui.helper[0]);
    //     },
    //     drag: function (event, ui) {
    //         console.log("drag");
    //     },
    //     stop: function (event, ui) {
    //         console.log("stop");
    //     },
    // });
    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
