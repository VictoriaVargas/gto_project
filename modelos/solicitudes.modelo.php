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

}