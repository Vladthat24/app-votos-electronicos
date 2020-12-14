<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Lista

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Lista</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarLista">

          Agregar Lista

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $lista = ControladorLista::ctrMostrarLista($item, $valor);

            foreach ($lista as $key => $value) {

              echo ' <tr>

                    <td>' . ($key + 1) . '</td>

                    <td class="text-uppercase">' . $value["nombre"] . '</td>
                    <td class="text-uppercase">' . $value["descripcion"] . '</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarLista" idLista="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarLista"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarLista" idLista="' . $value["id"] . '"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR LISTA
======================================-->

<div id="modalAgregarLista" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Lista</h4>

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

                <input type="text" class="form-control input-lg" name="nuevNombre" placeholder="Ingresar Nombre" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL DESCRIPCION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevDescripcion" placeholder="Ingresar Descripcion" required>

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

        <?php

        $crearLista = new ControladorLista();
        $crearLista->ctrCrearLista();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR LISTA
======================================-->

<div id="modalEditarLista" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Estado</h4>

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

                <input type="text" class="form-control input-lg" name="editarNombre" id="editarNombre" required>

                <input type="hidden" name="editarId" id="editarId" required>

              </div>

            </div>

            
            <!-- ENTRADA PARA EL DESCRIPCION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarDescripcion" id="editarDescripcion" required>

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

        $editarLista = new ControladorLista();
        $editarLista->ctrEditarLista();

        ?>

      </form>

    </div>

  </div>

</div>

<?php

$borrarLista = new ControladorLista();
$borrarLista->ctrBorrarLista();

?>