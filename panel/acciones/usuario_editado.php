<?php
require_once("../../configs/configs.php");
require_once("../../configs/funcion.php");

if(empty($_POST["id"])){
    header("Location:../index.php?seccion=usuarios");
    die();
}

    $id = $_POST["id"];
   if(empty($_POST["email"]) || empty($_POST["usuario"])){
       header("Location:../index.php?seccion=editar_usuario&id=$id&estado=error&mensaje=campos_obligatorios");
       die();
   } 

   $id = $_POST["id"];
   $nombre = empty($_POST["nombre"]) ? "" : ucfirst($_POST["nombre"]);
   $apellido = empty($_POST["apellido"]) ? "" : ucfirst($_POST["apellido"]);
   $usuario = strtolower($_POST["usuario"]);
   $email = $_POST["email"];
   $tipousuario = empty($_POST["tipousuario"]) ? "2" : $_POST["tipousuario"];

$buscarUsuario = <<<BUSCARUSUARIO
                    SELECT * from usuarios 
                    WHERE usuario = '$usuario'
BUSCARUSUARIO;
$resultado = mysqli_query($cnx, $buscarUsuario);
$contador = mysqli_num_rows($resultado);
if($contador == 1){
    header("Location:../index.php?seccion=editar_usuario&id=$id&estado=error&mensaje=usuario_ya_existente");
    die();
}

   $new_edit = <<<NEWDATOS
    UPDATE usuarios SET nombre="$nombre", apellido="$apellido", usuario="$usuario", email="$email", tipousuarios_id="$tipousuario"
    WHERE id="$id";
NEWDATOS;

    if(query($new_edit)){
        header("Location:../index.php?seccion=usuarios&estado=ok&mensaje=usuario_editado");
        die();
   } else{
        header("Location:../index.php?seccion=editar_usuario&id=$id&estado=error&mensaje=usuario_no_editado");
        die();
   }


