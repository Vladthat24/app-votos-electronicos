<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Carga de Documentos para la WEB INSTITUCIONAL

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Carga de Documentos</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

                <div class="box-header with-border">

                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">

                        Agregar usuario

                    </button>

                </div>


            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Nombre</th>
                            <th>Oficina</th>
                            <th>Area</th>
                            <th>Cargo</th>
                            <th>Cel</th>
                            <th>Sede</th>
                            <th>Piso</th>
                            <th>Usuario</th>
                            <th>Foto</th>
                            <th>Perfil</th>
                            <th>Estado</th>
                            <th>Último login</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        if ($_SESSION['perfil'] == "Administrador") {
                            $item = null;
                            $valor = null;

                            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                            foreach ($usuarios as $key => $value) {

                                echo ' <tr>
                              <td>' . ($key + 1) . '</td>
                              <td>' . $value["nombre"] . '</td>
                              <td>' . $value["oficina"] . '</td>
                              <td>' . $value["area"] . '</td>
                              <td>' . $value["cargo"] . '</td>
                              <td>' . $value["cel"] . '</td>
                              <td>' . $value["sede"] . '</td>
                              <td>' . $value["piso"] . '</td>
                              <td>' . $value["usuario"] . '</td>';

                                if ($value["foto"] != "") {

                                    echo '<td><img src="' . $value["foto"] . '" class="img-thumbnail" width="40px"></td>';
                                } else {

                                    echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                                }

                                echo '<td>' . $value["perfil"] . '</td>';

                                if ($value["estado"] != 0) {

                                    echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="0">Activado</button></td>';
                                } else {

                                    echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="1">Desactivado</button></td>';
                                }

                                echo '<td>' . $value["ultimo_login"] . '</td>
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarUsuario" idUsuario="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarUsuario" idUsuario="' . $value["id"] . '" fotoUsuario="' . $value["foto"] . '" usuario="' . $value["usuario"] . '"><i class="fa fa-times"></i></button>

                    </div>  

                   </td>

                </tr>';
                            }
                        } else if ($_SESSION["perfil"] == "Informatico" || $_SESSION["perfil"] == "Usuario") {
                            $item = null;
                            $item2 = "nombre";
                            $valor = $_SESSION["nombre"];

                            $usuarios = ControladorUsuarios::ctrMostrarUsuariosInformatico($item, $item2, $valor);

                            foreach ($usuarios as $key => $value) {

                                echo ' <tr>
                              <td>' . ($key + 1) . '</td>
                              <td>' . $value["nombre"] . '</td>
                              <td>' . $value["oficina"] . '</td>
                              <td>' . $value["area"] . '</td>
                              <td>' . $value["cargo"] . '</td>
                              <td>' . $value["cel"] . '</td>
                              <td>' . $value["sede"] . '</td>
                              <td>' . $value["piso"] . '</td>
                              <td>' . $value["usuario"] . '</td>';

                                if ($value["foto"] != "") {

                                    echo '<td><img src="' . $value["foto"] . '" class="img-thumbnail" width="40px"></td>';
                                } else {

                                    echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                                }

                                echo '<td>' . $value["perfil"] . '</td>';

                                //SE BLOQUEA ESTO PARA QUE EL USUARIO NO PUEDA MANIPULAR 
                                if ($value["estado"] != 0) {

                                    echo '<td><button class="btn btn-success btn-xs" idUsuario="' . $value["id"] . '" estadoUsuario="0">Activado</button></td>';
                                } else {

                                    echo '<td><button class="btn btn-danger btn-xs" idUsuario="' . $value["id"] . '" estadoUsuario="1">Desactivado</button></td>';
                                }

                                echo '<td>' . $value["ultimo_login"] . '</td>
                               
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


                                <span class="input-group-addon">
                                    <button type="button" id="consultar" class="btn btn-primary btn-xs consultar">
                                        Consultar
                                    </button>
                                </span>

                            </div>

                        </div>
                        <!-- ENTRADA PARA EL NOMBRE Y APELLIDO-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lx nuevoNombre" id="nuevoNombre" name="nuevoNombre" placeholder="Nombres y Apellidos" required>

                            </div>


                        </div>
                        <!-- ENTRADA PARA OFICINA -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                                <input type="text" class="form-control input-lx" name="nuevoOficina" placeholder="Equipo de trabajo funcional" required>

                            </div>

                        </div>
                        <!-- ENTRADA PARA AREA -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                                <input type="text" class="form-control input-lx" name="nuevoArea" placeholder="Área de trabajo" required>

                            </div>

                        </div>
                        <!-- ENTRADA PARA CARGO -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                                <input type="text" class="form-control input-lx" name="nuevoCargo" placeholder="Cargo" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA CEL -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                <input type="text" class="form-control input-lx celular" name="nuevoCel" placeholder="Celular" required>

                            </div>

                        </div>


                        <!-- ENTRADA PARA SELECCIONAR SU SEDE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                                <select class="form-control input-lx" name="nuevoSede">

                                    <option value="">Selecionar Sede</option>

                                    <option value="Pinillos">Pinillos</option>

                                    <option value="Fap">Fap</option>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SU PISO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-angle-double-up"></i></span>

                                <select class="form-control input-lx" name="nuevoPiso">

                                    <option value="">Selecionar piso</option>

                                    <option value="1">1</option>

                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="4(Palomar N°1)">4(Palomar N°1)</option>
                                    <option value="5(Palomar N°2)">5(Palomar N°2)</option>

                                </select>
                            </div>
                        </div>

                        <!-- ENTRADA PARA EL USUARIO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                <input type="text" class="form-control input-lx" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA CONTRASEÑA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="password" class="form-control input-lx" name="nuevoPassword" placeholder="Ingresar contraseña" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control input-lx" name="nuevoPerfil">

                                    <option value="">Selecionar perfil</option>

                                    <option value="Usuario">Usuario</option>

                                    <option value="Informatico">Informatico</option>

                                    <option value="Administrador">Administrador</option>

                                </select>

                            </div>

                        </div>
                        <!-- ENTRADA PARA SUBIR FOTO -->

                        <div class="form-group">

                            <div class="panel">SUBIR FOTO</div>

                            <input type="file" class="nuevaFoto" name="nuevaFoto">

                            <p class="help-block">Peso máximo de la foto 2MB</p>

                            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

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

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lx" id="editarNombre" name="editarNombre" value="" readonly>

                            </div>

                        </div>
                        <!-- ENTRADA PARA OFICINA -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                                <input type="text" class="form-control input-lx" id="editarOficina" name="editarOficina" value="">

                            </div>

                        </div>

                        <!-- ENTRADA PARA AREA -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                                <input type="text" class="form-control input-lx" id="editarArea" name="editarArea">

                            </div>

                        </div>
                        <!-- ENTRADA PARA CARGO -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                                <input type="text" class="form-control input-lx" id="editarCargo" name="editarCargo" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA CEL -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                <input type="text" class="form-control input-lx celular" id="editarCel" name="editarCel" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SU SEDE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                                <select class="form-control input-lx" name="editarSede">

                                    <option value="" id="editarSede"></option>

                                    <option value="Pinillos">Pinillos</option>

                                    <option value="Fap">Fap</option>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SU PISO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-angle-double-up"></i></span>

                                <select class="form-control input-lx" name="editarPiso">

                                    <option value="" id="editarPiso"></option>

                                    <option value="1">1</option>

                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="4(Palomar N°1)">4(Palomar N°1)</option>
                                    <option value="5(Palomar N°2)">5(Palomar N°2)</option>

                                </select>
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

                        <div class="form-group">|

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="password" class="form-control input-lx" name="editarPassword" placeholder="Escriba la nueva contraseña">

                                <input type="hidden" id="passwordActual" name="passwordActual">

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->
                        <?php if ($_SESSION["perfil"] !== "Administrador") { ?>
                            <div class="form-group hidden">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                    <select class="form-control input-lx" name="editarPerfil">

                                        <option value="" id="editarPerfil"></option>
                                        <option value="Usuario">Usuario</option>

                                        <option value="Informatico">Informatico</option>

                                        <option value="Administrador">Administrador</option>

                                    </select>

                                </div>

                            </div>
                        <?php } else { ?>
                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                    <select class="form-control input-lx" name="editarPerfil">

                                        <option value="" id="editarPerfil"></option>
                                        <option value="Usuario">Usuario</option>

                                        <option value="Informatico">Informatico</option>

                                        <option value="Administrador">Administrador</option>

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