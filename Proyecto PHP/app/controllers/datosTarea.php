<?php

include '../models/funciones.php';

function datos($id) {
    $tarea = datosTarea($id);
    return $tarea;
}
