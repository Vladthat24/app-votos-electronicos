<?php

$connect = mysqli_connect("localhost", "root", "", "gobpedir_votoonline");

if (mysqli_connect_errno()) {

    var_dump("error en la conexion " . mysqli_connect_error());
} else {

    $d1 = DateTime::createFromFormat('Y-m-d', $_POST["start_date"]);
    $d2 = DateTime::createFromFormat('Y-m-d', $_POST["end_date"]);

    $columns = array('id', 'datos_completos', 'dni', 'oficina', 'cargo', 'foto', 'fecha_registro', 'estado_voto', 'codigovoto');

    $query = "SELECT id,datos_completos,dni,oficina,cargo,foto,fecha_registro,estado_voto,codigovoto FROM tap_empleado WHERE ";

    if ($_POST["is_date_search"] == "yes") {

        $fecha_inicial = $d1->format('d/m/Y');
        $fecha_final = $d2->format("d/m/Y");

        var_dump($fecha_inicial, $fecha_final);

        $query .= "FORMAT(CONVERT(date,fecha_ingreso),'dd/MM/yyyy')  BETWEEN '" . $fecha_inicial . "' AND '" . $fecha_final . "' AND ";
    }



    if (isset($_POST["search"]["value"])) {
        $query .= '
            (id LIKE "%' . $_POST["search"]["value"] . '%" 
            OR datos_completos LIKE "%' . $_POST["search"]["value"] . '%" 
            OR dni LIKE "%' . $_POST["search"]["value"] . '%"
            OR oficina LIKE "%' . $_POST["search"]["value"] . '%" 
            OR cargo LIKE "%' . $_POST["search"]["value"] . '%"
            OR foto LIKE "%' . $_POST["search"]["value"] . '%"
            OR fecha_registro LIKE "%' . $_POST["search"]["value"] . '%"
            OR estado_voto LIKE "%' . $_POST["search"]["value"] . '%"
            OR codigovoto LIKE "%' . $_POST["search"]["value"] . '%")
                ';
    }
   
    if (isset($_POST["order"])) {
        $query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' 
 ';
    } else {
        $query .= 'ORDER BY id DESC';
    }

    $query1 = '';

    if ($_POST["length"] != -1) {
        $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }



    $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

    $result = mysqli_query($connect, $query . $query1);



    $data = array();

    while ($row = mysqli_fetch_array($result)) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["datos_completos"];
        $sub_array[] = $row["dni"];
        $sub_array[] = $row["oficina"];
        $sub_array[] = $row["cargo"];

        if ($row["foto"] != "") {

            $sub_array[] = '<td><img src="' . $row["foto"] . '" class="img-thumbnail" width="40px"></td>';
        } else {

            $sub_array[] = '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
        }

        $sub_array[] = $row["fecha_registro"];

        if ($row["estado_voto"] != 0) {
            $sub_array[] = '<td><button class="btn btn-success btn-xs" estadoVoto="' . $row["estado_voto"] . '">Sufragado</button></td>';
        } else {
            $sub_array[] = '<td><button class="btn btn-danger btn-xs" estadoVoto="' . $row["estado_voto"] . '">No Sufragado</button></td>';
        }

        $sub_array[] = '<td><button class="btn btn-primary btn-xs btnCodigoVoto" style="margin-left:35%;" idUsuarioCodigo="' . $row["id"] . '"><i class="fa fa-eye"></i></button></td>';
        $sub_array[] = '<td>
                           <center>
                                <button class="btn btn-warning btnEditarUsuario" idUsuario="' . $row["id"] . '" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa  fa-pencil"></i></button>
                                <button class="btn btn-danger btnEliminarUsuario" idUsuario="' . $row["id"] . '" fotoUsuario"' . $row["foto"] . '"><i class="fa fa-times"></i></button>
                           </center>  
                       </td>';
        $data[] = $sub_array;
    }

    function get_all_data($connect)
    {
        $query = "SELECT id,datos_completos,dni,oficina,cargo,foto,fecha_registro,estado_voto,codigovoto FROM tap_empleado";
        $result = mysqli_query($connect, $query);
        return mysqli_num_rows($result);
    }

    $output = array(
        "draw"    => intval($_POST["draw"]),
        "recordsTotal"  =>  get_all_data($connect),
        "recordsFiltered" => $number_filter_row,
        "data"    => $data
    );


    echo json_encode($output);
}
