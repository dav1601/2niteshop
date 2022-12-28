$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var url = route("ajax_preOrders");
    var prefix = "#preOrder--";
    function load_data(
        $sort = $(prefix + "sort").val(),
        $name = $(prefix + "name").val(),
        $namePrd = $(prefix + "namePrd").val(),
        $phone = $(prefix + "phone").val(),
        $stt = $(prefix + "stt").val(),
        $sttPrd = $(prefix + "sttPrd").val(),
        $deposit = $(prefix + "deposit").val(),
        $delivery = $(prefix + "delivery").val(),
        $page = 1
    ) {
        $.ajax({
            type: "post",
            url: url,
            data: {
                sort: $sort,
                name: $name,
                namePrd: $namePrd,
                delivery: $delivery,
                deposit: $deposit,
                stt: $stt,
                sttPrd: $sttPrd,
                phone: $phone,
                page: $page,
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#table__show--preOrders").html(data.html);
            },
        });
    }
    load_data();
    $(document).on(
        "keyup",
        prefix + "namePrd",
        _.debounce(function () {
            load_data();
        }, 300)
    );
    $(document).on(
        "keyup",
        prefix + "phone",
        _.debounce(function () {
            load_data();
        }, 300)
    );
    $(document).on(
        "keyup",
        prefix + "name",
        _.debounce(function () {
            load_data();
        }, 300)
    );
    $(document).on("change", prefix + "stt", function () {
        load_data();
    });
    $(document).on("change", prefix + "sttPrd", function () {
        load_data();
    });
    $(document).on("change", prefix + "delivery", function () {
        load_data();
    });
    $(document).on("change", prefix + "deposit", function () {
        load_data();
    });
    $(document).on("change", prefix + "sort", function () {
        load_data();
    });
    $(document).on("click", ".page-link", function () {
        load_data(
            ($sort = $(prefix + "sort").val()),
            ($name = $(prefix + "name").val()),
            ($namePrd = $(prefix + "namePrd").val()),
            ($phone = $(prefix + "phone").val()),
            ($stt = $(prefix + "stt").val()),
            ($sttPrd = $(prefix + "sttPrd").val()),
            ($deposit = $(prefix + "deposit").val()),
            ($delivery = $(prefix + "delivery").val()),
            ($page = $(this).attr("data-page"))
        );
        window.scrollTo({ top: $(".card").offset().top, behavior: "smooth" });
    });
    $(document).on(
        "keyup",
        "#price_deposit",
        _.debounce(function () {
            $.format_price($(this).val());
        }, 300)
    );
    $("#datenext input").datetimepicker({
        format: "YYYY-MM-DD HH:mm:ss",
    });
    $(document).on("click", "#show_date_2", function () {
        $("#datenext input").datetimepicker("toggle");
        $("#dateprev input").val("");
    });
    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
