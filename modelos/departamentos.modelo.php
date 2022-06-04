<?php 

require_once "conexion.php";

class ModeloDepartamentos{
    static public function mdlObtenerDepartamentos($campo, $valor, $tabla){

        $stmt = Conexion::conectar()->prepare("SELECT usuarios.id as idusuario, usuarios.nombre, usuarios.correo, usuarios.imagen FROM usuarios INNER JOIN departamentos ON usuarios.id = departamentos.encargado WHERE departamentos.id = $valor");
        $stmt -> bindParam(":".$campo, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close();
        $stmt = null;

    }
}