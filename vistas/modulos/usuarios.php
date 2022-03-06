<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar Colaboradores

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar Colaboradores</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">
            <?php
            //ROL DE ADMINISTRADOR ES 1 EN LA TABLA ROLES
            if ($_SESSION["roles"] !== "ADMINISTRADOR") {
            } else {
            ?>
                <div class="box-header with-border">

                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">

                        Agregar usuario

                    </button>

                </div>
            <?php
            }
            ?>
            <div class="box-header with-boder">
                <form class="form-inline" action="">


                    <label>Fecha Desde:</label>

                    <input type="date" class="form-control" placeholder="Start" id="start_date" name="fechaI" />

                    <label>Hasta</label>

                    <input type="date" class="form-control" placeholder="End" id="end_date" name="fechaFinal" value="<?php echo date("Y-m-d"); ?>" />

                    <button class="btn btn-primary" name="search" id="search">

                        <span class="glyphicon glyphicon-search"></span>

                    </button>
                    <!--                     <div class="col-md-2 col-sm-2" style="margin-bottom: 2px;">
                        <input type="button" name="search" id="search" value="Search" class="btn btn-info center-block" />
                    </div> -->

                </form>

            </div>

            <div class="box-body">
                <?php
                if ($_SESSION["roles"] == "ELECTORES") {
                ?>
                    <table class="table table-bordered table-striped dt-responsive" width="100%" id="tablaElectores">

                        <thead>

                            <tr>

                                <th style="width:10px">#</th>
                                <th>Datos Completos</th>
                                <th>DNI</th>
                                <th>Oficina</th>
                                <th>Cargo</th>
                                <th>Fecha Registro</th>
                                <th>Foto</th>
                                <th>Estado del Voto</th>
                                <th>Codigo Voto</th>

                            </tr>

                        </thead>

                        <tbody>
                            <?php

                            $valor = $_SESSION["id"];

                            $usuario = ControladorUsuarios::ctrMostrarUsuariosPersonal($valor);
                            /* var_dump($usuario); */
                            foreach ($usuario as $key => $value) {
                                
                                echo ' <tr>
                                  <td>' . ($key + 1) . '</td>
                                
                                  <td>' . $value["datos_completos"] . '</td>
                                  <td>' . $value["dni"] . '</td>
                                  <td>' . $value["oficina"] . '</td>
                                  <td>' . $value["cargo"] . '</td>
                                  <td>' . $value["fecha_registro"] . '</td>';

                                if ($value["foto"] != "") {

                                    echo '<td><img src="' . $value["foto"] . '" class="img-thumbnail" width="40px"></td>';
                                } else {

                                    echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                                }

                                if ($value["estado_voto"] != 0) {

                                    echo '<td><button class="btn btn-success btn-xs" estadoVoto="' . $value["estado_voto"] . '">Sufragado</button></td>';
                                } else {

                                    echo '<td><button class="btn btn-danger btn-xs" estadoVoto="' . $value["estado_voto"] . '">No Sufragado</button></td>';
                                }

                                echo '<td><button class="btn btn-primary btn-xs btnCodigoVoto" style="margin-left:35%;" idUsuarioCodigo="' . $value["id"] . '"><i class="fa fa-eye"></i></button></td>
                                
                                </tr>';
                            }


                            ?>
                        </tbody>

                    </table>


                <?php
                } else {
                ?>
                    <table class="table table-bordered table-striped dt-responsive" width="100%" id="order_data">

                        <thead>

                            <tr>

                                <th style="width:10px">#</th>
                                <th>Datos Completos</th>
                                <th>DNI</th>
                                <th>Oficina</th>
                                <th>Cargo</th>
                                <th>Foto</th>
                                <th>Fecha Registro</th>
                                <th>Estado del Voto</th>
                                <th>Codigo Voto</th>
                                <th>Acciones</th>
                            </tr>

                        </thead>

                        <tbody>

                        </tbody>

                    </table>
                <?php } ?>
            </div>

        </div>

    </section>

</div>



<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar usuario</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA DNI -->

                        <div class="form-group">

                            <div class="input-group ">

                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                <input type="text" class="form-control input-lx dni" maxlength="8" id="dni" name="dni" placeholder="Documento de Identidad" required>

                            </div>

                        </div>
                        <!-- ENTRADA PARA DATOS COMPLETOS-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lx nuevDatosCompletos" id="nuevDatosCompletos" name="nuevDatosCompletos" placeholder="Datos Completos" required>

                            </div>


                        </div>
                        <!-- ENTRADA PARA OFICINA -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                                <input type="text" class="form-control input-lx" name="nuevOficina" placeholder="Oficina" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA CARGO -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                                <input type="text" class="form-control input-lx" name="nuevCargo" placeholder="Cargo" required>

                            </div>

                        </div>


                        <!-- ENTRADA PARA SUBIR FOTO -->

                        <div class="form-group">

                            <div class="panel">SUBIR FOTO</div>

                            <input type="file" class="nuevaFoto" name="nuevaFoto">

                            <p class="help-block">Peso máximo de la foto 2MB</p>

                            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

                            <input type="hidden" name="fotoActual" id="fotoActual">

                        </div>

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

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarUsuario" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar usuario</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">


                        <!-- ENTRADA PARA DNI -->

                        <div class="form-group">

                            <div class="input-group ">

                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                <input type="text" class="form-control input-lx" maxlength="8" id="editarDni" name="editarDni" value="" readonly>
                                <input type="text" class="from-control input-lx hidden" id="editarId" name="editarId">
                            </div>

                        </div>

                        <!-- ENTRADA PARA LOS DATOS COMPLETOS -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lx" id="editarDatosCompletos" name="editarDatosCompletos" value="" readonly>

                            </div>

                        </div>
                        <!-- ENTRADA PARA OFICINA -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                                <input type="text" class="form-control input-lx" id="editarOficina" name="editarOficina" value="">

                            </div>

                        </div>

                        <!-- ENTRADA PARA CARGO -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                                <input type="text" class="form-control input-lx" id="editarCargo" name="editarCargo" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SUBIR FOTO -->

                        <div class="form-group">

                            <div class="panel">SUBIR FOTO</div>

                            <input type="file" class="nuevaFoto" name="editarFoto">

                            <p class="help-block">Peso máximo de la foto 2MB</p>

                            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

                            <input type="hidden" name="fotoActual" id="fotoActual">

                        </div>

                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Modificar usuario</button>

                </div>

                <?php
                $editarUsuario = new ControladorUsuarios();
                $editarUsuario->ctrEditarUsuario();
                ?>

            </form>

        </div>

    </div>

</div>

<?php
$borrarUsuario = new ControladorUsuarios();
$borrarUsuario->ctrBorrarUsuario();
?>