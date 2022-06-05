<?php 
$valor = $_GET["numsolicitud"];
$item = "id";
$tiposolicitud = $_GET["tiposolicitud"];
if($tiposolicitud=="interna"){
    $tabla = "solicitudes";
}else{
    $tabla = "solicitud_externos";
}


$cerrarSolicitud = ControladorSolicitudes::ctrCerrar($tabla, $item, $valor);
if($cerrarSolicitud == "ok"){
    if($tiposolicitud=="interna"){
        echo '
        <script>
            window.location = "solicitudesinternos";
        </script>';
    }else{
        echo '
    <script>
        window.location = "solicitudesexternos";
    </script>';
    }
    
}else{
    echo '
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Ocurrió un error",
        })
    </script>';
}

