<?php

$connect = mysqli_connect("localhost", "root", "", "gobpedir_votoonline");

if (mysqli_connect_errno()) {

	var_dump("error en la conexion " . mysqli_connect_error());

} else {


	$d1 = DateTime::createFromFormat('Y-m-d', $_POST["start_date"]);
	$d2 = DateTime::createFromFormat('Y-m-d', $_POST["end_date"]);


	$columns = array('id', 'datos_completos', 'rol', 'usuario', 'estadopassword', 'ultimo_login', 'fecha_registro', 'estado');

	$query = "SELECT ta.idacceso as id,te.datos_completos as datos_completos,
					tr.nombre as rol,ta.usuario as usuario,
					ta.password as password,ta.estadopassword as estadopassword,
					ta.ultimo_login as ultimo_login,
					ta.fecha_registro as fecha_registro,
					ta.estado as estado
			FROM tap_acceso ta
					inner join 
					tap_empleado te 
					on ta.idempleado =te.id
					inner join 
					tap_roles tr 
					on ta.idroles =tr.id WHERE ";

	if ($_POST["is_date_search"] == "yes") {

		$fecha_inicial = $d1->format('d/m/Y');
		$fecha_final = $d2->format("d/m/Y");

		$query .= "FORMAT(CONVERT(date,fecha_registro),'dd/MM/yyyy')  BETWEEN '" . $fecha_inicial . "' AND '" . $fecha_final . "' AND ";
	}

	if (isset($_POST["search"]["value"])) {
		$query .= '
            (ta.idacceso LIKE "%' . $_POST["search"]["value"] . '%" 
            OR te.datos_completos LIKE "%' . $_POST["search"]["value"] . '%" 
            OR tr.nombre LIKE "%' . $_POST["search"]["value"] . '%"
            OR ta.usuario LIKE "%' . $_POST["search"]["value"] . '%" 
            OR ta.estadopassword LIKE "%' . $_POST["search"]["value"] . '%"
            OR ta.ultimo_login LIKE "%' . $_POST["search"]["value"] . '%"
            OR ta.fecha_registro LIKE "%' . $_POST["search"]["value"] . '%"
            OR ta.estado LIKE "%' . $_POST["search"]["value"] . '%")';
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

/* 	  var_dump($query . $query1); */

	$data = array();

	while ($row = mysqli_fetch_array($result)) {
		$sub_array = array();
		$sub_array[] = $row["id"];
		$sub_array[] = $row["datos_completos"];
		$sub_array[] = $row["rol"];
		$sub_array[] = $row["usuario"];

		if ($row["estadopassword"] == 1) {
			$sub_array[] = '<td><button class="btn btn-success btn-xs" estadoVoto="' . $row["estadopassword"] . '">Realizo session</button></td>';
		} else {
			$sub_array[] = '<td><button class="btn btn-danger btn-xs" estadoVoto="' . $row["estadopassword"] . '">No ha realizado sesion</button></td>';
		}
		$sub_array[] = $row["ultimo_login"];

		$sub_array[] = $row["fecha_registro"];

		if ($row["estado"] != 0) {
			$sub_array[] = '<td><button class="btn btn-success btn-xs" idAcceso="' . $row["id"] . '" estadoVoto="0">Activado</button></td>';
		} else {
			$sub_array[] = '<td><button class="btn btn-danger btn-xs" idAcceso="' . $row["id"] . '" estadoVoto="1">Desactivado</button></td>';
		}
		$sub_array[] = '<td><button class="btn btn-warning btnEditarAcceso" idAcceso="' . $row["id"] . '" data-toggle="modal" data-target="#modalEditarAcceso"><i class="fa  fa-pencil"></i></button><button class="btn btn-danger btnEliminarAcceso" idAcceso="' . $row["id"] . '" ><i class="fa fa-times"></i></button></td>';

        $data[] = $sub_array;
	}

	function get_all_data($connect)
	{
		$query = "SELECT ta.idacceso as id,te.datos_completos as datos_completos,
						tr.nombre as rol,ta.usuario as usuario,
						ta.password as password,ta.estadopassword as estadopassword,
						ta.ultimo_login as ultimo_login,
						ta.fecha_registro as fecha_registro,
						ta.estado as estado
				FROM tap_acceso ta
						inner join 
						tap_empleado te 
						on ta.idempleado =te.id
						inner join 
						tap_roles tr 
						on ta.idroles =tr.id";
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
