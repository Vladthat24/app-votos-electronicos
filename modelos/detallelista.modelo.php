<?php

require_once "conexion.php";

class ModeloDetalleLista
{

	/*=============================================
	CREAR DETALLE LISTO
	=============================================*/

	static public function mdlIngresarDetalleLista($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (idempleado,idlista,idcargo,fecha_registro) VALUES (:idempleado,:idlista,:idcargo,:fecha_registro)");

		$stmt->bindParam(":idempleado", $datos["idempleado"], PDO::PARAM_INT);
		$stmt->bindParam(":idlista", $datos["idlista"], PDO::PARAM_INT);
		$stmt->bindParam(":idcargo", $datos["idcargo"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha_registro", $datos["fecha_registro"], PDO::PARAM_STR);



		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR LISTA
	=============================================*/

	static public function mdlMostrarDetalleLista($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT dl.id as id,e.datos_completos as datos_completos,l.nombre as lista,
			c.nombre as cargo,dl.fecha_registro as fecha_registro 
			FROM $tabla dl
			inner join tap_empleado e on dl.idempleado=e.id
			inner join tap_lista l on dl.idlista=l.id
			inner join tap_cargo c on dl.idcargo=c.id
			order by dl.id desc");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}


	/*=============================================
	MOSTRAR LISTA EN MODULO DE VOTO
	=============================================*/

	static public function mdlMostrarDetalleListaVoto($tabla, $item, $valor)
	{

		if ($item != null) {
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();

		} else {

			$stmt = Conexion::conectar()->prepare("SELECT dl.id as id,e.datos_completos as datos_completos,e.id as idempleado,e.foto as foto, dl.idlista as idlista,
			l.nombre as lista,l.descripcion as descripcion,c.nombre as cargo,dl.fecha_registro as fecha_registro 
			FROM $tabla dl
			inner join tap_empleado e on dl.idempleado=e.id
			inner join tap_lista l on dl.idlista=l.id
			inner join tap_cargo c on dl.idcargo=c.id
			order by dl.id desc");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}




	/*=============================================
	EDITAR LISTA
	=============================================*/

	static public function mdlEditarDetalleLista($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  idempleado= :idempleado,idlista=:idlista,idcargo=:idcargo WHERE id = :id");

		$stmt->bindParam(":idempleado", $datos["idempleado"], PDO::PARAM_INT);
		$stmt->bindParam(":idlista", $datos["idlista"], PDO::PARAM_INT);
		$stmt->bindParam(":idcargo", $datos["idcargo"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);


		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	BORRAR LISTA
	=============================================*/

	static public function mdlBorrarDetalleLista($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}
}
