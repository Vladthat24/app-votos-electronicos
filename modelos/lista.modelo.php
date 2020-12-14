<?php

require_once "conexion.php";

class ModeloLista
{

	/*=============================================
	CREAR LISTO
	=============================================*/

	static public function mdlIngresarLista($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,descripcion,fecha_registro) VALUES (:nombre,:descripcion,:fecha_registro)");

		$stmt->bindParam(":nombre", $datos, PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos, PDO::PARAM_STR);
		$stmt->bindParam(":fecha_registro", $datos, PDO::PARAM_STR);



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

	static public function mdlMostrarLista($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla order by id desc");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}

	/*=============================================
	EDITAR LISTA
	=============================================*/

	static public function mdlEditarLista($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, descripcion=:descripcion WHERE id = :id");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
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

	static public function mdlBorrarLista($tabla, $datos)
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
