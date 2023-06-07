$(function () {
    var sections = [];
    var arrColumn = [];
    var arrPackage = [];
    var outputModal = $("#pgb-section-modal-output");
    var modal = $("#pgb-section-modal");
    var routeHandle = route("pgb.handle");
    var routeRender = route("pgb.render.package");
    var typeHandle = $("#pgb-handle").val();
    var isCreate = $("#pgb-handle").val() === "create";
    var modalPreview = $("#pgb-modal-preview");
    var contentPreview = $("#pgb-modal-preview-content");
    var spacingPos = ["t", "b", "l", "r"];
    var breakpoint = ["xs", "sm", "md", "lg", "xl"];
    var imagePackage = [];
    var crsImages = [];
    var galleryYt = [];
    var bannerImages = [];
    var arrayTabs = [];
    var submit = $("#pgb-form-submit");
    var settingDefaults = {
        tabs: {
            active_color: "#0060ac",
        },
        blogs: {
            items: 8,
        },
        video: {
            pf: "def",
        },
        banners: {
            min: 0,
            max: 0,
        },
        gllYt: {
            number_item: 4,
        },
    };
    var propertyStyle = {
        border: {
            short: false,
            unit_border_radius: "px",
            properties: {
                width: {
                    bottom: 0,
                    top: 0,
                    left: 0,
                    right: 0,
                },
                radius: {
                    top_left: 0,
                    top_right: 0,
                    bottom_left: 0,
                    bottom_right: 0,
                },
                style: "none",
                color: "transparent",
            },
        },
        box_shadow: {
            short: true,
            properties: {
                x: 0,
                y: 0,
                blur: 0,
                spread: 0,
                color: "transparent",
            },
        },
    };
    var prePress = 0;
    $(document).keyup(function (e) {
        if (e.keyCode === 192 || e.keyCode === 18) {
            let total = parseInt(prePress + e.keyCode);
            if (total === 210) $("#pgb-handle-btn").click();
        }
        prePress = e.keyCode;
    });

    function loadingModal(loading = true) {
        const btn = $("#pgb-form-submit");
        $.btn_loading_v2(btn, loading);
    }
    // var width = window.innerWidth > 0 ? window.innerWidth : screen.width;
    function getChecked(selector = "") {
        let checked = [];
        $.each($("." + selector + ":checkbox:checked"), function (index, el) {
            checked.push($(el).val());
        });
        return checked;
    }
    $(document).on("change", "input[type='number']", function () {
        const val = Number($(this).val());
        const min = Number($(this).attr("min"));
        const max = Number($(this).attr("max"));
        if (min || max) {
            if (val < min) {
                $(this).val(min);
                return alert("Tối thiểu; " + min);
            }
            if (val > max) {
                $(this).val(max);
                return alert("Tối đa: " + max);
            }
        }
        $(this).val(val);
    });

    if (!isCreate) {
        $.page_loading(true);
        let handlePage = page;
        iddb = page.id;
        if (handlePage.data && handlePage.data.length > 0) {
            for (let index = 0; index < handlePage.data.length; index++) {
                let section = handlePage.data[index];
                for (let j = 0; j < section.column.length; j++) {
                    let col = section.column[j];
                    if (col.package) {
                        for (let k = 0; k < col.package.length; k++) {
                            let package = col.package[k];
                            arrPackage.push(package);
                        }
                    }
                    const { package, ...newCol } = col;
                    arrColumn.push(newCol);
                }
                const { column, ...newSection } = section;
                sections.push(newSection);
            }
        }
        let dataAjax = {
            type: "load-page",
            payload: JSON.stringify(page.data),
        };
        ajaxHandle(dataAjax).then((res) => {
            jQuery("#build-sections").html(res.html_section);
            updateHeightBuild();
            initSortable();
            initSortPackage();
            $.page_loading(false);
        });
        console.log({
            act: "afterLoad",
            arrSection: sections,
            arrColumn: arrColumn,
            arrPackage: arrPackage,
            payload: page.data,
        });
    }

    function resetCreate() {
        sections = [];
        arrColumn = [];
        arrPackage = [];
        let data = {
            type: "reset-create",
        };
        ajaxHandle(data).then((res) => {
            $("#create-page-builder").html(res.html_create);
        });
    }
    function uid() {
        return Date.now().toString(36);
    }
    function makeId(type, index) {
        const idPage = page ? page.id : 0;
        return type + "-" + index + "-" + uid() + idPage;
    }

    function removePackage(pid) {
        const index = indexPackById(pid);
        if (index > -1) {
            let package = arrPackage[index];
            arrPackage.splice(index, 1);
            $("#pgb-package-" + pid).remove();
            let packages = getPackageByCid(package.cid);
            console.log({
                action: "after remove package",
                packages: packages,
            });
        }
    }
    function removeSection(sid) {
        console.log({
            action: "before remove section",
            arrSection: sections,
            columns: arrColumn,
            packages: arrPackage,
        });

        const index = indexSectionById(sid);
        if (index > -1) {
            sections.splice(index, 1);
            const columns = getColumnBySid(sid);
            arrColumn = arrColumn.filter((el) => {
                return el.sid != sid;
            });
            if (columns.length > 0) {
                for (let i = 0; i < columns.length; i++) {
                    let col = columns[i];
                    arrPackage = arrPackage.filter((el) => {
                        return el.cid != col.id;
                    });
                }
            }
        }
        console.log({
            action: "after remove section",
            arrSection: sections,
            columns: arrColumn,
            packages: arrPackage,
        });
    }
    function indexSectionById(sid) {
        return sections.findIndex(function (element) {
            return element.id == sid;
        });
    }
    function indexColById(cid) {
        return arrColumn.findIndex(function (element) {
            return element.id == cid;
        });
    }
    function indexPackById(pid) {
        return arrPackage.findIndex(function (element) {
            return element.id == pid;
        });
    }
    function getSectionById(id = null, loadColumn = true) {
        let section = sections.filter(function (element) {
            return element.id == id;
        })[0];
        if (!section) {
            return null;
        }
        if (loadColumn) {
            section["column"] = getColumnBySid(id);
        }
        return section;
    }
    function getColById(id = null) {
        let column = arrColumn.filter(function (element, index) {
            return element.id == id;
        })[0];
        if (!column) {
            return null;
        }
        column["package"] = getPackageByCid(column.id);
        return column;
    }
    function getPackById(id = null) {
        let package = arrPackage.filter(function (element, index) {
            return element.id == id;
        });
        return package[0];
    }
    function getColumnBySid(sid = null) {
        let columns = arrColumn.filter(function (element, index) {
            return element.sid == sid;
        });
        for (let index = 0; index < columns.length; index++) {
            const element = columns[index];
            columns[index]["package"] = [];
            columns[index]["package"].push(getPackageByCid(element.id));
            columns[index]["package"] = columns[index]["package"][0];
        }
        return columns;
    }
    function getPackageByCid(cid = null) {
        let packages = arrPackage.filter(function (element) {
            return element.cid === cid;
        });
        return packages;
    }
    // handle sort
    function initSortPackage() {
        $(".pgb-sort-package").sortable({
            connectWith: ".pgb-sort-connect-package",
            items: ".init-sort-package",
            helper: "clone",
            forceHelperSize: true,
            update: function (event, ui) {
                let packages = $(this).children(".pgb-package");
                let cid = $(this).attr("id");
                let newPackages = [];
                $.each(packages, function (ord, package) {
                    let pid = $(package).attr("pack-id");
                    let item = getPackById(pid);
                    newPackages.push(item);
                });
                arrPackage = newPackages;
                console.log({
                    act: "sort update package",
                    e: event,
                    ui: ui,
                    this: this,
                    packages: getPackageByCid(cid),
                });
            },

            receive: function (event, ui) {
                const parent = $(this);
                const package = $(ui.item[0]);
                const currCid = parent.attr("id");
                const pid = package.attr("pack-id");
                let index = indexPackById(pid);
                if (index > -1) {
                    arrPackage[index].cid = currCid;
                }
                console.log({
                    act: "sort receive package",
                    e: event,
                    ui: ui,
                    this: this,
                    package: arrPackage,
                });
            },
            start: function (event, ui) {
                console.log($(ui.item[0]).height());
            },
        });
    }

    function initSortable() {
        $(".pgb-sort").sortable({
            connectWith: ".pgb-sort-connect",
            items: ".init-sort",
            helper: "clone",
            forceHelperSize: true,
            update: function (event, ui) {
                let arrSection = $(this).children(".pgb-section");
                let newSections = [];
                $.each(arrSection, function (ord, section) {
                    let sid = $(section).attr("data-id");
                    let item = getSectionById(sid, false);
                    newSections.push(item);
                });
                sections = newSections;
                console.log({
                    act: "sort update section",
                    e: event,
                    ui: ui,
                    this: this,
                    sections: sections,
                });
            },
            start: function (event, ui) {},
        });
    }

    // *-load-comps
    async function loadGllYt(btn = null, cb) {
        const pid = $("#edit-package-id").val();
        let dataAjax = {
            type: "load-gllYt-items",
            pid: pid,
            items: galleryYt,
        };
        if (btn) $.btn_loading_v2(btn, true);
        return ajaxComponent(dataAjax)
            .then((res) => {
                cb;
                if (btn) $.btn_loading_v2(btn, false);
            })
            .catch((err) => {
                if (btn) $.btn_loading_v2(btn, true);
            });
    }
    //
    async function loadTabs(btn = null, cb) {
        let dataAjax = {
            type: "load-tabs",
            items: arrayTabs,
        };
        loadingModal(true);
        if (btn) $.btn_loading_v2(btn, true);
        return ajaxComponent(dataAjax, false)
            .then((res) => {
                loadingModal(false);
                if (btn) $.btn_loading_v2(btn, false);
                $(".type-tabs").change();
            })
            .catch((err) => {
                if (btn) $.btn_loading_v2(btn, true);
            });
    }
    //
    async function loadBanners(btn = null, cb) {
        const pid = $("#edit-package-id").val();
        let dataAjax = {
            type: "load-banners-items",
            pid: pid,
            items: bannerImages,
        };
        if (btn) {
            $.btn_loading_v2(btn, true);
        }
        return ajaxComponent(dataAjax)
            .then((res) => {
                cb;
                if (btn) {
                    $.btn_loading_v2(btn, false);
                }
            })
            .catch((err) => {
                if (btn) $.btn_loading_v2(btn, true);
            });
    }
    //
    async function loadCrsImages(btn = null, cb) {
        const pid = $("#edit-package-id").val();
        let dataAjax = {
            type: "load-crsimages-items",
            pid: pid,
            items: crsImages,
        };
        if (btn) {
            $.btn_loading_v2(btn, true);
        }
        return ajaxComponent(dataAjax)
            .then((res) => {
                cb;
                if (btn) {
                    $.btn_loading_v2(btn, false);
                }
            })
            .catch((err) => {
                if (btn) $.btn_loading_v2(btn, true);
            });
    }
    // *-load-comps end
    // *-remove-index
    $(document).on("click", ".p-e-crsimages-remove", function () {
        let index = $(this).attr("data-index");
        crsImages.splice(index, 1);
        $("#p-e-items").text(Number($("#p-e-items").text()) - 1);
        loadCrsImages();
    });
    $(document).on("click", ".p-e-gllYt-remove", function () {
        let index = $(this).attr("data-index");
        galleryYt.splice(index, 1);
        loadGllYt();
    });
    $(document).on("click", ".pack-edit-tab-component-remove", function () {
        let index = $(this).attr("data-index");
        arrayTabs.splice(index, 1);
        loadTabs(submit);
    });
    $(document).on("click", ".p-e-banners-remove", async function () {
        let index = $(this).attr("data-index");
        bannerImages.splice(index, 1);
        loadBanners().then((res) => {
            let min = $("#pack-edit-banners-min");
            let max = $("#pack-edit-banners-max");
            let vm = Number(min.val());
            let vmx = Number(max.val());
            if (vm > 0) {
                min.val(Number(vm - 1));
            }
            if (vmx > 0) {
                max.val(Number(vmx - 1));
            }
            min.attr("max", vmx - 1);
            max.attr("max", vmx - 1);
        });
    });
    // *remove-index end
    // end sort
    function updateHeightBuild() {
        const currentHeigt = $("#build-sections").height();
        $("#build-sections").css("min-height", currentHeigt + 200);
    }
    function ajaxHandle(data) {
        return $.ajax({
            type: "post",
            url: routeHandle,
            data: data,
            dataType: "json",

            success: function (res) {
                console.log({
                    t: "ajaxHandle",
                    res: res,
                });
                switch (data.type) {
                    case "add-section":
                        jQuery("#build-sections").append(res.html_section);
                        updateHeightBuild();
                        break;
                    case "add-package":
                        $("#" + data.package.cid).append(res.html_package);
                        break;
                    case "change-layout":
                        $("#pgb-section-" + data.section.id)
                            .children(".pgb-section-body")
                            .html(res.html_section);
                        break;
                    case "preview":
                        contentPreview.html(res.html_preview);
                        modalPreview.modal("show");
                        break;

                    default:
                        break;
                }
                initSortable();
                initSortPackage();
            },
        });
    }
    function ajaxRenderModalPackage(data, options = { minWidth: "auto" }) {
        console.log({
            dataAjaxRenderModal: data,
        });
        $("#pgb-section-modal").find(".modal-dialog").css("min-width", "70%");
        return $.ajax({
            type: "post",
            url: routeRender,
            data: data,
            dataType: "json",
            success: function (res) {
                outputModal.html(res.html);
                $(".lfm-upload-input").change();
                $.initColorPicker();
                $.create_editor("pgb-package-edit-tiny");
                modal.modal("show");
            },
        });
    }
    // *aj-pack-component
    function ajaxComponent(dataAjax = {}, loading = false) {
        if (loading) {
            loadingModal(true);
        }
        return $.ajax({
            type: "post",
            url: route("pgb.render.package.component"),
            data: dataAjax,
            dataType: "json",
            success: function (res) {
                switch (dataAjax.type) {
                    case "load-crsimages-items":
                        $("#pack-edit-crs-image-items").html(res.html);
                        $("#p-e-items").text(crsImages.length);
                        break;
                    case "load-banners-items":
                        $("#pack-edit-banners-items").html(res.html);
                        break;
                    case "load-gllYt-items":
                        $("#pack-edit-gll-yt").html(res.html);
                        break;
                    case "load-tabs":
                        $("#pack-edit-tabs-output").html(res.html);
                        break;

                    default:
                        break;
                }
                $(".lfm-upload-input").change();
                $.initColorPicker();
                if (loading) {
                    loadingModal(false);
                }
            },
        });
    }
    //
    $(document).on("change", ".type-tabs", function () {
        const type = $(this).val();
        const id = $(this).attr("data-index");
        const output = $("#type-tabs-output-" + id);
        const tab = arrayTabs[id];
        if (type === "none") {
            return output.html("");
        }
        let dataAjax = {
            type: type,
            value: tab ? tab.value : 0,
            payload: {
                id: id,
            },
        };

        ajaxComponent(dataAjax).then((res) => {
            console.log(res);
            output.html(res.html);
        });
    });
    //
    $(document).on("click", ".pgb-add-section", function () {
        handleSection($(this).attr("data-t"));
    });
    $(document).on("click", ".render-modal-package", function () {
        const cid = $(this).attr("id");
        const type = $(this).attr("data-t");
        let dataAjax = {
            data: cid,
            type: "select-shortcode",
        };
        ajaxRenderModalPackage(dataAjax, { minWidth: 800 });
    });

    jQuery.prevImgPack = function prevImgPack(file_path = [], input = null) {
        let index = 0;
        let indexArray = 0;

        if (input) {
            indexArray = input.attr("index-array");
            if (indexArray) {
                index = indexArray;
                imagePackage[index] = file_path;
            } else {
                index = imagePackage.length;
                input.attr("index-array", Number(index));
                imagePackage.push(file_path);
            }
        }
        console.log({ imagePackage: imagePackage, index: index });
        let html = "";
        if (file_path.length > 0) {
            html += `<div class="d-flex flex-wrap justify-content-center preview_img  --mul  my-3">`;
            for (let j = 0; j < file_path.length; j++) {
                let image = file_path[j];
                if ($.isImage(image) || image.includes("drive.google.com")) {
                    html += ` <div class="mb-4 prev-img-package-item position-relative">
                    <img src="${image}" style="max-width:350px ; max-height: 600px; height:auto"  alt="preview" class="preview_item mx-2 border-preview  shadow-1-strong rounded mb-4">
                    <div class="position-absolute prev-img-pack-remove cursor-pointer" index-array="${index}"  index-image="${j}">
                <i class="fa-solid fa-xmark"></i>
            </div>
                </div>`;
                }
            }
            html += `</div>`;
        } else {
            html += `<span class="text-muted">Không có hình ảnh</span>`;
        }
        return html;
    };
    $(document).on(
        "keyup",
        ".lfm-upload-input",
        _.debounce(function () {
            $(this).change();
        }, 300)
    );
    $(document).on("change", ".lfm-upload-input", function () {
        let mutiple = $(this).attr("data-mutiple") !== "false";
        console.log(mutiple);
        let images = $(this).val().split(",");
        if (!mutiple) {
            $(this).val(images[0]);
            images = $(this).val().split(",");
        }
        let id = $(this).attr("id");

        let html = $.prevImgPack(images, $(this));
        if (id) {
            $("#preview-" + id).html(html);
        } else {
            $(this).parent().next().html(html);
            console.log($(this).parent().next());
        }
    });
    $(document).on("click", ".prev-img-pack-remove", function () {
        const index = $(this).attr("index-image");
        const indexArr = $(this).attr("index-array");
        imagePackage[indexArr].splice(index, 1);
        let input = $(this)
            .closest(".lfm-upload-preview")
            .prev()
            .children(".lfm-upload-input");
        input.val(imagePackage[indexArr].toString());
        input.change();
    });
    $("#pgb-section-modal").on("hidden.bs.modal", function (event) {
        imagePackage = [];
        outputModal.html("....");
    });
    $("#pgb-modal-preview").on("hidden.bs.modal", function (event) {
        contentPreview.html("....");
    });
    $(document).on("click", ".pack-edit-image", function () {
        window.open(
            path_ab + "/laravel-filemanager" + "?type=" + "Images",
            "FileManager",
            "width=900,height=600"
        );
        window.SetUrl = function (items) {
            let file_path = items.map(function (item) {
                return item.url;
            });
            $.prevImgPack(file_path);
        };
    });
    // *add-comp

    $(document).on("click", "#pack-edit-tabs-add", function () {
        let tab = {
            type: "none",
            title: "",
            value: "",
        };
        arrayTabs.push(tab);
        loadTabs($(this));
    });
    $(document).on("click", ".pack-edit-tab-component-remove", function () {
        const id = $(this).attr("data-id");
        const el = $("#" + id);
        if (el) {
            const packId = $("#edit-package-id").val();
            const indexPack = indexPackById(packId);
            let newTabs = arrPackage[indexPack].payload.content.filter(
                (tab) => {
                    return tab.id !== id;
                }
            );
            arrPackage[indexPack].payload.content = newTabs;
            el.remove();
            console.log({
                afterRemove: arrPackage[indexPack].payload.content,
            });
        }
    });
    // *crsimages
    $(document).on("click", "#pack-edit-crs-image-add", function () {
        const pid = $("#edit-package-id").val();
        let indexPack = indexPackById(pid);
        let number = Number($("#pack-edit-crs-image-number").val());
        for (let index = 0; index < number; index++) {
            crsImages.push({
                value: "",
                link: "",
            });
        }

        $("#p-e-items").text(crsImages.length);
        loadCrsImages(null, $(this));
        console.log({
            pecrsimages: arrPackage[indexPack].payload.content,
        });
    });
    // *crsimages end
    // *banners-add

    $(document).on("click", "#pack-edit-banners-add", function () {
        const pid = $("#edit-package-id").val();
        let number = Number($("#pack-edit-banners-number").val());
        for (let index = 0; index < number; index++) {
            bannerImages.push({
                value: "",
                link: "",
            });
        }
        $("#pack-edit-banners-min").attr("max", bannerImages.length);
        $("#pack-edit-banners-max").attr("max", bannerImages.length);
        $("#pack-edit-banners-max").val(bannerImages.length);
        $("#pack-edit-banners-min").val(
            Number($("#pack-edit-banners-min").val()) + number
        );
        loadBanners();
    });
    // *banners-add-end
    $(document).on("click", "#pack-edit-gll-yt-add", function () {
        let items = $("#pack-edit-banners-number").val();
        for (let index = 1; index <= items; index++) {
            galleryYt.push("");
        }

        loadGllYt();
    });

    // *add-comp end
    // *form
    $(document)
        .on("submit", "#pgb-section-form", function (e) {
            e.preventDefault();
            const type = $("#pgb-modal-type").val();
            $.btn_loading_v2($(this)[0], true, true);
            let visible = [];
            let spacing = {};
            let classes = "";
            switch (type) {
                case "edit-package":
                    let typePackage = $("#edit-package-type").val();
                    let classesPack = $("#edit-package-class").val();
                    let packageId = $("#edit-package-id").val();
                    let indexPack = indexPackById(packageId);
                    let content;
                    let payloadPack = {
                        type: typePackage,
                        class: classesPack,
                        options: {},
                    };
                    let stylePack = {};
                    switch (typePackage) {
                        case "image":
                            let image = $("#package-edit-image").val();
                            let href = $("#pack-edit-href").val();
                            stylePack = updateBorderStyle();
                            payloadPack["content"] = image;
                            payloadPack.options["href"] = href;
                            payloadPack.options["typeUpload"] = $(
                                "#pgb-edit-image-type-upload"
                            ).val();
                            break;
                        case "video":
                            payloadPack["content"] = $(
                                "#pack-edit-video-source"
                            ).val();
                            payloadPack.options["pf"] = $(
                                "#pgb-m-video-platform"
                            ).val();
                            break;
                        case "texteditor":
                            payloadPack["content"] = $(
                                "#pgb-package-edit-tiny"
                            ).val();
                            break;
                        case "category":
                            payloadPack["content"] = $(
                                "#pack-edit-category"
                            ).val();
                            break;
                        case "header":
                            payloadPack["content"] =
                                $("#pack-edit-header").val();
                            break;
                        case "googlemap":
                            payloadPack["content"] =
                                $("#pack-edit-ggmap").val();
                            break;
                        case "blogs":
                            payloadPack["content"] = Number(
                                $("#pack-edit-blogs").val()
                            );
                            break;
                        case "tabs":
                            const tabs = $(".pack-edit-tab-component");
                            stylePack["activeColor"] =
                                $("#color-active-tabs").val();
                            content = [];
                            $.each(tabs, function (index, el) {
                                let title = $(el)
                                    .find(".p-e-tab-comp-title")
                                    .val();
                                let type = $(el)
                                    .find(".p-e-tab-comp-type")
                                    .val();
                                let value = "";
                                switch (type) {
                                    case "category":
                                        value = $(
                                            "#pgb-tab-category-" + index
                                        ).val();
                                        break;
                                    case "products":
                                        value = $(
                                            "#pgb-tab-products-" + index
                                        ).val();
                                        break;
                                }
                                let tab = {
                                    type: type,
                                    title: title,
                                    value: value,
                                };
                                content.push(tab);
                            });
                            payloadPack["content"] = content;

                            break;
                        case "crsimages":
                            let items = $(".p-e-component-crsimages");
                            content = [];
                            $.each(items, function (index, item) {
                                let image = $(item)
                                    .find(".p-e-crsimages-image")
                                    .val();
                                let link = $(item)
                                    .find(".p-e-crsimages-link")
                                    .val();
                                console.log(link);
                                content.push({
                                    value: image,
                                    link: link,
                                });
                            });
                            payloadPack["content"] = content;
                            break;
                        case "banners":
                            let bannerItems = $(".p-e-component-banner");
                            payloadPack["content"] = {};
                            content = [];
                            $.each(bannerItems, function (index, item) {
                                let image = $(item)
                                    .find(".p-e-banners-image")
                                    .val();
                                let link = $(item)
                                    .find(".p-e-banners-link")
                                    .val();
                                content.push({
                                    value: image,
                                    link: link,
                                });
                            });
                            payloadPack["content"]["images"] = content;
                            payloadPack["content"]["max"] = $(
                                "#pack-edit-banners-max"
                            ).val();
                            payloadPack["content"]["min"] = $(
                                "#pack-edit-banners-min"
                            ).val();
                            stylePack = {
                                ...stylePack,
                                ...updateBorderStyle(),
                            };
                            break;
                        case "galleryyt":
                            payloadPack["content"] = {};
                            payloadPack["content"]["number_item"] = $(
                                "#pack-edit-gll-yt-items"
                            ).val();
                            let itemsYt = $(".p-e-gllYt-link");
                            payloadPack["content"]["items"] = [];
                            $.each(itemsYt, function (index, item) {
                                payloadPack["content"]["items"].push(
                                    $(item).val()
                                );
                            });

                            break;
                        default:
                            break;
                    }
                    if (indexPack > -1) {
                        arrPackage[indexPack].payload = payloadPack;
                        arrPackage[indexPack].advanced = updateAdvanced();
                        arrPackage[indexPack].style = stylePack;
                    }
                    console.log({
                        type: type,
                        afterUpdatePackage: arrPackage[indexPack],
                    });
                    $.btn_loading_v2($(this)[0], false, true);
                    break;
                case "change-layout":
                    const selected = $("#selected_layout");
                    const layout = selected.attr("data-layout");
                    const sid = selected.attr("sid");
                    let payload = {
                        sid: sid,
                        layout: layout,
                    };
                    handleSection(
                        type,
                        payload,
                        $.btn_loading_v2($(this)[0], false, true)
                    );
                    break;
                case "edit-section":
                    const bgWp = $("#pgb-section-bg-wp").val();
                    const bgSection = $("#pgb-section-bg").val();
                    const classes = $("#edit-section-class").val();
                    const container = $("#switch-section-cotainer").is(
                        ":checked"
                    );
                    $.each(
                        $(".pgb-device-visible:checkbox:checked"),
                        function (indexInArray, elVisible) {
                            visible.push($(elVisible).val());
                        }
                    );
                    let ploadS = {
                        class: classes,
                    };
                    let background = {
                        background_section: bgWp,
                        background_container: bgSection,
                    };
                    let sectionId = $("#edit-section-id").val();
                    let indexSection = indexSectionById(sectionId);
                    let spacing = handleSpacing("update");
                    if (indexSection > -1) {
                        sections[indexSection].container = container;
                        sections[indexSection].payload = ploadS;
                        sections[indexSection].advanced = updateAdvanced();
                        sections[indexSection].style = {
                            ...background,
                            ...updateBorderStyle(),
                        };
                    }
                    console.log({
                        afterUpdateSection: sections[indexSection],
                    });
                    $.btn_loading_v2($(this)[0], false, true);
                    break;
                case "edit-column":
                    let fw_devices = getChecked("pgb-fw-devices");
                    let styleCol = {
                        background: $("#pgb-col-bg").val(),
                    };
                    styleCol = {
                        ...styleCol,
                        ...updateBorderStyle(),
                    };
                    const cId = $("#edit-col-id").val();
                    const indexCol = indexColById(cId);
                    if (indexCol > -1) {
                        arrColumn[indexCol].style = styleCol;
                        arrColumn[indexCol].class = $("#edit-col-class").val();
                        arrColumn[indexCol].advanced = updateAdvanced({
                            fw_devices: fw_devices.toString(),
                        });
                    }
                    console.log({
                        afterUpdateCol: arrColumn[indexCol],
                    });
                    $.btn_loading_v2($(this)[0], false, true);
                    break;
                default:
                    const shortCode = $(".pgb-shortCode-item.active").attr(
                        "value"
                    );
                    const cid = $(".pgb-shortCode-item.active").attr("cid");
                    if (shortCode != 0) {
                        let payload = {
                            cid: cid,
                        };
                        handlePackage(
                            "create",
                            shortCode,
                            payload,
                            $.btn_loading_v2($(this)[0], false, true)
                        );
                    }
                    break;
            }
            modal.modal("hide");
        })
        .catch((err) => {
            $.btn_loading_v2($(this)[0], false, true)
        });
    $(document).on("click", ".select-layout", function () {
        let currActive = $(".select-layout.active");
        let layout = $(this).attr("data-layout");
        currActive.removeClass("active");
        $(this).addClass("active");
        $("#selected_layout").attr("data-layout", layout);
    });
    $(document).on("click", ".pgb-section-act .layout", function () {
        let sectionId = $(this).attr("sid");
        let dataAjax = {
            data: getSectionById(sectionId, false),
            type: "change-layout",
        };
        ajaxRenderModalPackage(dataAjax, { minWidth: 800 });
    });
    $(document).on("click", ".pack-remove", function () {
        const pid = $(this).attr("pack-id");
        removePackage(pid);
    });

    function addAttr(pid) {
        $("#modal__select--save").attr("pack-id", pid);
    }
    // *pack-edit
    $(document).on("click", ".pack-edit", function () {
        const pid = $(this).attr("pack-id");
        const type = $(this).attr("data-type");
        const package = getPackById(pid);
        let data = {
            type: "edit-package",
            data: {
                typePack: type,
                package: package,
            },
        };
        console.log({
            t: "data-edit-pack",
            data: data,
        });
        if (type !== "products") {
            let options = {};
            ajaxRenderModalPackage(data, { minWidth: 800 }).then((res) => {
                const btnSubmit = $("#pgb-form-submit");
                switch (type) {
                    case "crsimages":
                        crsImages = package.payload.content ?? [];
                        loadCrsImages(btnSubmit);
                        break;
                    case "banners":
                        bannerImages = package.payload.content.images ?? [];
                        $("#pack-edit-banners-min").attr(
                            "max",
                            bannerImages.length
                        );
                        $("#pack-edit-banners-max").attr(
                            "max",
                            bannerImages.length
                        );
                        loadBanners(btnSubmit);
                        break;
                    case "tabs":
                        arrayTabs = package.payload.content;
                        loadTabs(btnSubmit);

                        break;
                    case "galleryyt":
                        galleryYt = package.payload.content.items ?? [];
                        loadGllYt();
                        break;
                    default:
                        break;
                }
            });
        } else {
            let selected = data.data.package.payload.content.split(",");
            $.handle_model_rela(
                "Products",
                null,
                null,
                null,
                null,
                "load",
                1,
                { openModal: true },
                addAttr(pid),
                selected
            );
        }
    });
    $(document).on("click", ".pgb-section-act .edit", function () {
        const sid = $(this).attr("sid");
        let dataAjax = {
            data: getSectionById(sid, false),
            type: "edit-section",
        };
        ajaxRenderModalPackage(dataAjax, { minWidth: 1200 });
    });
    $(document).on("click", ".pgb-column-act .edit", function () {
        const cid = $(this).attr("cid");
        let dataAjax = {
            data: getColById(cid),
            type: "edit-column",
        };
        ajaxRenderModalPackage(dataAjax, { minWidth: 1200 });
    });
    $(document).on("click", ".pgb-section-act .remove", function () {
        const sid = $(this).attr("sid");
        removeSection(sid);
        let hSection = $("#pgb-section-" + sid).height();
        let hBuild = $("#build-sections").height();
        $("#pgb-section-" + sid).remove();
        $("#build-sections").css("min-height", hBuild - hSection);
    });
    jQuery.updateContentPackage = function updatePackage(pid, content) {
        let index = arrPackage.findIndex((el) => {
            return el.id === pid;
        });
        if (index !== -1) {
            arrPackage[index].payload.content = content;
            console.log({
                packageAfterupdate: getPackById(pid),
            });
        }
    };
    //*createAdvanced  //////////////////////////////////
    function updateAdvanced(customs = {}) {
        let data = {};
        let visible = [];
        data["spacing"] = handleSpacing("update");
        $.each(
            $(".pgb-device-visible:checkbox:checked"),
            function (indexInArray, elVisible) {
                visible.push($(elVisible).val());
            }
        );
        data["visible"] = visible.toString();
        data = {
            ...data,
            ...customs,
        };
        return data;
    }
    function handleSpacing(act = "create") {
        let spacing = {};
        for (let index = 0; index < breakpoint.length; index++) {
            let space = {};
            let bp = breakpoint[index];
            for (let j = 0; j < spacingPos.length; j++) {
                let pos = spacingPos[j];
                space["p" + pos] =
                    act === "create"
                        ? 0
                        : $("#pgb-advanced-p" + pos + "-" + bp).val();
                space["m" + pos] =
                    act === "create"
                        ? 0
                        : $("#pgb-advanced-m" + pos + "-" + bp).val();
            }
            spacing[bp] = space;
        }
        return spacing;
    }
    function createAdvanced(customs = {}) {
        let advanced = {};
        advanced["spacing"] = handleSpacing("create");
        advanced["visible"] = breakpoint.toString();
        let merge = {
            ...advanced,
            ...customs,
        };
        return merge;
    }
    // //////////////////////////////////////
    // *hS
    function handleSection(
        type,
        payload = null,
        callbackAjax = null,
        options = {}
    ) {
        switch (type) {
            case "add-section":
                let background = {
                    background_section: "transparent",
                    background_container: "transparent",
                };
                let section = {
                    type: "section",
                    id: makeId("s", sections.length),
                    layout: ["12"],
                    container: true,
                    parentId: null,
                    payload: {
                        class: "",
                    },
                    advanced: createAdvanced(),
                    style: {
                        ...background,
                        ...initStyleBorder(),
                    },
                };
                sections.push(section);

                handleColumn("create", section);
                section["column"] = getColumnBySid(section.id);
                console.log({
                    type: type,
                    sections: sections,
                    sectionAfterAdd: section,
                });
                let dataAjax = {
                    section: section,
                    type: "add-section",
                };
                ajaxHandle(dataAjax).then((res) => {
                    callbackAjax;
                });
                break;
            case "change-layout":
                const sid = payload.sid;
                let currentSection = getSectionById(sid, true);
                let currentColumn = currentSection.column;
                let currentLayout = currentSection.layout.toString();
                let newLayout = payload.layout;
                if (currentLayout !== newLayout) {
                    currentLayout = currentLayout.split(",");
                    newLayout = newLayout.split(",");
                    if (currentLayout.length > newLayout.length) {
                        let point = Number(newLayout.length - 1);
                        let index = indexSectionById(sid);
                        if (index !== -1) {
                            sections[index].layout = newLayout;
                            arrColumn = arrColumn.filter(function (element) {
                                return element.sid != sid;
                            });
                            handleColumn("create", sections[index]);
                            let mergePackage = [];
                            $.each(
                                currentColumn,
                                function (indexInArray, valueOfElement) {
                                    let currCol = currentColumn[indexInArray];
                                    let currentPackage = getPackageByCid(
                                        currCol.id
                                    );

                                    if (currentPackage.length > 0) {
                                        if (indexInArray <= point) {
                                            mergePackage.push([currentPackage]);
                                        } else {
                                            mergePackage[point].push(
                                                currentPackage
                                            );
                                        }
                                    }
                                }
                            );
                            let newCol = getColumnBySid(sid);

                            $.each(newCol, function (indexNewCol, nCol) {
                                let updatePackage = mergePackage[indexNewCol];
                                $.each(updatePackage, function (indexup, up) {
                                    let indexPack = arrPackage.findIndex(
                                        function (el) {
                                            return el.id == up[0].id;
                                        }
                                    );
                                    if (indexPack > -1) {
                                        console.log({
                                            index: arrPackage[indexPack],
                                        });
                                        arrPackage[indexPack].cid = nCol.id;
                                        arrPackage[indexPack].id = makeId(
                                            nCol.id + "-package",
                                            indexup
                                        );
                                    }
                                });
                            });
                            console.log({
                                endArrCol: arrColumn,
                                endPackage: arrPackage,
                                endSection: getSectionById(sid),
                            });
                        }
                    } else if (currentLayout.length < newLayout.length) {
                        let index = indexSectionById(sid);
                        if (index !== -1) {
                            sections[index].layout = newLayout;
                            let options = {
                                oldCol: currentLayout.length,
                                newCol: newLayout.length,
                            };
                            handleColumn("add", sections[index], options);
                        }
                    } else {
                    }
                    let dataAjax = {
                        section: getSectionById(sid),
                        type: "change-layout",
                    };
                    ajaxHandle(dataAjax).then((res) => {
                        callbackAjax;
                    });
                }

                break;
            default:
                break;
        }
    }
    // *hCol
    function initDataCol(section, index) {
        let style = {
            background: "transparent",
        };
        style = {
            ...style,
            ...initStyleBorder(),
        };
        let data = {
            type: "col",
            id: makeId(section.id + "-c", index),
            sid: section.id,
            layout: section.layout[index],
            advanced: createAdvanced({
                fw_devices: "",
            }),
            class: "",
            style: style,
        };
        return data;
    }
    function initStyleBorder() {
        return {
            border: propertyStyle["border"],
            box_shadow: propertyStyle["box_shadow"],
        };
    }

    function handleColumn(
        type,
        section = null,
        options = {},
        callbackAjax = null
    ) {
        switch (type) {
            case "create":
                for (let i = 0; i < section.layout.length; i++) {
                    let col = initDataCol(section, i);
                    arrColumn.push(col);
                    console.log({
                        act: "create-column",
                        column: col,
                    });
                }

            case "add":
                let oldCol = options.oldCol;
                let newCol = options.newCol;
                for (let index = oldCol; index < newCol; index++) {
                    let col = initDataCol(section, index);
                    arrColumn.push(col);
                    console.log({
                        act: "add-column",
                        column: col,
                    });
                }

                break;
            default:
                break;
        }
    }
    // *hpack
    function updateBorderStyle() {
        let border = propertyStyle["border"];
        let border_radius = propertyStyle["border_radius"];
        let box_shadow = propertyStyle["box_shadow"];
        border["unit_border_radius"] = $("#pgb-border-radius-unit").val();
        $.each(border["properties"], function (key, value) {
            if (typeof value === "object") {
                $.each(value, function (keyChild) {
                    let val = $(".pgb_border_" + key + "_" + keyChild).val();
                    border["properties"][key][keyChild] = val;
                });
            } else {
                border["properties"][key] = $(".pgb_border_" + key).val();
            }
        });

        let style = {
            border: border,
            border_radius: border_radius,
            box_shadow: box_shadow,
        };
        console.log({
            borderAfterUpdate: style,
        });
        return style;
    }
    function handlePackage(
        type,
        typePack = "",
        payload = {},
        callbackAjax = null,
        options = {}
    ) {
        switch (type) {
            case "create":
                let packageColumn = getPackageByCid(payload.cid);
                let content = "";
                let style = {};
                let options = {};
                switch (typePack) {
                    case "tabs":
                        content = [];
                        style["activeColor"] =
                            settingDefaults.tabs.active_color;
                        break;
                    case "crsimages":
                        content = [];
                        break;
                    case "blogs":
                        content = settingDefaults.blogs.items;
                        break;
                    case "image":
                        options["href"] = "";
                        style = {
                            ...style,
                            ...initStyleBorder(),
                        };
                        break;
                    case "video":
                        options["pf"] = settingDefaults.video.pf;
                        break;
                    case "banners":
                        content = {
                            images: [],
                            min: settingDefaults.banners.min,
                            max: settingDefaults.banners.max,
                        };
                        style = {
                            ...style,
                            ...initStyleBorder(),
                        };
                        break;
                    case "galleryyt":
                        content = {
                            items: [],
                            number_item: settingDefaults.gllYt.number_item,
                        };

                        break;
                    default:
                        break;
                }
                let package = {
                    id: makeId(payload.cid + "-p", packageColumn.length),
                    cid: payload.cid,
                    type: "package",
                    payload: {
                        class: "",
                        content: content,
                        type: typePack,
                        options: options,
                    },
                    style: style,
                    advanced: createAdvanced(),
                };

                arrPackage.push(package);
                let dataAjax = {
                    package: package,
                    type: "add-package",
                    column: getColById(payload.cid),
                };
                ajaxHandle(dataAjax).then((res) => {
                    callbackAjax;
                });
                console.log({
                    type: type + "-package",
                    package: package,
                    packByCid: getPackageByCid(payload.cid),
                });
                break;
            case "delete":
                arrPackage = arrPackage.filter(function (element, index) {
                    return element.id != payload.pid;
                });

                break;

            default:
                break;
        }
    }
    // ///////////////////////////

    $(document).on("click", ".pgb-shortCode-item", function () {
        $(".pgb-shortCode-item.active").removeClass("active");
        $(this).addClass("active");
    });
    $(document).on("click", "#pgb-preview-btn", function () {
        $.page_loading(true);
        let payload = [];
        for (let index = 0; index < sections.length; index++) {
            let section = getSectionById(sections[index].id);
            payload.push(section);
        }
        console.log(payload);
        let dataAjax = {
            payload: JSON.stringify(payload),
            type: "preview",
        };

        ajaxHandle(dataAjax).then((res) => {
            $(".carousel").carousel();
            $.page_loading(false);
        });
    });
    $(document).on("click", "#pgb-handle-btn", function (e) {
        e.preventDefault();
        let titlePage = $("#pgb-title").val();
        let slug = $("#pgb-slug").val();
        let type = $("#pgb-type").val();
        if (!titlePage) {
            return alert("Bạn chưa điền tiêu đề");
        }
        if (type == 0) {
            return alert("Bạn chưa chọn kiểu của trang");
        }
        if (type == "full") {
            if (!slug) {
                return alert("Bạn chưa điền slug website");
            }
        }
        $.btn_loading_v2($(this), true, false);
        let payload = [];
        if (sections.length > 0) {
            for (let index = 0; index < sections.length; index++) {
                let section = getSectionById(sections[index].id);
                payload.push(section);
            }
        }
        let dataAjax = {
            payload: JSON.stringify(payload),
            title: titlePage,
            slug: slug,
            typePage: type,
            type: isCreate ? "create-db-section" : "save-db-section",
            id: isCreate ? null : page.id,
        };
        ajaxHandle(dataAjax)
            .then((res) => {
                if (!res.error_create) {
                    $.vaToas(typeHandle + " Thành Thông");
                    if (isCreate) {
                        if (res.redirect) {
                            window.location.href = res.redirect;
                        }
                    }
                } else {
                    $.vaToas(typeHandle + " Thất bại");
                }
                $.btn_loading_v2($(this), false, false);
            })
            .catch((err) => {
                $.btn_loading_v2($(this), false, false);
            });
    });
    $(document).on("change", "#pgb-edit-image-type-upload", function () {
        let type = $(this).val();
        let op = $("#pgb-edit-image-op-tup");
        let html = renderEditImage(type, "");
        op.html(html);
    });
    $(document).on("click", ".lfm-upload-btn", function () {
        const id = $(this).attr("data-input");
        let input = $(this).parent().prev();
        let preview = input.parent().next();
        if (id) {
            input = $("#" + id);
            preview = $("#preview-" + id);
        }
        window.open(
            path_ab + "/laravel-filemanager" + "?type=" + "Images",
            "FileManager",
            "width=900,height=600"
        );
        window.SetUrl = function (items) {
            let file_path = items.map(function (item) {
                return item.url;
            });
            input.val(file_path.toString());
            input.change();
        };
    });
    function renderEditImage(type, content = "") {
        let html = "";
        switch (type) {
            case "file-manager":
                html += `<div class="custom-file pack-edit-image cursor-pointer">
                <input type="text" class="custom-file-input cursor-pointer" value="${content}" id="package-edit-image">
                <label class="custom-file-label cursor-pointer" for="package-edit-image">Choose file</label>
            </div>`;
                break;
            case "link":
                html += `<label for="package-edit-image">Link Source</label>
                <input type="text" class="form-control" name="" value="${content}"
                    id="package-edit-image" placeholder="">`;
                break;
            default:
                break;
        }
        return html;
    }
});
