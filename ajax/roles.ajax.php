<?php

require_once "../controladores/roles.controlador.php";
require_once "../modelos/roles.modelo.php";

class AjaxRoles
{

	/*=============================================
	EDITAR ROLES
	=============================================*/

	public $idRoles;

	public function ajaxEditarRoles()
	{

		$item = "id";
		$valor = $this->idRoles;

		$respuesta = ControladorRoles::ctrMostrarRoles($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR ROLES
=============================================*/
if (isset($_POST["idRoles"])) {

	$roles = new AjaxRoles();
	$roles->idRoles = $_POST["idRoles"];
	$roles->ajaxEditarRoles();
}
