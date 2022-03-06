<?php

require_once "conexion.php";

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

    static public function mdlIngresarAcceso($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idempleado,idroles,usuario,password,fecha_registro) VALUES (:idempleado,:idroles,:usuario,:password,:fecha_registro)");

        $stmt->bindParam(":idempleado", $datos["idempleado"], PDO::PARAM_INT);
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
      EDITAR ACCESO
      ============================================= */

      static public function mdlEditarAcceso($tabla, $datos)
      {
  
          $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET idroles = :idroles,usuario= :usuario,password=:password WHERE idacceso = :idacceso");
  
  
          $stmt->bindParam(":idroles", $datos["idroles"], PDO::PARAM_INT);
          $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
          $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
          $stmt->bindParam(":idacceso", $datos["idacceso"], PDO::PARAM_INT);

  
          if ($stmt->execute()) {
  
              return "ok";
          } else {
  
              return "error";
          }
  
          $stmt->close();
  
          $stmt = null;
      }



          /* =============================================
      BORRAR ACCESO
      ============================================= */

    static public function mdlBorrarAcceso($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idacceso = :idacceso");

        $stmt->bindParam(":idacceso", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }



    /* =============================================
      ACTIVAR ACCESO
      ============================================= */

      static public function mdlActualizarAcceso($tabla, $item1, $valor1, $item2, $valor2)
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



}
