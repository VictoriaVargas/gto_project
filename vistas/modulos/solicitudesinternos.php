<?php 

$item = null;
$valor = "internas";

$solicitudes = ControladorSolicitudes::ctrObtener($item, $valor);
$listsolicitudes = "";

foreach ($solicitudes as $key => $value) {

  $visitante = $value["nombre"];
  $departamento = $value["nombre_depto"];
  $numsolicitud = $value["idsolicitud"];
  $fechasolicitud = $value["fecha_registro"];
  $fechacierre = $value["fecha_cierre"];
  $estatus = $value["estatus"];

  if($estatus == "Abierta"){
    $divestatus = '
    <td class="align-middle text-center text-sm">
      <span class="badge badge-sm bg-gradient-info">Sin Atender</span>
    </td>';
    $abierta = 1;
  }else{
    $divestatus ='
    <td class="align-middle text-center text-sm">
      <span class="badge badge-sm bg-gradient-success">Atendida</span>
    </td>';
    $abierta = 0;
  }

  if($abierta == 1){
    $cerrarsolicitud = '
    <td class="align-middle text-center text-sm">
      <button class="btn btn-success btn-sm ms-auto btnactualizarestatus" id="actualizarestatus" idsolicitud="'.$numsolicitud.'">Cerrar Solicitud</button>  
    </td>
  </tr>';
  }else{
    $cerrarsolicitud = '
    <td class="align-middle text-center">
      <button class="btn btn-secondary btn-sm ms-auto">Solicitud Cerrada</button>  
    </td>';
  }

  $listsolicitudes .= '
  <tr>
    <td class="align-middle text-center">
      <p class="text-xs font-weight-bold mb-0">'.$numsolicitud.'</p>
    </td>

    <td class="align-middle text-center">
      <p class="text-xs font-weight-bold mb-0">'.$visitante.'</p>
    </td>

    <td class="align-middle text-center">
      <p class="text-xs font-weight-bold mb-0">'.$departamento.'</p>
    </td>

    <td class="align-middle text-center">
      <span class="text-secondary text-xs font-weight-bold">'.$fechasolicitud.'</span>
    </td>

    <td class="align-middle text-center">
      <span class="text-secondary text-xs font-weight-bold">'.$fechacierre.'</span>
    </td>';

  $listsolicitudes .= $divestatus;

  $listsolicitudes .= $cerrarsolicitud;
}
?>
<div class="container-fluid py-4">
    <div class="d-flex align-items-center">
        <button class="btn btn-success btn-sm ms-auto btnnuevasolicitud" id="tiposolicitud" tiposolicitud="1">Nueva Solicitud</button>
    </div>
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Solicitudes Internas</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="myTable">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Solicitud</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Visitante</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Departamento</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha de Solicitud</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha de Cierre</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estatus</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actualizar</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php echo $listsolicitudes?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>