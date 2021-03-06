/**
 * Created by User on 21.10.2014.
 */

    //var registrationData = [];

    //function getChartData(){
    //    $.getJSON('statistics?chart=reg',function(json){
    //         registrationData = JSON.parse(json);
    //        console.log(registrationData);
    //    });
    //}

function initStatisticCharts() {
    /* FLOT DATA */
    var data1 = [[1, 40], [5, 65], [10, 70], [15, 100], [20, 120], [25, 130], [30, 140], [35, 145], [40, 150], [45, 150]];
    var data2 = [[1, 4], [5, 6], [10, 7], [15, 10], [20, 100], [25, 110], [30, 120], [35, 125], [40, 130], [45, 130]];
    var data3 = [[1, 40], [2, 65], [3, 70], [4, 100], [5, 120]];
    var data4 = [[1, 35], [2, 55], [3, 65], [4, 80], [5, 100]];
    var data5 = [[1, 30], [2, 60], [3, 60], [4, 90], [5, 110]];
    var data6 = [[1, 30], [2, 45], [3, 70], [4, 85], [5, 90]];
    var data7 = [[1, 100], [2, 110], [3, 120], [4, 130], [5, 150]];
    var data8 = [[1, 80], [2, 60], [3, 100], [4, 110], [5, 120]];
    var data9 = [[1, 30], [2, 40], [3, 60], [4, 70], [5, 80]];

    /* DATASET */

    var registrationData = [];

    $.ajaxSetup( { "async": false } );
    $.getJSON('statistics?chart=reg',function(json){
        registrationData = JSON.parse(json);
        //console.log(registrationData);
    });
    $.ajaxSetup( { "async": true } );

    //console.log(registrationData);


    var dataSet1 = [
        {label: "Проектов", data: registrationData[0], color: "#3498db"},
        {label: "Экспертов", data: registrationData[1], color: "#2ecc71"}
    ]
    var dataSet2 = [
        {label: "Label 1", data: data1, color: "#3498db"},
        {label: "Label 2", data: data2, color: "#e74c3c"}
    ]
    var dataSet3 = [
        {label: "Label 1", data: data3, color: "#e74c3c"},
        {label: "Label 2", data: data4, color: "#f39c12"},
        {label: "Label 3", data: data5, color: "#2ecc71"},
        {label: "Label 4", data: data6, color: "#3498db"}
    ]
    var dataSet4 = [
        {label: "Label 1", data: data7, color: "rgba(231, 76, 60, 0.7)"},
        {label: "Label 2", data: data8, color: "rgba(241, 196, 15, 0.6)"},
        {label: "Label 3", data: data9, color: "rgba(46, 204, 113, 0.8)"}
    ]
    var dataSet5 = [
        {label: "Label 1", data: [1, 60], color: "rgba(52, 152, 219, 0.7)"},
        {label: "Label 2", data: [1, 70], color: "rgba(46, 204, 113, 0.7)"},
        {label: "Label 3", data: [1, 40], color: "rgba(231, 76, 60, 0.7)"},
        {label: "Label 4", data: [1, 30], color: "rgba(241, 196, 15, 0.7)"}
    ]
    /* LABEL FORMATTER */
    function labelFormatter(label, series) {
        return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
    }

    /* TOOLTIP */
    var previousPoint = null;
    function showTooltip(x, y, contents) {
        $("<div id='tooltip'>" + contents + "</div>").css({
            position: "absolute",
            display: "none",
            top: y - 30,
            left: x + 5,
            border: "1px solid #000",
            padding: "5px",
            'color':'#fff',
            'border-radius':'2px',
            'font-size':'11px',
            "background-color": "#000",
            opacity: 0.80
        }).appendTo("body").fadeIn(200);
    }

    /* LINE CHART */
    var line_chart = $.plot($("#chart-register-line"), dataSet1, {
        series: {
            lines: {
                show: true,
                lineWidth: 4,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.1
                    }, {
                        opacity: 0.1
                    }
                    ]
                }
            },
            points: {
                show: true
            },
            shadowSize: 3
        },
        legend:{
            show: false
        },
        grid: {
            labelMargin: 10,
            axisMargin: 500,
            hoverable: true,
            clickable: true,
            tickColor: "rgba(0, 0, 0, 0.1)",
            borderWidth: 0
        },
        xaxis: {
            ticks: 0,
            tickDecimals: 0
        },
        yaxis: {
            ticks: 15,
            tickDecimals: 0
        }
    });

    $("#chart-register-line").bind("plothover", function (event, pos, item) {
        if (item) {
            if (previousPoint != item.dataIndex) {
                previousPoint = item.dataIndex;
                $("#tooltip").remove();
                var x = item.datapoint[0].toFixed(0) + " день",
                    y = item.datapoint[1].toFixed(0) + " ";
                showTooltip(item.pageX, item.pageY,
                    item.series.label + " "  + y + ", " + x + " ");
            }
        } else {
            $("#tooltip").remove();
            previousPoint = null;
        }
    });

}
/* JQUERY KNOB */
function initKnob() {
    $(".knob").knob({
        release : function (value) {
            console.log("release : " + value);
        },
        cancel : function () {
            console.log("cancel : ", this);
        },
        draw : function () {
            if(this.$.data('skin') == 'tron') {
                this.cursorExt = 0.3;
                var a = this.arc(this.cv)
                    , pa
                    , r = 1;
                this.g.lineWidth = this.lineWidth;
                if (this.o.displayPrevious) {
                    pa = this.arc(this.v);
                    this.g.beginPath();
                    this.g.strokeStyle = this.pColor;
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
                    this.g.stroke();
                }
                this.g.beginPath();
                this.g.strokeStyle = r ? this.o.fgColor : this.fgColor ;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
                this.g.stroke();
                this.g.lineWidth = 2;
                this.g.beginPath();
                this.g.strokeStyle = this.o.fgColor;
                this.g.arc( this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                this.g.stroke();
                return false;
            }
        }
    });

    var v, up=0,down=0,i=0
        ,$idir = $("div.idir")
        ,$ival = $("div.ival")
        ,incr = function() { i++; $idir.show().html("+").fadeOut(); $ival.html(i); }
        ,decr = function() { i--; $idir.show().html("-").fadeOut(); $ival.html(i); };
    $("input.infinite").knob({
        min : 0
        , max : 20
        , stopper : false
        , change : function () {
            if(v > this.cv){
                if(up){
                    decr();
                    up=0;
                }else{up=1;down=0;}
            } else {
                if(v < this.cv){
                    if(down){
                        incr();
                        down=0;
                    }else{down=1;up=0;}
                }
            }
            v = this.cv;
        }
    });
}
function progress(percent, element) {

    var progressBarWidth =  percent *element.parent().width() / 100;
    element.animate({ width: progressBarWidth }, 500);

}

$(function($) {
    "use strict";

    $('.progress-bar').each(function() {
        var bar = $(this);
        var max = $(this).attr('aria-valuenow');

        progress(max, bar);
    });

    initStatisticCharts();
    initKnob();


});