<?php

require_once "../controladores/ticket.controlador.php";
require_once "../modelos/ticket.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/soporte.controlador.php";
require_once "../modelos/soporte.modelo.php";

require_once "../controladores/estado.controlador.php";
require_once "../modelos/estado.modelo.php";

class AjaxTicket {
    /* =============================================
      GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
      ============================================= */

    public $idCategoria;

    public function ajaxCrearCodigoTicket() {

        $item = "id_categoria";
        $valor = $this->idCategoria;
        $item2=null;
        $valor2=null;
        $respuesta = ControladorTicket::ctrMostrarTicket($item,$valor,$item2,$valor2);

        echo json_encode($respuesta);
    }

    /* =============================================
      EDITAR TICKET
      ============================================= */

    public $idTicket;

    public function ajaxEditarTicket() {


        $item = "id";
        $valor = $this->idTicket;
        $item2 = null;
        $valor2 = null;

        $respuesta = ControladorTicket::ctrMostrarTicket($item, $valor, $item2, $valor2);
        echo json_encode($respuesta);
    }

    /* =============================================
      EDITAR TICKET TERMINADO
      ============================================= */

   

//    public function ajaxEditarTicketTerminado() {
//
//
//        $item = "id";
//        $valor = $this->idTicket;
//        $item2 = null;
//        $valor2 = null;
//
//        $respuesta = ControladorTicketInactivo::ctrMostrarTicket($item, $valor, $item2, $valor2);
//        echo json_encode($respuesta);
//    }

}

/* =============================================
  GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
  ============================================= */

if (isset($_POST["idCategoria"])) {

    $codigoTicket = new AjaxTicket();
    $codigoTicket->idCategoria = $_POST["idCategoria"];
    $codigoTicket->ajaxCrearCodigoTicket();
}
/* =============================================
  EDITAR TICKET
  ============================================= */

if (isset($_POST["idTicket"])) {

    $editarTicket = new AjaxTicket();
    $editarTicket->idTicket = $_POST["idTicket"];
    $editarTicket->ajaxEditarTicket();
}
//if (isset($_POST["idTicket"])) {
//
//    $editarTicket = new AjaxTicket();
//    $editarTicket->idTicket = $_POST["idTicket"];
//    $editarTicket->ajaxEditarTicketTerminado();
//}





