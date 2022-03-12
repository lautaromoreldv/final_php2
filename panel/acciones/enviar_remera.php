<?php
    require_once("../../configs/configs.php");
    require_once("../../configs/funcion.php");

   if(empty($_POST["nombre"]) || empty($_POST["precio"]) || empty($_POST["color"]) || empty($_POST["categoria"]) || empty($_POST["talle"])){
       header("Location:../index.php?seccion=crear_remera&estado=error&mensaje=campos_obligatorios");
       die();
   }
   if($_FILES["imagen"]["size"] >= 2000000){
    header("Location:../index.php?seccion=crear_remera&estado=error&mensaje=img_peso_maximo");
    die();
   }

    if($_FILES["imagen"]["size"] > 0){
        if($_FILES["imagen"]["type"] != "image/jpeg"){
            header("Location:../index.php?seccion=crear_remera&estado=error&mensaje=img_invalida");
            die();
        }
    }
   
   $nombre = strtolower($_POST["nombre"]);
   $precio = $_POST["precio"];
   $color = $_POST["color"];
   $imagen = $_FILES["imagen"]["name"];
   if($_FILES["imagen"]["size"] == 0){
       $imagen = "img/remeras/friends_default.png";
   } else{
    $imagen = "img/remeras/".$imagen;
    move_uploaded_file($_FILES["imagen"]["tmp_name"], "../../".$imagen);
   }
   $imagen = $imagen;
   $categoria = $_POST["categoria"];
   $talle = $_POST["talle"];

$buscarNombre = <<<BUSCARNOMBRE
                SELECT * from remeras 
                WHERE nombre='$nombre'
BUSCARNOMBRE;
$resultado = mysqli_query($cnx, $buscarNombre);
$contador = mysqli_num_rows($resultado);
if($contador == 1){
    header("Location:../index.php?seccion=crear_remera&estado=error&mensaje=remera_ya_existente");
    die();
}

$recibo_datos = <<<RECIBODATOS
    INSERT INTO remeras (nombre, precio, color, imagen, categorias_id, talles_id)
    VALUES ("$nombre", "$precio", "$color", "$imagen", "$categoria", "$talle")                                                          
RECIBODATOS;

   if(query($recibo_datos)){
       header("Location:../index.php?seccion=remeras&estado=ok&mensaje=remera_creada");
        die();
   } else{
        header("Location:../index.php?seccion=crear_remera&estado=error&mensaje=remera_no_creada");
        die();
   }
