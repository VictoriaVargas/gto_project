<?php 

require_once "conexion.php";

class ModeloSolicitudes{

    static public function mdlCrear($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_solicitante, id_depto, id_tramite, estatus) VALUES (:id_solicitante, :id_depto, :id_tramite, :estatus)");
        $stmt -> bindParam(":id_solicitante", $datos["id_solicitante"], PDO::PARAM_STR);
        $stmt -> bindParam(":id_depto", $datos["id_depto"], PDO::PARAM_STR);
        $stmt -> bindParam(":id_tramite", $datos["id_tramite"], PDO::PARAM_STR);
        $stmt -> bindParam(":estatus", $datos["estatus"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return  "error";
        }

        $stmt->close();
        $stmt = null;

    }

    static public function mdlObtener($item, $valor, $tabla){
        $idusuario = $_SESSION["idusuario"];
        $typeuser = $_SESSION["type_user"];
        if($typeuser==1){
            $stmt = Conexion::conectar()->prepare("SELECT $tabla.id as idsolicitud, $tabla.id_solicitante as idusuario, $tabla.id_depto as id_depto, $tabla.id_tramite as id_tramite, $tabla.fecha_registro, $tabla.fecha_cierre, $tabla.estatus, usuarios.nombre, usuarios.correo, tramites.tramite, departamentos.nombre_depto FROM $tabla INNER JOIN usuarios on $tabla.id_solicitante = usuarios.id INNER JOIN tramites ON $tabla.id_tramite = tramites.id INNER JOIN departamentos ON $tabla.id_depto = departamentos.id ");
        }else{
            /*  */
            $stmt = Conexion::conectar()->prepare("SELECT $tabla.id as idsolicitud, $tabla.id_solicitante as idusuario, $tabla.id_depto as id_depto, $tabla.id_tramite as id_tramite, $tabla.fecha_registro, $tabla.fecha_cierre, $tabla.estatus, usuarios.nombre, usuarios.correo, tramites.tramite, departamentos.nombre_depto FROM $tabla INNER JOIN usuarios on $tabla.id_solicitante = usuarios.id INNER JOIN tramites ON $tabla.id_tramite = tramites.id INNER JOIN departamentos ON $tabla.id_depto = departamentos.id WHERE $tabla.id_solicitante = '$idusuario'");
        }
        
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt = null;

    }

    static public function mdlCerrar($tabla, $campo, $valor){
        $hoy = date("Y-m-d H:i:s");  
        date_default_timezone_set('America/Los_Angeles');
        
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estatus = 'Cerrada', fecha_cierre = current_timestamp WHERE id = '$valor'");

        if($stmt->execute()){
            return "ok";
        }else{
            return  "error";
        }

        $stmt->close();
        $stmt = null;
    }

}