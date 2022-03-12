<?php
require_once("../../configs/configs.php");
require_once("../../configs/funcion.php");

if(empty($_POST["id"])){
    header("Location:../index.php?seccion=remeras");
    die();
}

    $id = $_POST["id"];
   if(empty($_POST["nombre"]) || empty($_POST["precio"]) || empty($_POST["color"]) ||empty($_POST["categoria"]) || empty($_POST["talle"])){
       header("Location:../index.php?seccion=editar_remera&id=$id&estado=error&mensaje=campos_obligatorios");
       die();
   } 
   if($_FILES["imagen"]["size"] > 0){
        if($_FILES["imagen"]["type"] != "image/jpeg"){
            header("Location:../index.php?seccion=editar_remera&id=$id&estado=error&mensaje=img_invalida");
            die();
        }
    }
   if($_FILES["imagen"]["size"] >= 2000000){
    header("Location:../index.php?seccion=editar_remera&id=$id&estado=error&mensaje=img_peso_maximo");
    die();
   }

   $id = $_POST["id"];
   $nombre = ucfirst($_POST["nombre"]);
   $precio = $_POST["precio"];
   $color = ucfirst($_POST["color"]);
   $imagen = $_POST["data_img"];
   $buscar = " ";
   $reemplazo = "_";

    if($_FILES["imagen"]["size"] > 0){
        if($imagen == "img/remeras/friends_default.png"){
            $imagen = "img/remeras/".str_replace($buscar, $reemplazo, $_FILES["imagen"]["name"]);
            move_uploaded_file($_FILES["imagen"]["tmp_name"], "../../".$imagen);
        } else{
            unlink("../../".$_POST["data_img"]);
            $imagen = "img/remeras/".str_replace($buscar, $reemplazo, $_FILES["imagen"]["name"]);
            move_uploaded_file($_FILES["imagen"]["tmp_name"], "../../".$imagen);
        }
    } else{
        $imagen = $imagen;
    }

   $imagen = $imagen;
   $categoria = $_POST["categoria"];
   $talle = $_POST["talle"];

   $recibo_datos = <<<RECIBODATOS
    UPDATE remeras SET nombre="$nombre", precio=$precio, color="$color", imagen="$imagen", categorias_id="$categoria", talles_id="$talle"
    WHERE id="$id";
RECIBODATOS;

   if(query($recibo_datos)){
        header("Location:../index.php?seccion=remeras&estado=ok&mensaje=remera_editada");
        die();
   } else{
        header("Location:../index.php?seccion=editar_remera&id=$id&estado=error&mensaje=no_editado");
        die();
   }

