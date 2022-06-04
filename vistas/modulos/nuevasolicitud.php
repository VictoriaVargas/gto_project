<?php 
$tiposolicitud = $_GET["tiposolicitud"];
echo $tiposolicitud;
/* if($tiposolicitud == 1){
  echo '<input type="hidden" value="1" name="tiposolicitud"></input>';
}else{
  echo '<input type="hidden" value="2" name="tiposolicitud"></input>';
} */

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
                    <div id="select1">
                      <select class="form-control" name="tramite">
                        <option value=""></option>
                        <option value="1">Mantenimiento Preventivo</option>
                        <option value="2">Mantenimiento Correctivo</option>
                        <option value="3">Carrera Administrativa</option>
                        <option value="4">Ipac 1 y 2</option>
                        <option value="5">Reclamos de Ipac</option>
                        <option value="6">Correo Institucional</option>
                        <option value="7">Soporte Técnico</option>
                        <option value="8">Planea</option>
                        <option value="9">Programa MAS</option>
                      </select>
                    </div>
                    <div id="select2">
                      <select class="form-control" name="tramite" >
                        <option value=""></option>
                        <option value="1">Altas y Bajas</option>
                        <option value="2">Correcciones</option>
                        <option value="3">Cambios de Escuela</option>
                        <option value="4">Actualización en SCE</option>
                        <option value="5">Certificados</option>
                        <option value="6">Becas</option>
                        <option value="7">Preinscripcion</option>
                      </select>
                    </div>
                    <div id="select3">
                      <select class="form-control" name="tramite" >
                        <option value=""></option>
                        <option value="1">Mantenimiento menor de Escuelas</option>
                        <option value="2">Sistema de Inscripcion Automatizada</option>
                        <option value="3">Reposición de Mobiliario</option>
                        <option value="4">Estadística 911</option>
                        <option value="5">Programa Anual de Obra</option>
                        <option value="6">Microplaneación</option>
                        <option value="7">Programación detallada</option>
                      </select>
                    </div>
                    <div id="select4">
                      <select class="form-control" name="tramite" >
                        <option value=""></option>
                        <option value="1">Libros</option>
                        <option value="2">Entrega de Material</option>
                        <option value="3">Inventarios</option>
                        <option value="4">Pago a Terceros</option>
                        <option value="5">Compras</option>
                        <option value="6">Tiendas Escolares</option>
                        <option value="7">Material de Limpieza</option>
                        <option value="8">Esc. Tiempo Completo</option>
                        <option value="9">Mant. Vehiculos</option>
                      </select>
                    </div>
                    <div id="select5">
                      <select class="form-control" name="tramite" >
                        <option value=""></option>
                        <option value="1">Recepción de Documentos</option>
                        <option value="2">Información</option>
                        <option value="3">Apoyo Registro de Usuarios</option>
                        <option value="4">Entrega de Materiales</option>
                        <option value="5">Registro de Llamadas</option>
                        <option value="6">Apoyo áreas</option>
                      </select>
                    </div>
                  </div>

                  <div id="select6">
                    <select class="form-control" name="tramite" >
                      <option value=""></option>
                      <option value="1">Programa Ver Bien</option>
                      <option value="2">Consejo Participación Personal</option>
                      <option value="3">Cruz Roja (Colecta)</option>
                      <option value="4">Contratos y/o Convenios</option>
                      <option value="5">Archivistica</option>
                      <option value="6">Trámites Aseguradoras</option>
                      <option value="7">Regularización Inmuebles</option>
                      <option value="8">Teletón (Colecta)</option>
                    </select>
                  </div>

                  <div id="select7">
                    <select class="form-control" name="tramite" >
                      <option value=""></option>
                      <option value="1">Reclamos</option>
                      <option value="2">Reintegros</option>
                      <option value="3">Altas Pagos</option>
                      <option value="4">Movimientos Afiliatorios</option>
                      <option value="5">Nómina</option>
                      <option value="6">Credenciales</option>
                      <option value="7">Registro Sispro</option>
                    </select>
                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4" id="cardcliente">
          
        </div>

        <div class="d-flex align-items-center">
          <a href="nuevasolicitud" class="btn btn-success btn-sm ms-auto">Guardar Solicitud</a>
          <?php 
            $save = new ControladorSolicitudes();
            $save -> ctrGuardar();
          ?>
        </div>
      </div>
    </div>