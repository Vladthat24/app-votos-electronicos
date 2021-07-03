<?php

require_once "../controladores/acceso.controlador.php";
require_once "../modelos/acceso.modelo.php";

class AjaxAcceso {
    /* =============================================
      EDITAR USUARIO
      ============================================= */

    public $idAcceso;

    public function ajaxEditarAcceso() {

        $item = "idacceso";
        $valor = $this->idAcceso;

        $respuesta = ControladorAcceso::ctrMostrarAcceso($item, $valor);

        echo json_encode($respuesta);
    }

    /* =============================================
      ACTIVAR USUARIO
      ============================================= */

    public $activarAcceso;
    public $activarId;

    public function ajaxActivarAcceso() {

        $tabla = "tap_acceso";

        $item1 = "estado";
        $valor1 = $this->activarAcceso;

        $item2 = "id";
        $valor2 = $this->activarId;

        $respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);
    }

    /* =============================================
      VALIDAR NO REPETIR USUARIO
      ============================================= */

    public $validarAcceso;

    public function ajaxValidarAcceso() {

        $item = "usuario";
        $valor = $this->validarAcceso;

        $respuesta = ControladorAcceso::ctrMostrarAcceso($item, $valor);

        echo json_encode($respuesta);
    }

    /* =============================================
      VALIDAR NO REPETIR NOMBRE DEL USUARIO
      ============================================= */

    public $validarDni;

    public function ajaxValidarDni() {

        $item = "dni";
        $valor = $this->validarDni;

        $respuesta = ControladorAcceso::ctrMostrarAcceso($item, $valor);

        echo json_encode($respuesta);
    }

}

/* =============================================
  EDITAR USUARIO
  ============================================= */
if (isset($_POST["idAcceso"])) {

    $editar = new AjaxAcceso();
    $editar->idAcceso = $_POST["idAcceso"];
    $editar->ajaxEditarAcceso();
}

/* =============================================
  ACTIVAR USUARIO
  ============================================= */

if (isset($_POST["activarAcceso"])) {

    $activarAcceso = new AjaxAcceso();
    $activarAcceso->activarAcceso = $_POST["activarAcceso"];
    $activarAcceso->activarId = $_POST["activarId"];
    $activarAcceso->ajaxActivarAcceso();
}

/* =============================================
  VALIDAR NO REPETIR USUARIO
  ============================================= */

if (isset($_POST["validarAcceso"])) {

    $valAcceso = new AjaxAcceso();
    $valAcceso->validarUsuario = $_POST["validarAcceso"];
    $valAcceso->ajaxValidarAcceso();
}
/* =============================================
  VALIDAR NO REPETIR NOMBRE DE USUARIO
  ============================================= */

if (isset($_POST["validarDni"])) {

    $valDni = new AjaxAcceso();
    $valDni->validarDni = $_POST["validarDni"];
    $valDni->ajaxValidarDni();
}