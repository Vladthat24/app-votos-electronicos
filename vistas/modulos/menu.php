<aside class="main-sidebar">

    <section class="sidebar">

        <ul class="sidebar-menu">

            <?php
            if ($_SESSION["roles"] == "ADMINISTRADOR" || $_SESSION["roles"] == "COMITE ELECTORAL") {

                echo '           
 
                    <li>

                        <a href="votar">

                            <i class="fa fa-comment-o"></i>
                            <span>Votar</span>

                        </a>

                    </li>   
                    <li>

                        <a href="usuarios">

                            <i class="fa fa-user"></i>
                            <span>Usuarios</span>

                        </a>

                    </li>

                    <li>

                    <a href="listadetalle">

                        <i class="fa fa-list-alt"></i>
                        <span>Lista Detalle</span>

                    </a>

                    </li>


                    <li>

                        <a href="roles">

                            <i class="fa fa-users"></i>
                            <span>Roles</span>

                        </a>

                    </li>
                    <li>

                        <a href="lista">

                            <i class="fa fa-list-ol"></i>
                            <span>Listado</span>

                        </a>

                    </li>
                    <li>

                        <a href="cargo">

                            <i class="fa fa-user-plus"></i>
                            <span>cargo</span>

                        </a>

                    </li>';
            } else {
                echo '
            <li>

                <a href="votar">

                    <i class="fa fa-comment-o"></i>
                    <span>Votar</span>

                </a>

            </li>   
            <li>

                <a href="usuarios">

                    <i class="fa fa-user"></i>
                    <span>Usuarios</span>

                </a>

            </li>';
            }
            ?>
        </ul>
    </section>

</aside>