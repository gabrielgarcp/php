<?php

include '../models/funciones.php';
if (!$_POST) {
    $tareas = ListaTareas();
    include '../views/ListarTareas.php';
} else {
    $campo = $_POST['campo'];
    if ($campo == 'fecha_creacion') {
        $dato = date("Y/m/d", strtotime($_POST['dato']));
    } else {
        $dato = $_POST['dato'];
    }
    $tareas = buscarTareas($campo, $dato);
    include '../views/ListarTareas.php';
}

