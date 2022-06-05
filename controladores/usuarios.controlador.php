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


    /*******************  */
    // REGISTRO DE USUARIO 
    /**************  ***/

    static public function ctrCrearUsuario(){


        if(isset($_POST["user"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["nombrecompleto"]) &&
                preg_match('/^[a-zA-Z0-9]+$/',$_POST["user"]) &&
                preg_match('/^[a-zA-Z0-9]+$/',$_POST["password"])){

                    $ruta ="";

                    if(isset($_FILES["nuevaFoto"]["tmp_name"])){ 

                        list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                        $nuevoancho = 150;
                        $nuevoalto = 150;

                        /**************  CREAMOS EL DIRECTORIO DONDE SE GUARDARA LA IMAGEN ***/

                        $directorio = "vistas/img/usuarios/".$_POST["user"];
                        mkdir($directorio, 0755);

                        if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

                            $aleatorio = mt_rand(100,999); 

                            $ruta = "vistas/img/usuarios/".$_POST["user"]."/".$aleatorio.".jpg";

                            $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                            $destino = imagecreatetruecolor($nuevoancho,$nuevoalto);

                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);

                            imagejpeg($destino, $ruta);

                        }

                        if($_FILES["nuevaFoto"]["type"] == "image/png"){

                            $aleatorio = mt_rand(100,999); 

                            $ruta = "vistas/img/usuarios/".$_POST["user"]."/".$aleatorio.".png";

                            $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                            $destino = imagecreatetruecolor($nuevoancho,$nuevoalto);

                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);

                            imagepng($destino, $ruta);

                        }

                        


                    }
                    

                    

                    $tabla = "bio_users";

                    $encriptar = crypt($_POST["password"], '$1$rasmusle$'); 

                    $datos = array("id" => bin2hex(openssl_random_pseudo_bytes(16)),
                    "name" => $_POST["nombrecompleto"],
                    "user" => $_POST["user"],
                    "password" => $encriptar,
                    "type_user" => $_POST["tipodeusuario"],
                    "email" => $_POST["email"],
                    "phone" => $_POST["telefono"],
                    "status" => $_POST["status"],
                    "date_entered" => date("Y-m-d H:i:s"),
                    "avatar" => $ruta);

                    $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

                    if($respuesta == "ok"){

                        echo '<script>
                
                                Swal.fire({
                                    icon: "success",
                                    title: "El usuario ha sido guardado exitosamente",
                                    showConfirmButton: true, 
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm : false

                                }).then((result)=>{
                                    if(result.value){
                                        window.location = "usuarios";
                                    }
                                });
                
                        </script>';

                    }
                

                }else{

                echo '<script>
                
                Swal.fire({
                    title: "El usuario no puede ir vacío o llevar caracteres especiales",
                    icon: "error",
                    showConfirmButton: true, 
                    confirmButtonText: "Cerrar",
                    closeOnConfirm : false
                }).then((result)=>{
                     
                        if(result.value){
                            window.location = "crearusuario";
                        }

                });
                
                </script>';

            }

        }


    }
    
}