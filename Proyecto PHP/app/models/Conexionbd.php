<?php
//Cargamos la configuracion del programa
include __DIR__.'/../config.php';
//Iniciamos la conexion con los datos del servidor, usuario, contraseña y base de datos si surge algun error devulvera 'No se puede conectar a la base de datos'
$conexion = mysqli_connect($servidor, $usuario, $contrasena, $bd)
        or
        die("No se puede conectar a la base de datos");
//Asignamos el conjunto de carácteres que usaremos en esta conexion que sera utf8
mysqli_set_charset($conexion, 'utf8');
//Funcion que devulve la conexion
function Conecta() {
    global $conexion;
    return $conexion;
}
