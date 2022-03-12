<?php
require_once("../../configs/configs.php");
require_once("../../configs/funcion.php");

$id = $_POST["id"];

if(empty($id)){
    header("Location:../index.php?seccion=usuarios&estado=error&mensaje=usuario_no_borrado");
    die();
}

$queryEliminar = "DELETE FROM usuarios WHERE id = $id";

if(query($queryEliminar)){
    header("Location:../index.php?seccion=usuarios&estado=ok&mensaje=usuario_borrado");
    die();
} else{
    header("Location:../index.php?seccion=usuarios&estado=error&mensaje=usuario_no_borrado");
    die();
}
