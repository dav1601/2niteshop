$(function () {
    // ANCHOR data //////////////////////////////////////////////////////
    var originalData = {
        config: {
            noImage:
                "https://res.cloudinary.com/vanh-tech/image/upload/v1684567283/logo/blank-image_tgsc4d.svg",
        },
        currentPage: 1,
        maxPage: 0,
        activeMedia: 0,
        collections: [],
        tempFiles: [],
        loadingMedia: true,
        mediaSelected: [],
        turnUpload: 0,
    };
    var initData = Object.assign({}, originalData);
    var popup = $("#a-media-popup");
    var popupCollect = $("#a-media-popup-collect");
    var popupModel = $("#a-media-popup-model");
    var modal = $("#a-media-modal");
    var setMedia = $("#a-media-set");
    var previewFiles = $("#a-media-popup-files");
    var popupImage = $("#modal-popup-image");
    var outputMedia = $("#a-media-files");
    var fModel = $("#filter-media-model");
    var fCollection = $("#filter-media-collection");
    var fDate = $("#filter-media-date");
    var fSearch = $("#filter-media-search");
    var fItemsPage = $("#filter-media-items-page");
    var selectedFiles = $("#a-media-selected-files");
    var elMediaSeleted = $("#a-media-selected");
    var detailMedia = $("#a-media-media-r");
    var selectMultiple = $("#a-media-mode");
    function initMedia() {
        initDragDropFiles();
    }
    initMedia();
    // ANCHOR reset media //////////////////////////////////////////////////////
    function resetFilter() {
        fModel.val("all");
        fCollection.val("all");
        fDate.val("all");
        fSearch.val("");
    }
    function resetUpload() {
        $("#a-media-upload-file-input").val("");
        popupCollect.val("");
        popupModel.val("");
        previewFiles.html("");
        return;
    }
    // ANCHOR collections media //////////////////////////////////////////////////////
    function loadCollections() {
        $("#a-media-detail-collection").autocomplete({
            source: initData.collections,
        });
        $("#a-media-popup-collect").autocomplete({
            source: initData.collections,
        });
        const currentCollect = fCollection.val();
        const currentDate = fDate.val();
        let hcollections = "";
        let hDate = "";
        hcollections += `<option ${
            currentCollect === "all" ? "selected" : ""
        } value="all">All Collection</option>`;
        hDate += `<option value="all">All Date</option>`;
        $.each(initData.collections, function (id, collect) {
            hcollections += `<option ${
                currentCollect === collect ? "selected" : ""
            } value="${collect}">${collect}</option>`;
        });
        fCollection.html(hcollections);
        fCollection.val(currentCollect);
    }

    function updateCollection(collect = null) {
        if (collect) {
            if (!initData.collections.includes(collect)) {
                initData.collections.push(collect);
                fCollection.append(
                    `<option value="${collect}">${collect}</option>`
                );
            }
        }
        return;
    }

    // ANCHOR Modal media//////////////////////////////////////////////////////
    $(document).on("click", ".initAvMedia", function () {
        const target = $(this).attr("data-target");
        if (!target) {
            return;
        }
        setMedia.attr("data-target", target);
        modal.modal("show");
    });

    function resetAll() {
        resetFilter();
        resetUpload();
        outputMedia.html("");
        detailMedia.html("");
        $("#a-media-out-of").text("");
        initData = Object.assign({}, originalData);
    }
    modal.on("hide.bs.modal", (e) => {
        resetAll();
    });

    modal.on("shown.bs.modal", function (event) {
        resetAll();
        loadMedia({ openModal: true, nSke: 50 });
    });
    popup.on("hide.bs.modal", function (event) {
        resetUpload();
    });
    ////////////////////////////////
    $(document).on("click", "#modal-popup-image-close", function () {
        popupImage.modal("hide");
    });
    $(document).on("click", ".a-media-view-image", function () {
        $("#modal-popup-image-op").attr("src", $(this).attr("data-src"));
        $("#modal-popup-image").modal("show");
    });
    // ANCHOR scroller media //////////////////////////////////////////////////////
    const scroller = document.getElementById("a-media");
    scroller.addEventListener("scroll", (event) => {
        if (
            scroller.offsetHeight + scroller.scrollTop >=
            scroller.scrollHeight
        ) {
            if (!initData.loadingMedia) {
                initData.currentPage++;
                if (initData.currentPage <= initData.maxPage) {
                    loadMedia();
                }
            }
        }
    });
    // //////////////////////////////////////////////////////////////////////////

    // ANCHOR upload media //////////////////////////////////////////////////////
    $(document).on("change", "#a-media-upload-file-input", function () {
        const files = $(this).prop("files");
        showPopup(files);
    });
    function updateProgress(index, percent) {
        percent = parseInt(percent);
        let bar = $("#a-media-item-pb-" + index);
        bar.attr("aria-valuenow", percent);
        bar.css("width", percent + "%");
        bar.text(percent + "%");
    }
    function callUpload(model = null, collect = null) {
        initData.turnUpload++;
        const files = initData.tempFiles;
        popup.modal("hide");
        activeTabMedia();
        for (let index = 0; index < files.length; index++) {
            const file = files[index];
            const id = "" + initData.turnUpload + index;
            upload(file, id, model, collect);
        }
    }
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
                        updateProgress(
                            index,
                            Math.round(percentComplete * 100)
                        );
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
                console.log("🚀 ~ file: a_media.js:194 ~ upload ~ data:", data);
                updateCollection(collect);
                $("#a-media-item-progress-" + index).remove();
                output.prepend(data.component);
                const select = pushSelected(
                    data.media.id,
                    data.media.uuid,
                    data.path
                );
                console.log(
                    "🚀 ~ file: a_media.js:202 ~ upload ~ select:",
                    select
                );
                handleActive(data.media.id, "active", select);
            },
            error: function (err) {
                console.log("🚀 ~ file: a_media.js:223 ~ upload ~ err:", err);

                $("#a-media-item-progress-" + index).remove();
            },
        });
    }

    function activeTabMedia() {
        const media = $("#a-media-media-tab");
        media.tab("show");
    }
    $(document).on("click", ".drag-file-area", function () {
        $("#a-media-upload-file-input").click();
    });

    ////////////////////////////////////////////////////////////////
    function initDragDropFiles() {
        var isAdvancedUpload = (function () {
            var div = document.createElement("div");
            return (
                ("draggable" in div ||
                    ("ondragstart" in div && "ondrop" in div)) &&
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
                const files = e.dataTransfer.files;
                for (let index = 0; index < files.length; index++) {
                    const file = files[index];
                    initData.tempFiles.push(file);
                }
                showPopup(files);
            });
        }
    }
    ////////////////////////////////
    $(document).on("click", "#a-media-popup-upload", function () {
        const model = popupModel.val();
        const collection = popupCollect.val();
        callUpload(model, collection);
    });
    $(document).on("click", ".remove-file-icon", function () {
        const id = $(this).attr("data-index");
        initData.tempFiles.splice(id, 1);
        $("#file-block-" + id).remove();
        console.log(initData.tempFiles);
        if (initData.tempFiles.length <= 0) {
            popup.modal("hide");
        }
    });
    // ANCHOR handle media //////////////////////////////////////////////////////
    function handleAMedia(act = "load", params = {}, beforSend) {
        let formData = new FormData();
        formData.append("act", act);
        for (const key in params) {
            formData.append(key, params[key]);
        }
        formData.append("page", initData.currentPage);
        formData.append("selected", JSON.stringify(initData.mediaSelected));
        formData.append("activeMedia", initData.activeMedia);
        return $.ajax({
            url: route("a-media.load"),
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            beforeSend: beforSend,
        });
    }
    function showPopup(files) {
        initData.tempFiles = [];
        for (let index = 0; index < files.length; index++) {
            const file = files[index];
            initData.tempFiles.push(file);
            previewFiles.prepend(
                renderPreviewFile(file, initData.tempFiles.length - 1)
            );
        }
        loadCollections();
        popup.modal("show");
    }
    //
    // ANCHOR set media //////////////////////////////////////////////////////
    $(document).on("click", ".avMediaClear", function () {
        const target = $(this).attr("data-target");
        if (!target) {
            return;
        }
        const input = $(target);
        const img = $(`img[data-target='${target}']`);
        if (img) {
            img.attr("src", initData.config.noImage);
        }
        if (input) {
            input.val("");
            input.trigger("change");
        }
        $(this).addClass("d-none");
    });
    $(document).on("click", "#a-media-set", function () {
        if (initData.mediaSelected.length <= 0) {
            return alert("bạn chưa có hình ảnh nào để thiết lập");
        }
        const target = setMedia.attr("data-target");
        const id = target.substring(1);
        const input = $(target);
        console.log("🚀 ~ file: a_media.js:340 ~ input:", input);
        const img = $(`img[data-target='${target}']`);
        console.log("🚀 ~ file: a_media.js:343 ~ img:", img);
        const listId = _.pluck(initData.mediaSelected, "id");
        console.log("🚀 ~ file: a_media.js:344 ~ listId:", listId);
        if (img) {
            img.attr("src", initData.mediaSelected[0].src);
        }
        if (input) {
            input.val(listId.toString());
            input.trigger("change");
        }
        $("#clear-" + id).removeClass("d-none");
        modal.modal("hide");
    });

    // ANCHOR load media //////////////////////////////////////////////////////
    function loadMedia(params = {}) {
        removeSkeleton();
        const model = fModel.val();
        const collection = fCollection.val();
        const search = fSearch.val();
        const itemsPage = fItemsPage.val();
        params["page"] = initData.currentPage;
        params["model"] = model;
        params["collection"] = collection;
        params["search"] = search;
        params["itemsPage"] = itemsPage;
        const numberSkeleton = params.hasOwnProperty("nSke")
            ? params["nSke"]
            : 20;
        const beforeSend = () => {
            initData.loadingMedia = true;
            if (params.hasOwnProperty("filter")) {
                outputMedia.html(renderSkeleton(numberSkeleton));
            } else {
                outputMedia.append(renderSkeleton(numberSkeleton));
            }
        };
        handleAMedia("load", params, beforeSend)
            .then((res) => {
                const data = res.data;
                initData.maxPage = data.number_page;
                initData.collections = data.collections;
                if (params.hasOwnProperty("openModal")) {
                    loadCollections();
                }

                if (params.hasOwnProperty("filter")) {
                    outputMedia.html(data.media);
                } else {
                    removeSkeleton();
                    outputMedia.append(data.media);
                }

                $("#a-media-out-of")
                    .addClass("d-block")
                    .text(`Show ${data.count} out of ${data.all}`);
                initData.loadingMedia = false;
            })
            .catch((res) => {
                initData.loadingMedia = false;
            });
    }
    // ANCHOR fillter media //////////////////////////////////////////////////////////////////
    function filterMedia() {
        initData.currentPage = 1;
        loadMedia({ filter: true, nSke: fItemsPage.val() });
    }
    fModel.on("change", () => {
        filterMedia();
    });
    fItemsPage.on("change", () => {
        filterMedia();
    });
    fCollection.on("change", () => {
        filterMedia();
    });
    fSearch.on(
        "keyup",
        _.debounce(() => {
            filterMedia();
        }, 300)
    );

    // ANCHOR delete media //////////////////////////////////
    $(document).on("click", "#a-media-detail-delete", function () {
        let text = "Bạn có chắc chắn muốn xoá ảnh này?";
        if (confirm(text) == true) {
            const uuid = $(this).attr("uuid");
            let media = $(`.image-checkbox[uuid=${uuid}]`);
            const id = media.attr("data-id");
            let formData = new FormData();
            formData.append("uuid", uuid);
            $.ajax({
                url: route("a-media.delete", { uuid: uuid }),
                type: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
            }).then((res) => {
                detailMedia.html("");
                removeSelected(id);
                media.closest(".a-media-item").remove();
            });
        }
    });

    // ANCHOR replace media //////////////////////////////////////////////////////
    $(document).on("click", "#a-media-detail-replace-btn", function () {
        let text = "Bạn có chắc chắn muốn thay ảnh này ?";
        if (confirm(text) == true) {
            $("#a-media-detail-replace-input").click();
        }
    });
    $(document).on("change", "#a-media-detail-replace-input", function () {
        let file = $(this).prop("files")[0];
        const uuid = $(this).attr("uuid");
        let attachImg = $(".attach-detail-img");
        let media = $(`.image-checkbox[uuid=${uuid}]`);
        console.log(attachImg, media, file);

        let formData = new FormData();
        let imgDetail = attachImg.find("img");
        let imgMedia = media.find("img");
        formData.append("file", file);
        $.ajax({
            url: route("a-media.replace", { uuid: uuid }),
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
                        console.log(percentComplete);
                        $(".detail-media-pb-replace").css(
                            "width",
                            percentComplete * 100 + "%"
                        );
                        $(".detail-media-pb-replace").text(
                            percentComplete * 100 + "%"
                        );
                    },
                    false
                );

                return jqXHR;
            },
            beforeSend: function () {
                let html = `<div class="progress mx-2 w-100">
                <div class="progress-bar detail-media-pb-replace" role="progressbar"  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
              </div>`;

                imgDetail.addClass("d-none");
                imgMedia.addClass("d-none");
                attachImg.append(html);
                media.append(html);
            },
            success: function (res) {
                const data = res.data;
                $(this).val("");
                imgDetail.attr("src", data.full_path);
                imgMedia.attr("src", data.full_path);
                $(".detail-media-pb-replace").closest(".progress").remove();
                imgDetail.removeClass("d-none");
                imgMedia.removeClass("d-none");
            },
            error: function (err) {
                $(this).val("");
                $(".detail-media-pb-replace").closest(".progress").remove();
                imgDetail.removeClass("d-none");
                imgMedia.removeClass("d-none");
            },
        });
    });

    // ANCHOR detail media //////////////////////////////////////////////////////
    $(document).on("submit", "#a-media-form-detail", function () {
        $(this).ajaxSubmit({
            beforeSend: function () {
                $.btn_loading_v2($("#a-media-form-detail"), true, true);
            },
            success: function (res) {
                const data = res.data;
                if (data.updated) {
                    updateCollection(data.collect);
                    toastr.success("updated media");
                }
                $.btn_loading_v2($("#a-media-form-detail"), false, true);
            },
            error: function (res) {
                $.btn_loading_v2($("#a-media-form-detail"), false, true);
            },
        });
        return false;
    });
    //
    function loadDetail() {
        detailMedia.html($.ioLoading());
        handleAMedia("detail", { uuid: initData.activeMedia }).then((res) => {
            const data = res.data;
            detailMedia.html(data.detail);
            loadCollections();
        });
    }
    //
    $(document).on("click", "#a-media-detail-download", function () {
        const btn = $(this);
        $.btn_loading_v2(btn, true, false);
        let data = new FormData();
        data.append("uuid", $(this).attr("uuid"));
        $.ajax({
            type: "post",
            url: route("a-media.download"),
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            // defining the response as a binary file
            xhrFields: { responseType: "blob" },
            success: function (res) {
                var a = document.createElement("a");
                document.body.appendChild(a);
                a.style = "display: none";
                var url = window.URL.createObjectURL(res);
                a.href = url;
                a.download = btn.attr("file-name");
                a.click();
                window.URL.revokeObjectURL(url);
                $.btn_loading_v2(btn, false, false);
            },
        });
    });
    //
    $(document).on("click", "#a-media-detail-copy", function () {
        const text = $("#a-media-detail-fp").val();
        console.log(text);
        $.copyToClipboard(text);
    });
    // ANCHOR selected media //////////////////////////////////////////////////////
    function getSelected(id) {
        const index = initData.mediaSelected.findIndex((el) => {
            return el.id == id;
        });
        const data = index !== -1 ? initData.mediaSelected[index] : {};
        return data;
    }
    function removeSelected(id) {
        const index = initData.mediaSelected.findIndex((el) => {
            return el.id == id;
        });
        if (index !== -1) {
            const data = initData.mediaSelected[index];
            initData.mediaSelected.splice(index, 1);
            console.log(
                "🚀 ~ file: a_media.js:567 ~ removeSelected ~ initData.mediaSelected:",
                initData.mediaSelected
            );
            if (data.uuid === initData.activeMedia) {
                handleActive(id, "unactive", data);
            } else {
                $("#image-checkbox-" + id).removeClass(
                    "image-checkbox-checked"
                );
                handleSelected("remove", data);
            }
            return true;
        }
        return false;
    }
    ////////////////////////////////
    function clearSelected() {
        initData.mediaSelected = [];
        console.log(
            "🚀 ~ file: a_media.js:579 ~ clearSelected ~ initData.mediaSelected:",
            initData.mediaSelected
        );
        $(".image-checkbox").removeClass("image-checkbox-checked active");
        detailMedia.html("");
        selectedFiles.html("");
        elMediaSeleted.find("strong").text("");
        elMediaSeleted.addClass("d-none");
    }
    // //////////////////////////////////////////////////////////////////
    $(".image-checkbox").each(function () {
        if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
            $(this).addClass("image-checkbox-checked");
        } else {
            $(this).removeClass("image-checkbox-checked");
        }
    });
    ////////////////////////////////
    $("#a-media-selected-clear").on("click", (e) => {
        clearSelected();
    });
    $(document).on("click", ".image-selected", function () {
        const id = $(this).attr("data-id");
        const data = getSelected(id);
        if (data.uuid !== initData.activeMedia) {
            handleActive(id, "active", data);
        }
        console.log("🚀 ~ file: a_media.js:618 ~ data:", data);
    });
    ////////////////////////////////
    function handleActive(id, act = "active", data = {}) {
        let elActive = $("#image-checkbox-" + id);
        let checkBox = elActive.find('input[type="checkbox"]');
        let elSelected = $("#image-selected-" + id);
        switch (act) {
            case "active":
                initData.activeMedia = data.uuid;
                loadDetail(id);
                $(".image-checkbox").removeClass("active");
                $(".image-selected").removeClass("active");
                if (!elActive.hasClass("image-checkbox-checked")) {
                    elActive.addClass("image-checkbox-checked");
                }
                elActive.addClass("active");
                elSelected.addClass("active");
                checkBox.prop("checked", true);
                elSelected.addClass("active");
                break;
            case "unactive":
                initData.activeMedia = 0;
                $(elActive).removeClass("image-checkbox-checked active");
                checkBox.prop("checked", false);
                handleSelected("remove", data);
                detailMedia.html("");
                break;
            default:
                break;
        }

        return true;
    }
    // //////////////////////////////////////////////////////////////////////////
    function handleSelected(act = "append", select) {
        const nSelected = initData.mediaSelected.length;
        if (nSelected <= 0) {
            elMediaSeleted.addClass("d-none");
        } else {
            elMediaSeleted.find("strong").text(nSelected + " item selected");
            elMediaSeleted.removeClass("d-none");
        }
        switch (act) {
            case "remove":
                const el = $("#image-selected-" + select.id);
                el.remove();
                break;
            case "append":
                selectedFiles.append(`<div class="image-selected position-relative mx-1 mb-1 cursor-pointer"
                id="image-selected-${select.id}" data-id="${select.id}">
                <i
                    class="fa-solid fa-circle-xmark a-media-selected-remove position-absolute"></i>
                <img src="${select.src}"
                    class="img-responsive" alt="alt">
            </div>`);
                break;
            default:
                break;
        }
        return;
    }
    // //////////////////////////////////////////////////////////////////
    $(document).on("click", ".a-media-selected-remove", function () {
        const id = $(this).closest(".image-selected").attr("data-id");
        removeSelected(id);
        console.log("🚀 ~ file: a_media.js:667 ~ id:", id);
    });
    // ///////////////////////////////////////////////////////////////////
    function pushSelected(id = null, uuid = null, src = null) {
        // ANCHOR push selected //////////////////////////////////////////////////////
        const data = {
            id: id,
            uuid: uuid,
            src: src,
        };
        const indexSelect = initData.mediaSelected.findIndex((el) => {
            return el.id == id;
        });
        if (indexSelect === -1) {
            initData.mediaSelected.push(data);
            handleSelected("append", data);
        }
        return data;
    }
    // //////////////////////////////////////////////////////////////////////////
    $(document).on("click", ".image-checkbox", function (e) {
        let $checkbox = $(this).find('input[type="checkbox"]');
        const active = $(this).hasClass("active");
        const checked = $checkbox.prop("checked");
        const count = $(".image-checkbox-checked").length;
        const id = $(this).attr("data-id");
        const multiple = selectMultiple.prop("checked");
        if (!multiple) {
            clearSelected();
        }
        const data = pushSelected(
            id,
            $(this).attr("uuid"),
            $(this).find("img").attr("src")
        );
        if (!multiple) {
            if (active) {
                clearSelected();
            } else {
                handleActive(id, "active", data);
            }
        } else {
            if (count === 0) {
                handleActive(id, "active", data);
            } else {
                if (checked) {
                    if (active) {
                        removeSelected(id);
                    } else {
                        handleActive(id, "active", data);
                    }
                } else {
                    $(this).addClass("image-checkbox-checked");
                    $checkbox.prop("checked", true);
                }
            }
        }

        e.preventDefault();
    });

    // ANCHOR render html //////////////////////////////////////////////////////
    function renderMediaItem(index) {
        return `<div class="a-media-item" id="a-media-item-progress-${index}">
    <div class="h-100 w-100 flex-center a-media-progress">
        <span class="br-loader"> </span>
        <span class="br-loader"> </span>
        <span class="br-loader"> </span>
        <span class="br-loader"> </span>
        <div class="progress w-100 mx-2">
            <div class="progress-bar" id="a-media-item-pb-${index}" role="progressbar" style="width:0"
                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%
            </div>
        </div>
    </div>

</div>`;
    }
    function renderSkeleton(numbers = 20) {
        let skeleton = "";
        for (let i = 1; i <= numbers; i++) {
            skeleton += ` <div class="a-media-item cursor-pointer a-media-skeleton">
           <div class="w-100 h-100 a-skeleton">

           </div>
       </div>`;
        }
        return skeleton;
    }
    function removeSkeleton() {
        $(".a-media-skeleton").remove();
        return true;
    }
    function renderPreviewFile(file, index) {
        return `<div class="file-block" id="file-block-${index}">
        <div class="file-info"> <span class="material-icons-outlined file-icon">description</span> <span class="file-name text-break">${
            file.name
        }</span> | <span class="file-size">${(file.size / 1024).toFixed(1)} KB</span> </div>
        <span class="material-icons remove-file-icon" data-index="${index}">delete</span>
    </div>`;
    }
    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
