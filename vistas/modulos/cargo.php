<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Cargo

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Cargo</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCargo">

          Administrar Cargo

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Cargo</th>
              <th>Fecha Registro</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $cargo = ControladorCargo::ctrMostrarCargo($item, $valor);

            foreach ($cargo as $key => $value) {

              echo ' <tr>

                    <td>' . ($key + 1) . '</td>

                    <td class="text-uppercase">' . $value["nombre"] . '</td>
                    <td class="text-uppercase">' . $value["fecha_registro"] . '</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarCargo" idCargo="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarCargo"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarCargo" idCargo="' . $value["id"] . '"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR CARGO
======================================-->

<div id="modalAgregarCargo" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Cargo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevCargo" placeholder="Ingresar Cargo del Trabajdor" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar</button>

        </div>

        <?php

        $crearCargo = new ControladorCargo();
        $crearCargo->ctrCrearCargo();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CARGO
======================================-->

<div id="modalEditarCargo" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarCargo" id="editarCargo" required>

                <input type="hidden" name="idCargo" id="idCargo" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

        <?php

        $editarCargo = new ControladorCargo();
        $editarCargo->ctrEditarCargo();

        ?>

      </form>

    </div>

  </div>

</div>

<?php

$borrarCargo = new ControladorCargo();
$borrarCargo->ctrBorrarCargo();

?>