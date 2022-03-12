<?php
require_once("../../configs/configs.php");
require_once("../../configs/funcion.php");

if(empty($_POST["email"]) || empty($_POST["contraseña"])){
    header("Location:../index.php?seccion=crear_usuario&estado=error&mensaje=datos_minimos");
    die();
} 

$nombre = empty($_POST["nombre"]) ? "" : ucfirst($_POST["nombre"]);
$apellido = empty($_POST["apellido"]) ? "" : ucfirst($_POST["apellido"]);
$email = strtolower($_POST["email"]);
$contraseña = password_hash($_POST["contraseña"], PASSWORD_DEFAULT);
$usuarioAutomatico = explode("@", $email)[0];
$usuario = empty($_POST["usuario"]) ? $usuarioAutomatico : strtolower($_POST["usuario"]);
$tipousuario = empty($_POST["tipousuario"]) ? "2" : $_POST["tipousuario"];

$buscarEmail = <<<BUSCARCORREO
                    SELECT * from usuarios 
                    WHERE email='$email'
BUSCARCORREO;
$resultado = mysqli_query($cnx, $buscarEmail);
$contador = mysqli_num_rows($resultado);
if($contador == 1){
    header("Location:../index.php?seccion=crear_usuario&estado=error&mensaje=email_ya_existente");
    die();
}

$buscarUsuario = <<<BUSCARUSUARIO
                    SELECT * from usuarios 
                    WHERE usuario = '$usuario'
BUSCARUSUARIO;
$resultado = mysqli_query($cnx, $buscarUsuario);
$contador = mysqli_num_rows($resultado);
if($contador == 1){
    header("Location:../index.php?seccion=crear_usuario&estado=error&mensaje=usuario_ya_existente");
    die();
}

$registro_usuario = <<<REGISTROUSUARIOS
INSERT INTO usuarios (email, contraseña, usuario, tipousuarios_id, nombre, apellido)
VALUES ('$email', '$contraseña', '$usuario', '$tipousuario',                                                                             
REGISTROUSUARIOS;

if(!empty($nombre)){
    $registro_usuario .= "'$nombre',";
} else {
    $registro_usuario .= "'',";
}
if(!empty($apellido)){
    $registro_usuario .= "'$apellido')";
} else {
    $registro_usuario .= "'')";
}

if(query($registro_usuario)){
    header("Location:../index.php?seccion=usuarios&estado=ok&mensaje=usuario_creado");
    die();
} else{
    header("Location:../index.php?seccion=crear_usuario&estado=error&mensaje=usuario_no_creado");
    die();
   }