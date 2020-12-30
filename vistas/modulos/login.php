<div class="content">
    <div class="row">
        <h1 style="color: white; text-align: center">Plataforma Tecnológica - Votos Online</h1>
        <h2 style="color: white; text-align: center"><a href="https://www.dirislimasur.gob.pe/">Equipo de Trabajo Funcional Tecnologías de la Información - DIRIS LIMA SUR</a></h2>

        <div class="col-lg-12 col-md-12 col-xs-12">

            <div class="login-box ">

                <div class="login-logo">

                    <!--<img src="vistas/img/plantilla/logo-blanco-bloque.png" class="img-responsive" style="padding:30px 100px 0px 100px">-->

                </div>

                <div class="login-box-body">

                    <img src="vistas/img/plantilla/logo-dirisls-bloque.png" class="img-responsive">

                    <p class="login-box-msg" style="font-size: 25px;">Ingresar al sistema</p>

                    <form method="post">

                        <div class="form-group has-feedback">

                            <input type="text" class="form-control validarUsuario" maxlength="8" placeholder="INGRESE DNI" name="ingUsuario" required>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>

                        </div>

                        <div class="form-group has-feedback">

                            <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                        </div>

                        <div class="row">

                            <div class="col-xs-4">

                                <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>

                            </div>


                        </div>

                        <?php
                        $login = new ControladorUsuarios();
                        $login->ctrIngresoUsuario();
                        ?>

                    </form>

                </div>

                <div class="login-box-body">



                    <!-- <p class="login-box-msg" style="font-size: 25px;">Ingresar al sistema</p> -->

                    <form method="post">
                        <!-- 
                        <div class="form-group has-feedback">


                        </div> -->

                        <div class="row">

                            <div class="col-xs-4">

                                <img src="vistas/img/plantilla/whatpsapp.png" width="90px" class="img-responsive">


                            </div>

                            <div class="col-xs-8">

                                <a href="https://chat.whatsapp.com/EGmMAr35jaC7mh26dMZjBE">
                                    <p style="font-size: 15px;color: red;">Click Aquí</p>

                                    <p style="font-size: 20px;text-align: left;">Mesa de Ayuda vía mensajes por <strong>Whatsapp</strong></p>

                                </a>

                            </div>


                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>