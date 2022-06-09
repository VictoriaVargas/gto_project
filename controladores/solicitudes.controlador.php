<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'lib/PHPMailer/PHPMailer/src/Exception.php';
require 'lib/PHPMailer/PHPMailer/src/PHPMailer.php';
require 'lib/PHPMailer/PHPMailer/src/SMTP.php';

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

            $item2 = "id";
            $valor2 = $id_depto;

            $correodepto = ControladorDepartamentos::ctrObtenerEncargado($item2, $valor2);
            $correo_depto = $correodepto["correo"];

            
            
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'julieta.victoria.vargas@gmail.com';                     //SMTP username
                $mail->Password   = 'iletyrczprqwyuph';                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('administracion@gto.com', 'Administracion Guanajuato');
                $mail->addAddress($correo_depto, 'Joe User');     //Add a recipient
               
               
            
            
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Nueva Solicitud Creada';
                $mail->Body    = 'Se ha generado una nueva solicitud, por favor, revisala.';
            
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
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