<?php
$usuario = "root";
$contrasena = "root";
$servidor = "localhost";
$bd = "paco's_garden_s.l";
$conexion = mysqli_connect($servidor, $usuario, $contrasena, $bd)
        or
        die("No se puede conectar a la base de datos");

function  Conecta() {
    global $conexion;
    return $conexion;
}