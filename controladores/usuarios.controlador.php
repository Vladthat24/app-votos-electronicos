<?php

class ControladorUsuarios
{
    /* =============================================
      INGRESO DE USUARIO
      ============================================= */

    static public function ctrIngresoUsuario()
    {

        if (isset($_POST["ingUsuario"])) {

            if (
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])
            ) {

                $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "tap_empleado";

                $item = "usuario";
                //                $item = "nombre";
                $valor = $_POST["ingUsuario"];


                $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);





                if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar) {

                    if ($respuesta["estado"] == 1) {

                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["id"] = $respuesta["id"];
                        $_SESSION["dni"] = $respuesta["dni"];
                        $_SESSION["datos_completos"] = $respuesta["datos_completos"];
                        $_SESSION["oficina"] = $respuesta["oficina"];
                        $_SESSION["cargo"] = $respuesta["cargo"];
                        $_SESSION["usuario"] = $respuesta["usuario"];
                        $_SESSION["foto"] = $respuesta["foto"];
                        $_SESSION["roles"] = $respuesta["roles"];

                        /* =============================================
                          REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
                          ============================================= */

                        date_default_timezone_set('America/Bogota');

                        $fecha = date('Y-m-d');
                        $hora = date('H:i:s');

                        $fechaActual = $fecha . ' ' . $hora;

                        $item1 = "ultimo_login";
                        $valor1 = $fechaActual;

                        $item2 = "id";
                        $valor2 = $respuesta["id"];

                        $ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

                        if ($ultimoLogin == "ok") {

                            echo '<script>

                                        window.location = "inicio";

                                </script>';
                        }
                    } else {

                        echo '<br>
                        <div class="alert alert-danger">El usuario aún no está activado</div>';
                    }
                } else {

                    echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                }
            }
        }
    }

    /* =============================================
      REGISTRO DE USUARIO
      ============================================= */

    static public function ctrCrearUsuario()
    {

        if (isset($_POST["nuevUsuario"])) {

            if (
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["dni"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevDatosCompletos"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevOficina"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevCargo"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevPassword"])
            ) {


                /* =============================================
                  VALIDAR IMAGEN
                  ============================================= */

                $ruta = "";

                if (isset($_FILES["nuevaFoto"]["tmp_name"])) {


                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);


                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

                    $directorio = "vistas/img/usuarios/" . $_POST["nuevUsuario"];

                    mkdir($directorio, 0755);

                    /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

                    if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "vistas/img/usuarios/" . $_POST["nuevUsuario"] . "/" . $aleatorio . ".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["nuevaFoto"]["type"] == "image/png") {

                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "vistas/img/usuarios/" . $_POST["nuevUsuario"] . "/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    }
                }

                $tabla = "tap_empleado";

                date_default_timezone_set('America/Lima');

                $fecha = date('d-m-Y');


                $encriptar = crypt($_POST["nuevPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datos = array(

                    "datos_completos" => $_POST["nuevDatosCompletos"],
                    "dni" => $_POST["dni"],
                    "oficina" => $_POST["nuevOficina"],
                    "cargo" => $_POST["nuevCargo"],
                    "foto" => $ruta,
                    "idroles" => $_POST["nuevRoles"],
                    "usuario" => $_POST["nuevUsuario"],
                    "password" => $encriptar,
                    "fecha_registro" => $fecha
                );



                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);



                if ($respuesta == "ok") {

                    echo '<script>

					swal({

						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

					</script>';
                }
            } else {

                echo '<script>

					swal({

						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
						window.location = "usuarios";

						}

					});
				

				</script>';
            }
        }
    }

    /* =============================================
      MOSTRAR USUARIO
      ============================================= */

    static public function ctrMostrarUsuarios($item, $valor)
    {

        $tabla = "tap_empleado";

        $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrMostrarUsuariosPersonal($item, $item2, $valor)
    {

        $tabla = "tap_empleado";

        $respuesta = ModeloUsuarios::mdlMostrarUsarioPersonal($tabla, $item, $item2, $valor);

        return $respuesta;
    }

    /* =============================================
      EDITAR USUARIO
      ============================================= */

    static public function ctrEditarUsuario()
    {

        if (isset($_POST["editarId"])) {

            if (
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarDni"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDatosCompletos"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarOficina"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCargo"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])
            ) {
                /* =============================================
                  VALIDAR IMAGEN
                  ============================================= */

                $ruta = $_POST["fotoActual"];

                if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /* =============================================
                      CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                      ============================================= */

                    $directorio = "vistas/img/usuarios/" . $_POST["editarUsuario"];

                    /* =============================================
                      PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
                      ============================================= */

                    if (!empty($_POST["fotoActual"])) {

                        unlink($_POST["fotoActual"]);
                    } else {

                        mkdir($directorio, 0755);
                    }

                    /* =============================================
                      DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                      ============================================= */

                    if ($_FILES["editarFoto"]["type"] == "image/jpeg") {

                        /* =============================================
                          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                          ============================================= */

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "vistas/img/usuarios/" . $_POST["editarUsuario"] . "/" . $aleatorio . ".jpg";

                        $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["editarFoto"]["type"] == "image/png") {

                        /* =============================================
                          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                          ============================================= */

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "vistas/img/usuarios/" . $_POST["editarUsuario"] . "/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    }
                }

                $tabla = "tap_empleado";

                if ($_POST["editarPassword"] != "") {

                    if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])) {

                        $encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                    } else {

                        echo '<script>

                        swal({
                                  type: "error",
                                  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                        if (result.value) {

                                        window.location = "usuarios";

                                        }
                                })

                        </script>';
                    }
                } else {

                    $encriptar = $_POST["passwordActual"];
                }


                $datos = array(
                    "id" => $_POST["editarId"],
                    "dni" => $_POST["editarDni"],
                    "datos_completos" => $_POST["editarDatosCompletos"],
                    "oficina" => $_POST["editarOficina"],
                    "cargo" => $_POST["editarCargo"],
                    "foto" => $ruta,
                    "idroles" => $_POST["editarRoles"],
                    "usuario" => $_POST["editarUsuario"],
                    "password" => $encriptar,

                );

                $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "El usuario ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "usuarios";

									}
								})

					</script>';
                }
            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
                                                        
							window.location = "usuarios";

							}
						})

			  	</script>';
            }
        }
    }

    /* =============================================
      BORRAR USUARIO
      ============================================= */

    static public function ctrBorrarUsuario()
    {

        if (isset($_GET["idUsuario"])) {

            $tabla = "tap_empleado";
            $datos = $_GET["idUsuario"];

            if ($_GET["fotoUsuario"] != "") {

                unlink($_GET["fotoUsuario"]);
                rmdir('vistas/img/usuarios/' . $_GET["usuario"]);
            }

            $respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "usuarios";

								}
							})

				</script>';
            }
        }
    }
}
