<?php
require_once("../configs/configs.php");
require_once("../configs/funcion.php");

if(empty($_POST["email"]) || empty($_POST["contraseña"])){
    header("Location:../index.php?seccion=registro&estado=error&mensaje=campos_obligatorios");
    die();
} 

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$contraseña = $_POST["contraseña"];
$usuarioAutomatico = explode("@", $email)[0];
$usuario = empty($_POST["usuario"]) ? $usuarioAutomatico : $_POST["usuario"];

$registro_usuario = <<<REGISTROUSUARIOS
INSERT INTO usuarios (email, contraseña, usuario, nombre, apellido)
VALUES ('$email', '$contraseña', '$usuario',                                                                              
REGISTROUSUARIOS;

if(!empty($nombre)){
    $registro_usuario .= "'$nombre',";
} else {
    $registro_usuario .= "NULL,";
}
if(!empty($apellido)){
    $registro_usuario .= "'$apellido')";
} else {
    $registro_usuario .= "NULL)";
}

if(!query($registro_usuario)){
    header("Location:../index.php?seccion=registro&estado=error&mensaje=registrarse");
    die();
   } else{
    header("Location:../index.php?seccion=login&estado=ok&mensaje=registro_ok");
   }