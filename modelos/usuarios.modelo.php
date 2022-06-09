<?php 

require_once "conexion.php";

class ModeloUsuarios{

    static public function mdlMostrarUsuarios($tabla, $item, $valor, $item2, $valor2){

        if($valor2 == null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
            $stmt -> close();
            $stmt = null;
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND $item2 = :$item2");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
            $stmt -> close();
            $stmt = null;
        }

        
        
    }

    /*REGISTRO DE USUARIO*/

    static public function mdlNuevoUsuario($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,password,rfc,correo,tipo_usuario,centro_trabajo,imagen) VALUES (:nombre, :password, :rfc, :correo, :tipo_usuario, :centro_trabajo, :imagen)");

        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt -> bindParam(":rfc", $datos["rfc"], PDO::PARAM_STR);
        $stmt -> bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt -> bindParam(":tipo_usuario", $datos["tipo_usuario"], PDO::PARAM_STR);
        $stmt -> bindParam(":centro_trabajo", $datos["centro_trabajo"], PDO::PARAM_STR);
        $stmt -> bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return  "error";
        }

        $stmt->close();
        $stmt = null;
    }
    
    

}