<?php

require_once "../controladores/cargo.controlador.php";
require_once "../modelos/cargo.modelo.php";

class AjaxCargo{

	/*=============================================
	EDITAR CARGO
	=============================================*/	

	public $idCargo;

	public function ajaxEditarCargo(){

		$item = "id";
		$valor = $this->idCargo;

		$respuesta = ControladorCargo::ctrMostrarCargo($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CARGO
=============================================*/	
if(isset($_POST["idCargo"])){

	$cargo = new AjaxCargo();
	$cargo -> idCargo = $_POST["idCargo"];
	$cargo -> ajaxEditarCargo();
}