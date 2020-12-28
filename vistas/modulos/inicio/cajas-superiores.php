<?php

date_default_timezone_set('America/Lima');
$hora = date("H:i");
$dia = date("w");


if ($_SESSION["roles"] == "ADMINISTRADOR") {

    $item = null;
    $valor = null;

    $voto = ControladorVotar::ctrMostrarVoto($item, $valor);



    foreach ($voto as $key => $value) {

        echo '    
    <div class="col-lg-6 col-xs-6">

        <div class="info-box bg-green">

            <span class="info-box-icon"><i class="fa fa-users"></i></span>

            <div class="info-box-content">

                <span class="info-box-text">' . $value["nombre"] . '</span>

                <span class="info-box-number">' . $value["valor"] . '</span>

                <!-- The progress section is optional -->
                <div class="progress">

                    <div class="progress-bar" style="width:' . number_format($value["valor"]) . '%;"></div>

                </div>
                <span class="progress-description">

                   ' . $value["valor"] . ' desde el lanzamiento del Sistema.
                </span>

            </div>
            <!-- /.info-box-content -->
        </div>

    </div>';
    }
} else if ($_SESSION["roles"] == "COMITE ELECTORAL") {

    if ($hora >= '01:00' && $hora <= '01:20') {

        $item = null;
        $valor = null;

        $voto = ControladorVotar::ctrMostrarVoto($item, $valor);



        foreach ($voto as $key => $value) {

            echo '    
        <div class="col-lg-6 col-xs-6">
    
            <div class="info-box bg-green">
    
                <span class="info-box-icon"><i class="fa fa-users"></i></span>
    
                <div class="info-box-content">
    
                    <span class="info-box-text">' . $value["nombre"] . '</span>
    
                    <span class="info-box-number">' . $value["valor"] . '</span>
    
                    <!-- The progress section is optional -->
                    <div class="progress">
    
                        <div class="progress-bar" style="width:' . number_format($value["valor"]) . '%;"></div>
    
                    </div>
                    <span class="progress-description">
    
                       ' . $value["valor"] . ' desde el lanzamiento del Sistema.
                    </span>
    
                </div>
                <!-- /.info-box-content -->
            </div>
    
        </div>';
        }
    }
} else {
}



?>

<div class="col-lg-12 col-xs-12">

    <div class="small-box bg-aqua">

        <div class="inner">

            <h2 style="text-align: center">Plataforma Tecnológica - Voto Online</h2>

            <h4 style="text-align: center">ETF - Tecnologia de la Información-Área de Programación y Desarrollo Informático</h4>

        </div>

        <a href="votar" class="small-box-footer">

            Más info <i class="fa fa-arrow-circle-right"></i>

        </a>

    </div>

</div>