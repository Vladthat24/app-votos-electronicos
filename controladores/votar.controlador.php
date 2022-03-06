<?php

class ControladorVotar
{

  /* =============================================
      MOSTRAR VOTO
      ============================================= */
  static public function ctrMostrarVoto($item, $valor)
  {

    $tabla = "tap_votos";

    $respuesta = ModeloVotar::mdlMostrarVoto($tabla, $item, $valor);

    return $respuesta;
  }




  /* =============================================
      CREAR VOTO
      ============================================= */

  static public function ctrCrearVotar()
  {

    if (isset($_GET["codigo"]) && isset($_GET["idLista"]) && isset($_GET["idUser"])) {



      //GENERAR LA FECHA Y HORA DEL SISTEMA
      date_default_timezone_set('America/Lima');

      $fecha = date('Y-m-d');
      $hora = date('H:i:s');

      $fechaActual = $fecha . ' ' . $hora;


      //NOMBRE DE LA TABLA 
      $tabla = "tap_votos";


      //INSTANCIAR EL CODIGO UNICO
      $codigo = $_GET["codigo"];
      $valorLista = $_GET["idLista"];
      $idEmpleado = $_GET["idUser"];




      //COLOCAMOS TODOS LOS DATOS EN EL ARRAY DE DATOS
      $datos = array(
        "codigo" => $codigo,
        "valor" => $valorLista,
        "fecha_registro" => $fechaActual
      );

      $respuesta = ModeloVotar::mdlIngresarVotar($tabla, $datos);

      if ($respuesta == "ok") {

        $tablaEmpleado = "tap_empleado";
        $item1 = "estado_voto";
        $valor1 = "1";

        $item2 = "id";
        $valor2 = $idEmpleado;

        $estadoVotar = ModeloUsuarios::mdlActualizarEstadoVoto($tablaEmpleado, $item1, $valor1, $item2, $valor2);

        $itemCodigo = "codigovoto";
        $valorCodigo = $codigo;

        $codigoVoto = ModeloUsuarios::mdlActualizarEstadoVoto($tablaEmpleado, $itemCodigo, $valorCodigo, $item2, $valor2);



        if ($estadoVotar == "ok" && $codigoVoto == "ok") {

          

          session_destroy();

          echo '<script>

						swal({
							  type: "success",
							  title: "El voto con codigo ' . $codigo, ' ha sido generado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then((result) => {
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
      REPORTE EXCEL
    ============================================= */

  public function ctrDescargarReporte()
  {


    if (isset($_GET["reporte"])) {

      /*  $tabla = "ticket"; */

      if (isset($_GET["fechaInicial"]) && isset($_GET["fechaFinal"])) {

        /*  $ticket = ModeloReporteTicket::mdlReporteTicket($tabla, $_GET["fechaInicial"], $_GET["fechaFinal"]); */
      } else {

        $item = null;
        $valor = null;

        $usuarios = ControladorUsuarios::ctrMostrarUsuariosReporte($item, $valor);
      }


      /*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

      $Name = $_GET["reporte"] . '.xls';

      header('Expires: 0');
      header('Cache-control: private');
      header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
      header("Cache-Control: cache, must-revalidate");
      header('Content-Description: File Transfer');
      header('Last-Modified: ' . date('D, d M Y H:i:s'));
      header("Pragma: public");
      header('Content-Disposition:; filename="' . $Name . '"');
      header("Content-Transfer-Encoding: binary");

      echo utf8_decode("<table border='0'> 

      <tr>
      <td style='font-weight:bold; boder:1px solid #eee;'>Item</td> 
      <td style='font-weight:bold; boder:1px solid #eee;'>Datos Completos</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>DNI</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Oficina</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Cargo</td>
      </tr>");

      foreach ($usuarios as $row => $item) {
        /*         $categoria = ControladorCategorias::ctrMostrarCategorias("id", $item["id_categoria"]);
        $distrito = ControladorDistrito::ctrMostrarDistrito("id", $item["id_distrito"]);
        $estado = ControladorEstado::ctrMostrarEstado("id", $item["id_estado"]);
        $tipodoc = ControladorDocumento::ctrMostrarDocumento("id", $item["id_documento"]); */
        echo utf8_decode("<tr>

        <td style='border:1px solid #eee;'>" . ($row + 1) . "</td>             
        <td style='border:1px solid #eee;'>" . $item["datos_completos"] . "</td>            
                    <td style='border:1px solid #eee;'>" . $item["dni"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["oficina"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["cargo"] . "</td>
       </tr>");
      }
      echo "</table>";
    }
  }
}
