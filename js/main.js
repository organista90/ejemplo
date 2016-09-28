var chart;

$(function (){
    $.ajax({
        success: function(){
            drawPie();
        }
    });
});

function datos_audiencia() {
    $("#tabla_audiencias").dataTable().fnDestroy();
    $('#tabla_audiencias').DataTable({
        "sPaginationType": "full_numbers",
        "language": {
            "url": "./js/vendor/spanish.json"
        },

        "ajax": "./controlador/controlador_datos.php",
        
        "fnServerParams": function ( aoData ) {
            var region = $("#idregion").val();
            var f_inicial = $("#fecha_inicial").val();
            var f_final = $("#fecha_final").val();
            aoData.push( { "name": "id_region", "value": region } );
            aoData.push( { "name": "id_fi", "value": f_inicial });
            aoData.push( { "name": "id_ff", "value": f_final });
        },
        
        "columns": [
            { "data": "id" },
            { "data": "ndistrito" },
            { "data": "udistrito" },
            { "data": "acf" },
            { "data": "ach" },
            { "data": "acs" },
            { "data": "acnc" },
            { "data": "acta" }
        ],
    });
    
    $.ajax({
        success: function(){
            drawPie();
        }
    });
}

function drawPie() {
    var options = {
        chart: {
            renderTo: 'PieChart',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            height: 500,
            width: 900
        },
        title: {
            text: 'Audiencias Tribunal Superior de Justicia'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage}%</b>',
            percentageDecimals: 1
        },
        plotOptions: {
           
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                showInLegend: false
            }
        },
        series: [{
            type: 'pie',
            name: 'Product Popularity',
            data: []
        }]
    }
    
    $.getJSON("./controlador/controlador_estadistica.php", function(json) {
        options.series[0].data = json;
        chart = new Highcharts.Chart(options);
    });
}


