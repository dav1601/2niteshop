$(function () {
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
    $(document).on("click", ".admin-cate-show", function () {
        const target = $(this).attr("data-id");
        const hidden = $(this).hasClass("fa-plus");
        if (hidden) {
            $(this).removeClass("fa-plus");
            $(this).addClass("fa-minus");
        } else {
            $(this).removeClass("fa-minus");
            $(this).addClass("fa-plus");
        }
        $("#admin-cate-collapse-" + target).collapse("toggle");
    });

    $("#m_editCategory").on("hidden.bs.modal", function () {
        $("#bodyEditCategory").html("");
    });
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
    // ANCHOR update category //////////////////////////////////////////////////////
    $("#formUpdateCategory").ajaxForm({
        beforeSubmit: function () {
            $.btn_loading_v2($("#formUpdateCategory"), true, true);
        },
        success: function (response) {
            toastr.success("Cập nhật danh mục thành công");
            $.btn_loading_v2($("#formUpdateCategory"), false, true);
            console.log(response);
        },
        error: function (errors) {
            $.btn_loading_v2($("#formUpdateCategory"), false, true);
            console.log(errors);
        },
    });
    // $(document).on("submit", ".formUpdateCategory", function (e) {
    //     e.preventDefault();
    //     let form = $(this)[0];
    //     $.errForm(true, form);
    //     let data = new FormData(this);
    //     $.btn_loading_v2(form, true, true);
    //     $.ajax({
    //         type: "post",
    //         url: route("handle_edit_cat"),
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         data: data,
    //         dataType: "json",
    //         success: function (res) {
    //             if (res.update_categories) {
    //                 $("#outputCategories").html(res.categories_html);
    //             }
    //             $.btn_loading_v2(form, false, true);
    //             $.errForm(false, form, res.errors);
    //             if (res.s) {
    //                 $(".admin-cate-item.--" + data.get("id"))
    //                     .children("span")
    //                     .text(res.name);
    //                 $.vaToas("Chỉnh sửa danh mục thành công");
    //             } else {
    //                 $.vaToas("Chỉnh sửa danh mục thất bại", "e");
    //             }
    //         },
    //     });
    // });
    function ajaxSort(data) {
        $.ajax({
            type: "post",
            url: route("handle_category"),
            data: data,
            dataType: "json",
            success: function (res) {
                console.log(res);
                if (data.act != "loadEdit") {
                    if (!res.error) {
                        $.vaToas("Cập nhật danh mục thành công");
                    } else {
                        $.vaToas("Cập nhật danh mục thất bại");
                    }
                } else {
                    $("#m_editCategory")
                        .find(".modal-body")
                        .html(res.html_edit);
                    $("#m_editCategoryKw").tagsinput("items");
                    $("#m_editCategory").modal("show");
                }
            },
        });
    }
    $(document).on("click", ".admin-cate-edit", function () {
        const data = {
            id: $(this).attr("data-id"),
            act: "loadEdit",
        };
        ajaxSort(data);
        // $("#m_editCategory").modal("show");
    });

    $(".admin-cate").sortable({
        items: ".admin-cate-dd",
        containment: "parent",
        forcePlaceholderSize: true,
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
            console.log({
                act: "over",
                u: ui,
                t: $(this),
            });
            renderDD($(ui.item[0]), $(this));
        },
        receive: function (event, ui) {
            console.log({
                act: "receive",
                u: ui,
            });
            // console.log(ui);
            // const currItem = $(ui.item[0]);
            // let idParent = $(this).attr("data-id");
            // let idChild = currItem.attr("data-id");
            // let elEach = $(this).children("li");
            // renderDD(currItem, $(this));
            // const data = {
            //     act: "receive",
            //     idParent: idParent,
            //     idChild: idChild,
            //     level: currItem.attr("data-lv"),
            // };
            // ajaxSort(data);
        },
    });
    $(".admin-cate-collapse").droppable({
        over: function (event, ui) {
            const elDrag = $(ui.draggable[0]);
            const elDrop = $(this);
            let lvDrag = elDrag.attr("data-lv");
            let lvDrop = elDrop.attr("data-lv");
            console.log({
                lda: lvDrag,
                ldo: lvDrop,
            });
        },
    });
    // handle images category
    function handleImage(act = "upload", ajax = {}) {
        let form = new FormData();
        for (const key in ajax) {
            form.append(key, ajax[key]);
        }
        form.append("act", act);
        return $.ajax({
            type: "post",
            url: route("ajax.handleImage"),
            data: form,
            cache: false,
            processData: false,
            contentType: false,
            dataType: "json",
        });
    }
    $(document).on("click", ".image-category-clear", function () {
        Swal.fire({
            title: "Bạn Chắc Chắn Xoá Chứ?",
            text: "Hình ảnh không thể khôi phục chỉ có thể thêm lại!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Delete",
        }).then((result) => {
            if (result.isConfirmed) {
                const id = $(this).attr("data-id");
                const type = $(this).attr("data-type");
                const ajax = {
                    id: id,
                    type: type,
                };
                $.btn_loading_v2($(this), true);
                handleImage("clear", ajax).then((res) => {
                    const data = res.data;
                    console.log(data);
                    if (data.deleted) {
                        $.resClearImage(
                            $(this).attr("data-target"),
                            data.image
                        );
                    }
                    $.btn_loading_v2($(this), false);
                });
            }
        });
    });
    $(document).on("change", ".image-category-input", function () {
        const id = $(this).attr("data-id");
        const type = $(this).attr("data-type");
        const image = $(this).prop("files")[0];
        const ajax = {
            id: id,
            type: type,
            image: image,
        };
        const target = "#" + $(this).attr("id");
        const btn = $(".image-category-upload[data-target='" + target + "']");
        $.btn_loading_v2(btn, true);
        handleImage("upload", ajax).then((res) => {
            const data = res.data;
            console.log(data);
            if (data.uploaded) {
                $.resUploadImage(target, data.image);
            }
            $.btn_loading_v2(btn, false);
        });
    });
    $(document).on("click", ".image-category-upload", function () {
        Swal.fire({
            title: "Bạn chắc chắn muốn upload ?",
            text: "Hình ảnh cũ sẽ bị xoá đi và thay thế bằng ảnh mới!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Upload",
        }).then((result) => {
            if (result.isConfirmed) {
                const target = $(this).attr("data-target");
                $(target).click();
            }
        });
    });
    // LÀM TIẾP PHẦN NÀY + AJAX + TƯ DUY ĐỔI CLASS KHI OVER LÊN COLLAPSE
    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
