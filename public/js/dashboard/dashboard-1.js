(function ($) {
    /* "use strict" */

    var dzChartlist = (function () {
        var screenWidth = $(window).width();

        var lineChart = function () {
            var options = {
                series: [
                    {
                        name: "Income",
                        data: [420, 550, 850, 220, 650],
                    },
                    {
                        name: "Expenses",
                        data: [170, 850, 101, 90, 250],
                    },
                ],
                chart: {
                    type: "bar",
                    height: 350,
                    toolbar: {
                        show: false,
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "55%",
                        endingShape: "rounded",
                    },
                },
                dataLabels: {
                    enabled: false,
                },

                legend: {
                    show: true,
                    fontSize: "12px",
                    fontWeight: 300,

                    labels: {
                        colors: "black",
                    },
                    position: "bottom",
                    horizontalAlign: "center",
                    markers: {
                        width: 19,
                        height: 19,
                        strokeWidth: 0,
                        radius: 19,
                        strokeColor: "#fff",
                        fillColors: ["#369DC9", "#D45BFF"],
                        offsetX: 0,
                        offsetY: 0,
                    },
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: "#3e4954",
                            fontSize: "14px",
                            fontFamily: "Poppins",
                            fontWeight: 100,
                        },
                    },
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ["transparent"],
                },
                xaxis: {
                    categories: ["06", "07", "08", "09", "10"],
                },
                fill: {
                    colors: ["#369DC9", "#D45BFF"],
                    opacity: 1,
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return "$ " + val + " thousands";
                        },
                    },
                },
            };

            var chart = new ApexCharts(
                document.querySelector("#line-chart"),
                options
            );
            chart.render();
        };
        const full_url = window.location.href;
        const base_url = full_url.slice(0, full_url.lastIndexOf("/"));
        let xData, yData;

        $.ajax({
            url: `${base_url}/risk-chart`,
            cache: false,
            success: function (data) {
                xData = data.risk;
                yData = data.count;
            },
        });

        var chartBar = function () {
            var optionsArea = {
                series: [
                    {
                        name: "Risk Count",
                        data: yData,
                    },
                ],
                chart: {
                    height: 350,
                    type: "bar",
                    group: "social",
                    toolbar: {
                        show: false,
                    },
                    zoom: {
                        enabled: false,
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                legend: {
                    tooltipHoverFormatter: function (val, opts) {
                        return (
                            val +
                            " - " +
                            opts.w.globals.series[opts.seriesIndex][
                                opts.dataPointIndex
                            ] +
                            ""
                        );
                    },
                    markers: {
                        fillColors: ["#F46B68"],
                        width: 19,
                        height: 19,
                        strokeWidth: 0,
                        radius: 19,
                    },
                },
                markers: {
                    size: 6,
                    border: 0,
                    colors: ["#F46B68"],
                    hover: {
                        size: 6,
                    },
                },
                xaxis: {
                    categories: xData,
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: "#3e4954",
                            fontSize: "14px",
                            fontFamily: "Poppins",
                            fontWeight: 100,
                        },
                    },
                },
                fill: {
                    colors: ["#F46B68"],
                    type: "solid",
                },
                grid: {
                    borderColor: "#f1f1f1",
                },
            };
            var chartArea = new ApexCharts(
                document.querySelector("#chartBar"),
                optionsArea
            );
            chartArea.render();
        };

        /* Function ============ */
        return {
            init: function () {},

            load: function () {
                lineChart();
                chartBar();
            },

            resize: function () {},
        };
    })();

    jQuery(document).ready(function () {});

    jQuery(window).on("load", function () {
        setTimeout(function () {
            dzChartlist.load();
        }, 1000);
    });

    jQuery(window).on("resize", function () {});
})(jQuery);
