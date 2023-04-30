$(function () {
    /////////////////////////////
    function converToNumber(array = []) {
        if (array.length > 0) {
            let newArr = [];
            for (let index = 0; index < array.length; index++) {
                newArr.push(Number(array[index]));
            }
            array = newArr;
            return array;
        }
        return [];
    }
    var prefix_id_select = "#modal__select--";
    var prefix_id_select_btn = "#modal__select--save-";
    var prefix_save = "#init__add--";
    var enabel_modal = $.getParamsUrl("enable_modal") ? 1 : 0;
    var relaId = $.getParamsUrl("relaId");
    var relaName = $.getParamsUrl("relaName")
        ? $.getParamsUrl("relaName")
        : "block";
    var model = $.getParamsUrl("model") ? $.getParamsUrl("model") : "prd";
    var page = $.getParamsUrl("s_page");
    var selected = $.getParamsUrl("selected")
        ? converToNumber($.getParamsUrl("selected").split(","))
        : [];
    var relaKey = $.getParamsUrl("relaKey");
    var relaModel = $.getParamsUrl("relaModel");
    var option = {};
    console.log(relaKey);
    function resetParams() {
        selected = [];
        $.delParamsUrl("enable_modal");
        $.delParamsUrl("selected");
        $.delParamsUrl("model");
        $.delParamsUrl("relaId");
        $.delParamsUrl("relaName");
        $.delParamsUrl("s_page");
        $.delParamsUrl("relaModel");
        $.delParamsUrl("relaKey");
        return $.replaceNewUrl();
    }

    function setModalParams(
        em = 1,
        _selected = null,
        _model = "prd",
        _relaId = null,
        _relaName = "block",
        _page = page,
        _relaModel = "",
        _relaKey = ""
    ) {
        $.addParamsUrl("enable_modal", em);
        $.addParamsUrl("selected", _selected.toString());
        $.addParamsUrl("model", _model);
        $.addParamsUrl("relaId", _relaId);
        $.addParamsUrl("relaName", _relaName);
        $.addParamsUrl("s_page", _page);
        $.addParamsUrl("relaModel", _relaModel);
        $.addParamsUrl("relaKey", _relaKey);
        return $.replaceNewUrl();
    }

    // function renderSelected(_m = "prd", _selected = selected) {
    //     $.ajax({
    //         type: "post",
    //         url: route("render_selected"),
    //         data: {
    //             model: _m,
    //             selected: _selected,
    //         },
    //         async: false,
    //         dataType: "json",
    //         success: function (data) {
    //             $("#modal__select--tags").html(data.html_tags);
    //         },
    //     });
    // }

    // /////////////////////
    function saveInitAdd(el = null) {
        let string = selected.toString();
        let inpSave = $("button[data-model='" + model + "']").prev();
        inpSave.val(string);
        if (el) {
            el.attr("data-selected", string);
        }
        updateCount();
        toastr.success("Lưu liên kết thành công");
        return string;
    }
    function handle_select(id = null, remove = false) {
        if (!id) {
            return false;
        }
        let index = selected.indexOf(Number(id));

        if (index === -1 && Number(id) !== 0) {
            selected.push(Number(id));
        } else {
            if (remove) {
                selected.splice(index, 1);
            }
        }
        $.addParamsUrl("selected", selected.toString());
        return $.replaceNewUrl();
    }

    jQuery.handle_model_rela = function handle_model_rela(
        m = model,
        rM = relaModel,
        rK = relaKey,
        riD = relaId,
        rName = relaName,
        act = "load",
        _page = 1,
        _option = {},
        callback,
        _selected = selected
    ) {
        var rData = [];
        let search = $("#modal__select--search");
        _option["keyword"] = "";
        if (search) {
            _option["keyword"] = search.val();
        }
        $.ajax({
            type: "post",
            url: route("handle_model_rela"),
            data: {
                model: m,
                act: act,
                relaId: riD,
                selected: _selected.length <= 0 ? null : _selected,
                page: _page,
                relaName: rName,
                relaModel: rM,
                relaKey: rK,
                option: JSON.stringify(_option),
                enabel_modal: enabel_modal,
            },
            async: false,
            dataType: "json",
            beforeSend: function () {
                $(".select__btn--save").addClass("d-none");
                $(".select__btn--loading").removeClass("d-none");
            },
            success: function (data) {
                rData = data;
                const body = $(prefix_id_select + "body");
                const bodyTag = $(prefix_id_select + "tags");
                if (data.error === 0) {
                    setModalParams(
                        true,
                        data.selected,
                        m,
                        riD,
                        rName,
                        _page,
                        rM,
                        rK
                    );
                    body.html(data.html);
                    bodyTag.html(data.html_tags);
                    rData.success = true;
                    if (_option.hasOwnProperty("openModal")) {
                        $("#modal__select").modal("show");
                    }
                    if (act == "save") {
                        $.vaSwal("Lưu thành công", "", "success");
                    }
                    callback;
                } else {
                    $.vaSwal("Lỗi", data.html, "error");
                    rData.success = false;
                }
                setTimeout(() => {
                    $(".select__btn--save").removeClass("d-none");
                    $(".select__btn--loading").addClass("d-none");
                }, 1000);
            },
        });
        if (rData.success) {
            relaId = $.getParamsUrl("relaId");
            relaName = $.getParamsUrl("relaName")
                ? $.getParamsUrl("relaName")
                : "block";
            relaKey = $.getParamsUrl("relaKey");
            modelRela = $.getParamsUrl("modelRela");
            model = $.getParamsUrl("model")
                ? $.getParamsUrl("model")
                : "products";
            page = $.getParamsUrl("s_page");
            selected = $.getParamsUrl("selected")
                ? converToNumber($.getParamsUrl("selected").split(","))
                : [];
            relaKey = $.getParamsUrl("relaKey");
            relaModel = $.getParamsUrl("relaModel");
            updateCount(model);
        }
        return rData;
    };

    if (enabel_modal) {
        $("#modal__select").modal("show");
    }
    $(document).on("click", ".content__block", function () {
        let content = $(this).attr("data-content");
        $("#view__content__block__body").html(content);
        $("#view__content__block").modal("show");
    });
    $(document).on("click", "#select__prd--page .page-link", function (e) {
        e.preventDefault();
        const page = $(this).attr("data-page");
        $.handle_model_rela(
            model,
            relaModel,
            relaKey,
            relaId,
            relaName,
            "page",
            page
        );
    });
    function loading__select(el, load) {
        const loading = $(".init__select__loading");
        if (load) {
            el.addClass("d-none");
            el.next(".init__select__loading").removeClass("d-none");
        } else {
            el.removeClass("d-none");
            el.next(".init__select__loading").addClass("d-none");
        }
    }
    function updateCount(_model = model) {
        let el = $("button[data-model='" + model + "'] span");
        el.text(selected.length + " Item");
    }
    $(document).on("click", ".init__select", function (e) {
        e.preventDefault();
        $("#modal__select--search").val("");
        let relaId = $(this).attr("relaId");
        let relaName = $(this).attr("relaName");
        let relaModel = $(this).attr("relaModel");
        let relaKey = $(this).attr("relaKey");
        let model = $(this).attr("data-model");
        let page = 1;
        let act = "load";
        let selected = [];
        const el = $(this).prev().val();
        if (relaId == 0) {
            act = "loadAdd";
        }
        if (el) {
            selected = converToNumber(el.split(","));
        }
        loading__select($(this), true);
        const data = $.handle_model_rela(
            model,
            relaModel,
            relaKey,
            relaId,
            relaName,
            act,
            page,
            {},
            loading__select($(this), false),
            selected
        );
        if (data.success) {
            $("#modal__select").modal("show");
        }
    });

    $(document).on("click", ".rs__params--select", function () {
        resetParams();
        $("#modal__select").modal("hide");
    });
    $(document).on("click", "#modal__select--save", function () {
        const pid = $(this).attr("pack-id");
        if (pid) {
            const pid = $(this).attr("pack-id");
            const el = $(".pgb-package-" + pid);
            let save = saveInitAdd(el);
            $.updateContentPackage(pid, save);
        } else {
            saveInitAdd();
        }
        resetParams();
        $("#modal__select").modal("hide");
        // if (relaId == 0) {
        //     saveInitAdd();
        // } else {
        //     handle_model_rela(
        //         model,
        //         relaModel,
        //         relaKey,
        //         relaId,
        //         relaName,
        //         "save",
        //         page
        //     );
        // }
    });
    $(document).on("click", ".select__prd--check", function () {
        let id = $(this).val();
        if ($(this).is(":checked")) {
            handle_select(id);
        } else {
            handle_select(id, true);
        }
        $.handle_model_rela(
            model,
            relaModel,
            relaKey,
            relaId,
            relaName,
            "check",
            page
        );
    });
    $(document).on(
        "keyup",
        "#modal__select--search",
        _.debounce(function (e) {
            $.handle_model_rela(
                model,
                relaModel,
                relaKey,
                relaId,
                relaName,
                "search",
                page
            );
        }, 300)
    );
    $(document).on("click", ".modal__select--tag-item", function () {
        let id = $(this).attr("data-id");
        handle_select(id, true);
        $.handle_model_rela(
            model,
            relaModel,
            relaKey,
            relaId,
            relaName,
            "renderSelected",
            page
        );
    });
    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
