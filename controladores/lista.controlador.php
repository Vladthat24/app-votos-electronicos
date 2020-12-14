<?php

class ControladorLista
{

	/*=============================================
	CREAR LISTADO
	=============================================*/

	static public function ctrCrearLista()
	{

		if (isset($_POST["nuevNombre"])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevNombre"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevDescripcion"])

			) {

				$tabla = "tap_lista";

				date_default_timezone_set('America/Lima');

				$fecha = date('d-m-Y');

				$datos = array("nombre" => $_POST["nuevNombre"],
					"descripcion" => $_POST["nuevDescripcion"],
					"fecha_registro" => $fecha);

				$respuesta = ModeloLista::mdlIngresarLista($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({
						  type: "success",
						  title: "La Lista ha sido guardada correctamente,
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "lista";

									}
								})

					</script>';
				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡La Lista no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "lista";

							}
						})

			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR LISTADO
	=============================================*/

	static public function ctrMostrarLista($item, $valor)
	{

		$tabla = "tap_lista";

		$respuesta = ModeloLista::mdlMostrarLista($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR LISTA
	=============================================*/

	static public function ctrEditarLista()
	{

		if (isset($_POST["editarId"])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"])

			) {

				$tabla = "tap_lista";

				$datos = array(
					"nombre" => $_POST["editarNombre"],
					"descripcion" => $_POST["editarDescripcion"],
					"id" => $_POST["editarId"]
				);

				$respuesta = ModeloLista::mdlEditarLista($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({
						  type: "success",
						  title: "La Lista ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "lista";

									}
								})

					</script>';
				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡La Lista no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "lista";

							}
						})

			  	</script>';
			}
		}
	}

	/*=============================================
	BORRAR LISTA
	=============================================*/

	static public function ctrBorrarLista()
	{

		if (isset($_GET["idLista"])) {

			$tabla = "tap_lista";
			$datos = $_GET["idLista"];

			$respuesta = ModeloLista::mdlBorrarLista($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({
						  type: "success",
						  title: "La Lista ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "lista";

									}
								})

					</script>';
			}
		}
	}
}
