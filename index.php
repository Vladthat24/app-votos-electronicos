<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/roles.controlador.php";
require_once "controladores/votar.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/soporte.controlador.php";
require_once "controladores/lista.controlador.php";
require_once "controladores/detallelista.controlador.php";
require_once "controladores/reporteticket.controlador.php";
require_once "controladores/cargo.controlador.php";
require_once "controladores/acceso.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/roles.modelo.php";
require_once "modelos/votar.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/soporte.modelo.php";
require_once "modelos/lista.modelo.php";
require_once "modelos/detallelista.modelo.php";
require_once "modelos/reporteticket.modelo.php";
require_once "modelos/cargo.modelo.php";
require_once "modelos/acceso.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();
