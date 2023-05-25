$(function () {
    init();
   

    function initDateTimePicker(selector) {
        $("#task-datetime").datetimepicker({
            minDateTime: true,
        });
    }
    function init() {
        handle_task();
        initPlugin();
    }
    function initPlugin() {
        initDateTimePicker();
    }
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
    function handle_task(dataAjax = {}) {
        return $.ajax({
            type: "post",
            url: route("todos"),
            data: dataAjax,
            dataType: "json",
            success: function (res) {
                $("#my_tasks").html(res.html);
                let allCountDown = $(".task-countdown");
                const currentPage = $(".task-pages")
                    .find(".active")
                    .children()
                    .attr("data-page");

                $.each(allCountDown, function (i, el) {
                    let task = JSON.parse($(el).attr("data-task"));
                    $(el)
                        .countdown(task.deadline, function (event) {
                            $(el).html(
                                event.strftime("%m months %d days %H:%M:%S")
                            );
                        })
                        .on("finish.countdown", function (event) {
                            let dataAjax = {
                                page: currentPage,
                            };
                            handle_task(dataAjax);
                        });
                });
            },
        });
    }
    // load task

    // end load task

    $(document).on(
        "click",
        ".task-pages .page-item .page-link ",
        function () {}
    );
    $(document).on("click", ".task__item--check", function () {
        const currentPage = $(".task-pages")
            .find(".active")
            .children()
            .attr("data-page");
        const id = $(this).attr("data-id");
        const ajax = {
            id: id,
            page: currentPage,
            action: "task-done",
        };
        handle_task(ajax);
    });
    $(document).on("click", "#add-task", function () {
        let content = $("#task-content").val();
        let datetime = $("#task-datetime").val();
        if (!content || !datetime) {
            return alert("Thông tin task chưa đúng");
        }
        let dataAjax = {
            action: "add-task",
            page: 1,
            payload: {
                content: content,
                datetime: datetime,
            },
        };
        $.btn_loading_v2($(this), true);
        handle_task(dataAjax).then((res) => {
            $("#add__task").modal("hide");
            $("#task-content").val("");
            $("#task-datetime").val("");
            $.btn_loading_v2($(this), false);
        });
    });
    // fullcalender
    var url1 = route("fullcalender");
    var url2 = route("fullcalender_ajax");
    if (route().current("dashboard")) {
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
                var end = $.fullCalendar.formatDate(
                    event.end,
                    "Y-MM-DD HH:mm:ss"
                );
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
    }

    function displayMessage(message) {
        toastr.success(message, "Sự Kiện");
    }

    // endfullcalender
    // /////////////////////

    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
