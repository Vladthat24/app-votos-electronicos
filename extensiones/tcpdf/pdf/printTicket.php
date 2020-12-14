<?php

require_once "../../../controladores/ticket.controlador.php";
require_once "../../../modelos/ticket.modelo.php";

require_once "../../../controladores/categorias.controlador.php";
require_once "../../../modelos/categorias.modelo.php";

require_once "../../../controladores/estado.controlador.php";
require_once "../../../modelos/estado.modelo.php";

require_once "../../../controladores/soporte.controlador.php";
require_once "../../../modelos/soporte.modelo.php";

class imprimirTicket {

    public $idTicket;

    public function traerImpresionTicket() {
        //TRAEMOS LA INFORMACION DEL TICKET
        $item = "id";
        $valorTicket = $this->idTicket;
        $item2=null;
        $valor2=null;

        $respuestaTicket = ControladorTicket::ctrMostrarTicket($item, $valorTicket, $item2, $valor2);


        $categoria = json_decode($respuestaTicket["id_categoria"], true);
        $codigo = json_decode($respuestaTicket["codigo"], true);
        $descripcion = substr($respuestaTicket["descripcion"], 0);
        $observacion = substr($respuestaTicket["observacion"], 0);
        $nombre = substr($respuestaTicket["nombre"], 0);
        $oficina = substr($respuestaTicket["oficina"], 0);
        $area = substr($respuestaTicket["area"], 0);
        $cargo = substr($respuestaTicket["cargo"], 0);
        $cel = substr($respuestaTicket["cel"], 0);
        $sede = substr($respuestaTicket["sede"], 0);
        $piso = substr($respuestaTicket["piso"], 0);
        $soporte = substr($respuestaTicket["soporte"], 0);
        $id_estado = json_decode($respuestaTicket["id_estado"], true);
        $fecha = substr($respuestaTicket["fecha"], 0);

        //TREAR NOMBRE DE CATEGORIA 
        $item_catg = "id";
        $valor_catg = $categoria;
        $respuestaCatg = ControladorCategorias::ctrMostrarCategorias($item_catg, $valor_catg);

        $categoria_nombre = substr($respuestaCatg["categoria"], 0);
        //---------------------------------------------------------------------------------------
        //TREAR NOMBRE DE ESTADO
        $item_estado = "id";
        $valor_estado = $id_estado;
        $respuestaEstado = ControladorEstado::ctrMostrarEstado($item_estado, $valor_estado);

        $estado_nombre = substr($respuestaEstado["estado"], 0);
        //---------------------------------------------------------------------------------------
        //TREAR NOMBRE DE ESTADO
        $item_soporte = "soporte";
        $valor_soporte = $soporte;
        $respuestaSoporte = ControladorSoporte::ctrMostrarSoporte($item_soporte, $valor_soporte);

        $soporte_nombre = substr($respuestaSoporte["soporte"], 0);
        //---------------------------------------------------------------------------------------
        require_once('./tcpdf_include.php');

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->startPageGroup();
        $pdf->AddPage();

        $bloque1 = <<<EOF
       
	<table>
		
		<tr>
			<br>
			<td style="width:200px"><img src="images/image_demo.jpg"></td>

			<td style="background-color:white; width:140px">
				
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
                                   Central Telefónica: 
                                       (+51) 477 5360, 477 5770, 477 3458 
				</div>

			</td>

			<td style="background-color:white; width:185px">

				<div style="font-size:9px; text-align:center; line-height:15px;">
					
					Área de Programación y Desarrollo Informático<br>
                                             ETF Tecnologías de la Información 

				</div>
				
			</td>

			

		</tr>

	</table>
        
        
        
EOF;
        $pdf->writeHTML($bloque1, false, false, false, false, '');
//------------------------------------------------------------------
        $bloque2 = <<<EOF
<br>
<h1 style="text-align:center;">HOJA DE ATENCIÓN</h1>       
<h1 style="text-align:center;">ETF-TECNOLOGÍA DE LA INFORMACIÓN</h1>  
   <br>
   <table style="font-size:10px; padding:5px 10px;">
                 <tr>
                    <td style="border: 1px solid #666; background-color:white; width: 270px">
                        Fecha y Hora: $fecha
                        
                    </td>
                    <td style="border: 1px solid #666; background-color:white; width: 270px; text-align:left">
                        Estado del Ticket:  $estado_nombre
                        
                    </td>
                </tr>
                
                
                <tr>
                    <td style="border: 1px solid #666; background-color:white; width: 270px">
                        Categoria:  $categoria_nombre
                        
                    </td>
                    <td style="border: 1px solid #666; background-color:white; width: 270px; text-align:left">
                        Codigo: $codigo
                        
                    </td>
                </tr>
                 <br>             
                <tr>
                
                    <td colspan=2>
                        <strong>Datos del Usuario: </strong>
                        
                    </td>
                </tr>
                
                <tr>
                    <td style="font-size:12px;border: 1px solid #666; background-color:white; width: 100px;text-align:center">
                        Nombre:   
                        
                    </td>
                    <td style="font-size:12px;border: 1px solid #666; background-color:white; width: 440px;text-align:center">
                        $nombre   
                        
                    </td>

                </tr>
                <tr>
                    <td style="font-size:12px;border: 1px solid #666; background-color:white; width: 100px;text-align:center">
                        Oficina:   
                        
                    </td>   
                    <td style="font-size:12px;border: 1px solid #666; background-color:white; width: 440px;text-align:center">
                        $oficina   
                        
                    </td>

                </tr>
                <tr>
                    <td style="font-size:12px;border: 1px solid #666; background-color:white; width: 100px;text-align:center">
                        Area:   
                        
                    </td>
                    <td style="font-size:12px;border: 1px solid #666; background-color:white; width: 440px;text-align:center">
                        $area   
                        
                    </td>

                </tr>
                <tr>
                    <td style="font-size:12px;border: 1px solid #666; background-color:white; width: 100px;text-align:center">
                        Cargo:   
                        
                    </td>
                    <td style="font-size:12px;border: 1px solid #666; background-color:white; width: 440px;text-align:center">
                        $cargo   
                        
                    </td>

                </tr>
                <tr>
                    <td style="font-size:12px;border: 1px solid #666; background-color:white; width: 100px;text-align:center">
                        Cel:   
                        
                    </td>
                    <td style="font-size:12px;border: 1px solid #666; background-color:white; width: 440px;text-align:center">
                        $cel   
                        
                    </td>

                </tr>
                <tr>
                    <td style="font-size:12px;border: 1px solid #666; background-color:white; width: 100px;text-align:center">
                        Sede:
                        
                    </td>
                    <td style="font-size:12px;border: 1px solid #666; background-color:white; width: 440px;text-align:center">
                        $sede   
                        
                    </td>

                </tr>
                <tr>
                    <td style="font-size:12px;border: 1px solid #666; background-color:white; width: 100px;text-align:center">
                        Piso:   
                        
                    </td>
                    <td style="font-size:12px;border: 1px solid #666; background-color:white; width: 440px;text-align:center">
                        $piso   
                        
                    </td>

                </tr>
                 <br>
                
</table>
        
        
EOF;
        $pdf->writeHTML($bloque2, false, false, false, false, '');
//-------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------
$bloque3 = <<<EOF
<hr>
<br>
<br>
   <table style="font-size:10px; padding:5px 10px;">
                <br>
                 <tr>
                
                    <td colspan=2>
                        <strong>Descripción: </strong>
                        
                    </td>
                </tr>
                 <tr>
                    <td style="border: 1px solid #666; background-color:white; width: 540px">
                        $descripcion
                        
                    </td>
                </tr>            
                                <br>
                 <tr>
                
                    <td colspan=2>
                        <strong>Obsercación: </strong>
                        
                    </td>
                </tr>
                 <tr>
                    <td style="border: 1px solid #666; background-color:white; width: 540px">
                        $observacion
                        
                    </td>
                </tr> 
</table>
        
        
EOF;
        $pdf->writeHTML($bloque3, false, false, false, false, '');
//------------------------------------------------------------------
$bloque4 = <<<EOF
<hr>
<br>
<br>
<br>
<br>
<br>
<br>
   <table style="font-size:10px; padding:5px 10px;">
                <br>
                 <tr>
                    <td style="width: 270px;text-align:center">
                        --------------------------------------  
                    </td>
                    <td style="width: 270px;text-align:center">
                        --------------------------------------  
                    </td>
                </tr>
                <tr>
                    <td style="width: 270px;text-align:center">
                         $soporte_nombre<br>ETF-Tecnología de la Información
                    </td>
                    <td style="width: 270px;text-align:center">
                        $nombre<br>$area<br>$oficina  
                    </td>
                </tr> 
 
</table>
        
        
EOF;
        $pdf->writeHTML($bloque4, false, false, false, false, '');
//------------------------------------------------------------------

//******************************************************************
//SALIDA DEL ARCHIVOS
        $pdf->Output('printTicket.pdf');
    }

}

$ticket = new imprimirTicket();
$ticket->idTicket = $_GET["idTicket"];
$ticket->traerImpresionTicket();
?>