<?php

if (isset($_GET["idTrabajador"]) && isset($_GET["usuario"])) {

    $id = $_GET["idTrabajador"];
    $usuario = $_GET["usuario"];
}

?>

<div class="content">
    <div class="row">
        <h1 style="color: white; text-align: center">Plataforma Tecnológica - Votos Online</h1>
        <h2 style="color: white; text-align: center"><a href="https://www.dirislimasur.gob.pe/">Equipo de Trabajo Funcional Tecnologías de la Información - DIRIS LIMA SUR</a></h2>

        <div class="col-lg-12 col-md-12 col-xs-12">

            <div class="login-box ">

                <div class="login-logo">


                </div>

                <div class="login-box-body">

                    <img src="vistas/img/plantilla/logo-dirisls-bloque.png" class="img-responsive">

                    <p class="login-box-msg" style="font-size: 25px;">Ingresar Nueva Contraseña</p>

                    <form method="post">

                        <div class="form-group has-feedback">

                            <input type="password" class="form-control" placeholder="Nueva Contraseña" id="ingPassword" name="ingPassword" required>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            <input type="text" class="hidden" name="idUsuario" value="<?php echo $id; ?>">
                            <input type="text" class="hidden" name="usuario" value="<?php echo $usuario; ?>">

                        </div>

                        <div class="form-group has-feedback">

                            <input type="password" class="form-control" placeholder="Confirmar Contraseña" id="ingConfirmPassword" name="ingConfirmPassword" required>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                        </div>

                        <div class="row">

                            <div class="col-xs-4">

                                <button type="submit" class="btn btn-primary btn-block btn-flat" onclick="return comparePassword();">Continuar</button>

                            </div>


                        </div>
                        <br>

                        <?php

                        $restablecer = new ControladorUsuarios();
                        $restablecer->ctrCambioPassword();
                        ?>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

<script>
    function comparePassword() {

        var contrasena = document.getElementById('ingPassword').value;
        var repetirContrasena = document.getElementById('ingConfirmPassword').value;

        if (contrasena != repetirContrasena) {
            swal({
                type: "success",
                title: "Las contraseñas no coinciden.",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
            })
            return false;
        } else {
            return true;
        }

    }
</script>