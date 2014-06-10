var Charts = function () {
    return {
        //main function to initiate the module
        init: function () {
            App.addResponsiveHandler(function () {
                 Charts.initPieCharts();
            });

        },
        initCharts: function () {
            if (!jQuery.plot) {
                return;
            }
            var data = [];
            var totalPoints = 250;
            // random data generator for plot charts
            function getRandomData() {
                if (data.length > 0) data = data.slice(1);
                // do a random walk
                while (data.length < totalPoints) {
                    var prev = data.length > 0 ? data[data.length - 1] : 50;
                    var y = prev + Math.random() * 10 - 5;
                    if (y < 0) y = 0;
                    if (y > 100) y = 100;
                    data.push(y);
                }
                // zip the generated y values with the x values
                var res = [];
                for (var i = 0; i < data.length; ++i) res.push([i, data[i]])
                return res;
            }
            //Basic Chart
            function chart1() {
                var d1 = [];
                for (var i = 0; i < Math.PI * 2; i += 0.25)
                    d1.push([i, Math.sin(i)]);
                var d2 = [];
                for (var i = 0; i < Math.PI * 2; i += 0.25)
                    d2.push([i, Math.cos(i)]);
                var d3 = [];
                for (var i = 0; i < Math.PI * 2; i += 0.1)
                    d3.push([i, Math.tan(i)]);
                $.plot($("#chart_1"), [{
                            label: "sin(x)",
                            data: d1
                        }, {
                            label: "cos(x)",
                            data: d2
                        }, {
                            label: "tan(x)",
                            data: d3
                        }
                    ], {
                        series: {
                            lines: {
                                show: true
                            },
                            points: {
                                show: true
                            }
                        },
                        xaxis: {
                            ticks: [0, [Math.PI / 2, "\u03c0/2"],
                                [Math.PI, "\u03c0"],
                                [Math.PI * 3 / 2, "3\u03c0/2"],
                                [Math.PI * 2, "2\u03c0"]
                            ]
                        },
                        yaxis: {
                            ticks: 10,
                            min: -2,
                            max: 2
                        },
                        grid: {
                            backgroundColor: {
                                colors: ["#fff", "#eee"]
                            }
                        }
                    });
            }
            //Interactive Chart
            function chart2() {//burdaki veriler ile çiziyo sanırım
                function randValue() {
                    return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;
                }
                var visitors = customer_data;
                var plot = $.plot($("#site-statistics"), [{
                            data: pageviews,
                            label: "Unique Visits"
                        }, {
                            data: visitors,
                            label: "Page Views"
                        }
                    ], {
                        series: {
                            lines: {
                                show: true,
                                lineWidth: 2,
                                fill: true,
                                fillColor: {
                                    colors: [{
                                            opacity: 0.05
                                        }, {
                                            opacity: 0.01
                                        }
                                    ]
                                }
                            },
                            points: {
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#eee",
                            borderWidth: 0
                        },
                        colors: ["#d12610", "#37b7f3", "#52e136"],
                        xaxis: {
                            ticks: 11,
                            tickDecimals: 0
                        },
                        yaxis: {
                            ticks: 11,
                            tickDecimals: 0
                        }
                    });

                function showTooltip(x, y, contents) {
                    $('<div id="tooltip">' + contents + '</div>').css({
                            position: 'absolute',
                            display: 'none',
                            top: y + 5,
                            left: x + 15,
                            border: '1px solid #333',
                            padding: '4px',
                            color: '#fff',
                            'border-radius': '3px',
                            'background-color': '#333',
                            opacity: 0.80
                        }).appendTo("body").fadeIn(200);
                }
                var previousPoint = null;
                $("#chart_2").bind("plothover", function (event, pos, item) {
                    $("#x").text(pos.x.toFixed(2));
                    $("#y").text(pos.y.toFixed(2));
                    if (item) {
                        if (previousPoint != item.dataIndex) {
                            previousPoint = item.dataIndex;
                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);
                            showTooltip(item.pageX, item.pageY, item.series.label + " of " + x + " = " + y);
                        }
                    } else {
                        $("#tooltip").remove();
                        previousPoint = null;
                    }
                });
            }
            //Tracking Curves
            function chart3() {
                //tracking curves:
                var sin = [],
                    cos = [];
                for (var i = 0; i < 14; i += 0.1) {
                    sin.push([i, Math.sin(i)]);
                    cos.push([i, Math.cos(i)]);
                }
                plot = $.plot($("#chart_3"), [{
                            data: sin,
                            label: "sin(x) = -0.00"
                        }, {
                            data: cos,
                            label: "cos(x) = -0.00"
                        }
                    ], {
                        series: {
                            lines: {
                                show: true
                            }
                        },
                        crosshair: {
                            mode: "x"
                        },
                        grid: {
                            hoverable: true,
                            autoHighlight: false
                        },
                        yaxis: {
                            min: -1.2,
                            max: 1.2
                        }
                    });
                var legends = $("#chart_3 .legendLabel");
                legends.each(function () {
                    $(this).css('width', $(this).width());
                });
                var updateLegendTimeout = null;
                var latestPosition = null;
                function updateLegend() {
                    updateLegendTimeout = null;
                    var pos = latestPosition;
                    var axes = plot.getAxes();
                    if (pos.x < axes.xaxis.min || pos.x > axes.xaxis.max || pos.y < axes.yaxis.min || pos.y > axes.yaxis.max) return;
                    var i, j, dataset = plot.getData();
                    for (i = 0; i < dataset.length; ++i) {
                        var series = dataset[i];
                        // find the nearest points, x-wise
                        for (j = 0; j < series.data.length; ++j)
                            if (series.data[j][0] > pos.x) break;
                            // now interpolate
                        var y, p1 = series.data[j - 1],
                            p2 = series.data[j];
                        if (p1 == null) y = p2[1];
                        else if (p2 == null) y = p1[1];
                        else y = p1[1] + (p2[1] - p1[1]) * (pos.x - p1[0]) / (p2[0] - p1[0]);
                        legends.eq(i).text(series.label.replace(/=.*/, "= " + y.toFixed(2)));
                    }
                }
                $("#chart_3").bind("plothover", function (event, pos, item) {
                    latestPosition = pos;
                    if (!updateLegendTimeout) updateLegendTimeout = setTimeout(updateLegend, 50);
                });
            }
            //Dynamic Chart
            function chart4() {
                //server load
                var options = {
                    series: {
                        shadowSize: 1
                    },
                    lines: {
                        show: true,
                        lineWidth: 0.5,
                        fill: true,
                        fillColor: {
                            colors: [{
                                    opacity: 0.1
                                }, {
                                    opacity: 1
                                }
                            ]
                        }
                    },
                    yaxis: {
                        min: 0,
                        max: 100,
                        tickFormatter: function (v) {
                            return v + "%";
                        }
                    },
                    xaxis: {
                        show: false
                    },
                    colors: ["#6ef146"],
                    grid: {
                        tickColor: "#a8a3a3",
                        borderWidth: 0
                    }
                };
                var updateInterval = 30;
                var plot = $.plot($("#chart_4"), [getRandomData()], options);
                function update() {
                    plot.setData([getRandomData()]);
                    plot.draw();
                    setTimeout(update, updateInterval);
                }
                update();
            }
            //bars with controls
            function chart5() {
                var d1 = [];
                for (var i = 0; i <= 10; i += 1)
                    d1.push([i, parseInt(Math.random() * 30)]);
                var d2 = [];
                for (var i = 0; i <= 10; i += 1)
                    d2.push([i, parseInt(Math.random() * 30)]);
                var d3 = [];
                for (var i = 0; i <= 10; i += 1)
                    d3.push([i, parseInt(Math.random() * 30)]);
                var stack = 0,
                    bars = true,
                    lines = false,
                    steps = false;
                function plotWithOptions() {
                    $.plot($("#chart_5"), [d1, d2, d3], {
                            series: {
                                stack: stack,
                                lines: {
                                    show: lines,
                                    fill: true,
                                    steps: steps
                                },
                                bars: {
                                    show: bars,
                                    barWidth: 0.6
                                }
                            }
                        });
                }
                $(".stackControls input").click(function (e) {
                    e.preventDefault();
                    stack = $(this).val() == "With stacking" ? true : null;
                    plotWithOptions();
                });
                $(".graphControls input").click(function (e) {
                    e.preventDefault();
                    bars = $(this).val().indexOf("Bars") != -1;
                    lines = $(this).val().indexOf("Lines") != -1;
                    steps = $(this).val().indexOf("steps") != -1;
                    plotWithOptions();
                });
                plotWithOptions();
            }
            //graph
            chart1();
            chart2();
            chart3();
            chart4();
            chart5();
        },
        initBarCharts: function () {
            // bar chart:
            var data1 = GenerateSeries(0);

            function GenerateSeries(added){
                var data = [];
                var start = 100 + added;
                var end = 200 + added;

                for(i=1;i<=20;i++){
                    var d = Math.floor(Math.random() * (end - start + 1) + start);
                    data.push([i, d]);
                    start++;
                    end++;
                }

                return data;
            }

            var options = {
                    series:{
                        bars:{show: true}
                    },
                    bars:{
                          barWidth:0.8
                    },
                    grid:{
                        backgroundColor: { colors: ["#fafafa", "#35aa47"] }
                    }
            };

            $.plot($("#chart_1_1"), [data1], options);
            // horizontal bar chart:
            var data1 = [
                [10, 10], [20, 20], [30, 30], [40, 40], [50, 50]
            ];

            var options = {
                    series:{
                        bars:{show: true}
                    },
                    bars:{
                        horizontal:true,
                        barWidth:6
                    },
                    grid:{
                        backgroundColor: { colors: ["#fafafa", "#4b8df8"] }
                    }
            };

            $.plot($("#chart_1_2"), [data1], options);
        },
        initPieCharts: function () {
             if (!jQuery.plot) {
                return;
            }
            var data = [];
            var datas = [];
            var datasTotal = []
            var series = 3;

            $.ajax({
                url: base_url + 'reports/getProposals',
                async: false,
            }).done(function(result){
                result = $.parseJSON(result);

                datas[0] = {
                        label: "Taslaklar",
                        data: result[0].total
                    }
                datas[1] = {
                        label: "Reddedilenler",
                        data: result[1].total
                    }
                datas[2] = {
                        label: "Onaylanan",
                        data: result[2].total
                    }

                 $.plot($("#pie_chart_1"), datas, {
                    series: {
                        pie: {
                            show: true
                        }
                    },
                    legend: {
                        show: false
                    }
                });

            });

            $.ajax({
                url: base_url + 'reports/getProposalsTotal',
                async: false,
            }).done(function(resultTotal){
                resultTotal = $.parseJSON(resultTotal);
                datasTotal[0] = {
                        label: "Toplam taslak teklifler : " + resultTotal[0],
                        data: resultTotal[0]
                    }
                datasTotal[1] = {
                        label: "Toplam reddedilen teklifler : " + resultTotal[1],
                        data: resultTotal[1]
                    }
                datasTotal[2] = {
                        label: "Toplam onaylanan teklifler : " + resultTotal[2],
                        data: resultTotal[2]
                    }
                datasTotal[3] = {
                        label: "Toplam gönderilen teklifler : " + resultTotal[3],
                        data: resultTotal[3]
                    }

                $.plot($("#pie_chart"), datasTotal, {
                    series: {
                        pie: {
                            show: true
                        }
                    }
                });

            });




           

            function pieHover(event, pos, obj) {
            if (!obj)
                    return;
                percent = parseFloat(obj.series.percent).toFixed(2);
                $("#hover").html('<span style="font-weight: bold; color: ' + obj.series.color + '">' + obj.series.label + ' (' + percent + '%)</span>');
            }
            function pieClick(event, pos, obj) {
                if (!obj)
                    return;
                percent = parseFloat(obj.series.percent).toFixed(2);
                alert('' + obj.series.label + ': ' + percent + '%');
            }
        }

    };
}();