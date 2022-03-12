<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", true);

define("IMG_temporadas", "img/temporadas");
define("IMG_remeras", "img/remeras");
define("ATRAS", "../");

define("DB_HOST", "localhost");
define("DB_NAME", "friends_db");
define("DB_USER", "root");
define("DB_PASS", "");

$cnx = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if(!$cnx){
    echo "No se logró conectar a la base de datos";
}

mysqli_set_charset($cnx, "UTF8");