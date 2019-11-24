<?php

include 'Conexionbd.php';
/* funciones */

function nuevaTarea($id, $descripcion, $persona_contacto, $telefono_contacto, $correo, $direccion, $poblacion, $codigo_postal, $provincia, $estado, $fecha_creacion, $operario_encargado, $fecha_realizacion, $anotaciones_anteriores, $anotaciones_posteriores) {
    $conexion = Conecta();
    $result = mysqli_query($conexion, "INSERT INTO tareas VALUES ('$id','$descripcion','$persona_contacto','$telefono_contacto','$correo','$direccion','$poblacion','$codigo_postal','$provincia','$estado','$fecha_creacion','$operario_encargado','$fecha_realizacion','$anotaciones_anteriores','$anotaciones_posteriores')") or die('Error, insert query failed');
    return 'Tarea añadida correctamenete';
}

function editarTarea($id, $descripcion, $persona_contacto, $telefono_contacto, $correo, $direccion, $poblacion, $codigo_postal, $provincia, $estado, $operario_encargado, $fecha_realizacion, $anotaciones_anteriores, $anotaciones_posteriores) {
    $conexion = Conecta();
    $result = mysqli_query($conexion, "UPDATE tareas SET descripcion='$descripcion',persona_contacto='$persona_contacto',telefono_contacto='$telefono_contacto',correo='$correo',direccion='$direccion',poblacion='$poblacion',codigo_postal='$codigo_postal',provincia='$provincia',estado='$estado',operario_encargado='$operario_encargado',fecha_realizacion='$fecha_realizacion',anotaciones_anteriores='$anotaciones_anteriores',anotaciones_posteriores='$anotaciones_posteriores' WHERE id='$id'");
    return 'Tarea actualizada correctamenete';
}
function ListaTareas() {
    $conexion = Conecta();
    $lista_tareas = [];
    $consulta = mysqli_query($conexion, "select * from tareas");
    while ($reg = mysqli_fetch_array($consulta)) {
        $lista_tareas[] = $reg;
    }
    return $lista_tareas;
}

function datosTarea($id_t) {
    $conexion = Conecta();
    $consulta = mysqli_query($conexion, "select * from tareas where id='$id_t'");
    $tarea = mysqli_fetch_array($consulta);

    
    return $tarea;
}

function ListaProvincias() {
    $conexion = Conecta();
    $lista_provincias = [];
    $consulta = mysqli_query($conexion, "select * from provincias order by nombre");
    while ($reg = mysqli_fetch_array($consulta)) {
        $lista_provincias[] = $reg;
    }

    return $lista_provincias;
}

function ListaId() {
    $conexion = Conecta();
    $lista_ids = [];
    $consulta = mysqli_query($conexion, "select * from tareas");
    while ($reg = mysqli_fetch_array($consulta)) {
        $lista_ids[] = $reg;
    }

    return $lista_ids;
}

function idUltimoRegistroTarea() {
    $conexion = Conecta();
    $consulta = mysqli_query($conexion, "SELECT max(id)+1 AS id FROM tareas");
    $id = mysqli_fetch_array($consulta)['id'];
    return $id;
}

function actualizarTarea($id, $estado, $anotaciones_anteriores, $anotaciones_posteriores) {
    $conexion = Conecta();
    $actualizacion = mysqli_query($conexion, "UPDATE tareas SET estado='$estado', anotaciones_anteriores='$anotaciones_anteriores', anotaciones_posteriores='$anotaciones_posteriores' WHERE id='$id'");
    return 'ActualizaciÃ³n realizada correctamente';
}


