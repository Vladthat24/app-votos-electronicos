<?php

$connect = mysqli_connect("localhost", "root", "", "gobpedir_votoonline") or die("ERROR".mysqli_error($connect));
$columns = array('id', 'datos_completos', 'dni', 'oficina', 'cargo','fecha_registro');

$query = "SELECT id,datos_completos,dni,oficina,cargo,fecha_registro FROM tap_empleado WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'fecha_registro BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (id LIKE "%'.$_POST["search"]["value"].'%" 
  OR datos_completos LIKE "%'.$_POST["search"]["value"].'%" 
  OR dni LIKE "%'.$_POST["search"]["value"].'%"
  OR oficina LIKE "%'.$_POST["search"]["value"].'%" 
  OR cargo "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["id"];
 $sub_array[] = $row["datos_completos"];
 $sub_array[] = $row["dni"];
 $sub_array[] = $row["oficina"];
 $sub_array[] = $row["cargo"];
 $sub_array[] = $row["fecha_registro"];
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT id,datos_completos,dni,oficina,cargo,fecha_registro FROM tap_empleado";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

var_dump($output);
echo json_encode($output);
