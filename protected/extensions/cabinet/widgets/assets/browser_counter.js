
var dataSet5 = [
    { label: "Chrome", data: [1,10], color: "rgba(113, 198, 21, 0.7)" },
    { label: "Firefox", data: [1,10], color: "rgba(232, 93, 12, 0.7)" },
    { label: "Safari", data: [1,10], color: "rgba(192, 192, 192, 0.7)" },
    { label: "Opera", data: [1,10], color: "rgba(255, 22, 10, 0.7)" },
    { label: "MSIE6", data: [1,10], color: "rgba(119, 158, 255, 0.7)" },
    { label: "MSIE7", data: [1,10], color: "rgba(94, 139, 255, 0.7)" },
    { label: "MSIE8", data: [1,10], color: "rgba(73, 125, 255, 0.7)" },
    { label: "MSIE9", data: [1,10], color: "rgba(58, 114, 255, 0.7)" },
    { label: "MSIE10", data: [1,10], color: "rgba(25, 90, 255, 0.7)" },
    { label: "Trident/7", data: [1,10], color: "rgba(64, 64, 64, 0.7)" }
]
var clients ={  "Chrome":0, "Firefox":0, 'Safari':0, 'Opera':0, 'MSIE6':0, 'MSIE7':0, 'MSIE8':0, 'MSIE9':0, 'MSIE10':0, 'Trident/7':0 } ;

function labelFormatter(label, series) {
    return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
}

function initFlot() {

    var donut_chart = $.plot($("#chart-donut"), dataSet5, {
        series: {
            pie: {
                show: true,
//                innerRadius: 0.3,
                radius: 500,
                label: {
                    show: true,
                    formatter: labelFormatter,
                    threshold: 0.1
                }
            }
        },
        legend: {
            show: false
        },
        grid: {
            hoverable: true
        }
    });
}

$(function(){
    initFlot();
});

jQuery(function($){
    $(".browser_counter").each(function(){

        var ClientsUrl = $(this).data("file");

        setInterval(function() {

            $.getJSON(ClientsUrl,function(json){

                var total = null;
                $.each(json, function(key , value){
                    total +=value;
                    clients[key] = value;
                })

                var i = 0;
                $.each(clients, function(k, val){

                    dataSet5[i]['data'][1]= val;
//                    console.log(dataSet5[i])

                    i++;
                })
//                    console.log(dataSet5);
                initFlot();
        })}, 3000);
    });

});