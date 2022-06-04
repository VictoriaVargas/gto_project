<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

/** ======================================== 
 * 
 *  CONTROLADORES
 * 
 */
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/departamentos.controlador.php";
require_once "controladores/solicitudes.controlador.php";


/** ======================================== 
 * 
 *  MODELOS
 * 
 */


require_once "modelos/usuarios.modelo.php";
require_once "modelos/departamentos.modelo.php";
require_once "modelos/solicitudes.modelo.php";

$plantilla = new ControladorPlantilla();

$plantilla -> ctrPlantilla();







