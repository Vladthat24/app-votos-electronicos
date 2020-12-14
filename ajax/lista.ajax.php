<?php

require_once "../controladores/lista.controlador.php";
require_once "../modelos/lista.modelo.php";

class AjaxLista{

	/*=============================================
	EDITAR LISTA
	=============================================*/	

	public $idLista;

	public function ajaxEditarLista(){

		$item = "id";
		$valor = $this->idLista;

		$respuesta = ControladorLista::ctrMostrarLista($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR LISTA
=============================================*/	
if(isset($_POST["idLista"])){

	$lista = new AjaxLista();
	$lista -> idLista = $_POST["idLista"];
	$lista -> ajaxEditarLista();
}
