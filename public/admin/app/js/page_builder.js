$(function () {
    var sections = [];
    var arrColumn = [];
    var arrPackage = [];
    var outputModal = $("#pgb-section-modal-output");
    var modal = $("#pgb-section-modal");
    var routeHandle = route("pgb.handle");
    var routeRender = route("pgb.render.package");
    var isCreate = route().current("pgb.create");
    var bodySections = $("#build-sections");
    function uid() {
        return Math.random().toString(16).slice(2);
    }
    function makeId(type, index) {
        return type + "-" + index + "-" + uid();
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
        return sections.findIndex(function (element, index) {
            return element.id === sid;
        });
    }
    function indexPackById(pid) {
        return arrPackage.findIndex(function (element, index) {
            return element.id === pid;
        });
    }
    function getSectionById(id = null, loadColumn = true) {
        let section = sections.filter(function (element, index) {
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
        }
        return columns;
    }
    function getPackageByCid(cid = null) {
        let packages = arrPackage.filter(function (element) {
            return element.cid == cid;
        });
        return packages;
    }
    // handle sort
    function initSortPackage() {
        $(".pgb-sort-package").sortable({
            connectWith: ".pgb-sort-connect-package",
            items: ".init-sort-package",
            delay: 0,
            update: function (event, ui) {
                console.log({
                    act: "sort update package",
                    e: event,
                    ui: ui,
                    this: this,
                });
            },
            over: function (event, ui) {
                console.log({
                    act: "sort over package",
                    e: event,
                    ui: ui,
                    this: this,
                });
            },
            receive: function (event, ui) {
                console.log({
                    act: "sort receive package",
                    e: event,
                    ui: ui,
                    this: this,
                });
            },
        });
    }
    function initSortable() {
        $(".pgb-sort").sortable({
            connectWith: ".pgb-sort-connect",
            items: ".init-sort",
            axis: "y",
            update: function (event, ui) {
                console.log({
                    act: "sort update section",
                    e: event,
                    ui: ui,
                    this: this,
                });
            },
            over: function (event, ui) {
                console.log({
                    act: "sort over section",
                    e: event,
                    ui: ui,
                    this: this,
                });
            },
            receive: function (event, ui) {
                console.log({
                    act: "sort receive section",
                    e: event,
                    ui: ui,
                    this: this,
                });
            },
        });
        $(".pgb-sort").sortable("option", "disabled", false);
    }

    $(document).on("mousedown", ".pgb-section-act .move", function () {
        initSortable();
    });

    $(document).on("mouseup", ".pgb-section-act .move", function () {
        let check = $(".pgb-sort").hasClass("ui-sortable");
        if (check) {
            $(".pgb-sort").sortable("disable");
        }
    });
    // end sort

    function ajaxHandle(data) {
        return $.ajax({
            type: "post",
            url: routeHandle,
            data: data,
            dataType: "json",
            success: function (res) {
                console.log(res);
                switch (data.type) {
                    case "add-section":
                        bodySections.append(res.html_section);
                        const currentHeigt = $("#build-sections").height();
                        $("#build-sections").css(
                            "min-height",
                            currentHeigt + 100
                        );
                        break;
                    case "add-package":
                        $(".pgb-wp-package-" + data.package.cid).append(
                            res.html_package
                        );

                        break;
                    case "change-layout":
                        $("#pgb-section-" + data.section.id)
                            .children(".pgb-section-body")
                            .html(res.html_section);
                        break;
                    default:
                        break;
                }
                initSortable();
                initSortPackage();
            },
        });
    }
    function ajaxRenderModalPackage(data, options = {}) {
        return $.ajax({
            type: "post",
            url: routeRender,
            data: data,
            dataType: "json",
            success: function (res) {
                let tiny = $("#pack-edit-tiny");
                outputModal.html(res.html);
                if (options.hasOwnProperty("images")) {
                    $.prevImgPack(options.images);
                }
                if (tiny) {
                    tinymce.remove();
                    $.create_editor("pack-edit-tiny", 1000);
                }
                modal.modal("show");
            },
        });
    }
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
        ajaxRenderModalPackage(dataAjax);
    });
    $(document).on("click", ".prev-img-pack-remove", function () {
        const index = $(this).attr("data-index");
        imagePackage.splice(index, 1);
        $.prevImgPack(imagePackage);
    });
    $("#pgb-section-modal").on("hidden.bs.modal", function (event) {
        outputModal.html("....");
    });
    var imagePackage = [];
    jQuery.prevImgPack = function prevImgPack(file_path = []) {
        imagePackage = file_path;
        console.log({ imagePackage: imagePackage });
        let html = "";
        if (file_path.length > 0) {
            html += `<div class="d-flex flex-wrap justify-content-center preview_img  --mul  my-3">`;
            for (let j = 0; j < file_path.length; j++) {
                html += ` <div class="mb-4 prev-img-package-item position-relative">
                    <img src="${file_path[j]}" style="max-width:350px ; max-height: 600px; height:auto"  alt="preview" class="preview_item mx-2 border-preview  shadow-1-strong rounded mb-4">
                    <div class="position-absolute prev-img-pack-remove cursor-pointer" data-index="${j}">
                <i class="fa-solid fa-xmark"></i>
            </div>
                </div>`;
            }
            html += `</div>`;
        }
        $(".pack-edit-image")
            .children("label")
            .text(file_path.length + " File");
        $(".pack-edit-image").children("input").val(file_path.toString());

        $("#pgb-section-modal-output .preview-package-edit-image").html(html);
    };
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
    handleSection("add-section");
    $(document).on("submit", "#pgb-section-form", function (e) {
        e.preventDefault();
        const type = $("#pgb-modal-type").val();
        $.btn_loading_v2($(this)[0], true, true);
        switch (type) {
            case "edit-package":
                let typePackage = $("#edit-package-type").val();
                let classesPack = $("#edit-package-class").val();
                let packageId = $("#edit-package-id").val();
                let indexPack = indexPackById(packageId);
                let payloadPack = {};
                switch (typePackage) {
                    case "image":
                        let images = $("#package-edit-image").val().split(",");
                        let href = $("#pack-edit-href").val();
                        payloadPack = {
                            type: typePackage,
                            content: images,
                            class: classesPack,
                            options: {
                                href: href,
                            },
                        };
                        break;
                    case "video":
                        payloadPack = {
                            type: typePackage,
                            content: $("#pack-edit-video-source").val(),
                            class: classesPack,
                        };
                        break;
                    case "text-editor":
                        payloadPack = {
                            type: typePackage,
                            content: $("#pack-edit-tiny").val(),
                            class: classesPack,
                        };
                    default:
                        break;
                }
                if (indexPack > -1) {
                    arrPackage[indexPack].payload = payloadPack;
                }
                console.log({
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
                const bg = $("#edit-section-bg").val();
                const classes = $("#edit-section-class").val();
                const container = $("#switch-section-cotainer").is(":checked");
                let pload = {
                    background: bg,
                    class: classes,
                };
                let sectionId = $("#edit-section-id").val();
                let indexSection = indexSectionById(sectionId);
                if (indexSection > -1) {
                    sections[indexSection].container = container;
                    sections[indexSection].payload = pload;
                }
                console.log({
                    afterUpdateSection: sections[indexSection],
                });
                $.btn_loading_v2($(this)[0], false, true);
                break;
            default:
                const shortCode = $(".pgb-shortCode-item.active").attr("value");
                const cid = $(".pgb-shortCode-item.active").attr("cid");
                console.log(cid);
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
        ajaxRenderModalPackage(dataAjax);
    });
    $(document).on("click", ".pack-remove", function () {
        const pid = $(this).attr("pack-id");
        removePackage(pid);
    });
    function addAttr(pid) {
        $("#modal__select--save").attr("pack-id", pid);
    }
    $(document).on("click", ".pack-edit", function () {
        const pid = $(this).attr("pack-id");
        const type = $(this).attr("data-type");
        let data = {
            type: "edit-package",
            data: {
                typePack: type,
                package: getPackById(pid),
            },
        };
        if (type !== "products") {
            let options = {};
            if (type === "image") {
                if (data.data.package.payload.content) {
                    options["images"] = data.data.package.payload.content;
                }
            }
            ajaxRenderModalPackage(data, options);
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
        ajaxRenderModalPackage(dataAjax);
    });
    $(document).on("click", ".pgb-section-act .remove", function () {
        const sid = $(this).attr("sid");
        removeSection(sid);
        $("#pgb-section-" + sid).remove();
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
    // //////////////////////////////////////
    function handleSection(
        type,
        payload = null,
        callbackAjax = null,
        options = {}
    ) {
        switch (type) {
            case "add-section":
                let section = {
                    type: "section",
                    id: makeId("s", sections.length),
                    layout: ["12"],
                    container: false,
                    parentId: null,
                    iddb: options.hasOwnProperty("iddb") ? options.iddb : null,
                    ord: Number(sections.length),
                    payload: {
                        class: "",
                        background: "",
                    },
                };
                sections.push(section);
                console.log({
                    type: type,
                    sections: sections,
                });
                handleColumn("create", section);
                section["column"] = getColumnBySid(section.id);
                console.log(section);
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
    function handleColumn(
        type,
        section = null,
        options = {},
        callbackAjax = null
    ) {
        switch (type) {
            case "create":
                for (let i = 0; i < section.layout.length; i++) {
                    let data = {
                        type: "col",
                        id: makeId(section.id + "-c", i),
                        sid: section.id,
                        ord: i,
                        iddb: options.hasOwnProperty("iddb")
                            ? options.iddb
                            : null,
                        layout: section.layout[i],
                    };
                    arrColumn.push(data);
                }
                console.log({
                    type: type,
                    arrColumn: arrColumn,
                    columnBySid: getColumnBySid(section.id),
                });
            case "add":
                let oldCol = options.oldCol;
                let newCol = options.newCol;

                for (let index = oldCol; index < newCol; index++) {
                    let data = {
                        type: "col",
                        id: makeId(section.id + "-c", index),
                        sid: section.id,
                        ord: index,
                        layout: section.layout[index],
                    };
                    arrColumn.push(data);
                }
                console.log({
                    afterAddCol: arrColumn,
                });
                break;
            default:
                break;
        }
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

                let package = {
                    id: makeId(payload.cid + "-p", packageColumn.length),
                    cid: payload.cid,
                    type: "package",
                    ord: packageColumn.length,
                    iddb: options.hasOwnProperty("iddb") ? options.iddb : null,
                    payload: {
                        class: "",
                        content: typePack === "image" ? [] : "",
                        type: typePack,
                        options: {},
                    },
                };
                if (typePack === "image") {
                    package.payload.options["href"] = "";
                }
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
    $(document).on("click", ".pgb-shortCode-item", function () {
        $(".pgb-shortCode-item.active").removeClass("active");
        $(this).addClass("active");
    });
});
