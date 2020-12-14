<?php

class ControladorTicket
{
  /* =============================================
      MOSTRAR TICKET DE ACUERDO AL PERIL
      ============================================= */

  static public function ctrMostrarTicket($item, $valor, $item2, $valor2)
  {

    $tabla = "ticket";

    $respuesta = ModeloTicket::mdlMostrarTicket($tabla, $item, $valor, $item2, $valor2);

    return $respuesta;
  }

  static public function ctrMostrarTicket_usuario($item, $item2, $valor, $item3, $valor3)
  {

    $tabla = "ticket";

    $respuesta = ModeloTicket::mdlMostrarTicket_usuario($tabla, $item, $item2, $valor, $item3, $valor3);

    return $respuesta;
  }

  static public function ctrMostrarTicket_informatico($item, $item2, $valor, $item3, $valor3)
  {

    $tabla = "ticket";

    $respuesta = ModeloTicket::mdlMostrarTicket_informatico($tabla, $item, $item2, $valor, $item3, $valor3);

    return $respuesta;
  }

  /* =============================================
      CREAR TICKET
      ============================================= */

  static public function ctrCrearTicket()
  {

    if (isset($_POST["nuevaDescripcion"])) {

      if ($_POST["nuevaDescripcion"]) {

        /* =============================================
                  VALIDAR IMAGEN
                  ============================================= */

        $ruta = "vistas/img/productos/default/anonymous.png";

        if (isset($_FILES["nuevaImagen"]["tmp_name"])) {

          list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);

          $nuevoAncho = 500;
          $nuevoAlto = 500;

          /* =============================================
                      CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                      ============================================= */

          $directorio = "vistas/img/productos/" . $_POST["nuevoCodigo"];

          mkdir($directorio, 0755);

          /* =============================================
                      DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                      ============================================= */

          if ($_FILES["nuevaImagen"]["type"] == "image/jpeg") {

            /* =============================================
                          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                          ============================================= */

            $aleatorio = mt_rand(100, 999);

            $ruta = "vistas/img/productos/" . $_POST["nuevoCodigo"] . "/" . $aleatorio . ".jpg";

            $origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagejpeg($destino, $ruta);
          }

          if ($_FILES["nuevaImagen"]["type"] == "image/png") {

            /* =============================================
                          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                          ============================================= */

            $aleatorio = mt_rand(100, 999);

            $ruta = "vistas/img/productos/" . $_POST["nuevoCodigo"] . "/" . $aleatorio . ".png";

            $origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagepng($destino, $ruta);
          }
        }
        date_default_timezone_set('America/Lima');

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $fechaActual = $fecha . ' ' . $hora;

        $tabla = "ticket";

        $datos = array(
          "id_categoria" => $_POST["nuevaCategoria"],
          "codigo" => $_POST["nuevoCodigo"],
          "descripcion" => $_POST["nuevaDescripcion"],
          "observacion" => $_POST["nuevaObservacion"],
          "nombre" => $_POST["nuevaNombre"],
          "oficina" => $_POST["nuevaOficina"],
          "area" => $_POST["nuevaArea"],
          "cargo" => $_POST["nuevaCargo"],
          "cel" => $_POST["nuevaCel"],
          "sede" => $_POST["nuevaSede"],
          "piso" => $_POST["nuevaPiso"],
          "id_soporte" => $_POST["nuevaSoporte"],
          "soporte" => $_POST["nuevaSoporte"],
          "id_estado" => $_POST["nuevaEstado"],
          "imagen" => $ruta,
          "fecha" => $fechaActual
        );

        $respuesta = ModeloTicket::mdlIngresarTicket($tabla, $datos);

        if ($respuesta == "ok") {

          echo '<script>

						swal({
							  type: "success",
							  title: "El Ticket ha sido generado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then((result) => {
										if (result.value) {

										window.location = "ticket";

										}
                  })
                  
						</script>';
        }
      } else {

        echo '<script>

					swal({
						  type: "error",
						  title: "¡El Ticket no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then((result) => {
							if (result.value) {

							window.location = "ticket";

							}
						})

			  	</script>';
      }
    }
  }

  /* =============================================
      EDITAR TICKET
      ============================================= */

  static public function ctrEditarTicket()
  {

    if (isset($_POST["editarDescripcion"])) {

      if ($_POST["editarDescripcion"]) {

        /* =============================================
                  VALIDAR IMAGEN
                  ============================================= */

        $ruta = $_POST["imagenActual"];

        if (isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])) {

          list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);

          $nuevoAncho = 500;
          $nuevoAlto = 500;

          /* =============================================
                      CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                      ============================================= */

          $directorio = "vistas/img/productos/" . $_POST["editarCodigo"];

          /* =============================================
                      PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
                      ============================================= */

          if (!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/productos/default/anonymous.png") {

            unlink($_POST["imagenActual"]);
          } else {

            mkdir($directorio, 0755);
          }

          /* =============================================
                      DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                      ============================================= */

          if ($_FILES["editarImagen"]["type"] == "image/jpeg") {

            /* =============================================
                          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                          ============================================= */

            $aleatorio = mt_rand(100, 999);

            $ruta = "vistas/img/productos/" . $_POST["editarCodigo"] . "/" . $aleatorio . ".jpg";

            $origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagejpeg($destino, $ruta);
          }

          if ($_FILES["editarImagen"]["type"] == "image/png") {

            /* =============================================
                          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                          ============================================= */

            $aleatorio = mt_rand(100, 999);

            $ruta = "vistas/img/productos/" . $_POST["editarCodigo"] . "/" . $aleatorio . ".png";

            $origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagepng($destino, $ruta);
          }
        }

        $tabla = "ticket";

        $datos = array(
          "id_categoria" => $_POST["editarCategoria"],
          "codigo" => $_POST["editarCodigo"],
          "descripcion" => $_POST["editarDescripcion"],
          "observacion" => $_POST["editarObservacion"],
          "nombre" => $_POST["editarNombre"],
          "oficina" => $_POST["editarOficina"],
          "area" => $_POST["editarArea"],
          "cargo" => $_POST["editarCargo"],
          "cel" => $_POST["editarCel"],
          "sede" => $_POST["editarSede"],
          "piso" => $_POST["editarPiso"],
          "id_soporte" => $_POST["editarSoporte"],
          "soporte" => $_POST["editarSoporte"],
          "id_estado" => $_POST["editarEstado"],
          "imagen" => $ruta
        );

        $respuesta = ModeloTicket::mdlEditarTicket($tabla, $datos);

        if ($respuesta == "ok") {

          echo '<script>

						swal({
							  type: "success",
							  title: "El ticket ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then((result) => {
										if (result.value) {

										window.location = "ticket";

										}
									})

						</script>';
        }
      } else {

        echo '<script>

					swal({
						  type: "error",
						  title: "¡El ticket no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then((result) => {
							if (result.value) {

							window.location = "ticket";

							}
						})

			  	</script>';
      }
    }
  }

  /* =============================================
      BORRAR PRODUCTO
      ============================================= */

  static public function ctrEliminarTicket()
  {

    if (isset($_GET["idTicket"])) {

      $tabla = "ticket";
      $datos = $_GET["idTicket"];

      if ($_GET["imagen"] != "" && $_GET["imagen"] != "vistas/img/productos/default/anonymous.png") {

        unlink($_GET["imagen"]);
        rmdir('vistas/img/productos/' . $_GET["codigo"]);
      }

      $respuesta = ModeloTicket::mdlEliminarTicket($tabla, $datos);

      if ($respuesta == "ok") {

        echo '<script>

				swal({
					  type: "success",
					  title: "El Ticket ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								window.location = "ticket";

								}
							})

				</script>';
      }
    }
  }


  /*=============================================
	SUMA TOTAL VENTAS
	=============================================*/

  static public function ctrSumaTicket($item, $valor)
  {
    $tabla = "ticket";

    $respuesta = ModeloTicket::mdlSumaTicket($tabla, $item, $valor);

    return $respuesta;
  }

  /*=============================================
	ATENCION DE TICKET
	=============================================*/

  static public function ctrTicketAtendidos($true, $item, $valor)
  {
    $tabla = "ticket";

    $respuesta = ModeloTicket::mdlTicketAtendidos($tabla, $true, $item, $valor);

    return $respuesta;
  }
}

class ControladorTicketInactivo
{

  static public function ctrMostrarTicket($item, $valor, $item2, $valor2)
  {

    $tabla = "ticket";

    $respuesta = ModeloTicketInactivo::mdlMostrarTicket($tabla, $item, $valor, $item2, $valor2);

    return $respuesta;
  }

  static public function ctrMostrarTicket_usuario($item, $item2, $valor, $item3, $valor3)
  {

    $tabla = "ticket";

    $respuesta = ModeloTicketInactivo::mdlMostrarTicket_usuario($tabla, $item, $item2, $valor, $item3, $valor3);

    return $respuesta;
  }

  static public function ctrMostrarTicket_informatico($item, $item2, $valor, $item3, $valor3)
  {

    $tabla = "ticket";

    $respuesta = ModeloTicketInactivo::mdlMostrarTicket_informatico($tabla, $item, $item2, $valor, $item3, $valor3);

    return $respuesta;
  }
}
