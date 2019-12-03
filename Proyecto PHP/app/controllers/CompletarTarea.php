<?php
// Iniciar una sesion
session_start();
// Comprobar si el campo admin de la sesion esta desclardo
if (isset($_SESSION['admin'])) {
    // Comprobar si admin es falso
    if (!$_SESSION['admin']) {
        // Incluir las funciones
        include '../models/funciones.php';
        //Comprobaos si no han enviado nada
        if (!$_POST) {
            //Incliuimos el controlador de datos de una tarea         
            include 'datosTarea.php';
            //Almacenamos en una variable la id pasada por GET
            $id = $_GET['id'];
            //Guardamos en una variable los datos de la tarea de la variable id
            $datosTarea = datos($id);
            // Incluimos las vistas de usuario y el formulario de completar tarea
            include '../views/usuario.php';
            include '../views/CompletarTarea.php';
        } else {
            //Si se ha enviado algo se lo pasamos a la funcion de completar 
            //tarea y el valor resultante lo almacenamos en una variable
            $result_completar = completarTarea($_POST['id'], $_POST['estado'], $_POST['anotaciones_anteriores'], $_POST['anotaciones_posteriores']);
            ?>
            <!-- Mostramos una alerta con el valor de la variable del resultado de la accion de completar tarea-->
            <script type="text/javascript">
                alert("<?= $result_completar ?>");
                window.location.href = "Listar.php";
            </script>
            <?php
        }
        // Si la variable admin es verdadera mostramos una alerta diciendo que los 
        // administradores no tienen permisos para completar una tarea y redikreccionamos 
        // al usuario al controlador de listar tarea
    } else {
        ?>
        <script type="text/javascript">
            alert("Los administradores no tienen permisos para completar una tarea");
            window.location.href = "Listar.php";
        </script>
        <?php
    }
    // Si la variable admin no esta definida reenviamos la aplicacion a la pagina de inisiar sesión
} else {
    ?>
    <script type="text/javascript">
        alert("No has iniciado sesion");
        window.location.href = "../index.php";
    </script>
    <?php
}

       