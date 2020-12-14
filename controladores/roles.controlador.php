<?php

class ControladorRoles{

	/*=============================================
	CREAR ROLES
	=============================================*/

	static public function ctrCrearRoles(){

		if(isset($_POST["nuevRoles"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevRoles"])){

				$tabla = "tap_roles";

				$datos = strtoupper($_POST["nuevRoles"]);

				$respuesta = ModeloRoles::mdlIngresarRoles($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Rol ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "roles";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Rol no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "roles";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR ROLES
	=============================================*/

	static public function ctrMostrarRoles($item, $valor){

		$tabla = "tap_roles";

		$respuesta = ModeloRoles::mdlMostrarRoles($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR ROLES
	=============================================*/

	static public function ctrEditarRoles(){

		if(isset($_POST["editarRoles"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarRoles"])){

				$tabla = "tap_roles";

				$datos = array("nombre"=>$_POST["editarRoles"],
							   "id"=>$_POST["idRoles"]);

				$respuesta = ModeloRoles::mdlEditarRoles($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Rol ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "roles";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Rol no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "roles";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR ROLES
	=============================================*/

	static public function ctrBorrarRoles(){

		if(isset($_GET["idRoles"])){

			$tabla ="tap_roles";
			$datos = $_GET["idRoles"];

			$respuesta = ModeloRoles::mdlBorrarRoles($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El Rol ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "roles";

									}
								})

					</script>';
			}
		}
		
	}
}
