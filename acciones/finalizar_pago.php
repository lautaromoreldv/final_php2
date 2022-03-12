<?php
require("../configs/configs.php");
require("../configs/arrays.php");
require("../configs/funcion.php");

if(empty($_POST["direccion"]) || empty($_POST["provincia"]) || empty($_POST["ciudad"]) || empty($_POST["codigo_postal"]) || empty($_POST["numero_tarjeta"]) || empty($_POST["fecha_vencimiento"]) || empty($_POST["codigo_seguridad"]) || empty($_POST["titular_tarjeta"]) || empty($_POST["cuotas"])) {
    header("Location:../index.php?seccion=carrito&estado=error&mensaje=datos_obligatorios");
    die();
}

//dirección de entrega
if(strlen($_POST["direccion"]) < 3){
    header("Location:../index.php?seccion=carrito&estado=error&mensaje=dato_invalido_direccion_min_length");
    die();
}

//ciudad
if(is_numeric($_POST["ciudad"])){
    header("Location:../index.php?seccion=carrito&estado=error&mensaje=dato_invalido_ciudad");
    die();
}
if(strlen($_POST["ciudad"]) < 3){
    header("Location:../index.php?seccion=carrito&estado=error&mensaje=dato_invalido_ciudad_min_length");
    die();
}

//codigo postal
if(!is_numeric($_POST["codigo_postal"])){
    header("Location:../index.php?seccion=carrito&estado=error&mensaje=dato_invalido_codigo_postal");
    die();
}
if(strlen($_POST["codigo_postal"]) >= 5){
    header("Location:../index.php?seccion=carrito&estado=error&mensaje=dato_invalido_codigo_postal_max_length");
    die();
}

//numero tarjeta
if(is_numeric($_POST["numero_tarjeta"])){
    if(strlen($_POST["numero_tarjeta"]) > 19){
        header("Location:../index.php?seccion=carrito&estado=error&mensaje=dato_invalido_numero_tarjeta_max_length");
        die();
    }
} else{
    header("Location:../index.php?seccion=carrito&estado=error&mensaje=dato_invalido_numero_tarjeta");
    die();
}

//codigo de seguridad de la tarjeta
if(!is_numeric($_POST["codigo_seguridad"])){
    header("Location:../index.php?seccion=carrito&estado=error&mensaje=dato_invalido_codigo_seguridad");
    die();
}
if(strlen($_POST["codigo_seguridad"]) >= 5){
    header("Location:../index.php?seccion=carrito&estado=error&mensaje=dato_invalido_codigo_seguridad_max_length");
    die();
}

//nombre del titular de la tarjeta
if(is_numeric($_POST["titular_tarjeta"])){
    header("Location:../index.php?seccion=carrito&estado=error&mensaje=dato_invalido_titular_tarjeta");
    die();
}
if(strlen($_POST["titular_tarjeta"]) <= 3){
    header("Location:../index.php?seccion=carrito&estado=error&mensaje=dato_invalido_titular_tarjeta_min_length");
    die();
}


if(!empty($_POST)){
    header("Location:../index.php?seccion=tienda&estado=ok&mensaje=compra_exitosa");
    unset($_SESSION["carrito"]);
    die();
}

?>