$(function () {
    var page = 1;
    var stackUpload = [];
    var collections = [];
    var detailMedia = $("#a-media-media-r");
    $("#a-media-modal").modal("show");

    $(document).on("click", ".a-media-view-image", function () {
        $("#modal-popup-image-op").attr("src", $(this).attr("data-src"));
        $("#modal-popup-image").modal("show");
    });
    function upload(file, index, model, collect) {
        const output = $("#a-media-files");
        let formData = new FormData();
        formData.append("file", file);
        formData.append("model", model);
        formData.append("collection", collect);
        $.ajax({
            url: route("a-media.upload"),
            type: "POST",
            contentType: false,
            cache: false,
            processData: false,
            data: formData,
            xhr: function () {
                var jqXHR = null;
                if (window.ActiveXObject) {
                    jqXHR = new window.ActiveXObject("Microsoft.XMLHTTP");
                } else {
                    jqXHR = new window.XMLHttpRequest();
                }
                //Upload progress
                jqXHR.upload.addEventListener(
                    "progress",
                    function (evt) {
                        let percentComplete = evt.loaded / evt.total;
                        updateProgress(index, percentComplete * 100);
                    },
                    false
                );

                return jqXHR;
            },
            beforeSend: function () {
                output.prepend(renderMediaItem(index));
            },
            success: function (res) {
                const data = res.data;
                $("#testUpload").val("");
                stackUpload.splice(index, 1);
                $("#a-media-item-" + index).remove();
                output.prepend(data.component);
            },
            error: function (err) {
                $("#testUpload").val("");
                stackUpload.splice(index, 1);
                $("#a-media-item-" + index).remove();
            },
        });
    }
    function handleAMedia(act = "load", params = {}) {
        console.log(params);
        let formData = new FormData();
        formData.append("act", act);
        for (const key in params) {
            formData.append(key, params[key]);
        }
        // console.log(formData);
        return $.ajax({
            url: route("a-media.load"),
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
        });
    }
    function callUpload(files, model = null, collect = null) {
        activeTabMedia();
        for (let index = 0; index < files.length; index++) {
            let file = files[index];
            stackUpload.unshift(file);
            upload(file, stackUpload.length - 1, model, collect);
        }
        $("#a-media-upload-file-input").val("");
    }
    $(document).on("change", "#a-media-upload-file-input", function () {
        const files = $(this).prop("files");
        callUpload(files);
    });
    ////////////////////////////////
    $("#a-media-form-detail").ajaxForm({
        beforeSend: function () {
            $.btn_loading_v2($("#a-media-form-detail"), true, true);
        },
        success: function (res) {
            const data = res.data;
            console.log(data);
            $.btn_loading_v2($("#a-media-form-detail"), false, true);
        },
        error: function (res) {
            const data = res.responseJSON.data;
            console.log(data);
            $.btn_loading_v2($("#a-media-form-detail"), false, true);
        },
    });
    // //////////////////////////////////////////////////////////////////
    function renderMediaItem(index) {
        return `<div class="a-media-item" id="a-media-item-${index}">
        <div class="progress w-100 mx-2">
            <div class="progress-bar" id="a-media-item-pb-${index}" role="progressbar" style="width:0" aria-valuenow="0"
                aria-valuemin="0" aria-valuemax="100">0%</div>
        </div>
    </div>`;
    }
    function renderImage(id, path) {
        return `
        <label class="image-checkbox">
            <img class="img-responsive w-100 h-100" src="${path}" />
            <input type="checkbox" name="a-media-images[]" class="a-media-image-checkbox" value="${id}" />
            <i class="fa fa-check d-none"></i>
        </label>
    `;
    }
    function updateProgress(index, percent) {
        percent = parseInt(percent);
        let bar = $("#a-media-item-pb-" + index);
        bar.attr("aria-valuenow", percent);
        bar.css("width", percent + "%");
        bar.text(percent + "%");
    }
    $(".image-checkbox").each(function () {
        if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
            $(this).addClass("image-checkbox-checked");
        } else {
            $(this).removeClass("image-checkbox-checked");
        }
    });

    // sync the state to the input
    function selected() {
        let array = [];
        let els = $(".a-media-image-checkbox");
        $.each(els, function (indexInArray, el) {
            if ($(el).is(":checked")) {
                array.push(parseInt($(el).attr("value")));
            }
        });
        return array;
    }
    function loadDetail(id) {
        detailMedia.html($.ioLoading());
        handleAMedia("detail", { id: id }).then((res) => {
            const data = res.data;
            detailMedia.html(data.detail);
        });
    }
    function handleActive(id, act = "active") {
        let elActive = $("#image-checkbox-" + id);
        let checkBox = elActive.find('input[type="checkbox"]');
        switch (act) {
            case "active":
                $(".image-checkbox").removeClass("active");
                if (!elActive.hasClass("image-checkbox-checked")) {
                    elActive.addClass("image-checkbox-checked");
                }
                elActive.addClass("active");
                checkBox.prop("checked", true);
                loadDetail(id);
                break;
            case "unactive":
                $(elActive).removeClass("image-checkbox-checked");
                $(elActive).removeClass("active");
                checkBox.prop("checked", false);
                detailMedia.html("");
                break;
            default:
                break;
        }
        return true;
    }

    $(document).on("click", ".image-checkbox", function (e) {
        let $checkbox = $(this).find('input[type="checkbox"]');
        const active = $(this).hasClass("active");
        const checked = $checkbox.prop("checked");
        const count = $(".image-checkbox-checked").length;
        const id = $(this).attr("data-id");
        console.log(id);
        if (count === 0) {
            handleActive(id);
        }
        if (checked) {
            if (active) {
                handleActive(id, "unactive");
            } else {
                handleActive(id);
            }
        } else {
            $(this).addClass("image-checkbox-checked");
            $checkbox.prop("checked", true);
        }
        e.preventDefault();
    });

    function activeTabMedia() {
        const media = $("#a-media-media-tab");
        media.tab("show");
    }
    $(document).on("click", ".drag-file-area", function () {
        $("#a-media-upload-file-input").click();
    });

    ////////////////////////////////////////////////////////////////
    var isAdvancedUpload = (function () {
        var div = document.createElement("div");
        return (
            ("draggable" in div || ("ondragstart" in div && "ondrop" in div)) &&
            "FormData" in window &&
            "FileReader" in window
        );
    })();

    let draggableFileArea = document.querySelector(".drag-file-area");

    if (isAdvancedUpload) {
        [
            "drag",
            "dragstart",
            "dragend",
            "dragover",
            "dragenter",
            "dragleave",
            "drop",
        ].forEach((evt) =>
            draggableFileArea.addEventListener(evt, (e) => {
                e.preventDefault();
                e.stopPropagation();
            })
        );
        ["dragleave", "dragend"].forEach((evt) => {
            draggableFileArea.addEventListener(evt, (e) => {
                e.preventDefault();
                e.stopPropagation();
                $(".drag-file-area").css("border-color", "grey");
            });
        });
        ["dragover", "dragenter"].forEach((evt) => {
            draggableFileArea.addEventListener(evt, (e) => {
                e.preventDefault();
                e.stopPropagation();
                $(".drag-file-area").css("border-color", "#7b2cbf");
            });
        });

        draggableFileArea.addEventListener("drop", (e) => {
            $(".drag-file-area").css("border-color", "grey");
            let files = e.dataTransfer.files;
            callUpload(files);
        });
    }
    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
