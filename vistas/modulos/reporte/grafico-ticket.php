<?php
error_reporting(0);
if (isset($_GET["fechaInicial"])) {

    $fechaInicial = $_GET["fechaInicial"];

    $fechaFinal = $_GET["fechaFinal"];
} else {

    $fechaInicial = null;

    $fechaFinal = null;
}

$respuesta = ControladorReporteTicket::ctrReporteTicket($fechaInicial, $fechaFinal);


$arrayFechas = array();
$sumaTicketMes = array();


foreach ($respuesta as $key => $value) {

    #solo capturamos el año y
    $fecha = substr($value["fecha"], 0, 7);

    #introducir las fechas en arrayFechas
    array_push($arrayFechas, $fecha);

    #Capturamos las ventas
    $arrayTicket = array($fecha => $value["id"]);


    #Sumamos los Ticket que ocurrieron el mismo mes
    foreach ($arrayTicket as $key => $value) {

        $sumaTicketMes[$key] += $value;
    }
}

$noRepetirFechas = array_unique($arrayFechas);

?>
<!--=====================================
GRÁFICO DE VENTAS
======================================-->


<div class="box box-solid bg-teal-gradient">

    <div class="box-header">

        <i class="fa fa-th"></i>

        <h3 class="box-title">Gráfico de Ticket</h3>

    </div>

    <div class="box-body border-radius-none nuevoGraficoVentas">

        <div class="chart" id="line-chart-ticket" style="height: 250px;"></div>

    </div>

</div>

<script>
    var line = new Morris.Line({
        element: 'line-chart-ticket',
        resize: true,
        data: [

            <?php

            if ($noRepetirFechas != null) {

                foreach ($noRepetirFechas as $key) {

                    echo "{ y: '" . $key . "', ticket: " . $sumaTicketMes[$key] . " },";
                }

                echo "{y: '" . $key . "', ticket: " . $sumaTicketMes[$key] . " }";
            } else {

                echo "{ y: '0', ticket: '0' }";
            }

            ?>

        ],

        xkey: 'y',
        ykeys: ['ticket'],
        labels: ['ticket'],
        lineColors: ['#efefef'],
        lineWidth: 2,
        hideHover: 'auto',
        gridTextColor: '#fff',
        gridStrokeWidth: 0.4,
        pointSize: 4,
        pointStrokeColors: ['#efefef'],
        gridLineColor: '#efefef',
        gridTextFamily: 'Open Sans',
        preUnits: '$',
        gridTextSize: 10
    });
</script>