<?php 

class ControladorSolicitudes{
    static public function ctrGuardar(){
        if(isset($_POST["departamento"])){            
            $id_solicitante = $_SESSION["idusuario"];

            $id_depto = $_POST["departamento"];
            $tramite = $_POST["tramite"];
            
        
            $estatus = "Abierta";
            $tiposolicitud = $_POST["tiposolicitud"];
            if($tiposolicitud == 1){
                $tabla = "solicitudes";
            }else{
                $tabla = "solicitud_externos";
            }

            $datos = Array(
                "id_solicitante" => $id_solicitante,
                "id_depto" => $id_depto,
                "id_tramite" => $tramite,
                "estatus" => $estatus,

            );

            
            $respuesta = ModeloSolicitudes::mdlCrear($tabla, $datos);

            if($respuesta == "ok"){
                if($tiposolicitud==1){
                    echo 
                    '<script>
                        Swal.fire({
                            icon: "success",
                            title: "Solicitud creada exitosamente.",
                            showConfirmButton: true, 
                            confirmButtonText: "Cerrar",
                            closeOnConfirm : false
                        }).then((result)=>{
                            if(result.value){
                                window.location = "solicitudesinternos";
                            }
                        });
                    </script>';
                }else{
                    echo 
                '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Solicitud creada exitosamente.",
                        showConfirmButton: true, 
                        confirmButtonText: "Cerrar",
                        closeOnConfirm : false
                    }).then((result)=>{
                        if(result.value){
                            window.location = "solicitudesexternos";
                        }
                    });
                </script>';
                }
                

                //Funcionalidad Correo
            }else{
                echo '<script>
                        Swal.fire({
                            title: "Error al crear la solicitud.",
                            icon: "error",
                            showConfirmButton: true, 
                            confirmButtonText: "Cerrar",
                            closeOnConfirm : false
                        }).then((result)=>{
                            
                                if(result.value){
                                    window.location = "nuevasolicitud";
                                }
                        });
                        
                    </script>';
            } 
        }
    }

    static public function ctrObtener($item, $valor){
        if($valor=="internas"){
            $tabla = "solicitudes";
        }else{
            $tabla = "solicitud_externos";
        }
        $respuesta = ModeloSolicitudes::mdlObtener($item, $valor, $tabla);
        return $respuesta;
    }

    static public function ctrCerrar($tabla, $campo, $valor){
        $respuesta = ModeloSolicitudes::mdlCerrar($tabla, $campo, $valor);
        return $respuesta;
    }
}