<?php

require_once "conexion.php";

class ModeloTicket
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

    static public function mdlMostrarTicket_usuario($tabla, $item, $item2, $valor, $item3, $valor3)
    {
        //CAPTURAR DATOS PARA EL EDIT EN EL FORMULARIO
        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item2=:$item2 AND $item3 != :$item3 ORDER BY id DESC");

            $stmt->bindParam(":" . $item2, $valor, PDO::PARAM_STR);
            $stmt->bindParam(":" . $item3, $valor3, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }

    static public function mdlMostrarTicket_informatico($tabla, $item, $item2, $valor, $item3, $valor3)
    {
        //CAPTURAR DATOS PARA EL EDIT EN EL FORMULARIO
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item2=:$item2 AND $item3 != :$item3 ORDER BY id DESC");

            $stmt->bindParam(":" . $item2, $valor, PDO::PARAM_STR);
            $stmt->bindParam(":" . $item3, $valor3, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetchAll();
        }




        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      REGISTRO DE TICKET
      ============================================= */

    static public function mdlIngresarTicket($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_categoria, codigo, descripcion,observacion,nombre,oficina,area,cargo,cel,sede,piso,id_soporte,soporte,id_estado, imagen,fecha)
                VALUES (:id_categoria, :codigo, :descripcion,:observacion,:nombre,:oficina,:area,:cargo,:cel,:sede,:piso,:id_soporte,:soporte,:id_estado,:imagen,:fecha)");

        $stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":oficina", $datos["oficina"], PDO::PARAM_STR);
        $stmt->bindParam(":area", $datos["area"], PDO::PARAM_STR);
        $stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
        $stmt->bindParam(":cel", $datos["cel"], PDO::PARAM_STR);
        $stmt->bindParam(":sede", $datos["sede"], PDO::PARAM_STR);
        $stmt->bindParam(":piso", $datos["piso"], PDO::PARAM_STR);
        $stmt->bindParam(":id_soporte", $datos["id_soporte"], PDO::PARAM_INT);
        $stmt->bindParam(":soporte", $datos["soporte"], PDO::PARAM_STR);
        $stmt->bindParam(":id_estado", $datos["id_estado"], PDO::PARAM_INT);
        $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /* =============================================
      EDITAR TICKET
      ============================================= */

    static public function mdlEditarTicket($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_categoria = :id_categoria,codigo=:codigo,descripcion = :descripcion,observacion=:observacion,nombre=:nombre,oficina=:oficina,area=:area,cargo=:cargo,cel=:cel,sede=:sede,piso=:piso,id_soporte=:id_soporte,soporte=:soporte,id_estado=:id_estado, imagen = :imagen WHERE codigo = :codigo");

        $stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":oficina", $datos["oficina"], PDO::PARAM_STR);
        $stmt->bindParam(":area", $datos["area"], PDO::PARAM_STR);
        $stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
        $stmt->bindParam(":cel", $datos["cel"], PDO::PARAM_STR);
        $stmt->bindParam(":sede", $datos["sede"], PDO::PARAM_STR);
        $stmt->bindParam(":piso", $datos["piso"], PDO::PARAM_STR);
        $stmt->bindParam(":id_soporte", $datos["id_soporte"], PDO::PARAM_INT);
        $stmt->bindParam(":soporte", $datos["soporte"], PDO::PARAM_STR);
        $stmt->bindParam(":id_estado", $datos["id_estado"], PDO::PARAM_INT);
        $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /* =============================================
      BORRAR TICKET
      ============================================= */

    static public function mdlEliminarTicket($tabla, $datos)
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

    /* =============================================
      ACTUALIZAR TICKET
      ============================================= */

    static public function mdlActualizarTicket($tabla, $item1, $valor1, $valor)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":id", $valor, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	SUMAR DE TICKET POR SOPORTE
	=============================================*/

    static public function mdlSumaTicket($tabla, $item, $valor)
    {

        $stmt = Conexion::conectar()->prepare("SELECT count(*) from $tabla where $item=:$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
    TICKET POR SOPORTE
	=============================================*/

    static public function mdlTicketAtendidos($tabla, $true, $item, $valor)
    {
        if ($true != null) {

            $stmt = Conexion::conectar()->prepare("SELECT count(*) from $tabla where $item =:$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT count(*) from $tabla where $item!=:$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        }

        $stmt->close();

        $stmt = null;
    }
}



class ModeloTicketInactivo
{

    static public function mdlMostrarTicket($tabla, $item, $valor, $item2, $valor2)
    {
        //CAPTURAR DATOS PARA EL EDIT EN EL FORMULARIO
        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item2 = :$item2 ORDER BY id DESC");

            $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }

    static public function mdlMostrarTicket_usuario($tabla, $item, $item2, $valor, $item3, $valor3)
    {
        //CAPTURAR DATOS PARA EL EDIT EN EL FORMULARIO
        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item2=:$item2 AND $item3 = :$item3 ORDER BY id DESC");

            $stmt->bindParam(":" . $item2, $valor, PDO::PARAM_STR);
            $stmt->bindParam(":" . $item3, $valor3, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }

    static public function mdlMostrarTicket_informatico($tabla, $item, $item2, $valor, $item3, $valor3)
    {
        //CAPTURAR DATOS PARA EL EDIT EN EL FORMULARIO
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item2=:$item2 AND $item3 = :$item3 ORDER BY id DESC");

            $stmt->bindParam(":" . $item2, $valor, PDO::PARAM_STR);
            $stmt->bindParam(":" . $item3, $valor3, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetchAll();
        }




        $stmt->close();

        $stmt = null;
    }
}
