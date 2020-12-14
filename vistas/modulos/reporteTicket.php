<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Reporte por Fechas de Ticket

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Reporte</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">
            <br>
            <button type="button" class="btn btn-default pull-right" id="daterange-btn">

                <span>
                    <i class="fa fa-calendar"></i> Rango de fecha
                </span>

                <i class="fa fa-caret-down"></i>

            </button>


            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>INFORMATICO</th>
                            <th>ESTADO</th>
                            <th>Imagen</th>
                            <th>Fecha</th>
                            <th>Categoría</th>
                            <th>Código</th>
                            <th>Descripción del Problema</th>
                            <th>Observacion del Informatico</th>
                            <th>Nombre del Usuario</th>
                            <th>Oficina del Usuario</th>
                            <th>Cargo del Usuario</th>
                            <th>Cel del Usuario</th>
                            <th>Sede del Usuario</th>
                            <th>Piso del Usuario</th>


                        </tr>

                    </thead>

                    <tbody>

                        <?php

                        if (isset($_GET["fechaInicial"])) {

                            $fechaInicial = $_GET["fechaInicial"];
                            $fechaFinal = $_GET["fechaFinal"];
                        } else {

                            $fechaInicial = null;
                            $fechaFinal = null;
                        }

                        $respuesta = ControladorReporteTicket::ctrReporteTicket($fechaInicial, $fechaFinal);

                        foreach ($respuesta as $key => $value) {

                            echo ' <tr>
                            <td>' . ($key + 1) . '</td>
                                
                            <td>' . $value["soporte"] . '</td>';

                            $item = "id";
                            $valor = $value["id_estado"];

                            $estado = ControladorEstado::ctrMostrarEstado($item, $valor);
                            if ($estado["estado"] == "TERMINADO") {
                                echo '<td><div type="button" class="btn btn-success">' . $estado["estado"] . '</div></td>';
                            } else if ($estado["estado"] == "EN PROCESO") {
                                echo '<td><div type="button" class="btn btn-warning">' . $estado["estado"] . '</div></td>';
                            } else {
                                echo '<td><div type="button" class="btn btn-danger">' . $estado["estado"] . '</div></td>';
                            }


                            if ($value["imagen"] != "") {

                                echo '<td><img src="' . $value["imagen"] . '" class="img-thumbnail" width="40px"></td>';
                            } else {

                                echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                            }

                            echo '<td>' . $value["fecha"] . '</td>';

                            $item = "id";
                            $valor = $value["id_categoria"];

                            $categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                            echo '<td>' . $categoria["categoria"] . '</td>

                            <td>' . $value["codigo"] . '</td>
                            <td>' . $value["descripcion"] . '</td>
                            <td>' . $value["observacion"] . '</td>
                            <td>' . $value["nombre"] . '</td>
                            <td>' . $value["oficina"] . '</td>
                            <td>' . $value["cargo"] . '</td>
                            <td>' . $value["cel"] . '</td>
                            <td>' . $value["sede"] . '</td>
                            <td>' . $value["piso"] . '</td>

                </tr>';
                        }

                        ?>

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>