<?php
require_once("../../configs/configs.php");
require_once("../../configs/funcion.php");

$id = $_POST["id"];
$imagen = $_POST["imgaborrar"];

if(empty($id)){
    header("Location:../index.php?seccion=remeras&estado=error&mensaje=remera_no_borrada");
    die();
}

$queryEliminar = "DELETE FROM remeras WHERE id = $id";
unlink("../../".$imagen);

echo "<pre>";
print_r($_POST);
echo "</pre>";

if(query($queryEliminar)){
    header("Location:../index.php?seccion=remeras&estado=ok&mensaje=remera_borrada");
    die();
} else{
    header("Location:../index.php?seccion=remeras&estado=error&mensaje=remera_no_borrada");
    die();
}
