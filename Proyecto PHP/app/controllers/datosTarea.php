<?php
//Funcion que devuelve los datos de la attrea que se pasa por parametro
function datos($id) {
    $tarea = datosTarea($id);
    return $tarea;
}
