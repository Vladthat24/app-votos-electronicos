<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar Grupo de Lista

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar Grupo de Lista</li>

        </ol>

    </section>


    <section class="content">

        <div class="box">

            <div class="box-header with-border">
                <?php
                if ($_SESSION["roles"] == "ADMINISTRADOR" || $_SESSION["roles"] == "COMITE ELECTORAL") {
                    echo '<button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarVotoFaltante">

                    Ver Faltantes de Voto

                </button>
';
                }

                ?>

<!-- 
                <a href="vistas/modulos/descargar-reporte.php?reporte=reporte">
                    <button class="btn btn-success">Descargar Trabajadores que faltan votar</button>
                </a> -->
            </div>

            <div class="box-body">

                <?php


                date_default_timezone_set('America/Lima');
                $hora = date("H:i");
                $dia = date("w");


                if ($_SESSION["roles"] == "ADMINISTRADOR") {


                    $item = null;
                    $valor = null;

                    $Detallelista = ControladorDetalleLista::ctrMostrarDetalleListaVoto($item, $valor);

                    $idLista = $_SESSION["id"];


                    foreach ($Detallelista as $key => $value) {

                        echo '
                            <div class="col-sm-3 col-xs-12">

                                <div class="card" style="width: 50%;">';

                        if ($value["foto"] != "") {

                            echo ' <img class="card-img-top" src="' . $value["foto"] . '" width="160" height="160" style="display:block;margin:auto;">';
                        } else {

                            echo ' <img class="card-img-top" src="vistas/img/usuarios/default/anonymous.png" width="160" height="160" style="display:block;margin:auto;">';
                        }


                        echo '<div class="card-body">
                                     

                                    </div>

                                    <div class="card-footer" style="margin:10px;">
                                        <button type="button" class="btn btn-primary btnVotar" idLista="' . $value["idlista"] . '" idUser="' . $idLista . '" style="display:block;margin:auto;">Votar</button>
                                    </div>


                                </div>
                            </div>';
                    }
                } else {

                    if ($hora >= '08:00' && $hora <= '16:00') {

                        if (isset($_SESSION["estado_voto"])) {

                            $estado_voto = $_SESSION["estado_voto"];



                            if ($estado_voto == 0) {



                                $item = null;
                                $valor = null;

                                $Detallelista = ControladorDetalleLista::ctrMostrarDetalleListaVoto($item, $valor);

                                $idLista = $_SESSION["id"];


                                foreach ($Detallelista as $key => $value) {

                                    echo '
                                    <div class="col-sm-3 col-xs-12">

                                        <div class="card" style="width: 50%;">';

                                    if ($value["foto"] != "") {

                                        echo ' <img class="card-img-top" src="' . $value["foto"] . '" width="160" height="160" style="display:block;margin:auto;">';
                                    } else {

                                        echo ' <img class="card-img-top" src="vistas/img/usuarios/default/anonymous.png" width="160" height="160" style="display:block;margin:auto;">';
                                    }

                                    echo '<div class="card-body">

                                            </div>

                                            <div class="card-footer" style="margin:10px;">
                                                <button type="button" class="btn btn-primary btnVotar" idLista="' . $value["idlista"] . '" idUser="' . $idLista . '" style="display:block;margin:auto;">Votar</button>
                                            </div>


                                        </div>
                                    </div>';
                                }
                            } else {

                                echo '<script>

                                    swal({
                                        type: "success",
                                        title: "Usted ya realizo el voto",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar"
                                        }).then((result) => {


                                                
                                        })
                            
                                 </script>';
                            }
                        }
                    } else {

                        echo '<script>

                    swal({
                        type: "success",
                        title: "Se han cerrado las votaciones",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then((result) => {


                                
                        })
            
                 </script>';
                    }
                }




                ?>


            </div>

        </div>

    </section>

</div>

<?php
$votar = new ControladorVotar();
$votar->ctrCrearVotar();
?>


<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarVotoFaltante" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Trabajadores que no realizaron el voto</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">


                    <div class="box-body">



                        <!-- Tabla de Trabajadores que no realizaron su voto -->
                        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

                            <thead>

                                <tr>

                                    <th style="width:10px">#</th>
                                    <th>Datos Completos</th>
                                    <th>DNI</th>
                                    <th>Oficina</th>
                                    <th>Cargo</th>
                                    <th>Foto</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php


                                $item = null;
                                $item2 = "estado_voto";
                                $valor = '0';

                                $usuarios = ControladorUsuarios::ctrMostrarUsuariosNoVoto($item, $item2, $valor);



                                foreach ($usuarios as $key => $value) {

                                    echo ' <tr>
                                        <td>' . ($key + 1) . '</td>
                                        <td>' . $value["datos_completos"] . '</td>
                                        <td>' . $value["dni"] . '</td>
                                        <td>' . $value["oficina"] . '</td>
                                        <td>' . $value["cargo"] . '</td>';

                                    if ($value["foto"] != "") {

                                        echo '<td><img src="' . $value["foto"] . '" class="img-thumbnail" width="40px"></td>';
                                    } else {

                                        echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                                    }
                                    echo '
                                 </tr>';
                                }

                                ?>

                            </tbody>

                        </table>


                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar usuario</button>

                </div>

                <?php
                $crearUsuario = new ControladorUsuarios();
                $crearUsuario->ctrCrearUsuario();
                ?>

            </form>

        </div>

    </div>

</div>