$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    if (route().current("edit_cofhome_view")) {
        ajaxSectionHome("load", Number(showId));
    }
    var elSection = $("#home__section");
    function ajaxSectionHome(act = "add", id = 0) {
        if (act == "add") {
            index = section.push([0]) - 1;
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
                        section = data.sections;
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
        if ($(this).is(":checked")) {
            section[index].push(val);
        } else {
            let indexInSection = section[index].indexOf(Number(val));
            if (indexInSection !== -1) {
                section[index].splice(indexInSection, 1);
            }
        }
        ajaxSectionHome("update");
    });

    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
