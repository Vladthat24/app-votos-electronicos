<?php

require_once "../../controladores/plantilla.controlador.php";
require_once "../../controladores/usuarios.controlador.php";
require_once "../../controladores/votar.controlador.php";



require_once "../../modelos/usuarios.modelo.php";
require_once "../../modelos/votar.modelo.php";


$reporte = new ControladorVotar();
$reporte -> ctrDescargarReporte();




