
<form method="POST">
<?php 
$tiposolicitud = $_GET["tiposolicitud"];
if($tiposolicitud == 1){
  echo '<input type="hidden" value="1" name="tiposolicitud"></input>';
}else{
  echo '<input type="hidden" value="2" name="tiposolicitud"></input>';
}

?>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Nueva Solicitud</p>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">Selecciona el departamento a visitar</p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Departamento</label>
                    <select class="form-control" id="departamento" name="departamento">
                      <option value=""></option>
                      <option value="1">Informatica</option>
                      <option value="2">Planeacion</option>
                      <option value="3">Eficiencia Administrativa</option>
                      <option value="4">Servicios al Personal</option>
                      <option value="5">Control Escolar</option>
                      <option value="6">Secretaria</option>
                      <option value="7">Jefatura</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group" id="tramites_info">
                    <label for="example-text-input" class="form-control-label">¿Qué tramite desea hacer?</label>
                    <div id="tramite_select">
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4" id="cardcliente">
          
        </div>

        <div class="d-flex align-items-center">
          <button class="btn btn-success btn-sm ms-auto">Guardar Solicitud</button>
          <?php 
            $save = new ControladorSolicitudes();
            $save -> ctrGuardar();
          ?>
        </div>
      </div>
    </div>
</form>