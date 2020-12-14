<?php

@session_start();
require_once "../controladores/ticket.controlador.php";
require_once "../modelos/ticket.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/estado.controlador.php";
require_once "../modelos/estado.modelo.php";

require_once "../controladores/soporte.controlador.php";
require_once "../modelos/soporte.modelo.php";

class TablaTicket {
    /* =============================================
      MOSTRAR LA TABLA DE TICKET
      ============================================= */

    public function mostrarTablaTicket() {

        if ($_SESSION["perfil"] == "Administrador") {

            $item = null;
            $valor = null;
            $item2 = "id_estado";
            $valor2 = 4;
            $ticket = ControladorTicket::ctrMostrarTicket($item, $valor, $item2, $valor2);

            if (count($ticket) == 0) {

                echo '{"data": []}';

                return;
            }

            $datosJson = '{
		  "data": [';

            for ($i = 0; $i < count($ticket); $i++) {

                /* =============================================
                  TRAEMOS LA IMAGEN
                  ============================================= */

                $imagen = "<a href='" . $ticket[$i]["imagen"] . "' onclick='windows.open()'><img src='" . $ticket[$i]["imagen"] . "' width='40px'></a>";

                /* =============================================
                  TRAEMOS LA CATEGORIA
                  ============================================= */

                $item = "id";
                $valor = $ticket[$i]["id_categoria"];

                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
                /* =============================================
                  TRAEMOS SOPORTE
                  ============================================= */
                $item = "soporte";
                $valor = $ticket[$i]["soporte"];

                $soporte = ControladorSoporte::ctrMostrarSoporte($item, $valor);
                /* =============================================
                  TRAEMOS ESTADO
                  ============================================= */
                $item = "id";
                $valor = $ticket[$i]["id_estado"];

                $estado = ControladorEstado::ctrMostrarEstado($item, $valor);
                $estado2 = "<div type='button' class='btn btn-danger valorestado' valorestado='" . $estado["estado"] . "'>" . $estado["estado"] . "</div>";
                /* =============================================
                  TRAEMOS LAS ACCIONES
                  ============================================= */

                $botones = "<div class='btn-group'><button class='btn btn-info btnImprimirTicket' idTicket='" . $ticket[$i]["id"] . "'><i class='fa fa-print'></i></button><button class='btn btn-warning btnEditarTicket' idTicket='" . $ticket[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarTicket'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarTicket' idTicket='" . $ticket[$i]["id"] . "' codigo='" . $ticket[$i]["codigo"] . "' imagen='" . $ticket[$i]["imagen"] . "'><i class='fa fa-times'></i></button></div>";



                $datosJson .= '[
			      "' . ($i + 1) . '",
                              "' . $botones . '",    
                              "' . $soporte["soporte"] . '",
                              "' . $estado2 . '",
			      "' . $imagen . '",
                              "' . $ticket[$i]["fecha"] . '",
                              "' . $categorias["categoria"] . '",
			      "' . $ticket[$i]["codigo"] . '",
			      "' . $ticket[$i]["descripcion"] . '",
			      "' . $ticket[$i]["observacion"] . '",
                              "' . $ticket[$i]["nombre"] . '",
                              "' . $ticket[$i]["oficina"] . '",
                              "' . $ticket[$i]["cargo"] . '",
                              "' . $ticket[$i]["cel"] . '",
                              "' . $ticket[$i]["sede"] . '",
                              "' . $ticket[$i]["piso"] . '"

			    ],';
            }

            $datosJson = substr($datosJson, 0, -1);

            $datosJson .= '] 

		 }';

            echo $datosJson;
        } else if ($_SESSION["perfil"] == "Usuario") {

            $item = null;
            $item2 = "nombre";
            $valor = $_SESSION["nombre"];
            $item3 = "id_estado";
            $valor3 = 4;
            $ticket = ControladorTicket::ctrMostrarTicket_usuario($item, $item2, $valor, $item3, $valor3);

            if (count($ticket) == 0) {

                echo '{"data": []}';

                return;
            }

            $datosJson = '{
		  "data": [';

            for ($i = 0; $i < count($ticket); $i++) {

                /* =============================================
                  TRAEMOS LA IMAGEN
                  ============================================= */

                $imagen = "<a href='" . $ticket[$i]["imagen"] . "' onclick='windows.open()'><img src='" . $ticket[$i]["imagen"] . "' width='40px'></a>";

                /* =============================================
                  TRAEMOS LA CATEGORIA
                  ============================================= */

                $item = "id";
                $valor = $ticket[$i]["id_categoria"];

                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
                /* =============================================
                  TRAEMOS SOPORTE
                  ============================================= */
                $item = "soporte";
                $valor = $ticket[$i]["soporte"];

                $soporte = ControladorSoporte::ctrMostrarSoporte($item, $valor);
                /* =============================================
                  TRAEMOS ESTADO
                  ============================================= */
                $item = "id";
                $valor = $ticket[$i]["id_estado"];

                $estado = ControladorEstado::ctrMostrarEstado($item, $valor);
                $estado2 = "<div type='button' class='btn btn-danger valorestado' valorestado='" . $estado["estado"] . "'>" . $estado["estado"] . "</div>";
                /* =============================================
                  TRAEMOS LAS ACCIONES
                  ============================================= */

                $botones = "<div class='btn-group'><button class='btn btn-info btnImprimirTicket' idTicket='" . $ticket[$i]["id"] . "'><i class='fa fa-print'></i></button><button class='btn btn-warning btnEditarTicket' idTicket='" . $ticket[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarTicket'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarTicket' idTicket='" . $ticket[$i]["id"] . "' codigo='" . $ticket[$i]["codigo"] . "' imagen='" . $ticket[$i]["imagen"] . "'><i class='fa fa-times'></i></button></div>";



                $datosJson .= '[
			      "' . ($i + 1) . '",
                              "' . $botones . '",    
                              "' . $soporte["soporte"] . '",
                              "' . $estado2 . '",
			      "' . $imagen . '",
                              "' . $ticket[$i]["fecha"] . '",
                              "' . $categorias["categoria"] . '",
			      "' . $ticket[$i]["codigo"] . '",
			      "' . $ticket[$i]["descripcion"] . '",
			      "' . $ticket[$i]["observacion"] . '",
                              "' . $ticket[$i]["nombre"] . '",
                              "' . $ticket[$i]["oficina"] . '",
                              "' . $ticket[$i]["cargo"] . '",
                              "' . $ticket[$i]["cel"] . '",
                              "' . $ticket[$i]["sede"] . '",
                              "' . $ticket[$i]["piso"] . '"

			    ],';
            }

            $datosJson = substr($datosJson, 0, -1);

            $datosJson .= '] 

		 }';

            echo $datosJson;
        } else if ($_SESSION["perfil"] == "Informatico") {

            $item = null;
            $item2 = "soporte";
            $valor = $_SESSION["nombre"];
            $item3 = "id_estado";
            $valor3 = 4;
            $ticket = ControladorTicket::ctrMostrarTicket_informatico($item, $item2, $valor, $item3, $valor3);

            if (count($ticket) == 0) {

                echo '{"data": []}';

                return;
            }

            $datosJson = '{
		  "data": [';

            for ($i = 0; $i < count($ticket); $i++) {

                /* =============================================
                  TRAEMOS LA IMAGEN
                  ============================================= */

                $imagen = "<a href='" . $ticket[$i]["imagen"] . "' onclick='windows.open()'><img src='" . $ticket[$i]["imagen"] . "' width='40px'></a>";

                /* =============================================
                  TRAEMOS LA CATEGORIA
                  ============================================= */

                $item = "id";
                $valor = $ticket[$i]["id_categoria"];

                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
                /* =============================================
                  TRAEMOS SOPORTE
                  ============================================= */
                $item = "soporte";
                $valor = $ticket[$i]["soporte"];

                $soporte = ControladorSoporte::ctrMostrarSoporte($item, $valor);
                /* =============================================
                  TRAEMOS ESTADO
                  ============================================= */
                $item = "id";
                $valor = $ticket[$i]["id_estado"];

                $estado = ControladorEstado::ctrMostrarEstado($item, $valor);
                $estado2 = "<div type='button' class='btn btn-danger valorestado' valorestado='" . $estado["estado"] . "'>" . $estado["estado"] . "</div>";
                /* =============================================
                  TRAEMOS LAS ACCIONES
                  ============================================= */

                $botones = "<div class='btn-group'><button class='btn btn-info btnImprimirTicket' idTicket='" . $ticket[$i]["id"] . "'><i class='fa fa-print'></i></button><button class='btn btn-warning btnEditarTicket' idTicket='" . $ticket[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarTicket'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarTicket' idTicket='" . $ticket[$i]["id"] . "' codigo='" . $ticket[$i]["codigo"] . "' imagen='" . $ticket[$i]["imagen"] . "'><i class='fa fa-times'></i></button></div>";



                $datosJson .= '[
			      "' . ($i + 1) . '",
                              "' . $botones . '",    
                              "' . $soporte["soporte"] . '",
                              "' . $estado2 . '",
			      "' . $imagen . '",
                              "' . $ticket[$i]["fecha"] . '",
                              "' . $categorias["categoria"] . '",
			      "' . $ticket[$i]["codigo"] . '",
			      "' . $ticket[$i]["descripcion"] . '",
			      "' . $ticket[$i]["observacion"] . '",
                              "' . $ticket[$i]["nombre"] . '",
                              "' . $ticket[$i]["oficina"] . '",
                              "' . $ticket[$i]["cargo"] . '",
                              "' . $ticket[$i]["cel"] . '",
                              "' . $ticket[$i]["sede"] . '",
                              "' . $ticket[$i]["piso"] . '"

			    ],';
            }

            $datosJson = substr($datosJson, 0, -1);

            $datosJson .= '] 

		 }';

            echo $datosJson;
        }
    }

}

/* =============================================
  ACTIVAR TABLA DE PRODUCTOS
  ============================================= */
$activarTicket = new TablaTicket();
$activarTicket->mostrarTablaTicket();

