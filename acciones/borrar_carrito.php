<?php
require("../configs/configs.php");
require("../configs/arrays.php");
require("../configs/funcion.php");

unset($_SESSION["carrito"]);
    header("Location:../index.php?seccion=tienda&estado=ok&mensaje=carrito_vacio");
    die();
?>