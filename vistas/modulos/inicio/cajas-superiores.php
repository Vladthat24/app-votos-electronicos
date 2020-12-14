<?php

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
$ticketPorAtende2r = $ticket2['count(*)'];

?>

<div class="col-lg-12 col-xs-12">

    <div class="info-box bg-green">

        <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

        <div class="info-box-content">

            <span class="info-box-text">TIKCETS ATENDIDOS</span>

            <span class="info-box-number"><?php echo number_format($ticketPorAtende2r); ?></span>

            <!-- The progress section is optional -->
            <div class="progress">

                <div class="progress-bar" style="width: <?php echo number_format($ticketPorAtende2r) . '%'; ?>"></div>

            </div>
            <span class="progress-description">

                <?php echo number_format($ticketPorAtende2r) . '%'; ?> desde el lanzamiento del Sistema.
            </span>

        </div>
        <!-- /.info-box-content -->
    </div>

</div>
<div class="col-lg-12 col-xs-12">

    <div class="info-box bg-red">

        <span class="info-box-icon"><i class="fa fa-thumbs-o-down"></i></span>

        <div class="info-box-content">

            <span class="info-box-text">TIKCETS POR ATENDER</span>

            <span class="info-box-number"><?php echo number_format($ticketPorAtender); ?></span>

            <!-- The progress section is optional -->
            <div class="progress">

                <div class="progress-bar" style="width: <?php echo number_format($ticketPorAtender) . '%'; ?>"></div>

            </div>
            <span class="progress-description">

                <?php echo number_format($ticketPorAtender) . '%'; ?> desde el lanzamiento del Sistema.
            </span>

        </div>
        <!-- /.info-box-content -->
    </div>

</div>


<div class="col-lg-3 col-xs-12">

    <div class="small-box bg-aqua">

        <div class="inner">

            <h3><?php echo number_format($totalJulio); ?></h3>
            <p>JULIO CESAR GUARDIA VILCA</p>
            <h4 style="text-align: center">SOPORTE</h4>

        </div>

        <div class="icon">

            <i class="ion ion-person-add"></i>

        </div>

        <a href="ticket" class="small-box-footer">

            Más info <i class="fa fa-arrow-circle-right"></i>

        </a>

    </div>

</div>

<div class="col-lg-3 col-xs-12">

    <div class="small-box bg-green">

        <div class="inner">

            <h3><?php echo number_format($totalCarlos); ?></h3>

            <p>CARLOS LUIS GONZAGA ARIAS CONDE</p>
            <h4 style="text-align: center">SOPORTE Y REDES</h4>

        </div>

        <div class="icon">

            <i class="ion ion-person-add"></i>

        </div>

        <a href="ticket" class="small-box-footer">

            Más info <i class="fa fa-arrow-circle-right"></i>

        </a>

    </div>

</div>

<div class="col-lg-3 col-xs-12">

    <div class="small-box bg-yellow">

        <div class="inner">

            <h3><?php echo number_format($totalRuben); ?></h3>

            <p>RUBEN PORFIRIO SALAS MENDOZA</p>
            <h4 style="text-align: center">SOPORTE Y REDES</h4>

        </div>

        <div class="icon">

            <i class="ion ion-person-add"></i>

        </div>

        <a href="ticket" class="small-box-footer">

            Más info <i class="fa fa-arrow-circle-right"></i>

        </a>

    </div>

</div>

<div class="col-lg-3 col-xs-12">

    <div class="small-box bg-red">

        <div class="inner">

            <h3><?php echo number_format($totalDiego); ?></h3>

            <p>DIEGO FER CHAVEZ HINOJOSA</p>
            <h4 style="text-align: center">SOPORTE Y REDES</h4>

        </div>

        <div class="icon">

            <i class="ion ion-person-add"></i>

        </div>

        <a href="ticket" class="small-box-footer">

            Más info <i class="fa fa-arrow-circle-right"></i>

        </a>

    </div>

</div>
<div class="col-lg-3 col-xs-12">

    <div class="small-box bg-red">

        <div class="inner">

            <h3><?php echo number_format($totalJavier); ?></h3>

            <p>JAVIER GERMAN RODRIGUEZ CONDORI</p>
            <h4 style="text-align: center">SOPORTE Y REDES</h4>

        </div>

        <div class="icon">

            <i class="ion ion-person-add"></i>

        </div>

        <a href="ticket" class="small-box-footer">

            Más info <i class="fa fa-arrow-circle-right"></i>

        </a>

    </div>

</div>

<div class="col-lg-3 col-xs-12">

    <div class="small-box bg-yellow">

        <div class="inner">

            <h4>ADMINISTRADOR</h4>

            <p>EDDIE SALGADO LOPEZ</p>
            <h4 style="text-align: center">JEFE REDES</h4>

        </div>

        <div class="icon">

            <i class="ion ion-person-add"></i>

        </div>

        <a href="ticket" class="small-box-footer">

            Más info <i class="fa fa-arrow-circle-right"></i>

        </a>

    </div>

</div>

<div class="col-lg-3 col-xs-12">

    <div class="small-box bg-green">

        <div class="inner">

            <h3><?php echo number_format($totalYosshi); ?></h3>

            <p>YOSSHI SALVADOR CONDORI MENDIETA</p>
            <h4 style="text-align: center">DESARROLLO Y SOPORTE</h4>

        </div>

        <div class="icon">

            <i class="ion ion-person-add"></i>

        </div>

        <a href="ticket" class="small-box-footer">

            Más info <i class="fa fa-arrow-circle-right"></i>

        </a>

    </div>

</div>
<div class="col-lg-3 col-xs-12">

    <div class="small-box bg-aqua">

        <div class="inner">

            <h4>ADMINISTRADOR</h4>
            <p>LUIS ALBERTO GIUDICHE ESCUDERO</p>
            <h4 style="text-align: center">JEFE SOPORTE </h4>

        </div>

        <div class="icon">

            <i class="ion ion-person-add"></i>

        </div>

        <a href="ticket" class="small-box-footer">

            Más info <i class="fa fa-arrow-circle-right"></i>

        </a>

    </div>

</div>

<div class="col-lg-12 col-xs-12">

    <div class="small-box bg-aqua">

        <div class="inner">

            <h2 style="text-align: center">Plataforma Tecnológica - Atención de Incidencias Informáticas</h2>
        
            <h4 style="text-align: center">ETF - Tecnologia de la Información-Área de Programación y Desarrollo Informático</h4>

        </div>

        <a href="ticket" class="small-box-footer">

            Más info <i class="fa fa-arrow-circle-right"></i>

        </a>

    </div>

</div>


