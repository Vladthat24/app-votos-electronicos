<?php

require_once "conexion.php";

class ModeloVotar
{
    /* =============================================
      MOSTRAR TICKET
      ============================================= */

    static public function mdlMostrarTicket($tabla, $item, $valor, $item2, $valor2)
    {
        //CAPTURAR DATOS PARA EL EDIT EN EL FORMULARIO
        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item2 != :$item2 ORDER BY id DESC");

            $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }



    /* =============================================
      REGISTRO DE TICKET
      ============================================= */

    static public function mdlIngresarVotar($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo,valor,fecha_registro)
                VALUES (:codigo,:valor,:fecha_registro)");

        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":valor", $datos["valor"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_registro", $datos["fecha_registro"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
}
