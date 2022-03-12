<div class="pl-5">	
<?php

function mostrar_array($valor, $dump = false){    
    echo "<pre>";
        if($dump)
            var_dump($valor);
        else
            print_r($valor);
    echo "</pre>";

}

function select($query){
    global $cnx;

    $rta = mysqli_query($cnx, $query);

    if(mysqli_num_rows($rta) === 0){
        return false;
    }

    $datos = [];

    while($dato = mysqli_fetch_assoc($rta)){
        $datos[] = $dato;
    }

    return $datos;
}

function query($query){
    global $cnx;
    $rta = mysqli_query($cnx, $query);
        if(mysqli_error($cnx)){
            return mysqli_error($cnx);
        }
    return $rta;
}

function selected($fk, $id){
    return $fk == $id ? "selected" : "";
}