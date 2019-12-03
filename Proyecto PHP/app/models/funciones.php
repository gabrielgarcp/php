<?php

include 'Conexionbd.php';

/*Funcion que crea una nueva tarea apartir de los parametros envia desde la vista de 'AnadirTarea'*/
function nuevaTarea($id, $descripcion, $persona_contacto, $telefono_contacto, $correo, $direccion, $poblacion, $codigo_postal, $provincia, $estado, $fecha_creacion, $operario_encargado, $fecha_realizacion, $anotaciones_anteriores, $anotaciones_posteriores) {
    $conexion = Conecta();
    $nueva = mysqli_query($conexion, "INSERT INTO tareas VALUES ('$id','$descripcion','$persona_contacto','$telefono_contacto','$correo','$direccion','$poblacion','$codigo_postal','$provincia','$estado','$fecha_creacion','$operario_encargado','$fecha_realizacion','$anotaciones_anteriores','$anotaciones_posteriores')") or die('Error orden insertar tarea');
    return "Tarea añadida correctamenete";
}

/* Función que actualiza la tarea con los datos que se han modificado en la vista 'EditarTareas'*/
function editarTarea($id, $descripcion, $persona_contacto, $telefono_contacto, $correo, $direccion, $poblacion, $codigo_postal, $provincia, $estado, $operario_encargado, $fecha_realizacion, $anotaciones_anteriores, $anotaciones_posteriores) {
    $conexion = Conecta();
    $edit = mysqli_query($conexion, "UPDATE tareas SET descripcion='$descripcion',persona_contacto='$persona_contacto',telefono_contacto='$telefono_contacto',correo='$correo',direccion='$direccion',poblacion='$poblacion',codigo_postal='$codigo_postal',provincia='$provincia',estado='$estado',operario_encargado='$operario_encargado',fecha_realizacion='$fecha_realizacion',anotaciones_anteriores='$anotaciones_anteriores',anotaciones_posteriores='$anotaciones_posteriores' WHERE id='$id'") or die ('Eroor orden editar tarea');
    return "Tarea $id actualizada correctamenete";
}

function completarTarea($id,$estado,$anotaciones_anteriores,$anotaciones_posteriores){
    $conexion = Conecta();
    $complet = mysqli_query($conexion, "UPDATE tareas SET estado='$estado',anotaciones_anteriores='$anotaciones_anteriores', anotaciones_posteriores='$anotaciones_posteriores' WHERE id='$id'") or die ('Error orden de completar tarea');
    return "Tarea $id completada correctamente";
    
}
function eliminarTarea($id){
    $conexion= Conecta();
    $del= mysqli_query($conexion, "DELETE FROM tareas WHERE id='$id'") or die('Error orden eliminar tarea');
    return "Tarea $id eliminada correctamente";
}
function buscarTareas($parametro,$dato) {
    $conexion = Conecta();
    $busca_tarea = [];
    $consulta = mysqli_query($conexion, "select * from tareas WHERE $parametro='$dato'");
    while ($reg = mysqli_fetch_array($consulta)) {
        $busca_tarea[] = $reg;
    }
    return $busca_tarea;
}
function ListaTareas() {
    $conexion = Conecta();
    $lista_tareas = [];
    $consulta = mysqli_query($conexion, "select * from tareas ORDER BY fecha_creacion DESC");
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

function filtrardatos() {
    $errores = [];
    if (isset($_POST)) {
        if (empty($_POST['descripcion'])) {
            array_push($errores, "La descripción esta vacía.");
        }
        if (empty($_POST['persona_contacto'])) {
            array_push($errores, "La persona de contacto esta vacía.");
        }
        if (empty($_POST['telefono_contacto'])) {
            array_push($errores, "El teléfono es obligatorio.");
        }
        if (isset($_POST['codigo_postal'])) {
            if (!filter_var($_POST['codigo_postal'], FILTER_VALIDATE_INT) && strlen($_POST['codigo_postal'] == 5)) {
                array_push($errores, "Codigo postal invalido. Su formato es de 5 números.");
            }
        }
        if (empty($_POST['correo'])) {
            if (!filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
                array_push($errores, "Email incorrecto");
            }
        }
        if (isset($_POST['fecha_realización'])) {
            $fecha_actual = strtotime(date("d-m-Y", time()));
            $fecha_entrada = strtotime(date("d-m-Y", $_POST['fecha_realizacion']));
            if ($_POST['fecha_realizacion'] > strtotime(date("d-m-Y", time()))) {
                array_push($errores, "La fecha de realización debe ser posterior a la fecha actual.");
            }
        }
        return $errores;
    }
}


