<?php

class ModeloAcceso
{


    static public function mdlMostrarAcceso($tabla, $item, $valor)
    {

        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT ta.idacceso as idacceso,ta.idempleado as idempleado,ta.idroles as idroles,ta.usuario as usuario,ta.password as password,
                    ta.estadopassword as estadopassword,ta.ultimo_login as ultimo_login,ta.estado as estado,
                    te.id as id,te.datos_completos as datos_completos,te.dni as dni,te.oficina as oficina,te.cargo as cargo,te.foto as foto,te.fecha_registro as fecha_registro,
                    te.estado_voto as estado_voto,te.codigovoto as codigovoto,tr.nombre as roles
                    from $tabla ta inner join tap_empleado te 
                    on ta.idempleado =te.id 
                    inner join tap_roles tr 
                    on ta.idroles =tr.id 
                    where ta.$item=:$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT ta.idacceso as idacceso,ta.idempleado as idempleado,ta.idroles as idroles,ta.usuario as usuario,ta.password as password,
                    ta.estadopassword as estadopassword,ta.ultimo_login as ultimo_login,ta.estado as estado,
                    te.id as id,te.datos_completos as datos_completos,te.dni as dni,te.oficina as oficina,te.cargo as cargo,te.foto as foto,te.fecha_registro as fecha_registro,
                    te.estado_voto as estado_voto,te.codigovoto as codigovoto,tr.nombre as roles
                    from $tabla ta inner join tap_empleado te 
                    on ta.idempleado =te.id 
                    inner join tap_roles tr 
                    on ta.idroles =tr.id ORDER BY te.id DESC");

            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt = null;
    }



    /* =============================================
      ACTUALIZAR CONTRASEÑA Y ESTADO DE PASSWORD
      ============================================= */

    static public function mdlActualizarEstadoPassword($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3, $item4, $valor4)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1,$item2=:$item2 WHERE $item3= :$item3 and $item4=:$item4");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item3, $valor3, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item4, $valor4, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
    /* =============================================
      REGISTRO DE EMPLEADO QUE SER CARGARA CON LA BASE DE DATOS DE COMPESACIONES
      ============================================= */

    static public function mdlIngresarUsuario($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idempleado,idroles,usuario,password,estadopassword,fecha_registro) VALUES (:datos_completos,:dni,:oficina,:cargo,:foto,:fecha_registro)");

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
}
