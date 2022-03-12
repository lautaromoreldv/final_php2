<?php
require_once("../configs/configs.php");
require_once("../configs/funcion.php");

if(empty($_POST["usuario"]) || empty($_POST["contraseña"])){
    header("Location:../index.php?seccion=login&estado=error&mensaje=campos_obligatorios");
    die();
} 

$usuario = $_POST["usuario"];
$contraseña = $_POST["contraseña"];

$login_usuario = "SELECT * FROM usuarios WHERE ";

if(strpos($usuario, "@") === false){
    $login_usuario .= "usuario = '$usuario'";
} else{
    $login_usuario .= "email = '$usuario'";
}

$usuario = select($login_usuario);

if(empty($usuario) || password_verify($contraseña, $usuario[0]["contraseña"])){
    header("Location:../index.php?seccion=login&estado=error&mensaje=datos_incorrectos");
    die();
}

$usuario = $usuario[0];

$_SESSION["usuario"] = $usuario;

if($usuario["tipousuarios_id"] == "1"){
    header("Location:../panel/index.php?estado=ok&mensaje=bienvenido");
    die();
}
header("Location:../index.php?estado=ok&mensaje=bienvenido");
    die();