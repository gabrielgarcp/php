<?php
include '../models/funciones.php';

if ($_POST['fecha_realizacion'] == "") {
    $fech_re = null;
} else {
    $fech_re = date("Y-m-d", strtotime($_POST['fecha_realizacion']));
}
return editarTarea($_POST['id'],
        $_POST['descripcion'],
        $_POST['persona_contacto'],
        $_POST['telefono_contacto'],
        $_POST['correo'],
        $_POST['direccion'],
        $_POST['poblacion'],
        $_POST['codigo_postal'],
        $_POST['provincia'],
        $_POST['estado'],
        $_POST['operario_encargado'],
        $fech_re,
        $_POST['anotaciones_anteriores'],
        $_POST['anotaciones_posteriores']);







