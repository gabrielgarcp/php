<?php
//Iniciar sesion
session_start();
// Comprobar si el campo admin de la sesion esta desclardo
if (isset($_SESSION['admin'])) {
    // Comprobar si admin es verdadero
    if ($_SESSION['admin']) {
        // Incluir las funciones
        include '../models/funciones.php';
        //Comprobar si no hemos pulsado el boton 'Añadir' del formulario de añadir
        if (!isset($_POST['Anadir'])) {
            //Incluir las vistas del usuario y formulario añadir tarea
            include '../views/usuario.php';
            include '../views/AnadirTarea.php';
        } else {
            //Si hemos pulsado el boton de Añadir, guardmos los valores enviados y filtramos los datos 
            $campos = $_POST;
            $errores_anadir = filtrardatos();
            //Comprobar si no hay errores
            if (empty($errores_anadir)) {
                //Comprobar si la fecha de realizacion esta vacia y creamos una variable nula.
                if ($_POST['fecha_realizacion'] == "") {
                    $fech_re = null;
                    //Si la fecha de realizacion se ha introducido cambiamos el formato 
                    //de la fecha para su posterior introduccion en la base de datos
                } else {
                    $fech_re = date("Y-m-d", strtotime($_POST['fecha_realizacion']));
                }
                // Creamos una variable donde guardara la respuesta de la accion de introducción de la nueva tarea
                $resultado_anadir = nuevaTarea($_POST['id'], $_POST['descripcion'], $_POST['persona_contacto'], $_POST['telefono_contacto'], $_POST['correo'], $_POST['direccion'], $_POST['poblacion'], $_POST['codigo_postal'], $_POST['provincia'], $_POST['estado'], date("Y-m-d"), $_POST['operario_encargado'], $fech_re, $_POST['anotaciones_anteriores'], $_POST['anotaciones_posteriores']);
                ?>
                <!-- Mostrar una alerta con el valor de la variable del resultado de la accion de insertar tarea -->
                <script type="text/javascript">
                    alert("<?= $resultado_anadir ?>");
                    window.location.href = "Listar.php";
                </script>
                <?php
            } else {
                // Si hay errores volvemos a mostrar el formulario
                include '../views/AnadirTarea.php';
            }
        }
        //Si la variable admin es falsa, el usuario no tiene permiso 
        //para añadir una tarea y lo reenviamos al usuario al controlador de listar tareas
    } else {
        ?>
        <script type="text/javascript">
            alert("No tienes permisos para añadir una tarea");
            window.location.href = "Listar.php";
        </script>
        <?php
    }
    // Si la variable admin no esta declarada significa que nadie a iniciado 
    // sesión y reenviaremos la aplicacion a la página d einiciar sesión
} else {
    ?>
    <script type="text/javascript">
        alert("No has iniciado sesion");
        window.location.href = "../index.php";
    </script>
    <?php
}

