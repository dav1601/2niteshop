$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $(document).on("change", "#img", function () {
        var file = $(this)[0].files;
        $("#forImg").html(file[0].name);
    });
    $(document).on("change", "#icon", function () {
        var file = $(this)[0].files;
        $("#forIcon").html(file[0].name);
    });
    $(document).on("change", "#gll", function () {
        var files = $(this)[0].files;
        $("#forGll").html(files.length + " Tệp");
    });
    $(document).on("click", ".delete_cat", function () {
        var url = $(this).attr("data-url");
        swal({
            title: "Bạn chắc chắn muốn xoá danh mục này chứ ?",
            text: "Khi xoá là không thể khôi phục lại!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = url;
            } else {
                swal("Đừng bấm nhầm nữa nhé!");
            }
        });
    });
    $(document).on("click", ".admin-cate-item", function () {
        const target = $(this).attr("data-id");
        $("#admin-cate-collapse-" + target).collapse("toggle");
    });
    // $(document).on("mousedown", ".admin-cate-dd", function () {
    //     $(this).draggable({
    //         scroll: true,
    //         containment: "body",
    //         revert: false,
    //         helper: "clone",
    //         disable: false,
    //         start: function (event, ui) {
    //             console.log(ui);
    //         },
    //         drag: function (event, ui) {
    //             console.log(ui);
    //         },
    //         stop: function (event, ui) {
    //             console.log(ui);
    //         },
    //     });
    // });
    function handleLevelDD(el, lvDrop, root = true, act = "p") {
        let lv = lvDrop;
        if (!root) {
            let lvDrag = Number(el.attr("data-lv"));
            lv = lvDrag;
            switch (act) {
                case "m":
                    lv = Number(lvDrag + lvDrop);
                    break;
                case "m":
                    lv = Number(lvDrag - lvDrop);
                    break;
                default:
                    break;
            }
        }
        let classDrag = "--lv-" + lv;
        let margin = Number(lv * 30) + "px";
        let childDrag = el.children(".admin-cate-item");
        childDrag.removeClass(function (index, className) {
            return (className.match(/(^|\s)--lv-\S+/g) || []).join(" ");
        });
        childDrag.addClass(classDrag);
        el.css("margin-left", margin);
        el.attr("data-lv", lv);
    }
    function renderDD(drag, drop) {
        const elDrag = drag;
        const elDrop = drop;
        let act = "d";
        let lvDrop = Number(elDrop.attr("data-lv"));
        let lvDrag = Number(elDrag.attr("data-lv"));
        if (lvDrop < lvDrag) {
            act = "m";
        } else if (lvDrop > lvDrag) {
            act = "p";
        }
        let allChild = elDrag.find(".admin-cate-dd");
        handleLevelDD(elDrag, lvDrop, true, act);
        $.each(allChild, function (indexInArray, valueOfElement) {
            handleLevelDD($(valueOfElement), lvDrop, false, act);
        });
        console.log({
            drag: drag,
            drop: drop,
            childDrag: allChild,
        });
    }
    function update_sort(elEach) {
        let arrayUpdate = {};
        elEach.each(function (index, element) {
            arrayUpdate[index] = $(element).attr("data-id");
            $(element).attr("data-sort", index);
        });
        const data = {
            act: "update",
            arraySort: arrayUpdate,
        };
        ajaxSort(data);
    }
    function ajaxSort(data) {
        $.ajax({
            type: "post",
            url: route("handle_category"),
            data: data,
            dataType: "json",
            success: function (res) {
                if (!res.error) {
                    $.vaToas("Cập nhật danh mục thành công");
                } else {
                    $.vaToas("Cập nhật danh mục thất bại");
                }
            },
        });
    }

    $(".admin-cate").sortable({
        connectWith: ".admin-cate-connect",
        update: function (event, ui) {
            const el = $(ui.item[0]);
            const lv = Number(el.attr("data-lv"));
            const id = Number(el.attr("data-id"));
            const parent = Number(el.attr("data-parent"));
            let elEach = $("#admin-cate-" + parent).children("li");
            renderDD(el, $(this));
            update_sort(elEach);
            console.log({
                t: $(this),
                u: ui,
                e: "update",
            });
        },

        over: function (e, ui) {
            renderDD($(ui.item[0]), $(this));
        },
        receive: function (event, ui) {
            const currItem = $(ui.item[0]);
            let idParent = $(this).attr("data-id");
            let idChild = currItem.attr("data-id");
            let elEach = $(this).children("li");
            renderDD(currItem, $(this));
            const data = {
                act: "receive",
                idParent: idParent,
                idChild: idChild,
                level: currItem.attr("data-lv"),
            };
            ajaxSort(data);
            // console.log({
            //     t: $(this),
            //     u: ui,
            //     e: "receive",
            //     data: data,
            // });
            // renderDD(ui.item[0], $(this));
        },
    });
    // $(".admin-cate-collapse").droppable({
    //     over: function (event, ui) {
    //         const elDrag = $(ui.draggable[0]);
    //         const elDrop = $(this);
    //         let lvDrag = elDrag.attr("data-lv");
    //         let lvDrop = elDrop.attr("data-lv");
    //         console.log({
    //             lda: lvDrag,
    //             ldo: lvDrop,
    //         });
    //     },
    // });
    // LÀM TIẾP PHẦN NÀY + AJAX + TƯ DUY ĐỔI CLASS KHI OVER LÊN COLLAPSE
    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
