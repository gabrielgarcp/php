<?php
//Iniciar sesión
session_start();
//Comprobamos si la variable admin esta definida
if (isset($_SESSION['admin'])) {
    //Comprobamos si la variable admin es verdaddera
    if ($_SESSION['admin']) {
        //Si es verdadera incluimos las funciones
        include __DIR__.'/../models/funciones.php';
        //Comprobamos si no hemos pulsado el boton de 'editar'
        if (!isset($_POST['Editar'])) {
            //Si no lo hemos pulsado incluimos el controlador de los datos de la tarea
            include __DIR__.'/datosTarea.php';
            //En una variable le introducimos el valor de la funcion de extraer los datos de la tarea cuyo id se le pasa por parametro
            $datosTarea = datos($_GET['id']);
            //Incluimos la cabecera que es la vista del usuario y el cuerpo de la pagina que es la vista de editar tarea
            include __DIR__.'/../views/usuario.php';
            include __DIR__.'/../views/EditarTarea.php';
        } else {
            //Cargamos en una variable los datos introducidos en el formulario de editar tarea
            $campos = $_POST;
            //Compobamos los datos con la funcion de filtrado de datos y el resultado devuelto lo cargamos en la variable 'errores_editar'
            $errores_editar = filtrardatos();
            //Comprobamos si hay errores
            if (empty($errores_editar)) {
                //Si no hay errores, comprobamos si la variable de la fecha de realizacion esta vacia 
                if ($_POST['fecha_realizacion'] == "") {
                    //Si esta vacia cambiamos el contenido de la variable por null
                    $fech_re = null;
                } else {
                    //Si no esta vacia cambiamos el formato de dd/mm/yyyy a yyyy/mm/dd
                    $fech_re = date("Y-m-d", strtotime($_POST['fecha_realizacion']));
                }
                //Cargamos en una varible el resultado de la funcion de la edición de la tarea
                $result_editar = editarTarea($_POST['id'], $_POST['descripcion'], $_POST['persona_contacto'], $_POST['telefono_contacto'], $_POST['correo'], $_POST['direccion'], $_POST['poblacion'], $_POST['codigo_postal'], $_POST['provincia'], $_POST['estado'], $_POST['operario_encargado'], $fech_re, $_POST['anotaciones_anteriores'], $_POST['anotaciones_posteriores']);
                ?>
                <!-- Mostramos el resultado de la ediccion por una alerta y redireccionamos al controlador de listar -->
                
                <script type="text/javascript">
                    alert("<?= $result_editar ?>");
                    window.location.href = "Listar.php";
                </script>
                <?php
            } else {
                //Si hay errores mostramos de nuevo la vista de editar tarea
                include __DIR__.'/../views/EditarTarea.php';
            }
        }
    } else {
        // Si la variable 'admin' es falsa mostramos la alerta de 'No tienes permisos para editar una tarea' y redirigimos al controlador de listar
        ?>
        <script type="text/javascript">
            alert("No tienes permiso para editar una tarea");
            window.location.href = "Listar.php";
        </script>
        <?php
    }
} else {
    //Si no esta definida la variable session, mostramos una alerta que indique que no ha iniciado sesion y redirigimos al index del programa
    ?>
    <script type="text/javascript">
        alert("No has iniciado sesion");
        window.location.href = "../index.php";
    </script>
    <?php
}

