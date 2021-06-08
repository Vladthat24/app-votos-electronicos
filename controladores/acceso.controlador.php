<?php

class ControladorAcceso
{
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
}
