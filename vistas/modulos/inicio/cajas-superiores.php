<?php
/* 
$item = 'soporte';
$valor = 'JULIO CESAR GUARDIA VILCA';

$julio = ControladorTicket::ctrSumaTicket($item, $valor);
$totalJulio = $julio['count(*)'];

$item2 = 'soporte';
$valor2 = 'CARLOS LUIS GONZAGA ARIAS CONDE';

$carlos = ControladorTicket::ctrSumaTicket($item2, $valor2);
$totalCarlos = $carlos['count(*)'];

$item3 = 'soporte';
$valor3 = 'RUBEN PORFIRIO SALAS MENDOZA';

$ruben = ControladorTicket::ctrSumaTicket($item3, $valor3);
$totalRuben = $ruben['count(*)'];

$item4 = 'soporte';
$valor4 = 'DIEGO FER CHAVEZ HINOJOSA';

$diego = ControladorTicket::ctrSumaTicket($item4, $valor4);
$totalDiego = $diego['count(*)'];

$item5 = 'soporte';
$valor5 = 'JAVIER GERMAN RODRIGUEZ CONDORI';

$javier = ControladorTicket::ctrSumaTicket($item5, $valor5);
$totalJavier = $javier['count(*)'];

$item6 = 'soporte';
$valor6 = 'EDDIE SALGADO LOPEZ';

$eddie = ControladorTicket::ctrSumaTicket($item6, $valor6);
$totalEddie = $eddie['count(*)'];

$item7 = 'soporte';
$valor7 = 'YOSSHI SALVADOR CONDORI MENDIETA';

$yosshi = ControladorTicket::ctrSumaTicket($item7, $valor7);
$totalYosshi = $yosshi['count(*)'];

$truePorAtender = null;
$itemTicketAtendidos = 'id_estado';
$valorTicketAtendidos = 4;
$ticket = ControladorTicket::ctrTicketAtendidos($truePorAtender, $itemTicketAtendidos, $valorTicketAtendidos);
$ticketPorAtender = $ticket['count(*)'];



$trueAtendidos = 1;
$itemTicketAtendidos2 = 'id_estado';
$valorTicketAtendidos2 = 4;
$ticket2 = ControladorTicket::ctrTicketAtendidos($trueAtendidos, $itemTicketAtendidos2, $valorTicketAtendidos2);
$ticketPorAtende2r = $ticket2['count(*)']; */

?>

<div class="col-lg-6 col-xs-12">

    <div class="info-box bg-green">

        <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

        <div class="info-box-content">

            <span class="info-box-text">VOTO EN BLANCO</span>

            <span class="info-box-number"><?php /* echo number_format($ticketPorAtende2r); */ ?></span>

            <!-- The progress section is optional -->
            <div class="progress">

                <div class="progress-bar" style="width: <?php /* echo number_format($ticketPorAtende2r) . '%'; */ ?>"></div>

            </div>
            <span class="progress-description">

                <?php /* echo number_format($ticketPorAtende2r) . '%'; */ ?> desde el lanzamiento del Sistema.
            </span>

        </div>
        <!-- /.info-box-content -->
    </div>

</div>

<div class="col-lg-6 col-xs-12">

    <div class="info-box bg-green">

        <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

        <div class="info-box-content">

            <span class="info-box-text">LISTA 1</span>

            <span class="info-box-number"><?php /* echo number_format($ticketPorAtende2r); */ ?></span>

            <!-- The progress section is optional -->
            <div class="progress">

                <div class="progress-bar" style="width: <?php /* echo number_format($ticketPorAtende2r) . '%'; */ ?>"></div>

            </div>
            <span class="progress-description">

                <?php /* echo number_format($ticketPorAtende2r) . '%'; */ ?> desde el lanzamiento del Sistema.
            </span>

        </div>
        <!-- /.info-box-content -->
    </div>

</div>


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