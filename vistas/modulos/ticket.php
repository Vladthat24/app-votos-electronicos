<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar Ticket

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar Ticket</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">



                <?php if ($_SESSION["perfil"] !== "Informatico") { ?>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTicket">

                        Agregar Ticket

                    </button>
                <?php
                } else {
                }
                ?>
                <button class="btn btn-primary" id="actualizar"><img src="vistas/img/plantilla/android-o-iconos-adaptivos.gif" width="30px" /><strong> Actualizar Registros</strong></button>
            </div>
            <strong>TICKET ACTIVOS</strong>
            <div class="box-body" id="resultados">

                <br>
                <table class="table table-bordered table-striped dt-responsive tablaTicket tablaActualizar" width="100%">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>ACCIONES</th>
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



                </table>
                <?php if ($_SESSION["perfil"] !== "Usuario") { ?>

                    <hr>
                    <strong>TICKET INACTIVOS</strong>
                    <table class="table table-bordered table-striped dt-responsive tablaTicketInactivo tablaActualizar" width="100%">

                        <thead>

                            <tr>

                                <th style="width:10px">#</th>
                                <th>ACCIONES</th>
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



                    </table>

                <?php } else { ?>

                    <hr>
                    <strong>TICKET INACTIVOS</strong>
                    <table class="table table-bordered table-striped dt-responsive tablaTicketInactivo tablaActualizar" width="100%">

                        <thead>

                            <tr>

                                <th style="width:10px">#</th>
                                <th>ACCIONES</th>
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



                    </table>

                <?php } ?>
            </div>

        </div>

    </section>

</div>

<!--=====================================
MODAL AGREGAR TICKET
======================================-->

