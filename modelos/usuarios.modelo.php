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

    static public function mdlIngresarUsuario($tabla, $datos){


        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_user, user, password, type_user, name, email, phone, status, date_entered, avatar) VALUES (:id, :user, :password, :type_user, :name, :email, :phone, :status, :date_entered, :avatar)");

        $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);
        $stmt -> bindParam(":user", $datos["user"], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt -> bindParam(":type_user", $datos["type_user"], PDO::PARAM_STR);
        $stmt -> bindParam(":name", $datos["name"], PDO::PARAM_STR);
        $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt -> bindParam(":phone", $datos["phone"], PDO::PARAM_STR);
        $stmt -> bindParam(":status", $datos["status"], PDO::PARAM_STR);
        $stmt -> bindParam(":date_entered", $datos["date_entered"], PDO::PARAM_STR);
        $stmt -> bindParam(":avatar", $datos["avatar"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return  "error";
        }

        $stmt->close();
        $stmt = null;
    }
    
    

}