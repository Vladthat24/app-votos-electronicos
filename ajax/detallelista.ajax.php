<?php

require_once "../controladores/detallelista.controlador.php";
require_once "../modelos/detallelista.modelo.php";

class AjaxDetalleLista
{

	/*=============================================
	EDITAR LISTA
	=============================================*/

	public $idDetalleLista;

	public function ajaxEditarDetalleLista()
	{

		$item = "id";
		$valor = $this->idDetalleLista;

		$respuesta = ControladorDetalleLista::ctrMostrarDetalleLista($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR LISTA
=============================================*/
if (isset($_POST["idDetalleLista"])) {

	$detallelista = new AjaxDetalleLista();
	$detallelista->idDetalleLista = $_POST["idDetalleLista"];
	$detallelista->ajaxEditarDetalleLista();
}
