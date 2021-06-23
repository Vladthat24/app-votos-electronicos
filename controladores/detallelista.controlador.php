<?php

class ControladorDetalleLista
{

	/*=============================================
	CREAR LISTADO
	=============================================*/

	static public function ctrCrearDetalleLista()
	{

		if (isset($_POST["nuevTrabajador"])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevTrabajador"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevLista"] &&
					preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevCargo"]))

			) {

				$tabla = "tap_detalle_lista";

				date_default_timezone_set('America/Lima');

				$fecha = date('d-m-Y');

				$datos = array(
					"idempleado" => $_POST["nuevTrabajador"],
					"idlista" => $_POST["nuevLista"],
					"idcargo" => $_POST["nuevCargo"],
					"fecha_registro" => $fecha
				);

			

				$respuesta = ModeloDetalleLista::mdlIngresarDetalleLista($tabla, $datos);



				if ($respuesta == "ok") {

					echo '<script>
            
						swal({
							  type: "success",
							  title: "La visita ha sido registrado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then((result) => {
										if (result.value) {

										window.location = "listadetalle";

										}
									})

						</script>';
				} else {
					echo '<script>
            
							swal({
								type: "success",
								title: "Error al Registrar en la BDD, Comunicarse con el Administrador",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
								}).then((result) => {
									if (result.value) {

									

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

	static public function ctrMostrarDetalleLista($item, $valor)
	{

		$tabla = "tap_detalle_lista";

		$respuesta = ModeloDetalleLista::mdlMostrarDetalleLista($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR LISTADO EN MODULO DE VOTO
	=============================================*/

	static public function ctrMostrarDetalleListaVoto($item, $valor)
	{

		$tabla = "tap_detalle_lista";

		$respuesta = ModeloDetalleLista::mdlMostrarDetalleListaVoto($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR LISTA
	=============================================*/

	static public function ctrEditarDetalleLista()
	{

		if (isset($_POST["editarId"])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTrabajador"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarLista"] &&
					preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCargo"]))

			) {

				$tabla = "tap_detalle_lista";

				$datos = array(
					"idempleado" => $_POST["editarTrabajador"],
					"idlista" => $_POST["editarLista"],
					"idcargo" => $_POST["editarCargo"],
					"id" => $_POST["editarId"]
				);

				$respuesta = ModeloDetalleLista::mdlEditarDetalleLista($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({
						  type: "success",
						  title: "La Lista ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "listadetalle";

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

							window.location = "listadetalle";

							}
						})

			  	</script>';
			}
		}
	}

	/*=============================================
	BORRAR LISTA
	=============================================*/

	static public function ctrBorrarDetalleLista()
	{

		if (isset($_GET["idDetalleLista"])) {

			$tabla = "tap_detalle_lista";
			$datos = $_GET["idDetalleLista"];

			$respuesta = ModeloDetalleLista::mdlBorrarDetalleLista($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({
						  type: "success",
						  title: "La Lista ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "listadetalle";

									}
								})

					</script>';
			}
		}
	}
}
