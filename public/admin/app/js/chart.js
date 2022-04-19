$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = $("#url__chart").val();
    function load__chart() {
        $.ajax({
            type: "post",
            url: url,
            dataType: "json",
            success: function (data) {
                var month = new Date().getMonth() + 1;
                var year = new Date().getFullYear();
                function get_day_of_month(year, month) {
                    var total_day = new Date(year, month, 0).getDate();
                    var days = [];
                    for ($i = 1; $i <= total_day; $i++) {
                        days.push($i);
                    }
                    return days;
                };
                var days = get_day_of_month(year, month);
                var dataPoints = [];
                var dataPoints2 = [];
                var max = 0;
                var min = Infinity;
                var max2 = 0;
                var min2 = Infinity;
                $.each(data.stats, function (key, val) {
                    if (val.profit > max) {
                        max = val.profit;
                    }
                    if (val.profit < min) {
                        min = val.profit;
                    }
                });
                $.each(data.stats, function (key_2, val_2) {
                    if (val_2.total_day > max) {
                        max2 = val_2.total_day;
                    }
                    if (val_2.total_day < min) {
                        min2 = val_2.total_day;
                    }
                });
                // stats profit all day in month
                var arrayCheck = [];
                $.each(data.stats, function (key2, val2) {

                    dataPoints.push({ x: parseInt(val2.day), y: parseInt(val2.profit) });
                    arrayCheck.push(parseInt(val2.day));
                });
                function inArr($value, $arr) {
                    var value = parseInt($value);
                    var rs = false;
                    $.each($arr, function (key, val) {
                     if (value === parseInt(val)){
                       rs = true;
                     }
                    });
                    return rs;
                }
            //    inArr(4 , arrayCheck);
                $.each(days, function (indexInArray, valueOfElement) {
                    if (!inArr(valueOfElement , arrayCheck)) {
                        dataPoints.push({ x: valueOfElement, y: parseInt(0) });
                    }
                });
                // end stats profit all day in month
                // stats total_day sell all day in month
                // $.each(days, function (indexInArray, valueOfElement) {
                    var arrayCheck2 = [];
                $.each(data.stats, function (key, val) {
                    dataPoints2.push({ x: parseInt(val.day), y: parseInt(val.total_day)})
                    arrayCheck2.push(parseInt(val.day));
                });
                // });
                $.each(days, function (indexInArray, valueOfElement) {
                    if (!inArr(valueOfElement , arrayCheck)) {
                        dataPoints2.push({ x: valueOfElement, y: parseInt(0) });
                    }
                });
                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    exportEnabled: true,
                    theme: "dark2", // "light1", "light2", "dark1", "dark2"
                    title: {
                        text: "Biểu ĐỒ LỢI NHUẬN VÀ DOANH SỐ BÁN TỪNG NGÀY TRONG THÁNG " + data.month + " NĂM " + data.year
                    },
                    axisY: {
                        title: "Lợi nhuận",
                        titleFontColor: "#4F81BC",
                        lineColor: "#4F81BC",
                        labelFontColor: "#4F81BC",
                        tickColor: "#4F81BC"
                    },
                    axisY2: {
                        title: "Tổng tiền bán hàng",
                        titleFontColor: "#00b894",
                        lineColor: "#00b894",
                        labelFontColor: "#00b894",
                        tickColor: "#00b894"
                    },
                    toolTip: {
                        shared: true
                    },
                    legend: {
                        cursor: "pointer",
                    },
                    data: [
                        {
                            type: "column", //change type to bar, line, area, pie, etc
                            name: "Lợi nhuận",
                            legendText: "Lợi Nhuận",
                            showInLegend: true,
                            dataPoints: dataPoints,
                        },
                        {
                            type: "column",
                            name: "Tổng Tiền Bán",
                            legendText: "Tiền Bán",
                            axisYType: "secondary",
                            showInLegend: true,
                            dataPoints: dataPoints2,
                        }
                    ]

                });
                // //////////////////////
                chart.render();
            }
        });
    }
    load__chart();
    setInterval(load__chart, 60000);
    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
