<?php

function conectarBD() {

    //datos para conectar la base de datos
    $dbhost = "127.0.0.1:3307";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "reciclaje_1";

    //conexión a la base de datos
    $conexion = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
 
    //verificación de la conexion
    if ($conexion->connect_error) {
       die("Error de conexión: " . $conexion->connect_error);
    }
 
    return $conexion;
}
 
?>