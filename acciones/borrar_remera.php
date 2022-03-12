<?php
require("../configs/configs.php");
require("../configs/arrays.php");
require("../configs/funcion.php");

if(isset($_REQUEST["remera"])){
    $remera = $_REQUEST["remera"];
    unset($_SESSION["carrito"][$remera]);
    header("location:../index.php?seccion=carrito&estado=ok&mensaje=remera_borrada");
    die();
} 

?>