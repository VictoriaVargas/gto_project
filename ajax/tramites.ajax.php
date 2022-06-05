<?php 
$tramite = $_POST["id"];
if($tramite==1){
    echo '
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
  </select>';
}else
if($tramite==2){
    echo '<select class="form-control" name="tramite" >
    <option value=""></option>
    <option value="10">Mantenimiento menor de Escuelas</option>
    <option value="11">Sistema de Inscripcion Automatizada</option>
    <option value="12">Reposición de Mobiliario</option>
    <option value="13">Estadística 911</option>
    <option value="14">Programa Anual de Obra</option>
    <option value="15">Microplaneación</option>
    <option value="16">Programación detallada</option>
  </select>';
}else
if($tramite==3){
    echo '
    <select class="form-control" name="tramite" >
    <option value=""></option>
    <option value="17">Libros</option>
    <option value="18">Entrega de Material</option>
    <option value="19">Inventarios</option>
    <option value="20">Pago a Terceros</option>
    <option value="21">Compras</option>
    <option value="22">Tiendas Escolares</option>
    <option value="23">Material de Limpieza</option>
    <option value="24">Esc. Tiempo Completo</option>
    <option value="25">Mant. Vehiculos</option>
  </select>';
}else
if($tramite==4){
    echo '
    <select class="form-control" name="tramite" >
        <option value=""></option>
        <option value="26">Reclamos</option>
        <option value="27">Reintegros</option>
        <option value="28">Altas Pagos</option>
        <option value="29">Movimientos Afiliatorios</option>
        <option value="30">Nómina</option>
        <option value="31">Credenciales</option>
        <option value="32">Registro Sispro</option>
    </select>
    ';
}else
if($tramite==5){
echo '<select class="form-control" name="tramite" >
<option value=""></option>
<option value="33">Altas y Bajas</option>
<option value="34">Correcciones</option>
<option value="35">Cambios de Escuela</option>
<option value="36">Actualización en SCE</option>
<option value="37">Certificados</option>
<option value="38">Becas</option>
<option value="39">Preinscripcion</option>
</select>';
}else
if($tramite==6){
    echo '<select class="form-control" name="tramite" >
    <option value=""></option>
    <option value="40">Recepción de Documentos</option>
    <option value="41">Información</option>
    <option value="42">Apoyo Registro de Usuarios</option>
    <option value="43">Entrega de Materiales</option>
    <option value="44">Registro de Llamadas</option>
    <option value="45">Apoyo áreas</option>
  </select>';
}else
if($tramite==7){
    echo '<select class="form-control" name="tramite" >
    <option value=""></option>
    <option value="46">Programa Ver Bien</option>
    <option value="47">Consejo Participación Personal</option>
    <option value="48">Cruz Roja (Colecta)</option>
    <option value="49">Contratos y/o Convenios</option>
    <option value="50">Archivistica</option>
    <option value="51">Trámites Aseguradoras</option>
    <option value="52">Regularización Inmuebles</option>
    <option value="53">Teletón (Colecta)</option>
  </select>';
}