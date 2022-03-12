<?php

require("../configs/configs.php");
require("../configs/arrays.php");
require("../configs/funcion.php");
		
//nombre
if(empty($_POST['nombre'])){
	header('Location: ../index.php?seccion=contacto&estado=error&mensaje=nombre_vacio');
	die();
}
if(is_numeric($_POST["nombre"])){
	header('Location: ../index.php?seccion=contacto&estado=error&mensaje=nombre_invalido');
	die();
}
if(strlen($_POST["nombre"]) < 2){
	header('Location: ../index.php?seccion=contacto&estado=error&mensaje=nombre_min_length');
	die();
}

//apellido
if(empty($_POST['apellido'])){
	header('Location: ../index.php?seccion=contacto&estado=error&mensaje=apellido_vacio');
	die();
} 
if(is_numeric($_POST["apellido"])){
	header('Location: ../index.php?seccion=contacto&estado=error&mensaje=apellido_invalido');
	die();
}
if(strlen($_POST["apellido"]) < 2){
	header('Location: ../index.php?seccion=contacto&estado=error&mensaje=apellido_min_length');
	die();
}

//email
if(empty($_POST['email'])){
	header('Location: ../index.php?seccion=contacto&estado=error&mensaje=email_vacio');
	die();
} 
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
	header('Location: ../index.php?seccion=contacto&estado=error&mensaje=email_invalido');
	die();
} 

//comentario
if(empty($_POST['comentario'])){
	header('Location: ../index.php?seccion=contacto&estado=error&mensaje=comentario_vacio');
	die();
} 
if(strlen($_POST["comentario"]) < 5){
	header('Location: ../index.php?seccion=contacto&estado=error&mensaje=comentario_min_length');
	die();
}

//mandar form
if(!empty($_POST)){
    header("Location:../index.php?seccion=contacto&estado=ok&mensaje=formulario_enviado");
    die();
}