<div id="modalAgregarTicket" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar Ticket</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">



                        <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lx" id="nuevaCategoria" name="nuevaCategoria" required>

                                    <option value="">Selecionar categoría</option>

                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                                    foreach ($categorias as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["categoria"] . '</option>';
                                    }
                                    ?>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL CÓDIGO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código" readonly required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA DESCRIPCION DEL PROBLEMA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevaDescripcion" name="nuevaDescripcion" placeholder="Ingresa Descripción del Problema" required>

                            </div>


                        </div>
                        <!-- ENTRADA PARA ID DE ANYDESK Y INSTALAR ANYDESK -->

                        <div class="form-row">

                            <div class="form-group col-md-12">


                                <div class="input-group">

                                    <div class="col-lg-4">
                                        <button type="button">
                                            <a href="vistas/ejecutables/AnyDesk.exe">
                                                <img src="vistas/img/plantilla/AnyDesk.png" class="img-responsive">
                                            </a>
                                        </button>
                                    </div>
                                    <div class="col-lg-8">
                                        <br>
                                        <strong>1.- Click para Descargar el Programa.</strong><br>
                                        <strong>2.- Ejecute el Programa y Escriba el ID.</strong><br>
                                        <strong>3.- Acepte la Conexion del Soporte Remoto.</strong><br>
                                        <strong>4.- Verificar el Chat del AnyDesk para enviarle mensajes al Soporte.</strong>
                                    </div>

                                </div>


                            </div>


                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>
                                <input type="text" class="form-control input-lx" id="nuevaAnydesk" name="nuevaAnydesk" placeholder="Ingresa ID de AnyDesk" required>
                            </div>
                        </div>



                        <!-- ENTRADA PARA OBSERVACION DEL INFORMATICO -->
                        <?php if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Informatico") { ?>
                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>

                                    <input type="text" class="form-control input-lx" id="nuevaObservacion" name="nuevaObservacion" placeholder="Ingresa Observación del Problema">

                                </div>


                            </div>
                        <?php } else if ($_SESSION["perfil"] == "Usuario") { ?>
                            <div class="form-group hidden">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>

                                    <input type="text" class="form-control input-lx" id="nuevaObservacion" name="nuevaObservacion" placeholder="Ingresa Observación del Problema">

                                </div>


                            </div>
                        <?php } ?>



                        <p><strong>Datos del Usuario Solicitante:</strong></p>

                        <div class="form-group" style="margin-bottom:15px;">

                            <div class="input-group">
                                <input class="form-check-input" type="checkbox" value="" id="micheckbox">

                                <label class="form-check-label" for="defaultCheck1">

                                    EDITAR

                                </label>

                            </div>
                        </div>


                        <!-- ENTRADA PARA EL NOMBRE DEL USUARIO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevaNombre" name="nuevaNombre" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                            </div>

                        </div>
                        <!-- ENTRADA PARA EL OFICIO DEL USUARIO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevaOficio" name="nuevaOficina" value="<?php echo $_SESSION["oficina"]; ?>" readonly>

                            </div>

                        </div>
                        <!-- ENTRADA PARA EL AREA DEL USUARIO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevaOficio" name="nuevaArea" value="<?php echo $_SESSION["area"]; ?>" readonly>

                            </div>

                        </div>
                        <!-- ENTRADA PARA EL CARGO DEL USUARIO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevaCargo" name="nuevaCargo" value="<?php echo $_SESSION["cargo"]; ?>" readonly>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL CEL DEL USUARIO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevaCel" name="nuevaCel" value="<?php echo $_SESSION["cel"] ?>" readonly>

                            </div>

                        </div>
                        <!-- ENTRADA PARA LA SEDE DEL USUARIO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevaSede" name="nuevaSede" value="<?php echo $_SESSION["sede"]; ?>" readonly>

                            </div>

                        </div>
                        <!-- ENTRADA PARA EL PISO DEL USUARIO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-angle-double-up"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevaPiso" name="nuevaPiso" value="<?php echo $_SESSION["piso"]; ?>" readonly>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SOPORTE -->
                        <?php if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Informatico") { ?>
                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa fa-bed"></i></span>

                                    <select class="form-control input-lx" id="nuevaSoporte" name="nuevaSoporte">

                                        <option value="">Selecionar el Informático</option>

                                        <?php
                                        $item = null;
                                        $valor = null;

                                        $soporte = ControladorSoporte::ctrMostrarSoporte($item, $valor);

                                        foreach ($soporte as $key => $value) {

                                            echo '<option value="' . $value["soporte"] . '">' . $value["soporte"] . '</option>';
                                        }
                                        ?>

                                    </select>

                                </div>

                            </div>
                        <?php } else if ($_SESSION["perfil"] == "Usuario") { ?>
                            <div class="form-group hidden">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa fa-bed"></i></span>

                                    <select class="form-control input-lx" id="nuevaSoporte" name="nuevaSoporte">

                                        <option value="">Selecionar el Informático</option>

                                        <?php
                                        $item = null;
                                        $valor = null;

                                        $soporte = ControladorSoporte::ctrMostrarSoporte($item, $valor);

                                        foreach ($soporte as $key => $value) {

                                            echo '<option value="' . $value["soporte"] . '">' . $value["soporte"] . '</option>';
                                        }
                                        ?>

                                    </select>

                                </div>

                            </div>
                        <?php } ?>
                        <!-- ENTRADA PARA SELECCIONAR ESTADO -->
                        <?php if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Informatico") { ?>
                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-hourglass-end"></i></span>

                                    <select class="form-control input-lx" id="nuevaEstado" name="nuevaEstado">

                                        <option value="">Selecionar Estado</option>

                                        <?php
                                        $item = null;
                                        $valor = null;

                                        $estado = ControladorEstado::ctrMostrarEstado($item, $valor);

                                        foreach ($estado as $key => $value) {

                                            echo '<option value="' . $value["id"] . '">' . $value["estado"] . '</option>';
                                        }
                                        ?>

                                    </select>

                                </div>

                            </div>
                        <?php } else if ($_SESSION["perfil"] == "Usuario") { ?>
                            <div class="form-group hidden">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-hourglass-end"></i></span>

                                    <select class="form-control input-lx" id="nuevaEstado" name="nuevaEstado">

                                        <option value="">Selecionar Estado</option>

                                        <?php
                                        $item = null;
                                        $valor = null;

                                        $estado = ControladorEstado::ctrMostrarEstado($item, $valor);

                                        foreach ($estado as $key => $value) {

                                            echo '<option value="' . $value["id"] . '">' . $value["estado"] . '</option>';
                                        }
                                        ?>

                                    </select>

                                </div>

                            </div>
                        <?php } ?>


                        <!-- ENTRADA PARA SUBIR FOTO -->

                        <div class="form-group">

                            <div class="panel">Subir Imagen del Problema</div>

                            <input type="file" class="nuevaImagen" name="nuevaImagen">

                            <p class="help-block">Peso máximo de la imagen 2MB</p>

                            <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

                        </div>

                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" id="notificacion" onclick="notificar()" class="btn btn-primary actualizar">Guardar Ticket</button>

                </div>

            </form>
            <script>
                /*                 var not = document.querySelector("#notificacion");
                console.log("notificacion", not);

                not.addEventListener("click", function() {
                    Notification = new Notification("hola que tal", {
                        body: "Texo de prueba"
                    });
                }) */
            </script>
            <?php
            $crearTicket = new ControladorTicket();
            $crearTicket->ctrCrearTicket();
            ?>

        </div>

    </div>

