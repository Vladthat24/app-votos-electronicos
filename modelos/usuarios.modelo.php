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

            $stmt = Conexion::conectar()->prepare("SELECT e.id as id,e.datos_completos as datos_completos,e.dni as dni,e.oficina as oficina,e.cargo as cargo,e.foto as foto,
              r.nombre as roles,r.id as idroles,e.usuario as usuario,e.password as password,
              e.estado as estado,e.ultimo_login as ultima_login,e.fecha_registro as fecha_registro,e.estado_voto as estado_voto,e.estadopassword as estadopassword FROM $tabla e inner join tap_roles r
              on e.idroles=r.id WHERE e.$item = :$item ");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT e.id as id,e.datos_completos as datos_completos,e.dni as dni,e.oficina as oficina,e.cargo as cargo,e.foto as foto,
              r.nombre as roles,e.usuario as usuario,e.password as password,
              e.estado as estado,e.ultimo_login as ultimo_login,e.fecha_registro as fecha_registro,e.estado_voto as estado_voto,e.estadopassword as estadopassword FROM $tabla e inner join tap_roles r
              on e.idroles=r.id  ORDER BY e.id DESC");


            $stmt->execute();
            //
            return $stmt->fetchAll();
        }


        $stmt->close();

        $stmt = null;
    }

    static public function mdlMostrarUsarioPersonal($tabla, $item, $item2, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT e.id as id,e.datos_completos as datos_completos,e.dni as dni,
            e.oficina as oficina,e.cargo as cargo,e.foto as foto,
            r.nombre as roles,e.usuario as usuario,e.password as password,
            e.estado as estado,e.ultimo_login as ultimo_login,e.fecha_registro as fecha_registro FROM $tabla e inner join tap_roles r
            on e.idroles=r.id WHERE e.$item2=:$item2 ORDER BY e.id DESC");

            $stmt->bindParam(":" . $item2, $valor, PDO::PARAM_STR);

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

            $stmt = Conexion::conectar()->prepare("SELECT e.id as id,e.datos_completos as datos_completos,e.dni as dni,
            e.oficina as oficina,e.cargo as cargo,e.foto as foto,
            r.nombre as roles,e.usuario as usuario,e.password as password,
            e.estado as estado,e.ultimo_login as ultimo_login,e.fecha_registro as fecha_registro FROM $tabla e inner join tap_roles r
            on e.idroles=r.id WHERE e.$item2=:$item2 ORDER BY e.id DESC");

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

            $stmt = Conexion::conectar()->prepare("SELECT e.id as id,e.datos_completos as datos_completos,e.dni as dni, e.oficina as oficina,e.cargo as cargo,
            e.foto as foto, r.nombre as roles,e.usuario as usuario,e.password as password,
            e.estado as estado,e.ultimo_login as ultimo_login,e.fecha_registro as fecha_registro FROM $tabla e inner join tap_roles r
            on e.idroles=r.id WHERE e.estado_voto=0 and e.usuario!='vblanco' and r.nombre!='ADMINISTRADOR'  ORDER BY e.id DESC");

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

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(datos_completos,dni,oficina,cargo,foto,idroles,usuario, password,fecha_registro) VALUES (:datos_completos,:dni,:oficina,:cargo,:foto,:idroles,:usuario, :password,:fecha_registro)");

        $stmt->bindParam(":datos_completos", $datos["datos_completos"], PDO::PARAM_STR);
        $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
        $stmt->bindParam(":oficina", $datos["oficina"], PDO::PARAM_STR);
        $stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt->bindParam(":idroles", $datos["idroles"], PDO::PARAM_INT);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
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

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET datos_completos=:datos_completos, dni = :dni,oficina= :oficina,cargo=:cargo,password = :password, idroles = :idroles, foto = :foto WHERE id = :id");


        $stmt->bindParam(":datos_completos", $datos["datos_completos"], PDO::PARAM_STR);
        $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
        $stmt->bindParam(":oficina", $datos["oficina"], PDO::PARAM_STR);
        $stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":idroles", $datos["idroles"], PDO::PARAM_INT);
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
