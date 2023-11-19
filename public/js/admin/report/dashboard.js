var Dashboard=function() {
    var e=function(e, t, a, r) {
        if(0!=e.length) {
            var o= {
                type:"line",
                data: {
                    labels:["January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October"],
                    datasets:[ {
                        label: "", borderColor: a, borderWidth: r, pointHoverRadius: 4, pointHoverBorderWidth: 12, pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(), pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(), pointHoverBackgroundColor: mUtil.getColor("danger"), pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.1).rgbString(), fill: !1, data: t
                    }
                    ]
                }
                ,
                options: {
                    title: {
                        display: !1
                    }
                    ,
                    tooltips: {
                        enabled: !1, intersect: !1, mode: "nearest", xPadding: 10, yPadding: 10, caretPadding: 10
                    }
                    ,
                    legend: {
                        display:!1,
                        labels: {
                            usePointStyle: !1
                        }
                    }
                    ,
                    responsive:!0,
                    maintainAspectRatio:!0,
                    hover: {
                        mode: "index"
                    }
                    ,
                    scales: {
                        xAxes:[ {
                            display:!1,
                            gridLines:!1,
                            scaleLabel: {
                                display: !0, labelString: "Month"
                            }
                        }
                        ],
                        yAxes:[ {
                            display:!1,
                            gridLines:!1,
                            scaleLabel: {
                                display: !0, labelString: "Value"
                            }
                            ,
                            ticks: {
                                beginAtZero: !0
                            }
                        }
                        ]
                    }
                    ,
                    elements: {
                        point: {
                            radius: 4, borderWidth: 12
                        }
                    }
                    ,
                    layout: {
                        padding: {
                            left: 0, right: 10, top: 5, bottom: 0
                        }
                    }
                }
            }
            ;
            return new Chart(e, o)
        }
    }
    ,
    t=function() {
        var e= {
            labels:["Label 1",
            "Label 2",
            "Label 3",
            "Label 4",
            "Label 5",
            "Label 6",
            "Label 7",
            "Label 8",
            "Label 9",
            "Label 10",
            "Label 11",
            "Label 12",
            "Label 13",
            "Label 14",
            "Label 15",
            "Label 16"],
            datasets:[ {
                backgroundColor: mUtil.getColor("success"), data: [15, 20, 25, 30, 25, 20, 15, 20, 25, 30, 25, 20, 15, 10, 15, 20]
            }
            ,
            {
                backgroundColor: "#f3f3fb", data: [15, 20, 25, 30, 25, 20, 15, 20, 25, 30, 25, 20, 15, 10, 15, 20]
            }
            ]
        }
        ,
        t=$("#m_chart_daily_sales");
        if(0!=t.length)new Chart(t, {
            type:"bar", data:e, options: {
                title: {
                    display: !1
                }
                , tooltips: {
                    intersect: !1, mode: "nearest", xPadding: 10, yPadding: 10, caretPadding: 10
                }
                , legend: {
                    display: !1
                }
                , responsive:!0, maintainAspectRatio:!1, barRadius:4, scales: {
                    xAxes:[ {
                        display: !1, gridLines: !1, stacked: !0
                    }
                    ], yAxes:[ {
                        display: !1, stacked: !0, gridLines: !1
                    }
                    ]
                }
                , layout: {
                    padding: {
                        left: 0, right: 0, top: 0, bottom: 0
                    }
                }
            }
        }
        )
    }
    ,
    a=function() {
        if(0!=$("#m_chart_profit_share").length) {
            var e=new Chartist.Pie("#m_chart_profit_share", {
                series:[ {
                    value:32, className:"custom", meta: {
                        color: mUtil.getColor("brand")
                    }
                }
                , {
                    value:32, className:"custom", meta: {
                        color: mUtil.getColor("accent")
                    }
                }
                , {
                    value:36, className:"custom", meta: {
                        color: mUtil.getColor("warning")
                    }
                }
                ], labels:[1, 2, 3]
            }
            , {
                donut: !0, donutWidth: 17, showLabel: !1
            }
            );
            e.on("draw", function(e) {
                if("slice"===e.type) {
                    var t=e.element._node.getTotalLength();
                    e.element.attr( {
                        "stroke-dasharray": t+"px "+t+"px"
                    }
                    );
                    var a= {
                        "stroke-dashoffset": {
                            id: "anim"+e.index, dur: 1e3, from: -t+"px", to: "0px", easing: Chartist.Svg.Easing.easeOutQuint, fill: "freeze", stroke: e.meta.color
                        }
                    }
                    ;
                    0!==e.index&&(a["stroke-dashoffset"].begin="anim"+(e.index-1)+".end"), e.element.attr( {
                        "stroke-dashoffset": -t+"px", stroke: e.meta.color
                    }
                    ), e.element.animate(a, !1)
                }
            }
            ),
            e.on("created", function() {
                window.__anim21278907124&&(clearTimeout(window.__anim21278907124), window.__anim21278907124=null), window.__anim21278907124=setTimeout(e.update.bind(e), 15e3)
            }
            )
        }
    }
    ,
    r=function() {
        if(0!=$("#m_chart_sales_stats").length) {
            var e= {
                type:"line",
                data: {
                    labels:["January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December",
                    "January",
                    "February",
                    "March",
                    "April"],
                    datasets:[ {
                        label: "Sales Stats", borderColor: mUtil.getColor("brand"), borderWidth: 2, pointBackgroundColor: mUtil.getColor("brand"), backgroundColor: mUtil.getColor("accent"), pointHoverBackgroundColor: mUtil.getColor("danger"), pointHoverBorderColor: Chart.helpers.color(mUtil.getColor("danger")).alpha(.2).rgbString(), data: [10, 20, 16, 18, 12, 40, 35, 30, 33, 34, 45, 40, 60, 55, 70, 65, 75, 62]
                    }
                    ]
                }
                ,
                options: {
                    title: {
                        display: !1
                    }
                    ,
                    tooltips: {
                        intersect: !1, mode: "nearest", xPadding: 10, yPadding: 10, caretPadding: 10
                    }
                    ,
                    legend: {
                        display:!1,
                        labels: {
                            usePointStyle: !1
                        }
                    }
                    ,
                    responsive:!0,
                    maintainAspectRatio:!1,
                    hover: {
                        mode: "index"
                    }
                    ,
                    scales: {
                        xAxes:[ {
                            display:!1,
                            gridLines:!1,
                            scaleLabel: {
                                display: !0, labelString: "Month"
                            }
                        }
                        ],
                        yAxes:[ {
                            display:!1,
                            gridLines:!1,
                            scaleLabel: {
                                display: !0, labelString: "Value"
                            }
                        }
                        ]
                    }
                    ,
                    elements: {
                        point: {
                            radius: 3, borderWidth: 0, hoverRadius: 8, hoverBorderWidth: 2
                        }
                    }
                }
            }
            ;
            new Chart($("#m_chart_sales_stats"), e)
        }
    }
    ,
    o=function() {
        e($("#m_chart_sales_by_apps_1_1"), [10, 20, -5, 8, -20, -2, -4, 15, 5, 8], mUtil.getColor("accent"), 2),
        e($("#m_chart_sales_by_apps_1_2"), [2, 16, 0, 12, 22, 5, -10, 5, 15, 2], mUtil.getColor("danger"), 2),
        e($("#m_chart_sales_by_apps_1_3"), [15, 5, -10, 5, 16, 22, 6, -6, -12, 5], mUtil.getColor("success"), 2),
        e($("#m_chart_sales_by_apps_1_4"), [8, 18, -12, 12, 22, -2, -14, 16, 18, 2], mUtil.getColor("warning"), 2),
        e($("#m_chart_sales_by_apps_2_1"), [10, 20, -5, 8, -20, -2, -4, 15, 5, 8], mUtil.getColor("danger"), 2),
        e($("#m_chart_sales_by_apps_2_2"), [2, 16, 0, 12, 22, 5, -10, 5, 15, 2], mUtil.getColor("metal"), 2),
        e($("#m_chart_sales_by_apps_2_3"), [15, 5, -10, 5, 16, 22, 6, -6, -12, 5], mUtil.getColor("brand"), 2),
        e($("#m_chart_sales_by_apps_2_4"), [8, 18, -12, 12, 22, -2, -14, 16, 18, 2], mUtil.getColor("info"), 2)
    }
    ,
    l=function() {
        if(0!=$("#m_chart_latest_updates").length) {
            var e=document.getElementById("m_chart_latest_updates").getContext("2d"),
            t= {
                type:"line",
                data: {
                    labels:["January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October"],
                    datasets:[ {
                        label: "Sales Stats", backgroundColor: mUtil.getColor("danger"), borderColor: mUtil.getColor("danger"), pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(), pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(), pointHoverBackgroundColor: mUtil.getColor("accent"), pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.1).rgbString(), data: [10, 14, 12, 16, 9, 11, 13, 9, 13, 15]
                    }
                    ]
                }
                ,
                options: {
                    title: {
                        display: !1
                    }
                    ,
                    tooltips: {
                        intersect: !1, mode: "nearest", xPadding: 10, yPadding: 10, caretPadding: 10
                    }
                    ,
                    legend: {
                        display: !1
                    }
                    ,
                    responsive:!0,
                    maintainAspectRatio:!1,
                    hover: {
                        mode: "index"
                    }
                    ,
                    scales: {
                        xAxes:[ {
                            display:!1,
                            gridLines:!1,
                            scaleLabel: {
                                display: !0, labelString: "Month"
                            }
                        }
                        ],
                        yAxes:[ {
                            display:!1,
                            gridLines:!1,
                            scaleLabel: {
                                display: !0, labelString: "Value"
                            }
                            ,
                            ticks: {
                                beginAtZero: !0
                            }
                        }
                        ]
                    }
                    ,
                    elements: {
                        line: {
                            tension: 1e-7
                        }
                        ,
                        point: {
                            radius: 4, borderWidth: 12
                        }
                    }
                }
            }
            ;
            new Chart(e, t)
        }
    }
    ,
    i=function() {
        if(0!=$("#m_chart_trends_stats").length) {
            var e=document.getElementById("m_chart_trends_stats").getContext("2d"),
            t=e.createLinearGradient(0, 0, 0, 240);
            t.addColorStop(0, Chart.helpers.color("#00c5dc").alpha(.7).rgbString()),
            t.addColorStop(1, Chart.helpers.color("#f2feff").alpha(0).rgbString());
            var a= {
                type:"line",
                data: {
                    labels:["January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "January",
                    "February",
                    "March",
                    "April"],
                    datasets:[ {
                        label: "Sales Stats", backgroundColor: t, borderColor: "#0dc8de", pointBackgroundColor: Chart.helpers.color("#ffffff").alpha(0).rgbString(), pointBorderColor: Chart.helpers.color("#ffffff").alpha(0).rgbString(), pointHoverBackgroundColor: mUtil.getColor("danger"), pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.2).rgbString(), data: [20, 10, 18, 15, 26, 18, 15, 22, 16, 12, 12, 13, 10, 18, 14, 24, 16, 12, 19, 21, 16, 14, 21, 21, 13, 15, 22, 24, 21, 11, 14, 19, 21, 17]
                    }
                    ]
                }
                ,
                options: {
                    title: {
                        display: !1
                    }
                    ,
                    tooltips: {
                        intersect: !1, mode: "nearest", xPadding: 10, yPadding: 10, caretPadding: 10
                    }
                    ,
                    legend: {
                        display: !1
                    }
                    ,
                    responsive:!0,
                    maintainAspectRatio:!1,
                    hover: {
                        mode: "index"
                    }
                    ,
                    scales: {
                        xAxes:[ {
                            display:!1,
                            gridLines:!1,
                            scaleLabel: {
                                display: !0, labelString: "Month"
                            }
                        }
                        ],
                        yAxes:[ {
                            display:!1,
                            gridLines:!1,
                            scaleLabel: {
                                display: !0, labelString: "Value"
                            }
                            ,
                            ticks: {
                                beginAtZero: !0
                            }
                        }
                        ]
                    }
                    ,
                    elements: {
                        line: {
                            tension: .19
                        }
                        ,
                        point: {
                            radius: 4, borderWidth: 12
                        }
                    }
                    ,
                    layout: {
                        padding: {
                            left: 0, right: 0, top: 5, bottom: 0
                        }
                    }
                }
            }
            ;
            new Chart(e, a)
        }
    }
    ,
    n=function() {
        if(0!=$("#m_chart_trends_stats_2").length) {
            var e=document.getElementById("m_chart_trends_stats_2").getContext("2d"),
            t= {
                type:"line",
                data: {
                    labels:["January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "January",
                    "February",
                    "March",
                    "April"],
                    datasets:[ {
                        label: "Sales Stats", backgroundColor: "#d2f5f9", borderColor: mUtil.getColor("brand"), pointBackgroundColor: Chart.helpers.color("#ffffff").alpha(0).rgbString(), pointBorderColor: Chart.helpers.color("#ffffff").alpha(0).rgbString(), pointHoverBackgroundColor: mUtil.getColor("danger"), pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.2).rgbString(), data: [20, 10, 18, 15, 32, 18, 15, 22, 8, 6, 12, 13, 10, 18, 14, 24, 16, 12, 19, 21, 16, 14, 24, 21, 13, 15, 27, 29, 21, 11, 14, 19, 21, 17]
                    }
                    ]
                }
                ,
                options: {
                    title: {
                        display: !1
                    }
                    ,
                    tooltips: {
                        intersect: !1, mode: "nearest", xPadding: 10, yPadding: 10, caretPadding: 10
                    }
                    ,
                    legend: {
                        display: !1
                    }
                    ,
                    responsive:!0,
                    maintainAspectRatio:!1,
                    hover: {
                        mode: "index"
                    }
                    ,
                    scales: {
                        xAxes:[ {
                            display:!1,
                            gridLines:!1,
                            scaleLabel: {
                                display: !0, labelString: "Month"
                            }
                        }
                        ],
                        yAxes:[ {
                            display:!1,
                            gridLines:!1,
                            scaleLabel: {
                                display: !0, labelString: "Value"
                            }
                            ,
                            ticks: {
                                beginAtZero: !0
                            }
                        }
                        ]
                    }
                    ,
                    elements: {
                        line: {
                            tension: .19
                        }
                        ,
                        point: {
                            radius: 4, borderWidth: 12
                        }
                    }
                    ,
                    layout: {
                        padding: {
                            left: 0, right: 0, top: 5, bottom: 0
                        }
                    }
                }
            }
            ;
            new Chart(e, t)
        }
    }
    ,
    s=function() {
        if(0!=$("#m_chart_latest_trends_map").length)try {
            new GMaps( {
                div: "#m_chart_latest_trends_map", lat: -12.043333, lng: -77.028333
            }
            )
        }
        catch(e) {
            console.log(e)
        }
    }
    ,
    d=function() {
        0!=$("#m_chart_revenue_change").length&&Morris.Donut( {
            element:"m_chart_revenue_change", data:[ {
                label: "New York", value: 10
            }
            , {
                label: "London", value: 7
            }
            , {
                label: "Paris", value: 20
            }
            ], colors:[mUtil.getColor("accent"), mUtil.getColor("danger"), mUtil.getColor("brand")]
        }
        )
    }
    ,
    c=function() {
        0!=$("#m_chart_support_tickets").length&&Morris.Donut( {
            element:"m_chart_support_tickets", data:[ {
                label: "Margins", value: 20
            }
            , {
                label: "Profit", value: 70
            }
            , {
                label: "Lost", value: 10
            }
            ], labelColor:"#a7a7c2", colors:[mUtil.getColor("accent"), mUtil.getColor("brand"), mUtil.getColor("danger")]
        }
        )
    }
    ,
    p=function() {
        0!=$("#m_chart_support_tickets2").length&&new Chartist.Pie("#m_chart_support_tickets2", {
            series:[ {
                value:32, className:"custom", meta: {
                    color: mUtil.getColor("brand")
                }
            }
            , {
                value:32, className:"custom", meta: {
                    color: mUtil.getColor("accent")
                }
            }
            , {
                value:36, className:"custom", meta: {
                    color: mUtil.getColor("warning")
                }
            }
            ], labels:[1, 2, 3]
        }
        , {
            donut: !0, donutWidth: 17, showLabel: !1
        }
        ).on("draw", function(e) {
            if("slice"===e.type) {
                var t=e.element._node.getTotalLength();
                e.element.attr( {
                    "stroke-dasharray": t+"px "+t+"px"
                }
                );
                var a= {
                    "stroke-dashoffset": {
                        id: "anim"+e.index, dur: 1e3, from: -t+"px", to: "0px", easing: Chartist.Svg.Easing.easeOutQuint, fill: "freeze", stroke: e.meta.color
                    }
                }
                ;
                0!==e.index&&(a["stroke-dashoffset"].begin="anim"+(e.index-1)+".end"), e.element.attr( {
                    "stroke-dashoffset": -t+"px", stroke: e.meta.color
                }
                ), e.element.animate(a, !1)
            }
        }
        )
    }
    ,
    m=function() {
        if(0!=$("#m_chart_activities").length) {
            var e=document.getElementById("m_chart_activities").getContext("2d"),
            t=e.createLinearGradient(0, 0, 0, 240);
            t.addColorStop(0, Chart.helpers.color("#e14c86").alpha(1).rgbString()),
            t.addColorStop(1, Chart.helpers.color("#e14c86").alpha(.3).rgbString());
            var a= {
                type:"line",
                data: {
                    labels:["January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October"],
                    datasets:[ {
                        label: "Sales Stats", backgroundColor: t, borderColor: "#e13a58", pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(), pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(), pointHoverBackgroundColor: mUtil.getColor("light"), pointHoverBorderColor: Chart.helpers.color("#ffffff").alpha(.1).rgbString(), data: [10, 14, 12, 16, 9, 11, 13, 9, 13, 15]
                    }
                    ]
                }
                ,
                options: {
                    title: {
                        display: !1
                    }
                    ,
                    tooltips: {
                        mode: "nearest", intersect: !1, position: "nearest", xPadding: 10, yPadding: 10, caretPadding: 10
                    }
                    ,
                    legend: {
                        display: !1
                    }
                    ,
                    responsive:!0,
                    maintainAspectRatio:!1,
                    scales: {
                        xAxes:[ {
                            display:!1,
                            gridLines:!1,
                            scaleLabel: {
                                display: !0, labelString: "Month"
                            }
                        }
                        ],
                        yAxes:[ {
                            display:!1,
                            gridLines:!1,
                            scaleLabel: {
                                display: !0, labelString: "Value"
                            }
                            ,
                            ticks: {
                                beginAtZero: !0
                            }
                        }
                        ]
                    }
                    ,
                    elements: {
                        line: {
                            tension: 1e-7
                        }
                        ,
                        point: {
                            radius: 4, borderWidth: 12
                        }
                    }
                    ,
                    layout: {
                        padding: {
                            left: 0, right: 0, top: 10, bottom: 0
                        }
                    }
                }
            }
            ;
            new Chart(e, a)
        }
    }
    ,
    g=function() {
        if(0!=$("#m_chart_bandwidth1").length) {
            var e=document.getElementById("m_chart_bandwidth1").getContext("2d"),
            t=e.createLinearGradient(0, 0, 0, 240);
            t.addColorStop(0, Chart.helpers.color("#d1f1ec").alpha(1).rgbString()),
            t.addColorStop(1, Chart.helpers.color("#d1f1ec").alpha(.3).rgbString());
            var a= {
                type:"line",
                data: {
                    labels:["January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October"],
                    datasets:[ {
                        label: "Bandwidth Stats", backgroundColor: t, borderColor: mUtil.getColor("success"), pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(), pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(), pointHoverBackgroundColor: mUtil.getColor("danger"), pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.1).rgbString(), data: [10, 14, 12, 16, 9, 11, 13, 9, 13, 15]
                    }
                    ]
                }
                ,
                options: {
                    title: {
                        display: !1
                    }
                    ,
                    tooltips: {
                        mode: "nearest", intersect: !1, position: "nearest", xPadding: 10, yPadding: 10, caretPadding: 10
                    }
                    ,
                    legend: {
                        display: !1
                    }
                    ,
                    responsive:!0,
                    maintainAspectRatio:!1,
                    scales: {
                        xAxes:[ {
                            display:!1,
                            gridLines:!1,
                            scaleLabel: {
                                display: !0, labelString: "Month"
                            }
                        }
                        ],
                        yAxes:[ {
                            display:!1,
                            gridLines:!1,
                            scaleLabel: {
                                display: !0, labelString: "Value"
                            }
                            ,
                            ticks: {
                                beginAtZero: !0
                            }
                        }
                        ]
                    }
                    ,
                    elements: {
                        line: {
                            tension: 1e-7
                        }
                        ,
                        point: {
                            radius: 4, borderWidth: 12
                        }
                    }
                    ,
                    layout: {
                        padding: {
                            left: 0, right: 0, top: 10, bottom: 0
                        }
                    }
                }
            }
            ;
            new Chart(e, a)
        }
    }
    ,
    h=function() {
        if(0!=$("#m_chart_bandwidth2").length) {
            var e=document.getElementById("m_chart_bandwidth2").getContext("2d"),
            t=e.createLinearGradient(0, 0, 0, 240);
            t.addColorStop(0, Chart.helpers.color("#ffefce").alpha(1).rgbString()),
            t.addColorStop(1, Chart.helpers.color("#ffefce").alpha(.3).rgbString());
            var a= {
                type:"line",
                data: {
                    labels:["January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October"],
                    datasets:[ {
                        label: "Bandwidth Stats", backgroundColor: t, borderColor: mUtil.getColor("warning"), pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(), pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(), pointHoverBackgroundColor: mUtil.getColor("danger"), pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.1).rgbString(), data: [10, 14, 12, 16, 9, 11, 13, 9, 13, 15]
                    }
                    ]
                }
                ,
                options: {
                    title: {
                        display: !1
                    }
                    ,
                    tooltips: {
                        mode: "nearest", intersect: !1, position: "nearest", xPadding: 10, yPadding: 10, caretPadding: 10
                    }
                    ,
                    legend: {
                        display: !1
                    }
                    ,
                    responsive:!0,
                    maintainAspectRatio:!1,
                    scales: {
                        xAxes:[ {
                            display:!1,
                            gridLines:!1,
                            scaleLabel: {
                                display: !0, labelString: "Month"
                            }
                        }
                        ],
                        yAxes:[ {
                            display:!1,
                            gridLines:!1,
                            scaleLabel: {
                                display: !0, labelString: "Value"
                            }
                            ,
                            ticks: {
                                beginAtZero: !0
                            }
                        }
                        ]
                    }
                    ,
                    elements: {
                        line: {
                            tension: 1e-7
                        }
                        ,
                        point: {
                            radius: 4, borderWidth: 12
                        }
                    }
                    ,
                    layout: {
                        padding: {
                            left: 0, right: 0, top: 10, bottom: 0
                        }
                    }
                }
            }
            ;
            new Chart(e, a)
        }
    }
    ,
    b=function() {
        if(0!=$("#m_chart_adwords_stats").length) {
            var e=document.getElementById("m_chart_adwords_stats").getContext("2d"),
            t=e.createLinearGradient(0, 0, 0, 240);
            t.addColorStop(0, Chart.helpers.color("#ffefce").alpha(1).rgbString()),
            t.addColorStop(1, Chart.helpers.color("#ffefce").alpha(.3).rgbString());
            var a= {
                type:"line",
                data: {
                    labels:["January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October"],
                    datasets:[ {
                        label: "AdWord Clicks", backgroundColor: mUtil.getColor("brand"), borderColor: mUtil.getColor("brand"), pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(), pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(), pointHoverBackgroundColor: mUtil.getColor("danger"), pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.1).rgbString(), data: [12, 16, 9, 18, 13, 12, 18, 12, 15, 17]
                    }
                    ,
                    {
                        label: "AdWords Views", backgroundColor: mUtil.getColor("accent"), borderColor: mUtil.getColor("accent"), pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(), pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(), pointHoverBackgroundColor: mUtil.getColor("danger"), pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.1).rgbString(), data: [10, 14, 12, 16, 9, 11, 13, 9, 13, 15]
                    }
                    ]
                }
                ,
                options: {
                    title: {
                        display: !1
                    }
                    ,
                    tooltips: {
                        mode: "nearest", intersect: !1, position: "nearest", xPadding: 10, yPadding: 10, caretPadding: 10
                    }
                    ,
                    legend: {
                        display: !1
                    }
                    ,
                    responsive:!0,
                    maintainAspectRatio:!1,
                    scales: {
                        xAxes:[ {
                            display:!1,
                            gridLines:!1,
                            scaleLabel: {
                                display: !0, labelString: "Month"
                            }
                        }
                        ],
                        yAxes:[ {
                            stacked:!0,
                            display:!1,
                            gridLines:!1,
                            scaleLabel: {
                                display: !0, labelString: "Value"
                            }
                            ,
                            ticks: {
                                beginAtZero: !0
                            }
                        }
                        ]
                    }
                    ,
                    elements: {
                        line: {
                            tension: 1e-7
                        }
                        ,
                        point: {
                            radius: 4, borderWidth: 12
                        }
                    }
                    ,
                    layout: {
                        padding: {
                            left: 0, right: 0, top: 10, bottom: 0
                        }
                    }
                }
            }
            ;
            new Chart(e, a)
        }
    }
    ,
    u=function() {
        if(0!=$("#m_chart_finance_summary").length) {
            var e=document.getElementById("m_chart_finance_summary").getContext("2d"),
            t= {
                type:"line",
                data: {
                    labels:["January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October"],
                    datasets:[ {
                        label: "AdWords Views", backgroundColor: mUtil.getColor("accent"), borderColor: mUtil.getColor("accent"), pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(), pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(), pointHoverBackgroundColor: mUtil.getColor("danger"), pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.1).rgbString(), data: [10, 14, 12, 16, 9, 11, 13, 9, 13, 15]
                    }
                    ]
                }
                ,
                options: {
                    title: {
                        display: !1
                    }
                    ,
                    tooltips: {
                        mode: "nearest", intersect: !1, position: "nearest", xPadding: 10, yPadding: 10, caretPadding: 10
                    }
                    ,
                    legend: {
                        display: !1
                    }
                    ,
                    responsive:!0,
                    maintainAspectRatio:!1,
                    scales: {
                        xAxes:[ {
                            display:!1,
                            gridLines:!1,
                            scaleLabel: {
                                display: !0, labelString: "Month"
                            }
                        }
                        ],
                        yAxes:[ {
                            display:!1,
                            gridLines:!1,
                            scaleLabel: {
                                display: !0, labelString: "Value"
                            }
                            ,
                            ticks: {
                                beginAtZero: !0
                            }
                        }
                        ]
                    }
                    ,
                    elements: {
                        line: {
                            tension: 1e-7
                        }
                        ,
                        point: {
                            radius: 4, borderWidth: 12
                        }
                    }
                    ,
                    layout: {
                        padding: {
                            left: 0, right: 0, top: 10, bottom: 0
                        }
                    }
                }
            }
            ;
            new Chart(e, t)
        }
    }
    ,
    y=function() {
        e($("#m_chart_quick_stats_1"), [10, 14, 18, 11, 9, 12, 14, 17, 18, 14], mUtil.getColor("brand"), 3),
        e($("#m_chart_quick_stats_2"), [11, 12, 18, 13, 11, 12, 15, 13, 19, 15], mUtil.getColor("danger"), 3),
        e($("#m_chart_quick_stats_3"), [12, 12, 18, 11, 15, 12, 13, 16, 11, 18], mUtil.getColor("success"), 3),
        e($("#m_chart_quick_stats_4"), [11, 9, 13, 18, 13, 15, 14, 13, 18, 15], mUtil.getColor("accent"), 3)
    }
    ,
    f=function() {
        function e(e, a, r) {
            var o="",
            l="";
            a-e<100?(o="Today:", l=e.format("MMM D")): "Yesterday"==r?(o="Yesterday:", l=e.format("MMM D")): l=e.format("MMM D")+" - "+a.format("MMM D"), t.find(".m-subheader__daterange-date").html(l), t.find(".m-subheader__daterange-title").html(o)
        }
        if(0!=$("#m_dashboard_daterangepicker").length) {
            var t=$("#m_dashboard_daterangepicker"),
            a=moment(),
            r=moment();
            t.daterangepicker( {
                startDate:a, endDate:r, opens:"left", ranges: {
                    Today: [moment(), moment()], Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")], "Last 7 Days": [moment().subtract(6, "days"), moment()], "Last 30 Days": [moment().subtract(29, "days"), moment()], "This Month": [moment().startOf("month"), moment().endOf("month")], "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
                }
            }
            , e),
            e(a, r, "")
        }
    }
    ,
    C=function() {
        if(0!==$("#m_datatable_latest_orders").length)$(".m_datatable").mDatatable( {
            data: {
                type:"remote", source: {
                    read: {
                        url: "http://keenthemes.com/metronic/preview/inc/api/datatables/demos/default.php"
                    }
                }
                , pageSize:20, saveState: {
                    cookie: !0, webstorage: !0
                }
                , serverPaging:!0, serverFiltering:!0, serverSorting:!0
            }
            , layout: {
                theme: "default", class: "", scroll: !0, height: 380, footer: !1
            }
            , sortable:!0, filterable:!1, pagination:!0, columns:[ {
                field:"RecordID", title:"#", sortable:!1, width:40, selector: {
                    class: "m-checkbox--solid m-checkbox--brand"
                }
                , textAlign:"center"
            }
            , {
                field:"OrderID", title:"Order ID", sortable:"asc", filterable:!1, width:150, template:"{{OrderID}} - {{ShipCountry}}"
            }
            , {
                field:"ShipName", title:"Ship Name", width:150, responsive: {
                    visible: "lg"
                }
            }
            , {
                field: "ShipDate", title: "Ship Date"
            }
            , {
                field:"Status", title:"Status", width:100, template:function(e) {
                    var t= {
                        1: {
                            title: "Pending", class: "m-badge--brand"
                        }
                        , 2: {
                            title: "Delivered", class: " m-badge--metal"
                        }
                        , 3: {
                            title: "Canceled", class: " m-badge--primary"
                        }
                        , 4: {
                            title: "Success", class: " m-badge--success"
                        }
                        , 5: {
                            title: "Info", class: " m-badge--info"
                        }
                        , 6: {
                            title: "Danger", class: " m-badge--danger"
                        }
                        , 7: {
                            title: "Warning", class: " m-badge--warning"
                        }
                    }
                    ;
                    return'<span class="m-badge '+t[e.Status].class+' m-badge--wide">'+t[e.Status].title+"</span>"
                }
            }
            , {
                field:"Type", title:"Type", width:100, template:function(e) {
                    var t= {
                        1: {
                            title: "Online", state: "danger"
                        }
                        , 2: {
                            title: "Retail", state: "primary"
                        }
                        , 3: {
                            title: "Direct", state: "accent"
                        }
                    }
                    ;
                    return'<span class="m-badge m-badge--'+t[e.Type].state+' m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-'+t[e.Type].state+'">'+t[e.Type].title+"</span>"
                }
            }
            , {
                field:"Actions", width:110, title:"Actions", sortable:!1, overflow:"visible", template:function(e) {
                    return'                        <div class="dropdown '+(e.getDatatable().getPageSize()-e.getIndex()<=4?"dropup": "")+'">                            <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                <i class="la la-ellipsis-h"></i>                            </a>                            <div class="dropdown-menu dropdown-menu-right">                                <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>                                <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>                                <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>                            </div>                        </div>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">                            <i class="la la-edit"></i>                        </a>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">                            <i class="la la-trash"></i>                        </a>                    '
                }
            }
            ]
        }
        )
    }
    ,
    _=function() {
        if(0!==$("#m_calendar").length) {
            var e=moment().startOf("day");
            e.format("YYYY-MM"),
            e.clone().subtract(1, "day").format("YYYY-MM-DD"),
            e.format("YYYY-MM-DD"),
            e.clone().add(1, "day").format("YYYY-MM-DD");
            $("#m_calendar").fullCalendar( {
                header: {
                    left: "prev,next today", center: "title", right: "month,agendaWeek,agendaDay,listWeek"
                }
                , editable:!0, eventLimit:!0, navLinks:!0, defaultDate:moment("2017-09-15"), events:[ {
                    title: "Meeting", start: moment("2017-08-28"), description: "Lorem ipsum dolor sit incid idunt ut", className: "m-fc-event--light m-fc-event--solid-warning"
                }
                , {
                    title: "Conference", description: "Lorem ipsum dolor incid idunt ut labore", start: moment("2017-08-29T13:30:00"), end: moment("2017-08-29T17:30:00"), className: "m-fc-event--accent"
                }
                , {
                    title: "Dinner", start: moment("2017-08-30"), description: "Lorem ipsum dolor sit tempor incid", className: "m-fc-event--light  m-fc-event--solid-danger"
                }
                , {
                    title: "All Day Event", start: moment("2017-09-01"), description: "Lorem ipsum dolor sit incid idunt ut", className: "m-fc-event--danger m-fc-event--solid-focus"
                }
                , {
                    title: "Reporting", description: "Lorem ipsum dolor incid idunt ut labore", start: moment("2017-09-03T13:30:00"), end: moment("2017-09-04T17:30:00"), className: "m-fc-event--accent"
                }
                , {
                    title: "Company Trip", start: moment("2017-09-05"), end: moment("2017-09-07"), description: "Lorem ipsum dolor sit tempor incid", className: "m-fc-event--primary"
                }
                , {
                    title: "ICT Expo 2017 - Product Release", start: moment("2017-09-09"), description: "Lorem ipsum dolor sit tempor inci", className: "m-fc-event--light m-fc-event--solid-primary"
                }
                , {
                    title: "Dinner", start: moment("2017-09-12"), description: "Lorem ipsum dolor sit amet, conse ctetur"
                }
                , {
                    id: 999, title: "Repeating Event", start: moment("2017-09-15T16:00:00"), description: "Lorem ipsum dolor sit ncididunt ut labore", className: "m-fc-event--danger"
                }
                , {
                    id: 1e3, title: "Repeating Event", description: "Lorem ipsum dolor sit amet, labore", start: moment("2017-09-18T19:00:00")
                }
                , {
                    title: "Conference", start: moment("2017-09-20T13:00:00"), end: moment("2017-09-21T19:00:00"), description: "Lorem ipsum dolor eius mod tempor labore", className: "m-fc-event--accent"
                }
                , {
                    title: "Meeting", start: moment("2017-09-11"), description: "Lorem ipsum dolor eiu idunt ut labore"
                }
                , {
                    title: "Lunch", start: moment("2017-09-18"), className: "m-fc-event--info m-fc-event--solid-accent", description: "Lorem ipsum dolor sit amet, ut labore"
                }
                , {
                    title: "Meeting", start: moment("2017-09-24"), className: "m-fc-event--warning", description: "Lorem ipsum conse ctetur adipi scing"
                }
                , {
                    title: "Happy Hour", start: moment("2017-09-24"), className: "m-fc-event--light m-fc-event--solid-focus", description: "Lorem ipsum dolor sit amet, conse ctetur"
                }
                , {
                    title: "Dinner", start: moment("2017-09-24"), className: "m-fc-event--solid-focus m-fc-event--light", description: "Lorem ipsum dolor sit ctetur adipi scing"
                }
                , {
                    title: "Birthday Party", start: moment("2017-09-24"), className: "m-fc-event--primary", description: "Lorem ipsum dolor sit amet, scing"
                }
                , {
                    title: "Company Event", start: moment("2017-09-24"), className: "m-fc-event--danger", description: "Lorem ipsum dolor sit amet, scing"
                }
                , {
                    title: "Click for Google", url: "http://google.com/", start: moment("2017-09-26"), className: "m-fc-event--solid-info m-fc-event--light", description: "Lorem ipsum dolor sit amet, labore"
                }
                ], eventRender:function(e, t) {
                    t.hasClass("fc-day-grid-event")?(t.data("content", e.description), t.data("placement", "top"), mApp.initPopover(t)): t.hasClass("fc-time-grid-event")?t.find(".fc-title").append('<div class="fc-description">'+e.description+"</div>"): 0!==t.find(".fc-list-item-title").lenght&&t.find(".fc-list-item-title").append('<div class="fc-description">'+e.description+"</div>")
                }
            }
            )
        }
    }
    ;
    return {
        init:function() {
            t(),
            a(),
            r(),
            o(),
            l(),
            i(),
            n(),
            s(),
            d(),
            c(),
            p(),
            m(),
            g(),
            h(),
            b(),
            u(),
            y(),
            f(),
            C(),
            _()
        }
    }
}

();
jQuery(document).ready(function() {
    Dashboard.init()
}

);