</div>

<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->

<div id="modalEditarTicket" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar producto</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">


                        <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lx" id="editarCatg" name="editarCategoria" readonly required>

                                    <option id="editarCategoria"></option>

                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                                    foreach ($categorias as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["categoria"] . '</option>';
                                    }
                                    ?>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL CÓDIGO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                                <input type="text" class="form-control input-lx" id="editarCodigo" name="editarCodigo" readonly required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA DESCRIPCIÓN -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>

                                <input type="text" class="form-control input-lx" id="editarDescripcion" name="editarDescripcion" required>

                            </div>

                        </div>
                        <!-- ENTRADA PARA OBSERVACION DEL INFORMATICO -->
                        <?php if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Informatico") { ?>
                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>

                                    <input type="text" class="form-control input-lx" id="editarObservacion" name="editarObservacion" placeholder="Ingresa una Observacion (Solo Informaticos)">

                                </div>


                            </div>
                        <?php } else if ($_SESSION["perfil"] == "Usuario") { ?>
                            <div class="form-group hidden">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>

                                    <input type="text" class="form-control input-lx" id="editarObservacion" name="editarObservacion">

                                </div>


                            </div>
                        <?php } ?>

                        <!-- ENTRADA PARA EL NOMBRE DEL USUARIO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>

                                <input type="text" class="form-control input-lx" id="editarNombre" name="editarNombre" readonly>

                            </div>

                        </div>
                        <!-- ENTRADA PARA EL OFICIO DEL USUARIO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                                <input type="text" class="form-control input-lx" id="editarOficina" name="editarOficina" readonly>

                            </div>

                        </div>
                        <!-- ENTRADA PARA EL AREA DEL USUARIO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                                <input type="text" class="form-control input-lx" id="editarArea" name="editarArea" readonly>

                            </div>

                        </div>
                        <!-- ENTRADA PARA EL CARGO DEL USUARIO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                                <input type="text" class="form-control input-lx" id="editarCargo" name="editarCargo" readonly>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL CEL DEL USUARIO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                <input type="text" class="form-control input-lx" id="editarCel" name="editarCel" readonly>

                            </div>

                        </div>
                        <!-- ENTRADA PARA LA SEDE DEL USUARIO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                                <input type="text" class="form-control input-lx" id="editarSede" name="editarSede" readonly>

                            </div>

                        </div>
                        <!-- ENTRADA PARA EL PISO DEL USUARIO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-angle-double-up"></i></span>

                                <input type="text" class="form-control input-lx" id="editarPiso" name="editarPiso" readonly>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SOPORTE -->
                        <?php if ($_SESSION["perfil"] == "Administrador") { ?>
                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa fa-bed"></i></span>

                                    <select class="form-control input-lx" id="editarSop" name="editarSoporte" readonly required>

                                        <option id="editarSoporte"></option>
                                        <?php
                                        $item = null;
                                        $valor = null;

                                        $soporte = ControladorSoporte::ctrMostrarSoporte($item, $valor);

                                        foreach ($soporte as $key => $value) {

                                            echo '<option value="' . $value["soporte"] . '">' . $value["soporte"] . '</option>';
                                        }
                                        ?>

                                    </select>

                                </div>

                            </div>
                        <?php } else if ($_SESSION["perfil"] == "Usuario" || $_SESSION["perfil"] == "Informatico") { ?>
                            <div class="form-group hidden">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa fa-bed"></i></span>

                                    <select class="form-control input-lx" id="editarSop" name="editarSoporte" readonly required>

                                        <option id="editarSoporte"></option>
                                        <?php
                                        $item = null;
                                        $valor = null;

                                        $soporte = ControladorSoporte::ctrMostrarSoporte($item, $valor);

                                        foreach ($soporte as $key => $value) {

                                            echo '<option value="' . $value["soporte"] . '">' . $value["soporte"] . '</option>';
                                        }
                                        ?>

                                    </select>

                                </div>

                            </div>
                        <?php } ?>

                        <!-- ENTRADA PARA SELECCIONAR ESTADO -->
                        <?php if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Informatico") { ?>
                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-hourglass-end"></i></span>

                                    <select class="form-control input-lx" id="editarEst" name="editarEstado" readonly required>

                                        <option id="editarEstado"></option>

                                        <?php
                                        $item = null;
                                        $valor = null;

                                        $estado = ControladorEstado::ctrMostrarEstado($item, $valor);

                                        foreach ($estado as $key => $value) {

                                            echo '<option value="' . $value["id"] . '">' . $value["estado"] . '</option>';
                                        }
                                        ?>


                                    </select>

                                </div>

                            </div>
                        <?php } else if ($_SESSION["perfil"] == "Usuario") { ?>
                            <div class="form-group hidden">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-hourglass-end"></i></span>

                                    <select class="form-control input-lx" id="editarEst" name="editarEstado" readonly required>

                                        <option id="editarEstado"></option>

                                        <?php
                                        $item = null;
                                        $valor = null;

                                        $estado = ControladorEstado::ctrMostrarEstado($item, $valor);

                                        foreach ($estado as $key => $value) {

                                            echo '<option value="' . $value["id"] . '">' . $value["estado"] . '</option>';
                                        }
                                        ?>


                                    </select>

                                </div>

                            </div>
                        <?php } ?>
                        <!-- ENTRADA PARA SUBIR FOTO -->

                        <div class="form-group">

                            <div class="panel">SUBIR IMAGEN</div>

                            <input type="file" class="nuevaImagen" name="editarImagen">

                            <p class="help-block">Peso máximo de la imagen 2MB</p>

                            <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

                            <input type="hidden" name="imagenActual" id="imagenActual">

                        </div>

                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <?php
                    if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Informatico") {
                    ?>
                        <button type="submit" class="btn btn-primary" id="update">Guardar cambios</button>
                    <?php
                    } else {
                    }
                    ?>

                </div>

            </form>

            <?php
            $editarTicket = new ControladorTicket();
            $editarTicket->ctrEditarTicket();
            ?>

        </div>

    </div>

</div>

<?php
$eliminarTicket = new ControladorTicket();
$eliminarTicket->ctrEliminarTicket();
?>