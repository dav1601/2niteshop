$(function () {
    if (route().current("edit_cofhome_view")) {
        ajaxSectionHome("load", Number(showId));
    }
    var elSection = $("#home__section");
    function makeIdSection(index) {
        return "section" + "-" + String(index) + "-" + Date.now();
    }
    function ajaxSectionHome(act = "add", id = 0) {
        if (act == "add") {
            section.push({
                show: false,
                id: makeIdSection(section.length),
                selected: [],
            });
        }

        $.ajax({
            type: "post",
            url: route("ajax.home__section"),
            data: {
                act: act,
                section: section,
                id: id,
            },
            dataType: "json",
            success: function (data) {
                switch (act) {
                    case "load":
                        section = [];
                        $.each(
                            data.sections,
                            function (indexInArray, arrSection) {
                                let show = false;
                                let id = makeIdSection(indexInArray);
                                let checked = [];
                                $.each(arrSection, function (j, e) {
                                    checked.push(e.category_id);
                                });
                                let data = {
                                    show: false,
                                    id: id,
                                    selected: checked,
                                };
                                section.push(data);
                            }
                        );
                        ajaxSectionHome("update");
                        break;
                    default:
                        break;
                }
                elSection.html(data.html);
                $("#count__section").val(section.length);
            },
        });
    }
    const el = $("#c-show-home");
    let h = el.height();
    el.height(h + 100);
    $("#sortable__show__home").sortable({
        start: function (event, ui) {},
        stop: function (event, ui) {},
        update: function (event, ui) {
            let arrayOrder = new Array();
            $("#sortable__show__home tr").each(function (index) {
                arrayOrder.push($(this).attr("data-id"));
                $(this).children(".sh__pos").text(index);
            });
            $.ajax({
                type: "post",
                url: route("ajax.show_home_order"),
                data: {
                    order: arrayOrder,
                },
                dataType: "json",
                success: function (data) {
                    $.vaToas("Sắp xếp lại vị trí thành công");
                },
            });
        },
    });
    function initSortable() {
        $("#home__section").sortable({
            update: function (event, ui) {
                // let allEl = $(this).children(".secsion__home");
                // section = [];
                // $.each(allEl, function (indexInArray, valueOfElement) {
                //     const checked = $(valueOfElement).find("input:checked");
                //     if (checked.length > 0) {
                //         section[indexInArray] = [];
                //         $.each(checked, function (index, val) {
                //             section[indexInArray].push($(val).val());
                //         });
                //     }
                // });
                // ajaxSectionHome("update");
                // 8-3 lam phan` nay
                section = [];
                $("#home__section")
                    .children("li")
                    .each((index, child) => {
                        let elChild = $(child);
                        let show = elChild.find(".show").length > 0;
                        let checked = [];
                        elChild.find("input:checked").each((j, c) => {
                            checked.push($(c).val());
                        });
                        let data = {
                            show: show,
                            id:
                                "section" +
                                "-" +
                                String(index) +
                                "-" +
                                Date.now(),
                            selected: checked,
                        };
                        section.push(data);
                    });
                ajaxSectionHome("update");
            },
        });
    }
    $(document).on("mousedown", ".secsion__home .card-header", function (e) {
        initSortable();
    });
    $(document).on("click", "#add__section", function () {
        ajaxSectionHome("add");
    });
    $(document).on("click", ".section__home--delete", function () {
        let index = $(this).attr("data-index");
        section.splice(index, 1);
        ajaxSectionHome("delete");
    });
    $(document).on("click", ".section__category", function () {
        const index = $(this).attr("data-index");
        const val = $(this).val();
        const id = $(this).attr("data-id");
        if ($(this).is(":checked")) {
            updateSection($(this), "selected", val, false);
        } else {
            updateSection($(this), "selected", val, true);
        }
        ajaxSectionHome("update");
    });

    function updateSection(el, field, val, remove = false) {
        if (section.length <= 0) {
            return;
        }
        const id = el.attr("section-id");
        const index = section.findIndex((element) => {
            return element.id == id;
        });
        if (field == "selected") {
            if (!remove) {
                section[index][field].push(val);
            } else {
                const indexSub = section[index][field].indexOf(val);
                if (indexSub > -1) {
                    section[index][field].splice(indexSub, 1);
                }
            }
        } else {
            section[index][field] = val;
        }
        console.log({
            e: "update field",
            section: section,
        });
    }
    $(document).on("shown.bs.collapse", ".section-home-coll", function () {
        updateSection($(this), "show", true);
    });
    $(document).on("hidden.bs.collapse", ".section-home-coll", function () {
        updateSection($(this), "show", false);
    });
    // $(document).on("click", ".section-home-coll-btn", function () {
    //     const el = $($(this).attr("data-target"));
    //     const id = el.attr("section-id");
    //     const index = section.findIndex((element) => {
    //         return element.id == id;
    //     });
    //     console.log(el);
    //     const show = el.hasClass("show");
    //     console.log(show);
    // });
    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
