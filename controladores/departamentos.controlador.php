<?php 

Class ControladorDepartamentos{

    static public function ctrObtenerEncargado($campo, $valor){
        $tabla = "usuarios";
        $respuesta = ModeloDepartamentos::mdlObtenerDepartamentos($campo, $valor, $tabla);
        return $respuesta;
    }
}