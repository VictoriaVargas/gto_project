<?php 

class ControladorUsuarios{


    /****************  */
    //INGRESO DE USUARIO 
    /**************  ***/

    static public function ctrIngresoUsuario(){

        if(isset($_POST["type_user"])){

            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["type_user"])){
                $typeuser = $_POST["type_user"];
                if($typeuser == 1){
                    $item = "correo";
                    $valor = $_POST["email"];
                    $item2 = "password";    
                    $valor2 = $_POST["password"];
                    $flag = 1;
                }else
                if($typeuser == 2){
                    $item = "rfc";
                    $valor = $_POST["rfc"]; 
                    $item2 = null;
                    $valor2 = null;
                    $flag = 2;

                }else
                if($typeuser == 3){
                    $item = "correo";
                    $valor = $_POST["email3"];
                    $item2 = "nombre";
                    $valor2 = $_POST["nombre"];
                    $flag = 3;
                }
                $tabla = "usuarios";
               /* $encriptar = crypt($_POST["password"], '$1$rasmusle$'); */
                $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor, $item2, $valor2);
                if($flag==1){
                    if($respuesta["correo"] == $_POST["email"]){
                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["idusuario"] = $respuesta["id"];
                        $_SESSION["type_user"] = $respuesta["tipo_usuario"];
                        $_SESSION["nombre"] = $respuesta["nombre"];
                        $_SESSION["correo"] = $respuesta["correo"];
                        
                        echo '<script>
                                window.location = "inicio";
                            </script>';
                    }else{
                        echo '<div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                    }
                }
                else
                if($flag==2){
                    if($respuesta["rfc"] == $_POST["rfc"]){
                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["idusuario"] = $respuesta["id"];
                        $_SESSION["type_user"] = $respuesta["tipo_usuario"];
                        $_SESSION["nombre"] = $respuesta["nombre"];
                        $_SESSION["correo"] = $respuesta["correo"];
                        echo '<script>
                                window.location = "inicio";
                            </script>';
                    }else{
                        echo '<div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                    }
                }else
                if($flag==3){
                    if($respuesta["correo"] == $_POST["email3"] && $respuesta["nombre"] == $_POST["nombre"]){
                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["idusuario"] = $respuesta["id"];
                        $_SESSION["type_user"] = $respuesta["tipo_usuario"];
                        $_SESSION["nombre"] = $respuesta["nombre"];
                        $_SESSION["correo"] = $respuesta["correo"];
                        echo '<script>
                                window.location = "inicio";
                            </script>';
                    }else{
                        echo '<div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                    }
                }
            }

        }else{
            
        }


    }

    static public function ctrRegistroUsuario(){
        if(isset($_POST["nombrecompleto"])){
            $ruta = "";
            if(isset($_FILES["imagen"]["tmp_name"])){
                list($ancho, $alto) = getimagesize($_FILES["imagen"]["tmp_name"]);

                $nuevoancho = 150;
                $nuevoalto = 150;

                /**************  CREAMOS EL DIRECTORIO DONDE SE GUARDARA LA IMAGEN ***/

                $directorio = "vistas/assets/img/".$_POST["nombrecompleto"];
                mkdir($directorio, 0755);

                if($_FILES["imagen"]["type"] == "image/jpeg"){

                    $aleatorio = mt_rand(100,999); 

                    $ruta = "vistas/assets/img/".$_POST["nombrecompleto"]."/".$aleatorio.".jpg";

                    $origen = imagecreatefromjpeg($_FILES["imagen"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoancho,$nuevoalto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);

                    imagejpeg($destino, $ruta);

                }

                if($_FILES["imagen"]["type"] == "image/png"){

                    $aleatorio = mt_rand(100,999); 

                    $ruta = "vistas/assets/img/".$_POST["nombrecompleto"]."/".$aleatorio.".png";

                    $origen = imagecreatefrompng($_FILES["imagen"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoancho,$nuevoalto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);

                    imagepng($destino, $ruta);

                }
            }
            $tabla = "usuarios";
            $rfc = "";
            if(isset($_POST["rfc"])){
                $rfc = $_POST["rfc"];
            }else{
                $rfc = "";
            }

            $ct = "";
            if(isset($_POST["centrotrabajo"])){
                $ct = $_POST["centrotrabajo"];
            }else{
                $ct = "";
            }

            
            $datos = array(
                "nombre" => $_POST["nombrecompleto"],
                "password" => $_POST["password"],
                "correo" => $_POST["email"],
                "tipo_usuario"=> $_POST["newtype_user"],
                "centro_trabajo"=>$ct,
                "imagen"=>$ruta,
                "rfc"=>$rfc);
            
            $respuesta = ModeloUsuarios::mdlNuevoUsuario($tabla, $datos);

                if($respuesta == "ok"){

                    echo '<script>
            
                            Swal.fire({
                                icon: "success",
                                title: "El usuario ha sido creado exitosamente",
                                showConfirmButton: true, 
                                confirmButtonText: "Cerrar",
                                closeOnConfirm : false

                            }).then((result)=>{
                                if(result.value){
                                    window.location = "login";
                                }
                            });
            
                    </script>';

                }else{
                    echo '<script>
                
                    Swal.fire({
                        title: "Error al crear usuario.",
                        icon: "error",
                        showConfirmButton: true, 
                        confirmButtonText: "Cerrar",
                        closeOnConfirm : false
                    }).then((result)=>{
                         
                            if(result.value){
                                window.location = "registrarse";
                            }
    
                    });
                    
                    </script>';
                }
            
        }
    }
    
}