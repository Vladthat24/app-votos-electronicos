<?php

class ControladorAcceso
{

    static public function ctrMostrarAcceso($item, $valor)
    {

        $tabla = "tap_acceso";

        $respuesta = ModeloAcceso::MdlMostrarAcceso($tabla, $item, $valor);

        return $respuesta;
    }


    
    static public function ctrActualizarAcceso( $item1, $valor1, $item2, $valor2)
    {

        $tabla = "tap_acceso";

        $respuesta = ModeloAcceso::mdlActualizarAcceso($tabla, $item1, $valor1, $item2, $valor2)
;
        return $respuesta;
    }
    /* =============================================
      INGRESO DE USUARIO
      ============================================= */

    static public function ctrIngresoAcceso()
    {


        if (isset($_POST["ingUsuario"])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["ingUsuario"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["ingPassword"])
            ) {

                $tabla = "tap_acceso";

                $item = "usuario";



                $valor = $_POST["ingUsuario"];

                $respuesta = ModeloAcceso::mdlMostrarAcceso($tabla, $item, $valor);

                $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');


                if ($respuesta["estadopassword"] == 1) {



                    if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar) {


                        if ($respuesta["estado"] == 1 && $respuesta["estadopassword"] == 1) {



                            $_SESSION["iniciarSesion"] = "ok";
                            $_SESSION["id"] = $respuesta["id"];
                            $_SESSION["idacceso"]=$respuesta["idacceso"];
                            $_SESSION["dni"] = $respuesta["dni"];
                            $_SESSION["datos_completos"] = $respuesta["datos_completos"];
                            $_SESSION["oficina"] = $respuesta["oficina"];
                            $_SESSION["cargo"] = $respuesta["cargo"];
                            $_SESSION["usuario"] = $respuesta["usuario"];
                            $_SESSION["foto"] = $respuesta["foto"];
                            $_SESSION["roles"] = $respuesta["roles"];
                            $_SESSION["estado_voto"] = $respuesta["estado_voto"];


                            /* =============================================
                              REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
                              ============================================= */

                            date_default_timezone_set('America/Bogota');

                            $fecha = date('Y-m-d');
                            $hora = date('H:i:s');

                            $fechaActual = $fecha . ' ' . $hora;

                            $item1 = "ultimo_login";
                            $valor1 = $fechaActual;

                            $item2 = "idempleado";
                            $valor2 = $respuesta["id"];

                            $ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);



                            if ($ultimoLogin == "ok") {

                                echo '<script>
    
                                            window.location = "inicio";
    
                                    </script>';
                            }
                        } else {

                            echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                        }
                    }
                } else {

                    if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar) {
                        var_dump("dentro");
                        
                        $usuario = $respuesta["usuario"];
                        $id=$respuesta["idacceso"];

                        echo '<script>

                        swal({
    
                            type: "success",
                            title: "¡Debe realizar el cambio de su contraseña para continuar!",
                            showConfirmButton: true,
                            confirmButtonText: "Aceptar"
    
                        }).then(function(result){
    
                            if(result.value){
                            
                                window.location = "index.php?ruta=restablecer&id=' . $id . '&usuario=' . $usuario . '";
    
                            }
    
                        });
                    
    
                        </script>';
                    } else {

                        echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                    }
                }
            }
        }
    }

    /* =============================================
    CAMBIAR CONTRASEÑA
      ============================================= */
    static public function ctrCambioPassword()
    {

        if (isset($_POST["id"]) && isset($_POST["usuario"])) {
            if (
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["id"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["usuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])
            ) {
                /* var_dump($_POST["idUsuario"], $_POST["usuario"], $_POST["ingPassword"]); */
                $tabla = "tap_acceso";
                $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');


                $item1 = 'password';
                $valor1 = $encriptar;

                $item2 = "estadopassword";
                $valor2 = 1;

                $item3 = "idacceso";
                $valor3 = $_POST["id"];

                $item4 = "usuario";
                $valor4 = $_POST["usuario"];


                $estadopassword = ModeloAcceso::mdlActualizarEstadoPassword($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3, $item4, $valor4);
                


                if ($estadopassword == "ok") {

                    echo '<script>
  
                      swal({
                            type: "success",
                            title: "Se realizó el cambio de contraseña",
                            showConfirmButton: true,
                            confirmButtonText: "Continuar"
                            }).then(function(result){
                                      if (result.value) {
      
                                      window.location = "login";
      
                                      }
                                  })
      
                      </script>';
                }
            }
        }
    }

    /* =============================================
      REGISTRO DE USUARIO
      ============================================= */

      static public function ctrCrearAcceso()
      {
  
          if (isset($_POST["nuevUsuario"])) {
  
              if (
                  preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevUsuario"]) &&
                  preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevPassword"])
              ) {
  
 
                  $tabla = "tap_acceso";
  
                  date_default_timezone_set('America/Lima');
  
                  $fecha = date('Y-m-d');
                  $hora = date('H:i:s');
  
                  $fechaActual = $fecha . ' ' . $hora;
                  $encriptar = crypt($_POST["nuevPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                  $datos = array(
  
                      "idempleado" => $_POST["nuevColaborador"],
                      "idroles" => $_POST["nuevRoles"],
                      "usuario" => $_POST["nuevUsuario"],
                      "password" => $encriptar,
                      "fecha_registro" => $fechaActual
                  );
  
  
  
                  $respuesta = ModeloAcceso::mdlIngresarAcceso($tabla, $datos);
  
  
                  if ($respuesta == "ok") {
  
                      echo '<script>
  
                      swal({
  
                          type: "success",
                          title: "¡El Acceso ha sido guardado correctamente!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
  
                      }).then(function(result){
  
                          if(result.value){
                          
                              window.location = "acceso";
  
                          }
  
                      });
                  
  
                      </script>';
                  }
              } else {
  
                  echo '<script>
  
                      swal({
  
                          type: "error",
                          title: "¡El Acceso no puede ir vacío o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
  
                      }).then(function(result){
  
                          if(result.value){
                          
                          window.location = "acceso";
  
                          }
  
                      });
                  
  
                  </script>';
              }
          }
      }

    /* =============================================
      REGISTRO DE USUARIO
      ============================================= */

      static public function ctrEditarAcceso()
      {
  
          if (isset($_POST["editarId"])) {
  
              if (
                  preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarUsuario"]) &&
                  preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarPassword"])
              ) {
  
 
                  $tabla = "tap_acceso";
  
                  date_default_timezone_set('America/Lima');
  
                  $fecha = date('Y-m-d');
                  $hora = date('H:i:s');
  
                  $fechaActual = $fecha . ' ' . $hora;

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

                                        window.location = "acceso";

                                        }
                                })

                        </script>';
                    }
                } else {

                    $encriptar = $_POST["passwordActual"];
                }                  
                 


                  $datos = array(
  
                      "idacceso" => $_POST["editarId"],
                      "idroles" => $_POST["editarRoles"],
                      "usuario" => $_POST["editarUsuario"],
                      "password" => $encriptar,
                  );
  
  
  
                  $respuesta = ModeloAcceso::mdlEditarAcceso($tabla, $datos);
  
  
                  if ($respuesta == "ok") {
  
                      echo '<script>
  
                      swal({
  
                          type: "success",
                          title: "¡El Acceso ha sido guardado correctamente!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
  
                      }).then(function(result){
  
                          if(result.value){
                          
                              window.location = "acceso";
  
                          }
  
                      });
                  
  
                      </script>';
                  }
              } else {
  
                  echo '<script>
  
                      swal({
  
                          type: "error",
                          title: "¡El Acceso no puede ir vacío o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
  
                      }).then(function(result){
  
                          if(result.value){
                          
                          window.location = "acceso";
  
                          }
  
                      });
                  
  
                  </script>';
              }
          }
      }

    /* =============================================
      BORRAR ACCESO
      ============================================= */

      static public function ctrBorrarAcceso()
      {
  
          if (isset($_GET["idAcceso"])) {
  
              $tabla = "tap_acceso";
              $datos = $_GET["idAcceso"];
  
            
              $respuesta = ModeloAcceso::mdlBorrarAcceso($tabla, $datos);
  
              if ($respuesta == "ok") {
  
                  echo '<script>
  
                  swal({
                        type: "success",
                        title: "El Acceso ha sido borrado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                                  if (result.value) {
  
                                  window.location = "acceso";
  
                                  }
                              })
  
                  </script>';
              }else{
                echo '<script>

					swal({
						  type: "error",
						  title: "¡Erro al eliminar Acceso!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
                                                        
						

							}
						})

			  	</script>';
              }
          }
      }

}
