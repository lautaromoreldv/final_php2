<?php
require("../configs/configs.php");
require("../configs/arrays.php");
require("../configs/funcion.php");

$nombre    = $_REQUEST["nombre"];
$precio    = $_REQUEST["precio"];
$imagen    = $_REQUEST["imagen"];
$talle     = $_REQUEST["talle"];
$categoria = $_REQUEST["categoria"];
$color     = $_REQUEST["color"];

$_SESSION["carrito"][$nombre]["precio"]     = $precio;
$_SESSION["carrito"][$nombre]["imagen"]     = $imagen;
$_SESSION["carrito"][$nombre]["talle"]      = $talle;
$_SESSION["carrito"][$nombre]["categoria"]  = $categoria;
$_SESSION["carrito"][$nombre]["color"]      = $color;

if(!empty($_REQUEST)){
    header("location:../index.php?seccion=tienda&estado=ok&mensaje=agregado");
    die();
}

?>
