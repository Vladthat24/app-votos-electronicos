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

            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Datos Completos</th>
                            <th>DNI</th>
                            <th>Oficina</th>
                            <th>Cargo</th>
                            <th>Foto</th>
                            <th>Rol</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th>Último login</th>
                            <th>Fecha de Registro</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        if ($_SESSION['roles'] == "ADMINISTRADOR" || $_SESSION["roles"] == "COMITE ELECTORAL") {

                            $item = null;
                            $valor = null;

                            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                            /*           var_dump($usuarios); */

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



                                echo '<td>' . $value["roles"] . '</td>
                                      <td>' . $value["usuario"] . '</td>';

                                if ($value["estado"] != 0) {

                                    echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="0">Activado</button></td>';
                                } else {

                                    echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="1">Desactivado</button></td>';
                                }

                                echo '<td>' . $value["ultimo_login"] . '</td>
                                      <td>' . $value["fecha_registro"] . '</td>
                                    <td>

                                        <div class="btn-group">
                            
                                        <button class="btn btn-warning btnEditarUsuario" idUsuario="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>';

                                echo '<button class="btn btn-danger btnEliminarUsuario" idUsuario="' . $value["id"] . '" fotoUsuario="' . $value["foto"] . '" usuario="' . $value["usuario"] . '"><i class="fa fa-times"></i></button>';



                                echo '</div>  

                                    </td>

                                </tr>';
                            }
                        } else {

                            $item = null;
                            $item2 = "dni";
                            $valor = $_SESSION["dni"];

                            $usuarios = ControladorUsuarios::ctrMostrarUsuariosPersonal($item, $item2, $valor);


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



                                echo '<td>' . $value["roles"] . '</td>
                                      <td>' . $value["usuario"] . '</td>';



                                echo '<td><button class="btn btn-success btn-xs">Activado</button></td>';




                                echo '<td>' . $value["ultimo_login"] . '</td>
                                      <td>' . $value["fecha_registro"] . '</td>
                               
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarUsuario" idUsuario="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                    </div>  

                   </td>

                </tr>';
                            }
                        }
                        ?>

                    </tbody>

                </table>

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

                                <input type="text" class="form-control input-lx nuevoNombre" id="nuevDatosCompletos" name="nuevDatosCompletos" placeholder="Datos Completos" required>

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