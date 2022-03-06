<?php

require_once "conexion.php";

class ModeloUsuarios
{
    /* =============================================
      MOSTRAR UEMPLEADO QUE SER CARGARA CON LA BASE DE DATOS DE COMPESACIONES
      ============================================= */

    static public function mdlMostrarUsuarios($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt->execute();
            //
            return $stmt->fetchAll();
        }


        $stmt->close();

        $stmt = null;
    }


    static public function mdlMostrarUsuariosPersonal($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt->execute();
            //
            return $stmt->fetchAll();
        }


        $stmt->close();

        $stmt = null;
    }



    static public function MdlMostrarUsuariosNoVoto($tabla, $item, $item2, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * WHERE $item2=:$item2 ORDER BY id DESC");

            $stmt->bindParam(":" . $item2, $valor, PDO::PARAM_STR);

            $stmt->execute();
            //
            return $stmt->fetchAll();
        }


        $stmt->close();

        $stmt = null;
    }

    /* ================================================
      REPORTE DE USUARIOS QUE NO REALIZARON EL VOTO
      ================================================= */

    static public function MdlMostrarUsuariosReporte($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * WHERE estado_voto=0 ORDER BY id DESC");

            $stmt->execute();
            //
            return $stmt->fetchAll();
        }


        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      REGISTRO DE EMPLEADO QUE SER CARGARA CON LA BASE DE DATOS DE COMPESACIONES
      ============================================= */

    static public function mdlIngresarUsuario($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(datos_completos,dni,oficina,cargo,foto,fecha_registro) VALUES (:datos_completos,:dni,:oficina,:cargo,:foto,:fecha_registro)");

        $stmt->bindParam(":datos_completos", $datos["datos_completos"], PDO::PARAM_STR);
        $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
        $stmt->bindParam(":oficina", $datos["oficina"], PDO::PARAM_STR);
        $stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_registro", $datos["fecha_registro"], PDO::PARAM_STR);


        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      EDITAR EMPLEADO QUE SER CARGARA CON LA BASE DE DATOS DE COMPESACIONES
      ============================================= */

    static public function mdlEditarUsuario($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET datos_completos=:datos_completos, dni = :dni,oficina= :oficina,cargo=:cargo, foto = :foto WHERE id = :id");


        $stmt->bindParam(":datos_completos", $datos["datos_completos"], PDO::PARAM_STR);
        $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
        $stmt->bindParam(":oficina", $datos["oficina"], PDO::PARAM_STR);
        $stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      ACTUALIZAR EMPLEADO QUE SER CARGARA CON LA BASE DE DATOS DE COMPESACIONES
      ============================================= */

    static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }


    /* =============================================
      ACTUALIZAR ESTADO DEL VOTO - CUANDO EL USUARIO HA VOTADO ES 1 Y CUANDO NO ES 0
      ============================================= */

    static public function mdlActualizarEstadoVoto($tabla, $item1, $valor1, $item2, $valor2)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }




    /* =============================================
      BORRAR EMPLEADO QUE SER CARGARA CON LA BASE DE DATOS DE COMPESACIONES
      ============================================= */

    static public function mdlBorrarUsuario($tabla, $datos)
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
