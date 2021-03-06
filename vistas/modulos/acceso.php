<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar Acceso

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar Acceso</li>

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

                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAcceso">

                        Agregar Acceso

                    </button>

                </div>
            <?php
            }
            ?>
            <div class="row">

                <div class="input-daterange" style="margin-left: 5px;">
                    <div class="col-md-2 col-sm-2" style="margin-bottom: 2px;">
                        <input type="date" name="start_date" id="start_date" class="form-control" />
                    </div>
                    <div class="col-md-2 col-sm-2" style="margin-bottom: 2px;">
                        <input type="date" name="end_date" id="end_date" class="form-control" />
                    </div>
                </div>
                <div class="col-md-2 col-sm-2" style="margin-bottom: 2px;">
                    <input type="button" name="search" id="search" value="Search" class="btn btn-info center-block" />
                </div>

            </div>

            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive" width="100%" id="order_data_acceso">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Datos Completos</th>
                            <th>Rol</th>
                            <th>Usuario</th>
                            <th>Estado Password</th>
                            <th>Ultimo Acceso</th>
                            <th>Fecha Registro</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>

                    </thead>

                    <tbody>

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>



<!--=====================================
MODAL AGREGAR ACCESO
======================================-->

<div id="modalAgregarAcceso" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar Acceso</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">


                        <!-- ENTRADA PARA COLABORADOR-->

                        <div class="form-group">

                            <div class="input-group">


                                <span class="input-group-addon"><i class="fa fa-user"></i></span>


                                <select class="form-control" id="searchColaboradorAcceso" name="nuevColaborador" style="width: 100%;">
                                    <option value="">Selecciona Colaborador</option>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $trabajador = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                                    foreach ($trabajador as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["datos_completos"] . '</option>';
                                    }
                                    ?>
                                </select>

                            </div>


                        </div>
                        <!-- ENTRADA PARA EL USUARIO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                <input type="text" class="form-control input-lx" name="nuevUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA CONTRASEÑA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="password" class="form-control input-lx" name="nuevPassword" placeholder="Ingresar contraseña" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control input-lx" name="nuevRoles">

                                    <option value="">Selecionar perfil</option>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $roles = ControladorRoles::ctrMostrarRoles($item, $valor);

                                    foreach ($roles as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                                    }
                                    ?>
                                </select>

                            </div>

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
                $crearAcceso = new ControladorAcceso();
                $crearAcceso->ctrCrearAcceso();
                ?>

            </form>

        </div>

    </div>

</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarAcceso" class="modal fade" role="dialog">

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

                        <!-- ENTRADA PARA LOS DATOS COMPLETOS -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lx" id="editarDatosCompletos" name="editarDatosCompletos" value="" readonly>
                                <input type="text" class="from-control input-lx hidden" id="editarId" name="editarId">

                            </div>

                        </div>


                        <!-- ENTRADA PARA EL USUARIO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                <input type="text" class="form-control input-lx" id="editarUsuario" name="editarUsuario" value="" readonly>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA CONTRASEÑA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="password" class="form-control input-lx" name="editarPassword" placeholder="Escriba la nueva contraseña">

                                <input type="hidden" id="passwordActual" name="passwordActual">

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SU ROLES -->
                        <?php if ($_SESSION["roles"] == "ADMINISTRADOR") { ?>
                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                    <select class="form-control input-lx" name="editarRoles">

                                        <option id="editarPerfil"></option>
                                        <?php
                                        $item = null;
                                        $valor = null;

                                        $roles = ControladorRoles::ctrMostrarRoles($item, $valor);

                                        foreach ($roles as $key => $value) {

                                            echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                                        }
                                        ?>

                                    </select>

                                </div>

                            </div>
                        <?php } else { ?>
                            <div class="form-group hidden">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                    <select class="form-control input-lx" name="editarRoles">

                                        <option id="editarPerfil"></option>
                                        <?php
                                        $item = null;
                                        $valor = null;

                                        $roles = ControladorRoles::ctrMostrarRoles($item, $valor);

                                        foreach ($roles as $key => $value) {

                                            echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                                        }
                                        ?>

                                    </select>

                                </div>

                            </div>
                        <?php } ?>

                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Modificar Acceso</button>

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