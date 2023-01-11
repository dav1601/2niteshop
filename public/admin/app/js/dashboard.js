$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $(document).on("change", "#type", function () {
        var val = $(this).val();
        if (val != "") {
            if (val == "html") {
                $(".html").removeClass("d-none");
                $(".img").addClass("d-none");
                $(".not-html").addClass("d-none");
            } else if (val == "img") {
                $(".img").removeClass("d-none");
                $(".not-html").addClass("d-none");
                $(".html").addClass("d-none");
            } else {
                $(".not-html").removeClass("d-none");
                $(".img").addClass("d-none");
                $(".html").addClass("d-none");
            }
        } else {
            $(".not-html").addClass("d-none");
            $(".html").addClass("d-none");
            $(".img").addClass("d-none");
        }
    });
    var prefix_add = "#task__add--";
    $(document).on("change", "#main_img", function () {
        var file = $(this)[0].files;
        $("#forMain").html(file[0].name);
    });
    $(document).on("change", "#use_img", function () {
        var file = $(this)[0].files;
        $("#forUse").html(file[0].name);
    });
    $(document).on("change", "#val_img", function () {
        var file = $(this)[0].files;
        $("#forVImg").html(file[0].name);
    });
    $(document).on("change", "#instruct_img", function () {
        var file = $(this)[0].files;
        $("#forinstruct").html(file[0].name);
    });
    $(document).on("change", "#access_img", function () {
        var file = $(this)[0].files;
        $("#foraccess").html(file[0].name);
    });
    $(document).on("change", "#fix_img", function () {
        var file = $(this)[0].files;
        $("#forfix").html(file[0].name);
    });
    $(document).on("change", "#cat", function () {
        var cat_id = $(this).val();
        if (cat_id != "") {
            $.ajax({
                type: "post",
                url: route("handle_cat"),
                data: { cat_id: cat_id, type: 1, sub_type: 1 },
                dataType: "json",
                beforeSend: function () {
                    $(".box_access").html(
                        "<span>Đang Load Dữ Liệu.....</span>"
                    );
                },
                success: function (data) {
                    $(".box_access").html(data.html_3);
                    console.log(data);
                },
            });
        } else {
            $(".box_access").html("<span>Chưa Chọn Danh Mục Chính.....</span>");
        }
    });
    // /////////////////////////// end show home
    function load_task(
        $action = "load",
        $id = 0,
        $name = "",
        $time = "",
        $unit = "",
        $done = 0,
        $page = 1
    ) {
        var url = route("todos");
        $.ajax({
            type: "post",
            url: url,
            data: {
                action: $action,
                id: $id,
                name: $name,
                time: $time,
                unit: $unit,
                done: $done,
                page: $page,
            },
            dataType: "json",
            beforeSend: function () {
                $(".btn_reload--task").html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                );
                $(".btn_reload--task").addClass("--disabled");
            },
            success: function (data) {
                $(".task").html(data.html);
                $(".btn_reload--task").html(
                    '<i class="fas fa-sync-alt pr-2"></i>Làm Mới'
                );
                $(".btn_reload--task").removeClass("--disabled");
                if (data.ok == 1) {
                    $("#add__task").modal("hide");
                    $(prefix_add + "name").val("");
                    $(prefix_add + "time").val("");
                    toastr.success("Thêm Task Thành Công");
                }
                if (data.update == 1) {
                    toastr.success("Cập Nhật Todos Thành Công");
                }
                if (data.load == 1) {
                    toastr.success("Làm Mới Todos Thành Công");
                    $(".task-pages").html(data.page);
                }
                console.log(data);
            },
        });
    }
    // load task
    setInterval(function () {
        load_task(
            ($action = "load"),
            ($id = 0),
            ($name = ""),
            ($time = ""),
            ($unit = ""),
            ($done = 0),
            ($page = $(".task-pages .page-item.active .page-link").attr(
                "data-page"
            ))
        );
    }, 60000);

    // end load task
    $(document).on("click", ".btn_reload--task", function () {
        var page = $(".task-pages .page-item.active .page-link").attr(
            "data-page"
        );
        load_task(
            ($action = "load"),
            ($id = 0),
            ($name = ""),
            ($time = ""),
            ($unit = ""),
            ($done = 0),
            ($page = page)
        );
        return false;
    });
    $(document).on("click", ".task-pages .page-item .page-link ", function () {
        load_task(
            ($action = "load"),
            ($id = 0),
            ($name = ""),
            ($time = ""),
            ($unit = ""),
            ($done = 0),
            ($page = $(this).attr("data-page"))
        );
    });
    $(document).on("click", ".task__item--check", function () {
        var id = $(this).attr("data-id");
        var page = $(".task-pages .page-item.active .page-link").attr(
            "data-page"
        );
        if ($(this).is(":checked")) {
            load_task(
                ($action = "update"),
                ($id = id),
                ($name = ""),
                ($time = ""),
                ($unit = ""),
                ($done = 1),
                ($page = page)
            );
        } else {
            load_task(
                ($action = "update"),
                ($id = id),
                ($name = ""),
                ($time = ""),
                ($unit = ""),
                ($done = 0),
                ($page = page)
            );
        }
    });
    $(document).on("click", prefix_add + "btn", function () {
        var name = $(prefix_add + "name").val();
        var time = $(prefix_add + "time").val();
        var unit = $(prefix_add + "unit").val();
        if (name == "" || time == "") {
            alert("Chưa Điền Đủ Thông Tin");
        } else {
            load_task(
                ($action = "add"),
                ($id = 0),
                ($name = name),
                ($time = time),
                ($unit = unit),
                ($done = 0)
            );
        }
        return false;
    });
    // fullcalender
    var url1 = route("fullcalender");
    var url2 = route("fullcalender_ajax");
    var calendar = $("#calendar").fullCalendar({
        header: {
            left: "prev,next today",
            center: "title",
            right: "month,agendaWeek,agendaDay",
        },

        editable: true,
        events: url1,
        displayEventTime: false,
        editable: true,
        eventRender: function (event, element, view) {
            if (event.allDay === "true") {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt("Tên Sự Kiện:");
            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                $.ajax({
                    url: url2,
                    data: {
                        title: title,
                        start: start,
                        end: end,
                        type: "add",
                    },
                    type: "POST",
                    success: function (data) {
                        displayMessage("Tạo sự kiện thành công");
                        calendar.fullCalendar(
                            "renderEvent",
                            {
                                id: data.id,
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay,
                            },
                            true
                        );
                        calendar.fullCalendar("unselect");
                    },
                });
            }
        },
        eventResize: function (event, delta) {
            var start = $.fullCalendar.formatDate(
                event.start,
                "Y-MM-DD HH:mm:ss"
            );
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            var title = event.title;
            var id = event.id;
            $.ajax({
                url: url2,
                type: "POST",
                data: {
                    title: title,
                    start: start,
                    end: end,
                    id: id,
                    type: "update",
                },
                success: function (response) {
                    displayMessage("Đã cập nhật sự kiện thành công");
                },
            });
        },
        eventDrop: function (event, delta) {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

            $.ajax({
                url: url2,
                data: {
                    title: event.title,
                    start: start,
                    end: end,
                    id: event.id,
                    type: "update",
                },
                type: "POST",
                success: function (response) {
                    displayMessage("Đã cập nhật sự kiện thành công");
                },
            });
        },
        eventClick: function (event) {
            var deleteMsg = confirm("Bạn chắc chắn muốn xoá chứ ?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: url2,
                    data: {
                        id: event.id,
                        type: "delete",
                    },
                    success: function (response) {
                        calendar.fullCalendar("removeEvents", event.id);
                        displayMessage("Đã xoá sự kiện thành công");
                    },
                });
            }
        },
    });

    function displayMessage(message) {
        toastr.success(message, "Sự Kiện");
    }

    // endfullcalender
    // /////////////////////


    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
