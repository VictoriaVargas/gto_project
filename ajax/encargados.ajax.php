<?php 
require_once "../controladores/departamentos.controlador.php";
require_once "../modelos/departamentos.modelo.php";

$campo = "id";
$valor = $_POST["id"];

$encargado = ControladorDepartamentos::ctrObtenerEncargado($campo, $valor);
$urlimg = $encargado["imagen"];
$nombre = $encargado["nombre"];
$correo = $encargado["correo"];

echo '<div class="card card-profile">
<img src="vistas/assets/img/logogto.jpeg" alt="Image placeholder" class="card-img-top">
<div class="row justify-content-center">
  <div class="col-4 col-lg-4 order-lg-2">
    <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
      <a href="javascript:;">
        <img src="'.$urlimg.'" class="rounded-circle img-fluid border border-2 border-white">
      </a>
    </div>
  </div>
</div>
<div class="card-body pt-0">
  <div class="text-center mt-4">
    <h5>
      '.$nombre.'
    </h5>
    <div class="h6 font-weight-300">
      <i class="ni location_pin mr-2"></i>'.$correo.'
    </div>
  </div>
</div>
</div>';

