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

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarDetalleLista">

          Agregar Grupo Lista

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Datos del Trabajador</th>
              <th>Lista</th>
              <th>Cargo</th>
              <th>Fecha de Registro</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $Detallelista = ControladorDetalleLista::ctrMostrarDetalleLista($item, $valor);


            foreach ($Detallelista as $key => $value) {

              echo ' <tr>

                    <td>' . ($key + 1) . '</td>

                    <td class="text-uppercase">' . $value["datos_completos"] . '</td>
                    <td class="text-uppercase">' . $value["lista"] . '</td>
                    <td class="text-uppercase">' . $value["cargo"] . '</td>
                    <td class="text-uppercase">' . $value["fecha_registro"] . '</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarDetalleLista" idDetalleLista="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarDetalleLista"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarDetalleLista" idDetalleLista="' . $value["id"] . '"><i class="fa fa-times"></i></button>

                      </div>  

                    </td>

                  </tr>';
            }

            ?>

          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR DETALLE LISTA
======================================-->

<div id="modalAgregarDetalleLista" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lx">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Detalle de la Lista</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL TRABAJADOR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"> Personal:</i></span>

                <select id="nuevTrabajadorSearch" name="nuevTrabajador" style="width: 100%;">
                  <option value="">PERSONAL DE SALUD</option>
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
            <!-- ENTRADA PARA LA LISTA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"> Lista:  </i></span>

                <select name="nuevLista" id="nuevListaSearch" style="width: 100%;>
                  <option value="">SELECCIONAR LA LISTA</option>
                  <?php
                  $item = null;
                  $valor = null;

                  $lista = ControladorLista::ctrMostrarLista($item, $valor);

                  foreach ($lista as $key => $value) {

                    echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                  }
                  ?>
                </select>

              </div>

            </div>
            <!-- ENTRADA PARA EL CARGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"> Cargo:  </i></span>

                <select name="nuevCargo" id="nuevCargoSearch" style="width: 100%;">
                  <option value="">SELECCIONAR EL CARGO</option>
                  <?php
                  $item = null;
                  $valor = null;

                  $cargo = ControladorCargo::ctrMostrarCargo($item, $valor);

                  foreach ($cargo as $key => $value) {

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

          <button type="submit" class="btn btn-primary">Guardar Lista</button>

        </div>



      </form>

      <?php

      $crearDetalleLista = new ControladorDetalleLista();
      $crearDetalleLista->ctrCrearDetalleLista();

      ?>
    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR DETALLE LISTA
======================================-->

<div id="modalEditarDetalleLista" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Detalle de la Lista</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL TRABAJADOR -->

            <div class="form-group">

              <div class="input-group">

                <input type="hidden" name="editarId" id="editarId" required>

                <span class="input-group-addon"><i class="fa fa-th"> Personal:</i></span>


                <select id="editarTrabajadorSearch" name="editarTrabajador" style="width: 100%;">
                  <option id="editarTrabajador"></option>
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
            <!-- ENTRADA PARA LA LISTA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"> Lista:  </i></span>

                <select name="editarLista" id="editarListaSearch" style="width: 100%;">
                  <option id="editarLista"></option>
                  <?php
                  $item = null;
                  $valor = null;

                  $lista = ControladorLista::ctrMostrarLista($item, $valor);

                  foreach ($lista as $key => $value) {

                    echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                  }
                  ?>
                </select>

              </div>

            </div>
            <!-- ENTRADA PARA EL CARGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"> Cargo:  </i></span>

                <select name="editarCargo" id="editarCargoSearch" style="width: 100%;">
                  <option id="editarCargo"></option>
                  <?php
                  $item = null;
                  $valor = null;

                  $cargo = ControladorCargo::ctrMostrarCargo($item, $valor);

                  foreach ($cargo as $key => $value) {

                    echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                  }
                  ?>
                </select>

              </div>

            </div>
            <!--=====================================
              PIE DEL MODAL
              ======================================-->

            <div class="modal-footer">

              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

              <button type="submit" class="btn btn-primary">Guardar Lista</button>

            </div>


          </div>
        </div>

        <?php

        $editarLista = new ControladorDetalleLista();
        $editarLista->ctrEditarDetalleLista();

        ?>

      </form>

    </div>

  </div>

</div>

<?php

$borrarDetalleLista = new ControladorDetalleLista();
$borrarDetalleLista->ctrBorrarDetalleLista();

?>