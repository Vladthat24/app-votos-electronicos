<?php

class ControladorCargo{

	/*=============================================
	CREAR CARGO
	=============================================*/

	static public function ctrCrearCargo(){

		if(isset($_POST["nuevCargo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevCargo"])){

				$tabla = "tap_cargo";

				date_default_timezone_set('America/Lima');

				$fecha = date('d-m-Y');

				$datos = array("nombre"=>$_POST["nuevCargo"],
								"fecha_registro"=>$fecha
								);

				$respuesta = ModeloCargo::mdlIngresarCargo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Cargo ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cargo";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El cargo no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "cargo";

							}
						})

			  	</script>';

			}

		}else{
			echo '<script>Error Controlador</script>';
		}

	}

	/*=============================================
	MOSTRAR CARGO
	=============================================*/

	static public function ctrMostrarCargo($item, $valor){

		$tabla = "tap_cargo";

		$respuesta = ModeloCargo::mdlMostrarCargo($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR CARGO
	=============================================*/

	static public function ctrEditarCargo(){

		if(isset($_POST["editarCargo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCargo"])){

				$tabla = "tap_cargo";

				$datos = array("nombre"=>$_POST["editarCargo"],
							   "id"=>$_POST["idCargo"]);

				$respuesta = ModeloCargo::mdlEditarCargo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Cargo ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cargo";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Cargo no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "cargo";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CARGO
	=============================================*/

	static public function ctrBorrarCargo(){

		if(isset($_GET["idCargo"])){

			$tabla ="tap_cargo";
			$datos = $_GET["idCargo"];

			$respuesta = ModeloCargo::mdlBorrarCargo($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El Cargo ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cargo";

									}
								})

					</script>';
			}
		}
		
	}
}
