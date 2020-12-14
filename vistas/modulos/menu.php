<aside class="main-sidebar">

    <section class="sidebar">

        <ul class="sidebar-menu">

            <?php
            if ($_SESSION["roles"] == "Administrador") {
                echo '
            <li>

                <a href="usuarios">

                    <i class="fa fa-user"></i>
                    <span>Usuarios</span>

                </a>

            </li>
                     
                <li>

                    <a href="ticket">

                        <i class="fa fa-product-hunt"></i>
                        <span>Ticket</span>

                    </a>

                </li> ';
            } else {
                echo '           
 
            <li>

                <a href="ticket">

                    <i class="fa fa-product-hunt"></i>
                    <span>Ticket</span>

                </a>

            </li>   
            <li>

                <a href="usuarios">

                    <i class="fa fa-user"></i>
                    <span>Usuarios</span>

                </a>

            </li>


            <li>

                <a href="roles">

                    <i class="fa fa-th"></i>
                    <span>Roles</span>

                </a>

            </li>
            <li>

                <a href="lista">

                    <i class="fa fa-hourglass-end"></i>
                    <span>Listado</span>

                </a>

            </li>
            <li>

                <a href="soporte">

                    <i class="fa fa fa-bed"></i>
                    <span>Soporte</span>

                </a>

            </li>

            <li class="treeview">

				<a href="#">

					<i class="fa fa-list-ul"></i>
					
					<span>Reporte</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
					<li>

						<a href="reporteticket">
							
							<i class="fa fa-circle-o"></i>
							<span>Reporte Ticket</span>

						</a>

					</li>

					<li>

						<a href="reporteestadistico">
						
							<i class="fa fa-circle-o"></i>
							<span>Reporte Estadistica</span>
						</a>
					</li>';
            }
            ?>
        </ul>
    </section>

</aside>