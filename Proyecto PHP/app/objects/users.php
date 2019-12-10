<?php
//Clase usuario
class User {

    public $user;
    public $pass;
//Creamos un usuario con el usuario y contraseña
    public function __construct($user, $pass) {
        $this->user = $user;
        $this->pass = $pass;
    }
//Funcion que comprueba si el usuario existe
    public function usuarioExiste($nombreusuario) {
        $conexion = Conecta();
        $consulta = mysqli_query($conexion, "select * from users where user='$nombreusuario'");
        switch (mysqli_num_rows($consulta)) {
            case 0:
                return false;
            case 1:
                return true;
        }
    }
//Función que comprueba si la contraseña es correcta
    public function passOK($nombreusuario, $contraseña) {
        $conexion = Conecta();
        $consulta = mysqli_query($conexion, "select * from users where user='$nombreusuario'");
        if (!$consulta) {
            printf("Error: %s\n", mysqli_error($conexion));
            exit();
        }
        while ($reg = mysqli_fetch_array($consulta)) {
            if ($reg['pass'] === $contraseña) {
                return true;
            } else {
                return false;
            }
        }
    }
//Funcion que devuelve si es administrador el usuario o no
    public function isAdmin($nombreusuario) {
        $conexion = Conecta();
        $consulta = mysqli_query($conexion, "SELECT * FROM users WHERE user='$nombreusuario'");
        $reg = mysqli_fetch_array($consulta);
        print $reg['admin'];
        switch ($reg['admin']) {
            case 0:
                return false;
            case 1:
                return true;
            default:
                return false;
        }
    }

}
